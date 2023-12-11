<?php
include_once 'header.php';
?>




    <div class="container">
        <!-- add and search Specilist -->
        <section class="card mt-4">
                 <div class="card-header d-flex justify-content-between">
                <h4>Add New Specialist</h4>
                <form action="#" method="GET">
<div class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
</div>
</form>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label class="form-label">Specialist Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Expertise</label>
                        <input type="text" name="expertise" class="form-control">
                    </div>
                    <div class="d-flex gap-3 pt-3">
                        <button type="submit" class="btn btn-warning" name="addBtn">Create</button>
                        <!-- <button class="btn btn-success">Search</button> -->
                    </div>
                </form>
            </div>
        </section>
<?php
//that is create part for Specialist
require_once "db_connection.php";

if (isset($_POST['addBtn'])) {
    $name = $_POST['name'];
    $expertise = $_POST['expertise'];
    $sql = "INSERT INTO specialist(name,expertise) VALUES('$name','$expertise')";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {

    }
}

?>
        <!-- Specilist Table -->
        <div class="card mt-4">
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th>Serial No</th>
                        <th>Name</th>
                        <th>Expertise</th>

                    </tr>

                </thead>
                <tbody>




<?php

require_once "./db_connection.php";

//that is search part
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM specialist WHERE name LIKE '%$search%'";

} else {
    $sql = "SELECT * FROM specialist";

}

// $mysql = "SELECT * FROM specialist";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    echo "  <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['expertise']}</td>
                                            <td>

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
