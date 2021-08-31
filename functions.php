<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
    $menuSelect = new Typecho_Widget_Helper_Form_Element_Select('menuSelect', array(
      '0' => _t('显示页面和分类'),
      '1' => _t('只显示页面'), 
      '2' => _t('只显示分类'),
      '3' => _t('不显示导航菜单')),'0',_t('显示页面和分类')
    );
    $form->addInput($menuSelect);
    $authorBg = new Typecho_Widget_Helper_Form_Element_Text('authorBg', NULL, NULL, _t('右侧头像背景'), _t('在这里填入一个图片URL地址'));
    $form->addInput($authorBg);
    $blogFace = new Typecho_Widget_Helper_Form_Element_Text('blogFace', NULL, NULL, _t('右侧头像'), _t('在这里填入一个图片URL地址, 留空为作者头像'));
    $form->addInput($blogFace);
    $blogDec = new Typecho_Widget_Helper_Form_Element_Text('blogDec', NULL, NULL, _t('一句话'), _t('显示在右侧头像作者名字下面的一句话，简明精要。'));
    $form->addInput($blogDec);
    $blogDate = new Typecho_Widget_Helper_Form_Element_Text('blogDate', NULL, NULL, _t('建博时间'), _t('显示在右侧作者一句话下面。'));
    $form->addInput($blogDate);

    $tencentQQ = new Typecho_Widget_Helper_Form_Element_Text('tencentQQ', NULL, NULL, _t('QQ:'), _t('你的QQ号码'));
    $form->addInput($tencentQQ);
    $tencentWX = new Typecho_Widget_Helper_Form_Element_Text('tencentWX', NULL, NULL, _t('微信二维码:'), _t('你的微信二维码图片地址'));
    $form->addInput($tencentWX);
    $Weibo = new Typecho_Widget_Helper_Form_Element_Text('Weibo', NULL, NULL, _t('微博:'), _t('你的微博地址'));
    $form->addInput($Weibo);
    $QQavatar = new Typecho_Widget_Helper_Form_Element_Radio('QQavatar', array(
        'able' => _t('启用'),
        'disable' => _t('禁止'),
    ),'able', _t('QQ数字邮箱自动获取QQ头像'), _t(''));
    $form->addInput($QQavatar);

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', array(
      'ShowRecentPosts' => _t('显示最新文章'),
      'ShowRecentComments' => _t('显示最近回复'),
      'ShowHotComs' => _t('显示热评网友'),
      'ShowCategory' => _t('显示分类'),
      'ShowTags' => _t('显示标签云'),
      'ShowArchive' => _t('显示归档')
    ),array('ShowRecentPosts', 'ShowRecentComments', 'ShowHotComs', 'ShowCategory', 'ShowTags','ShowArchive'), _t('侧边栏显示'));
    $form->addInput($sidebarBlock->multiMode());
    $bodyHTML = new Typecho_Widget_Helper_Form_Element_Textarea('bodyHTML', null, null, _t('自定义 body 底部输出的 HTML'), _t('body 底部的 HTML 会在 footer 之后 body 尾部之前输出。'));
    $form->addInput($bodyHTML);
    $phasebeam = new Typecho_Widget_Helper_Form_Element_Radio('phasebeam', array(
      'able' => _t('启用'),
      'disable' => _t('禁止'),
    ),'able', _t('显示漂浮背景'), _t(''));
    $form->addInput($phasebeam);
}
/*文章阅读次数统计*/
function get_post_view($archive) {
  $cid = $archive->cid;
  $db = Typecho_Db::get();
  $prefix = $db->getPrefix();
  if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
      $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
      echo 0;
      return;
  }
  $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
  if ($archive->is('single')) {
      $views = Typecho_Cookie::get('extend_contents_views');
      if (empty($views)) {
          $views = array();
      } else {
          $views = explode(',', $views);
      }
      if (!in_array($cid, $views)) {
          $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
          array_push($views, $cid);
          $views = implode(',', $views);
          Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
      }
  }
  $pViews = $row['views'];
  if($pViews > 1000){
      $pViews = number_format($pViews/1000,2) . 'K';
  }else{
      $pViews = number_format($pViews);
  }
  echo $pViews;
}

