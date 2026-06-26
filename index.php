<?php
// File: index.php
require_once 'koneksi.php'; // Menggunakan file koneksi.php milikmu
require_once 'MahasiswaMandiri.php';
require_once 'MahasiswaBidikmisi.php';
require_once 'MahasiswaPrestasi.php';

// Inisialisasi Database dan Koneksi dari kelas Database di koneksi.php
$database = new Database();
$db = $database->getConnection();

// Ambil seluruh data dari database
$query = "SELECT * FROM tabel_mahasiswa ORDER BY jenis_pembiayaan ASC, nama_mahasiswa ASC";
$stmt = $db->prepare($query);
$stmt->execute();
$rows = $stmt->fetchAll();

// Grouping Objek Mahasiswa memanfaatkan Polimorfisme OOP
$daftarMandiri = [];
$daftarBidikmisi = [];
$daftarPrestasi = [];

foreach ($rows as $row) {
    if ($row->jenis_pembiayaan === 'Mandiri') {
        $daftarMandiri[] = new MahasiswaMandiri(
            $row->id_mahasiswa, $row->nama_mahasiswa, $row->nim, $row->semester, $row->tarif_ukt_nominal,
            $row->golongan_ukt, $row->nama_wali
        );
    } elseif ($row->jenis_pembiayaan === 'Bidikmisi') {
        $daftarBidikmisi[] = new MahasiswaBidikmisi(
            $row->id_mahasiswa, $row->nama_mahasiswa, $row->nim, $row->semester, $row->tarif_ukt_nominal,
            $row->nomor_kip_kuliah, $row->dana_saku_subsidi
        );
    } elseif ($row->jenis_pembiayaan === 'Prestasi') {
        $daftarPrestasi[] = new MahasiswaPrestasi(
            $row->id_mahasiswa, $row->nama_mahasiswa, $row->nim, $row->semester, $row->tarif_ukt_nominal,
            $row->nama_instansi_beasiswa, $row->minimal_ipk_syarat
        );
    }
}

// Menangkap parameter filter kategori dari URL Sidebar
$category = isset($_GET['category']) ? $_GET['category'] : 'all';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Registrasi Pembayaran Kuliah</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-graduation-cap"></i>
            <h2>AkademikUni</h2>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="index.php?category=all" class="<?php echo $category === 'all' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-table-list"></i> <span>Semua Kategori</span>
                </a>
            </li>
            <li class="menu-divider">Filter Skema UKT</li>
            <li>
                <a href="index.php?category=mandiri" class="<?php echo $category === 'mandiri' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-wallet"></i> <span>Jalur Mandiri</span>
                </a>
            </li>
            <li>
                <a href="index.php?category=bidikmisi" class="<?php echo $category === 'bidikmisi' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-hand-holding-dollar"></i> <span>Jalur Bidikmisi / KIP</span>
                </a>
            </li>
            <li>
                <a href="index.php?category=prestasi" class="<?php echo $category === 'prestasi' ? 'active' : ''; ?>">
                    <i class="fa-solid fa-award"></i> <span>Jalur Prestasi</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <div class="header-title">
                <h1>Registrasi Pembayaran Kuliah</h1>
                <p>Pemantauan Daftar Tagihan & Spesifikasi Akademik Berbasis Berkas Terpusat</p>
            </div>
            <div class="user-wrapper">
                <i class="fa-solid fa-circle-user"></i>
                <div>
                    <h4>Admin Akademik</h4>
                    <small>Petugas Keuangan</small>
                </div>
            </div>
        </header>

        <main>
            <?php if ($category === 'all' || $category === 'mandiri'): ?>
            <div class="card-section">
                <div class="section-header sh-mandiri">
                    <i class="fa-solid fa-wallet"></i>
                    <h2>Kelompok Mahasiswa - Jalur Mandiri</h2>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th class="text-center">Semester</th>
                                <th>Tarif Asli UKT</th>
                                <th>Spesifikasi Akademik Khusus</th>
                                <th>Total Tagihan (+Biaya Ops)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($daftarMandiri)): ?>
                                <tr><td colspan="6" class="text-center">Tidak ada data mahasiswa Mandiri.</td></tr>
                            <?php else: ?>
                                <?php foreach ($daftarMandiri as $mhs): ?>
                                <tr>
                                    <td><span class="badge badge-nim"><?php echo $mhs->getNim(); ?></span></td>
                                    <td class="font-semibold"><?php echo $mhs->getNamaMahasiswa(); ?></td>
                                    <td class="text-center"><?php echo $mhs->getSemester(); ?></td>
                                    <td>Rp <?php echo number_format($mhs->hitungTagihanSemester() - 100000, 0, ',', '.'); ?></td>
                                    <td class="spec-col"><?php $mhs->tampilkanSpesifikasiAkademik(); ?></td>
                                    <td class="font-bold text-primary">Rp <?php echo number_format($mhs->hitungTagihanSemester(), 0, ',', '.'); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($category === 'all' || $category === 'bidikmisi'): ?>
            <div class="card-section">
                <div class="section-header sh-bidikmisi">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <h2>Kelompok Mahasiswa - Jalur Bidikmisi / KIP-K</h2>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th class="text-center">Semester</th>
                                <th>Tarif Asli UKT</th>
                                <th>Spesifikasi Akademik Khusus</th>
                                <th>Total Tagihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($daftarBidikmisi)): ?>
                                <tr><td colspan="6" class="text-center">Tidak ada data mahasiswa Bidikmisi.</td></tr>
                            <?php else: ?>
                                <?php foreach ($daftarBidikmisi as $mhs): ?>
                                <tr>
                                    <td><span class="badge badge-nim"><?php echo $mhs->getNim(); ?></span></td>
                                    <td class="font-semibold"><?php echo $mhs->getNamaMahasiswa(); ?></td>
                                    <td class="text-center"><?php echo $mhs->getSemester(); ?></td>
                                    <td>Rp 0</td>
                                    <td class="spec-col"><?php $mhs->tampilkanSpesifikasiAkademik(); ?></td>
                                    <td><span class="badge badge-success">SUBSIDI PENUH (Rp 0)</span></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($category === 'all' || $category === 'prestasi'): ?>
            <div class="card-section">
                <div class="section-header sh-prestasi">
                    <i class="fa-solid fa-award"></i>
                    <h2>Kelompok Mahasiswa - Jalur Prestasi</h2>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th class="text-center">Semester</th>
                                <th>Tarif Asli UKT</th>
                                <th>Spesifikasi Akademik Khusus</th>
                                <th>Total Tagihan (Sisa 25%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($daftarPrestasi)): ?>
                                <tr><td colspan="6" class="text-center">Tidak ada data mahasiswa Prestasi.</td></tr>
                            <?php else: ?>
                                <?php foreach ($daftarPrestasi as $mhs): ?>
                                <tr>
                                    <td><span class="badge badge-nim"><?php echo $mhs->getNim(); ?></span></td>
                                    <td class="font-semibold"><?php echo $mhs->getNamaMahasiswa(); ?></td>
                                    <td class="text-center"><?php echo $mhs->getSemester(); ?></td>
                                    <td>Rp <?php echo number_format($mhs->hitungTagihanSemester() / 0.25, 0, ',', '.'); ?></td>
                                    <td class="spec-col"><?php $mhs->tampilkanSpesifikasiAkademik(); ?></td>
                                    <td class="font-bold text-success-dark">Rp <?php echo number_format($mhs->hitungTagihanSemester(), 0, ',', '.'); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>
        </main>
    </div>

</body>
</html>