<?php require_once("includes/header.php"); ?>
<?php require_once("includes/functions.php"); ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border">
            <div class="card-body">
                <h1 class="h3 fw-bold mb-4">Edit Student</h1>

                <?php
                $student = null;
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
                    foreach ($_SESSION["students"] as $item) {
                        if ($item["id"] == $_GET["id"]) {
                            $student = $item;
                            break;
                        }
                    }
                }

                if ($student):
                ?>
                    <form action="edit.php" method="POST" class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="<?= $student["name"] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $student["email"] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone" value="<?= $student["phone"] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Age</label>
                            <input type="number" class="form-control" name="age" min="5" max="100" value="<?= $student["age"] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Grade</label>
                            <select class="form-select" name="grade" required>
                                <option value="A" <?= $student["grade"] == "A" ? "selected" : "" ?>>A</option>
                                <option value="B" <?= $student["grade"] == "B" ? "selected" : "" ?>>B</option>
                                <option value="C" <?= $student["grade"] == "C" ? "selected" : "" ?>>C</option>
                                <option value="D" <?= $student["grade"] == "D" ? "selected" : "" ?>>D</option>
                                <option value="F" <?= $student["grade"] == "F" ? "selected" : "" ?>>F</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Score</label>
                            <input type="number" class="form-control" name="score" min="0" max="100" value="<?= $student["score"] ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="male" <?= $student["gender"] == "male" ? "checked" : "" ?> required>
                                <label class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="female" <?= $student["gender"] == "female" ? "checked" : "" ?> required>
                                <label class="form-check-label">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="other" <?= $student["gender"] == "other" ? "checked" : "" ?> required>
                                <label class="form-check-label">Other</label>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $student["id"] ?>">
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-secondary">Update</button>
                            <a href="students.php" class="btn btn-outline-secondary ms-2">Back</a>
                        </div>
                    </form>
                <?php else: ?>
                    <p class="text-muted mb-0">Student not found.</p>
                <?php endif; ?>
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

    if (isset($_POST['score']) && filter_var($_POST['score'], FILTER_VALIDATE_INT)) {
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

    if (isset($_POST['phone']) && strlen($_POST['phone']) == 11 && is_numeric($_POST["phone"])) {
        $phone = htmlspecialchars($_POST['phone']);
    } else {
        $phone = $isValid;
    }

    if (
        $name != $isValid &&
        $age != $isValid &&
        $score != $isValid &&
        $gender != $isValid &&
        $email != $isValid &&
        $phone != $isValid &&
        $grade != $isValid
    ) {
        for ($i = 0; $i < count($_SESSION["students"]); $i++) {
            if ($_POST['id'] == $_SESSION["students"][$i]["id"]) {
                $_SESSION["students"][$i]["name"] = $name;
                $_SESSION["students"][$i]["age"] = $age;
                $_SESSION["students"][$i]["grade"] = $grade;
                $_SESSION["students"][$i]["gender"] = $gender;
                $_SESSION["students"][$i]["score"] = $score;
                $_SESSION["students"][$i]["phone"] = $phone;
                $_SESSION["students"][$i]["email"] = $email;
                break;
            }
        }

        header("Location: students.php");
        exit;
    }
}
?>

<?php require_once("includes/footer.php"); ?>