<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./app.css" />
</head>

<body class="form">
	<br><br><br>
	<h1>Register</h1>
	<a href="./login_page.php" >Daca ai deja cont apasa aici pentru a te autentifica!</a>
	<br><br><br>
	<div>
		<form action="./register.php" method="post">
			<label for="name">Nume</label>
			<input type="text" name="name" placeholder="Nume" id="name" required><br>
			<label for="email">Email</label>
			<input type="email" name="email" placeholder="Email" id="email" required><br>
			<label for="password">Parola</label>
			<input type="password" name="password" placeholder="password" id="password" required><br>
			<label for="password">Repeta parola</label>
			<input type="password" name="cpassword" placeholder="confirm password" id="cpassword" required>
			<input type="submit" name="submit" value="Autentifica-te">
		</form>
	</div>
</body>

</html>