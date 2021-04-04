<div class="container mt-3">
    <div class="row">
      <div class="col-lg-6">
        <!-- Menampilkan message flash -->
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
        Tambah Data
        </button>
            <h3 class="mt-4">Daftar Mahasiswa</h3>
            <!-- Hanya menampilkan nama -->
            <ul class="list-group">
                <?php foreach( $data['mhs'] as $mhs ) : ?> 
                    <li class="list-group-item">
                    <?php echo $mhs['nama']; ?>
                    <a href="<?php echo BASEURL; ?>/mahasiswa/hapus/<?php echo $mhs['id']; ?> "class="badge badge-pill badge-danger float-right ml-2" onclick="sweet()">HAPUS</a>
                    <a href="<?php echo BASEURL; ?>/mahasiswa/ubah/<?php echo $mhs['id']; ?> "class="badge badge-pill badge-success float-right ml-2 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?php echo $mhs['id']; ?>">UBAH</a>
                    <a href="<?php echo BASEURL; ?>/mahasiswa/detail/<?php echo $mhs['id']; ?> "class="badge badge-pill badge-info float-right ml-2">DETAIL</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo BASEURL; ?>/mahasiswa/tambah" method="post">
        <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukan Email Anda" name="nama">
            </div>

            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" placeholder="Masukan NIM Anda" name="nim">
            </div>
                    
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukan Email Anda" name="email">
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Sipil">Teknik Sipil</option>
                <option value="Teknik Kimia">Teknik Kimia</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function sweet() {
    return confirm('Yakin anda mau hapus?');
  }
</script>