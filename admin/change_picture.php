
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
             <form  method="post" enctype="multipart/form-data">
             选择更改第几个图片信息：<br>
             <input type="radio" name="pic_id" value="1">1<br>
             <input type="radio" name="pic_id" value="2">2<br>
             <input type="radio" name="pic_id" value="3">3<br>
             <input type="radio" name="pic_id" value="4">4<br>
             图片标题：<br>
             <input type="text"  name="pic_title" value=""><br>
             图片简介：限15个字<br>
             <input type="text"  name="pic_content" value=""><br>
             Upload Img:<br>
             <input type="file" name="img"/><br><br><br>
             <input type="submit" value="提交"/>
             </form>
                 <?php 
                                        
                         // 接收文件
                        //var_dump($_FILES); // 区别于$_POST、$_GET
                        //print_r($_FILES);
                        $file = $_FILES["img"];
                       
                        // 先判断有没有错
                        if ($file["error"] == 0) {
                        // 成功 
                        // 判断传输的文件是否是图片，类型是否合适
                        // 获取传输的文件类型
                        $typeArr = explode("/", $file["type"]);
                         if($typeArr[0]== "image"){
                          // 如果是图片类型
                        $imgType = array("png","jpg","jpeg");
                        if(in_array($typeArr[1], $imgType)){ // 图片格式是数组中的一个
                        // 类型检查无误，保存到文件夹内
                        // 给图片定一个新名字 (使用时间戳，防止重复)
                        $othersrc="img/".time().".".$typeArr[1];
                        $imgname = "../".$othersrc;
                          // 将上传的文件写入到文件夹中
                           // 参数1: 图片在服务器缓存的地址
                           // 参数2: 图片的目的地址（最终保存的位置）
                           // 最终会有一个布尔返回值
                           $bol = move_uploaded_file($file["tmp_name"], $imgname);
                           if($bol){
                            echo "上传成功！";
                           } else {
                            echo "上传失败！";
                           };
                          };
                         } else {
                          // 不是图片类型
                          echo "没有图片，再检查一下吧！";
                         };
                        } else {
                         // 失败
                         echo $file["error"];
                        };
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
                         //将表中的数据填入数据库
                         $pic_id=$_POST["pic_id"];
                         $pic_src=$othersrc;
                         $pic_title=$_POST["pic_title"];
                         $pic_content=$_POST["pic_content"];
                         //选择数据库
                         mysqli_select_db($conect_db,USER_INFO);
                        $sql="UPDATE pic_info SET pic_src='{$pic_src}',pic_title='{$pic_title}',pic_content='{$pic_content}' WHERE id='{$pic_id}'";
                        $result=mysqli_query($conect_db,$sql);
                        if(!$conect_db){
                            die("connect error:".mysqli_error($conect_db));
                           }
                           else{
                                  echo "connect successful!";
                           }
                        if(!$result){
                            die("修改失败:".mysqli_error($conect_db));
                           }
                           else{
                                  echo "修改成功";
                           }
                           mysqli_close($conect_db);
                ?> 
             </div>
            </div>
</body>
</html>