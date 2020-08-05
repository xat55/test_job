<?php
include 'elems/init.php';

if(!empty($_POST['login']) and !empty($_POST['password'])) {

  if(!preg_match('#^[a-z0-9_]{4,10}$#i', $_POST['login'])) {
    $_SESSION['flash']['login'] = 'Логин должен быть длиной от 4 до 10 символов на латинице!';
  }

  if(!preg_match('#^[a-z0-9_]{6,12}$#i', $_POST['password'])) {
    $_SESSION['flash']['password'] = 'Пароль должен быть длиной от 6 по 12 символов!';
  }

  if($_POST['password'] == $_POST['confirm']) {
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Если массив $_SESSION['flash']['login'] и $_SESSION['flash']['password'] пуст, то логин и пароль прошли валидацию. См стр. 6, 10.
    if (empty($_SESSION['flash']['login']) && empty($_SESSION['flash']['password'])) {
      $query = "SELECT * FROM users WHERE login='$login'";

      $result = mysqli_query($link, $query) or die(mysqli_error($link));
      $user = mysqli_fetch_assoc($result);

      if(!empty($user)) {
        $hash = $user['password'];

        // Проверяем соответствие хеша из базы введенному паролю
        if (password_verify($_POST['password'], $hash)) {
          $_SESSION['id'] = $user['id'];
          $_SESSION['login'] = $user['login'];
          $_SESSION['email'] = $user['email'];
          $_SESSION['name'] = $user['name'];
          $_SESSION['flash']['auth'] = 'Вы успешно авторизованы!';
          echo $_SESSION['flash']['auth'];
        } else {
          echo 'Пароль не подошел';
        }
      } else {
        echo "Логин '$login' занят, введите другой!";
      }
    } else {
      echo empty($_SESSION['flash']['login']) ? : $_SESSION['flash']['login'];
      echo empty($_SESSION['flash']['password']) ? : $_SESSION['flash']['password'];
    }
  }
} else {
  echo 'Заполните все строки!';
}
?>
<form action="" method="POST">
  <input name="login" placeholder="login"><p>
  <input name="password" type="password" placeholder="password"><p>
  <input name="confirm" type="password" placeholder="confirm"><p>
  <input type="submit" value="Отправить">
</form>

<p><a href="logout.php">logout</a></p>
<p><a href="profile.php">Личный кабинет</a></p>
<p><a href="/">Перейти на главную страницу</a></p>

<?php
if (!empty($_SESSION['flash'])) {
  $_SESSION['flash']['login'] = null;
  $_SESSION['flash']['password'] = null;
}
