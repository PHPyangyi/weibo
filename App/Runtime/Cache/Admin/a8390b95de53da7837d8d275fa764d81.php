<?php if (!defined('THINK_PATH')) exit();?><table id="comment"></table>

<div id="comment_tool" style="padding:5px;">
	<div style="margin-bottom:5px;">
		<a href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-add-new" onclick="alert('自行完成！');">新增</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-edit-new" onclick="alert('自行完成！');">修改</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-delete-new" onclick="alert('自行完成！');">删除</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-reload" onclick="alert('自行完成！');">刷新</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-redo" onclick="alert('自行完成！');">取消选定</a>
	</div>
	<div style="padding:0 0 0 7px;color:#333;">
		查询评论：<input type="text" class="textbox" name="search_comment_name" style="width:110px;">
		创建时间从：<input type="text" name="date_from" editable="false" class="easyui-datebox"  style="width:110px;">
		到：<input type="text" name="date_to" editable="false" class="easyui-datebox"  style="width:110px;">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" onclick="alert('自行完成！');">查询</a>
	</div>
</div>


<script type="text/javascript" src="/weibo/PUBLIC/Admin/js/comment.js"></script>