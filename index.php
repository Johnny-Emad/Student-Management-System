<?php require_once("includes/header.php"); ?>
<?php require_once("includes/functions.php"); ?>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card shadow-sm border">
            <div class="card-body">
                <h1 class="h3 fw-bold mb-3">Student Management System</h1>
                <p class="text-muted mb-4">A simple student dashboard with Bootstrap layout only, without custom CSS.</p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="register.php" class="btn btn-outline-secondary">Add Student</a>
                    <a href="students.php" class="btn btn-outline-secondary">View Students</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card shadow-sm border">
            <div class="card-body">
                <h2 class="h5 fw-bold mb-3">Quick Overview</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total Students</span>
                        <strong><?= getAllStudents(); ?></strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Pass</span>
                        <strong><?= getPassers(); ?></strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Fail</span>
                        <strong><?= getFailers(); ?></strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php require_once("includes/footer.php"); ?>