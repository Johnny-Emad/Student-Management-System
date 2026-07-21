<?php require_once("includes/header.php") ?>
<?php require_once("includes/functions.php") ?>
<div class="row g-4">
    <div class="col-12">
        <h1 class="h3 mb-4">Dashboard</h1>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 border-secondary">
            <div class="card-body">
                <h2 class="h6">Total Students</h2>
                <p class="display-6 mb-0"><?= getAllStudents() ?></p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 border-secondary">
            <div class="card-body">
                <h2 class="h6">Avarage Score</h2>
                <p class="display-6 mb-0"><?= calcAverage() ?></p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 border-secondary">
            <div class="card-body">
                <h2 class="h6">Fail Students</h2>
                <p class="display-6 mb-0"><?= getFailers() ?></p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 border-secondary">
            <div class="card-body">
                <h2 class="h6">Pass Students</h2>
                <p class="display-6 mb-0"><?= getPassers() ?></p>
            </div>
        </div>
    </div>
</div>

<?php require_once("includes/footer.php") ?>