<?php require_once("includes/header.php"); ?>

<form action="./register.php" method="POST">
    <input type="text" name="name" placeholder="Enter your name" required>
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="tel" name="phone" placeholder="Enter your phone number" required />
    <input type="number" name="age" placeholder="Enter your age" min=5 max=100 required>

    <select name="grade" required>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="F">F</option>
    </select> <input type="number" name="score" placeholder="Enter your score" min=0 max=100 required>
    <label>
        <input type="radio" name="gender" value="male" required> Male
    </label>
    <label>
        <input type="radio" name="gender" value="female" required> Female
    </label>
    <label>
        <input type="radio" name="gender" value="other" required> Other
    </label>

    <button type="submit">Register</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $name = $age = $grade = $score = $gender = $email = $phone = "";

    if (isset($_POST['name']) && strlen($_POST["name"]) >= 3) {
        $name = htmlspecialchars($_POST['name']);
    } else {
        echo "No name given";
    }

    if (isset($_POST['age']) && filter_var($_POST['age'], FILTER_VALIDATE_INT)) {
        if ($_POST['age'] >= 5 && $_POST['age'] <= 100) {
            $age = htmlspecialchars($_POST['age']);
        } else {
            $age = "Non valid age given";
        }
    } else {
        echo "No age given";
    }

    if (isset($_POST['grade'])) {
        $grade = htmlspecialchars($_POST['grade']);
    } else {
        $grade = "No grade given";
    }

    if (filter_var($_POST['score'], FILTER_VALIDATE_INT) && isset($_POST['score'])) {
        if ($_POST['score'] >= 0 && $_POST['score'] <= 100) {
            $score = htmlspecialchars($_POST['score']);
        } else {
            $score = "Non valid score given";
        }
    } else {
        $score = "No score given";
    }

    if (isset($_POST['gender'])) {
        $gender = htmlspecialchars($_POST['gender']);
    } else {
        $gender = "No gender given";
    }

    if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlspecialchars($_POST['email']);
    } else {
        $email = "No email given";
    }

    if (isset($_POST['phone']) && strlen($_POST['phone']) == 11) {
        $phone = htmlspecialchars($_POST['phone']);
    } else {
        $phone = "No phone number given";
    }
}
?>

<?php require_once("includes/footer.php");
