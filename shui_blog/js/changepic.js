window.onload = function(){
	var arr = [
	['汽车资讯',['newA4L','newhighland','newCamry','tesla modelx'],['img/newA4L.jpg','img/newhighland.jpg','img/newCamry.jpg','img/tesla model x.jpg']],
	
	['唯美意境',['pro fir','pro sed'],['img/yjpic.jpg','img/yjpic2.jpg']],
	
	['天体美片',['aster fir','aster sed','aster thr','aster fou'],['img/tiantipic.jpg','img/tiantipic2.jpg','img/tiantipic3.jpg','img/tiantipic4.jpg']],
	
	['影视前沿',['Warcraft','X-man oracle'],['img/moviepost.jpg','img/moviepost2.jpg']]
	];
	
	var oBox = document.getElementById('box');
	var lTab = oBox.getElementsByTagName('ul')[0].getElementsByTagName('li');
	var aPic = oBox.getElementsByTagName('div');
//	设定num控制图片自动轮播
	var num = 0;
//	设定num2控制贴士自动轮播
	var num2 = 0;
//	设定空time用来存储
	time = null;
//	初始化显示
	lTab[0].className = 'active';
	aPic[0].style.display = 'block';
//	给数组添加循环函数传参
	for(var i = 0; i < arr.length; i++){
		cs(i);
	}
//	封装函数
	function cs(n){
		var oImg = aPic[n].getElementsByTagName('img')[0];
		var aLi = aPic[n].getElementsByTagName('li');
//		初始化贴士
		aLi[0].className = 'active';
//		给左侧点击切换添加点击事件
		lTab[n].onclick = function(){
//			清空全部	
			for(var i = 0; i < lTab.length; i++){
				lTab[i].className = '';
				aPic[i].style.display = '';
			}
			for(var i = 0; i < aLi.length; i++){
				aLi[i].className = '';
			}
//			当前点击的颜色发生变化，对应的pic显示
			aLi[0].className = 'active';
			oImg.src = arr[n][2][0];
			this.className = 'active';
			aPic[n].style.display = 'block';
//			自动轮播时,点击修改对应变量,才能继续轮播
			num = n;
			num2 = 0;
		}
//		点击贴士切换
		for(var i = 0; i < aLi.length; i++){
//			添加索引值,li与对应图片
			aLi[i].index = i;
			aLi[i].onclick = function(){
				for(var i = 0; i < aLi.length; i++){
					aLi[i].className = '';
				}
				this.className = 'active';
				oImg.src = arr[n][2][this.index];
				num2 = this.index;
			}
		}
	}
//	设定定时器自动轮播,num2++,控制li,图片切换,走完再num++,控制左边li,div显示
	time = setInterval(auto,2000);
//	封装自动轮播的函数
	function auto(){
//		循环num
		if(num == lTab.length){
			num = 0;
		}
		for(var i = 0;i < lTab.length;i++){
			lTab[i].className = '';
			aPic[i].style.display = '';
		}
		lTab[num].className = 'active';
		aPic[num].style.display = 'block';
		var oImg = aPic[num].getElementsByTagName('img')[0];
		var aLi = aPic[num].getElementsByTagName('li');
		for(var i = 0; i < aLi.length; i++){
			aLi[i].className = '';
		}
		aLi[num2].className = 'active';
		oImg.src = arr[num][2][num2];
		num2++;
		if(num2 == aLi.length){
			num2 = 0;
			num++;
		}
	}
//	鼠标移入关闭定时器
	oBox.onmouseover = function(){
		clearInterval(time);
	}
//	鼠标移出重启定时器
	oBox.onmouseout = function(){
		time = setInterval(auto,2000);
	}
}
