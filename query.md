������� �������������:
users
----------
`id` int(11)
`email` varchar(55)
`login` varchar(55)

� ������� �������
orders
--------
`id` int(11)
`user_id` int(11)
`price` int(11)

���������� :

1. ��������� ������, ������� ������� ������ email'��� ������������� ����� ��� � ������ ������������

SELECT email FROM users GROUP BY email HAVING COUNT(login) > 1


2. ������� ������ ������� �������������, ������� �� ������� �� ������ ������

SELECT users.login 
FROM users LEFT JOIN orders
ON users.id = orders.user_id
WHERE orders.user_id IS NULL


3. ������� ������ ������� ������������� ������� ������� ����� ���� �������

SELECT users.login
FROM users 
LEFT JOIN orders ON users.id = orders.user_id
GROUP BY users.login
HAVING COUNT(orders.id) > 2