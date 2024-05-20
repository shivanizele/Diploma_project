<?php ?>
<!doctype html>
<html lang="en">
<style>
    a:link {
  /* color: white; */
}
</style>
<?php include('config.php') ?>
<?php 
$success_flag = false;
$error_flag = false;
$error_msg = "";
$isadmin=false;
if(!empty($_SESSION)){
if(!empty($_SESSION["logged_userName_role"]) && $_SESSION["logged_userName_role"] == "admin"){
    $isadmin=true;
}
}

$sql = "SELECT * FROM notes";
$result1 = $conn->query($sql);
?>
<div class="main-section">
    <div class="row h-100">
        <div class="col-sm-10">
            <div id="tb_data">
            <marquee width="60%" direction="up" height="100px" scrollamount="2">
                    <?php 
            if ($result1->num_rows > 0) {
                $i=1;
              while($row = $result1->fetch_assoc()) {?> 
                       <p>
                           <a href="notes.php">
                       <img src="https://gppune.ac.in/images/gif_new.gif" style="height: 10px; width: 35px;">
                       <?php echo $row["title"]; ?>
                       </a>
                       </p>
                        
                      <?php  
                      }
                            }
                        ?>
            </marquee>
                </div>
        </div>

    </div>
</div>
</html>

