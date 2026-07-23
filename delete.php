<?php require_once("includes/header.php") ?>
<?php require_once("includes/functions.php") ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {

    for ($i = 0; $i < count($_SESSION["students"]); $i++) {

        if ($_GET["id"] == $_SESSION["students"][$i]["id"]) {

            unset($_SESSION["students"][$i]);
            $_SESSION["students"] = array_values($_SESSION["students"]);

            header("Location: students.php");
            exit;
        }
    }
}

?>

<?php require_once("includes/footer.php") ?>