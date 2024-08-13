<?php 

include 'connection.php';

if(isset($_POST['save-order'])) {
  $query = "INSERT INTO pemesanan (nama_pemesan,
                                    nomor_hp,
                                    lama_perjalanan,
                                    akomodasi,
                                    transportasi,
                                    service_makan,
                                    jumlah_peserta,
                                    harga_paket,
                                    total_tagihan) VALUES ('$_POST[customer_name]',
                                                            '$_POST[nomor_hp]',
                                                            '$_POST[jumlah_hari]',
                                                            '$_POST[checkbox_penginapan]',
                                                            '$_POST[checkbox_transportasi]',
                                                            '$_POST[checkbox_makan]',
                                                            '$_POST[jumlah_peserta]',
                                                            '$_POST[total_harga]',
                                                            '$_POST[total_tagihan]'
                                                          );";
                                                          
    $saveData = mysqli_query($conn, $query);
    if ($saveData) {
        echo "<script>
                alert('Simpan data sukses');
                document.location = 'index.php?page=pesanan';
              </script>";
    } else {
        echo "<script>
                alert('Simpan data gagal');
                document.location = 'index.php?page=pesanan';
              </script>";
    }
}

if(isset($_POST['delete-data'])) {
  
  $deleteData = mysqli_query($conn, "DELETE FROM pemesanan WHERE id = '$_POST[id_pemesanan]' ");
  
    if ($deleteData) {
        echo "<script>
                alert('Hapus data sukses');
                document.location = 'index.php?page=pesanan';
              </script>";
    } else {
        echo "<script>
                alert('Hapus data gagal');
                document.location = 'index.php?page=pesanan';
              </script>";
    }
  
}

    if(isset($_POST['editData'])) {
      $edit = mysqli_query($conn, "UPDATE pemesanan SET 
                                nama_pemesan = '$_POST[customer_name]',
                                nomor_hp = '$_POST[nomor_hp]',
                                lama_perjalanan = '$_POST[jumlah_hari]',
                                akomodasi = '$_POST[checkbox_penginapan]',
                                transportasi = '$_POST[checkbox_transportasi]',
                                service_makan = '$_POST[checkbox_makan]',
                                jumlah_peserta = '$_POST[jumlah_peserta]',
                                harga_paket = '$_POST[total_harga]',
                                total_tagihan = '$_POST[total_tagihan]'
                              WHERE id = '$_POST[id_pesanan]'");
              
        if ($edit) {
          echo "<script>
                  alert('Ubah data sukses');
                  document.location = 'index.php?page=pesanan';
                </script>";
         } else {
          echo "<script>
                  alert('Ubah data gagal');
                  document.location = 'index.php?page=pesanan';
                </script>";
      }

    }

?>