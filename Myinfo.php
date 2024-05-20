<?php ?>
<!doctype html>
<html lang="en">
 <?php include('templates/header.php') ?>
 <?php include('config.php') ?>

<div class="main-section">
  <div class="row h-100" >
    <div  class="col-sm-2">
   <?php include("Tabs.php"); ?>
   <?php 
   
   $studId = $_SESSION['logged_userId'];
 $sql2 = "SELECT * FROM student_info where id = '$studId'";
 $result1 = $conn->query($sql2);
 $name="";
 $enrollNo="";
 $email="";
 if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
    $name = $row["first_name"]." ".$row["last_name"];
    $enrollNo = $row["enroll_number"];
    $email = $row["email"];
 }
   ?>
    </div>
    <div class="col-sm-10">
    <div class="panel panel-default" style="width: 80%;">
                        <div class="panel-heading">My Info</div>
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="cn">Name :</label>
                                    <div class="col-sm-4">
                                       <?php echo $name; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="th">Email :</label>
                                    <div class="col-sm-4">
                                    <?php echo $email; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="or">Enrollment No: </label>
                                    <div class="col-sm-4">
                                    <?php echo $enrollNo; ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
  </div>
</div>
  <?php include('templates/footer.php') ?>
  </body>
</html>