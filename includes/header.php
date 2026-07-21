<?php session_start();
if (!isset($_SESSION["students"])) {
    $_SESSION["students"] = [];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System
    </title>
</head>

<body>