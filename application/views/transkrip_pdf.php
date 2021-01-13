<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>

    <div style="text-align:center">
        <h2>Transkrip Nilai</h2>
    </div>

    <div style="text-align: left;">
    <?php
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "db_kampus");

    $sql = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '".$_GET['nim']."'");
    $data_mahasiswa = mysqli_fetch_array($sql)
    ?>
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $data_mahasiswa['nama_mahasiswa']; ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><?php echo $data_mahasiswa['nim']; ?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><?php echo $data_mahasiswa['jurusan']; ?></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td><?php echo $data_mahasiswa['semester']; ?></td>
            </tr>
        </table>
    </div>
    <br>
    <table id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Semester</th>
                <th>Nilai Mutu</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = mysqli_query($conn, "SELECT mahasiswa.nim, mahasiswa.nama_mahasiswa,
                matakuliah.kode_matakuliah, matakuliah.nama_matakuliah, transkrip.mutu_matakuliah,
                transkrip.semester FROM transkrip
                INNER JOIN mahasiswa ON mahasiswa.nim = transkrip.nim
                INNER JOIN matakuliah ON matakuliah.kode_matakuliah = transkrip.kode_matakuliah
                WHERE transkrip.nim = '" . $_GET['nim'] . "' AND transkrip.semester = '" . $_GET['semester'] . "'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <tr>
                    <td scope="row"><?php echo $no++; ?></td>
                    <td><?php echo $data['kode_matakuliah']; ?></td>
                    <td><?php echo $data['nama_matakuliah']; ?></td>
                    <td><?php echo $data['semester']; ?></td>
                    <td><?php echo $data['mutu_matakuliah']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>