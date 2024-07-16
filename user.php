
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
          <h1 class="page-title"style="margin-top=80px"> user details</h1>
        </div>
      </div>
      <hr>
      <?php
        include 'conn.php';

        $limit = 10;
        $page = '1';
        $offset = ($page - 1) * $limit;
        $count=$offset+1;
        $sql= "select * from user_details ";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)   {
       ?><div class="table-responsive">
       <table class="table table-bordered" style="text-align:center">
           <thead style="text-align:center">
           <th style="text-align:center">S.no</th>
           <th style="text-align:center">Name</th>
           <th style="text-align:center">Gender</th>
           <th style="text-align:center">City</th>
           <th style="text-align:center">Mobile Number</th>
           <th style="text-align:center">Action</th>
           </thead>
           <tbody>
             <?php
             while($row = mysqli_fetch_assoc($result)) { ?>
           <tr>
                   <td><?php echo $count++; ?></td>
                   <td><?php echo $row['user_name']; ?></td>
                   <td><?php echo $row['user_gender']; ?></td>
                   <td><?php echo $row['user_City']; ?></td>
                   <td><?php echo $row['user_number']; ?></td>
                     <td id="he" style="width:100px">
                     <a style="background-color:aqua" href='delete.php?id=<?php echo $row['user_id']; ?>'> Delete </a>
                 </td>
               </tr>
             <?php } ?>
           </tbody>
       </table>
     </div>
     <?php } ?>
     
<div class="table-responsive"style="text-align:center;align:center">
    <?php
    $sql1 = "SELECT * FROM user_details";
    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

    if(mysqli_num_rows($result1) > 0){

      $total_records = mysqli_num_rows($result1);

      $total_page = ceil($total_records / $limit);

      echo '<ul class="pagination admin-pagination">';
      if($page > 1){
        echo '<li><a href="donor_list.php?page='.($page - 1).'">Prev</a></li>';
      }
      for($i = 1; $i <= $total_page; $i++){
        if($i == $page){
          $active = "active";
        }else{
          $active = "";
        }
        echo '<li class="'.$active.'"><a href="donor_list.php?page='.$i.'">'.$i.'</a></li>';
      }
      if($total_page > $page){
        echo '<li><a href="donor_list.php?page='.($page + 1).'">Next</a></li>';
      }

      echo '</ul>';
    }
    ?>
  </div>
  </div>
</div>
</div>
 