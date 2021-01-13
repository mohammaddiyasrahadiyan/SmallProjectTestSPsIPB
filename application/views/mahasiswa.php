<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>

    <!-- Tambah Data -->
    <div>
    <?php echo anchor('/mahasiswa/tambah_mahasiswa','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mahasiswa</button>') ?>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>NO</th>
                        <th>NIM</th>
                        <th>NAMA MAHASISWA</th>
                        <th>SEMESTER</th>
                        <th>JURUSAN</th>
                        <th colspan="3">AKSI</th>
                    </tr>

                    <?php
                    $no = 1;
                    foreach($daftarMahasiswa as $key => $mhs) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $mhs['nim']; ?></td>
                            <td><?php echo $mhs['nama_mahasiswa']; ?></td>
                            <td><?php echo $mhs['semester']; ?></td>
                            <td><?php echo $mhs['jurusan']; ?></td>
                            <td class="center">
                                <a href="<?php echo site_url('mahasiswa/update_mahasiswa/' . $mhs['nim']); ?>">Edit</a> |
                                <a href="<?php echo site_url('mahasiswa/hapus_mahasiswa/' . $mhs['nim']); ?>"onclick="return confirm('Hapus: <?php echo $mhs['nim'].' - '. $mhs['nama_mahasiswa']; ?>?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->