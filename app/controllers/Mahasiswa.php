<?php 

class Mahasiswa extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        // Membuat halaman tambah data mahasiswa
        if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
            // Menjalankan flasher
            Flasher::setFlash(' Berhasil', 'ditambahkan', 'success');
            // arahkan ke halaman mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }else {
            // Jika gagal maka,
            // Menjalankan flasher
            Flasher::setFlash(' Gagal', 'ditambahkan', 'danger');
            // arahkan ke halaman mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id) {
        // Membuat halaman hapus data mahasiswa
        if( $this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ) {
            // Menjalankan flasher
            Flasher::setFlash(' Berhasil', 'dihapus', 'success');
            // arahkan ke halaman mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }else {
            // Jika gagal maka,
            // Menjalankan flasher
            Flasher::setFlash(' Gagal', 'dihapus', 'danger');
            // arahkan ke halaman mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }   
    }

    public function getubah() {
        // Meminta data mahasiswa
        echo json_encode( $this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']) );
    }

    public function ubah() {
        // Membuat halaman ubah data mahasiswa
        if( $this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ) {
            // Menjalankan flasher
            Flasher::setFlash(' Berhasil', 'diubah', 'success');
            // arahkan ke halaman mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }else {
            // Jika gagal maka,
            // Menjalankan flasher
            Flasher::setFlash(' Gagal', 'diubah', 'danger');
            // arahkan ke halaman mahasiswa
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data ['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

}