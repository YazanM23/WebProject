<?php

$conn = new mysqli('localhost', 'root', '123456', 'project');

if ($conn->connect_error){
    die('Error : (' .$conn->connect_errno . ') ' . $conn->connect_error);
}



?>