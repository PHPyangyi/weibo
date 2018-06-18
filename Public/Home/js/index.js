$(function () {
	//DOM和图片都加载完毕后执行
	$(window).load(function () {
		allHeight();
		centerimg();
	});

	
	//微博高度保持一致
	function allHeight() {
		if ($('.main_left').height() > 800) {
			$('.main_right').height($('.main_left').height() + 30);
			$('#main').height($('.main_left').height() + 30);
		}
	}
	
	//显示多图配图的居中方案
	function centerimg(){
		for (var i = 0; i < $('.imgs img').length; i++) {
			if ($('.imgs img').eq(i).width() > 120) {
				$('.imgs img').eq(i).css('left', -($('.imgs img').eq(i).width() - 120) / 2);
			}
			else {
				$('.imgs img').eq(i).width(120);
			}
			if ($('.imgs img').eq(i).height() > 120) {
				$('.imgs img').eq(i).css('top', -($('.imgs img').eq(i).height() - 120) / 2);
			}
			else {
				$('.imgs img').eq(i).height(120);
			}
		}
	}
	
	//微博发布的按钮
	$('.weibo_button').button().click(function (e) {
		var img = [];
		var images = $('input[name="images"]'); 
		var len = images.length;
		for (var i = 0; i < len; i ++) {
			img[i] = images.eq(i).val();
		}
		
		//如果没有上传图片，并且文本框也没有内容
		if (img.length == 0 && $('.weibo_text').val().length == 0) {
			$('#error').html('请输入微博内容...').dialog('open');
			setTimeout(function () {
				$('#error').html('...').dialog('close');
				$('.weibo_text').focus();
			}, 1000);
		} else if (img.length > 0 && $('.weibo_text').val().length == 0) {
			$('.weibo_text').val('分享图片');
			weibo_ajax_send(img);
		} else {
			if (weibo_num()) {
				weibo_ajax_send(img);
			}
		}
	});
	
	//ajax提交微博
	function weibo_ajax_send(img) {
		$.ajax({
			url : ThinkPHP['MODULE'] + '/Topic/publish',
			type : 'POST',
			data : {
				content : $('.weibo_text').val(),
				img : img,
			},
			beforeSend : function () {
				$('#loading').html('微博发布中...').dialog('open');
			},
			success : function (data, response, status) {
				if (data) {
					$('#loading').css('background', 'url(' + ThinkPHP['IMG'] + '/success.gif) no-repeat 20px 65%').html('微博发布成功...');
					$('.weibo_pic_content,input[name="images"]').remove();
					$('#pic_box').hide();
					$('.pic_arrow_top').hide();
					$('.weibo_pic_total').text(0);
					$('.weibo_pic_limit').text(8);
					window.uploadCount.clear();
					
					var html = '';
					
					switch (img.length) {
						case 0 :
							html = $('#ajax_html1').html();
							break;
						case 1 : 
							html = $('#ajax_html2').html();
							img = $.parseJSON(img);
							break;
						default : 
							for (var i = img.length - 1; i >= 0 ; i --) {
								img_arr = $.parseJSON(img[i]);
								$('#ajax_html3').find('p').after('<div class="imgs"><img src="' + ThinkPHP['ROOT'] + '/' + img_arr['thumb'] + '" unfold-src="' + ThinkPHP['ROOT'] + '/' + img_arr['unfold'] + '" source-src="' + ThinkPHP['ROOT'] + '/' + img_arr['source'] + '"></div>');
							}
							html = $('#ajax_html3').html();
					}
					
					if (html.indexOf('#内容#')) {
						html = html.replace(/#内容#/g, $('.weibo_text').val());
					}
					if (html.indexOf('#缩略图#')) {
						html = html.replace(/#缩略图#/g, ThinkPHP['ROOT'] + '/' +img['thumb']);
					}
					if (html.indexOf('#放大图#')) {
						html = html.replace(/#放大图#/g, ThinkPHP['ROOT'] + '/' +img['unfold']);
					}
					if (html.indexOf('#原图#')) {
						html = html.replace(/#原图#/g, ThinkPHP['ROOT'] + '/' +img['source']);
					}		
					
					//表情解析
					html = html.replace(/\[(a|b|c|d)_([0-9]+)\]/g, '<img src="' + ThinkPHP['FACE'] + '/$1/$2.gif" border="0">');
					
					setTimeout(function(){
						$('.weibo_text').val('');
						$('#loading').css('background', 'url(' + ThinkPHP['IMG'] + '/loading.gif) no-repeat 20px 65%').html('...').dialog('close');
						$('.weibo_content ul').after(html);
						for (var i = 0; i < $('.imgs img').length; i++) {
							if ($('.imgs img').eq(i).width() > 120) {
								$('.imgs img').eq(i).css('left', -($('.imgs img').eq(i).width() - 120) / 2);
							} else {
								$('.imgs img').eq(i).width(120);
							}
							if ($('.imgs img').eq(i).height() > 120) {
								$('.imgs img').eq(i).css('top', -($('.imgs img').eq(i).height() - 120) / 2);
							} else {
								$('.imgs img').eq(i).height(120);
							}
						}
						allHeight();
					}, 500);
				}
			},
		}); 
	}
	
	
	//微博输入内容计算字个数
	$('.weibo_text').on('keyup', weibo_num); 
	//微博输入内容得到交单计算字个数
	$('.weibo_text').on('focus', function () {
		setTimeout(function () {
			weibo_num();
		}, 50);
	});
	
	//140字检测
	function weibo_num() {
		var total = 280;
		var len = $('.weibo_text').val().length;
		var temp = 0;
		if (len > 0) {
			for (var i = 0; i < len; i++) {
				if ($('.weibo_text').val().charCodeAt(i) > 255) {
					temp += 2;
				} else {
					temp ++;
				}
			}
			var result = parseInt((total - temp)/2 - 0.5);
			if (result >= 0) {
				$('.weibo_num').html('您还可以输入<strong>' + result + '</strong>个字');
				return true;
			} else {
				$('.weibo_num').html('已经超过了<strong class="red">' + result + '</strong>个字');
				return false;
			}
		}
	}
	
	//单图点击放大
	$('.weibo_content').on('click', '.img img', function () {
		$(this).parent().hide();
		var img_zoom = $(this).parent().next('.img_zoom');
		var img = img_zoom.find('img');
		img_zoom.show();
		img.attr('src', img.attr('data'));
		allHeight();
	});
	
	//单图点击缩小
	$('.weibo_content').on('click', '.img_zoom img', function () {
		$(this).parent().hide();
		$(this).parent().prev('.img').show();
		allHeight();
	});
	$('.weibo_content').on('click', '.img_zoom .in a', function () {
		$(this).parent().parent().parent().hide(); 
		$(this).parent().parent().parent().prev('.img').show();
		allHeight();
	});
	
	//多图点击方法
	$('.weibo_content').on('click', '.imgs img', function () {
		var _this = this;
		imgLoadEvent(function (obj) {
			$('#imgs').dialog('open').dialog('option', 'height', obj['h'] + 90);
			$('#imgs img').attr('src', $(_this).attr('unfold-src'));
			$('#imgs .source a').click(function () {
				$(this).attr('href', $(_this).attr('source-src'));
			});
			var top = $('#imgs').dialog('widget').position().top;
			var left = $('#imgs').dialog('widget').position().left;
			$('.imgs_close').css({
				top : top - 18,
				left : left + 588,
				zIndex : 10001,
				display : 'block',
			}).click(function () {
				$('#imgs').dialog('close');
				$(this).hide();
			});
			$('#imgs img').click(function () {
				$('#imgs').dialog('close');
				$('.imgs_close').hide();
			});
		}, $(_this).attr('unfold-src'));
	});
	
	//多张图片展示的dialog
	$('#imgs').dialog({
		width : 600,
		closeOnEscape : false,
		modal : true,
		resizable : false,
		draggable : false,
		autoOpen : false,
	}).parent().find('.ui-widget-header').hide();
	
	$('#imgs').dialog('widget').css({
		background : '#fafafa',
		border : '1px solid #ccc',
		position : 'fixed',
		zIndex : 10000,
	});
	

	
	
	
	//通过URL得到图片的长和高
	function imgLoadEvent(callback, url) {//圖片事件加載
		var img = new Image();
		img.onreadystatechange = function () {
			if (this.readyState == "complete") {
				callback({ "w": img.width, "h": img.height });
			}
		}
		img.onload = function () {
		if (this.complete == true)
			callback({ "w": img.width, "h": img.height });
		}
		img.onerror = function () {
			callback({ "w": 0, "h": 0 });
		}
		img.src = url;
	}
	
	
	//得到总页码
	$.ajax({
		url : ThinkPHP['MODULE'] + '/Topic/ajaxCount',
		type : 'POST',
		data : {
			
		},
		success: function(data, response, status){
			window.count = parseInt(data);
		}
	});
	
	
	//滚动条拖动
	window.scrollFlag = true;
	window.first = 10;
	window.page = 1;
	$(window).scroll(function () {
		if (window.page < window.count) {
			if (window.scrollFlag) {
				if ($(document).scrollTop() >= ($('#loadmore').offset().top + $('#loadmore').outerHeight() - $(window).height() - 20)) {
					setTimeout(function(){
						$.ajax({
							url: ThinkPHP['MODULE'] + '/Topic/ajaxlist',
							type: 'POST',
							data: {
								first: window.first,
							},
							success: function(data, response, status){
								$('#loadmore').before(data);
								allHeight();
								setUrl();
							}
						});
						window.scrollFlag = true;
						window.first += 10;
						window.page += 1;
					}, 500);
					window.scrollFlag = false;
				}
			}
		} else {
			$('#loadmore').html('没有更多数据');
		}
	});
	
	
	//设置@帐号的URL
	setUrl();
	function setUrl() {
		for (var i = 0; i < $('.space').length; i ++) {
			var username = $('.space').eq(i).text().substr(1);
			
			if ($('.space').eq(i).attr('flag') != 'true') {
				$.ajax({
					url: ThinkPHP['MODULE'] + '/Space/setUrl',
					type: 'POST',
					async: false,
					data: {
						username: username,
					},
					success: function(data, response, status){
						if (data) {
							$('.space').eq(i).attr('href', data);
							$('.space').eq(i).attr('flag', 'true');
						} else {
							$('.space').eq(i).after('@' + username);
							$('.space').eq(i).hide();
						}
					}
				});
			}
		}
	}

	//切换转播
	$('.re').click(function () {
		if ($(this).parent().parent().find('.re_box').is(':hidden')) {
			$(this).parent().parent().find('.com_box').hide();
			$(this).parent().parent().find('.re_box').show();
			$(this).parent().parent().find('.re_text').focus();
		} else {
			$(this).parent().parent().find('.re_box').hide();
		}
	});
	
	//切换评论
	$('.comment').click(function () {
		if ($(this).parent().parent().find('.com_box').is(':hidden')) {
			$(this).parent().parent().find('.re_box').hide();
			$(this).parent().parent().find('.com_box').show();
			$(this).parent().parent().find('.com_text').focus();
			var comment = $(this).parent().parent().find('.comment_content');
			var tid = $(this).parent().parent().find('input[name="tid"]').val();
			$.ajax({
				url : ThinkPHP['MODULE'] + '/Comment/getList',
				type : 'POST',
				data : {
					tid : tid,
					page : 1,
				},
				beforeSend : function () {
					//加载中。。。
					comment.append('<p style="text-align:center;">评论加载中<img src="' + ThinkPHP['IMG'] + '/loadmore.gif" alt=""></p>');
				},
				success : function(data, response, status){
					if (data) {
						//删除子节点所有评论
						comment.find('*').remove();
						//添加评论内容
						comment.append(data);
						//@帐号
						setUrl();
						//高度
						allHeight();
					}
				}
			});
		} else {
			$(this).parent().parent().find('.com_box').hide();
		}
	});
	
	//分页点击
	$('.re_com_box').on('click', '.page_comment', function () {
		var page = $(this).attr('page');
		var comment = $(this).parent().parent().parent().find('.comment_content');
		var tid = $(this).parent().parent().parent().find('input[name="tid"]').val();
		//删除子节点所有评论
		comment.find('*').remove();
		$.ajax({
			url : ThinkPHP['MODULE'] + '/Comment/getList',
			type : 'POST',
			data : {
				tid : tid,
				page : page,
			},
			beforeSend : function () {
				//加载中。。。
				comment.append('<p style="text-align:center;">评论加载中<img src="' + ThinkPHP['IMG'] + '/loadmore.gif" alt=""></p>');
			},
			success : function(data, response, status){
				if (data) {
					//删除子节点所有评论
					comment.find('*').remove();
					//添加评论内容
					comment.append(data);
					//@帐号
					setUrl();
					//高度
					allHeight();
				}
			}
		});
	})

	//转播按钮
	$('.re_button').button().click(function () {
		var reid = $(this).parent().find('input[name="reid"]').val();
		var content = $(this).parent().find('textarea[name="commend"]').val();
		var commend = $(this).parent().find('textarea[name="commend"]');
		$.ajax({
			url : ThinkPHP['MODULE'] + '/Topic/reBoardCast',
			type : 'POST',
			data : {
				reid : reid,
				content : content,
			},
			beforeSend : function () {
				$('#loading').html('微博转发中...').dialog('open');
			},
			success : function(data, response, status){
				if (data) {
					$('#loading').css('background', 'url(' + ThinkPHP['IMG'] + '/success.gif) no-repeat 20px 65%').html('微博转发成功...');
					setTimeout(function(){
						$('#loading').css('background', 'url(' + ThinkPHP['IMG'] + '/loading.gif) no-repeat 20px 65%').html('...').dialog('close');
						commend.val('');
						location.reload(true);
					},500);
				}
			}
		});
	});
	
	//评论按钮
	$('.com_button').button().click(function () {
		var tid = $(this).parent().find('input[name="tid"]').val();
		var content = $(this).parent().find('textarea[name="commend"]').val();
		var commend = $(this).parent().find('textarea[name="commend"]');
		$.ajax({
			url : ThinkPHP['MODULE'] + '/Comment/publish',
			type : 'POST',
			data : {
				tid : tid,
				content : content,
			},
			beforeSend : function () {
				$('#loading').html('评论发表中...').dialog('open');
			},
			success : function(data, response, status){
				if (data) {
					$('#loading').css('background', 'url(' + ThinkPHP['IMG'] + '/success.gif) no-repeat 20px 65%').html('评论发布成功...');
					setTimeout(function(){
						$('#loading').css('background', 'url(' + ThinkPHP['IMG'] + '/loading.gif) no-repeat 20px 65%').html('...').dialog('close');
						commend.val('');
					},500);
				}
			}
		});
	});
	
	//10秒轮询
	getWeibo();
	function getWeibo() {
		$.ajax({
			url : ThinkPHP['MODULE'] + '/Index/getWeibo',
			type : 'POST',
			success : function(data, response, status){
				if (data.length > 0) {
					$('.msg').show().text('约 ' + data.length + ' 条新广播，点击查看');
				} else {
					$('.msg').hide().text('');
				}
			}
		});
		setTimeout(function () {
			getWeibo();
		}, 10000);
	}
	
	$('.msg').click(function () {
		location.reload();
	});
	
	$.scrollUp({
		scrollName: 'scrollUp', // Element ID
		topDistance: '300', // Distance from top before showing element (px)
		topSpeed: 300, // Speed back to top (ms)
		animation: 'fade', // Fade, slide, none
		animationInSpeed: 200, // Animation in speed (ms)
		animationOutSpeed: 200, // Animation out speed (ms)
		scrollText: '', // Text for element
		activeOverlay: false, // Set CSS color to display scrollUp active
	});
	
	
});
