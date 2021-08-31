<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<title><?php $this->archiveTitle(array('category'=>_t(' %s '),'search'=>_t(' %s '),'tag'=>_t(' %s '),'author'=>_t(' %s ')), '', ' - ');?> <?php $this->options->title();?> - <?php $this->options->description() ?></title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php $this->options->themeUrl('style.css'); ?>" />
	<?php if ($this->is('post')): ?>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php $this->options->themeUrl('/static/thickbox/thickbox.css'); ?>" />
	<?php endif; ?>
	<script type="text/javascript" src="<?php $this->options->themeUrl('/static/js/jquery.min.js '); ?>"></script>
    <?php $this->header(); ?>
</head>
<body>
<header class="header">
	<div class="container">
		<button class="toggle-btn menu"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg></button>	
		<div class="site-header">
			<h1 class="site-title"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
			<p><?php $this->options->description(); ?></p>
			<?php $show_menu = $this->options->menuSelect; if($show_menu < '3'){ ?>
				<nav class="site-nav">
					<ul class="site-menu">
						<li<?php if($this->is('index')) echo ' class="current"'; ?>><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
						<?php if($show_menu == '0' || empty($show_menu) || $show_menu == '2'): ?>
							<?php $this->widget('Widget_Metas_Category_List')->to($cats);?>
							<?php while ($cats->next()): ?>
								<li<?php echo ($this->is('category', $cats->slug)) ? ' class="current"' : ''; ?>><a href="<?php $cats->permalink()?>"><?php $cats->name()?></a></li>
							<?php endwhile; ?>
						<?php endif; ?>
						<?php if($show_menu == '0' || empty($show_menu) || $show_menu == '1'): ?>
							<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
							<?php while($pages->next()): ?>
								<li<?php echo ($this->is('page', $pages->slug)) ? ' class="current"' : ''; ?>><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</nav>
			<?php } ?>
			<button class="toggle-btn search"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg></button>
		</div>
		<form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
			<input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" /><button type="submit" class="submit"><?php _e('搜索'); ?></button>
		</form>
	</div>
</header>
<main class="main">
	<div class="container">