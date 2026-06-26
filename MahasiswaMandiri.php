<?php
// File: MahasiswaMandiri.php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    // Properti Spesifik
    private string $golonganUkt;
    private string $namaWali;

    public function __construct(int $id, string $nama, string $nim, int $semester, float $ukt, string $golonganUkt, string $namaWali) {
        parent::__construct($id, $nama, $nim, $semester, $ukt);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    // Overriding: Perhitungan tagihan skema Mandiri
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal + 100000.00;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "=== Spesifikasi Akademik Jalur Mandiri ===<br>";
        echo "Nama Wali    : " . $this->namaWali . "<br>";
        echo "Golongan UKT : " . $this->golonganUkt . "<br>";
    }
}