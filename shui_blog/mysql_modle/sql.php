<?php
//MYSQL登录信息
$dbserver_name="localhost:8889";
$dbuser_name="root";
$dbpassword="root";
//连接数据库
$conect_db=mysqli_connect($dbserver_name,$dbuser_name,$dbpassword);
if(!$conect_db){
    die("connect error:".mysqli_error($conect_db));
}
else{
    echo "connect successful!";
}
?>