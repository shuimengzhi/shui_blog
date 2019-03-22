<?php
$dbhost="localhost:8889";
$dbname="root";
$dbpassword="root";
$connect=mysqli_connect($dbhost,$dbname,$dbpassword);
//$creat_sql='SHOW DATABASES ';
//$result=mysqli_query($connect,$creat_sql);
//检查是否连接成功
if(!$connect){
    die("connect error:".mysqli_error($connect));
}
else{echo"connect sucess!!";}
mysqli_close($connect);
?>