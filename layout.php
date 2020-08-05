<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<p>текст для любого пользователя</p>
	<?php
	if (!empty($_SESSION['flash']['auth'])) {
		echo 'текст только для авторизованного пользователя';
	}
	?>
	<p>текст для любого пользователя</p>
	<p><a href="logout.php">Выход из аккаунта</a></p>
	<p><a href="profile.php">Личный кабинет</a></p>
</body>
</html>
