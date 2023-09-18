<?php 
function threadedComments($comments, $singleCommentOptions) {
	$commentbyAuthor = '';
	if ($comments->authorId) {
		if ($comments->authorId == $comments->ownerId) {
			$commentbyAuthor = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" id="woo_svg_vgold"><path fill="#FDFF5D" d="M93 50C93 26 74 7 50 7S7 26 7 50s19 43 43 43c23 0 43-20 43-43zM0 50C0 22 22 0 50 0s50 22 50 50-22 50-50 50S0 77 0 50z"></path><path fill="#E21D02" d="M93 50C93 26 74 7 50 7S7 26 7 50s19 43 43 43c23 0 43-20 43-43z"></path><path fill="none" stroke="#CF2F00" stroke-width=".5" d="M26 33h10l14 29 14-29h10L55 74H45z"></path><path fill="#FEFF5D" d="M26 33h10l14 29 14-29h10L55 74H45z"></path></svg>';
		}
	}
	if ($comments->url) {
        $author = '<a href="' . $comments->url . '" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
    } else {
        $author = $comments->author;
    }
	if($comments->levels > 0){
?>
	<li id="<?php $comments->theId(); ?>" class="comment comment-body comment-child<?php $comments->levelsAlt(' comment-level-odd', ' comment-level-even');?>">
		<div class="comment-meta loft-head">
			<img alt="commenter-avatar" src="<?php getAvatarByEmail($comments->mail,25); ?>" class="avatar photo" height="25" width="25">
			<span class="fn"><?php echo $author; ?><?php echo $commentbyAuthor; ?></span>
			<time class="comment-time" datetime="<?php $comments->date('c'); ?>"><?php $comments->date('Y-m-d H:i'); ?></time>
			<span class="comment-reply-link"><?php $comments->reply('回复'); ?></span>
		</div>
		<div class="comment-content">
			<?php if ($comments->status === "waiting") : ?>
                <em class="waiting">评论审核中...</em>
            <?php endif; ?>
			<?php $comments->content();?>
			<?php if ($comments->children) { ?>
				<?php $comments->threadedComments($singleCommentOptions);?>
			<?php } ?>
		</div>
	</li>
<?php }else{ ?>
	<li id="<?php $comments->theId(); ?>" class="comment comment-body<?php $comments->alt(' comment-odd', ' comment-even');echo ' comment-parent';?>">
		<article class="comment-loft loft">
			<div class="comment-loft-inner loft-inner">
				<div class="comment-meta loft-head">
					<span class="loft-img"><img alt="commenter-avatar" src="<?php getAvatarByEmail($comments->mail,50); ?>" class="avatar photo" height="50" width="50"><?php echo $commentbyAuthor; ?></span>
					<div class="commenter-title">
						<span class="fn"><?php echo $author; ?></span>
						<time class="comment-time" datetime="<?php $comments->date('c'); ?>"><?php $comments->date('Y-m-d H:i'); ?></time>
					</div>
					<button role="button" class="comment-reply-link loft-btn" title="回复"><?php $comments->reply('回复'); ?></button>
				</div>
				<div class="comment-content">
					<?php if ($comments->status === "waiting") : ?>
						<em class="waiting">评论审核中...</em>
					<?php endif; ?>
					<?php $comments->content();?>
				</div>
				<?php if ($comments->children) { ?>
					<?php $comments->threadedComments($singleCommentOptions);?>
				<?php } ?>
			</div>
		</article>
	</li>
<?php } } ?>
<?php $this->comments()->to($comments); ?>
<?php if($this->allow('comment')): ?>
	<div id="comments">
		<div id="<?php $this->respondId(); ?>" class="respond loft">
			<div id="reply-title" class="comment-title line-title"><span>新评论</span></div>
			<form method="post" action="<?php $this->commentUrl() ?>" id="comment_form" class="loft-inner">
				<div id="commentauthorinfo">
					<button id="close" class="close" type="button">X</button>
					<?php if($this->user->hasLogin()): ?>
						<p>已经以 <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a> 的身份登录. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('[退出]'); ?></a></p>
					<?php else: ?>
						<h4>请填写评论信息</h4>
						<p><label for="author">昵称*</label><input type="text" name="author" id="author" class="commenttext" value="<?php $this->remember('author'); ?>" tabindex="1"></p>
						<p><label for="mail">邮箱*</label><input type="text" name="mail" id="mail" class="commenttext" value="<?php $this->remember('mail'); ?>" tabindex="2"></p>
						<p><label for="url">网 址</label><input type="text" name="url" id="url" class="commenttext" value="<?php $this->remember('url'); ?>" tabindex="3"></p>
						<p><button id="caok" class="submit" type="button">OK</button></p>
					<?php endif; ?>
				</div>
				<div id="realavatar" class="show-avatar loft-img">
					<?php if($this->user->hasLogin()): ?>
						<img alt="<?php $this->user->screenName(); ?>" src="<?php getAvatarByEmail($this->user->mail,50); ?>" class="avatar photo" height="50" width="50">
					<?php else: ?>
						<img alt="" src="<?php getAvatarByEmail($this->remember('mail',true)); ?>" class="avatar photo" height="50" width="50">
					<?php endif; ?>
				</div>
				<textarea id="comment" class="txt" name="text" tabindex="4" placeholder="点击右侧头像或者输入评论后点击发布评论输入用户信息。" required><?php $this->remember('text'); ?></textarea>		
				<p style="text-align:right;">
					<?php $comments->cancelReply(); ?>
					<input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="发布评论">
				</p>
				<input type="hidden" name="comment_post_ID" value="5152" id="comment_post_ID">
				<input type="hidden" name="comment_parent" id="comment_parent" value="0">
			</form>
		</div>
	</div>
<?php endif; ?>

<?php if ($comments->have()): ?>
	<div class="comment-title line-title"><span>评论 <?php $this->commentsNum('0', '1', '%d'); ?></span></div>
	<?php $comments->listComments(); ?>
	<div class="post-navigation"><?php $comments->pageNav(); ?></div>
<?php else: ?>
	<?php if($this->allow('comment')): ?><p class="comment-title line-title"><span>暂无评论</span></p><?php endif; ?>
<?php endif; ?>