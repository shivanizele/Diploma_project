<?php ?>
<!doctype html>
<html lang="en">
  <style>
    .notes {
    background-color: lightgrey;
    width: 80%;
    border: 15px solid #72a6f385;
    padding: 50px;
    margin: 20px;
    /* left: 15%; */
    position: absolute;
  
}
    </style>
 <?php include('templates/header.php') ?>

<div class="main-section">
  <div class="row" >
    <div  class="col-md-2">
         <?php include("Tabs.php"); ?>
    </div>
    <div class="col-md-5">
       <?php //include("chatbot.php"); ?>
       <div class="notes">
       <?php include("notificationnotes.php"); ?>
      </div> 
    </div>
    <div class="col-md-5">
       <!-- <div class="notes"> -->
       <?php //include("chatbot.php"); ?>
      <!-- </div> -->
    </div>

  </div>
</div>
  <?php include('templates/footer.php') ?>
  </body>
</html>