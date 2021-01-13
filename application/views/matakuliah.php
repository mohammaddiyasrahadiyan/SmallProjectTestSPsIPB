<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mata Kuliah</h1>

    <!-- Tambah Data -->
    <div>
    <?php echo anchor('/matakuliah/tambah_matakuliah','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mata Kuliah</button>') ?>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>NO</th>
                        <th>KODE MATA KULIAH</th>
                        <th>NAMA MATA KULIAH</th>
                        <th>SEMESTER</th>
                        <th>JURUSAN</th>
                        <th colspan="3">AKSI</th>
                    </tr>

                    <?php
                    $no = 1;
                    foreach($daftarMataKuliah as $key => $mk) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $mk['kode_matakuliah']; ?></td>
                            <td><?php echo $mk['nama_matakuliah']; ?></td>
                            <td><?php echo $mk['semester']; ?></td>
                            <td><?php echo $mk['jurusan']; ?></td>
                            <td class="center">
                                <a href="<?php echo site_url('matakuliah/update_matakuliah/' .$mk['kode_matakuliah']); ?>">Edit</a> |
                                <a href="<?php echo site_url('matakuliah/hapus_matakuliah/' .$mk['kode_matakuliah']); ?>"onclick="return confirm('Hapus: <?php echo $mk['kode_matakuliah'] . ' - ' . $mk['nama_matakuliah']; ?>?')">Hapus</a>
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