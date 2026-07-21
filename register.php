<?php require_once("includes/header.php"); ?>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-4">Register Student</h1>
                <form action="./register.php" method="POST" class="row g-3">
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="text" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="tel" name="phone" placeholder="Enter your phone number" required />
                    </div>
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="number" name="age" placeholder="Enter your age" min=5 max=100 required>
                    </div>
                    <div class="col-12 col-md-6">
                        <select class="form-select" name="grade" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <input class="form-control" type="number" name="score" placeholder="Enter your score" min=0 max=100 required>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column flex-md-row gap-3">
                            <label class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male" required> Male
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female" required> Female
                            </label>
                            <label class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="other" required> Other
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

$isValid = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $age = $grade = $score = $gender = $email = $phone = "";

    if (isset($_POST['name']) && strlen($_POST["name"]) >= 3) {
        $name = htmlspecialchars($_POST['name']);
    } else {
        $name = $isValid;
    }

    if (isset($_POST['age']) && filter_var($_POST['age'], FILTER_VALIDATE_INT)) {
        if ($_POST['age'] >= 5 && $_POST['age'] <= 100) {
            $age = htmlspecialchars($_POST['age']);
        } else {
            $age = $isValid;
        }
    } else {
        $age = $isValid;
    }

    if (isset($_POST['grade'])) {
        $grade = htmlspecialchars($_POST['grade']);
    } else {
        $grade = $isValid;
    }

    if (filter_var($_POST['score'], FILTER_VALIDATE_INT) && isset($_POST['score'])) {
        if ($_POST['score'] >= 0 && $_POST['score'] <= 100) {
            $score = htmlspecialchars($_POST['score']);
        } else {
            $score = $isValid;
        }
    } else {
        $score = $isValid;
    }

    if (isset($_POST['gender'])) {
        $gender = htmlspecialchars($_POST['gender']);
    } else {
        $gender = $isValid;
    }

    if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = htmlspecialchars($_POST['email']);
    } else {
        $email = $isValid;
    }

    if (isset($_POST['phone']) && strlen($_POST['phone']) == 11) {
        if (is_numeric($_POST["phone"])) {

            $phone = htmlspecialchars($_POST['phone']);
        } else {
            $phone = $isValid;
        }
    } else {
        $phone = $isValid;
    }

    if (
        $name == $isValid ||
        $age == $isValid ||
        $score == $isValid ||
        $gender == $isValid ||
        $email == $isValid ||
        $phone == $isValid ||
        $grade == $isValid
    ) {
    } else {
        $_SESSION["students"][] = [
            "id" => uniqid(),
            "name" => $name,
            "age" =>  $age,
            "grade" => $grade,
            "score" => $score,
            "gender" => $gender,
            "email" => $email,
            "phone" => $phone
        ];
    }
}
?>

<?php require_once("includes/footer.php");
