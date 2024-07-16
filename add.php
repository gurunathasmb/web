
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
     /* Custom styles for the sidebar */
     .sidebar {
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            background-color: rgb(189, 127, 127);
            padding-top: 20px;
        }
        .sidebar .sidebar-header {
            padding: 10px;
            color: black;
            text-align: left;
            font-weight: 700;
            margin-top: 30%;
            border-bottom: 1px solid rgb(157, 129, 122);
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
            text-align: center;
        }
        .sidebar ul li a {
            color: rgb(180, 174, 174);
            text-decoration: none;
            display: block;
        }
        .sidebar ul li a:hover {
            background-color: #2470bc;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        /* Custom styles for the navbar */
        .navbar-custom {
            background-color: rgb(226, 215, 215);
            position: fixed;
            top: 0;
            right: 0;
            width: calc(100% - 250px);
            z-index: 1;
            height: 65px;
        }
        /* Custom styles for the table container */
        .table-container {
            margin-top: 56px;
        }
        /* Custom styles for the table */
        .table {
            border: none; 
            border-collapse: separate;
            border-spacing: 0 2px; 
            background-color: #ffffff;
        }
        .thead-light th {
            border: none; 
            padding: 10px;
            text-align: left; 
            position: relative;
            cursor: pointer;
        }
        .thead-light th i {
            
            right: 5px; 
            top: 50%;
            color: black; 
        }
        .table tbody {
            background-color: #ffffff; 
        }
        .table tbody tr {
            border-bottom: 1px solid #dee2e6;
        }
        .table tbody td {
            border: none;
            padding: 10px; 
            text-align: left; 
            font-weight: 500;
        }
</style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        Users
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom ">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            </nav>
            <div class="content">
    <div class="table-container">
        <table id="dataTable" class="table table-striped table-hover" >
            <thead class="thead-light">
          <h1 class="page-title"style="margin-top=80px">Add user details</h1>
        </div>
      </div>
      <hr>
      <form name="user_details" action="save_data.php" method="post">
      <div class="row">
      <div class="col-lg-4 mb-4"><br>
      <div class="font-italic">Full Name<span style="color:red">*</span></div>
      <div><input type="text" name="fullname" class="form-control" required></div>
      </div>
      
      <div class="col-lg-4 mb-4"><br>
      <div class="font-italic">Gender<span style="color:red">*</span></div>
      <div><select name="gender" class="form-control" required>
      <option value="">Select</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      </select>
      </div>
      <div class="col-lg-4 mb-4"><br>
      <div class="font-italic">City</div>
      <div><input type="text" name="City" class="form-control"></div>
      </div>
      </div>
      <div class="col-lg-4 mb-4"><br>
      <div class="font-italic">Mobile Number<span style="color:red">*</span></div>
      <div><input type="text" name="mobileno" class="form-control" required></div>
    </div>
      <div class="row">
        <div class="col-lg-4 mb-4">
        <div><input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer" onclick="popup()"></div>
        </div>
      </div>
    </form>

      </div>
      </div>
      </div>
      
      <?php?>
      <script>
      function popup() {
        alert("Data added Successfully.");
      }
      </script>
    </body>
</html>