/* 通过邮箱生成头像地址 */
function getAvatarByEmail($mail,$size=100,$show=true){
	$mailLower = strtolower($mail);
    $reg='/^([0-9]{5,11})@qq.com$/';
    $options = Typecho_Widget::widget('Widget_Options');
    if(($options->QQavatar === 'able') && preg_match($reg,$mailLower)){
	    $qq = str_replace('@qq.com', '', $mailLower);
        $qqapi = 'https://ptlogin2.qq.com/getface?&imgtype=1&uin='.$qq;
        $qquser = file_get_contents($qqapi);
        $str1 = explode('sdk&k=', $qquser);
        $str2 = explode('&s=', $str1[1]);
        $k = $str2[0];
        $avatar_link = '//q1.qlogo.cn/g?b=qq&k='.$k.'&s=100';
    } else {
        $gravatarsUrl = '//cravatar.cn/avatar/';
        $rating = Helper::options()->commentsAvatarRating;
        $md5MailLower = md5($mailLower);
		$avatar_link = $gravatarsUrl . $md5MailLower . '?s='.$size.'&r='.$rating.'&d=mm';
	}
    if($show){
        echo $avatar_link;
    }else{
        return $avatar_link;
    }
}
function post_thumb($obj) {
    $thumb = '';
    preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $obj->content, $matches);  //通过正则式获取图片地址
    $attach = $obj->attachments()->attachment;
    if (isset($attach->isImage) && $attach->isImage == 1){
        $thumb = $attach->url;
    }elseif(isset($matches[1][0])){
        $thumb = $matches[1][0];  //将赋值给img_src
    }
    if($thumb) echo '<img src="'.$thumb.'" alt="'.$obj->title.'">';
}
function agreeNum($cid) {
  $db = Typecho_Db::get();
  $prefix = $db->getPrefix();
  
  //  判断点赞数量字段是否存在
  if (!array_key_exists('agree', $db->fetchRow($db->select()->from('table.contents')))) {
      //  在文章表中创建一个字段用来存储点赞数量
      $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `agree` INT(10) NOT NULL DEFAULT 0;');
  }

  //  查询出点赞数量
  $agree = $db->fetchRow($db->select('table.contents.agree')->from('table.contents')->where('cid = ?', $cid));
  //  获取记录点赞的 Cookie
  $AgreeRecording = Typecho_Cookie::get('typechoAgreeRecording');
  //  判断记录点赞的 Cookie 是否存在
  if (empty($AgreeRecording)) {
      //  如果不存在就写入 Cookie
      Typecho_Cookie::set('typechoAgreeRecording', json_encode(array(0)));
  }

  //  返回
  return array(
      //  点赞数量
      'agree' => $agree['agree'],
      //  文章是否点赞过
      'recording' => in_array($cid, json_decode(Typecho_Cookie::get('typechoAgreeRecording')))?true:false
  );
}
function agree($cid) {
  $db = Typecho_Db::get();
  //  根据文章的 `cid` 查询出点赞数量
  $agree = $db->fetchRow($db->select('table.contents.agree')->from('table.contents')->where('cid = ?', $cid));

  //  获取点赞记录的 Cookie
  $agreeRecording = Typecho_Cookie::get('typechoAgreeRecording');
  //  判断 Cookie 是否存在
  if (empty($agreeRecording)) {
      //  如果 cookie 不存在就创建 cookie
      Typecho_Cookie::set('typechoAgreeRecording', json_encode(array($cid)));
  }else {
      //  把 Cookie 的 JSON 字符串转换为 PHP 对象
      $agreeRecording = json_decode($agreeRecording);
      //  判断文章是否点赞过
      if (in_array($cid, $agreeRecording)) {
          //  如果当前文章的 cid 在 cookie 中就返回文章的赞数，不再往下执行
          return $agree['agree'];
      }
      //  添加点赞文章的 cid
      array_push($agreeRecording, $cid);
      //  保存 Cookie
      Typecho_Cookie::set('typechoAgreeRecording', json_encode($agreeRecording));
  }

  //  更新点赞字段，让点赞字段 +1
  $db->query($db->update('table.contents')->rows(array('agree' => (int)$agree['agree'] + 1))->where('cid = ?', $cid));
  //  查询出点赞数量
  $agree = $db->fetchRow($db->select('table.contents.agree')->from('table.contents')->where('cid = ?', $cid));
  //  返回点赞数量
  return $agree['agree'];
}
//  日期格式化
function dateFormat($date, $options = 'format2') {
  if ($options == 'format1') {
      return date('Y年m月d日 H:i', $date);
  }
  if ($options == 'format2') {
      return date('Y-m-d H:i', $date);
  }
  if ($options == 'format3') {
      return date('F jS, Y \a\t h:i a', $date);
  }
  if ($options == 'format4') {
      $time = time() - $date;
      if ($time < 1) {
          return '1秒前';
      }else if ($time < 60) {
          return $time . '秒前';
      }else if ($time > 60 && $time < 3600) {
          return round($time / 60, 0) . '分钟前';
      }else if ($time > 3600 && $time < 86400) {
          return round($time / 3600, 0) . '小时前';
      }else {
          return round($time / 86400, 0) . '天前';
      }
  }
}