<?php ?>
<!doctype html>
<html lang="en">
<style>
    a:link {
  color: white;
}
</style>
<?php include('templates/header.php') ?>
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success_flag = false;
$error_flag = false;
$error_msg = "";
    if(!empty($_POST) && empty($_POST["del_id"])){
        $messages = $_POST["messages"];
        $response = $_POST["response"];
// var_dump($messages);
// var_dump($response);
            if(!empty($messages) && !empty($response)){
                try{
              $sql = "INSERT INTO chatbot (messages, response) VALUES ('$messages', '$response')";
            //   var_dump($sql);
              if ($conn->query($sql) === TRUE) {
                $success_flag = true;
          } else {
              $error_flag =true;
          }
        }catch(Exception $e){
            $error_flag =true;
        }
        }
        // header("refresh: 0;");
    }
    //delete student
    if(!empty($_POST) && !empty($_POST["del_id"])){
        $deleteId = $_POST["del_id"];
        $sqlnew = "SELECT * FROM chatbot where id=$deleteId";
        $resultnew = $conn->query($sqlnew);
        $enroll = '';
        if ($resultnew->num_rows > 0) {
         $res =  $resultnew->fetch_assoc();
         $deleteUser = "DELETE FROM chatbot WHERE id=$deleteId";
        if (mysqli_query($conn, $deleteUser)) {
            $success_flag = true;
        echo "Record deleted successfully";
        } else {
            $error_flag =true;
        echo "Error deleting record: " . mysqli_error($conn);
        }
        }
        header("refresh: 0;");
    }
}

$sql = "SELECT * FROM chatbot";
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

            <div id="notes_form1">
                <div class="panel panel-default" style="width: 80%;">
                        <div class="panel-heading">Add Messages</div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="manageChatbot.php" >
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="cn">Messages :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="title" name="messages" placeholder="messages">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="th">Response :</label>
                                    <div class="col-sm-4">
                                    <textarea type="text" class="form-control" id="response" name="response" ></textarea>
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <input type="button" class="btn btn-default" id="cancel" name="cancel" value="Cancel">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="tb_data">
                <?php if($isadmin) {?><button type="button" class="btn btn-primary" id="add">Add</button><?php } ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Messages</th>
                            <th scope="col">Response</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
            if ($result1->num_rows > 0) {
                $i=1;
              while($row = $result1->fetch_assoc()) {?>
                        <tr>
                            <th scope="row">
                                <?php echo $i; ?>
                            </th>
                            <td>
                                <?php echo $row["messages"]; ?>
                            </td>
                            <td>
                                <?php echo $row["response"]; ?>
                            </td>
                            <td>
                            <!-- <button type="button" class="btn btn-success btn-sm" aria-label="Left Align" id="delete_<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
                            <a href="http://localhost/college/<?php echo $row["url"]; ?>" download> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></a>
                                </button> -->
                                <?php if($isadmin) {?>
                                <button type="button" class="btn btn-danger btn-sm del" aria-label="Left Align" id="delete_<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
                                  <input type="hidden" value="<?php echo $row["id"]; ?>" />
                                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                                <?php } ?>
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
</div>
<script>
       
        $(document).ready(function() {
            $("#notes_form1").hide();
            $("#del_msg").hide();
            // $("#student_form").hide();
            $("#add").click(function() {
                $("#notes_form1").show();
                $("#tb_data").hide();
            });
            $("#cancel").click(() => {
            $("#notes_form1").hide();
            $("#tb_data").show();
        })
            $(".del").click((node) => {
                // console.log(data.target.value)
                var id = node.currentTarget.value
                console.log(id)

                const xhttp = new XMLHttpRequest();
                FD = new FormData();
                xhttp.onload = function() {
                    location.reload()
                    $("#del_msg").show();
                }
                FD.append("del_id", id);
                xhttp.open("POST", 'manageChatbot.php', {
                        del_id: id
                    });
                xhttp.send(FD);

            })
        });
    </script>
    <?php include('templates/footer.php') ?>
</html>
