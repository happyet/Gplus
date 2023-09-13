<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit();
error_reporting(E_ERROR);

use Utils\Helper;
use Widget\Options;
use Widget\Notice;
use Typecho\Common;
use Typecho\Plugin;
use Typecho\Widget\Helper\Form\Element\Checkbox;
use Typecho\Widget\Helper\Form\Element\Text;
use Typecho\Widget\Helper\Form\Element\Textarea;
use Typecho\Widget\Helper\Form\Element\Radio;

function themeConfig(Typecho_Widget_Helper_Layout $form) {

    echo '<div class="update-check message success"><h2>欢迎使用 Gplus ！</h2><a href="https://github.com/happyet/gplus" target="_blank">主题仓库</a> | <a href="https://muxer.cn/theme/typecho-theme-gplus.html" target="_blank">主题文档</a>';
    echo '<div id="gplus-check-update"><p class="update-check">正在检查更新……</p></div>';
    echo '</div>';
    echo '<script>var gplusVersion = "' . getThemeVersion() . '"</script>';
    echo '<script src="' . Helper::options()->themeUrl . '/static/js/check_update.js"></script>';
    echo "<style>.typecho-option-submit button{position: fixed;bottom: 10%;right: 20%;box-shadow: 0 12px 16px rgba(29,43,76,.12);}</style>";

    $menuSelect = new Typecho_Widget_Helper_Form_Element_Select(
        'menuSelect', 
        array(
            '0' => _t('显示页面和分类'),
            '1' => _t('只显示页面'), 
            '2' => _t('只显示分类'),
            '3' => _t('不显示导航菜单')
        ),
        '0',
        _t('导航显示选项'),
        _t('选一种网站导航菜单的显示方式')
    );
    $form->addInput($menuSelect);

    $authorBg = new Typecho_Widget_Helper_Form_Element_Text('authorBg', NULL, NULL, _t('右侧头像背景'), _t('在这里填入一个图片URL地址'));
    $form->addInput($authorBg);
    $blogFace = new Typecho_Widget_Helper_Form_Element_Text('blogFace', NULL, NULL, _t('右侧作者头像'), _t('在这里填入一个图片URL地址, 留空为博客管理员email对应头像'));
    $form->addInput($blogFace);
    $blogDec = new Typecho_Widget_Helper_Form_Element_Text('blogDec', NULL, NULL, _t('一句话'), _t('显示在右侧头像作者名字下面的一句话，简明精要。'));
    $form->addInput($blogDec);
    $blogDate = new Typecho_Widget_Helper_Form_Element_Text('blogDate', NULL, NULL, _t('建博时间'), _t('显示在右侧作者一句话下面，格式1901-08-08。'));
    $form->addInput($blogDate);

    $tencentQQ = new Typecho_Widget_Helper_Form_Element_Text('tencentQQ', NULL, NULL, _t('QQ:'), _t('你的QQ号码'));
    $form->addInput($tencentQQ);
    $tencentWX = new Typecho_Widget_Helper_Form_Element_Text('tencentWX', NULL, NULL, _t('微信二维码:'), _t('你的微信二维码图片地址'));
    $form->addInput($tencentWX);
    $Weibo = new Typecho_Widget_Helper_Form_Element_Text('Weibo', NULL, NULL, _t('微博:'), _t('你的微博地址'));
    $form->addInput($Weibo);
    $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('Github:'), _t('你的Github地址'));
    $form->addInput($github);
    $telegram = new Typecho_Widget_Helper_Form_Element_Text('telegram', NULL, NULL, _t('Telegram:'), _t('你的telegram地址'));
    $form->addInput($telegram);
    $instagram = new Typecho_Widget_Helper_Form_Element_Text('instagram', NULL, NULL, _t('Instagram:'), _t('你的instagram地址'));
    $form->addInput($instagram);

    $QQavatar = new Typecho_Widget_Helper_Form_Element_Radio(
        'QQavatar', 
        array(
            'able' => _t('启用'),
            'disable' => _t('禁止'),
        ),
        'able', 
        _t('QQ数字邮箱自动获取QQ头像'), 
        _t('启用后访客评论时输入QQ数字邮箱账户自动获得QQ头像。')
    );
    $form->addInput($QQavatar);

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'sidebarBlock', 
        array(
            'ShowRecentPosts' => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowHotComs' => _t('显示热评网友'),
            'ShowCategory' => _t('显示分类'),
            'ShowTags' => _t('显示标签云'),
            'ShowArchive' => _t('显示归档')
        ),
        array('ShowRecentPosts', 'ShowRecentComments', 'ShowHotComs', 'ShowCategory', 'ShowTags','ShowArchive'), 
        _t('侧边栏显示')
    );
    $form->addInput($sidebarBlock->multiMode());

    $bodyHTML = new Typecho_Widget_Helper_Form_Element_Textarea('bodyHTML', null, null, _t('自定义 body 底部输出的 HTML'), _t('body 底部的 HTML 会在 footer 之后 body 尾部之前输出。'));
    $form->addInput($bodyHTML);

    $phasebeam = new Typecho_Widget_Helper_Form_Element_Radio(
        'phasebeam', 
        array(
            'able' => _t('启用'),
            'disable' => _t('禁止'),
        ),
        'able', 
        _t('显示漂浮背景'), 
        _t('只有默认颜色，暂时不能切换颜色。')
    );
    $form->addInput($phasebeam);

    theme_options_backup();
}
/**
 * 获取主题版本号
 */
