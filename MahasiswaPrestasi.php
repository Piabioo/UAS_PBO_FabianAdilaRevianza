<?php
// File: MahasiswaPrestasi.php
require_once 'Mahasiswa.php';

class MahasiswaPrestasi extends Mahasiswa {
    private string $namaInstansiBeasiswa;
    private float $minimalIpkSyarat;

    public function __construct(int $id, string $nama, string $nim, int $semester, float $ukt, string $namaInstansiBeasiswa, float $minimalIpkSyarat) {
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->namaInstansiBeasiswa = $namaInstansiBeasiswa;
        $this->minimalIpkSyarat = $minimalIpkSyarat;
    }

    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal; 
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "=== Spesifikasi Akademik Jalur Prestasi ===<br>";
        echo "Pemberi Beasiswa   : " . $this->namaInstansiBeasiswa . "<br>";
        echo "Syarat Minimal IPK : " . number_format($this->minimalIpkSyarat, 2) . "<br>";
    }
}