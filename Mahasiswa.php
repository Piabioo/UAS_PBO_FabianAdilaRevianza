<?php

abstract class Mahasiswa {
    // Properti Terenkapsulasi (Protected) - Sesuai dengan kolom tabel database
    protected int $id_mahasiswa;
    protected string $nama_mahasiswa;
    protected string $nim;
    protected int $semester;
    protected float $tarifUktNominal; // Dipetakan dari kolom tarif_ukt_nominal

    // Constructor untuk inisialisasi properti global (induk)
    public function __construct(int $id, string $nama, string $nim, int $semester, float $ukt) {
        $this->id_mahasiswa = $id;
        $this->nama_mahasiswa = $nama;
        $this->nim = $nim;
        $this->semester = $semester;
        $this->tarifUktNominal = $ukt;
    }

    // ==================== METODE ABSTRAK ====================
    
    /*
     * Menghitung total tagihan yang harus dibayar mahasiswa pada semester berjalan.
     * Implementasi berbeda untuk Mandiri, Bidikmisi (0), atau Prestasi (potongan/subsidi).
     */
    abstract public function hitungTagihanSemester(): float;

    /**
     * Menampilkan informasi/spesifikasi akademik khusus berdasarkan jenis pembiayaan.
     * (Misal: menampilkan golongan UKT untuk Mandiri, atau instansi beasiswa untuk Prestasi).
     */
    abstract public function tampilkanSpesifikasiAkademik(): void;
    
    // ========================================================

    // Getter umum (Opsional, untuk mengakses properti terenkapsulasi dari luar class)
    public function getNamaMahasiswa(): string {
        return $this->nama_mahasiswa;
    }

    public function getNim(): string {
        return $this->nim;
    }
}