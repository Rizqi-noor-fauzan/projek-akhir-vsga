<?php include 'connection.php' ?>

<div class="container">
  <h3 class="text-center mt-4 text-capitalize">tour package list</h3>

  <!-- Button Modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Travel
    Package</button>
  <!-- Button Modal End -->

  <!-- Modal  -->
  <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Tour Package</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="paketAction.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="mb-3">
              <label for="nama_paket" class="form-label">Tour Package Name: </label>
              <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description </label>
              <textarea class="form-control" id="description" rows="3" name="description" required> </textarea>
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Image Package </label>
              <input type="file" class="form-control" id="formFile" name="formFile" accept="image/*" name="formFile"
                onchange="previewImage(event)" required>
            </div>
            <div class="mb-3">
              <img id="image" width="20%" alt=""> <br />
              <script>
              let previewImage = function(event) {
                let output = document.getElementById('image');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                  URL.revokeObjectURL(output.src)
                }
              }
              </script>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="save-package">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal  End -->

  <!-- Table Package -->
  <div class="table-responsive-lg">
    <table class="table table-striped table-hover table-bordered mt-3 text-center">
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
      <?php 
      
      $no = 1;
      $result = mysqli_query($conn, "SELECT * FROM paket_wisata");
      
      while ($data = mysqli_fetch_array($result)) :
      ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['deskripsi'] ?></td>
        <td><img src="upload/<?= $data['foto']?>" height="50px" alt=""></td>
        <td>
          <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>"><i
              class="bi bi-pencil-square"></i></a>
          <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $no ?>"><i
              class="bi bi-trash"></i></a>
        </td>
      </tr>

      <!-- Modal Delete -->
      <div class="modal fade" id="modalDelete<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex=" -1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">
                Confirm Delete Tour Package Data
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="CLose"></button>
            </div>
            <form action="paketAction.php" method="POST">
              <input type="hidden" name="id_tour" value="<?= $data['id'] ?>">
              <input type="hidden" name="name_tour" value="<?= $data['foto'] ?>">
              <div class="modal-body">
                <h5 class="text-center">Are you sure you want to delete this data?
                  <span class="text-danger">
                    <?= $data['nama']?>
                  </span>
                </h5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal Delete End -->

      <!-- Modal Edit  -->
      <div class="modal fade" id="modalEdit<?= $no ?>" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Edit Package</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="paketAction.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id_order" value="<?= $data['id'] ?>">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nama_paket" class="form-label">Package Name:</label>
                  <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="<?= $data['nama'] ?>"
                    required>
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea name="description" class="form-control" id="description" rows="3"
                    required><?= $data['deskripsi']  ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Package Image</label>
                  <input type="file" class="form-control" id="formFile" accept="image/*" name="formFile"
                    onchange="editPreview(event)">

                </div>
                <div class="mb-3">
                  <img src="upload/<?= $data['foto']?>" alt="" id="imageChange<?= $no ?>" width="20%">

                  <script>
                  // Deklarasi fungsi satu kali saja di luar modal atau di bagian atas file
                  let editPreview = function(event) {
                    let output = document.getElementById('imageChange');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                      URL.revokeObjectURL(output.src); // free memory
                    }
                  }
                  </script>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal Edit End  -->
      <?php endwhile; ?>
    </table>
  </div>
  <!-- Table Package End -->
</div>