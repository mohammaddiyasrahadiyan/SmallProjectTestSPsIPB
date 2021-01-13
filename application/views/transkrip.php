<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transkrip Nilai</h1>

    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo site_url('/transkrip/tambah_transkrip'); ?>">
            <button class="btn btn-outline btn-primary" type="submit">Tambah Transkrip Baru</button>
            </a>&nbsp;
            <button class="btn btn-outline btn-success" type="button" data-toggle="modal" data-target="#modalFilter">Download Transkrip</button>
        </div>

        <!-- Modal -->
        <div id="modalFilter" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                        <form action="<?php echo site_url('/pdf'); ?>" target="_blank" method="get">
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <select class="form-control" name="nim" id="nim">
                                    <option value="">Pilih..</option>
                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "");
                                    mysqli_select_db($conn, "db_kampus");
                                    $sql = mysqli_query($conn, "SELECT nim, nama_mahasiswa FROM mahasiswa");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    ?>
                                        <option value="<?php echo $data['nim'] ?>">
                                            <?php echo $data['nim'] . " | " . $data['nama_mahasiswa'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="semester">Transkrip Semester</label>
                                <select class="form-control" name="semester" id="semester">
                                    <option value="">Pilih</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                    
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline btn-success">Proses</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Nilai</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>NO</th>
                        <th>NIM</th>
                        <th>NAMA MAHASISWA</th>
                        <th>NAMA MATA KULIAH</th>
                        <th>SEMESTER</th>
                        <th>HURUF MUTU</th>
                        <th colspan="3">AKSI</th>
                    </tr>

                    <?php
                    $no = 1;
                    foreach ($daftarTranskrip as $key => $transkrip) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $transkrip['nim']; ?></td>
                            <td><?php echo $transkrip['nama_mahasiswa']; ?></td>
                            <td><?php echo $transkrip['nama_matakuliah']; ?></td>
                            <td><?php echo $transkrip['semester']; ?></td>
                            <td><?php echo $transkrip['mutu_matakuliah']; ?></td>
                            <td class="center">
                                <a href="<?php echo site_url('transkrip/update_transkrip/' . $transkrip['id_transkrip']); ?>">Edit</a> |
                                <a href="<?php echo site_url('transkrip/hapus_transkrip/' . $transkrip['id_transkrip']); ?>" onclick="return confirm('Hapus: <?php echo $transkrip['nama_mahasiswa'] . ' - ' .$transkrip['nama_matakuliah']; ?>?')">Hapus</a>
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