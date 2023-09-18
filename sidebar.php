<aside id="sidebar">

	<section class="widget loft-inner about-author">
		<div class="author-bg" style="background:url(<?php echo $this->options->authorBg ? $this->options->authorBg : $this->options->themeUrl.'/static/images/bg.png'; ?>) no-repeat;background-size:cover;">
			<div class="social">
			<?php if($this->options->tencentQQ){ ?><span class="qq" data-link="//wpa.qq.com/msgrd?v=3&uin=<?php $this->options->tencentQQ();?>&site=qq&menu=yes"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="qq" class="svg-inline--fa fa-qq fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M433.754 420.445c-11.526 1.393-44.86-52.741-44.86-52.741 0 31.345-16.136 72.247-51.051 101.786 16.842 5.192 54.843 19.167 45.803 34.421-7.316 12.343-125.51 7.881-159.632 4.037-34.122 3.844-152.316 8.306-159.632-4.037-9.045-15.25 28.918-29.214 45.783-34.415-34.92-29.539-51.059-70.445-51.059-101.792 0 0-33.334 54.134-44.859 52.741-5.37-.65-12.424-29.644 9.347-99.704 10.261-33.024 21.995-60.478 40.144-105.779C60.683 98.063 108.982.006 224 0c113.737.006 163.156 96.133 160.264 214.963 18.118 45.223 29.912 72.85 40.144 105.778 21.768 70.06 14.716 99.053 9.346 99.704z"></path></svg></span><?php } ?>
			<?php if($this->options->tencentWX){ ?><span class="weixin" data-link="<?php $this->options->tencentWX();?>"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="weixin" class="svg-inline--fa fa-weixin fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M385.2 167.6c6.4 0 12.6.3 18.8 1.1C387.4 90.3 303.3 32 207.7 32 100.5 32 13 104.8 13 197.4c0 53.4 29.3 97.5 77.9 131.6l-19.3 58.6 68-34.1c24.4 4.8 43.8 9.7 68.2 9.7 6.2 0 12.1-.3 18.3-.8-4-12.9-6.2-26.6-6.2-40.8-.1-84.9 72.9-154 165.3-154zm-104.5-52.9c14.5 0 24.2 9.7 24.2 24.4 0 14.5-9.7 24.2-24.2 24.2-14.8 0-29.3-9.7-29.3-24.2.1-14.7 14.6-24.4 29.3-24.4zm-136.4 48.6c-14.5 0-29.3-9.7-29.3-24.2 0-14.8 14.8-24.4 29.3-24.4 14.8 0 24.4 9.7 24.4 24.4 0 14.6-9.6 24.2-24.4 24.2zM563 319.4c0-77.9-77.9-141.3-165.4-141.3-92.7 0-165.4 63.4-165.4 141.3S305 460.7 397.6 460.7c19.3 0 38.9-5.1 58.6-9.9l53.4 29.3-14.8-48.6C534 402.1 563 363.2 563 319.4zm-219.1-24.5c-9.7 0-19.3-9.7-19.3-19.6 0-9.7 9.7-19.3 19.3-19.3 14.8 0 24.4 9.7 24.4 19.3 0 10-9.7 19.6-24.4 19.6zm107.1 0c-9.7 0-19.3-9.7-19.3-19.6 0-9.7 9.7-19.3 19.3-19.3 14.5 0 24.4 9.7 24.4 19.3.1 10-9.9 19.6-24.4 19.6z"></path></svg></span><?php } ?>
			<?php if($this->options->Weibo){ ?><span class="weibo" data-link="<?php $this->options->Weibo();?>"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="weibo" class="svg-inline--fa fa-weibo fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M407 177.6c7.6-24-13.4-46.8-37.4-41.7-22 4.8-28.8-28.1-7.1-32.8 50.1-10.9 92.3 37.1 76.5 84.8-6.8 21.2-38.8 10.8-32-10.3zM214.8 446.7C108.5 446.7 0 395.3 0 310.4c0-44.3 28-95.4 76.3-143.7C176 67 279.5 65.8 249.9 161c-4 13.1 12.3 5.7 12.3 6 79.5-33.6 140.5-16.8 114 51.4-3.7 9.4 1.1 10.9 8.3 13.1 135.7 42.3 34.8 215.2-169.7 215.2zm143.7-146.3c-5.4-55.7-78.5-94-163.4-85.7-84.8 8.6-148.8 60.3-143.4 116s78.5 94 163.4 85.7c84.8-8.6 148.8-60.3 143.4-116zM347.9 35.1c-25.9 5.6-16.8 43.7 8.3 38.3 72.3-15.2 134.8 52.8 111.7 124-7.4 24.2 29.1 37 37.4 12 31.9-99.8-55.1-195.9-157.4-174.3zm-78.5 311c-17.1 38.8-66.8 60-109.1 46.3-40.8-13.1-58-53.4-40.3-89.7 17.7-35.4 63.1-55.4 103.4-45.1 42 10.8 63.1 50.2 46 88.5zm-86.3-30c-12.9-5.4-30 .3-38 12.9-8.3 12.9-4.3 28 8.6 34 13.1 6 30.8.3 39.1-12.9 8-13.1 3.7-28.3-9.7-34zm32.6-13.4c-5.1-1.7-11.4.6-14.3 5.4-2.9 5.1-1.4 10.6 3.7 12.9 5.1 2 11.7-.3 14.6-5.4 2.8-5.2 1.1-10.9-4-12.9z"></path></svg></span><?php } ?>
			<?php if($this->options->github){ ?><span class="github" data-link="<?php $this->options->github();?>"><svg t="1694192252960" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="7907" width="200" height="200"><path d="M465.981 1001.74a89.578 89.578 0 0 1-89.889-88.955l-0.356-63.666c-176.662 38.422-213.927-74.93-213.927-74.93-28.895-73.372-70.523-92.873-70.523-92.873-57.61-39.446 4.364-38.645 4.364-38.645 63.71 4.452 97.28 65.447 97.28 65.447 56.631 97.058 148.569 69.009 184.765 52.803 5.699-41.049 22.172-69.053 40.337-84.947-141.045-16.028-289.303-70.523-289.303-313.79 0-69.32 24.799-125.952 65.447-170.429-6.589-16.028-28.316-80.584 6.144-168.025 0 0 53.337-17.052 174.659 65.09a609.28 609.28 0 0 1 158.943-21.37c53.915 0.223 108.276 7.257 159.031 21.37C814.186 6.679 867.434 23.73 867.434 23.73c34.549 87.485 12.822 152.042 6.233 168.025 40.693 44.433 65.358 101.109 65.358 170.43 0 243.89-148.57 297.583-289.926 313.299 22.751 19.723 43.053 58.323 43.053 117.582 0 84.992-0.312 119.674-0.312 119.674a89.622 89.622 0 0 1-89.8 89H465.98z" fill="#46B980" p-id="7908"></path></svg></span><?php } ?>
			<?php if($this->options->telegram){ ?><span class="telegram" data-link="<?php $this->options->telegram();?>"><svg t="1694190683968" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6134" width="200" height="200"><path d="M679.424 746.862l84.005-395.996c7.424-34.852-12.581-48.567-35.438-40.009L234.277 501.138c-33.72 13.13-33.134 32-5.706 40.558l126.282 39.424 293.156-184.576c13.714-9.143 26.295-3.986 16.018 5.157L426.898 615.973l-9.143 130.304c13.13 0 18.871-5.706 25.71-12.581l61.696-59.429 128 94.282c23.442 13.129 40.01 6.29 46.3-21.724zM1024 512c0 282.843-229.157 512-512 512S0 794.843 0 512 229.157 0 512 0s512 229.157 512 512z" fill="#1296DB" p-id="6135"></path></svg></span><?php } ?>
			<?php if($this->options->instagram){ ?><span class="instagram" data-link="<?php $this->options->instagram();?>"><svg t="1694195527289" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="13294" width="200" height="200"><path d="M1023.98805 512.379421v211.370254a311.453696 311.453696 0 0 1-82.904941 214.357819 311.453696 311.453696 0 0 1-214.357819 82.904941H303.984782a313.69437 313.69437 0 0 1-215.104711-82.904941A311.453696 311.453696 0 0 1 0 723.749675V512.379421 298.768493a313.69437 313.69437 0 0 1 85.892506-212.864037A313.69437 313.69437 0 0 1 298.756543 0.01195h422.740507a311.453696 311.453696 0 0 1 214.35782 82.904941A313.69437 313.69437 0 0 1 1021.000484 298.768493c2.240674 41.079025 2.987565 111.286812 2.987566 213.610928zM563.156083 91.879587H326.391523a690.127613 690.127613 0 0 0-68.714005 6.722022 272.615345 272.615345 0 0 0-47.801047 12.697153A162.822316 162.822316 0 0 0 149.378271 149.390222a162.822316 162.822316 0 0 0-38.83835 58.257525 292.03452 292.03452 0 0 0-12.697153 47.801047 690.127613 690.127613 0 0 0-6.722023 68.714005v373.445678a690.127613 690.127613 0 0 0 6.722023 68.714005 255.436844 255.436844 0 0 0 12.697153 47.801047 177.013251 177.013251 0 0 0 97.095876 97.842768 277.843585 277.843585 0 0 0 47.801047 11.950261 419.006051 419.006051 0 0 0 68.714005 6.722022h373.445678a419.006051 419.006051 0 0 0 68.714005-6.722022 261.411975 261.411975 0 0 0 47.801047-11.950261 174.772577 174.772577 0 0 0 97.842767-97.842768 261.411975 261.411975 0 0 0 11.950262-47.801047 522.82395 522.82395 0 0 0 6.722022-68.714005V563.168033v-50.788612-121.743291-64.232657a522.82395 522.82395 0 0 0-6.722022-68.714005 298.756543 298.756543 0 0 0-11.950262-47.801047 177.013251 177.013251 0 0 0-97.842767-97.095876 255.436844 255.436844 0 0 0-47.801047-12.697153 690.127613 690.127613 0 0 0-68.714005-6.722022h-64.232657c-15.684718-2.240674-35.850785-2.240674-70.207787-1.493783z m135.187335 234.523886a253.943061 253.943061 0 0 1 74.689136 185.975948 262.905757 262.905757 0 0 1-262.905758 262.905757 253.943061 253.943061 0 0 1-185.975947-74.689135 253.19617 253.19617 0 0 1-74.689136-185.975948 250.955496 250.955496 0 0 1 74.689136-185.975948 250.955496 250.955496 0 0 1 185.975947-74.689136 253.19617 253.19617 0 0 1 188.216622 72.448462z m-65.726439 306.225456a162.075424 162.075424 0 0 0 50.041721-120.249508 164.316098 164.316098 0 0 0-50.041721-120.9964 162.075424 162.075424 0 0 0-120.249508-50.041721 171.038121 171.038121 0 0 0-171.038121 171.038121 162.075424 162.075424 0 0 0 50.041721 120.249508 164.316098 164.316098 0 0 0 120.9964 50.041721 162.075424 162.075424 0 0 0 120.249508-50.041721z m196.432427-436.931443a58.257526 58.257526 0 0 1 17.925392 43.319698 61.245091 61.245091 0 0 1-61.245091 61.245092 58.257526 58.257526 0 0 1-43.319699-17.925393 59.751309 59.751309 0 0 1-17.925392-43.319699 61.245091 61.245091 0 0 1 61.245091-61.245091 59.751309 59.751309 0 0 1 43.319699 17.925393z" fill="#333333" p-id="13295"></path></svg></span><?php } ?>
			</div>
		</div>
		<div class="author-top">
			<img src="<?php echo $this->options->blogFace ? $this->options->blogFace : getAvatarByEmail($this->author->mail,100,false); ?>" class="avatar" alt="author" width="100" height="100" />
			<div class="author-info">
				<h2><?php $this->author(); ?> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" id="woo_svg_vgold"><path fill="#FDFF5D" d="M93 50C93 26 74 7 50 7S7 26 7 50s19 43 43 43c23 0 43-20 43-43zM0 50C0 22 22 0 50 0s50 22 50 50-22 50-50 50S0 77 0 50z"></path><path fill="#E21D02" d="M93 50C93 26 74 7 50 7S7 26 7 50s19 43 43 43c23 0 43-20 43-43z"></path><path fill="none" stroke="#CF2F00" stroke-width=".5" d="M26 33h10l14 29 14-29h10L55 74H45z"></path><path fill="#FEFF5D" d="M26 33h10l14 29 14-29h10L55 74H45z"></path></svg></h2>
				<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
				<div class="stats-item">
						<span class="title">文章</span>
						<span class="nums"><?php $post_num = $stat->publishedPostsNum; echo ($post_num > 1000) ? number_format($post_num/1000,2) . 'K' : $post_num; ?></span>
						<span class="title">评论</span>
						<span class="nums"><?php $comm_num = $stat->publishedCommentsNum; echo ($comm_num > 1000) ? number_format($comm_num/1000,2) . 'K' : $comm_num; ?></span>
				</div>
			</div>
		</div>
		<div class="author-bt">
			<p><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="file-alt" class="svg-inline--fa fa-file-alt fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M288 248v28c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-28c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm-12 72H108c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12zm108-188.1V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h204.1C264.8 0 277 5.1 286 14.1L369.9 98c9 8.9 14.1 21.2 14.1 33.9zm-128-80V128h76.1L256 51.9zM336 464V176H232c-13.3 0-24-10.7-24-24V48H48v416h288z"></path></svg>
			<?php echo $this->options->blogDec ? $this->options->blogDec : '正经人谁会写博客'; ?></p>
			<p><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="calendar-alt" class="svg-inline--fa fa-calendar-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path></svg>
			<?php if($this->options->blogDate){
				$blog_set_time = strtotime($this->options->blogDate);
				$diff = time() - $blog_set_time;
				$day_pass = floor($diff / 3600 / 24);
				if($day_pass > 365){
					$year_pass = floor($day_pass / 365);
					$day_pass = floor(($diff % (3600 * 24 * 365))/3600/24);
					echo '网海沉浮 ' .$year_pass. ' 年 ' .$day_pass. ' 天';
				}else{
					echo '网海沉浮 ' .$day_pass. ' 天';
				}
				echo '，留下 '. get_blog_txtnum() .' 字。';
			}else{
				echo '猴年马月 加入独立博客'; 
			}?></p>
		</div>
	</section>

	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
		<section class="widget loft-inner">
			<h3 class="widget-title"><?php _e('分类栏目'); ?></h3>
			<?php $this->widget('Widget_Metas_Category_List')->to($category); $lestLevels = 0;?>
			<ul class="widget-list">
				<?php while ($category->next()): ?>
					<?php if ($category->levels === 0){
						if ($lestLevels > $category->levels) echo '</ul>';?>
							<li class="category-level-<?php echo $category->levels; ?>">
								<a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>">
									<?php $category->name(); ?> <em class="category-count">(<?php $category->count(); ?>)</em>
								</a>
							</li>
					<?php }else{ 
						if ($lestLevels < $category->levels && $lestLevels===0 ) echo '<ul>';?>
					
						<li class="category-level-<?php echo $category->levels; ?>">
							<a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>">
								<span class="category-name"><?php $category->name(); ?></span>
								<span class="category-count">(<?php $category->count(); ?>)</span>
							</a>
						</li>     
					<?php } $lestLevels = $category->levels;?>
				<?php endwhile; ?>
			</ul>
		</section>
    <?php endif; ?>
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
		<section class="widget loft-inner">
			<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
			<ul class="widget-list recent-posts">
				<?php $this->widget('Widget_Contents_Post_Recent','pageSize=5')
				->parse('<li><a href="{permalink}">{title}<span>{year}-{month}-{day}</span></a></li>'); ?>
			</ul>
		</section>
	<?php endif; ?>
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
		<section class="widget loft-inner">
			<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
			<ul class="widget-list recent-comments">
			<?php $this->widget('Widget_Comments_Recent','pageSize=5&ignoreAuthor=true')->to($comments); ?>
			<?php //\Widget\Comments\Recent::alloc()->to($comments); ?>
			<?php while($comments->next()): ?>
				<li>
					<img class="avatar" src="<?php getAvatarByEmail($comments->mail,45); ?>">
					<div class="rc-content">
						<a href="<?php $comments->permalink(); ?>">
							<strong><?php $comments->author(false); ?></strong>
							<span><?php $comments->date('y-m-d'); ?></span>
							<p><?php $comments->excerpt(30, '...'); ?></p>
						</a>
					</div>
				</li>
			<?php endwhile; ?>
			</ul>
		</section>
    <?php endif; ?>
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowHotComs', $this->options->sidebarBlock)): ?>
        <section class="widget loft-inner">
            <h3 class="widget-title"><?php _E('热评网友'); ?></h3>
            <ul class="hot-commenter">
                <?php
                    $db = Typecho_Db::get();
                    $sql = $db->select('COUNT(author) AS cnt', 'author', 'url', 'mail')
                        ->from('table.comments')
                        ->where('status = ?', 'approved')
                        ->where('type = ?', 'comment')
                        ->where('authorId = ?', '0')
                        ->group('mail')
                        ->order('cnt', Typecho_Db::SORT_DESC)
                        ->limit('5');
					$result = $db->fetchAll($sql);
                    if($result){
                        foreach ($result as $one){
                            echo '<li>';
                            echo '<a href="'.$one['url'].'" target="_blank" title="'.$one['author'].': '.$one['cnt'].' 评" rel="nofollow">';
							echo '<img class="avatar" src="'.getAvatarByEmail($one['mail'],45,false).'">';
                            echo '</a></li>';
                        }
                    }else{
                        echo "还没有人评论过！";
                    }
                ?>
            </ul>
        </section>
	<?php endif; ?>
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTags', $this->options->sidebarBlock)): ?>
		<section class="widget loft-inner">
			<h3 class="widget-title"><?php _e('标签云'); ?></h3>
			<div class="tags-cloud">
				<?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 50))->to($tags); ?>  
				<?php while($tags->next()): ?>  
					<a rel="tag" href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?>(<?php $tags->count(); ?>)</a>
				<?php endwhile; ?>
			</div>
		</section>
	<?php endif; ?>
	<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
		<section class="widget loft-inner">
			<h3 class="widget-title"><?php _e('归档'); ?></h3>
			<ul class="widget-list">
				<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
				->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
			</ul>
		</section>
    <?php endif; ?>
</aside>
