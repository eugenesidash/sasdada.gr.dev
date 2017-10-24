<?php
/* 
	Appointment: Настройки
	File: settings.php 
	Author: f0rt1 
	Engine: Vii Engine
	Copyright: NiceWeb Group (с) 2011
	e-mail: niceweb@i.ua
	URL: http://www.niceweb.in.ua/
	ICQ: 427-825-959
	Данный код защищен авторскими правами
*/
if(!defined('MOZG'))
	die('Hacking attempt!');

if($ajax == 'yes')
	NoAjaxQuery();

if($logged){
	$user_id = $user_info['user_id'];
	$act = $_GET['act'];
	$metatags['title'] = $lang['settings'];

	switch($act){
	
	    //Выключить невидимку         
	    case "invisibility_off":           
          $db->query("UPDATE `".PREFIX."_users` SET user_invisibility = 0, invisibility_date = '0' WHERE user_id = '{$user_id}'");           
		break;

		//Включить невидимку
		case "invisibility_on":
		$row = $db->super_query("SELECT user_balance FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
		$datatime = 7 ? $server_time + (7 * 60 * 60 * 24) : 0;
		if($user_info['user_invisibility'] == 0 AND $row['user_balance'] >= $config['invisibility']){
          $db->query("UPDATE `".PREFIX."_users` SET user_invisibility = 1, user_balance = user_balance-{$config['invisibility']}, invisibility_date = '{$datatime}' WHERE user_id = '{$user_id}'");
        }		  
		break;
		
		
		//################### Невидимка ###################//
		case "invisibility":
			$tpl->load_template('settings/invisibility.tpl');
			$tpl->set('{invisibility_price}', $config['invisibility']);
				 if($user_info['user_invisibility'] == 1){
                 $tpl->set('{user_invisibility}', '<div class="mgclr"></div>
                 <div class="button_div fl_l"><button onClick="settings.invisibility_off(); return false">Выключить "Невидимку"</button></div><div class="mgclr"></div>');
                 } else {
                 $tpl->set('{user_invisibility}', '<div class="mgclr"></div>
                 <div class="button_div fl_l"><button onClick="invisibility_on.invisibility_on(); return false">Включить "Невидимку"</button></div><div class="mgclr"></div>');
                 }	
				 
				 $row = $db->super_query("SELECT user_balance FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
				 if($row['user_balance'] >= $config['invisibility']){
                 $tpl->set('{user_invisibilityonscript}', "<script>
var invisibility_on = {
invisibility_on: function() {
                $.post('/index.php?go=settings&act=invisibility_on', function(data){
                         Box.Info('err', 'Невидимка', 'Режим невидимки включен!', 200, 1500);
                                 location.reload();
                });
        },
}
</script>");
				 } else {
                 $tpl->set('{user_invisibilityonscript}', "<script>
var invisibility_on = {
invisibility_on: function() {
                $.post('/index.php?go=settings&act=invisibility_on', function(data){
                         Box.Info('err', 'Ошибка', 'На вашем счету недостаточно баллов!', 200, 1500);
                });
        },
}
</script>");
                 }
				 
			     $tpl->compile('info');
		break;
	
		
		//################### Изменение пароля ###################//
		case "newpass":
			NoAjaxQuery();
			
			$_POST['old_pass'] = ajax_utf8($_POST['old_pass']);
			$_POST['new_pass'] = ajax_utf8($_POST['new_pass']);
			$_POST['new_pass2'] = ajax_utf8($_POST['new_pass2']);
			
			$old_pass = md5(md5(GetVar($_POST['old_pass'])));
			$new_pass = md5(md5(GetVar($_POST['new_pass'])));
			$new_pass2 = md5(md5(GetVar($_POST['new_pass2'])));
			
			//Выводим текущий пароль
			$row = $db->super_query("SELECT user_password FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
			if($row['user_password'] == $old_pass){
				if($new_pass == $new_pass2)
					$db->query("UPDATE `".PREFIX."_users` SET user_password = '{$new_pass2}' WHERE user_id = '{$user_id}'");
				else
					echo '2';
			} else
				echo '1';
			
			die();
		break;
		
		//################### Изменение имени ###################//
		case "newname":
			NoAjaxQuery();
			$user_name = ajax_utf8(textFilter($_POST['name']));
			$user_lastname = ajax_utf8(textFilter(ucfirst($_POST['lastname'])));

			//Проверка имени
			if(isset($user_name)){
				if(strlen($user_name) >= 2){
					if(!preg_match("/^[a-zA-Zа-яА-Я]+$/iu", $user_name))
						$errors = 3;
				} else
					$errors = 2;
			} else
				$errors = 1;
				
			//Проверка фамилии
			if(isset($user_lastname)){
				if(strlen($user_lastname) >= 2){
					if(!preg_match("/^[a-zA-Zа-яА-Я]+$/iu", $user_lastname))
						$errors_lastname = 3;
				} else
					$errors_lastname = 2;
			} else
				$errors_lastname = 1;
			
			if(!$errors){
				if(!$errors_lastname){
					$user_name = ucfirst($user_name);
					$user_lastname = ucfirst($user_lastname);
					
                    $db->query("INSERT INTO `".PREFIX."_users_name` SET user_name = '{$user_name}', user_lastname = '{$user_lastname}', user_search_pref = '{$user_name} {$user_lastname}', user_name_active = '2', user_id = '{$user_id}'");
					
					mozg_clear_cache_file('user_'.$user_id.'/profile_'.$user_id);
					mozg_clear_cache();
				} else
					echo $errors;
			} else
				echo $errors;
			
			die();
		break;
		
		//################### Сохранение настроек приватности ###################//
		case "saveprivacy":
			NoAjaxQuery();
			
			$val_msg = intval($_POST['val_msg']);
			$val_wall1 = intval($_POST['val_wall1']);
			$val_wall2 = intval($_POST['val_wall2']);
			$val_wall3 = intval($_POST['val_wall3']);
			$val_info = intval($_POST['val_info']);
			$val_gift = intval($_POST['val_gift']);
			$val_audio = intval($_POST['val_audio']);
			$val_video = intval($_POST['val_video']);
			$val_group = intval($_POST['val_group']);
			$val_notes = intval($_POST['val_notes']);
			$val_public = intval($_POST['val_public']);

			if($val_msg <= 0 OR $val_msg > 3) $val_msg = 1;
			if($val_wall1 <= 0 OR $val_wall1 > 3) $val_wall1 = 1;
			if($val_wall2 <= 0 OR $val_wall2 > 3) $val_wall2 = 1;
			if($val_wall3 <= 0 OR $val_wall3 > 3) $val_wall3 = 1;
			if($val_info <= 0 OR $val_info > 3) $val_info = 1;
			if($val_gift <= 0 OR $val_gift > 3) $val_gift = 1;
			if($val_audio <= 0 OR $val_audio > 3) $val_audio = 1;
			if($val_video <= 0 OR $val_video > 3) $val_video = 1;
			if($val_group <= 0 OR $val_group > 3) $val_group = 1;
			if($val_notes <= 0 OR $val_notes > 3) $val_notes = 1;
			if($val_public <= 0 OR $val_public > 3) $val_public = 1;

			$user_privacy = "val_msg|{$val_msg}||val_wall1|{$val_wall1}||val_wall2|{$val_wall2}||val_wall3|{$val_wall3}||val_info|{$val_info}||val_gift|{$val_gift}||val_audio|{$val_audio}||val_video|{$val_video}||val_group|{$val_group}||val_notes|{$val_notes}||val_public|{$val_public}||";
			
			$db->query("UPDATE `".PREFIX."_users` SET user_privacy = '{$user_privacy}' WHERE user_id = '{$user_id}'");
			
			mozg_clear_cache_file('user_'.$user_id.'/profile_'.$user_id);
			
			die();
		break;
		
		//################### Приватность настройки ###################//
		case "privacy":
			$sql_ = $db->super_query("SELECT user_privacy FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
			$row = xfieldsdataload($sql_['user_privacy']);
			$tpl->load_template('settings/privacy.tpl');
			$tpl->set('{val_msg}', $row['val_msg']);
			$tpl->set('{val_msg_text}', strtr($row['val_msg'], array('1' => 'Все пользователи', '2' => 'Только друзья', '3' => 'Никто')));
			$tpl->set('{val_wall1}', $row['val_wall1']);
			$tpl->set('{val_wall1_text}', strtr($row['val_wall1'], array('1' => 'Все пользователи', '2' => 'Только друзья', '3' => 'Только я')));
			$tpl->set('{val_wall2}', $row['val_wall2']);
			$tpl->set('{val_wall2_text}', strtr($row['val_wall2'], array('1' => 'Все пользователи', '2' => 'Только друзья', '3' => 'Только я')));
			$tpl->set('{val_wall3}', $row['val_wall3']);
			$tpl->set('{val_wall3_text}', strtr($row['val_wall3'], array('1' => 'Все пользователи', '2' => 'Только друзья', '3' => 'Только я')));
			$tpl->set('{val_gift}', $row['val_gift']);
			$tpl->set('{val_gift_text}', strtr($row['val_gift'], array('1' => 'Все пользователи', '2' => 'Только друзья', '3' => 'Только я')));
			$tpl->set('{val_info}', $row['val_info']);
			$tpl->set('{val_info_text}', strtr($row['val_info'], array('1' => 'Все пользователи', '2' => 'Только друзья', '3' => 'Только я')));
			$tpl->set('{val_audio}', $row['val_audio']);
			$tpl->set('{val_audio_text}', strtr($row['val_audio'], array('1' => 'Все пользователи', '2' => 'Только друзья', '3' => 'Только я')));
			$tpl->set('{val_video}', $row['val_video']);
			$tpl->set('{val_video_text}', strtr($row['val_video'], array('1' => 'Все пользователи', '2' => 'Только друзья', '3' => 'Только я')));
			$tpl->set('{val_group}', $row['val_group']);
			$tpl->set('{val_group_text}', strtr($row['val_group'], array('1' => 'Все пользователи', '2' => 'Только друзья', '3' => 'Только я')));
			$tpl->set('{val_notes}', $row['val_notes']);
			$tpl->set('{val_notes_text}', strtr($row['val_notes'], array('1' => 'Все пользователи', '2' => 'Только друзья', '3' => 'Только я')));
			$tpl->set('{val_public}', $row['val_public']);
			$tpl->set('{val_public_text}', strtr($row['val_public'], array('1' => 'Все пользователи', '2' => 'Только друзья', '3' => 'Только я')));
			$tpl->compile('info');
		break;
		
			//################### Привязка VK ###################//
		case "vkguard":
			$sql_ = $db->super_query("SELECT user_vk FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
			$tpl->load_template('settings/vk.tpl');
			$tpl->compile('info');
		break;
		
		//################### Добавление в черный список ###################//
		case "addblacklist":
			NoAjaxQuery();
			$bad_user_id = intval($_POST['bad_user_id']);
			
			//Проверяем на существование юзера
			$row = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_users` WHERE user_id = '{$bad_user_id}'");

			//Выводим свой блеклист для проверка
			$myRow = $db->super_query("SELECT user_blacklist FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
			$array_blacklist = explode('|', $myRow['user_blacklist']);

			if($row['cnt'] AND !in_array($bad_user_id, $array_blacklist) AND $user_id != $bad_user_id){
				$db->query("UPDATE `".PREFIX."_users` SET user_blacklist_num = user_blacklist_num+1, user_blacklist = '{$myRow['user_blacklist']}|{$bad_user_id}|' WHERE user_id = '{$user_id}'");
				
				//Если юзер есть в др.
				if(CheckFriends($bad_user_id)){
					//Удаляем друга из таблицы друзей
					$db->query("DELETE FROM `".PREFIX."_friends` WHERE user_id = '{$user_id}' AND friend_id = '{$bad_user_id}' AND subscriptions = 0");
					
					//Удаляем у друга из таблицы
					$db->query("DELETE FROM `".PREFIX."_friends` WHERE user_id = '{$bad_user_id}' AND friend_id = '{$user_id}' AND subscriptions = 0");
					
					//Обновляем кол-друзей у юзера
					$db->query("UPDATE `".PREFIX."_users` SET user_friends_num = user_friends_num-1 WHERE user_id = '{$user_id}'");
					
					//Обновляем у друга которого удаляем кол-во друзей
					$db->query("UPDATE `".PREFIX."_users` SET user_friends_num = user_friends_num-1 WHERE user_id = '{$bad_user_id}'");
					
					//Чистим кеш владельцу стр и тому кого удаляем из др.
					mozg_clear_cache_file('user_'.$user_id.'/profile_'.$user_id);
					mozg_clear_cache_file('user_'.$bad_user_id.'/profile_'.$bad_user_id);
					
					//Удаляем пользователя из кеш файл друзей
					$openMyList = mozg_cache("user_{$user_id}/friends");
					mozg_create_cache("user_{$user_id}/friends", str_replace("u{$bad_user_id}|", "", $openMyList));
					
					$openTakeList = mozg_cache("user_{$bad_user_id}/friends");
					mozg_create_cache("user_{$bad_user_id}/friends", str_replace("u{$user_id}|", "", $openTakeList));
				}
				
				$openMyList = mozg_cache("user_{$user_id}/blacklist");
				mozg_create_cache("user_{$user_id}/blacklist", $openMyList."|{$bad_user_id}|");
			}
			
			die();
		break;
		
		//################### Удаление из черного списка ###################//
		case "delblacklist":
			NoAjaxQuery();
			$bad_user_id = intval($_POST['bad_user_id']);
			
			//Проверяем на существование юзера
			$row = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_users` WHERE user_id = '{$bad_user_id}'");

			//Выводим свой блеклист для проверка
			$myRow = $db->super_query("SELECT user_blacklist FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
			$array_blacklist = explode('|', $myRow['user_blacklist']);

			if($row['cnt'] AND in_array($bad_user_id, $array_blacklist) AND $user_id != $bad_user_id){
				$myRow['user_blacklist'] = str_replace("|{$bad_user_id}|", "", $myRow['user_blacklist']);
				$db->query("UPDATE `".PREFIX."_users` SET user_blacklist_num = user_blacklist_num-1, user_blacklist = '{$myRow['user_blacklist']}' WHERE user_id = '{$user_id}'");
				
				$openMyList = mozg_cache("user_{$user_id}/blacklist");
				mozg_create_cache("user_{$user_id}/blacklist", str_replace("|{$bad_user_id}|", "", $openMyList));
			}
			
			die();
		break;
		
		//################### Черный список ###################//
		case "blacklist":
			$row = $db->super_query("SELECT user_blacklist, user_blacklist_num FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
			
			$tpl->load_template('settings/blacklist.tpl');
			$tpl->set('{cnt}', '<span id="badlistnum">'.$row['user_blacklist_num'].'</span> '.gram_record($row['user_blacklist_num'], 'fave'));
			if($row['user_blacklist_num']){
				$tpl->set('[yes-users]', '');
				$tpl->set('[/yes-users]', '');
			} else
				$tpl->set_block("'\\[yes-users\\](.*?)\\[/yes-users\\]'si","");
			$tpl->compile('info');
			
			if($row['user_blacklist_num'] AND $row['user_blacklist_num'] <= 100){
				$tpl->load_template('settings/baduser.tpl');
				$array_blacklist = explode('|', $row['user_blacklist']);
				foreach($array_blacklist as $user){
					if($user){
						$infoUser = $db->super_query("SELECT user_photo, user_search_pref FROM `".PREFIX."_users` WHERE user_id = '{$user}'");
						
						if($infoUser['user_photo'])
							$tpl->set('{ava}', '/uploads/users/'.$user.'/50_'.$infoUser['user_photo']);
						else
							$tpl->set('{ava}', '{theme}/images/no_ava_50.png');
						
						$tpl->set('{name}', $infoUser['user_search_pref']);
						$tpl->set('{user-id}', $user);
						
						$tpl->compile('content');
					}
				}
			} else
				msgbox('', $lang['settings_nobaduser'], 'info_2');
		break;
		
		
		//################### Смена e-mail если пришли с VK ###################//
		case "change_mail_none":
		$row1 = $db->super_query("SELECT user_email FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
		if(!$row1['user_email']){
			//Отправляем письмо на обе почты
			include_once ENGINE_DIR.'/classes/mail.php';
			$mail = new dle_mail($config);
			
			$email = textFilter($_POST['email'], false, true);
			
			//Проверка E-mail
			if(preg_match('/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i', $email)) $ok_email = true;
			else $ok_email = false;
				
			$row = $db->super_query("SELECT user_email FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
			
			$check_email = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_users`  WHERE user_email = '{$email}'");
			
			if($ok_email AND !$check_email['cnt']){

			$db->query("UPDATE `".PREFIX."_users` SET user_email = '{$email}' WHERE user_id = '{$user_id}'");				
			
			} else
				echo '1';
		
		}
			exit;
			
		break;
		
		//################### Смена e-mail ###################//
		case "change_mail":
		
			//Отправляем письмо на обе почты
			include_once ENGINE_DIR.'/classes/mail.php';
			$mail = new dle_mail($config);
			
			$email = textFilter($_POST['email'], false, true);
			
			//Проверка E-mail
			if(preg_match('/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i', $email)) $ok_email = true;
			else $ok_email = false;
				
			$row = $db->super_query("SELECT user_email FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
			
			$check_email = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_users`  WHERE user_email = '{$email}'");
			
			if($row['user_email'] AND $ok_email AND !$check_email['cnt']){
				
				//Удаляем все пред. заявки
				$db->query("DELETE FROM `".PREFIX."_restore` WHERE email = '{$email}'");
				
				$salt = "abchefghjkmnpqrstuvwxyz0123456789";
				for($i = 0; $i < 15; $i++){
					$rand_lost .= $salt{rand(0, 33)};
				}
				$hash = md5($server_time.$row['user_email'].rand(0, 100000).$rand_lost);
						
				$message = <<<HTML
Вы получили это письмо, так как зарегистрированы на сайте
{$config['home_url']} и хотите изменить основной почтовый адрес.
Вы желаете изменить почтовый адрес с текущего ({$row['user_email']}) на {$email}
Для того чтобы Ваш основной e-mail на сайте {$config['home_url']} был
изменен, Вам необходимо пройти по ссылке:
{$config['home_url']}index.php?go=settings&code1={$hash}

Внимание: не забудьте, что после изменения почтового адреса при входе
на сайт Вам нужно будет указывать новый адрес электронной почты.

Если Вы не посылали запрос на изменение почтового адреса,
проигнорируйте это письмо.С уважением,
Администрация {$config['home_url']}
HTML;
				$mail->send($row['user_email'], 'Изменение почтового адреса', $message);
				
				//Вставляем в БД код 1
				$db->query("INSERT INTO `".PREFIX."_restore` SET email = '{$email}', hash = '{$hash}', ip = '{$_IP}'");
				
				$salt = "abchefghjkmnpqrstuvwxyz0123456789";
				for($i = 0; $i < 15; $i++){
					$rand_lost .= $salt{rand(0, 33)};
				}
				$hash = md5($server_time.$row['user_email'].rand(0, 300000).$rand_lost);
						
				$message = <<<HTML
Вы получили это письмо, так как зарегистрированы на сайте
{$config['home_url']} и хотите изменить основной почтовый адрес.
Вы желаете изменить почтовый адрес с текущего ({$row['user_email']}) на {$email}
Для того чтобы Ваш основной e-mail на сайте {$config['home_url']} был
изменен, Вам необходимо пройти по ссылке:
{$config['home_url']}index.php?go=settings&code2={$hash}

Внимание: не забудьте, что после изменения почтового адреса при входе
на сайт Вам нужно будет указывать новый адрес электронной почты.

Если Вы не посылали запрос на изменение почтового адреса,
проигнорируйте это письмо.С уважением,
Администрация {$config['home_url']}
HTML;
				$mail->send($email, 'Изменение почтового адреса', $message);
				
				//Вставляем в БД код 2
				$db->query("INSERT INTO `".PREFIX."_restore` SET email = '{$email}', hash = '{$hash}', ip = '{$_IP}'");
			
			} else
				echo '1';
			
			exit;
			
		break;
		
		
		//################### Смена e-mail ###################//
		case "change_mail":
		
		//################### Окошко с историей заходов ###################//		
		case"userlogs":
		
			$sql_ = $db->super_query("SELECT uid, browser, ip, date FROM `".PREFIX."_user_log` WHERE uid='{$user_id}' ORDER BY date DESC LIMIT 10",1);		
			foreach($sql_ as $sqls){
				if(date('Y-m-d', $sqls['date']) == date('Y-m-d', $server_time))
					$dateTell = langdate('сегодня в H:i', $sqls['date']);
				elseif(date('Y-m-d', $sqls['date']) == date('Y-m-d', ($server_time-84600)))
					$dateTell = langdate('вчера в H:i',$sqls['date']);
				else
	$dateTell = langdate('j F Y в H:i', $sqls['date']);
if(stripos($sqls['browser'], 'Chrome') !== false){
	$browser = explode('Chrom', $sqls['browser']);
	$browser2 = explode(' ', 'Chrom'.str_replace('/', ' ', $browser[1]));
	$browser[0] = $browser2[0].' '.$browser2[1];
} elseif(stripos($sqls['browser'], 'Opera') !== false){
	$browser2 = explode('/', $sqls['browser']);
	$browser3 = end(explode('/', $sqls['browser']));
	$browser[0] = $browser2[0].' '.$browser3;
} elseif(stripos($sqls['browser'], 'Firefox') !== false){
	$browser3 = end(explode('/', $sqls['browser']));
	$browser[0] = 'Firefox '.$browser3;
} elseif(stripos($sqls['browser'], 'Safari') !== false){
	$browser3 = end(explode('Version/', $sqls['browser']));
	$browser4 = explode(' ', $browser3);
	$browser[0] = 'Safari '.$browser4[0];
	}

	$ip =  $sqls['ip'];
	$pageip=file_get_contents('http://ip-whois.net/ip_geo.php?ip='.$ip);
	preg_match_all("/Страна: (.*)<br>/i", $pageip, $matches);
	unset($pageip);
					
		
	$logs .=  '<tr class=""><td><span class="browser_info">Браузер '.$browser[0].'</span></td><td>'.$dateTell.'</td><td>'.$matches[1][1].'('.$sqls['ip'].')</td></tr>';

			}
			
			echo '
			<div class="err_yellow  pass_errors" style="font-size:11px;padding: 8px;">
			<b>История активности</b>
показывает информацию о том, в какое время
и с каких устройств производилась авторизация на Ваш профиль. 
			</div>
			<table id="activityHistory" class="history" width="100%" cellspacing="0" cellpadding="0">
			<tr>
			<th>Тип доступа</th>
			<th>Время</th>
			<th>IP-адрес</th>
			</tr>
			'.$logs.'
			</table>
			';
		exit;
		break;
		
		//##################Логи посещений#####################
		case"logs":
		
			$sql_ = $db->super_query("SELECT user_id,browser,ip,date FROM `".PREFIX."_log_user` WHERE user_id='{$user_id}' ORDER BY date DESC LIMIT 10",1);
		
			foreach($sql_ as $sqls){
				if(date('Y-m-d', $sqls['date']) == date('Y-m-d', $server_time))
					$dateTell = langdate('сегодня в H:i', $sqls['date']);
				elseif(date('Y-m-d', $sqls['date']) == date('Y-m-d', ($server_time-84600)))
					$dateTell = langdate('вчера в H:i',$sqls['date']);
				else
					$dateTell = langdate('j F Y в H:i', $sqls['date']);
				if(stripos($sqls['browser'], 'Chrome') !== false){
					$browser = explode('Chrom', $sqls['browser']);
					$browser2 = explode(' ', 'Chrom'.str_replace('/', ' ', $browser[1]));
					$browser[0] = $browser2[0].' '.$browser2[1];
				//Opera
				} elseif(stripos($sqls['browser'], 'Opera') !== false){
					$browser2 = explode('/', $sqls['browser']);
					$browser3 = end(explode('/', $sqls['browser']));
					$browser[0] = $browser2[0].' '.$browser3;
				//Firefox
				} elseif(stripos($sqls['browser'], 'Firefox') !== false){
					$browser3 = end(explode('/', $sqls['browser']));
					$browser[0] = 'Firefox '.$browser3;
				//Safari
				} elseif(stripos($sqls['browser'], 'Safari') !== false){
					$browser3 = end(explode('Version/', $sqls['browser']));
					$browser4 = explode(' ', $browser3);
					$browser[0] = 'Safari '.$browser4[0];
				}
				  
				$ip =  $sqls['ip'];
				
				$logs .=  '<tr class=""><td><span class="browser_info">Браузер '.$browser[0].'</span></td><td>'.$dateTell.'</td><td>'.$matches[1][1].'('.$sqls['ip'].')</td></tr>';

			}
			
			echo '
			<div class="err_yellow  pass_errors" style="font-size:11px;padding: 8px;">
			<b>История активности</b>
показывает информацию о том, в какое время
и с каких устройств производилась авторизация на Ваш профиль. 
			</div>
			<table id="activityHistory" class="history" width="100%" cellspacing="0" cellpadding="0">
			<tr>
			<th>Тип доступа</th>
			<th>Время</th>
			<th>IP-адрес</th>
			</tr>
			'.$logs.'
			</table>
			';
		die();
		break;
		
			//Отправляем письмо на обе почты
			include_once ENGINE_DIR.'/classes/mail.php';
			$mail = new dle_mail($config);
			
			$email = textFilter($_POST['email'], false, true);
			
			//Проверка E-mail
			if(preg_match('/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i', $email)) $ok_email = true;
			else $ok_email = false;
				
			$row = $db->super_query("SELECT user_email FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
			
			$check_email = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_users`  WHERE user_email = '{$email}'");
			
			if($row['user_email'] AND $ok_email AND !$check_email['cnt']){
				
				//Удаляем все пред. заявки
				$db->query("DELETE FROM `".PREFIX."_restore` WHERE email = '{$email}'");
				
				$salt = "abchefghjkmnpqrstuvwxyz0123456789";
				for($i = 0; $i < 15; $i++){
					$rand_lost .= $salt{rand(0, 33)};
				}
				$hash = md5($server_time.$row['user_email'].rand(0, 100000).$rand_lost);
						
				$message = <<<HTML
Вы получили это письмо, так как зарегистрированы на сайте
{$config['home_url']} и хотите изменить основной почтовый адрес.
Вы желаете изменить почтовый адрес с текущего ({$row['user_email']}) на {$email}
Для того чтобы Ваш основной e-mail на сайте {$config['home_url']} был
изменен, Вам необходимо пройти по ссылке:
{$config['home_url']}index.php?go=settings&code1={$hash}

Внимание: не забудьте, что после изменения почтового адреса при входе
на сайт Вам нужно будет указывать новый адрес электронной почты.

Если Вы не посылали запрос на изменение почтового адреса,
проигнорируйте это письмо.С уважением,
Администрация {$config['home_url']}
HTML;
				$mail->send($row['user_email'], 'Изменение почтового адреса', $message);
				
				//Вставляем в БД код 1
				$db->query("INSERT INTO `".PREFIX."_restore` SET email = '{$email}', hash = '{$hash}', ip = '{$_IP}'");
				
				$salt = "abchefghjkmnpqrstuvwxyz0123456789";
				for($i = 0; $i < 15; $i++){
					$rand_lost .= $salt{rand(0, 33)};
				}
				$hash = md5($server_time.$row['user_email'].rand(0, 300000).$rand_lost);
						
				$message = <<<HTML
Вы получили это письмо, так как зарегистрированы на сайте
{$config['home_url']} и хотите изменить основной почтовый адрес.
Вы желаете изменить почтовый адрес с текущего ({$row['user_email']}) на {$email}
Для того чтобы Ваш основной e-mail на сайте {$config['home_url']} был
изменен, Вам необходимо пройти по ссылке:
{$config['home_url']}index.php?go=settings&code2={$hash}

Внимание: не забудьте, что после изменения почтового адреса при входе
на сайт Вам нужно будет указывать новый адрес электронной почты.

Если Вы не посылали запрос на изменение почтового адреса,
проигнорируйте это письмо.С уважением,
Администрация {$config['home_url']}
HTML;
				$mail->send($email, 'Изменение почтового адреса', $message);
				
				//Вставляем в БД код 2
				$db->query("INSERT INTO `".PREFIX."_restore` SET email = '{$email}', hash = '{$hash}', ip = '{$_IP}'");
			
			} else
				echo '1';
			
			exit;
			
		break;
		
		//################### Общие настройки ###################//
		default:

			$mobile_speedbar = 'Общие настройки';
			$row = $db->super_query("SELECT user_name, user_vk, user_lastname, user_email FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
$sqls = $db->super_query("SELECT user_id,browser,ip,date FROM `".PREFIX."_log_user` WHERE user_id='{$user_id}' ORDER BY date DESC LIMIT 1");
			
			if(date('Y-m-d', $sqls['date']) == date('Y-m-d', $server_time))
					$dateTell = langdate('сегодня в H:i', $sqls['date']);
				elseif(date('Y-m-d', $sqls['date']) == date('Y-m-d', ($server_time-84600)))
					$dateTell = langdate('вчера в H:i',$sqls['date']);
				else
					$dateTell = langdate('j F Y в H:i', $sqls['date']);
				if(stripos($sqls['browser'], 'Chrome') !== false){
					$browser = explode('Chrom', $sqls['browser']);
					$browser2 = explode(' ', 'Chrom'.str_replace('/', ' ', $browser[1]));
					$browser[0] = $browser2[0].' '.$browser2[1];
				//Opera
				} elseif(stripos($sqls['browser'], 'Opera') !== false){
					$browser2 = explode('/', $sqls['browser']);
					$browser3 = end(explode('/', $sqls['browser']));
					$browser[0] = $browser2[0].' '.$browser3;
				//Firefox
				} elseif(stripos($sqls['browser'], 'Firefox') !== false){
					$browser3 = end(explode('/', $sqls['browser']));
					$browser[0] = 'Firefox '.$browser3;
				//Сафари
				} elseif(stripos($sqls['browser'], 'Safari') !== false){
					$browser3 = end(explode('Version/', $sqls['browser']));
					$browser4 = explode(' ', $browser3);
					$browser[0] = 'Safari '.$browser4[0];
				}
				
			 $row2 = $db->super_query("SELECT user_search_pref, user_name_active, time_yes, time_no FROM `".PREFIX."_users_name` WHERE user_id = '{$user_id}'");
 
				
			//Загружаем вверх
			$tpl->set('{ip}', $sqls['ip']);
			$tpl->set('{log-user}', $dateTell.' Браузер ('.$browser[0].')');
			$tpl->load_template('settings/general.tpl');
			$tpl->set('{name}', $row['user_name']);
			$tpl->set('{lastname}', $row['user_lastname']);
			$tpl->set('{id}', $user_id);
			
			//Привязка страницы VK
		if($row['user_vk']){
			$tpl->set('{statusvk}', 'Привязана');
			$tpl->set('{linkvk}', $row['user_vk']);
			$tpl->set('[yes-vk]', '');
			$tpl->set('[/yes-vk]', '');
			$tpl->set_block("'\\[no-vk\\](.*?)\\[/no-vk\\]'si","");
		} else {
			$tpl->set('{statusvk}', 'Не привязана');
			$tpl->set('{linkvk}', '');
			$tpl->set('[no-vk]', '');
			$tpl->set('[/no-vk]', '');		
			$tpl->set_block("'\\[yes-vk\\](.*?)\\[/yes-vk\\]'si","");
		}
			//Привязка E-mail
		if($row['user_email']){
			$tpl->set('[yes-mail]', '');
			$tpl->set('[/yes-mail]', '');
			$tpl->set_block("'\\[no-mail\\](.*?)\\[/no-mail\\]'si","");
		} else {
			$tpl->set('[no-mail]', '');
			$tpl->set('[/no-mail]', '');		
			$tpl->set_block("'\\[yes-mail\\](.*?)\\[/yes-mail\\]'si","");
		}
			
			//Завершении смены E-mail
			$tpl->set('{code-1}', 'no_display');
			$tpl->set('{code-2}', 'no_display');
			$tpl->set('{code-3}', 'no_display');
			
			$code1 = strip_data($_GET['code1']);
			$code2 = strip_data($_GET['code2']);
			
			if(strlen($code1) == 32){
				
				$code2 = '';
				
				$check_code1 = $db->super_query("SELECT email FROM `".PREFIX."_restore` WHERE hash = '{$code1}' AND ip = '{$_IP}'");

				if($check_code1['email']){
					
					$check_code2 = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_restore` WHERE hash != '{$code1}' AND email = '{$check_code1['email']}' AND ip = '{$_IP}'");
					
					if($check_code2['cnt'])
						$tpl->set('{code-1}', '');
					else {
						$tpl->set('{code-1}', 'no_display');
						$tpl->set('{code-3}', '');
						
						//Меняем
						$db->query("UPDATE `".PREFIX."_users` SET user_email = '{$check_code1['email']}' WHERE user_id = '{$user_id}'");							
						$row['user_email'] = $check_code1['email'];
							
					}
					
					$db->query("DELETE FROM `".PREFIX."_restore` WHERE hash = '{$code1}' AND ip = '{$_IP}'");
					
				}
			
			}
			
			if(strlen($code2) == 32){
			
				$check_code2 = $db->super_query("SELECT email FROM `".PREFIX."_restore` WHERE hash = '{$code2}' AND ip = '{$_IP}'");

				if($check_code2['email']){
				
					$check_code1 = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_restore` WHERE hash != '{$code2}' AND email = '{$check_code2['email']}' AND ip = '{$_IP}'");
					
					if($check_code1['cnt'])
						$tpl->set('{code-2}', '');
					else {
						$tpl->set('{code-2}', 'no_display');
						$tpl->set('{code-3}', '');
						
						//Меняем
						$db->query("UPDATE `".PREFIX."_users` SET user_email = '{$check_code2['email']}'  WHERE user_id = '{$user_id}'");						
						$row['user_email'] = $check_code2['email'];
						
					}
					
					$db->query("DELETE FROM `".PREFIX."_restore` WHERE hash = '{$code2}' AND ip = '{$_IP}'");
					
				}
			
			}
			
			//Email
			$substre = substr($row['user_email'], 0, 1);
			$epx1 = explode('@', $row['user_email']);
			$tpl->set('{email}', $substre.'*******@'.$epx1[1]);

			
						//################### Вывод уведомлений насчет подтверждения имени ###################//
			$tpl->set('{new_names}', $row2['user_search_pref']);
			if($row2['time_no'] >= $server_time){
				$tpl->set('{block_new_name}', '');
				$tpl->set('{block_new_name_2}', 'no_display');
				$tpl->set('{block_new_name_3}', 'no_display');
				$tpl->set('{block_but_1}', 'no_display');
				$tpl->set('{block_but_2}', '');
				$tpl->set('{date}', langdate('j F Y в H:i', $row2['time_no']));
			} elseif($row2['user_name_active'] == 2){
				$tpl->set('{block_new_name}', 'no_display');
				$tpl->set('{block_new_name_2}', '');
				$tpl->set('{block_new_name_3}', 'no_display');
				$tpl->set('{block_but_1}', 'no_display');
				$tpl->set('{block_but_2}', '');
			} elseif($row2['time_yes'] >= $server_time){
				$tpl->set('{block_new_name}', 'no_display');
				$tpl->set('{block_new_name_2}', 'no_display');
				$tpl->set('{block_new_name_3}', '');
				$tpl->set('{block_but_1}', 'no_display');
				$tpl->set('{block_but_2}', '');
				$tpl->set('{date}', langdate('j F Y в H:i', $row2['time_yes']));
			} else {
				$tpl->set('{block_new_name}', 'no_display');
				$tpl->set('{block_new_name_2}', 'no_display');
				$tpl->set('{block_new_name_3}', 'no_display');
				$tpl->set('{block_but_1}', '');
				$tpl->set('{block_but_2}', 'no_display');
			}
			
			
			
			$tpl->compile('info');
	}
	
	$tpl->clear();
	$db->free();
} else {
	$user_speedbar = $lang['no_infooo'];
	msgbox('', $lang['not_logged'], 'info');
}
?>