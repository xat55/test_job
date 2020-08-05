# test_job

Создать страницу с авторизацией пользователя: логин и пароль и реализовать в ней:
возможность регистрации пользователя (email, логин, пароль, ФИО),
при входе в "личный кабинет" возможность сменить пароль и ФИО.
использовать "чистый" PHP 5.6 и выше (без фреймворков) и MySQL 5.5 и выше, дизайн не важен, верстка тоже простая. Наворотов не нужно, хотим посмотреть просто Ваш код.

Пояснение по проекту:
1. Открываем опенсервером файл index.php
2. Далее, либо авторизуемся, либо регистрируем нового пользователя
3. Данные для авторизации:
	- laven1 пар. 111111
	- laven2 пар. 222222
	- и так далее...
Базу данных test.sql положил в корень

4. Сделал ссылку для разлогирования.
5. В личном кабинете можно редактировать свои данные, кроме пароля. 

П.С. 
- Сделал связь между страницами на сессиях.
- Сделал валидацию входящих данных регулярными выражениями
- Закрыл доступ к папке "elem" с данными базы посредством файла htaccess
