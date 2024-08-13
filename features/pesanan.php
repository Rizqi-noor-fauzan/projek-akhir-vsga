<?php include "connection.php" ?>

<div class="container">
  <h3 class="text-center mt-3">
    Order List
  </h3>
  <!-- Table Order -->
  <div class="table-responsive-lg">
    <table class="table table-striped table-hover table-bordered mt-3 table-responsive">
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Nomor HP</th>
        <th>Days</th>
        <th>Homestay</th>
        <th>Transportation</th>
        <th>Service/Eat</th>
        <th>Participant</th>
        <th>Price</th>
        <th>Bill Amount</th>
        <th>Action</th>
      </tr>
      <?php 
      $no = 1;
      $result = mysqli_query($conn, "SELECT * FROM pemesanan");

      while ($data = mysqli_fetch_array($result)) :
      ?>
      <tr>
        <td>
          <?= $no++ ?>
        </td>
        <td>
          <?= $data['nama_pemesan']?>
        </td>
        <td>
          <?= $data['nomor_hp']?>
        </td>
        <td>
          <?= $data['lama_perjalanan'] ?>
        </td>
        <td>
          <?= $data['akomodasi'] ?>
        </td>
        <td>
          <?= $data['transportasi'] ?>
        </td>
        <td>
          <?= $data['service_makan'] ?>
        </td>
        <td>
          <?= $data['jumlah_peserta'] ?>
        </td>
        <td>
          <?= $data['harga_paket'] ?>
        </td>
        <td>
          <?= $data['total_tagihan'] ?>
        </td>
        <td>
          <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>">Edit</a>
          <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $no ?>">Delete</a>
        </td>
      </tr>

      <!-- Modal Delete -->
      <div class="modal fade" id="modalDelete<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm Delete Booking Data</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="orderAction.php" method="POST">
              <input type="hidden" name="id_pemesanan" value="<?= $data['id']?>">
              <div class="modal-body">
                <h5 class="text-center">Are you sure you want to delete this data?
                  <br /> <span class="text-danger">
                    <?= $data['nama_pemesan']?> - <?= $data['nomor_hp'] ?> </span>
                </h5>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger" name="delete-data">Delete</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal Delete End -->

      <!-- Modal Edit -->
      <div class="modal fade" id="modalEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Edit Order</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="orderAction.php" method="POST">
              <input type="hidden" name="id_pesanan" value="<?= $data['id'] ?>">
              <div class="modal-body">

                <div class="mb-3">
                  <label for="custom_name" class="form-label">Customer Name</label>
                  <input type="text" class="form-control" id="customer_name" name="customer_name"
                    value="<?= $data['nama_pemesan']?>" required>
                </div>


                <div class="mb-3">
                  <label for="nomor_hp" class="form-label">No Phone:</label>
                  <input type="number" class="form-control" id="nomor_hp" name="nomor_hp"
                    value="<?= $data['nomor_hp']?>" required>
                </div>

                <div class="mb-3">
                  <label for="jumlah_hari" class="form-label">Number Of Days</label>
                  <input type="number" min="1" class="form-control" id="jumlah_hari" name="jumlah_hari"
                    value="<?= $data['lama_perjalanan']?>" required>
                </div>

                <label for="" class="mb-3">Package Service</label>

                <div class="mb-3 form-check">
                  <input type="hidden" class="form-check-input" name="checkbox_penginapan" value="N">
                  <input type="checkbox" class="form-check-input" id="cb_penginapan" name="checkbox_penginapan"
                    <?= ($data['akomodasi'] == 'Y') ? 'checked' : '' ?> value="Y">
                  <label for="cb_penginapan" class="form-check-label">Penginapan Rp. 1.000.000</label>
                </div>


                <div class="mb-3 form-check">
                  <input type="hidden" class="form-check-input" name="checkbox_transportasi" value="N">
                  <input type="checkbox" class="form-check-input" id="cb_transportasi" value="Y"
                    name="checkbox_transportasi" <?= ($data['transportasi'] == 'Y') ? 'checked' : '' ?>>
                  <label for="cb_transportasi" class="form-check-label">Transportasi Rp. 1.200.000</label>
                </div>


                <div class="mb-3 form-check">
                  <input type="hidden" class="form-check-input" name="checkbox_makan" value="N">
                  <input type="checkbox" class="form-check-input" id="cb_makan" name="checkbox_makan"
                    <?= ($data['service_makan'] == 'Y') ? 'checked' : '' ?> value="Y">
                  <label for="cb_makan" class="form-check-label">Makan Rp. 700.000</label>
                </div>

                <div class=" mb-3">
                  <label for="jumlah_peserta" class="form-label">Number Of Participant:</label>
                  <input type="number" min="1" class="form-control" id="jumlahPeserta" name="jumlah_peserta"
                    value="<?= $data['jumlah_peserta']?>" required>
                </div>

                <div class="mb-3">
                  <label for="total_harga" class="form-label">Travel Package Price</label>
                  <input type="number" min="1" class="form-control" id="total_harga" name="total_harga"
                    value="<?= $data['harga_paket']?>" readonly required>
                </div>

                <div class="mb-3">
                  <label for="total_tagihan" class="form-label">Bill Amount</label>
                  <input type="number" min="1" class="form-control" id="total_tagihan" name="total_tagihan"
                    value="<?= $data['total_tagihan']?>" readonly required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="editData">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal Edit End -->
      <?php endwhile;?>
    </table>
  </div>
  <!-- Table Order End -->
  <script src="js/script.js"></script>
</div>