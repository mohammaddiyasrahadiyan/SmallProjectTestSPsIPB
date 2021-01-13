<!-- Header -->
<?php $this->load->view('template/header.php'); ?>

<!-- Sidebar -->
<?php $this->load->view('template/sidebar.php'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Input Mahasiswa</h1>
	
	<?php echo form_open(); ?>
        <?php
        if ($this->input->post() and $this->form_validation->run() === FALSE) {
            echo "<div class='alert alert-warning'>";
            echo validation_errors();
            echo "</div>";
            }
        ?>
        
        <div class="form-group">
            <label for="nim">NIM</label>
            <?php echo form_input('nim', set_value('nim'), 'class="form-control" placeholder="Isi NIM" id="nim"') ?>
        </div>
      
        <div class="form-group">
            <label for="nama_mahasiswa">Nama Mahasiswa</label>
            <?php echo form_input('nama_mahasiswa', set_value('nama_mahasiswa'), 'class="form-control" placeholder="Isi Nama Mahasiswa" id="nama_mahasiswa"') ?>
        </div>
                            
        <div class="form-group">
            <label for="semester">Semester</label>
            <?php echo form_input('semester', set_value('semester'), 'class="form-control" placeholder="Isi Semester" id="semester"') ?>
        </div>
                            
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <?php echo form_input('jurusan', set_value('jurusan'), 'class="form-control" placeholder="Isi Jurusan" id="jurusan"') ?>
        </div>
                            
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo site_url('/mahasiswa'); ?>"></a>
        </div>
    <?php form_close(); ?>
</div>

    <!-- Footer -->
    <?php $this->load->view('template/footer.php'); ?>