function getThemeVersion(){
  $info = Plugin::parseInfo(Helper::options()->themeFile(Helper::options()->theme, "index.php"));
  return $info["version"];
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
  $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
  if ($archive->is('single')) {
      $views = Typecho_Cookie::get('extend_contents_views');
      $views = $views ? explode(',', $views) : [];
      if (!in_array($cid, $views)) {
          $db->query($db->update('table.contents')->rows(array('views' => (int)$row + 1))->where('cid = ?', $cid));
          $row = (int) $row + 1;
          array_push($views, $cid);
          $views = implode(',', $views);
          Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
      }
  }
  
  if($row > 1000){
      $pViews = number_format($row/1000,2) . 'K';
  }else{
      $pViews = number_format($row);
  }
  echo $pViews;
}
/** */
function post_thumb($obj) {
    $thumb = '';
    preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $obj->content, $matches);  //通过正则式获取图片地址
    $pic_num = isset($matches[1][0]) ? count($matches[1]) : '';
    $attach = $obj->attachments()->attachment;
    if (isset($attach->isImage) && $attach->isImage == 1){
        echo '<p><img src="'.$attach->url.'" loading="lazy" alt="'.$obj->title.'"></p>';
    }elseif($pic_num){
        echo '<p>';
        for($i = 0;$i < $pic_num; $i++){
            if($i <= 2) echo '<img src="'.$matches[1][$i].'" loading="lazy" alt="'.$obj->title.'">';
        }
        echo '</p>';
    }
}
/**
 * 处理正文
 * @param $content
 * @return array|string|string[]|null
 */
function handleContent($content){
  return imageLazyLoad($content);
}

/**
 * 图片懒加载
 * @param $content
 * @return array|string|string[]|null
 */
