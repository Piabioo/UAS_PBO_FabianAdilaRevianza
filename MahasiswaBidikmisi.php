<?php
// File: MahasiswaBidikmisi.php
require_once 'Mahasiswa.php';

class MahasiswaBidikmisi extends Mahasiswa {
    // Properti Spesifik
    private string $nomorKipKuliah;
    private float $danaSakuSubsidi;

    public function __construct(int $id, string $nama, string $nim, int $semester, float $ukt, string $nomorKipKuliah, float $danaSakuSubsidi) {
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->nomorKipKuliah = $nomorKipKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    // Overriding: Perhitungan tagihan skema Bidikmisi
    public function hitungTagihanSemester(): float {
        return 0.00;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "=== Spesifikasi Akademik Jalur Bidikmisi/KIP-K ===<br>";
        echo "No. KIP Kuliah    : " . $this->nomorKipKuliah . "<br>";
        echo "Subsidi Dana Saku : Rp " . number_format($this->danaSakuSubsidi, 2, ',', '.') . "/semester<br>";
    }
}