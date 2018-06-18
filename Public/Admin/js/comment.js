$(function () {
	
	$('#comment').datagrid({
		url : ThinkPHP['MODULE'] + '/Comment/getList',
		fit : true,
		fitColumns : true,
		rownumbers : true,
		border : false,
		striped : true,
		toolbar : '#comment_tool',
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
			   field : 'content',
			   title : '评论内容',
			   width : 100,
		   },    
		   {
			   field : 'create',
			   title : '评论时间',
			   width : 100,
			   sortable : true,
		   }, 
		   {
			   field : 'ip',
			   title : '评论的IP',
			   width : 100,
		   }, 
		]],
	});
	
})