<?php declare(strict_types=1); ?>
<?php require __DIR__.'/views/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/stylesheet.css">

<h1>Create an account</h1>

<form method="POST" action="/app/auth/asignup.php"><br>
<strong>Username: </strong> <input type="text" name="username" placeholder="Enter Username" id="username" required><br>
<br><strong>Email: </strong> <input type="email"  name="email" placeholder="Enter your email" id="email" required><br>
<br><strong>Password: </strong> <input type="password"  name="password" placeholder="Enter Password" id="password" required><br>


<br><button type="submit" id="createaccount">Create Account</button>
</form>
