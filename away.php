<?php
/* 
	Appointment: Страница редиректа
	File: away.php
	Author: f0rt1 
	Engine: Vii Engine
	Copyright: NiceWeb Group (с) 2011
	e-mail: niceweb@i.ua
	URL: http://www.niceweb.in.ua/
	ICQ: 427-825-959
	Данный код защищен авторскими правами
*/

define('MOZG', true);
define('ROOT_DIR', dirname (__FILE__));
define('ENGINE_DIR', ROOT_DIR.'/system');
include ENGINE_DIR.'/classes/mysql.php';
include ENGINE_DIR.'/data/db.php';

$restricted_sql = $db->super_query("SELECT * FROM " . PREFIX . "_restricted_sites;", 1);

foreach ($restricted_sql as $item) {
    $restricted[$item['domain']] = $item['text'];
}

function clean_url($url) {
	if( $url == '' ) return;

	$url = str_replace( "http://", "", strtolower( $url ) );
	$url = str_replace( "https://", "", $url );
	if( substr( $url, 0, 4 ) == 'www.' ) $url = substr( $url, 4 );
	$url = explode( '/', $url );
	$url = reset( $url );
	$url = explode( ':', $url );
	$url = reset( $url );

	return $url;
}

if (in_array(clean_url($_GET['url']), array_keys($restricted))) {
    $message = $restricted[clean_url($_GET['url'])];
} else {
    header("Location: {$_GET['url']}");
    die();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" id="vkontakte">
<head>

<style>
html, body {
  width: 100%;
  height: 100%;
  background: #F7F7F7!important;
  padding: 0px;
  margin: 0px;
}
.body_rtl {
  text-align: right;
  direction:rtl;
}
#away_wrap {
  position: absolute;
  left: 50%;
  width: 900px;
  margin: 50px 0px 0px -450px;
  background: #FFF;
  line-height: 200%;
}
#content {
  padding: 20px 20px 20px 20px;
  font-size: 1.09em;
  border: 1px solid #E4E4E4;
  border-top: none;
}
#head {
  padding: 17px 20px 18px;
  color: #FFF;
  font-size: 1.09em;
  height: 24px;
  background-color: #587EA3;
}
.logo {
  position: absolute;
  width: 132px;
  height: 24px;
  background: url(/templates/Default/images/1/logo.png) 0px 0px no-repeat;
  background-size: 132px 24px;
  display: block;
}
.is_2x .logo {
  background-image: url(/templates/Default/images/1/logo_2x.png);
}
.VK1.is_2x .logo {
  background-image: url(/templates/Default/images/1/logo_vk_2x.png);
}
.VK1 .logo {
  position: absolute;
  width: 40px;
  height: 23px;
  background: url(/templates/Default/images/1/logo_vk.png) 0px 0px no-repeat;
  background-size: 40px 23px;
  display: block;
}
#content h2 {
  border-bottom: none;
  padding-bottom: 0;
}
.away_center {
  text-align: center;
  padding: 0 0 10px 0;
}
.away_center img {
  padding: 20px 0;
}
</style>
<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="robots" content="noindex" />
<title>Переход по ссылке</title>
<link rel="stylesheet" type="text/css" href="/templates/Default/style/style.css" />
</head>

<body class=" VK">
  <div id="away_wrap">
    <div id="head"><a href="http://life-page.ru/" class="logo"></a></div>
    <div id="content">
      <h2>Переход по ссылке</h2>
      Ссылка, по которой Вы попытались перейти, может вести на сайт, который был создан с целью обмана пользователей. Ни в коем случае <b>не вводите пароль, номер телефона</b> на неизвестном сайте. <br>
	  <a href="<?php echo $message; ?>" class="button_blue"><button>Перейти</button></a><div class="away_center"><img src="http://vk.com/images/pics/spamfight.gif" id="login_blocked_img" height="160" width="225" /></div>
	  
    </div>
  </div>
</body>
</html>
