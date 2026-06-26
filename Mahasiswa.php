<?php
// File: Mahasiswa.php

abstract class Mahasiswa {
    // Atribut Terenkapsulasi (Sesuai dengan kolom tabel database)
    protected int $id_mahasiswa;
    protected string $nama_mahasiswa;
    protected string $nim;
    protected int $semester;
    protected float $tarifUktNominal;

    // Constructor Induk
    public function __construct(int $id, string $nama, string $nim, int $semester, float $ukt) {
        $this->id_mahasiswa = $id;
        $this->nama_mahasiswa = $nama;
        $this->nim = $nim;
        $this->semester = $semester;
        $this->tarifUktNominal = $ukt;
    }

    // Deklarasi Metode Abstrak
    abstract public function hitungTagihanSemester(): float;
    abstract public function tampilkanSpesifikasiAkademik(): void;

    // Getter untuk membantu menampilkan properti terenkapsulasi
    public function getNamaMahasiswa(): string { return $this->nama_mahasiswa; }
    public function getNim(): string { return $this->nim; }
    public function getSemester(): int { return $this->semester; }
}