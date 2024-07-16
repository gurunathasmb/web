<!DOCTYPE html>
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
            margin-top: 65px;
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
        .table-responsive {
            margin-top: 20px;
        }
        .btn-custom {
            height: 40px;
            width: 70px;
            margin-right: 25px;
        }
        .action-buttons a {
            display: inline-block;
            margin: 0 5px;
            padding: 5px 10px;
            border-radius: 3px;
            text-decoration: none;
            color: white;
        }
        .action-buttons a.view {
            background-color: #5bc0de;
        }
        .action-buttons a.delete {
            background-color: #d9534f;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        USERS
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="row justify-content-center">
        <div class="col-lg-6"></div>
    </div>
</nav>

<!-- Page content -->
<div class="content">
    <div class="table-container">
        <table id="dataTable" class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th colspan="6" style="text-align:right;">
                        <input type="button" value="+Add" class="btn btn-primary btn-custom" id="btnHome" onClick="document.location.href='add.php'" />
                    </th>
                </tr>
                <tr>
                    <th style="text-align:center">S.No</th>
                    <th style="text-align:center">Name</th>
                    <th style="text-align:center">Gender</th>
                    <th style="text-align:center">City</th>
                    <th style="text-align:center">Phone Number</th>
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'conn.php';

                    $limit = 10;
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($page - 1) * $limit;
                    $count = $offset + 1;
                    $sql= "SELECT * FROM user_details LIMIT {$offset}, {$limit}";
                    $result =
                    mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td style="text-align:center"><?php echo $count++; ?></td>
                        <td style="text-align:center"><?php echo $row['user_name']; ?></td>
                        <td style="text-align:center"><?php echo $row['user_gender']; ?></td>
                        <td style="text-align:center"><?php echo $row['user_City']; ?></td>
                        <td style="text-align:center"><?php echo $row['user_number']; ?></td>
                        <td class="action-buttons" style="text-align:center">
                            <a href="view.php?id=<?php echo $row['user_id']; ?>" class="view">View</a>
                            <a href="delete.php?id=<?php echo $row['user_id']; ?>" class="delete">Delete</a>
                        </td>
                    </tr>
                <?php 
                        } 
                    } 
                ?>
            </tbody>
        </table>
    </div>

    <div class="table-responsive" style="text-align:center;">
        <?php
            $sql1 = "SELECT * FROM user_details";
            $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

            if(mysqli_num_rows($result1) > 0) {
                $total_records = mysqli_num_rows($result1);
                $total_page = ceil($total_records / $limit);

                echo '<ul class="pagination admin-pagination">';
                if($page > 1) {
                    echo '<li><a href="gg.php?page='.($page - 1).'">Prev</a></li>';
                }
                for($i = 1; $i <= $total_page; $i++) {
                    $active = ($i == $page) ? 'active' : '';
                    echo '<li class="'.$active.'"><a href="gg.php?page='.$i.'">'.$i.'</a></li>';
                }
                if($total_page > $page) {
                    echo '<li><a href="gg.php?page='.($page + 1).'">Next</a></li>';
                }
                echo '</ul>';
            }
        ?>
    </div>
</div>

<!-- User Details Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="userName"></span></p>
                <p><strong>Email:</strong> <span id="userEmail"></span></p>
                <p><strong>Gender:</strong> <span id="userGender"></span></p>
                <p><strong>City:</strong> <span id="userCity"></span></p>
                <p><strong>Phone Number:</strong> <span id="userPhone"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('.view').click(function(e){
        e.preventDefault();
        var userId = $(this).attr('href').split('=')[1];
        
        $.ajax({
            url: 'view.php',
            type: 'POST',
            data: {id: userId},
            success: function(response) {
                var user = JSON.parse(response);
                if (user.error) {
                    alert(user.error);
                } else {
                    $('#userName').text(user.user_name);
                    $('#userEmail').text(user.user_email);
                    $('#userGender').text(user.user_gender);
                    $('#userCity').text(user.user_city);
                    $('#userPhone').text(user.user_number);
                    $('#userModal').modal('show');
                }
            }
        });
    });
});
</script>

</body>
</html>
