<?php if (!defined('THINK_PATH')) exit(); if(is_array($ajaxList)): $i = 0; $__LIST__ = $ajaxList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i;?><dl class="weibo_content_data">
	<dt><a href="javascript:void(0)">
	<?php if(empty($obj["face"])): ?><img src="/weibo/Public/Home/img/small_face.jpg" alt="">
	<?php else: ?>
		<img src="/weibo/<?php echo ($obj["face"]); ?>" alt=""><?php endif; ?>
	</a></dt>
	<dd>
		<h4><a href="javascript:void(0)"><?php echo ($obj["username"]); ?></a></h4>
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
				<?php $__FOR_START_27789__=0;$__FOR_END_27789__=$obj['count'];for($i=$__FOR_START_27789__;$i < $__FOR_END_27789__;$i+=1){ ?><div class="imgs"><img src="/weibo/<?php echo ($obj['images'][$i]['thumb']); ?>" unfold-src="/weibo/<?php echo ($obj['images'][$i]['unfold']); ?>" source-src="/weibo/<?php echo ($obj['images'][$i]['source']); ?>" alt=""></div><?php } endswitch;?>
		<div class="footer">
			<span class="time"><?php echo ($obj["time"]); ?></span>
			<span class="handler">赞(0) | 转播 | 评论 | 收藏</span>
		</div>
	</dd>
</dl><?php endforeach; endif; else: echo "" ;endif; ?>