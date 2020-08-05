<?php
include 'elems/init.php';

if(!empty($_POST['login']) and !empty($_POST['email']) and !empty($_POST['name']) and !empty($_POST['password'])) {

  if(!preg_match('#^[a-z0-9_]{4,10}$#i', $_POST['login'])) {
    $_SESSION['flash']['login'] = 'Логин должен быть длиной от 4 до 10 символов на латинице!';
  }

  if(!preg_match('#^[a-zA-Z0-9-.]+@[a-z]+\.[a-z]{2,3}$#i', $_POST['email'])) {
    $_SESSION['flash']['email'] = 'email некорректен!';
  }

  if(!preg_match('#^[a-zA-Z]{3,50}$#i', $_POST['name'])) {
    $_SESSION['flash']['name'] = 'Фамилия должна быть длинной от 3 до 50 символов на латинице!';
  }

  if(!preg_match('#^[a-z0-9_]{6,12}$#i', $_POST['password'])) {
    $_SESSION['flash']['password'] = 'Пароль должен быть длиной от 6 по 12 символов!';
  }

  if($_POST['password'] == $_POST['confirm']) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Если массив $_SESSION['flash']['login'] и $_SESSION['flash']['password'] пуст, то логин и пароль прошли валидацию. См стр. 6, 10.
    if (empty($_SESSION['flash']['login']) && empty($_SESSION['flash']['email']) &&
      empty($_SESSION['flash']['name']) && empty($_SESSION['flash']['password'])) {

      $query = "SELECT * FROM users WHERE login='$login'";
      $result = mysqli_query($link, $query) or die(mysqli_error($link));
      $user = mysqli_fetch_assoc($result);

      if(empty($user)) {
        $query = "INSERT INTO users SET login='$login', password='$password', email='$email', name='$name'";
        mysqli_query($link, $query) or die(mysqli_error($link));

        $_SESSION['id'] = mysqli_insert_id($link);
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['flash']['reg'] = 'Вы успешно зарегистрировались!';
        echo $_SESSION['flash']['reg'] . '<br>' ;
        $_SESSION['flash']['auth'] = 'Вы успешно авторизованы!';
        echo $_SESSION['flash']['auth'];
      } else {
        echo "Логин '$login' занят, введите другой!";
      }
    } else {
      echo !empty($_SESSION['flash']['login']) ? $_SESSION['flash']['login'] : '';
      echo !empty($_SESSION['flash']['email']) ? $_SESSION['flash']['email'] : '';
      echo !empty($_SESSION['flash']['name']) ? $_SESSION['flash']['name'] : '';
      echo !empty($_SESSION['flash']['password']) ? $_SESSION['flash']['password'] : '';
    }
  }
} else {
  echo 'Заполните все строки!';
}
?>
<h3>Страница регистрации</h3>
<form action="" method="POST">
  <input name="login" placeholder="login"><p>
  <input name="email" placeholder="email"><p>
  <input name="name" placeholder="ФИО"><p>
  <input name="password" type="password" placeholder="password"><p>
  <input name="confirm" type="password" placeholder="confirm"><p>
  <input type="submit" value="Отправить">
</form>
<p><a href="/">Перейти на главную страницу</a></p>
<p><a href="profile.php">Личный кабинет</a></p>

<?php
if (!empty($_SESSION['flash'])) {
  $_SESSION['flash']['login'] = null;
  $_SESSION['flash']['email'] = null;
  $_SESSION['flash']['name'] = null;
  $_SESSION['flash']['password'] = null;
}
