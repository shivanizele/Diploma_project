<?php 
$isadmin=false;
if(!empty($_SESSION)){
  
if(!empty($_SESSION["logged_userName_role"]) && $_SESSION["logged_userName_role"] == "admin"){
    $isadmin=true;
  
}
}else{
    if(empty($_SESSION["logged_userName_role"])){
        header("Location:Login.php");
    }
}
?>
<div class="sidebar">
     <div class="list-group" id="list-tab" role="tablist">
     
      <a class="list-group-item list-group-item-action active list-title" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">PERSONAL INFORMATION</a>
      <a class="list-group-item list-group-item-action"  href="dashboard.php" role="tab">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="AboutGPP.php" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">About GPP</a>
      <a class="list-group-item list-group-item-action"  href="https://gppune.ac.in/userindex.php" role="tab" aria-controls="messages"  target=”_blank”>www.gppune.ac.in</a>
      <a class="list-group-item list-group-item-action"  href="http://vlabs.iitb.ac.in/vlab/" role="tab" aria-controls="settings" target=”_blank”  role="tab" aria-controls="settings">Virtual Lab</a>
      <?php 
      if($isadmin){
      ?>
      <a class="list-group-item list-group-item-action"  href="courses.php" role="tab">Courses</a>
      <a class="list-group-item list-group-item-action"  href="student.php" role="tab">Student</a>
      <a class="list-group-item list-group-item-action"  href="notes.php" role="tab">Notes</a>
      <a class="list-group-item list-group-item-action"  href="manageChatbot.php" role="tab">Manage Chatbot</a>
      <?php }else {?>
        <a class="list-group-item list-group-item-action"  href="Myinfo.php" role="tab">MyInfo</a>
        <a class="list-group-item list-group-item-action"  href="ExamForm.php" role="tab">Exam Registration</a>
        <a class="list-group-item list-group-item-action"  href="viewExamForm.php" role="tab">View Exam Form</a>
        <a class="list-group-item list-group-item-action"  href="notes.php" role="tab">Notes</a>
        <a class="list-group-item list-group-item-action"  href="changePassword.php" role="tab">Change Password</a>
        <?php }?>
    </div>
</div>


