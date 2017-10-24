<?php
/* 
	Appointment: Подключение модулей
	File: mod.php 
*/
if(!defined('MOZG'))
	die('Hacking attempt!');

if(isset($_GET['go']))
	$go = htmlspecialchars(strip_tags(stripslashes(trim(urldecode(mysql_escape_string($_GET['go']))))));
else
	$go = "main";

$mozg_module = $go;

check_xss();

//FOR MOBILE VERSION 1.0
if($config['temp'] == 'mobile')
	$lang['online'] = '<img src="{theme}/images/monline.gif" />';
	
switch($go){
	
	   //Мисс сайта
	case "miss":
	$spBar = true;
		include ENGINE_DIR.'/modules/miss.php';
	break;
	
	//Регистрация
	case "register":
		include ENGINE_DIR.'/modules/register.php';
	break;
	
	 	//Новые подарки для Vii Engine by PaZiTiF
	case "new_gifts":
		include ENGINE_DIR.'/modules/new_gifts.php';
	break;
	
	//Видео альбомы
	case "albums_videos":
		include ENGINE_DIR.'/modules/videos_albums.php';
	break;
	
	//Сообщества -> Публичные страницы -> Свежие новости
	case "public_pages":
		include ENGINE_DIR.'/modules/public_pages.php';
	break;
	
	//Альбомы(моб версия)
        case "m_albums":
                $spBar = true;
                if($config['album_mod'] == 'yes')
                        include ENGINE_DIR.'/modules/m_albums.php';
                else {
                        $user_speedbar = 'Информация';
                        msgbox('', 'Сервис отключен.', 'info');
                }
        break;
	
	//Редактирование моей страницы(моб версия)
        case "m_editprofile":
                $spBar = true;
                include ENGINE_DIR.'/modules/m_editprofile.php';
        break;
	
	//Статистика страницы пользователя
    case "my_stats":
         include ENGINE_DIR.'/modules/my_stats.php';
    break;
	
	//Значок
    case "znachok":
         include ENGINE_DIR.'/modules/znachok.php';
    break;
	
	//Авторизация через ВКонтакте
    case "vklogin":
        include ENGINE_DIR.'/modules/vklogin.php';
    break;
	
	//Привязка страницы VK к сайту
	case "vkguard":
		include ENGINE_DIR.'/modules/vkguard.php';
	break;
	
	//Профиль пользователя
	case "profile":
		$spBar = true;
		include ENGINE_DIR.'/modules/profile.php';
	break;
	
	//Чат с диалогами
	case "im_chat":
		include ENGINE_DIR.'/modules/im_chat.php';
	break;
	
     //Альбомы
      case "groups_albums":
         include ENGINE_DIR.'/modules/albums_groups.php';
     break;
        
     case "photo_groups":
         include ENGINE_DIR.'/modules/photo_groups.php';
     break;
	
	//Чат
    case "chat":
       include ENGINE_DIR.'/modules/chat.php';
    break;
	
	//Пины
    case "pins":
        include ENGINE_DIR . '/modules/pins.php';
    break;
 
 	//Фон
	case "fon":
		include ENGINE_DIR.'/modules/fon.php';
	break;
	
	//Редактирование моей страницы
	case "editprofile":
		$spBar = true;
		include ENGINE_DIR.'/modules/editprofile.php';
	break;
	
		// Подключение обработчика платежка
	case "handle_payeer":
		include ENGINE_DIR.'/modules/handle_payeer.php';
	break;
	// Подключение шаблона  платежка
	case "payeer":
	$spBar = true;
		include ENGINE_DIR.'/modules/payeer.php';
	break;
	
	//Загрузка городов
	case "loadcity":
		include ENGINE_DIR.'/modules/loadcity.php';
	break;
	
	//Альбомы
	case "albums":
		$spBar = true;
		if($config['album_mod'] == 'yes')
			include ENGINE_DIR.'/modules/albums.php';
		else {
			$user_speedbar = 'Информация';
			msgbox('', 'Сервис отключен.', 'info');
		}
	break;
	
	//Просмотр фотографии
	case "photo":
		include ENGINE_DIR.'/modules/photo.php';
	break;
	
	//Друзья
	case "friends":
		$spBar = true;
		include ENGINE_DIR.'/modules/friends.php';
	break;
	
	//Закладки
	case "fave":
		$spBar = true;
		include ENGINE_DIR.'/modules/fave.php';
	break;
	
	//Сообщения
	case "messages":
		$spBar = true;
		include ENGINE_DIR.'/modules/messages.php';
	break;
	
	//Диалоги
	case "im":
		include ENGINE_DIR.'/modules/im.php';
	break;

	//Заметки
	case "notes":
		$spBar = true;
		include ENGINE_DIR.'/modules/notes.php';
	break;
	
	//Подписки
	case "subscriptions":
		include ENGINE_DIR.'/modules/subscriptions.php';
	break;
	
	//Видео
	case "videos":
		$spBar = true;
		if($config['video_mod'] == 'yes')
			include ENGINE_DIR.'/modules/videos.php';
		else {
			$user_speedbar = 'Информация';
			msgbox('', 'Сервис отключен.', 'info');
		}
	break;
	
	//Поиск
	case "search":
		include ENGINE_DIR.'/modules/search.php';
	break;
	
	//Стена
	case "wall":
		$spBar = true;
		include ENGINE_DIR.'/modules/wall.php';
	break;
	
	//Статус
	case "status":
		include ENGINE_DIR.'/modules/status.php';
	break;
	
	//Новости
	case "news":
		$spBar = true;
		include ENGINE_DIR.'/modules/news.php';
	break;
	
	//Настройки
	case "settings":
		include ENGINE_DIR.'/modules/settings.php';
	break;
	
	//Помощь
	case "support":
		include ENGINE_DIR.'/modules/support.php';
	break;
	
	//Воостановление доступа
	case "restore":
		include ENGINE_DIR.'/modules/restore.php';
	break;
	
	//Загрузка картинок при прикриплении файлов со стены, заметок, или сообщений
	case "attach":
		include ENGINE_DIR.'/modules/attach.php';
	break;
	
	//Блог сайта
	case "blog":
		$spBar = true;
		include ENGINE_DIR.'/modules/blog.php';
	break;

	//Баланс
	case "balance":
		include ENGINE_DIR.'/modules/balance.php';
	break;
	
	//Подарки
	case "gifts":
		include ENGINE_DIR.'/modules/gifts.php';
	break;

	//Сообщества
	case "groups":
		include ENGINE_DIR.'/modules/groups.php';
	break;
	
	//Сообщества -> Публичные страницы
	case "public":
		$spBar = true;
		include ENGINE_DIR.'/modules/public.php';
	break;
	
	//Сообщества -> Загрузка фото
	case "attach_groups":
		include ENGINE_DIR.'/modules/attach_groups.php';
	break;

	//Музыка
	case "audio":
		if($config['audio_mod'] == 'yes')
			include ENGINE_DIR.'/modules/audio.php';
		else {
			$spBar = true;
			$user_speedbar = 'Информация';
			msgbox('', 'Сервис отключен.', 'info');
		}
	break;

	//Статические страницы
	case "static":
		include ENGINE_DIR.'/modules/static.php';
	break;

	//Выделить человека на фото
	case "distinguish":
		include ENGINE_DIR.'/modules/distinguish.php';
	break;

	//Скрываем блок Дни рожденья друзей
	case "happy_friends_block_hide":
		$_SESSION['happy_friends_block_hide'] = 1;
		die();
	break;

	//Скрываем блок Дни рожденья друзей
	case "fast_search":
		include ENGINE_DIR.'/modules/fast_search.php';
	break;

	//Жалобы
	case "report":
		include ENGINE_DIR.'/modules/report.php';
	break;

	//Отправка записи в сообщество или другу
	case "repost":
		include ENGINE_DIR.'/modules/repost.php';
	break;

	//Моментальные оповещания
	case "updates":
		include ENGINE_DIR.'/modules/updates.php';
	break;

	//Документы
	case "doc":
		include ENGINE_DIR.'/modules/doc.php';
	break;

	//Опросы
	case "votes":
		include ENGINE_DIR.'/modules/votes.php';
	break;
	
	//Сообщества -> Публичные страницы -> Аудиозаписи
	case "public_audio":
		include ENGINE_DIR.'/modules/public_audio.php';
	break;
	
	//Сообщества -> Публичные страницы -> Обсуждения
	case "groups_forum":
		include ENGINE_DIR.'/modules/groups_forum.php';
	break;
	
	//Комментарии к прикприпленным фото
	case "attach_comm":
		include ENGINE_DIR.'/modules/attach_comm.php';
	break;

	//Сообщества -> Публичные страницы -> Видеозаписи
	case "public_videos":
		include ENGINE_DIR.'/modules/public_videos.php';
	break;
	
	//Удаление страницы
	case "del_my_page":
		
		NoAjaxQuery();
		
		if($logged){
			
			$user_id = $user_info['user_id'];
			
			$uploaddir = ROOT_DIR.'/uploads/users/'.$user_id.'/';
			
			$row = $db->super_query("SELECT user_photo, user_wall_id FROM `".PREFIX."_users` WHERE user_id = '".$user_id."'");
			
			if($row['user_photo']){
			
				$check_wall_rec = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_wall` WHERE id = '".$row['user_wall_id']."'");
			
				if($check_wall_rec['cnt']){
			
					$update_wall = ", user_wall_num = user_wall_num-1";
					
					$db->query("DELETE FROM `".PREFIX."_wall` WHERE id = '".$row['user_wall_id']."'");
					$db->query("DELETE FROM `".PREFIX."_news` WHERE obj_id = '".$row['user_wall_id']."'");
								
				}
							
				$db->query("UPDATE `".PREFIX."_users` SET user_delet = 1, user_photo = '', user_wall_id = '' ".$update_wall." WHERE user_id = '".$user_id."'");

				@unlink($uploaddir.$row['user_photo']);
				@unlink($uploaddir.'50_'.$row['user_photo']);
				@unlink($uploaddir.'100_'.$row['user_photo']);
				@unlink($uploaddir.'o_'.$row['user_photo']);
				@unlink($uploaddir.'130_'.$row['user_photo']);
							
			} else
				$db->query("UPDATE `".PREFIX."_users` SET user_delet = 1, user_photo = '' WHERE user_id = '".$user_id."'");
							
			mozg_clear_cache_file('user_'.$user_id.'/profile_'.$user_id);
			
		}
		
		die();
		
	break;
	
// Гости
case "guests" :
include ENGINE_DIR . '/modules/guests.php';
break; 
	
	//Фоторедактор
	case "photo_editor":
		include ENGINE_DIR.'/modules/photo_editor.php';
	break;
	
	//Игры
	case "apps":
		include ENGINE_DIR.'/modules/apps.php';
	break;
	
	//Отзывы
	case "reviews":
		include ENGINE_DIR.'/modules/reviews.php';
	break;
	
	//Плеер
	case "audio_player":
		include ENGINE_DIR.'/modules/audio_player.php';
	break;
	
	//Рейтинг
	case "rating":
		include ENGINE_DIR.'/modules/rating.php';
	break;
	
	//Статистика сообществ
	case "stats_groups":
		include ENGINE_DIR.'/modules/stats_groups.php';
	break;
	
	//Выбор языка
	case "lang":
		include ENGINE_DIR.'/modules/lang.php';
	break;
	
		default:
			$spBar = true;
			
			if($go != 'main')
					msgbox('', $lang['no_str_bar'], 'info');
}

if(!$metatags['title'])
	$metatags['title'] = $config['home'];
	
if($user_speedbar) 
	$speedbar = $user_speedbar;
else 
	$speedbar = $lang['welcome'];

$headers = '<title>'.$metatags['title'].'</title>
<meta name="generator" content="Vii Engine" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
?>