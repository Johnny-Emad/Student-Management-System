<?php require_once("includes/header.php"); ?>

<form action="./register.php" method="POST">
    <input type="text" name="username" placeholder="Enter your username" required>
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

<?php require_once("includes/footer.php");
