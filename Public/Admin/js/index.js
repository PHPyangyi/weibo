$(function () {

	$('#nav').tree({
		url : ThinkPHP['MODULE'] + '/Index/getNav', 
		lines : true,
		onLoadSuccess : function (node, data) {
			var _this = this;
			if (data) {
				$(data).each(function () {
					if (this.state == 'closed') {
						$(_this).tree('expandAll');
					}
				})
			}
		},
		onClick : function (node) {
			if (node.url) {
				if ($('#tabs').tabs('exists', node.text)) {
					$('#tabs').tabs('select', node.text)
				} else {
					
					$('#tabs').tabs('add', {
						title : node.text,
						closable : true,
						iconCls : node.iconCls,
						href : ThinkPHP['MODULE'] + '/' + node.url,
					});
					
				}
			}
		},
	});
	
	$('#tabs').tabs({
		fit : true,
		border : false,
	});
	
});