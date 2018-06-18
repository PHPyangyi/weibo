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

<script type="text/javascript" src="/weibo/Public/Home/js/rl_exp.js"></script>
<script type="text/javascript" src="/weibo/Public/Home/js/lee_pic.js"></script>
<script type="text/javascript" src="/weibo/Public/Home/js/jquery.scrollUp.js"></script>
<script type="text/javascript" src="/weibo/Public/Home/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/weibo/Public/Home/js/index.js"></script>
<link rel="stylesheet" href="/weibo/Public/Home/css/rl_exp.css">
<link rel="stylesheet" href="/weibo/Public/Home/uploadify/uploadify.css">
<link rel="stylesheet" href="/weibo/Public/Home/css/index.css">

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
		<div class="weibo_form">
			<span class="left">和大家分享一点新鲜事吧？</span>
			<span class="right weibo_num">可以输入<strong>140</strong>个字</span>
			<textarea class="weibo_text" id="rl_exp_input"></textarea>
			<a href="javascript:void(0);" class="weibo_face" id="rl_exp_btn">表情<span class="face_arrow_top"></span></a>
			<div class="rl_exp" id="rl_bq" style="display:none;">
				<ul class="rl_exp_tab clearfix">
					<li><a href="javascript:void(0);" class="selected">默认</a></li>
					<li><a href="javascript:void(0);">拜年</a></li>
					<li><a href="javascript:void(0);">浪小花</a></li>
					<li><a href="javascript:void(0);">暴走漫画</a></li>
				</ul>
				<ul class="rl_exp_main clearfix rl_selected"></ul>
				<ul class="rl_exp_main clearfix" style="display:none;"></ul>
				<ul class="rl_exp_main clearfix" style="display:none;"></ul>
				<ul class="rl_exp_main clearfix" style="display:none;"></ul>
				<a href="javascript:void(0);" class="close">×</a>
			</div>
			<a href="javascript:void(0);" class="weibo_pic" id="pic_btn">图片<span class="pic_arrow_top"></span></a>
			<div class="weibo_pic_box" id="pic_box" style="display:none;">
				<div class="weibo_pic_header">
					<span class="weibo_pic_info">共 <span class="weibo_pic_total">0</span> 张，还能上传 <span class="weibo_pic_limit">8</span> 张（按住ctrl可选择多张）</span>
					<a href="javascript:void(0);" class="close">×</a>
				</div>
				<div class="weibo_pic_list"></div>
				<input type="file" name="file" id="file">
			</div>
			<input class="weibo_button" type="button" value="发布">
		</div>	
		<div class="weibo_content">
			<ul>
				<li><a href="javascript:void(0)" class="selected">我关注的<i class="nav_arrow"></i></a></li>
				<li><a href="javascript:void(0)">互听的</a></li>
			</ul>
			
			<div class="msg"></div>	
			
			<!--这里动态插入一个DOM节点-->
			
			<?php if(is_array($topicList)): $i = 0; $__LIST__ = $topicList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i; if(empty($obj["reid"])): ?><dl class="weibo_content_data">
				<dt><a href="javascript:void(0)">
				<?php if(empty($obj["face"])): if(empty($obj["domain"])): ?><a href="<?php echo U('Space/index', array('id'=>$obj['uid']));?>"><img src="/weibo/Public/Home/img/small_face.jpg" border="0" alt=""></a>
					<?php else: ?>
						<a href="/weibo/i/<?php echo ($obj["domain"]); ?>"><img src="/weibo/Public/Home/img/small_face.jpg" border="0" alt=""></a><?php endif; ?>
				<?php else: ?>
					<?php if(empty($obj["domain"])): ?><a href="<?php echo U('Space/index', array('id'=>$obj['uid']));?>"><img src="/weibo/<?php echo ($obj["face"]); ?>" border="0" alt=""></a>
					<?php else: ?>
						<a href="/weibo/i/<?php echo ($obj["domain"]); ?>"><img src="/weibo/<?php echo ($obj["face"]); ?>" border="0" alt=""></a><?php endif; endif; ?>
				</a></dt>
				<dd>
					<h4>
						<?php if(empty($obj["domain"])): ?><a href="<?php echo U('Space/index', array('id'=>$obj['uid']));?>"><?php echo ($obj["username"]); ?></a>
						<?php else: ?>
							<a href="/weibo/i/<?php echo ($obj["domain"]); ?>"><?php echo ($obj["username"]); ?></a><?php endif; ?>
					</h4>
					<p><?php echo ($obj["content"]); ?></p>
					<?php switch($obj["count"]): case "0": break;?>
						<?php case "1": ?><div class="img" style="display:block;"><img src="/weibo/<?php echo ($obj['images'][0]['thumb']); ?>" alt=""></div>
							<div class="img_zoom" style="display:none">
								<ol>
									<li class="in"><a href="javascript:void(0)">收起</a></li>
									<li class="source"><a href="/weibo/<?php echo ($obj['images'][0]['source']); ?>" target="_blank">查看原图</a></li>
								</ol>
								<img data="/weibo/<?php echo ($obj['images'][0]['unfold']); ?>" src="/weibo/Public/Home/img/loading_100.png" alt="">
							</div><?php break;?>
						<?php default: ?>
							<?php $__FOR_START_11446__=0;$__FOR_END_11446__=$obj['count'];for($i=$__FOR_START_11446__;$i < $__FOR_END_11446__;$i+=1){ ?><div class="imgs"><img src="/weibo/<?php echo ($obj['images'][$i]['thumb']); ?>" unfold-src="/weibo/<?php echo ($obj['images'][$i]['unfold']); ?>" source-src="/weibo/<?php echo ($obj['images'][$i]['source']); ?>" alt=""></div><?php } endswitch;?>
					<div class="footer">
						<span class="time"><?php echo ($obj["time"]); ?></span>
						<span class="handler">赞(0) | <a href="javascript:void(0)" class="re">转播(<?php echo ($obj["recount"]); ?>)</a> | <a href="javascript:void(0)" class="comment">评论</a> | 收藏</span>
						<div class="re_box re_com_box" style="display:none;">
							<p>表情、字数限制自行完成</p>
							<textarea class="re_text re_com_text" name="commend"></textarea>
							<input type="hidden" name="reid" value="<?php echo ($obj["id"]); ?>" />
							<input class="re_button" type="button" value="转播">
						</div>
						<div class="com_box re_com_box" style="display:none;">
							<p>表情、字数限制自行完成</p>
							<textarea class="com_text re_com_text" name="commend"></textarea>
							<input type="hidden" name="tid" value="<?php echo ($obj["id"]); ?>" />
							<input class="com_button" type="button" value="评论">
							<div class="comment_content">
								
							</div>
						</div>	
					</div>
				</dd>
			</dl>
			<?php else: ?>
			<dl class="weibo_content_data">
				<dt><a href="javascript:void(0)">
				<?php if(empty($obj["face"])): if(empty($obj["domain"])): ?><a href="<?php echo U('Space/index', array('id'=>$obj['uid']));?>"><img src="/weibo/Public/Home/img/small_face.jpg" border="0" alt=""></a>
					<?php else: ?>
						<a href="/weibo/i/<?php echo ($obj["domain"]); ?>"><img src="/weibo/Public/Home/img/small_face.jpg" border="0" alt=""></a><?php endif; ?>
				<?php else: ?>
					<?php if(empty($obj["domain"])): ?><a href="<?php echo U('Space/index', array('id'=>$obj['uid']));?>"><img src="/weibo/<?php echo ($obj["face"]); ?>" border="0" alt=""></a>
					<?php else: ?>
						<a href="/weibo/i/<?php echo ($obj["domain"]); ?>"><img src="/weibo/<?php echo ($obj["face"]); ?>" border="0" alt=""></a><?php endif; endif; ?>
				</a></dt>
				<dd>
					<h4>
						<?php if(empty($obj["domain"])): ?><a href="<?php echo U('Space/index', array('id'=>$obj['uid']));?>"><?php echo ($obj["username"]); ?></a>
						<?php else: ?>
							<a href="/weibo/i/<?php echo ($obj["domain"]); ?>"><?php echo ($obj["username"]); ?></a><?php endif; ?>
					</h4>
					<p><?php echo ($obj["content"]); ?></p>
					<div class="re_content" style="overflow:auto;">
						<h5>
							<?php if(empty($obj["recontent"]["domain"])): ?><a href="<?php echo U('Space/index', array('id'=>$obj['recontent']['uid']));?>">@<?php echo ($obj["recontent"]["username"]); ?></a>
							<?php else: ?>
								<a href="/weibo/i/<?php echo ($obj["recontent"]["domain"]); ?>">@<?php echo ($obj["recontent"]["username"]); ?></a><?php endif; ?>
						</h5>
						<p><?php echo ($obj["recontent"]["content"]); ?></p>
						<?php switch($obj["recontent"]["count"]): case "0": break;?>
							<?php case "1": ?><div class="img" style="display:block;"><img src="/weibo/<?php echo ($obj['recontent']['images'][0]['thumb']); ?>" alt=""></div>
								<div class="img_zoom" style="display:none">
									<ol>
										<li class="in"><a href="javascript:void(0)">收起</a></li>
										<li class="source"><a href="/weibo/<?php echo ($obj['recontent']['images'][0]['source']); ?>" target="_blank">查看原图</a></li>
									</ol>
									<img data="/weibo/<?php echo ($obj['recontent']['images'][0]['unfold']); ?>" src="/weibo/Public/Home/img/loading_100.png" alt="">
								</div><?php break;?>
							<?php default: ?>
								<?php $__FOR_START_11703__=0;$__FOR_END_11703__=$obj['recontent']['count'];for($i=$__FOR_START_11703__;$i < $__FOR_END_11703__;$i+=1){ ?><div class="imgs"><img src="/weibo/<?php echo ($obj['recontent']['images'][$i]['thumb']); ?>" unfold-src="/weibo/<?php echo ($obj['recontent']['images'][$i]['unfold']); ?>" source-src="/weibo/<?php echo ($obj['recontent']['images'][$i]['source']); ?>" alt=""></div><?php } endswitch;?>
						<div class="footer">
							<span class="time"><?php echo ($obj["recontent"]["time"]); ?> 该微博共被转播了<?php echo ($obj["recontent"]["recount"]); ?>次</span>
						</div>
					</div>
					<div class="footer">
						<span class="time"><?php echo ($obj["time"]); ?></span>
						<span class="handler">赞(0) | <a href="javascript:void(0)" class="re">转播</a> | <a href="javascript:void(0)" class="comment">评论</a> | 收藏</span>
						<div class="re_box re_com_box" style="display:none;">
							<p>表情、字数限制自行完成</p>
							<textarea class="re_text re_com_text" name="commend"> || @<?php echo ($obj["username"]); ?> : <?php echo ($obj["textarea"]); ?></textarea>
							<input type="hidden" name="reid" value="<?php echo ($obj["reid"]); ?>" />
							<input class="re_button" type="button" value="转播">
						</div>
						<div class="com_box re_com_box" style="display:none;">
							<p>表情、字数限制自行完成</p>
							<textarea class="com_text re_com_text" name="commend"></textarea>
							<input type="hidden" name="tid" value="<?php echo ($obj["reid"]); ?>" />
							<input class="com_button" type="button" value="评论">
							<div class="comment_content">
								
							</div>
						</div>	
					</div>
				</dd>
			</dl><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			
			<div id="loadmore">加载更多 <img src="/weibo/Public/Home/img/loadmore.gif" alt=""></div>
			
			<div id="imgs">
				<ol>
					<li class="source"><a href="javascript:void(0)" target="_blank">查看原图</a></li>
				</ol>
				<img src="/weibo/Public/Home/img/loading_100.png" alt="">
			</div>
			<img src="/weibo/Public/Home/img/close.png" class="imgs_close" alt="">
			
			<!--无配图-->
			<div id="ajax_html1" style="display:none;">
				<dl class="weibo_content_data">
					<dt><a href="javascript:void(0)">
					<?php if(empty($smallFace)): ?><img src="/weibo/Public/Home/img/small_face.jpg" alt="">
					<?php else: ?>
						<img src="/weibo/<?php echo ($smallFace); ?>" alt=""><?php endif; ?>
					</a></dt>
					<dd>
						<h4><a href="javascript:void(0)"><?php echo session('user_auth')['username'];?></a></h4>
						<p>#内容#</p>
						<div class="footer">
							<span class="time">刚刚发布</span>
							<span class="handler">赞(0) | 转播 | 评论 | 收藏</span>
						</div>
					</dd>
				</dl>
			</div>
			
			<!--一张配图-->
			<div id="ajax_html2" style="display:none;">
				<dl class="weibo_content_data">
					<dt><a href="javascript:void(0)">
					<?php if(empty($smallFace)): ?><img src="/weibo/Public/Home/img/small_face.jpg" alt="">
					<?php else: ?>
						<img src="/weibo/<?php echo ($smallFace); ?>" alt=""><?php endif; ?>
					</a></dt>
					<dd>
						<h4><a href="javascript:void(0)"><?php echo session('user_auth')['username'];?></a></h4>
						<p>#内容#</p>
						<div class="img" style="display:block;"><img src="/weibo/#缩略图#" alt=""></div>
						<div class="img_zoom" style="display:none">
							<ol>
								<li class="in"><a href="javascript:void(0)">收起</a></li>
								<li class="source"><a href="/weibo/#原图#" target="_blank">查看原图</a></li>
							</ol>
							<img data="/weibo/#放大图#" src="/weibo/Public/Home/img/loading_100.png" alt="">
						</div>
						<div class="footer">
							<span class="time">刚刚发布</span>
							<span class="handler">赞(0) | 转播 | 评论 | 收藏</span>
						</div>
					</dd>
				</dl>
			</div>
			
			<!--多配图-->
			<div id="ajax_html3" style="display:none;">
				<dl class="weibo_content_data">
					<dt><a href="javascript:void(0)">
					<?php if(empty($smallFace)): ?><img src="/weibo/Public/Home/img/small_face.jpg" alt="">
					<?php else: ?>
						<img src="/weibo/<?php echo ($smallFace); ?>" alt=""><?php endif; ?>
					</a></dt>
					<dd>
						<h4><a href="javascript:void(0)"><?php echo session('user_auth')['username'];?></a></h4>
						<p>#内容#</p>
						<div class="footer">
							<span class="time">刚刚发布</span>
							<span class="handler">赞(0) | 转播 | 评论 | 收藏</span>
						</div>
					</dd>
				</dl>
			</div>
			
		</div>
	</div>
	<div class="main_right">
		<?php if(empty($bigFace)): ?><img src="/weibo/Public/Home/img/big.jpg" alt="" class="face">
		<?php else: ?>
			<img src="/weibo<?php echo ($bigFace); ?>" alt="" class="face"><?php endif; ?>
		<span class="user">
			<a href="javascript:void(0)"><?php echo session('user_auth')['username'];?></a>
		</span>
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