<!doctype html>
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: loginsebagaiadmin.php");
    exit;
}

include('koneksi.php');

if (isset($_POST['tombol_simpanadmin'])) {
    $edit = mysqli_query($koneksi, "UPDATE profiladmin set 
                                        username = '$_POST[nama]',
                                        tgllahir = '$_POST[tgllahir]',
                                        jeniskelamin = '$_POST[jeniskelamin]',
                                        pendidikanterakhir = '$_POST[pendidikanterakhir]'
                                        WHERE id = '1'
                                        ");
    if ($edit) {
        echo "<script>
                alert('Edit Data Sukses');
                document.location='profileadmin.php';
                </script>";
    } else {
        echo "<script>
                alert('Edit Data Gagal');
                document.location='profileadmin.php';
                </script>";
    }
}

if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        $tampil = mysqli_query($koneksi, "SELECT*FROM profiladmin WHERE id = '1'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            $nama = $data['username'];
            $tgllahir = $data['tgllahir'];
            $jeniskelamin = $data['jeniskelamin'];
            $pendidikanterakhir = $data['pendidikanterakhir'];
        }
    }
}
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="dashboard-admin.css">
    <script src="https://kit.fontawesome.com/ff3a2a3758.js" crossorigin="anonymous"></script>
    <title>Edit Profil Admin</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <a class="navbar-brand text-white p-2"><b>ADMINISTRATOR</b></a>
        <form class="form-inline my-2 my-lg-0 mr-2 ml-auto text-white">
            <a href="keluar.php" class="nav-link text-white"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>Keluar</a>
        </form>
    </nav>
    <div class="row no-gutters mt-5">
        <div class="col-md-2 bg-secondary mt-2 pr-3 pt-4" style="height:553px;">
            <ul class="nav flex-column ml-3 mb-4">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="dashboard.php"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                    <hr class=bg-secondary>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="profileadmin.php"><i class="fas fa-user fa-sm fa-fw mr-2"></i>Profil Admin</a>
                    <hr class=bg-secondary>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="pesanmasuk.php"><i class="far fa-envelope mr-2"></i>Pesan Masuk</a>
                    <hr class=bg-secondary>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="datapendaftar.php"><i class="fas fa-user-clock mr-2"></i>Data Pendaftar</a>
                    <hr class=bg-secondary>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="datapelajar.php"><i class="fas fa-user-graduate mr-2"></i>Data Pelajar</a>
                    <hr class=bg-secondary>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="datamodul.php"><i class="fas fa-book-reader mr-2"></i>Data Modul</a>
                    <hr class=bg-secondary>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="kritiksaran-admin.php"><i class="far fa-comments mr-2"></i>Kritik dan Saran</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10 p-5">
            <h4>Edit Data Profile</h4>
            <hr class=bg-secondary>
            <div class="card-body">
                <form method="post">
                    <div class="form-grup mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?= @$nama ?>" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-grup mb-3">
                        <label>Tempat, tanggal lahir</label>
                        <input type="text" name="tgllahir" value="<?= @$tgllahir ?>" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-grup mb-3">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jeniskelamin">
                            <option value="<?= @$jeniskelamin ?>"><?= @$jeniskelamin ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-grup mt-3 mb-1">
                        <label>Pendidikan Terakhir</label>
                        <select class="form-control" name="pendidikanterakhir">
                            <option value="<?= @$pendidikanterakhir ?>"><?= @$pendidikanterakhir ?></option>
                            <option value="Sekolah Menengah Umum">Sekolah Menengah Umum</option>
                            <option value="Sarjana Terapan">Sarjana Terapan</option>
                            <option value="Sarjana">Sarjana</option>
                        </select>
                    </div>
                    <a href="profileadmin.php" class="btn btn-danger" style="float : right" title="Kembali ke informasi akun">Batal</a>
                    <button type="submit" class="btn btn-success" style="float : right; margin-right: 4px" name="tombol_simpanadmin" title="Simpan perubahan informasi akun">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="dashboard-admin.js"></script>
</body>

</html>