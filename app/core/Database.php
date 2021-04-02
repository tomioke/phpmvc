<?php 

class Database {
    // Masukkan config
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    // Buat koneksi
    private $dbh; //Database handler
    private $stmt; //Statement

    public function __construct() {
        // Data Source Name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        // Configurasi dari database
        $option = [
            // Membuat database konek terus-menerus
            PDO::ATTR_PERSISTENT => True,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        // Koneksi
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    // QUERY
    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    // Bidding data untuk mencegah sql injection
    public function bind($param, $value, $type = null) {
        // Lakukan pengecekan
        if( is_null($type) ) {
            switch( true ) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                // type string
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Eksekusi query
    public function execute() {
        $this->stmt->execute();
    }

    // Apabila data yang dipanggil banyak
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    // Apabila data yang dipanggil satu
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menghitung berapa baris yang baru berubah
    public function rowCount() {
        return $this->stmt->rowCount();
    } 



}