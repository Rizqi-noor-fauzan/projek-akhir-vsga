<?php 

if(isset($_GET['page'])) {
  $page= $_GET['page'];
  switch($page) {
    case 'home':
      include 'features/home.php';
      break;
    case 'paket':
      include 'features/paket.php';
      break;
    case 'pesanan':
      include 'features/pesanan.php';
      break;
  }
} else {
  include 'features/home.php';
}


?>