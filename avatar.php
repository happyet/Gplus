<?php
$mail= $_REQUEST['mail'];
$gravatarsUrl = '//cravatar.cn/avatar/';
$mailLower = strtolower($mail);
$md5MailLower = md5($mailLower);
$qqMail = str_replace('@qq.com', '', $mailLower);
if (strstr($mailLower, "qq.com") && is_numeric($qqMail) && strlen($qqMail) < 11 && strlen($qqMail) > 4) {
	$qqapi = 'http://ptlogin2.qq.com/getface?&imgtype=1&uin='.$qqMail;
	$qquser = file_get_contents($qqapi);
	$str1 = explode('sdk&k=', $qquser);
	$str2 = explode('&s=', $str1[1]);
	$k = $str2[0];
	$avatar_link = '//q1.qlogo.cn/g?b=qq&k='.$k.'&s=100';
} else {
	$avatar_link = $gravatarsUrl . $md5MailLower . '?s=50&r=G&d=mm';
}
echo $avatar_link;