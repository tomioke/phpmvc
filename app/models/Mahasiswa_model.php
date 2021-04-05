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

    public function tambahDataMahasiswa($data) {
        $query = "INSERT INTO mahasiswa
                    VALUES
                    ('', :nama, :nim, :email, :jurusan)";
        
        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id) {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data) {
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    nim = :nim,
                    email = :email,
                    jurusan = :jurusan
                WHERE id = :id";
        
        $this->db->query($query);

        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}