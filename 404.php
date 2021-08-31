<?php $this->need('header.php'); ?>
<div id="primary">
	<article class="post 404-post loft">
		<div class="post-main loft-inner">
			<a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><img class="author-avatar loft-img" src="<?php getAvatarByEmail($this->author->mail,50); ?>" alt="<?php $this->author->screenName(); ?>" width="48" height="48" /></a>
			<header class="post-header loft-head">
				<h2 class="post-title">悲情404，你要找的页面不存在哦！</h2>
				<button role="button" class="post-action loft-btn" title="“选项”菜单"></button>
			</header>
			<div class="jiao loft-cape"></div>
			<div class="post-content loft-body" style="padding: 40px;font-size:15px;line-height:1.6">
			
					<span style="float:left;display:block;width:95px;height:106px;background:url(<?php $this->options->themeUrl(); ?>images/stream.png) 0 -93px no-repeat;"></span>
					<p style="overflow:auto;padding-left:20px;margin-bottom:40px;">青玉案·元夕<br><br>
					[宋] 辛弃疾<br><br>
					东风夜放花千树，<br>  
					更吹落，星如雨。<br>
					宝马雕车香满路。<br>
					凤箫声动，玉壶光转，一夜鱼龙舞。<br>
					蛾儿雪柳黄金缕，<br>
					笑语盈盈暗香去。<br>
					众里寻他千百度，<br>
					蓦然回首，那人却在灯火阑珊处。</p>
					<form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search" style="text-align:center">
						<input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" /><button type="submit" class="submit"><?php _e('搜索'); ?></button>
					</form>
			</div>
		</div>
	</article>
</div>
<?php include('sidebar.php'); ?>
<?php include('footer.php'); ?>