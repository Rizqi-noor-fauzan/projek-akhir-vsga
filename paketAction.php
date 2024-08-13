<?php 

include "connection.php";
if(isset($_POST['save-package'])) {

  $fileNama = $_FILES['formFile']['name']; 
  $dirname = "upload/";

  if(!move_uploaded_file($_FILES['formFile']['tmp_name'], $dirname . $fileNama)) {
    return;
  }

  $query = "INSERT INTO paket_wisata (nama, deskripsi, foto) VALUES ('$_POST[nama_paket]', '$_POST[description]', '$fileNama');";
  
  $result = mysqli_query($conn, $query);

  if($result) {
    echo "
    <script>
    alert('Simpan data sukses');
    document.location = 'index.php?page=paket';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('Simpan data gagal');
    document.location = 'index.php?page=paket'
    </script>
    ";
  }
}


if(isset($_POST['delete'])) {

  $delete = mysqli_query($conn, "DELETE FROM paket_wisata WHERE id = '$_POST[id_tour]' ");
  
  unlink('upload/'. $_POST['name_tour']);

  if($delete) {
    echo "
    <script>
    alert('Hapus data sukses');
    document.location  = 'index.php?page=paket';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('Hapus data gagal');
    document.location = 'index.php?page=paket';
    </script>
    ";
  }
}


if(isset($_POST['update'])) {
  
  $query = "UPDATE paket_wisata SET 
                        nama = '$_POST[nama_paket]',
                        deskripsi = '$_POST[description]'
            WHERE id = '$_POST[id_order]'";

      if($_FILES['formFile']['size'] != 0) {
       
        unlink('upload/' . $_POST['name_tour']);

        $fileNama = $_FILES['formFile']['name'];
        $dirname = "upload/";

        if(!move_uploaded_file($_FILES['formFile']['tmp_name'], $dirname . $fileNama)) {
          echo "
            <script>
            alert('Ubah data gagal');
            document.location = 'index.php?page=paket';
            </script>
          ";
        }

        $query = "UPDATE paket_wisata SET 
                              nama = '$_POST[nama_tour]';
                              deskripsi = '$_POST[desription]';
                              foto = '$fileNama' 
                 WHERE id '$_POST[id_tour]'";
      } 

      $update = mysqli_query($conn, $query);

      if($update) {
        echo "
        <script>
        alert('Ubah data sukses');
        document.location = 'index.php?page=paket'
        </script>
        ";
      } else {
        echo "
       <script>
       alert('Ubah Data gagal')l
       document.location = 'index.php?page=paket';
       </script> 
        ";
      }
    
}

?>