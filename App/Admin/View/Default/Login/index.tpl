<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>微博系统--后台登录</title>
<link rel="stylesheet" type="text/css" href="__EASYUI__/themes/bootstrap/easyui.css" />
<link rel="stylesheet" type="text/css" href="__EASYUI__/themes/icon.css" />
</head>
<style type="text/css">
#login {
	padding:6px 0 0 0;
}
#login p {
	height:22px;
	line-height:22px;
	padding:4px 0 0 25px;
}
.textbox {
	height:22px;
	padding:0 2px;
	position:relative;
	top:-1px;
}
.easyui-linkbutton {
	padding:0 10px;
}
#btn {
	text-align:center;
}
</style>
<script type="text/javascript">
var ThinkPHP = {
	'ROOT' : '__ROOT__',
	'MODULE' : '__MODULE__',
	'INDEX' : '{:U("Index/index")}',
};
</script>
<body>

<div id="login">
	<p>管理员帐号：<input type="text" id="manager" class="textbox"></p>
	<p>管理员密码：<input type="password" id="password" class="textbox"></p>
</div>

<div id="btn">
	<a href="javascript:void(0)" class="easyui-linkbutton">登录</a>
</div>

</body>
<script type="text/javascript" src="__EASYUI__/jquery.min.js"></script>
<script type="text/javascript" src="__EASYUI__/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__EASYUI__/locale/easyui-lang-zh_CN.js" ></script>
<script type="text/javascript" src="__JS__/login.js"></script>
</html>