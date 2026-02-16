

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
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
            
        </head>
        <body>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
             <script>
             
       Swal.fire({
    title: 'Berhasil Login!',
        text: 'Selamat Datang ! " . $data['nama'] . "!' ,
        icon: 'success',
        showConfirmButton: false,
        timer: 3000
        }).then(() => {
        window.location.href = '../../index.php';
        });
        </script> ';
        </body>
        </html>";
    }else{
        //login gagal
        //kalau login berhasil kita arahkan ke index.php
         echo"<!DOCTYPE html>
         <html lang='en'>
         <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
         </head>
         <body>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
             <script>
              
       Swal.fire({
    title: 'Login Gagal!',
        text: 'Username atau Password salah!' ,
        icon: 'error',
        ConfirmButtonText: 'Coba Lagi',
       
        }).then(() => {
        window.location.href = '../../login.php';
        });
        
        </script> 
         </body>
         </html> ";
    }
}

?>
 
        