<?php
// File: MahasiswaBidikmisi.php
require_once 'Mahasiswa.php';

class MahasiswaBidikmisi extends Mahasiswa {
    private string $nomorKipKuliah;
    private float $danaSakuSubsidi;

    public function __construct(int $id, string $nama, string $nim, int $semester, float $ukt, string $nomorKipKuliah, float $danaSakuSubsidi) {
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->nomorKipKuliah = $nomorKipKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    public function hitungTagihanSemester(): float {
        return 0.0; // Bebas biaya UKT
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "=== Spesifikasi Akademik Jalur Bidikmisi/KIP-K ===<br>";
        echo "No. KIP Kuliah    : " . $this->nomorKipKuliah . "<br>";
        echo "Subsidi Dana Saku : Rp " . number_format($this->danaSakuSubsidi, 2, ',', '.') . "/semester<br>";
    }
}