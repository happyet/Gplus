<?php
//  判断是否是点赞的 POST 请求
if (isset($_POST['agree'])) {
    //  判断 POST 请求中的 cid 是否是本篇文章的 cid
    if ($_POST['agree'] == $this->cid) {
        //  调用点赞函数，传入文章的 cid，然后通过 exit 输出点赞数量
        exit(agree($this->cid));
    }
    //  如果点赞的文章 cid 不是本篇文章的 cid 就输出 error 不再往下执行
    exit('error');
}
include('header.php');
?>

<div id="primary">
	<?php while($this->next()): ?>
		<article class="post single-post page-post loft">
			<div class="post-main loft-inner">
				<header class="post-header loft-head">
					<a itemprop="name" class="loft-img" href="<?php $this->author->permalink(); ?>" rel="author"><img class="avatar" src="<?php getAvatarByEmail($this->author->mail,50); ?>" alt="<?php $this->author->screenName(); ?>" width="48" height="48" /><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" id="woo_svg_vgold"><path fill="#FDFF5D" d="M93 50C93 26 74 7 50 7S7 26 7 50s19 43 43 43c23 0 43-20 43-43zM0 50C0 22 22 0 50 0s50 22 50 50-22 50-50 50S0 77 0 50z"></path><path fill="#E21D02" d="M93 50C93 26 74 7 50 7S7 26 7 50s19 43 43 43c23 0 43-20 43-43z"></path><path fill="none" stroke="#CF2F00" stroke-width=".5" d="M26 33h10l14 29 14-29h10L55 74H45z"></path><path fill="#FEFF5D" d="M26 33h10l14 29 14-29h10L55 74H45z"></path></svg></a>
					<div class="post-title">
						<h2><?php $this->title() ?></h2>
						<span><time datetime="<?php $this->date('c'); ?>"><?php echo get_humanized_date($this->created); ?></time></span>
					</div>
					<button class="post-action loft-btn" title="“选项”菜单"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg></button>
				</header>
				<div class="post-content loft-body">
					<div class="entry">
						<?php echo handleContent($this->content); ?>
					</div>
				</div>
				<footer class="post-footer loft-foot">
					<?php $agree = $this->hidden?array('agree' => 0, 'recording' => true):agreeNum($this->cid); ?>
					<span class="post-zan"><button <?php echo $agree['recording']?'disabled':''; ?> type="button" id="agree" data-cid="<?php echo $this->cid; ?>" data-url="<?php $this->permalink(); ?>"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="thumbs-up" class="svg-inline--fa fa-thumbs-up fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M466.27 286.69C475.04 271.84 480 256 480 236.85c0-44.015-37.218-85.58-85.82-85.58H357.7c4.92-12.81 8.85-28.13 8.85-46.54C366.55 31.936 328.86 0 271.28 0c-61.607 0-58.093 94.933-71.76 108.6-22.747 22.747-49.615 66.447-68.76 83.4H32c-17.673 0-32 14.327-32 32v240c0 17.673 14.327 32 32 32h64c14.893 0 27.408-10.174 30.978-23.95 44.509 1.001 75.06 39.94 177.802 39.94 7.22 0 15.22.01 22.22.01 77.117 0 111.986-39.423 112.94-95.33 13.319-18.425 20.299-43.122 17.34-66.99 9.854-18.452 13.664-40.343 8.99-62.99zm-61.75 53.83c12.56 21.13 1.26 49.41-13.94 57.57 7.7 48.78-17.608 65.9-53.12 65.9h-37.82c-71.639 0-118.029-37.82-171.64-37.82V240h10.92c28.36 0 67.98-70.89 94.54-97.46 28.36-28.36 18.91-75.63 37.82-94.54 47.27 0 47.27 32.98 47.27 56.73 0 39.17-28.36 56.72-28.36 94.54h103.99c21.11 0 37.73 18.91 37.82 37.82.09 18.9-12.82 37.81-22.27 37.81 13.489 14.555 16.371 45.236-5.21 65.62zM88 432c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z"></path></svg><em class="agree-num">+<?php echo $agree['agree']; ?></em></button></span>
					<span class="post-comments"><?php if($this->allow('comment')): ?><a href="<?php $this->permalink() ?>#comments"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="comment-dots" class="svg-inline--fa fa-comment-dots fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M144 208c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zM256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z"></path></svg><?php $this->commentsNum('+0', '+1', '+%d'); ?></a><?php else: ?>评论已关闭<?php endif; ?></span>
					<span class="post-views"><em><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="qrcode" class="svg-inline--fa fa-qrcode fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M0 224h192V32H0v192zM64 96h64v64H64V96zm192-64v192h192V32H256zm128 128h-64V96h64v64zM0 480h192V288H0v192zm64-128h64v64H64v-64zm352-64h32v128h-96v-32h-32v96h-64V288h96v32h64v-32zm0 160h32v32h-32v-32zm-64 0h32v32h-32v-32z"></path></svg>+<?php get_post_view($this) ?></em></span>
				</footer>
			</div>
		</article>
	<?php endwhile; ?>
	<?php include('comments.php'); ?>
</div>
<?php include('sidebar.php'); ?>
<?php include('footer.php'); ?>