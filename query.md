таблица пользователей:
users
----------
`id` int(11)
`email` varchar(55)
`login` varchar(55)

и таблица заказов
orders
--------
`id` int(11)
`user_id` int(11)
`price` int(11)

Необходимо :

1. составить запрос, который выведет список email'лов встречающихся более чем у одного пользователя

SELECT email FROM users GROUP BY email HAVING COUNT(login) > 1


2. вывести список логинов пользователей, которые не сделали ни одного заказа

SELECT users.login 
FROM users LEFT JOIN orders
ON users.id = orders.user_id
WHERE orders.user_id IS NULL


3. вывести список логинов пользователей которые сделали более двух заказов

SELECT users.login
FROM users 
LEFT JOIN orders ON users.id = orders.user_id
GROUP BY users.login
HAVING COUNT(orders.id) > 2
