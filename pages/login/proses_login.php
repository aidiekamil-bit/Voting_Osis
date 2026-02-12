<?php
//sesion adalah tempat menyimpan data sementara di server untuk mengingat siapa yang sedang login
session_start();
include "../header/config.php";

//jika tombol login diklik
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //cek db
    $query = mysqli_query($koneksi, "select * from tbl_siswa where username='$username' and password='$password'");

    //kalau datanya ada
    if (mysqli_num_rows($query) == 1){
        $data = mysqli_fetch_assoc($query);
        //var data (id, nama, kelas, jurusan ...)

        //simpan dalam session
        $_SESSION['login'] = true;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['id_siswa'] = $data['id_siswa'];

        //kalau login berhasil kita arahkan ke index.php
        echo" <script>
        alert('Login Berhasil');
        window.location= '../../index.php';
        </script> ";
    }else{
        //login gagal
        //kalau login berhasil kita arahkan ke index.php
         echo" <script>
        alert('Login Gagal');
        window.location= '../../login.php';
        </script> ";
    }
}

?>