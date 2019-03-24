<?php
 //MYSQL登录信息
 $dbserver_name="localhost:8889";
 $dbuser_name="root";
 $dbpassword="root";
 //连接数据库
 $conect_db=mysqli_connect($dbserver_name,$dbuser_name,$dbpassword);
//选择数据库
 mysqli_select_db($conect_db,USER_INFO);
$useremail=$_POST["user_email"];
$userpassword=$_POST["user_password"];

//管理员账号密码
$admin_account="666@gmail.com";
$admin_password="admin";
$a=(($useremail==$admin_account)&&($userpassword==$admin_password));
 $sql="SELECT *FROM register_info WHERE email='$useremail' AND password='$userpassword'";

 $result=mysqli_query($conect_db,$sql);
 //检查是否连接成功
 if(!$conect_db){
    die("connect error:".mysqli_error($conect_db));
}
else{
    //echo mysqli_num_rows($result);
    //验证成功则跳转主页面
    //如果是管理员则进入后台
    if($a)
    { header('Location:../admin/admin_home.php');}
    else{
   if(mysqli_num_rows($result)>0){
    session_start();
    $_SESSION["user_email"]=$useremail;
    header('Location:../home.php');
    mysqli_close($conect_db);
    exit();
   }
   else{
       echo"账号或者密码错误";
   }
  }
}
mysqli_close($conect_db);
?>