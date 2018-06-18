$(function () {
	
	$('#approve').datagrid({
		url : ThinkPHP['MODULE'] + '/Approve/getList', 
		fit : true,
		fitColumns : true,
		striped : true,
		rownumbers : true,
		border : false,
		pagination : true,
		pageSize : 20,
		pageList : [10, 20, 30, 40, 50],
		pageNumber : 1,
		sortName : 'create',
		sortOrder : 'desc',
		toolbar : '#approve_tool',
		columns : [[
			{
				field : 'id',
				title : '编号',
				width : 100,
				checkbox : true,
			},
			{
				field : 'name',
				title : '认证名称',
				width : 50,
			},
			{
				field : 'info',
				title : '认证资料',
				width : 100,
			},
			{
				field : 'state',
				title : '认证状态',
				width : 30,
				formatter : function (value) {
					return value == 0 ? '未认证' : '已认证';
				}
			},
			{
				field : 'create',
				title : '申请时间',
				width : 100,
			},
		]],
	});

	approve_tool = {
		edit : function () {
			var rows = $('#approve').datagrid('getSelections');
			if (rows.length > 1) {
				$.messager.alert('警告操作', '编辑记录只能选定一条数据！','warning');
			} else if (rows.length == 1) {
				//$('#user_edit').dialog('open');
				$.ajax({
					type : 'POST',
					url : ThinkPHP['MODULE'] + '/Approve/update',
					data : {
						id : rows[0].id,
					},
					beforeSend : function () {
						$.messager.progress({
							text : '正在尝试获取数据...',
						});
					},
					success : function (data) {
						$.messager.progress('close');
						if (data == 0) {
							$.messager.alert('警告操作', '此用户已被认证！','warning');
						} else if (data == 1) {
							$('#approve').datagrid('reload');
							$.messager.show({
								title : '提示',
								msg : data + '个用户被认证成功！',
							});
						} else {
							$.messager.alert('警告操作', '未知错误！请重试！','warning');
						}
					},
				});
			} else if (rows.length == 0) {
				$.messager.alert('警告操作', '编辑记录至少选定一条数据！','warning');
			}
		},
	};
})