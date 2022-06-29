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
	<h1>Admin Login</h1>
	<br><br><br>
	<div>
		<form action="./admin_login.php" method="post">
			<label for="email">Email</label>
			<input type="email" name="email" placeholder="Email" id="email" required>
			<label for="password">Passsword</label>
			<input type="password" name="password" placeholder="password" id="password" required>
			<input type="submit" name="submit" value="Autentifica-te">
		</form>
	</div>
</body>

</html>