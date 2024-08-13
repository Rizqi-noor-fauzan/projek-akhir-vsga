<?php
session_start();
session_destroy();

echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              title: 'Logout Berhasil!',
              text: 'Anda telah keluar.',
              icon: 'success',
              confirmButtonText: 'OK'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = 'login.php';
              }
          });
      });
      </script>";

exit();

?>