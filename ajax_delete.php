<?php
include"dbcon.php";

    $id = $_POST['string'];
    $sql = "DELETE FROM donor WHERE id = '$id'";


/** @var TYPE_NAME $conn */
if ($conn->query($sql) === TRUE){
        echo "<p class='btn btn-info' align='center'> Record deleted successfully </p>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

?>