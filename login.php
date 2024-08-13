<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container form-container">
    <div class="card shadow-lg form-card">
      <?php
      if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        require_once "connection.php";
        $sql = "SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC );
        if($user) {
          if(password_verify($password, $user['password'])) {
            session_start();
              $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email']
                  ];
                header("Location: index.php");
                die();
          } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";
          }
        } else {
         echo "<div class='alert alert-danger'>Email Does Not Match</div>"; 
        }
      
      }
    ?>
      <form action="login.php" method="POST">
        <div class="text-center mb-5">
          <h2 class="text-primary text-capitalize fw-bold">Login to your account</h2>
        </div>
        <div class="form-group mb-3">
          <input type="email" placeholder="Input Your Email" name="email" class="form-control">
        </div>
        <div class="form-group mb-3">
          <input type="password" placeholder="Input Your Password" name="password" class="form-control">
        </div>
        <div class="form-btn mb-3">
          <input type="submit" value="Login" name="login" class="btn btn-primary w-100">
        </div>
        <div class="text-center">
          <p>Not have an account? <a href="register.php">Register</a></p>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>

</html>