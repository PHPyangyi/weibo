//扩展个性域名验证功能
$.extend($.fn.validatebox.defaults.rules, {
	domain: {
		validator: function(value, param){
			return /^\w{4,10}$/.test(value);
		},
		message: '输入的个性域名不合法，必须是字母、数字和下划线且 4-10 位',
		}
});

$(function () {
	
	$('#user').datagrid({
		url : ThinkPHP['MODULE'] + '/User/getList',
		fit : true,
		fitColumns : true,
		rownumbers : true,
		border : false,
		striped : true,
		toolbar : '#user_tool',
		pagination : true,
		pageList : [10, 20, 30, 40, 50],
		pageNumber : 1,
		pageSize : 20,
		sortName : 'create',
		sortOrder : 'DESC',
		columns : [[
		   {
			   field : 'id',
			   title : '编号',
			   width : 100,
			   checkbox : true,
		   },         
		   {
			   field : 'username',
			   title : '用户名',
			   width : 100,
		   },  
		   {
			   field : 'email',
			   title : '电子邮件',
			   width : 100,
		   }, 
		   {
			   field : 'domain',
			   title : '个性域名',
			   width : 100,
		   }, 
		   {
			   field : 'create',
			   title : '注册时间',
			   width : 100,
			   sortable : true,
		   }, 
		   {
			   field : 'last_login',
			   title : '最后登录时间',
			   width : 100,
			   sortable : true,
		   },  
		   {
			   field : 'last_ip',
			   title : '最后登录IP',
			   width : 100,
		   }, 
		]],
	});
	
	// $('#user_add').dialog({
	// 	width : 350,
	// 	height : 420,
	// 	title : '新增用户',
	// 	iconCls : 'icon-user-add',
	// 	modal : true,
	// 	closed : true,
	// 	buttons : [
	// 	   {
	// 		   text : '提交',
	// 		   iconCls : 'icon-add-new',
	// 		   handler : function () {
	// 			   	if ($('#user_add').form('validate')) {
	// 					$.ajax({
	// 						url : ThinkPHP['MODULE'] + '/User/register',
	// 						type : 'POST',
	// 						data : {
	// 							username : $.trim($('input[name="username"]').val()),
	// 							password : $('input[name="password"]').val(),
	// 							email : $.trim($('input[name="email"]').val()),
	// 							domain : $.trim($('input[name="domain"]').val()),
	// 							intro : $.trim($('textarea[name="intro"]').val()),
	// 						},
	// 						beforeSend : function () {
	// 							$.messager.progress({
	// 								text : '正在尝试提交...',
	// 							});
	// 						},
	// 						success : function(data, response, status) {
	// 							$.messager.progress('close');
	// 							if (data > 0) {
	// 								$.messager.show({
	// 									title : '操作提醒',
	// 									msg : '新增用户成功！',
	// 								});
	// 								$('#user_add').dialog('close');
	// 								$('#user').datagrid('load');
	// 							} else if (data == -4) {
	// 								$.messager.alert('警告操作', '用户帐号被占用！', 'warning', function () {
	// 									$('input[name="username"]').select();
	// 								});
	// 							} else if (data == -5) {
	// 								$.messager.alert('警告操作', '电子邮件被占用！', 'warning', function () {
	// 									$('input[name="email"]').select();
	// 								});
	// 							} else if (data == -7) {
	// 								$.messager.alert('警告操作', '个性域名被占用！', 'warning', function () {
	// 									$('input[name="domain"]').select();
	// 								});
	// 							} else if (data == -1 || data == -2 || data == -3 || data == -6) {
	// 								$.messager.alert('警告操作', '因某种意外导致前台验证被绕过，请重新刷新提交！', 'warning');
	// 							} else {
	// 								$.messager.alert('警告操作', '未知错误！请重新刷新后提交！', 'warning');
	// 							}
	// 						},
	// 					});
	// 				}
	// 		   }
	// 	   },
	// 	   {
	// 		   text : '取消',
	// 		   iconCls : 'icon-redo',
	// 		   handler : function () {
	// 			   $('#user_add').dialog('close');
	// 		   }
	// 	   }
	// 	],
	// 	onClose : function () {
	// 		$('#user_add').form('reset');
	// 	},
	// });
	
	$('#user_edit').dialog({
		width : 350, 
		height : 420,
		title : '修改用户',
		iconCls : 'icon-user',
		modal : true,
		closed : true,
		buttons : [
		   {
			   text : '提交',
			   iconCls : 'icon-edit-new',
			   handler : function () {
				   	if ($('#user_edit').form('validate')) {
						$.ajax({
							url : ThinkPHP['MODULE'] + '/User/update',
							type : 'POST',
							data : {
								id : $.trim($('input[name="id"]').val()),
								password : $('input[name="edit_password"]').val(),
								email : $.trim($('input[name="edit_email"]').val()),
								domain : $.trim($('input[name="edit_domain"]').val()),
								intro : $.trim($('textarea[name="edit_intro"]').val()),
								source_intro : $.trim($('input[name="source_intro"]').val()),
							},
							beforeSend : function () {
								$.messager.progress({
									text : '正在尝试提交...',
								});
							},
							success : function(data, response, status) {
								$.messager.progress('close');
								if (data > 0) {
									$.messager.show({
										title : '操作提醒',
										msg : '修改用户成功！',
									});
									$('#user_edit').dialog('close');
									$('#user').datagrid('load');
								} else if (data == -5) {
									$.messager.alert('警告操作', '电子邮件被占用！', 'warning', function () {
										$('input[name="edit_email"]').select();
									});
								} else if (data == -7) {
									$.messager.alert('警告操作', '个性域名被占用！', 'warning', function () {
										$('input[name="edit_domain"]').select();
									});
								} else if (data == -1 || data == -2 || data == -3 || data == -6) {
									$.messager.alert('警告操作', '因某种意外导致前台验证被绕过，请重新刷新提交！', 'warning');
								} else if (data == 0) {
									$.messager.alert('警告操作', '尚未有任何修改或未知错误！', 'warning');
								}
							},
						});
					}
			   }
		   },
		   {
			   text : '取消',
			   iconCls : 'icon-redo',
			   handler : function () {
				   $('#user_edit').dialog('close');
			   }
		   }
		],
		onClose : function () {
			$('#user_edit').form('reset');
		},
	});
	
	$('input[name="username"]').validatebox({
		required : true,
		validType : 'length[2,20]',
		missingMessage : '请输入用户帐号',
		invalidMessage : '用户帐号必须在2-20位之间',
	});
	
	$('input[name="password"]').validatebox({
		required : true,
		validType : 'length[6,30]',
		missingMessage : '请输入用户密码',
		invalidMessage : '用户密码在6-30位之间',
	});
	
	$('input[name="edit_password"]').validatebox({
		validType : 'length[6,30]',
		missingMessage : '请输入用户密码',
		invalidMessage : '用户密码在6-30位之间',
	});
	
	$('input[name="email"], input[name="edit_email"]').validatebox({
		required : true,
		validType : 'email',
		missingMessage : '请输入电子邮件',
		invalidMessage : '电子邮件格式不正确',
	});
	
	$('input[name="domain"], input[name="edit_domain"]').validatebox({
		validType : 'domain',
	});
	
	user_tool = {
		search : function () {
			$('#user').datagrid('load', {
				username : $.trim($('input[name="search_username"]').val()),
				date_from : $('input[name="date_from"]').val(),
				date_to : $('input[name="date_to"]').val(),
			});
		},
		remove : function () {
			var rows = $('#user').datagrid('getSelections');
			if (rows.length > 0) {
				$.messager.confirm('确认操作', '您真的要删除所选的<strong>' + rows.length + '</strong>条记录吗？', function (flag) {
					if (flag) {
						var ids = [];
						for (var i = 0; i < rows.length; i ++) {
							ids.push(rows[i].id);
						}
						$.ajax({
							url : ThinkPHP['MODULE'] + '/User/remove',
							type : 'POST',
							data : {
								ids : ids.join(','),
							},
							beforeSend : function () {
								$('#user').datagrid('loading');
							},
							success : function(data, response, status) {
								if (data) {
									$('#user').datagrid('loaded');
									$('#user').datagrid('reload');
									$.messager.show({
										title : '操作提醒',
										msg : data + '个用户被成功删除！',
									});
								}
							},
						});
					}
				});

			} else {
				$.messager.alert('警告操作', '删除操作必须至少指定一个记录！', 'warning');
			}
		},
		add : function () {
			$('#user_add').dialog('open');
			$('input[name="username"]').focus();
		},
		edit : function () {
			var rows = $('#user').datagrid('getSelections');
			if (rows.length > 1) {
				$.messager.alert('警告操作', '编辑记录只能选定一条数据！', 'warning');
			} else if (rows.length == 1) {
				$('#user_edit').dialog('open');
				$.ajax({
					url : ThinkPHP['MODULE'] + '/User/getUser',
					type : 'POST',
					data : {
						id : rows[0].id,
					},
					beforeSend : function () {
						$.messager.progress({
							text : '正在获取信息...',
						});
					},
					success : function(data, response, status) {
						$.messager.progress('close');
						if (data) {
							$('#user_edit').form('load', {
								id : data.id,
								edit_username : data.username,
								edit_email : data.email,
								edit_domain : data.domain,
								edit_intro : data.extend ? data.extend.intro : '',
								source_intro : data.extend ? data.extend.intro : '',		
							});
						}
					},
				});
			} else if (rows.length == 0) {
				$.messager.alert('警告操作', '编辑记录必须选定一条数据！', 'warning');
			}
		},
		redo : function () {
			$('#user').datagrid('unselectAll');
		},
		reload : function () {
			$('#user').datagrid('reload');
		},
	};
	
})