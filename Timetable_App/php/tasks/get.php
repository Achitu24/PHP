<?php
require_once ("../utils.php");

#GET

0.creat tabela user_roles
1.session start 
2 $uid = $session['userid'];
3.conexiuneCalendar()
4. select tasks.name from user_roles 
    inner join tasks ON user_roles.roledid = tasks.roleid;
WHERE user_roles.roleid = $uid;
5.rulat query
6. fetch_assoc() -> pastrat in array.
7. return in array de la pct 6.


?>