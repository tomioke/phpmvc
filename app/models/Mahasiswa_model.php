<?php 

class Mahasiswa_model {
    // private $mhs = [
    //     [
    //         "nama" => "Tomi Irvan Oktavianto",
    //         "nim" => "1903040037",
    //         "email" => "tomiirvan@gmail.com",
    //         "jurusan" => "Teknik Informatika"

    //     ],
    //     [
    //         "nama" => "Dodi Gunawan",
    //         "nim" => "190304001",
    //         "email" => "dodi@gmail.com",
    //         "jurusan" => "Teknik Mesin"
    //     ]
    // ];

    private $table = 'mahasiswa';
    private $db;

    public function __construct() {
        // Koneksi menggunakan class Database
        $this->db = new Database;
    }

    public function getAllMahasiswa() {
        // Menjalankan query
        $this->db->query('SELECT * FROM ' . $this->table );
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}