<?php
require_once('connect/conn.php');
$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['submit'])) {
    $cek_data = mysqli_query($conn, "SELECT * FROM users WHERE username ='$username'");
    $hasil = mysqli_fetch_assoc($cek_data);
    $nama = $hasil['username'];
    $enkripsipassword = $hasil['password'];
    $role = $hasil['role'];

    $row = mysqli_num_rows($cek_data);
    if ($row > 0) {
        if (password_verify($password, $enkripsipassword)) {
            session_start();
            $_SESSION['nama'] = $hasil['name'];
            $_SESSION['role'] = $role;
            $_SESSION['login'] = 'login';

            header('location:index.php');
        } else {
            echo "<script>alert('Username dan Password salah!');</script>";
            echo "<script>location= 'login.php'</script>";
        }
    } else {
        echo "<script>alert('Username dan Password salah!');</script>";
        echo "<script>location= 'login.php'</script>";
    }
}
