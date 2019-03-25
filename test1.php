<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>carousel模块快速使用</title>
  <link rel="stylesheet" href="css/layui.css" media="all">
</head>
<body>
 
<div class="layui-carousel" id="test1">
  <div carousel-item>
  <div><img src="img/newA4L.jpg"></div>
    <div><img src="img/newCamry.jpg"></div>
    <div><img src="img/newhighland.jpg"></div>
  </div>
</div>
<!-- 条目中可以是任意内容，如：<img src=""> -->
 
<script src="js/layui.js"></script>
<script>
layui.use('carousel', function(){
  var carousel = layui.carousel;
  //建造实例
  carousel.render({
    elem: '#test1'
    ,width: '100%' //设置容器宽度
    ,arrow: 'always' //始终显示箭头
    //,anim: 'updown' //切换动画方式
  });
});
</script>
</body>
</html>