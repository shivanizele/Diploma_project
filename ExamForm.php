<?php ?>
<!doctype html>
<html lang="en">
<?php include('templates/header.php') ?>
<?php include('config.php') ?>
<?php 
$success_flag = false;
$error_flag = false;
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST);

     $sql = "SELECT * FROM courses";    
    $result1 = $conn->query($sql);
        if ($result1->num_rows > 0) {
            $studId = $_SESSION['logged_userId'];
        while($row = $result1->fetch_assoc()) {
            $courseCode = $row["course_code"];
            $courseName = $row["course_name"];
            $theoryKey = "theory_$courseCode";
            $theory =!empty($_POST["$theoryKey"]) ? true : false ; 

            $practicalKey = "practical_$courseCode";
            $practical =!empty($_POST["$practicalKey"]) ?true : false ;

            $oralKey = "oral_$courseCode";
            $oral =!empty($_POST["$oralKey"]) ? true : false ;

            $termWorkKey = "termWork_$courseCode";
            $termWork =!empty($_POST["$termWorkKey"]) ? true : false ;

            $sql = "INSERT INTO student_exam_form (course_code, course_name,theory,practical,oral,term_work,student_id) VALUES ('$courseCode', '$courseName', '$theory','$practical','$oral','$termWork','$studId')";
            if ($conn->query($sql) === TRUE) {
                $success_flag = true;
            }else {
                $error_flag=true;
            }
        }
        }
        

    //  if(!empty($_POST["courseCode"]) && !empty($_POST["courseName"])){
    //      $courseCode = $_POST["courseCode"];
    //      $courseName = $_POST["courseName"];
    //      $theory = !empty($_POST["theory"]) ? true : false;
    //      $oral = !empty($_POST["oral"]) ? true : false;
    //      $termWork = !empty($_POST["termWork"]) ? true : false;
    //      $practical = !empty($_POST["practical"]) ? true : false;
    //      $sql = "INSERT INTO courses (course_code, course_name,theory,practical,oral,term_work) VALUES ('$courseCode', '$courseName', '$theory','$practical','$oral','$termWork')";
    //      if ($conn->query($sql) === TRUE) {
    //         $success_flag = true;
    //      }else {
    //         $error_flag=true;
    //      }
    //  }
 }
 $studId = $_SESSION['logged_userId'];
 $sql2 = "SELECT * FROM student_exam_form where student_id = '$studId'";
 $result2 = $conn->query($sql2);

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
                        <div class="panel-heading">Exam Form</div>
                        <div class="panel-body">
                            <?php  if ($result2->num_rows <= 0) { ?>
                            <form class="form-horizontal" method="POST" action="ExamForm.php">
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
                                <input type="checkbox" name="theory_<?php echo $row["course_code"]; ?>">
                                <!-- name="theory[<?php //echo $row["course_code"]; ?>][theory]" -->
                                <?php }?>
                            </td>
                            <td>
                                <?php if($row["practical"] == 1) { ?>
                                <input type="checkbox" name="practical_<?php echo $row["course_code"]; ?>">
                                <?php }?>
                            </td>
                            <td>
                                <?php if($row["oral"] == 1) { ?>
                                <input type="checkbox" name="oral_<?php echo $row["course_code"]; ?>">
                                <?php }?>
                            </td>
                            <td>
                                <?php if($row["term_work"] == 1) { ?>
                                <input type="checkbox" name="termWork_<?php echo $row["course_code"]; ?>">
                                <?php }?>
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
                             <div class="form-group" style="text-align: center;">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <?php }else {?>
                                <div> You already submitted exam form.</div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('templates/footer.php') ?>
<script>
    $(document).ready(function() {
        // $("#course_form").hide();
        $("#del_msg").hide();
        $("#add").click(function() {
            $("#course_form").show();
        });
        $("#cancel").click(() => {
            $("#course_form").hide();
        })
    })
</script>
</body>

</html>