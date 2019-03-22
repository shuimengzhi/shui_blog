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
                         $a=$_POST["id"];
                         mysqli_select_db($conect_db,USER_INFO);
                         $sql="DELETE from talk_area WHERE talk_id='$a'";
                         $result=mysqli_query($conect_db,$sql);
                         /*if(!$result){
                            die("connect error:".mysqli_error($conect_db));
                           }
                        else{
                            echo"{$a}已删除成功";
                        }*/
                        header('Location:../admin/delet_talk.php');

?>