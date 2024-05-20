<?php  ?>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="templates/lib/css/bootstrap.min.css">
    <link href="templates/lib/css/bootstrap-glyphicons.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="templates/assets/logo.png" />
    <title>GPP</title>
    
  </head>
  <style>
  html,body {
  height: 100%!important;
  overflow-x:clip;
}
  .header{
    background-color: #6772d8;
    background: #6772d8;
  }
  .nav-link{
    padding: .3em 3em;
    color: #fff;
    text-decoration: none;
    float: left;
    border-right: 1px solid #fff;
  }
  .main-section{
    margin-top: 5px;
  }
  .list-title{
margin: 0 0 0 0;
    padding: 4px 0 4px 8px;
    font: bold 105% Arial, Sans-Serif;
    color: #FFF;
    text-transform: uppercase;
    background: #6772d8;
    letter-spacing: 1px;
  }
  .sidebar{
    float: left;
    margin: 0;
    padding: 0;
    padding-left: 6px;
    padding-top: 6px;
  }
  .parent {
  position: relative;
   display: flex;
  justify-content: center;
  align-items: center;
}

.child {
  position: absolute;
  width:30%;
  top: 50%;
  left: 25%;
  /* transform: translate(-50%, -50%); */
  border: 1px solid #d2d1d1;
   box-shadow:20px 20px 50px grey; 
}
.login-text{
    background-color: #6772d8;
    padding: 1px;
    margin-top: 0px;
    color: white;
}
.login-text h3{
    text-align: center;
    font-size: medium;
}
.login-form{
    width: 90%;
    margin-top: 10px;
    margin-inline-start: 17px;
}
.btn-login{
    background-color: #6772d8;
    border-color: #6772d8;
    color: white;
    width: 80px;
    text-align:center;
}
footer {
  position:absolute;
   bottom:0;
   width:100%;
   height:30px;   /* Height of the footer */
   background:#6772d8;
  float: right;
}
.pass {
    margin-left: -30px;
    cursor: pointer;
}
  </style>
<body>
  <?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
  $islogged=false;
  if(!empty($_SESSION)){
    if(!empty($_SESSION['logged_in'])){
      $islogged=true;
    }
  }
  
  ?>
<!-- <script src="templates/lib/js/jquery-3.5.1.slim.min.js"></script>
    <script src="templates/lib/js/bootstrap.bundle.min.js" ></script> -->
    <?php // var_dump($_SESSION); ?>
    
<div class="header">
<img src="templates/assets/header.jpg" height="110" width="100%">
</div>
<nav class="nav header">
  <a class="nav-link active" href="home.php">Home</a>
  <a class="nav-link" href="Contact.php">Contact</a>
  <?php 
  if($islogged){
  ?>
  <a class="nav-link" href="Logout.php">Logout</a>
  <p href="#"  class="nav-link"><span style="margin-right: 5px;">Welcome :-</span> <span><?php echo $_SESSION["logged_userName"]; ?></span></p>
  <?php }else{?>
  <a class="nav-link" href="login.php">Login</a>
  <?php }?>
  
</nav>

  