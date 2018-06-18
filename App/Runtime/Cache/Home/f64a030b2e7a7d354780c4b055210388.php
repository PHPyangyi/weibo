<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>微博系统--我的首页</title>
<script type="text/javascript" src="/weibo/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/weibo/Public/Home/js/jquery.ui.js"></script>
<script type="text/javascript" src="/weibo/Public/Home/js/base.js"></script>
<link rel="stylesheet" href="/weibo/Public/Home/css/jquery.ui.css">
<link rel="stylesheet" href="/weibo/Public/Home/css/base.css">

<script type="text/javascript" src="/weibo/Public/Home/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/weibo/Public/Home/js/jquery-migrate-1.2.1.js"></script>
<script type="text/javascript" src="/weibo/Public/Home/js/jquery.Jcrop.js"></script>
<script type="text/javascript" src="/weibo/Public/Home/js/setting.js"></script>
<link rel="stylesheet" href="/weibo/Public/Home/uploadify/uploadify.css">
<link rel="stylesheet" href="/weibo/Public/Home/css/jquery.Jcrop.css">
<link rel="stylesheet" href="/weibo/Public/Home/css/setting.css">

<script type="text/javascript">
var ThinkPHP = {
	'ROOT' : '/weibo',
	'MODULE' : '/weibo/Home',
	'IMG' : '/weibo/Public/<?php echo MODULE_NAME;?>/img',
	'FACE' : '/weibo/Public/<?php echo MODULE_NAME;?>/face',
	'UPLOADIFY' : '/weibo/Public/Home/uploadify',
	'IMAGEURL' : '<?php echo U("File/image");?>',
	'FACEURL' : '<?php echo U("File/face");?>',
	'BIGFACE' : '<?php echo session("user_auth")["face"]->big;?>',
	'INDEX' : '<?php echo U("Index/index");?>',
};
</script>
</head>
<body>


<div id="header">
	<div class="header_main">
		<div class="logo">微博系统</div>
		<div class="nav">
			<ul>
				<li><a href="<?php echo U('Index/index');?>" class="selected">首页</a></li>
				<li><a href="#">广场</a></li>
				<li><a href="#">图片</a></li>
				<li><a href="#">找人</a></li>
			</ul>
		</div>
		<div class="person">
			<ul>
				<li class="user">
					<a href="#"><?php echo session('user_auth')['username'];?></a>
					<!--
					<?php if(($referCount) > "0"): ?><div class="refer">
							<span>x</span>
							您有<?php echo ($referCount); ?>条@提及！
						</div><?php endif; ?>
					-->
					<div class="refer">
						<span>x</span>
						您有<b>0</b>条@提及！
					</div>
				</li>
				<li class="app">消息
					<dl class="list">
						<dd><a href="<?php echo U('Setting/refer');?>">@提到我
						<!--
						<?php if(($referCount) > "0"): ?><strong style="color:red;">(<?php echo ($referCount); ?>)</strong>
						<?php else: ?>
							<span>(<?php echo ($referCount); ?>)</span><?php endif; ?>
						-->
						<span>(0)</span>
						</a></dd>
						<dd><a href="#">收到的评论</a></dd>
						<dd><a href="#">发出的评论</a></dd>
						<dd><a href="#">我的私信</a></dd>
						<dd><a href="#">系统消息</a></dd>
						<dd><a href="#" class="line">发私信»</a></dd>
					</dl>
				</li>
				<li class="app">帐号
					<dl class="list">
						<dd><a href="<?php echo U('Setting/index');?>">个人设置</a></dd>
						<dd><a href="#">排行榜</a></dd>
						<dd><a href="<?php echo U('Setting/approve');?>">申请认证</a></dd>
						<dd><a href="<?php echo U('User/logout');?>" class="line">退出»</a></dd>
					</dl>
				</li>
			</ul>
		</div>
		<div class="search">
			<form method="post" action="#">
				<input type="text" id="search" placeholder="请输入微博关键字">
				<a href="javascript:void(0)"></a>
			</form>
		</div>
	</div>
</div>

<div id="main">
	
	<div class="main_left">
		<ul>
			<li><a href="<?php echo U('Setting/index');?>">个人设置</a></li>
			<li><a href="<?php echo U('Setting/avatar');?>" class="selected">头像设置</a></li>
			<li><a href="<?php echo U('Setting/domain');?>">个性域名</a></li>
			<li><a href="<?php echo U('Setting/refer');?>">@提及到我</a></li>
			<li><a href="<?php echo U('Setting/approve');?>">申请认证</a></li>
		</ul>
	</div>
	<div class="main_right">
		<h2>头像设置</h2>
		<p class="face_info">请上传一张头像图片，尺寸大小不低于200px*200px</p>
		<div class="face">
			<?php if(empty($bigFace)): ?><img id="face" src="/weibo/Public/Home/img/big.jpg">
			<?php else: ?>
			<img id="face" src="/weibo<?php echo ($bigFace); ?>"><?php endif; ?>
			<span id="preview_box" class="crop_preview"><img id="crop_preview" src="/weibo/Public/Home/img/big.jpg" /></span>
			<a href="javascript:void(0)" class="save" style="display:none;margin:10px 0 0 0;">保存</a>
			<a href="javascript:void(0)" class="cancel" style="display:none;margin:10px 0 0 0;">取消</a>
			<input type="hidden" id="x" name="x">
			<input type="hidden" id="y" name="y">
			<input type="hidden" id="w" name="w">
			<input type="hidden" id="h" name="h">
			<input type="hidden" id="url" name="url">
			<input type="file" name="file" id="file">
		</div>
	</div>

</div>

<div id="error">...</div>
<div id="loading">...</div>
<div id="footer">
	<div class="footer_left">&copy; 2014 Ycku.com All Rights Reserved.</div>
	<div class="footer_right">Powered By ThinkPHP.</div>
</div>



</body>
</html>