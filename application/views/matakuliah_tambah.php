<!-- Header -->
<?php $this->load->view('template/header.php'); ?>

<!-- Sidebar -->
<?php $this->load->view('template/sidebar.php'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Input Mata Kuliah</h1>
	
	<?php echo form_open(); ?>
        <?php
        if ($this->input->post() and $this->form_validation->run() === FALSE) {
            echo "<div class='alert alert-warning'>";
            echo validation_errors();
            echo "</div>";
            }
        ?>
        
        <div class="form-group">
            <label for="kode_matakuliah">Kode Mata Kuliah</label>
            <?php echo form_input('kode_matakuliah', set_value('kode_matakuliah'), 'class="form-control" placeholder="Isi Kode Mata Kuliah" id="kode_matakuliah"') ?>
        </div>
      
        <div class="form-group">
            <label for="nama_matakuliah">Nama Mata Kuliah</label>
            <?php echo form_input('nama_matakuliah', set_value('nama_matakuliah'), 'class="form-control" placeholder="Isi Nama Mata Kluliah" id="nama_matakuliah"') ?>
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
                <a href="<?php echo site_url('/matakuliah'); ?>"></a>
        </div>
    <?php form_close(); ?>
</div>

    <!-- Footer -->
    <?php $this->load->view('template/footer.php'); ?>