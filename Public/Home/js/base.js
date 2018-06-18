$(function () {
	//消息和帐号的下拉菜单
	$('.app').hover(function () {
		$(this).css({
			background : '#fff', 
			color : '#333',
		}).find('.list').show();
	}, function () {
		$(this).css({
			background : 'none',
			color : '#fff',
		}).find('.list').hide();
	});
	
	//关闭提醒
	$('.refer span').click(function () {
		$(this).parent().remove();
	});
	
	//error
	$('#error').dialog({
		width : 190,
		height : 40,
		closeOnEscape : false,
		modal : false,
		resizable : false,
		draggable : false,
		autoOpen : false,
	}).parent().find('.ui-widget-header').hide();
	
	//loading
	$('#loading').dialog({
		width : 190,
		height : 40,
		closeOnEscape : false,
		modal : true,
		resizable : false,
		draggable : false,
		autoOpen : false,
	}).parent().find('.ui-widget-header').hide();
	
	//10秒轮询
	getRefer();
	function getRefer() {
		$.ajax({
			url : ThinkPHP['MODULE'] + '/Home/getRefer',
			type : 'POST',
			success : function(data, response, status){
				if (data > 0) {
					$('.refer').show().find('b').text(data);
					$('.list').find('span').text('(' + data + ')').css({
						color : 'red',
						fontWeight : 'bold'
					});
				} else {
					$('.refer').hide();
					$('.list').find('span').text('(' + data + ')').css({
						color : '#333',
						fontWeight : 'normal'
					});
				}
			}
		});
		setTimeout(function () {
			getRefer();
		}, 10000);
	}
	
	
	
	
	
	
	
	
});