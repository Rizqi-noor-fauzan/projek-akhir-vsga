<div class="container">
  <!-- Navbar  -->
  <nav class="navbar navbar-expand-lg rounded-4 bg-light shadow-md sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php?page=home">Travellin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?page=home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-capitalize" href="index.php?page=paket">tour packages </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=pesanan">Order Page</a>
          </li>
        </ul>
        <div class="right-links d-flex align-items-center">
          <span class="me-3">Welcome, <?php echo htmlspecialchars($username); ?>!</span>
          <a href="logout.php" class="fw-bold fs-6">Log Out</a>
          <a class="ms-3 text-dark" href="index.php?page=pesanan"><i class="bi bi-cart2"></i></a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->
</div>

<!-- Carousel Swiper -->
<div class="container-fluid px-lg-4 mt-4">
  <div class="swiper swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide ">
        <img src="images/img-wisata-1.jpg" height="500px" class="w-100 d-block rounded-3 object-fit-cover" />
      </div>
      <div class="swiper-slide ">
        <img src="images/img-wisata-2.jpg" height="500px" class="w-100 d-block rounded-3 object-fit-cover" />
      </div>
      <div class="swiper-slide ">
        <img src="images/img-wisata-3.jpg" height="500px" class="w-100 d-block rounded-3 object-fit-cover" />
      </div>
      <div class="swiper-slide ">
        <img src="images/img-wisata-4.jpg" height="500px" class="w-100 d-block rounded-3 object-fit-cover" />
      </div>
      <div class="swiper-slide ">
        <img src="images/img-wisata-5.jpg" height="500px" class="w-100 d-block rounded-3 object-fit-cover" />
      </div>

    </div>
  </div>
</div>
<!-- Carousel Swiper End -->