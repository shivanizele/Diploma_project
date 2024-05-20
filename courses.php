<?php ?>
<!doctype html>
<html lang="en">
<?php include('templates/header.php') ?>
<?php include('config.php') ?>
<?php 
$success_flag = false;
$error_flag = false;
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     if(!empty($_POST["courseCode"]) && !empty($_POST["courseName"])){
         $courseCode = $_POST["courseCode"];
         $courseName = $_POST["courseName"];
         $theory = !empty($_POST["theory"]) ? true : false;
         $oral = !empty($_POST["oral"]) ? true : false;
         $termWork = !empty($_POST["termWork"]) ? true : false;
         $practical = !empty($_POST["practical"]) ? true : false;
         $sql = "INSERT INTO courses (course_code, course_name,theory,practical,oral,term_work) VALUES ('$courseCode', '$courseName', '$theory','$practical','$oral','$termWork')";
         if ($conn->query($sql) === TRUE) {
            $success_flag = true;
         }else {
            $error_flag=true;
         }
     }
     
     if(!empty($_POST["del_id"]) ){
         $delId=$_POST["del_id"];
        $sql = "delete from courses where id=$delId";
        if ($conn->query($sql) === TRUE) {
           $success_flag = true;
        }else {
           $error_flag=true;
        }
        // header('Location: '.$_SERVER['REQUEST_URI']);
     }
     header('Location: '.$_SERVER['REQUEST_URI']);
 }

 $sql = "SELECT * FROM courses";
$result = $conn->query($sql);
?>
<div class="main-section1">
    <div class="row h-100">
        <div class="col-sm-2">
            <?php include("Tabs.php"); ?>
        </div>
        <div class="col-sm-10">
            <div class="main-section">
                <?php if($success_flag) { ?>
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong>
                </div>
                <?php } ?>
                <?php if($error_flag) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error !</strong>
                </div>
                <?php } ?>
                <div id="course_form">
                    <div class="panel panel-default" style="width: 80%;">
                        <div class="panel-heading">Add Course</div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="courses.php">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Course Code:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="CourseCode" placeholder="Course Code" name="courseCode">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="cn">Course Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Course Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="th">Theory:</label>
                                    <div class="col-sm-4">
                                        <input type="checkbox" name="theory">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="th">Practical:</label>
                                    <div class="col-sm-4">
                                        <input type="checkbox" name="practical">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="or">Oral:</label>
                                    <div class="col-sm-4">
                                        <input type="checkbox" name="oral">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="tw">Term Work:</label>
                                    <div class="col-sm-4">
                                        <input type="checkbox" name="termWork">
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
                <div id="course_tb">
                <button type="button" class="btn btn-primary" id="add">Add</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sr.</th>
                            <th scope="col">Course Code</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Theory</th>
                            <th scope="col">Practical</th>
                            <th scope="col">Oral</th>
                            <th scope="col">Term Work</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
            if ($result->num_rows > 0) {
                $i=1;
              while($row = $result->fetch_assoc()) {?>
                        <tr>
                            <th scope="row">
                                <?php echo $i; ?>
                            </th>
                            <td>
                                <?php echo $row["course_code"]; ?>
                            </td>
                            <td>
                                <?php echo $row["course_name"] ; ?>
                            </td>
                            <td>
                                <?php if($row["theory"] == 1) { ?>
                                <span class="glyphicon glyphicon-ok btn-default" style="color: green;" aria-hidden="true"></span>
                                <?php }else {?>
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                <?php }?>
                            </td>
                            <td>
                                <?php if($row["practical"] == 1) { ?>
                                <span class="glyphicon glyphicon-ok btn-default" style="color: green;" aria-hidden="true"></span>
                                <?php }else {?>
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                <?php }?>
                            </td>
                            <td>
                                <?php if($row["oral"] == 1) { ?>
                                <span class="glyphicon glyphicon-ok btn-default" style="color: green;" aria-hidden="true"></span>
                                <?php }else {?>
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                <?php }?>
                            </td>
                            <td>
                                <?php if($row["term_work"] == 1) { ?>
                                <span class="glyphicon glyphicon-ok btn-default" style="color: green;" aria-hidden="true"></span>
                                <?php }else {?>
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                <?php }?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm del" aria-label="Left Align" id="delete_<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" value="<?php echo $row["id"]; ?>" />
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                            </td>
                        </tr>
                        <?php  $i++; }
                        } else {?>
                        <tr>
                            <td colspan="8"> No Records Found!</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('templates/footer.php') ?>
<script>
    $(document).ready(function() {
        $("#course_form").hide();
        $("#del_msg").hide();
        // $("#student_form").hide();
        $("#add").click(function() {
            $("#course_form").show();
            $("#course_tb").hide();
        });
        $("#cancel").click(() => {
            $("#course_form").hide();
            $("#course_tb").show();
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
                xhttp.open("POST", 'courses.php', {
                        del_id: id
                    });
                xhttp.send(FD);

            })

    })
</script>
</body>

</html>