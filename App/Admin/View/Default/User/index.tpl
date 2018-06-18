<table id="user"></table>

<div id="user_tool" style="padding:5px;">
	<div style="margin-bottom:5px;">
		<a href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-edit-new" onclick="user_tool.edit();">修改</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-delete-new" onclick="user_tool.remove();">删除</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-reload" onclick="user_tool.reload();">刷新</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-redo" onclick="user_tool.redo();">取消选定</a>
	</div>
	<div style="padding:0 0 0 7px;color:#333;">
		查询帐号：<input type="text" class="textbox" name="search_username" style="width:110px;">
		创建时间从：<input type="text" name="date_from" editable="false" class="easyui-datebox"  style="width:110px;">
		到：<input type="text" name="date_to" editable="false" class="easyui-datebox"  style="width:110px;">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" onclick="user_tool.search();">查询</a>
	</div>
</div>



<form id="user_edit" style="margin:0;padding:5px 0 0 25px;color:#333;">
	<input type="hidden" name="id">
	<input type="hidden" name="source_intro">
	<p>用户帐号：<input type="text" name="edit_username" disabled="true" class="textbox" style="width:200px;"></p>
	<p>用户密码：<input type="password" placeholder="密码留空则不修改" name="edit_password" class="textbox" style="width:200px;"></p>
	<p>电子邮件：<input type="text" name="edit_email" class="textbox" style="width:200px;"></p>
	<p>个性域名：<input type="text" name="edit_domain" class="textbox" style="width:200px;"></p>
	<p><span style="vertical-align:37px;">默认头像：</span><img src="__IMG__/small_face.jpg" alt="默认头像" style="cursor:pointer;" onclick="javascript:alert('和前台裁剪图片一样，可以使用点击弹出dialog再上传头像')"></p>
	<p><span style="vertical-align:27px;">个人简介：</span><textarea name="edit_intro" class="textbox" style="width:200px;height:70px;resize:none;font-size:13px;"></textarea></p>
</form>


<script type="text/javascript" src="__JS__/user.js"></script>