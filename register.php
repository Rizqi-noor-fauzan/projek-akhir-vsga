<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container form-container">
    <div class="card shadow-lg form-card">
      <?php 
    
    if(isset($_POST['submit'])) {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];

      $passwordHash = password_hash($password, PASSWORD_DEFAULT);
      
      $errors = array();

      if(empty($username) OR empty ($email) OR empty ($password) OR empty ($confirm_password)) {
        array_push($errors, "All Field Are Required");
      } 
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
      }
      if(strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
      }
      if($password !== $confirm_password ) {
        array_push($errors, "Password and Confirm Password do not match");
      }
      require_once "connection.php";
      $sql = "SELECT * FROM users WHERE email = '$email'";
      $result = mysqli_query($conn, $sql);
      $rowCount = mysqli_num_rows($result);

      if($rowCount > 0) {
        array_push($errors, "Email already exists");
      }

      if(count($errors) > 0 ) {
        foreach($errors as $error) {
          echo "<div class='alert alert-danger'>$error</div>";
        }
      } else {
        $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?) ";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        if($prepareStmt) {
          mysqli_stmt_bind_param($stmt,"sss", $username, $email, $passwordHash);
          mysqli_stmt_execute($stmt);
          echo "<div class='alert alert-success text-capitalize'>You Are registered succesfully</div>";
        } else {
          die("Something went wrong");
        }
      }
    }

    ?>
      <form action="register.php" method="POST">
        <div class="text-center mb-4">
          <h2 class="text-primary text-capitalize fw-bold">Register to your account</h2>
        </div>
        <div class="form-group mb-3">
          <input type="text" placeholder="Input Your Username" name="username" class="form-control">
        </div>
        <div class="form-group mb-3">
          <input type="email" placeholder="Input Your Email" name="email" class="form-control">
        </div>
        <div class="form-group mb-3">
          <input type="password" placeholder="Input Your Password" name="password" class="form-control">
        </div>
        <div class="form-group mb-3">
          <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control">
        </div>
        <div class="form-btn mb-3">
          <input type="submit" value="Register" name="submit" class="btn btn-primary w-100">
        </div>
        <div class="text-center">
          <p class="text-capitalize">Already have account? <a href="login.php">Login</a></p>
        </div>
      </form>
    </div>
  </div>


</body>

</html>