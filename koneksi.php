<?php

class Database {
    private string $host = "localhost";
    private string $username = "root";     // Sesuaikan dengan username database Anda
    private string $password = "";         // Sesuaikan dengan password database Anda
    private string $database = "db_uas_pbo_fabianadilarevianza"; // Ubah sesuai nama database Anda
    protected ?PDO $conn = null;

    /**
     * Metode untuk membuat koneksi ke database
     */
    public function getConnection(): ?PDO {
        try {
            // Menggunakan PDO untuk koneksi yang lebih aman dan berbasis OOP
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->database . ";charset=utf8mb4";
            
            $this->conn = new PDO($dsn, $this->username, $this->password);
            
            // Mengatur mode error PDO ke Exception untuk memudahkan debugging
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Mengatur default fetch mode menjadi Object agar selaras dengan properti Class
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            
        } catch (PDOException $exception) {
            // Jika koneksi gagal, tampilkan pesan error
            die("Koneksi database gagal: " . $exception->getMessage());
        }

        return $this->conn;
    }
}