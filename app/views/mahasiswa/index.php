<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <!-- Hanya menampilkan nama -->
            <ul class="list-group">
                <?php foreach( $data['mhs'] as $mhs ) : ?> 
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $mhs['nama']; ?>
                    <a href="<?php echo BASEURL; ?>/mahasiswa/detail/<?php echo $mhs['id']; ?> "class="badge badge-pill badge-info">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>