<?php
include 'elems/init.php';

if (!empty($_SESSION['flash']['auth'])) {
	echo "Вы зашли как user '$_SESSION[login]'";
} else {
	echo "<p>Пожалуйста, <a href=\"login.php\">авторизуйтесь</a> или <a href=\"register.php\">зарегистрируйтесь</a></p>";
}

include 'layout.php';
