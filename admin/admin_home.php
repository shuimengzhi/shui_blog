<!--用户评论权限同时也是管理员主页-->

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
                      $sql='SELECT id,name,email,password,mobile,age,gender,talk_power from register_info';
                      $result=mysqli_query($conect_db,$sql);?>
                     
                      
                      <table border='1'><tr><td>id</td><td>名字</td><td>email</td><td>电话</td><td>年龄</td><td>性别</td><td>是否被禁言</td><td>编辑</td></tr>
                     <?php
                      //session_start();
                      while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
                      {//表单
                        
                        
                          echo"<form action='editor_user.php' method=post>";
                          echo"<tr><td>{$row['id']}</td>".
                          
                          "<td>{$row['name']} </td>".

                          "<td>{$row['email']} </td>".                    
                                                  
                          "<td>{$row['mobile']} </td>".

                          "<td>{$row['age']} </td>".

                          "<td>{$row['gender']} </td>";
                         
                            if($row['talk_power']=='can-talk')
                            {
                                echo"<td class='good'>否</td>";}
                            else{
                                echo"<td class='good'>是</td>";}   
                                $a=$row["id"];
                                $_SESSION["editor_id"]=$a;      
                                echo "<td><a href='http://localhost:8888/shui_blog/admin/editor_user.php?id=$a'>编辑</a></td></tr>";
                                echo"</form>";   
                                                  
                            }
                        echo"</table>";
                        mysqli_close($conect_db);
                       
                        //更新数据库
                       //$sql1="UPDATE register_info SET talk_power=  where name=";

                 ?> 
            </div>
         
            <!--<div class="bg-secondary text-white" id="floor"><p>待输入文字</p></div>-->
       
</div>
</body>
</html>