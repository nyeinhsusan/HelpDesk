<?php
include_once 'header.php';
?>
    <div class="container">
        <!-- add and search Specilist -->
        <section class="card mt-4">
               <div class="card-header d-flex justify-content-between">
                <h4>Add New Call INFO</h4>
<form action="#" method="GET">
<div class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"  name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
</div>

</form>
            </div>
            <div class="card-body">
                <form  method="post" class="row">
                    <div class="form-group col-3">
                        <label class="form-label">Caller Name</label>
                        <input type="text" name="caller_name" class="form-control" require>
                    </div>
                    <div class="form-group col-3">
                        <label class="form-label">Job Title</label>
                        <input type="text" name="job_title" class="form-control"require>
                    </div>
                    <div class="form-group col-3">
                        <label class="form-label">Equiment Series ID</label>
                        <input type="text" name="equipment_id" class="form-control"require>
                    </div>
                    <div class="form-group col-3">
                        <label class="form-label">Equiment Make</label>
                        <input type="text" name="equipment_make" class="form-control"require>
                    </div>
                    <div class="form-group col-3">
                        <label class="form-label">Department</label>
                        <input type="text" name="department" class="form-control"require>
                    </div>
                    <div class="form-group col-3">
                        <label class="form-label">Equipment Type</label>
                        <input type="text" name="equipment_type" class="form-control" require>
                    </div>
                    <div class="form-group col-3">
                        <label class="form-label">Software</label>
                        <input type="text" name="software" class="form-control"require>
                    </div>
                    <div class="d-flex gap-3 pt-3">
                        <button type="submit" class="btn btn-warning" name="btnAdd">Add</button>
                        <!-- <button class="btn btn-success">Search</button> -->
                    </div>
                </form>
            </div>
        </section>

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
                        <th></th>
                    </tr>
                </thead>
                <tbody>

<?php
require_once "./db_connection.php";
//that is search part
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM caller_info WHERE name LIKE '%$search%'";

} else {
    $sql = "SELECT * FROM caller_info";

}

//that is read part or list part in php
// $mysql = "SELECT * FROM caller_info";//that is need to read part
$query = mysqli_query($conn, $sql);

// $row = mysqli_fetch_assoc($query);
while ($row = mysqli_fetch_assoc($query)) {
    // if ($row == null) {
    //     echo "";
    // } else {
    //     for ($i = 0; $i < count($row); $i++) {

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



<!-- footer start  -->

        <div class="footer">
            <p>@copyright:nyeinhsusan.155@gmail.com</p>
        </div>
        <!-- footer end  -->


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</html>