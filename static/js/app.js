jQuery(document).ready(function($){
	var _wid = $(window).width()
	$(window).resize(function(event) {
		_wid = $(window).width()
	});
	$('.toggle-btn.menu').on('click',function(){
		$('.site-nav').toggleClass('on');
	});
	$('.toggle-btn.search').on('click',function(){
		$('.header #search').toggleClass('on');
		$('#s').focus();
		if($('.site-nav').hasClass('on')) $('.site-nav').removeClass('on');
	});
	window.ViewImage && ViewImage.init('.entry img');
	$('.entry a').attr('target','_blank');
	//  点赞按钮点击
	$('#agree').on('click', function () {
		if($(this).prop('disabled') == true){
			alert('已赞！');
			return false;
		}
		$('#agree').get(0).disabled = true;  //  禁用点赞按钮
		//  发送 AJAX 请求
		$.ajax({
		//  请求方式 post
		type: 'post',
		//  url 获取点赞按钮的自定义 url 属性
		url: $('#agree').attr('data-url'),
		//  发送的数据 cid，直接获取点赞按钮的 cid 属性
		data: 'agree=' + $('#agree').attr('data-cid'),
		async: true,
		timeout: 30000,
		cache: false,
		//  请求成功的函数
		success: function (data) {
			var re = /\d/;  //  匹配数字的正则表达式
			//  匹配数字
			if (re.test(data)) {
			//  把点赞按钮中的点赞数量设置为传回的点赞数量
			$('#agree .agree-num').html('+'+data);
			}
		},
		error: function () {
			//  如果请求出错就恢复点赞按钮
			$('#agree').get(0).disabled = false;
		},
		});
	});
	$('#realavatar').on('click',function(){
		$('#cabg').show();
		$('#comment_form, .comment-loft-inner').removeClass('loft-inner');
		$('#commentauthorinfo').fadeIn(500);
	});
	$('#caok').on('click',function(){
		var myreg = /^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
		var u_author = $('#commentauthorinfo #author').val();
		var u_email = $('#commentauthorinfo #mail').val();
		if((u_author == '') || (u_email == '')){
			alert('请填写 用户名 和 Email 地址！');
			return false;
		}else if(!myreg.test(u_email)){
            alert("请输入正确邮箱地址");
			return false;
        }else{
			if(u_email){
				$.ajax({
					type:"post",
					url:ajax_url + "avatar.php",
					data: $('#commentauthorinfo #mail').serialize(),
					success:function(msg){
						$('#realavatar .avatar').fadeIn(500);
						$('#realavatar .avatar').attr('src',msg );
					}
				})
			}
			$('#commentauthorinfo').hide();
			$('#comment_form, .comment-loft-inner').addClass('loft-inner');
			$('#cabg').hide();
		}
	});
	$('#commentauthorinfo .close,#cabg').on('click',function(){
		$('#commentauthorinfo').hide();
		$('#comment_form, .comment-loft-inner').addClass('loft-inner');
		$('#cabg').hide();
	});
	$('#comment').focus(function(){
		$(this).addClass('active');
	});
	$('#comment').blur(function(){
		var _usrnick = $('#commentauthorinfo #author').val(), _usrmail = $('#commentauthorinfo #mail').val();
		var _val = $(this).val();
		if(_val!=''){
			if(_usrnick == '' || _usrmail == ''){
				$('#cabg').show();
				$('#comment_form, .comment-loft-inner').removeClass('loft-inner');
				$('#commentauthorinfo').fadeIn(500);
			}
		}else{
			$(this).removeClass('active');
		}
	});
	$('#comment').on('input propertychange',function(){
		$(this).addClass('active');
		var _val = $(this).val();
		if(_val =='') $(this).removeClass('active');
	});
	$(window).scroll(function() {
		var h = document.documentElement.scrollTop + document.body.scrollTop;
		if(h > 200) {
			$('.gotop').show();
		}else{
			$('.gotop').hide();
		}
		if(_wid > 720) {
			if(h > 100){
				$('.site-header').addClass('on');
			}else{
				$('.site-header').removeClass('on');
			}
		}
	});
	$('.social span').not('.weixin').on('click',function(){
		$link = $(this).attr('data-link');
		window.open($link);
	});
	$('.social .weixin').on('click',function(){
		$link = $(this).attr('data-link');
		$('body').append('<div class="wx-qrcode"><img src="'+ $link +'" alt="weixin"></div>');
	});

	$(document).on('click','.wx-qrcode',function(){
		$('.wx-qrcode').remove();
	});

	$('#top').on('click',function(){
		$('html,body').animate({
			scrollTop: 0
		}, 300)
	});
});
