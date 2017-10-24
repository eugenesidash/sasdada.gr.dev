<?php
/*  
	Appointment: Сообщества -> Свежие новости
	File: Public_pages.php 
	Author: 9797 
	Engine: Vii Engine
	Copyright: TT"By-By" (с) 2014
	Данный код незащищен авторскими правами)
*/
if(!defined('MOZG'))
	die('Not Found');

if($logged){
	$act = $_GET['act'];
	$user_id = $user_info['user_id'];
	$metatags['title'] = 'Страницы Группы';

	switch($act){
	
		//################### Страница в БД ###################//
		case "new_send":
			NoAjaxQuery();
			  //Подключаем разметку
				include ENGINE_DIR.'/classes/marking.php';
				$parse = new parse();
			$public_id = intval($_POST['public_id']);
			$title = ajax_utf8(textFilter($_POST['title'], false, true));
				$text = $parse->BBparse(ajax_utf8($_POST['text']));

				
				
			$row = $db->super_query("SELECT ulist, pages FROM `".PREFIX."_communities` WHERE id = '{$public_id}'");
			
			if(stripos($row['ulist'], "|{$user_id}|") !== false AND $row['pages'] AND isset($title) AND !empty($title) AND isset($text) AND !empty($text)){
				
				//Вставляем страницу в БД
				$db->query("INSERT INTO `".PREFIX."_communities_pages` SET public_id = '{$public_id}', fuser_id = '{$user_id}', title = '{$title}', text = '{$text}', fdate = '{$server_time}', lastuser_id = '{$user_id}', lastdate = '{$server_time}'");
				$dbid = $db->insert_id();
				
				//Обновляем кол-во страниц в сообществе
				$db->query("UPDATE `".PREFIX."_communities` SET pages_num = pages_num+1 WHERE id = '{$public_id}'");
				
				mozg_clear_cache_file("public_pages/pages{$public_id}");
				
				echo $dbid;
			
			}
			
			exit();
		break;
		
		//################### Предварительный просмотр страницы ###################//
		case "preview":
			NoAjaxQuery();
			
			  //Подключаем разметку
			include ENGINE_DIR.'/classes/marking.php';
			$parse = new parse();

           $title = ajax_utf8(textFilter($_POST['title'], false, true));
				$text = $parse->BBparse(ajax_utf8($_POST['text']));
		
			if($text && $title){
				//Загружаем шаблон вывода полного просомтра страницы
				$tpl->load_template('public_pages/preview.tpl');
				$tpl->set('{title}', stripslashes(stripslashes($title)));
				$tpl->set('{full-text}', stripslashes(stripslashes($text)));
				$tpl->set('{name}', 'Вы');
				$tpl->set('{user-id}', $user_id);
				$tpl->set('{date}', langdate('j F Y в H:i', time()));
				$tpl->set('{comm-num}', $lang['note_no_comments']);
				$tpl->compile('content');
				AjaxTpl();
			}
			
			die();
		break;
		
	//################### Страница помощи по разметке ###################//
		case "help":
			
			$public_id = intval($_GET['public_id']);
			
			$row = $db->super_query("SELECT ulist, pages FROM `".PREFIX."_communities` WHERE id = '{$public_id}'");
			
			if(stripos($row['ulist'], "|{$user_id}|") !== false AND $row['pages']){
			
				$tpl->load_template('public_pages/help.tpl');
				$tpl->set('{id}', $public_id);
				$tpl->compile('content');
			
			} else
				msgbox('', '<br /><br />Ошибка доступа.<br /><br /><br />', 'info_2');
			
		break;
		
		
		
		
		//################### Страница создания новой страницы ###################//
		case "new":
			
			$public_id = intval($_GET['public_id']);
			
			$row = $db->super_query("SELECT ulist, pages FROM `".PREFIX."_communities` WHERE id = '{$public_id}'");
			
			if(stripos($row['ulist'], "|{$user_id}|") !== false AND $row['pages']){
			
				$tpl->load_template('public_pages/add_pages.tpl');
				$tpl->set('{id}', $public_id);
				$tpl->compile('content');
			
			} else
				msgbox('', '<br /><br />Ошибка доступа.<br /><br /><br />', 'info_2');
			
		break;
		

   
            
       
			
		
		//################### Сохранение отред. данных страницы ###################//
		case "saveedit":
			NoAjaxQuery();
			  //Подключаем разметку
			include ENGINE_DIR.'/classes/marking.php';
			$parse = new parse();

	
			
			$fid = intval($_POST['fid']);
				$text = $parse->BBparse(ajax_utf8($_POST['text']));
				
			
				
			
			
			$row = $db->super_query("SELECT fuser_id, public_id FROM `".PREFIX."_communities_pages` WHERE fid = '{$fid}'");
			$row2 = $db->super_query("SELECT admin, pages FROM `".PREFIX."_communities` WHERE id = '{$row['public_id']}'");
			
			if(stripos($row2['admin'], "id{$user_id}|") !== false)
				$public_admin = true;
			else
				$public_admin = false;
			
			if($user_info['user_group'] == 1 OR $public_admin OR $row['fuser_id'] == $user_id AND $row2['pages']){
			
				$db->query("UPDATE `".PREFIX."_communities_pages` SET text = '{$text}' WHERE fid = '{$fid}'");
				
				echo $text;
			
			}
			
			exit();
		break;
		
		//################### Сохранение отред. названия ###################//
		case "savetitle":
			NoAjaxQuery();
			
			$fid = intval($_POST['fid']);
			$title = ajax_utf8(textFilter($_POST['title'], false, true));
			
			$row = $db->super_query("SELECT fuser_id, public_id FROM `".PREFIX."_communities_pages` WHERE fid = '{$fid}'");
			$row2 = $db->super_query("SELECT admin, pages FROM `".PREFIX."_communities` WHERE id = '{$row['public_id']}'");
			
			if(stripos($row2['admin'], "id{$user_id}|") !== false AND $row2['pages'])
				$public_admin = true;
			else
				$public_admin = false;
			
			if($user_info['user_group'] == 1 OR $public_admin OR $row['fuser_id'] == $user_id){
			
				$db->query("UPDATE `".PREFIX."_communities_pages` SET title = '{$title}' WHERE fid = '{$fid}'");
				
				mozg_clear_cache_file("public_pages/pages{$row['public_id']}");

			}
			
			exit();
		break;
		
		//################### Сделать главной ###################//
		case "fix":
			NoAjaxQuery();
			
			$fid = intval($_POST['fid']);

			$row = $db->super_query("SELECT fuser_id, public_id, fixed FROM `".PREFIX."_communities_pages` WHERE fid = '{$fid}'");
			$row2 = $db->super_query("SELECT admin, pages FROM `".PREFIX."_communities` WHERE id = '{$row['public_id']}'");
			
			if(stripos($row2['admin'], "id{$user_id}|") !== false)
				$public_admin = true;
			else
				$public_admin = false;
			
			if($user_info['user_group'] == 1 OR $public_admin AND $row2['pages']){
				
				if(!$row['fixed']) $fixed = 1;
				else $fixed = 0;
				
				$db->query("UPDATE `".PREFIX."_communities_pages` SET fixed = '{$fixed}' WHERE fid = '{$fid}'");
				
				mozg_clear_cache_file("public_pages/pages{$row['public_id']}");

			}
			
			exit();
		break;
		
		
		
		//################### Уадаление темы ###################//
		case "del":
			NoAjaxQuery();
			
			$fid = intval($_POST['fid']);

			$row = $db->super_query("SELECT fuser_id, public_id, vote FROM `".PREFIX."_communities_pages` WHERE fid = '{$fid}'");
			$row2 = $db->super_query("SELECT admin, pages FROM `".PREFIX."_communities` WHERE id = '{$row['public_id']}'");
			
			if(stripos($row2['admin'], "id{$user_id}|") !== false)
				$public_admin = true;
			else
				$public_admin = false;
			
			if($user_info['user_group'] == 1 OR $public_admin OR $row['fuser_id'] == $user_id AND $row2['pages']){

				$db->query("UPDATE `".PREFIX."_communities` SET pages_num = pages_num-1 WHERE id = '{$row['public_id']}'");
				$db->query("DELETE FROM `".PREFIX."_communities_pages` WHERE fid = '{$fid}'");
				
				
				mozg_mass_clear_cache_file("public_pages/pages{$row['public_id']}");

			}
			
			exit();
		break;
		
		
		
		
		//################### Просмотр темы ###################//
		case "view":
			
			$public_id = intval($_GET['public_id']);
			$id = intval($_GET['id']);
			
			//Выводим данные о теме
			$row = $db->super_query("SELECT tb1.fid, fixed, title, text, status, fdate, fuser_id, public_id, tb2.user_search_pref, user_photo, user_last_visit FROM `".PREFIX."_communities_pages` tb1, `".PREFIX."_users` tb2 WHERE tb1.fid = '{$id}' AND tb1.fuser_id = tb2.user_id");
			
			//Выводим данные о сообществе
			$row2 = $db->super_query("SELECT admin, pages FROM `".PREFIX."_communities` WHERE id = '{$row['public_id']}'");
				
			if($row AND $row2['pages']){

				if(stripos($row2['admin'], "id{$user_id}|") !== false)
					$public_admin = true;
				else
					$public_admin = false;
					
				
				
				
				$tpl->load_template('public_pages/view.tpl');
             //Подключаем разметку
			include ENGINE_DIR.'/classes/marking.php';
			$parse = new parse();
				$tpl->set('{id}', $public_id);
				$tpl->set('{fid}', $row['fid']);
				$tpl->set('{title}', stripslashes($row['title']));
                $tpl->set('{edit-text}', $parse->BBdecode(stripslashes(myBrRn($row['text']))));
				

					
					
				$tpl->set('{text}', stripslashes($row['text']));
				
				$tpl->set('{name}', $row['user_search_pref']);
				$tpl->set('{user-id}', $row['fuser_id']);
				$tpl->set('{my-uid}', $user_id);
				
				OnlineTpl($row['user_last_visit']);
				megaDate($row['fdate']);
				if($row['user_photo'])
					$tpl->set('{ava}', "/uploads/users/{$row['fuser_id']}/50_{$row['user_photo']}");
				else
					$tpl->set('{ava}', '/images/no_ava_50.png');
					
				if($user_info['user_photo'])
					$tpl->set('{my-ava}', "/uploads/users/{$user_id}/50_{$user_info['user_photo']}");
				else
					$tpl->set('{my-ava}', '/images/no_ava_50.png');
				
				
				
				//FIXED
				if($row['fixed']) $tpl->set('{fix-text}', 'Не делать главной');
				else $tpl->set('{fix-text}', 'Сделать главной');
				
				
				
				//ADMIN
				if($public_admin OR $user_info['user_group'] == 1){
				
					$tpl->set('[admin]', '');
					$tpl->set('[/admin]', '');
					
				} else
					$tpl->set_block("'\\[admin\\](.*?)\\[/admin\\]'si","");
				
				//ADMIN 2
				if($user_info['user_group'] == 1 OR $public_admin OR $row['fuser_id'] == $user_id){
				
					$tpl->set('[admin-2]', '');
					$tpl->set('[/admin-2]', '');
					
				} else
					$tpl->set_block("'\\[admin-2\\](.*?)\\[/admin-2\\]'si","");

				
			
				$tpl->compile('content');

			} else
				msgbox('', '<br /><br />Страница не найдена.<br /><br /><br />', 'info_2');

		break;
		
		//################### Вывод всех страниц в сообществе ###################//
		default:
			
			//Если вызвана pages.Page()
			if($_POST['a'])
				NoAjaxQuery();

			$public_id = intval($_GET['public_id']);
			
			$row = $db->super_query("SELECT pages_num, pages, ulist FROM `".PREFIX."_communities` WHERE id = '{$public_id}'");
			
			if($row['pages']){
			
				//Верхушка
				if(!$_POST['a']){
					$tpl->load_template('public_pages/head.tpl');
					$tpl->set('{id}', $public_id);
					if(!$row['pages_num']) $row['pages_num'] = '';
					$tpl->set('{pages-num}', $row['pages_num']);
					$pages_num = $row['pages_num'];
					
					//Проверка подписан юзер или нет
					if(stripos($row['ulist'], "|{$user_id}|") !== false)
						$tpl->set('{yes}', 'no_display');
					else
						$tpl->set('{no}', 'no_display');
					
					$tpl->compile('info');
				}
				
				//SQL запрос на вывод
				$limit = 20;
				$page_post = intval($_POST['page']);
				if($page_post > 0)
					$page = $page_post*$limit;
				else
					$page = 0;
				
				$sql_ = $db->super_query("SELECT SQL_CALC_FOUND_ROWS fid, title, lastuser_id, lastdate, status, fixed FROM `".PREFIX."_communities_pages` WHERE public_id = '{$public_id}' ORDER by `fixed` DESC, `lastdate` DESC, `fdate` DESC LIMIT {$page}, {$limit}", 1);
				
				if($sql_){
				
					$tpl->load_template('public_pages/contents.tpl');
					foreach($sql_ as $row){
						
						$row_last_user = $db->super_query("SELECT user_search_pref FROM `".PREFIX."_users` WHERE user_id = '{$row['lastuser_id']}'");
						$last_userX = explode(' ', $row_last_user['user_search_pref']);
						$row_last_user['user_search_pref'] = gramatikName($last_userX[0]).' '.gramatikName($last_userX[1]);
						
						$tpl->set('{name}', $row_last_user['user_search_pref']);
						$tpl->set('{title}', stripslashes($row['title']));
						$tpl->set('{fid}', $row['fid']);
						$tpl->set('{user-id}', $row['lastuser_id']);
						$tpl->set('{pid}', $public_id);
						
						//STATUS
						if($row['status'] AND $row['fixed']) $tpl->set('{status}', 'Главная страница и закрыта');
						else if($row['status']) $tpl->set('{status}', 'Страница закрыта');
						else if($row['fixed']) $tpl->set('{status}', 'Главная страница');
						else $tpl->set('{status}', '');
						
						megaDate($row['lastdate']);
						
						$tpl->compile('content');
						
					}
				
				} else
					if(!$_POST['a'])
						msgbox('', '<br /><br />В сообществе ещё нет страниц.<br /><br /><br />', 'info_2');
				
				//Низ
				if(!$_POST['a'] AND $pages_num > 20){
					$tpl->load_template('public_pages/bottom.tpl');
					$tpl->set('{id}', $public_id);
					if(!$row['pages_num']) $row['pages_num'] = '';
					$tpl->set('{pages-num}', $row['pages_num']);
					$tpl->compile('content');
				}
				
				
				if($_POST['a']){
					
					AjaxTpl();
					exit();
					
				}
			
			} else
				if(!$_POST['a'])
					msgbox('', '<br /><br />Ошибка доступа.<br /><br /><br />', 'info_2');

	}
	
	$tpl->clear();
	$db->free();
	
} else {
	$user_speedbar = $lang['no_infooo'];
	msgbox('', $lang['not_logged'], 'info');
}
?>