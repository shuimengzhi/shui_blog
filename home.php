<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-text" content="text/html">
    <title>Blog Of ShuiMengZhi</title>
    <link rel="stylesheet" type="text/css" media="screen" href="test.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
    <!--link rel="stylesheet" href="css/layui.css" media="all"-->
   
</head>
<body>
<div class=entry-content>
    <a  class=email_text href="http://localhost:8888/shui_blog/home.php">E-mail: 
    <?php 
     session_start();
     echo $_SESSION['user_email'];
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
        mysqli_query($conect_db,"set names utf8");
        mysqli_select_db($conect_db,USER_INFO);
        $sql="SELECT * FROM pic_info";
        $result=mysqli_query($conect_db,$sql);
        ?></a>
</div>
    <header>
    <h7>Blog Of ShuiMengZhi</h7>
    </header>
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
<?php
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
  {
     
   if($row["id"]==1){
     echo "<div class='item active'>";
     echo  "<img src='{$row['pic_src']}' alt='Chania' width='460' height='345'>";
        echo "<div class='carousel-caption'>";
          echo "<h3>{$row['pic_title']}</h3>";
          echo "<p>{$row['pic_content']}</p>";
        echo "</div>";
      echo "</div>";
   }
   else{
      echo "<div class='item'>";
        echo "<img src='{$row['pic_src']}' alt='Chania' width='460' height='345'>";
        echo "<div class='carousel-caption'>";
          echo "<h3>{$row['pic_title']}</h3>";
          echo "<p>{$row['pic_content']}</p>";
        echo "</div>";
      echo "</div>";
        }
    }
    ?>
    
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
    <div class=entry-content>
        <?php
         
           $sql="SELECT * from article";
           $result=mysqli_query($conect_db,$sql);
           $result1=mysqli_query($conect_db,$sql);
           echo "------------<h5>教育类</h5>-------------<br>";
           while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
           { if($row["lei"]=="教育类")
            { $a=$row['title'];
              
              echo "<a class=good href='http://localhost:8888/shui_blog/admin/show_articl.php?id={$a}'>{$a}</a><br>";
              echo "-----------------------------------------------------------------<br>";}
           }
           echo "------------<h5>如何思考类</h5>-------------<br>";
           while($k=mysqli_fetch_array($result1,MYSQLI_BOTH))
           { if($k["lei"]=="如何思考类")
            { $a=$k['title'];
              
              echo "<a class=good href='http://localhost:8888/shui_blog/admin/show_articl.php?id={$a}'>{$a}</a><br>";
              echo "-----------------------------------------------------------------<br>";}
           }
           ?>
        
             
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