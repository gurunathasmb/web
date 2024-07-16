<!DOCTYPE html>
<html lang="en">

<head>  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></head>
<style> 
      body { 
          background-repeat: no-repeat;
           background-position: auto;
      }
        .container { 
            background-position:auto ;
            width: 400px;
            height: 470px;
            margin: 100px auto;
            padding: 20px;
            background-color: #424df0;
            border: 1px solid #f3efef;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
    </style>
<body background="blood-cells1.png"></body>
      <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="container" style="margin-top:360px; margin-right: 70px;">
        <div class="row justify-content-left">
            <div class="col-lg-16">
            <div class ="card" style="height:60px; width: 245px; background-image:url('gg.jpeg') ;">
            </div>
                <h1 class="mt-2" style=" color:#0aeb5c  ;">
                   LOGIN PORTAL
                  </h1>
  
              </div>
        </div>
        <div class="row justify-content-lg-left justify-content-mb-left">
          <div class="col-lg-16 mb-16" style="text-align:left">
          <input type="button" value="PHONE" class="homebutton" style="height:40px; width: 150px ; margin-right:25px;" id="btnHome" 
          onClick="document.location.href='guru.php'" /><input type="button" value="EMAIL" class="homebutton" style="height:40px; width: 150px " id="btnHome" 
          onClick="document.location.href='gg.php'" />
                </div>
                </div>
                <div class="row justify-content-lg-left justify-content-mb-left" >
        <div class="col-lg-16 mb-16 ">
        <div class="font-italic" style="font-weight:bold">Phone No<span style="color:red">*</span></div>
        <div><input type="text" name="Phone_no" id="myInput2" placeholder="Enter your phone_no" class="form-control" value="" required></div>
      </div>
      </div>
      <div class="row justify-content-lg-left justify-content-mb-left">
    <div class="col-lg-16 mb-16 "><br>
    <div class="font-italic"style="font-weight:bold">OTP<span style="color:red">*</span></div>
    <div><input type="OTP" name="OTP" placeholder="Enter your OTP" class="form-control" value="" required></div>
    </div>
  </div>
  <div class="row justify-content-lg-center justify-content-mb-center">
    <div class="col-lg-4 mb-4 " style="text-align:center"><br>
    <div><input type="button" name="login"  value="LOGIN" style="cursor:pointer;background-color:aqua"  onClick="document.location.href='g1.php'"></div>
    </div>
  </div>
    </div>
  </div></div>