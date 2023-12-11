<?php

$conn = mysqli_connect('localhost', 'root', '', 'helpdesk', 4306);
if ((!$conn)) {

    echo "connection is failed" . mysqli_connect_error();
}
