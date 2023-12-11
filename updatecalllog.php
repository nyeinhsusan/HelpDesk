<?php
include_once 'header.php';
?>
<br><br>



  <!-- //get=> show => edit=>update -->

  <?php
// echo "this is update page";
// echo $_GET['id'];
require_once "./db_connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id']; //that is to get id from read.php

    //you need to write to call the same with id in the database

    $sql = " SELECT * FROM call_log WHERE  id = $id "; //call

    $query = mysqli_query($conn, $sql); //get,store
// echo "<pre>";
// print_r(mysqli_fetch_assoc($query));//that is testing for get or not
    $data = mysqli_fetch_assoc($query); //you alrady get data and then  store in  $data (that is step 1 get data)
}
// step3
if (isset($_GET['updateBtn'])) {
    $taskId = $_GET['taskId'];
    $caller_name = $_GET['caller_name'];
    $call_time = $_GET['call_time'];
    $response_time = $_GET['response_time'];
    $note = $_GET['note'];
    $status = $_GET['status'];

    // die($task_software);
    // $updateSQL = "UPDATE caller_info SET name ='$taskName' WHERE id= $taskId";
    $updateSQL = "UPDATE call_log
                  SET caller_name ='$caller_name',
                  call_time = '$call_time',
                      response_time= '$response_time',
                      note = '$note',
                      status = '$status'
                  WHERE id = $taskId";

    if (mysqli_query($conn, $updateSQL)) {
        header("location:callLog.php");
        // echo "update success";

    } else {
        echo "update error" . mysqli_error();
    }
}

?>

 <form method="GET" class="row">
<div class="container">
 <section class="card mt-4">
            <div class="card-header">
                <h4>Add New Caller Info</h4>
            </div>
            <div class="card-body">
  <!-- Tasks -->
  <!-- // that is step 2 you need to call id and name -->
<input type="hidden" name="taskId" value="<?php echo $data['id'] ?>" required>
  <!-- <input type="text" name="taskName" value="<?php echo $data['name'] ?>" required> -->
                    <div class="form-group col-3">
                               <label class="form-label">Caller Name</label>
                        <input type="text" name="caller_name" class="form-control" value="<?php echo $data['caller_name'] ?>"required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Call Time</label>
                        <input type="date" name="call_time" class="form-control"  value="<?php echo $data['call_time'] ?>"required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Respone Time</label>
                        <input type="date" name="response_time" class="form-control" value="<?php echo $data['response_time'] ?>"required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Problem Description</label>
                        <input type="text" class="form-control" name="note" value="<?php echo $data['note'] ?>" required>
                    </div>
                    <div class="form-group">
                      <span> <?=$data['status']?></span>
                        <label class="form-label">Status</label>

                        <select name="status" id="" class="form-select"  required>
                            <option value="ongoing" <?=($data['status'] === 'ongoing') ? 'selected' : ''?>>Ongoing</option>
                            <option value="resolved" <?=($data['status'] === 'resolved') ? 'selected' : ''?>>Resolved</option>
                        </select>
                    </div>
                    <div class="d-flex gap-3 pt-3">
                        <!-- <button type="submit" class="btn btn-warning" name="btnAdd">Add</button> -->
                        <button name="updateBtn" class="btn btn-warning">Update</button>

                    </div>
                </form>
            </div>
        </section>
</form>


<!-- that is caller info list  -->
 <?php
require_once "db_connection.php";

if (isset($_POST['btnAdd'])) {
    $caller_name = $_POST['caller_name'];
    $call_time = $_POST['call_time'];
    $response_time = $_POST['response_time'];
    $note = $_POST['note'];
    $status = $_POST['status'];

    $sql = "INSERT INTO call_log(caller_name,call_time,response_time,note,status) VALUES('$caller_name','$call_time,'$response_time','$note','status')";
    // if(mysqli_query(connection,query))
    if (mysqli_query($conn, $sql)) {
        echo "Insert Success";
        // header("location:read.php");
    }
}

?>
        <div class="card mt-4">
            <table class="table">
                 <thead>
                    <tr class="table-active">
                        <th>Serial No</th>
                        <th>Caller Name</th>
                        <th>Call Time</th>
                        <th>Response Time</th>
                        <th>Problem Description</th>
                        <th>Status</th>

                    </tr>
               </thead>
                <tbody>

<?php
require_once "./db_connection.php";
$mysql = "SELECT * FROM call_log";
$query = mysqli_query($conn, $mysql);
while ($row = mysqli_fetch_assoc($query)) {
    echo " <tr>

                  <td>{$row['id']}</td>
                     <td>{$row['caller_name']}</td>
                     <td>{$row['call_time']}</td>
                     <td>{$row['response_time']}</td>
                     <td>{$row['note']}</td>
                     <td>{$row['status']}</td>
                      <td>
        <a href='updatecalllog.php?id={$row['id']}'>Update</a>
<a href='deletecall-log.php?id={$row['id']}'>Delete</a>
    </td>
  </tr>";

}
?>
              </tbody>
            </table>
        </div>
        <!-- end specilist Table -->
   </div>

</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>






</body>
</html>