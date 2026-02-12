<?php
session_start();
// kalau session login belum ada, arahkan ke halaman login lagi
 if (!isset($_SESSION['login'])){
   header("Location: login.php");
 }
 include "pages/header/config.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - QuickStart Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top ">
    <div class="container-fluid container-xl position-relative d-flex align-items-center bg-opacity-10">

      <a href="index.php
      " class="logo d-flex align-items-center me-auto " style="width:500px;">
        <img src="assets/img/c2da4aac-23fa-4b34-a501-0c1f7b2822bf-removebg-preview.png" class="w-10" alt="">
        <h1 class="sitename">VoteGo</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        
          
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.php#about"><?= $_SESSION['nama']; ?></a>

      <a href="logout.php" onclick="return confirm('Yakin mau logout?')"
      class="btn btn-danger"
      style="font-size: 14px; padding: 8px 25px;
      margin: 0 0 0 10px; border-radius: 50px;
      transition: 0.3s;">Logout</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="assets/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center d-flex justify-content-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Voting Calon <span>Ketua Osis</span></h1>
          <h3 data-aos="fade-up" data-aos-delay="100" class="pt-3">Klik Sekarang, Tentukan Masa Depan!<br></h3>

          <form action="pages/voting/proses_vote.php" method="POST" id="formVote">
         <input type="hidden" name="id_calon" id="id_calon">

          <div class="container ">
            <div class="row justify-content-center g-4">
              <?php
                     $no=1;
                  $query = mysqli_query($koneksi, "select * from tbl_calon_ketua_osis");
                  foreach($query as $data): 

                  
                  
                  ?>
              <div class="col-md-4">
                <div class="card calon-card mt-5 text-center shadow d-flex align-items-center" onclick="pilihCalon(<?= $data['id_calon'] ?>, this)">
                <!-- Kalau tombol ini di klik, jalankan fungsi pilihCalon sambil kiri data id calon ini onclick="pilihCalon(5,this)"
                This : Tombol yang sedang diklik     -->

                  <span class ="badge bg-primary position-absolute top-0 start-0 m-2 fs-3 px-3 py-2">
                    <?= sprintf("%02d", $no++) ?>
                  </span>
                  <img src="assets<?= $data['foto']?>" class="card-img-top" style="height:400px; object-fit:cover;"alt="..." >
                   <div class="card-body">
                    <h5 class="card-title"><?= $data['nama_calon']?></h5>
                  <p class="card-text">Visi: <?= $data['visi']?></p>
                   <p class="card-text">Misi: <?= $data['misi']?></p>
               
              </div>
              </div>
                  </div>
             <?php endforeach ?>

              
                  </div>
              
            
            <div class="text-center mt-4">
              <button
              type="submit"
              class="btn btn-lg btn-primary px-5"
              id="btnPilih"
              disable>
              PILIH
</button>
                  </div>
  
 </form>

         
            </div>

</div>

         
                
                  

    </section><!-- /Hero Section -->

    
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    // buat fungsi bernama pilihCalon yang menerima 2 data.
    function pilihCalon(id, card){
    // isi hidden input
    // kode ini buat nyimpen nomor calon yang kita klik, supaya nanti bisa dikirim ke database
    document.getElementById("id_calon").value = id;

    //aktifkan tombol kirim
    document.getElementById('btnPilih').disable = false;
    
    //ambil semua element yang punya nama class calon-card, lalu simpan dalam var semua_card

    let semua_card = document.querySelectorAll(".calon-card");

    //reset semua tanda di card
    semua_card.forEach(kartu_satuan => {kartu_satuan.classList.remove("border-info", "border-3");});

    //beri tanda bagi card yang dipilih
    card.classList.add("border-info", "border-3");

    }
  </script>
  
</body>

