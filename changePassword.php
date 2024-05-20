<?php ?>
<!doctype html>
<html lang="en">
<style>
</style>
<?php include('templates/header.php') ?>
<?php include('config.php') ?>
<?php 
$success_flag = false;
$error_flag = false;
$error_msg = "";
$studentInfo =array();
$music_number = "POST['del_id']";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($_POST))
    {
        $enroll = $_POST["enroll"];
        // $currentPassword = $_POST["currentPassword"];
        $newPassword = $_POST["newPassword"];
     
            if(!empty($enroll) && !empty($newPassword)){
              $sql = "UPDATE login set password = '$newPassword' where username ='$enroll' ";
              if ($conn->query($sql) === TRUE) {
                  
                      $success_flag = true;
                 
          } else {
              $error_flag =true;
          }
        }
      
    }
}
?>
<div class="main-section">
    <div class="row h-100">
        <div class="col-sm-2">
            <?php include("Tabs.php"); ?>
        </div>
        <div class="col-sm-10">
            <?php if($success_flag) { ?>
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong>
            </div>
            <?php } ?>
            <?php if($error_flag) { ?>
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error !</strong> <?php $m = !empty($error_msg) ?  $error_msg : ""; echo $m; ?>
            </div>
            <?php } ?>
            <div id="student_form1">
                <div class="panel panel-default" style="width: 80%;">
                        <div class="panel-heading">Change Password</div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="changePassword.php">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="cn">Enrollment Number :</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="enroll" name="enroll" value="<?php echo $_SESSION["logged_userName"];?>"  readonly>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="control-label col-sm-2" for="th">Current Password:</label>
                                    <div class="col-sm-4">
                                    <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Current Password">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="th">New Password :</label>
                                    <div class="col-sm-5">
                                      <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="control-label col-sm-3" for="or">Comfirm Password: </label>
                                    <div class="col-sm-5" style="display: flex;">
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                                    <button type="button" class="btn btn-success btn-sm" id="pass_icon">
                                    <span class="glyphicon glyphicon-ok"></span>  
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" id="pass_icon_fail">
                                    <span class="glyphicon glyphicon-remove"></span>  
                                    </button> 
                                    </div>
                                </div> -->
                                <hr/>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <input type="button" class="btn btn-default" id="cancel" name="cancel" value="Cancel">
                                        <button type="submit" class="btn btn-primary" id="btn_submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- Student Table-->
            <div id="tb_data">
                <button type="button" class="btn btn-primary" id="add">Change Password</button>
                </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#student_form1").hide();
            $("#del_msg").hide();
            // $("#student_form").hide();
            $("#add").click(function() {
                $("#student_form1").show();
                $("#tb_data").hide();
                // $("#btn_submit").prop('disabled', true);
                // $("#pass_icon").hide()
                // $("#pass_icon_fail").hide()
            });
            $("#cancel").click(() => {
            $("#student_form1").hide();
            $("#tb_data").show();

        })

        
        $('#confirmPassword').keypress(function() {
                console.log($("#confirmPassword").val())
                var newPassword = $("#newPassword").val()
               var confirmPassword =  $("#confirmPassword").val()
                if(newPassword == confirmPassword){
                    $("#btn_submit").prop('disabled', false);
                    $("#pass_icon").show()
                    $("#pass_icon_fail").hide()

                }else{
                    $("#pass_icon_fail").show()
                    $("#pass_icon").hide()
                }
            });
           

        });
    </script>
    <?php include('templates/footer.php') ?>
</html>