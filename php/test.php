<?php
 //MYSQL登录信息
 $dbserver_name="localhost:8889";
 $dbuser_name="root";
 $dbpassword="root";
 //连接数据库
 $conect_db=mysqli_connect($dbserver_name,$dbuser_name,$dbpassword);
//选择数据库
 mysqli_select_db($conect_db,USER_INFO);

 $sql="SELECT *".
 "FROM register_info WHERE email='$_POST[user_email]'".
 " and password='$_POST[user_password]';";