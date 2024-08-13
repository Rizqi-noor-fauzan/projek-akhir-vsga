<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Ambil informasi pengguna dari session
$username = $_SESSION['user']['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HomePage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous">
  <!-- Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <!-- Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <?php include 'layouts/header.php' ?>
  <?php include 'libs.php' ?>
  <?php include 'layouts/footer.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>

  <!-- Swiper -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
  var swiper = new Swiper(".swiper-container", {
    spaceBetween: 30,
    effect: "fade",
    loop: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    }
  });
  </script>
</body>

</html>