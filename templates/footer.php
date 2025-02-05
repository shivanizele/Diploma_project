<?php ?>
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
  <?php //if($islogged) {?>
    <!-- <a href="#" class="btn btn-info btn-lg" style="float: right;">
          <span class="glyphicon glyphicon-envelope"></span> Chatbot   btn btn-info
        </a> -->
  <?php //} ?>
<footer>
  <button class="open-button" onclick="openForm()"><span class="glyphicon glyphicon-envelope"></span> </button>
  <div class="chat-popup" id="myForm">
  <div class="form-container">
          <?php include("chatbot.php"); ?>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </div>
</div>
   <div style="color: white; margin-top: 1px; float: left;">Copyright © 2021 - 2022. All rights reserved.</div>
</footer>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
    
</body>
<style>
  .open-button {
    /* background-color: #555; */
    /* color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
    width: 280px; */
    background-color: #555; 
    color: white;
    padding: 5px 30px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 0px;
    right: 28px;
    /* width: 280px;*/
  }
  
  /* The popup chat - hidden by default */
  .chat-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 9;
  }
  
  /* Add styles to the form container */
  .form-container {
    /* max-width: 300px; */
    padding: 10px;
    background-color: white;
  }
  
  /* Full-width textarea */
  .form-container textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
    resize: none;
    min-height: 200px;
  }
  
  /* When the textarea gets focus, do something */
  .form-container textarea:focus {
    background-color: #ddd;
    outline: none;
  }
  
  /* Set a style for the submit/send button */
  .form-container .btn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
    border-radius: 10px;
  }
  
  /* Add a red background color to the cancel button */
  .form-container .cancel {
    background-color: #6772d8;
  }
  
  /* Add some hover effects to buttons */
  .form-container .btn:hover, .open-button:hover {
    opacity: 1;
  }
</style>