<?php include 'connection.php' ?>

<!-- Paket Wisata -->

<!-- Content -->
<div class="container">
  <div class="row">
    <h2 class="text-center fw-semibold mt-2 mb-2">Paket Wisata</h2>
    <div class="col-lg-8 col-md-12 d-flex justify-content-around align-items-center gap-2">
      <div class="row">
        <div class="col-md-6 col-lg-6">
          <?php 
          $result = mysqli_query($conn, "SELECT * FROM paket_wisata LIMIT 6");
           
  
          while ($data = mysqli_fetch_array($result)):
          ?>
          <div class="card mt-3" style="width: 100%">
            <img src="upload/<?= $data['foto']?>" alt="" class="card-img-top mt-3">
            <div class="card-body">
              <h5 class="card-title">
                <?= $data['nama'] ?>
              </h5>
              <p class="card-text">
                <?= $data['deskripsi']?>
              </p>
              <!-- Modal Button -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add
                Order Package</button>

              <!-- Modal Order Start -->
              <div class="modal fade" id="addModal" data-bs-backdrop="static" tabindex="-1"
                aria-label="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <form action="orderAction.php" method="POST">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Order Package</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="custom_name" class="form-label">Customer Name</label>
                          <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                        </div>

                        <div class="mb-3">
                          <label for="nomor_hp" class="form-label">No Phone:</label>
                          <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" required>
                        </div>


                        <div class="mb-3">
                          <label for="jumlah_hari" class="form-label">Number Of Days</label>
                          <input type="number" min="1" class="form-control" id="jumlah_hari" name="jumlah_hari"
                            value="0" required>
                        </div>

                        <label for="" class="mb-3">Package Service</label>


                        <div class="mb-3 form-check">
                          <input type="hidden" class="form-check-input" name="checkbox_penginapan" value="N">
                          <input type="checkbox" class="form-check-input" id="cb_penginapan" name="checkbox_penginapan"
                            value="Y">
                          <label for="checkbox_penginapan" class="form-check-label">Penginapan Rp. 1.000.000</label>
                        </div>

                        <div class="mb-3 form-check">
                          <input type="hidden" class="form-check-input" name="checkbox_transportasi" value="N">
                          <input type="checkbox" class="form-check-input" id="cb_transportasi" value="Y"
                            name="checkbox_transportasi">
                          <label for="checkbox_transportasi" class="form-check-label">Transportasi Rp. 1.200.000</label>
                        </div>

                        <div class="mb-3 form-check">
                          <input type="hidden" class="form-check-input" name="checkbox_makan" value="N">
                          <input type="checkbox" class="form-check-input" id="cb_makan" name="checkbox_makan" value="Y">
                          <label for="checkbox_makan" class="form-check-label">Makan Rp. 700.000</label>
                        </div>

                        <div class=" mb-3">
                          <label for="jumlah_peserta" class="form-label">Number Of Participant:</label>
                          <input type="number" min="1" class="form-control" id="jumlahPeserta" name="jumlah_peserta"
                            value="0" required>
                        </div>

                        <div class="mb-3">
                          <label for="total_harga" class="form-label">Travel Package Price</label>
                          <input type="number" min="1" class="form-control" id="total_harga" name="total_harga"
                            value="0" readonly required>
                        </div>

                        <div class="mb-3">
                          <label for="total_tagihan" class="form-label">Bill Amount</label>
                          <input type="number" min="1" class="form-control" id="total_tagihan" name="total_tagihan"
                            value="0" readonly required>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="save-order">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Modal Order End -->
            </div>
          </div>
          <?php endwhile?>
          <!-- End -->
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-12">
      <!-- Video 1 -->
      <div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title">Video Promosi</h5>
        </div>
        <div style="overflow:hidden;position: relative;">
          <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" height="200"
            type="text/html"
            src="https://www.youtube.com/embed/8xCbbV5r2P0?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0">
          </iframe>
        </div>
      </div>
      <!-- Video 2 -->
      <div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title">Video Promosi</h5>
        </div>
        <div style="overflow:hidden;position: relative;">
          <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" height="200"
            type="text/html"
            src="https://www.youtube.com/embed/8xCbbV5r2P0?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Content End -->

<!-- About  -->
<div class="container text-center p-5" id="about">
  <h1 class="fw-semibold">About Us</h1>
  <p class="text-capitalize">travellin is a very simple engineering travel web that I made to fulfill my final project
    vsga.
  </p>
</div>
<!-- About  End -->
<!-- Paket Wisata End -->
<script src="js/script.js"></script>