<?php
include 'elems/init.php';

if (!empty($_SESSION['flash']['auth'])) {
  echo "Вы авторизованы <br>";

  print_r($_SESSION);

  if (!empty($_POST['login']) && !empty($_POST['email']) &&
      !empty($_POST['name']) && !empty($_POST['password'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id='$id'"; // получаем юзера по id
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result);

    if (!empty($user)) {
      $hash = $user['password']; // соленый пароль из БД

      // Проверяем соответствие хеша из базы введенному паролю
      if (password_verify($_POST['password'], $hash)) {
        $login = $_POST['login'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "UPDATE users SET login='$login', email='$email', name='$name', password='$password' WHERE id='$id'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        echo $result ? 'Успешно обновлено!' : '';
      } else {
        echo 'Пароль не подошел';
      }
    } else {
      echo 'Пользователя с таким логином нет';
    }
  } else {
    $login = $_SESSION['login'];
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
  }
?>
<h3>Страница личного кабинета</h3>
<p>Для редактирования данных, заполните форму и отправьте ее</p>
<form action="" method="POST">
  <input name="login" placeholder="login" value="<?php echo $login ?>"><p>
  <input name="email" placeholder="email" value="<?php echo $email ?>"><p>
  <input name="name" placeholder="ФИО" value="<?php echo $name ?>"><p>
  <input name="password" type="password" placeholder="password"><p>
  <input type="submit" value="Отправить">
</form>
<?php
} else {
  echo "Доступ в личный кабинет имеют авторизованные пользователи!";
}
?>
<p><a href="/">Перейти на главную страницу</a></p>
<?php
