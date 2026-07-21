<?php require_once("includes/header.php") ?>
<?php

function calcStats(int $number)
{
    $score = $_SESSION["students"][$number]["score"];
    if ($score >= 50) {
        echo "<span style='color: green; font-weight: bold;'>Pass</span>";
    } else {
        echo "<span style='color: red; font-weight: bold;'>Fail</span>";
    }
}

function getAllStudents()
{
    if (!empty($_SESSION["students"])) {
        return count($_SESSION["students"]);
    } else {
        return 0;
    }
}

function calcAverage()
{

    $total = 0;
    $numOfStudents = count($_SESSION["students"]);
    $finalNum = "";

    if ($numOfStudents != 0) {
        for ($num = 0; $num < $numOfStudents; $num++) {
            $total += $_SESSION["students"][$num]["score"];
            $finalNum = (int) ($total / $numOfStudents);
        }
    } else {
        $finalNum = 0;
    }

    return $finalNum;
}

function getFailers()
{
    $numOfStudents = count($_SESSION["students"]);
    $failers = 0;
    if ($numOfStudents != 0) {
        for ($num = 0; $num < $numOfStudents; $num++) {
            if ($_SESSION["students"][$num]["score"] < 50) {
                $failers++;
            }
        }
    } else {
        $failers = 0;
    }

    return $failers;
}

function getPassers()
{
    $numOfStudents = count($_SESSION["students"]);
    $passers = 0;
    if ($numOfStudents != 0) {
        for ($num = 0; $num < $numOfStudents; $num++) {
            if ($_SESSION["students"][$num]["score"] >= 50) {
                $passers++;
            }
        }
    } else {
        $passers = 0;
    }

    return $passers;
}

?>

<?php require_once("includes/footer.php") ?>