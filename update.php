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

    $sql = " SELECT * FROM caller_info WHERE  id = $id "; //call

    $query = mysqli_query($conn, $sql); //get,store
// echo "<pre>";
// print_r(mysqli_fetch_assoc($query));//that is testing for get or not
    $data = mysqli_fetch_assoc($query); //you alrady get data and then  store in  $data (that is step 1 get data)
}
// step3
if (isset($_GET['updateBtn'])) {
    $taskId = $_GET['taskId'];
    $taskName = $_GET['taskName'];
    $task_job_title = $_GET['job_title'];
    $task_equipment_id = $_GET['equipment_id'];
    $task_equipment_make = $_GET['equipment_make'];
    $task_department = $_GET['department'];
    $task_equipment_type = $_GET['equipment_type'];
    $task_software = $_GET['software'];
    // die($task_software);
    // $updateSQL = "UPDATE caller_info SET name ='$taskName' WHERE id= $taskId";
    $updateSQL = "UPDATE caller_info
                  SET name ='$taskName',
                      job_title = '$task_job_title',
                      equipment_id = '$task_equipment_id',
                      equipment_make = '$task_equipment_make',
                      department = '$task_department',
                      equipment_type = '$task_equipment_type',
                      software = '$task_software'
                  WHERE id = $taskId";

    if (mysqli_query($conn, $updateSQL)) {
        header("location:callinfo.php");
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
  Tasks
  <!-- // that is step 2 you need to call id and name -->
<input type="hidden" name="taskId" value="<?php echo $data['id'] ?>" required>
  <!-- <input type="text" name="taskName" value="<?php echo $data['name'] ?>" required> -->
                    <div class="form-group col-3">
                        <label class="form-label">Caller Name</label>
                        <input type="text" name="taskName" class="form-control" value="<?php echo $data['name'] ?>" required>
                    </div>
                    <div class="form-group col-3">
                        <label class="form-label">Job Title</label>
                        <input type="text" name="job_title" class="form-control" value="<?php echo $data['job_title'] ?>" required>
                    </div>
                    <div class="form-group col-3">
                        <label class="form-label">Equiment Series ID</label>
                        <input type="text" name="equipment_id" class="form-control" value="<?php echo $data['equipment_id'] ?>" required>
                    </div>
                    <div class="form-group col-3">
                        <label class="form-label">Equiment Make</label>
                        <input type="text" name="equipment_make" class="form-control" value="<?php echo $data['equipment_make'] ?>" required>
                    </div>
                    <div class="form-group col-3">
                        <label class="form-label">Department</label>
                        <input type="text" name="department" class="form-control" value="<?php echo $data['department'] ?>" required>
                    </div>
                    <div class="form-group col-3">
                        <label class="form-label">Equipment Type</label>
                        <input type="text" name="equipment_type" class="form-control" value="<?php echo $data['equipment_type'] ?>" required>
                    </div>
                    <div class="form-group col-3">
                        <label class="form-label">Software</label>
                        <input type="text" name="software" class="form-control" value="<?php echo $data['software'] ?>" required>
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
    $job_title = $_POST['job_title'];
    $equipment_id = $_POST['equipment_id'];
    $equipment_make = $_POST['equipment_make'];
    $department = $_POST['department'];
    $equipment_type = $_POST['equipment_type'];
    $software = $_POST['software'];

    $sql = "INSERT INTO caller_info(name,job_title,equipment_id,equipment_make,department,equipment_type,software) VALUES('$caller_name','$job_title','$equipment_id','$equipment_make','$department','$equipment_type','$software')";
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
                        <th>Caller Id</th>
                        <th>Caller Name</th>
                        <th>Job Title</th>
                        <th>Equiment Id</th>
                        <th>Equiment Make</th>
                        <th>Department</th>
                        <th>Equiment Type</th>
                        <th>Software</th>
                    </tr>
                </thead>
                <tbody>

<?php
require_once "./db_connection.php";
$mysql = "SELECT * FROM caller_info";
$query = mysqli_query($conn, $mysql);
while ($row = mysqli_fetch_assoc($query)) {
    echo " <tr>

                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['job_title']}</td>
                    <td>{$row['equipment_id']}</td>
                    <td>{$row['equipment_make']}</td>
                    <td>{$row['department']}</td>
                    <td>{$row['equipment_type']}</td>
                    <td>{$row['software']}</td>
                      <td>
        <a href='update.php?id={$row['id']}'>Update</a>
<a href='delete.php?id={$row['id']}'>Delete</a>
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