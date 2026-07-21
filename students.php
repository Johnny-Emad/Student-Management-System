<?php require_once("includes/header.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php  ?>
<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Grade</th>
        <th>Score</th>
        <th>Status</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php if (!empty($_SESSION["students"])) {

            for ($i = 0; $i < count($_SESSION["students"]); $i++): ?>
                <tr>
                    <td><?= $_SESSION["students"][$i]["id"] ?></td>
                    <td><?= $_SESSION["students"][$i]["name"] ?></td>
                    <td><?= $_SESSION["students"][$i]["email"] ?></td>
                    <td><?= $_SESSION["students"][$i]["age"] ?></td>
                    <td><?= $_SESSION["students"][$i]["grade"] ?></td>
                    <td><?= $_SESSION["students"][$i]["score"] ?></td>
                    <td>
                        <?php
                        calcStats($i);
                        ?>
                    </td>
                    <td><?= $_SESSION["students"][$i]["phone"] ?></td>

                </tr>
        <?php endfor;
        } else {
            echo "No data found";
        } ?>
    </tbody>
</table>
<?php require_once("includes/footer.php"); ?>