function imageLazyLoad($content){
  return preg_replace("/<img([^>]+)>/i", '<img$1 loading="lazy">', $content);
}
/* 通过邮箱生成头像地址 */
function getAvatarByEmail($mail,$size=100,$show=true){
	$mailLower = strtolower($mail);
    $reg='/^([0-9]{5,11})@qq.com$/';
    $options = Typecho_Widget::widget('Widget_Options');
    /*if(($options->QQavatar === 'able') && preg_match($reg,$mailLower)){
	    $qq = str_replace('@qq.com', '', $mailLower);
        $qqapi = 'http://ptlogin2.qq.com/getface?&imgtype=1&uin='.$qq;
        $qquser = file_get_contents($qqapi);
        $str1 = explode('sdk&k=', $qquser);
        $str2 = explode('&s=', $str1[1]);
        $k = $str2[0];
        $avatar_link = '//q1.qlogo.cn/g?b=qq&k='.$k.'&s=100';
    } else {*/
        $gravatarsUrl = '//cravatar.cn/avatar/';
        $rating = Helper::options()->commentsAvatarRating;
        $md5MailLower = md5($mailLower);
		$avatar_link = $gravatarsUrl . $md5MailLower . '?s='.$size.'&r='.$rating.'&d=mm';
	//}
    if($show){
        echo $avatar_link;
    }else{
        return $avatar_link;
    }
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
/**
 * 备份主题数据
 * @return void
 */
function theme_options_backup(){
    $name = 'Gplus';
    $db = Typecho_Db::get();
    if (isset($_POST['type'])) {
        $theme_options = $db->fetchRow($db->select()->from("table.options")->where("name = ?", "theme:" . $name));
        $theme_options_backup = $db->fetchRow($db->select()->from("table.options")->where("name = ?", "theme:" . $name . "_backup"));
        
        if ($_POST['type'] == '创建备份') {
            $theme_options_value = $theme_options['value'];
            if ($theme_options_value) {
                if ($theme_options_backup) {
                    $db->query($db->update("table.options")->rows(["value" => $value])->where("name = ?", "theme:" . $name . "_backup"));
                    Notice::alloc()->set("备份更新成功", "success"); 
                } else {
                    $db->query($db->insert("table.options")->rows(["name" => "theme:" . $name . "_backup", "user" => "0", "value" => $theme_options_value]));
                    Notice::alloc()->set("备份成功", "success");
                }
                Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
            }
        }
        if ($_POST['type'] == "还原备份") {
            if ($theme_options_backup) {
                $theme_options_backup_value = $theme_options_backup['value'];
                $db->query($db->update("table.options")->rows(["value" => $theme_options_backup_value])->where("name = ?", "theme:" . $name));
                Notice::alloc()->set("备份还原成功", "success");
            } else {
                Notice::alloc()->set("无备份数据，请先创建备份", "error");
            }
            Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
        }
        if ($_POST['type'] == "删除备份") {
            if ($theme_options_backup){
                $db->query($db->delete("table.options")->where("name = ?", "theme:" . $name . "_backup"));
                Notice::alloc()->set("删除备份成功", "success");
            } else {
                Notice::alloc()->set("无备份数据，无法删除", "success");
            }
            Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
        } 
    }?>

    </form>
    <?php echo '<br/><div class="message error">请先点击右下角的保存设置按钮，创建备份！<br/><br/><form class="backup" action="?gplus_backup" method="post">
    <input type="submit" name="type" class="btn primary" value="创建备份" />
    <input type="submit" name="type" class="btn primary" value="还原备份" />
    <input type="submit" name="type" class="btn primary" value="删除备份" /></form></div>';
}
/** 
 * 人性化日期
 * @param $created 日期
 * @return string   xx 前
 */
function get_humanized_date(int $created){
  if (Helper::options()->timeFormat != "") {
    return date(Helper::options()->timeFormat, $created);
  } else {
    //计算时间差
    $diff = time() - $created;
    $d = floor($diff / 3600 / 24);

    $Y = date("Y", $created);

    //输出时间
    if (date("Y-m-d", $created) == date("Y-m-d")) {
      return "今天";
    } elseif ($d <= 1) {
      return "昨天";
    } elseif ($d == 2) {
      return "前天";
    } elseif ($d <= 31) {
      return $d . " 天前";
    } elseif ($Y == date("Y")) {
      return date("m-d", $created);
    } else {
      return date("Y-m-d", $created);
    }
  }
}