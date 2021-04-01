<?php 

class Mahasiswa_model {
    private $mhs = [
        [
            "nama" => "Tomi Irvan Oktavianto",
            "nim" => "1903040037",
            "email" => "tomiirvan@gmail.com",
            "jurusan" => "Teknik Informatika"

        ],
        [
            "nama" => "Dodi Gunawan",
            "nim" => "190304001",
            "email" => "dodi@gmail.com",
            "jurusan" => "Teknik Mesin"
        ]
    ];

    public function getAllMahasiswa() {
        return $this->mhs;
    }
}