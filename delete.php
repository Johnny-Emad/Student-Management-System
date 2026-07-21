<?php require_once("includes/header.php"); ?>
<?php
if (isset($_GET["id"])) {
    foreach ($_SESSION["students"] as $index => $student) {
        if ($student["id"] == $_GET["id"]) {
            unset($_SESSION["students"][$index]);
            break;
        }
    }
}

header("Location: students.php");
exit;
?>
<?php require_once("includes/footer.php"); ?>
