<?php
// File: MahasiswaMandiri.php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    private string $golonganUkt;
    private string $namaWali;

    public function __construct(int $id, string $nama, string $nim, int $semester, float $ukt, string $golonganUkt, string $namaWali) {
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "=== Spesifikasi Akademik Jalur Mandiri ===<br>";
        echo "Nama Wali    : " . $this->namaWali . "<br>";
        echo "Golongan UKT : " . $this->golonganUkt . "<br>";
    }
}