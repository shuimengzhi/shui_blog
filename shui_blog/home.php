<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-text" content="text/html">
    <title>Blog Of ShuiMengZhi</title>
    <link rel="stylesheet" type="text/css" media="screen" href="test.css">
    <link rel="stylesheet" href="css/layui.css" media="all">
 
</head>
<body>
    <div class=entry-content>
<a  class=email_text href="http://localhost:8888/shui_blog/home.php">E-mail: 
    <?php 
     session_start();
     echo $_SESSION['user_email'];?></a></div>
    <header>
    <h5>Blog Of ShuiMengZhi</h5>
    </header>
    
        <?php
        //连接数据库
        $dbserver_name="localhost:8889";
        $dbuser_name="root";
        $dbpassword="root";
       //连接数据库
        $conect_db=mysqli_connect($dbserver_name,$dbuser_name,$dbpassword);
         //判断是否连接成功（测试用）
        /* if(!$conect_db){
            die("connect error:".mysqli_error($conect_db));
           }
           else{
                  echo "connect successful!";
           }*/
           mysqli_select_db($conect_db,USER_INFO);
           $sql="SELECT title from article";
           $result=mysqli_query($conect_db,$sql);
           while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
           {$a=$row['title'];
              
              echo "<p><a href='http://localhost:8888/shui_blog/admin/show_articl.php?id={$a}'>{$a}</a></p><br>";
              echo "-----------------------------------------------------------------";
           }?>
        
             
    </div><!-- .entry-content -->
     <!--评论区-->
    <div class=entry-content>
     <p class="talk"><b>评论区</b></p>
     <p>-----------------------------------------------------------------</p>
     <p><?php 
       
       $sql1="SELECT talk_email,talk_content FROM talk_area WHERE title='home';";
       $result=mysqli_query($conect_db,$sql1);
       //判断评论区数据库读取是否成功（测试用）
       /*if(!$result){
           die("erro".mysqli_error($conect_db));
       }*/
       
       while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
       {
           echo "{$row['talk_email']}<br/>";
           echo "{$row['talk_content']}<br/>";
           echo "--------------------------------------------------------------<br/>";
        }
       mysqli_close($conect_db);
     ?></p>
    </div>
    <div class="entry-content">
    <form method="POST" action="php/talk.php">
            <p class="talk"><b>发表评论</b></p>
            <input type="hidden" name="hidden_title" value="home">
            <textarea class="textarea" rows="10" cols="100" name="talk_area" required></textarea>
            <input class="submit" type="submit" value="提交">
            
        </form> 
    </div>
    
</body>
</html>