<?php declare(strict_types=1);
require __DIR__.'/views/header.php'; ?>


<h1>Login</h1>

<form method="post" action="/app/auth/alogin.php"><br>
<strong>Email: </strong> <input type="email" placeholder="Enter email" name="email" required><br>
<br><strong>Password: </strong> <input type="password" placeholder="Enter Password" name="password" required><br>
<button type="submit" id="login">Login</button>

<?php
if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
}
?>
</form>
