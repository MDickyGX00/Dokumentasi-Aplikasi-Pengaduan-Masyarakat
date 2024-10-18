<?php
session_start();

// Jika cookie remember me ada, langsung login
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    include 'koneksi.php';
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];

    $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
    $query = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);

        // Set session
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];

        // Redirect sesuai level user
        if ($data['level'] == "admin") {
            header("location:admin/admin.php");
        } elseif ($data['level'] == "petugas") {
            header("location:petugas/petugas.php");
        }
        exit;
    }
}
?>


<!-- HTML bagian login form tetap sama -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta dan CSS -->
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Form Login Petugas -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Petugas</h1>
                                    </div>
                                    <form class="user" method="post" action="proses-login2.php">
                                        <div class="form-group">
                                            <input name="username" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Username Anda...">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Masukan Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="rememberMe" name="remember_me">
                                                <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                            </div>
                                        </div>
                                        <button href="index.html" type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <a href="index.php" class="btn btn-success btn-user btn-block">Kembali Ke Login Masyarakat</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
</body>
</html>
