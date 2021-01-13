<!-- Header -->
<?php $this->load->view('template/header.php'); ?>

<!-- Sidebar -->
<?php $this->load->view('template/sidebar.php'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Input Transkrip Nilai</h1>
	
	<?php echo form_open(); ?>
        <?php
        if ($this->input->post() and $this->form_validation->run() === FALSE) {
            echo "<div class='alert alert-warning'>";
            echo validation_errors();
            echo "</div>";
            }
        ?>
        
        <div class="form-group">
            <label for="nim">NIM | Nama Mahasiswa</label>
            <select class="form-control" name="nim" id="nim">
                <option value="">Pilih..</option>
                <?php
                foreach ($dataTaranskrip as $key => $mhs) {
                    echo "<option value='" . $mhs['nim'] . "'>";
                    echo $mhs['nim'] . " | " . $mhs['nama_mahasiswa'];
                    echo "</option>";
                }
                ?>
            </select>
        </div>
      
        <div class="form-group">
            <label for="semester">Semester</label>
            <select class="form-control" name="semester" id="semester">
                <option value="">Pilih..</option>
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
                            
        <div class="form-group">
            <label for="kode_matakuliah">Kode Mata Kuliah | Nama Mata Kuliah</label>
            <select class="form-control" name="kode_matakuliah" id="kode_matakuliah">
                <option value="">Pilih..</option>
                <?php
                $conn = mysqli_connect("localhost", "root", "");
                        mysqli_select_db($conn, "db_kampus");
                $sql = mysqli_query($conn, "SELECT * FROM matakuliah");
                    while ($data = mysqli_fetch_array($sql)) {
                ?>
                <option value="<?php echo $data['kode_matakuliah'] ?>">
                <?php echo $data['kode_matakuliah'] . " | " .$data['nama_matakuliah'] ?></option>
                <?php } ?>
            </select>
        </div>
                            
        <div class="form-group">
            <label for="mutu_matakuliah">Nilai Mutu Mata Kuliah</label>
            <select class="form-control" name="mutu_matakuliah" id="mutu_matakuliah">
                <option value="">Pilih..</option>
                <option value="A">A</option>
                <option value="AB">AB</option>
                <option value="B">B</option>
                <option value="BC">BC</option>
                <option value="C">C</option>
                <option value="CD">CD</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
        </div>
                            
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo site_url('/transkrip'); ?>"></a>
        </div>
    <?php form_close(); ?>
</div>

    <!-- Footer -->
    <?php $this->load->view('template/footer.php'); ?>
