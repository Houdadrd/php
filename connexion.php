<?php
$con = new mysqli ('localhost', 'root','','ecole');
if (!$con) {
    die(mysqli_error($con));
}

?>