<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}
$id = $_GET['id'] ?? '';
if (!empty($id)) {
    $sql = "DELETE FROM students WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    header("Location: list.php?msg=deleted");
    exit();
}
?>