<?php ?>
<!doctype html>
<html lang="en">
 <?php include('templates/header.php') ?>
 <?php include('config.php') ?>

<div class="main-section">
  <div class="row h-100" >
    <div  class="col-sm-2">
   <?php include("Tabs.php"); ?>
    </div>
    <?php 
    $fullName = "";
    $studId = $_SESSION['logged_userId'];
    $sql = "SELECT * FROM student_exam_form where student_id = '$studId'";
    $result = $conn->query($sql);

    $sql1 = "SELECT * FROM student_info where id = '$studId'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
       $res =  $result1->fetch_assoc();
       $fullName = $res["first_name"]." ".$res["last_name"];
    }
    ?>
    <div class="col-sm-10">
    <div class="panel panel-default" style="width: 80%;">
                        <div class="panel-heading">Name : <b><?php echo $fullName ; ?></b></div>
                        <div class="panel-body">
    <table class="table" style="margin-top: 5px;">
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
                        </tr>
                        <?php  $i++; }
          } else {?>
                        <tr>
                            <td colspan="8"> No Records Found!</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                        </div></div></div>
    </div>
  </div>
</div>
  <?php include('templates/footer.php') ?>
  </body>
</html>