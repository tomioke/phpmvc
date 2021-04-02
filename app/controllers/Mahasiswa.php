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
}