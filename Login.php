<?php ?>
<!doctype html>
<html lang="en">
 <?php include('templates/header.php') ?>
 <?php include("config.php") ?>
 <?php 
  $isLoginFailed = false;
 if($_POST){
   $username=$_POST["username"];
   $password=$_POST["password"];
   if(!empty($username) && !empty($password)){
    $sql = "SELECT * FROM login where username='$username' and password = '$password'";
    $result1 = $conn->query($sql);
    if ($result1->num_rows > 0) {
      $row = $result1->fetch_assoc();
      var_dump($row);
      echo "Login Successfully";
      $_SESSION['logged_in'] = true;
      $_SESSION['logged_userId'] = $row["id"];
      $_SESSION['logged_userName']=$row["username"];
      $_SESSION['logged_userName_role']=$row["role"];
       header('location:dashboard.php');
    }else{
      $isLoginFailed =true;
    }
 }
}
 ?>
<div class="main-section">
  <div class="row h-100" >
    <div  class="col-sm-2">
   <?php include("collegeInfoTab.php");?>
    </div>
    </div>
    <div class="col-sm-10">
        <div class="child">
          <?php if($isLoginFailed){ ?>
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Invalid Credentials</strong> 
            </div>
       <?php }?>
        <div class="login-text"><h3>Please Login</h3></div>
          <div>
    <form class="login-form" method="POST" action="Login.php">

  <div class="form-group row">
    <div class="col-sm-12">
      <input type="text" name="username"  class="form-control" id="staticEmail" placeholder="Enter Username">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12">
      <input type="password" class="form-control"  name="password" id="inputPassword" placeholder="Enter Password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12" style="text-align:center;">
  <button class="btn-login" type="submit">Login</button>
    </div>
  </div>
            </form>
            </div>
        </div>
    </div>
  </div>


 <?php include('templates/footer.php') ?>
    <!-- <script src="./lib/js/jquery-3.5.1.slim.min.js"></script>
    <script src="./lib/js/bootstrap.bundle.min.js" ></script> -->
  </body>
</html>