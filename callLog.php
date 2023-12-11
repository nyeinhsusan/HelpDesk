<?php
include_once 'header.php';

?>
    <div class="container">
        <!-- add and search Specilist -->
        <section class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h4>Add New Call Record</h4>
<form action="#" method="GET">
<div class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"  name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
</div>

</form>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label class="form-label">Caller Name</label>
                        <input type="text" name="caller_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Call Time</label>
                        <input type="date" name="call_time" class="form-control"  required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Respone Time</label>
                        <input type="date" name="response_time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Problem Description</label>
                        <input type="text" class="form-control" name="note"  required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select name="status" id="" class="form-select"  required>
                            <option value="ongoing">Ongoing</option>
                            <option value="resolved">Resolved</option>
                        </select>
                    </div>
                    <div class="d-flex gap-3 pt-3">
                        <button type="submit" class="btn btn-warning" name="btnCreate">Update</button>
                        <!-- <button class="btn btn-success">Search</button> -->
                    </div>
                </form>
            </div>
        </section>


  <?php
require_once "db_connection.php";

if (isset($_POST['btnCreate'])) {
    $caller_name = $_POST['caller_name'];
    $call_time = $_POST['call_time'];
    $response_time = $_POST['response_time'];
    $note = $_POST['note'];
    $status = $_POST['status'];

    $sql = "INSERT INTO call_log(caller_name,call_time,response_time,note,status) VALUES('$caller_name','$call_time','$response_time','$note','$status')";
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
//that is search part
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM call_log WHERE caller_name LIKE '%$search%'";

} else {
    $sql = "SELECT * FROM call_log";

}

// $mysql = "SELECT * FROM call_log";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) {

    echo "<tr>
                     <td>{$row['id']}</td>
                     <td>{$row['caller_name']}</td>
                     <td>{$row['call_time']}</td>
                     <td>{$row['response_time']}</td>
                     <td>{$row['note']}</td>
                     <td>{$row['status']}</td>
                                                          <td>
        <a href='updatecalllog.php?id={$row['id']}'>Update</a>
<a href='deletecall-log.php?id={$row['id']}'>Delete</a>
    </td><td>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>