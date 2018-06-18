<?php if (!defined('THINK_PATH')) exit();?><table id="approve"></table>

<div id="approve_tool" style="padding:5px;">
	<div style="margin-bottom:5px;">
		<a href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-add-new" onclick="approve_tool.edit();">通过</a>
	</div>
	<div style="padding:0 0 0 7px;color:#333;">
		查询审核：<input type="text" class="textbox" name="search_approve_name" style="width:110px;">
		创建时间从：<input type="text" name="date_from" editable="false" class="easyui-datebox"  style="width:110px;">
		到：<input type="text" name="date_to" editable="false" class="easyui-datebox"  style="width:110px;">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" onclick="alert('自行完成！');">查询</a>
	</div>
</div>


<script type="text/javascript" src="/weibo/PUBLIC/Admin/js/approve.js"></script>