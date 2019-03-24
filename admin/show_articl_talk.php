<?php
//引用连接数据库包
include_once("../mysql_modle/sql.php");
//把邮箱名和发表的内容传过来赋值
session_start();
$dbtalk_content=$_POST['talk_area'];
$dbemail=$_SESSION['user_email'];
$a=$_POST["hidden_title"];
//数据库选择
mysqli_select_db($conect_db,USER_INFO);
$sql="INSERT INTO talk_area(title,talk_email,talk_content) VALUES('$a','$dbemail','$dbtalk_content');";
$result=mysqli_query($conect_db,$sql);
//检测是否评价成功
if(!$result){
    die("评论失败<br/>".mysqli_error($conect_db));
}
else{
   echo"评论成功<br/>";
   mysqli_close($conect_db);
   /*echo "<form action='show_articl.php' method='POST'>";
   echo "<input type=hidden name='kuku' value=$a> ";
   echo "</form>";*/
   header("Location:../admin/show_articl.php?id=$a");
   exit();
}
?>