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
        $firstName = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $enroll = $_POST["enroll"];
        $password = $_POST["password"];

        $sql2 = "SELECT * FROM student_info where enroll_number = '$enroll'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
          $error_flag =true;
          $error_msg = "Enrollment No. ($enroll) already exist.";
        }else{
            if(!empty($firstName) && !empty($lastname) && !empty($email) && !empty($enroll) && !empty($password)){
              $sql = "INSERT INTO student_info (first_name, last_name,email,enroll_number) VALUES ('$firstName', '$lastname', '$email','$enroll')";
              if ($conn->query($sql) === TRUE) {
                  // echo "New record created successfully";
                  $sql1 = "INSERT INTO login (username, password ,role) VALUES ('$enroll', '$password', 'student')";
                  if ($conn->query($sql1) === TRUE) {
                      // echo "New record created successfully";
                      $success_flag = true;
                  }else{
                      $error_flag =true;
                  }
          } else {
              $error_flag =true;
          }
        }
        // unset($_POST);
        }

        //delete student
        if(!empty($_POST) && !empty($_POST["del_id"])){
            $deleteId = $_POST["del_id"];
            $sqlnew = "SELECT * FROM student_info where id=$deleteId";
            $resultnew = $conn->query($sqlnew);
            $enroll = '';
            if ($resultnew->num_rows > 0) {
             $res =  $resultnew->fetch_assoc();
             $enroll = $res["enroll_number"];
             $deleteUser = "DELETE FROM login WHERE username=$enroll";
             $sql = "DELETE FROM student_info WHERE id=$deleteId";
            if (mysqli_query($conn, $deleteUser)) {
            echo "Record deleted successfully";
            if (mysqli_query($conn, $sql)) {

            }
            } else {
            echo "Error deleting record: " . mysqli_error($conn);
            }

            }
            // unset($_POST);
            
        }
    }
}

$sql = "SELECT * FROM student_info";
$result1 = $conn->query($sql);

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
                        <div class="panel-heading">Add Student</div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="student.php">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="cn">First Name :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="th">Last Name :</label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="th">Email :</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="or">Enrollment No: </label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" id="enroll" name="enroll" placeholder="Enrollment No">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="tw">Password:</label>
                                    <div class="col-sm-4">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <input type="button" class="btn btn-default" id="cancel" name="cancel" value="Cancel">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- Student Table-->
            <div id="tb_data">
                <button type="button" class="btn btn-primary" id="add">Add</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sr.</th>
                            <th scope="col">Enrollment No.</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
            if ($result1->num_rows > 0) {
                $i=1;
              while($row = $result1->fetch_assoc()) { //var_dump($row) ;
              
                $sqllogin = "SELECT * FROM login where username = ".$row["enroll_number"]."";
                $resultlogin = $conn->query($sqllogin);
                $pass = "";
                while($rowLogin = $resultlogin->fetch_assoc()) { 
                    $pass = $rowLogin["password"];
                }
              ?>
              
                        <tr>
                            <th scope="row">
                                <?php echo $i; ?>
                            </th>
                            <td>
                                <?php echo $row["enroll_number"]; ?>
                            </td>
                            <td>
                                <?php echo $row["first_name"]." ".$row["last_name"] ; ?>
                            </td>
                            <td>
                                <?php echo $row["email"]; ?>
                            </td>
                            <td>
                               <input type="password" name="password" id="password_<?php echo $i?>"
                                value='<?php echo $pass; ?>' disabled />
                                <a href="#">
                                  <span class="glyphicon glyphicon-eye-open" id="eye_<?php echo $i?>" onclick="togglePassword(<?php echo $i?>)"></span>
                                </a>
                                <!-- <i class="bi bi-eye-slash pass" id="togglePassword"></i> -->
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm del" aria-label="Left Align" id="delete_<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
                                  <input type="hidden" value="<?php echo $row["id"]; ?>" />
                                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                             </td>
                        </tr>
                        <?php  $i++; }
                        } else { ?>
                          <tr>
                            <td colspan="8"> No Records Found!</td>
                        </tr>
                      <?php  }
                        ?>
                    </tbody>
                </table>
                </div>
        </div>
    </div>
    <script>
        function togglePassword(id){
            const password = document.querySelector("#password_"+id);
            const eye = document.querySelector("#eye_"+id);
            const type = password.getAttribute("type") === "password" ? "text" : "password";
             password.setAttribute("type", type);
            console.log(id);
            console.log(eye.classList)
            eye.classList.toggle("glyphicon-eye-close");
        }
        // const togglePassword = document.querySelector("#togglePassword");
        // const password = document.querySelector("#password");

        // togglePassword.addEventListener("click", function () {
        //     // toggle the type attribute
        //     const type = password.getAttribute("type") === "password" ? "text" : "password";
        //     password.setAttribute("type", type);
            
        //     // toggle the icon
        //     this.classList.toggle("bi-eye");
        // });

        function deleteStudent(id) {
            console.log(id)
            $.ajax({
                type: 'POST',
                url: 'student.php',
                data: {
                    del_id: id
                },
                success: function(data) {
                    if (data == "YES") {
                        console.log(data)
                        console.log("Success")
                            //  $ele.fadeOut().remove();
                    } else {
                        alert("can't delete the row")
                    }
                }

            })

        }
        $(document).ready(function() {
            $("#student_form1").hide();
            $("#del_msg").hide();
            // $("#student_form").hide();
            $("#add").click(function() {
                $("#student_form1").show();
                $("#tb_data").hide();
            });
            $("#cancel").click(() => {
            $("#student_form1").hide();
            $("#tb_data").show();
        })
            $(".del").click((node) => {
                // console.log(data.target.value)
                var id = node.currentTarget.value
                console.log(id)

                const xhttp = new XMLHttpRequest();
                FD = new FormData();
                xhttp.onload = function() {
                    console.log("DELETED")
                    location.reload()
                    $("#del_msg").show();
                }
                FD.append("del_id", id);
                xhttp.open("POST", 'student.php', {
                        del_id: id
                    });
                xhttp.send(FD);

            })

        });
    </script>
    <?php include('templates/footer.php') ?>
</html>