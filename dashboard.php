<?php require_once("includes/header.php") ?>
<?php require_once("includes/functions.php") ?>
<h1>Dashboard</h1>

<div>
    <h2>Total Students</h2>
    <span><?= getAllStudents() ?></span>
</div>

<div>
    <h2>Avarage Score</h2>
    <span><?= calcAverage() ?></span>
</div>

<div>
    <h2>Fail Students</h2>
    <span><?= getFailers() ?></span>
</div>

<div>
    <h2>Pass Students</h2>
    <span><?= getPassers() ?></span>
</div>

<?php require_once("includes/footer.php") ?>