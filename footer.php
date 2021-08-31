	</div>
</main>
<footer class="footer">
	<div class="container">
		<p>&#169; <?php echo date("Y"); ?> <?php $this->options->title(); ?>, Powered by <a href="http://www.typecho.org" target="_blank" rel="nofollow">Typecho)))</a>. Theme by <a href="https://lms.im" target="_blank"  rel="nofollow" title="自娱自乐，不亦乐乎">不亦乐乎</a></p>
		<p><a href="<?php $this->options->feedUrl(); ?>">Site RSS</a>, <a href="<?php $this->options->commentsFeedUrl(); ?>">Comments RSS</a>. 
		<?php if($this->user->hasLogin()): ?>
			<a href="<?php $this->options->adminUrl(); ?>">Management (<?php $this->user->screenName(); ?>)</a> | <a href="<?php $this->options->logoutUrl(); ?>">Log out</a>.
		<?php else: ?>
			<a href="<?php $this->options->adminUrl('login.php'); ?>">Login</a>.
		<?php endif; ?>
	</div>
</footer>
<div class="gotop"><span id="top"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-up" class="svg-inline--fa fa-chevron-up fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg></span></div>
<?php $this->footer(); ?>
<?php
if ($this->is('single')) {
    Helper::threadedCommentsScript();
}
?>
</div>
<script type="text/javascript">var ajax_url = '<?php $this->options->themeUrl(); ?>';</script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/static/js/app.js'); ?>"></script>
<?php if ($this->is('post')): ?>
<script type="text/javascript">
/* <![CDATA[ */
var thickboxL10n = {
	next: "下一页 &gt;",
	prev: "&lt; 上一页",
	image: "图像",
	of: "的",
	close: "关闭",
	loadingAnimation: "<?php $this->options->themeUrl('/static/thickbox/loadingAnimation.gif');?>",
	noiframes: "这个功能需要 iframe 的支持，您可能禁止了 iframe 的显示或是您的浏览器不支持。"
};
try{convertEntities(thickboxL10n);}catch(e){};
/* ]]> */
</script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/static/thickbox/thickbox.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->options->bodyHTML) $this->options->bodyHTML() ?>
<?php if ($this->options->phasebeam === 'able'): ?>
<div id="phasebeam">
	<canvas width="1007" height="0"></canvas>
	<canvas width="1007" height="100%"></canvas>
	<canvas width="1007" height="677"></canvas>
</div>
<script src="<?php $this->options->themeUrl('static/js/phasebeam.js'); ?>"></script>
<?php endif; ?>
</body>
</html>
