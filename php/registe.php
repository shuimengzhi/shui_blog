<?php
 //MYSQL登录信息
 $dbserver_name="localhost:8889";
 $dbuser_name="root";
 $dbpassword="root";

 $user_name=$_POST['user_name'];
 $user_email=$_POST['user_email'];
 $user_password=$_POST['user_password'];
 $user_mobile=$_POST['user_mobile'];
 $user_age=$_POST['user_age'];
 $user_gender=$_POST['user_gender'];
 //连接数据库
 $conect_db=mysqli_connect($dbserver_name,$dbuser_name,$dbpassword);
//选择数据库
 mysqli_select_db($conect_db,USER_INFO);
 //添加数据
 $create_sql= "INSERT INTO register_info (name,email,password,mobile,age,gender) VALUES". 
 "('$user_name','$user_email','$user_password','$user_mobile','$user_age','$user_gender');";
 //执行并返回结果
 $result=mysqli_query($conect_db,$create_sql);

 if(!$conect_db){
     die("注册失败，无法连接服务器<br/>".mysqli_error($conect_db));
     echo"<scrip language='javascript'>alert('注册失败')</scrip>";
 }
 else{
     if(!$result){
         die("注册失败，信息不符合规范<br/>".mysqli_error($conect_db));
         echo"<scrip language='javascript'>alert('注册失败')</scrip>";
     }
     else{
        echo"<scrip>funcion (){alert('注册成功')}</scrip>";
        header('Location:../login.html');
        mysqli_close($conect_db);
        exit();
     }
 }
 mysqli_close($conect_db);

?>