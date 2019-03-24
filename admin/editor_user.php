<!--管理员编辑用户信息-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/admin.css">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="main.js"></script>
</head>

<body>
<div id="global">
          <!--  <div id="heading" class="bg-secondary text-white">后台管理界面</div>-->
          <!--菜单内容-->  
          <div class="bg-dark text-white" id="content_menu" ><p class="menu_font">菜单选择</p>
            <ul>
                <li><a rel="nofollow" href="admin_home.php" class="a">用户评论权限</a></li>
                <li><a rel="nofollow" href="delet_talk.php" class="a">删除用户评论</a></li>
                <li><a rel="nofollow" href="add_articl.php" class="a">发表文章</a></li>
                <li><a rel="nofollow" href="delete_articl.php" class="a">删除文章</a></li>
                <li><a rel="nofollow" href="change_picture.php" class="a">更改滚动栏图片和分类</a></li>
            </ul>
            </div>
            <!--操作内容-->
            <div  id="content_body">  
<?php
//连接数据库
$dbserver_name="localhost:8889";
$dbuser_name="root";
$dbpassword="root";
//连接数据库
$conect_db=mysqli_connect($dbserver_name,$dbuser_name,$dbpassword);
 //判断是否连接成功（测试用）
 /*if(!$conect_db){
    die("connect error:".mysqli_error($conect_db));
   }
   else{
          echo "connect successful!";
   }*/
mysqli_select_db($conect_db,USER_INFO);
//获得需要编辑的用户的ID
$g=$_GET['id'];
$sql="SELECT id,name,email,password,mobile,age,gender,talk_power from register_info WHERE id={$g}";
$result=mysqli_query($conect_db,$sql);
//显示列表
echo "<form action='' method=post>";
echo"<table border='1'><tr><td>id</td><td>名字</td><td>email</td><td>密码</td><td>电话</td><td>年龄</td><td>性别</td><td>是否被禁言</td></tr>";

$row=mysqli_fetch_array($result,MYSQLI_BOTH);

    echo"<tr><td>{$row['id']}</td>".
    
    "<td><input type='text' id='name' name='user_name' value={$row['name']} ></td>".

    "<td><input type='email' id='mail' name='user_email' value={$row['email']}> </td>".
    
    "<td><input type='text' id='password' name='user_password' value={$row['password']}></td>".
                            
    "<td><input type='mobile' id='mobile' name='user_mobile' value={$row['mobile']}></td>".

    "<td><input type='number' id='age' name='user_age' value={$row['age']}></td>".

    "<td><input type='text' id='gender' name='user_gender' value={$row['gender']}></td>";
   
      if($row['talk_power']=='can-talk')
      {
          echo"<td class='good'><select name='talk_power'><option value='can-talk'>否</option><option value='no-talk'>是</option></select></td>";}
      else{
          echo"<td class='good'><select name='talk_power'><option value='no-talk'>是</option><option value='can-talk'>否</option></select></td></tr>";}    
                            
      
  echo"</table><input type=submit value='保存' class=button5></form>";
  //mysqli_close($conect_db);
  $n=$_POST["user_name"];
  $e=$_POST["user_email"];
  $p=$_POST["user_password"];
  $m=$_POST["user_mobile"];
  $a=$_POST["user_age"];
  $gd=$_POST["user_gender"];
  $t=$_POST["talk_power"];
   if(!$a==0){
     //更新数据库
      $sql1="UPDATE register_info SET name='{$n}', email='{$e}', password='{$p}', mobile='{$m}', age='{$a}', gender='{$gd}', talk_power='{$t}'  where id={$g}";
      $result1=mysqli_query($conect_db,$sql1);
      if(!$result1)
  {
    die('无法更新数据: ' . mysqli_error($conect_db));
  }
     echo '数据更新成功！';
}
?>
  </div>
         
         <!--<div class="bg-secondary text-white" id="floor"><p>待输入文字</p></div>-->
    
</div>
</body>
</html>