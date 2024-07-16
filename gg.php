<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body {
      background: url('blood-cells1.png') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Arial', sans-serif;
    }
    .container {
      position: absolute;
      right: 10%;
      top: 50%;
      transform: translateY(-50%);
      width: 400px;
      padding: 20px;
      background-color: rgba(0, 0, 0, 0.8);
      color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    .logo {
      text-align: center;
    }
    .logo img {
      width: 300px;
      height: auto;
    }
    .logo h1 {
      color: white;
      font-size: 10px;
      margin: 0;
    }
    .btn-group {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }
    .btn-group button {
      flex: 1;
      height: 40px;
      border: none;
      cursor: pointer;
      background-color: #f39c12;
      color: white;
      font-weight: bold;
      margin: 0 5px;
      border-radius: 5px;
    }
    .btn-group button.active {
      background-color: #e67e22;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-control {
      background-color: rgba(255, 255, 255, 0.1);
      border: none;
      color: white;
    }
    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }
    .form-control:focus {
      background-color: rgba(255, 255, 255, 0.2);
      border: none;
      box-shadow: none;
    }
    .show-password {
      margin-bottom: 15px;
    }
    .btn-primary {
      width: 100%;
      background-color: #f39c12;
      border-color: #f39c12;
    }
    .btn-primary:hover {
      background-color: #e67e22;
      border-color: #e67e22;
    }
    .alert {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="gg.jpeg" alt="Logo">
      
    </div>
    <form action="" method="post">
      <!--
        <h1 class="text-center">LOGIN PORTAL</h1>
      -->

      <div class="btn-group">
        <button type="button" class="btn active" onclick="showPhoneNumberLogin()">Phone No</button>
        <button type="button" class="btn" onclick="showEmailLogin()">Email</button>
      </div>
      <div id="phoneNumberLogin">
        <div class="form-group">
          <label for="phone">Phone Number<span style="color:red">*</span></label>
          <input type="text" id="phone" name="phone" placeholder="Enter Phone number" class="form-control">
        </div>
      </div>
      <div id="emailLogin" style="display: none;">
        <div class="form-group">
          <label for="email">Email<span style="color:red">*</span></label>
          <input type="email" id="email" name="email" placeholder="Enter your Email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password<span style="color:red">*</span></label>
          <input type="password" id="password" name="password" placeholder="Enter your Password" class="form-control">
        </div>
        <div class="form-group">
          <input type="checkbox" class="show-password" onclick="togglePassword()"> Show Password
        </div>
      </div>
      <div class="text-center">
        <button type="submit" name="login" class="btn btn-primary">LOGIN</button>
      </div>
      <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
          include 'conn.php';
          $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
          $password = mysqli_real_escape_string($conn, $_POST['password'] ?? '');
          $phone = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');

          if (!empty($email) && !empty($password)) {
            $sql = "SELECT * FROM admin_info WHERE admin_email='$email' AND admin_password='$password'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION["email"] = $email;
              header("Location: g1.php");
              exit();
            } else {
              echo '<div class="alert alert-danger">Username and Password do not match! Please enter valid credentials.</div>';
            }
          } elseif (!empty($phone)) {
            // Implement phone number login logic here
            echo '<div class="alert alert-danger">Phone number login is not yet implemented.</div>';
          } else {
            echo '<div class="alert alert-danger">Please fill in the required fields.</div>';
          }
        }
      ?>
    </form>
  </div>
  <script>
    function showPhoneNumberLogin() {
      document.getElementById('phoneNumberLogin').style.display = 'block';
      document.getElementById('emailLogin').style.display = 'none';
      document.querySelector('.btn-group .btn.active').classList.remove('active');
      document.querySelector('.btn-group button:first-child').classList.add('active');
    }

    function showEmailLogin() {
      document.getElementById('emailLogin').style.display = 'block';
      document.getElementById('phoneNumberLogin').style.display = 'none';
      document.querySelector('.btn-group .btn.active').classList.remove('active');
      document.querySelector('.btn-group button:last-child').classList.add('active');
    }

    function togglePassword() {
      var passwordField = document.getElementById("password");
      if (passwordField.type === "password") {
        passwordField.type = "text";
      } else {
        passwordField.type = "password";
      }
    }
  </script>
</body>
</html>