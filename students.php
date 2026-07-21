<?php require_once("includes/header.php"); ?>
<?php require_once("includes/functions.php"); ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 fw-bold mb-1">Students</h1>
        <p class="text-muted mb-0">Manage the current student list in a clean Bootstrap layout.</p>
    </div>
    <a href="register.php" class="btn btn-outline-secondary">Add New Student</a>
</div>

<div class="card shadow-sm border">
    <div class="card-body">
        <?php if (!empty($_SESSION["students"])): ?>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Grade</th>
                            <th>Score</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($_SESSION["students"]); $i++): ?>
                            <tr>
                                <td><?= $_SESSION["students"][$i]["id"] ?></td>
                                <td><?= $_SESSION["students"][$i]["name"] ?></td>
                                <td><?= $_SESSION["students"][$i]["email"] ?></td>
                                <td><?= $_SESSION["students"][$i]["age"] ?></td>
                                <td><?= $_SESSION["students"][$i]["grade"] ?></td>
                                <td><?= $_SESSION["students"][$i]["score"] ?></td>
                                <td><?php calcStats($i); ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="edit.php?id=<?= $_SESSION["students"][$i]["id"] ?>" class="btn btn-outline-secondary">Edit</a>
                                        <a href="delete.php?id=<?= $_SESSION["students"][$i]["id"] ?>" class="btn btn-outline-secondary">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-muted mb-0">No data found.</p>
        <?php endif; ?>
    </div>
</div>

<?php require_once("includes/footer.php"); ?>