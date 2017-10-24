<?php
//########################################################################################//
//  Наименование: Новые подарки для vii engine                                            //
//  Файл: new_gifts.php                                                                   //
//  Автор: PaZiTiF                                                                        //
//  Skype: legendar-boy                                                                   //
//  Icq: 44-63-662                                                                        //
//  Примечание*: Все изменения в файле вы делаете на свой страх и риск                    //
//########################################################################################//

/*******************************************************************************************
*   Закрываем прямой доступ к файлу.                                                       *
*******************************************************************************************/
if(!defined('MOZG'))
	die('Access denied!');

/*******************************************************************************************
*   Подключаем ajax для окон.                                                              *
*******************************************************************************************/
if($ajax == 'yes')
	NoAjaxQuery();
	
/*******************************************************************************************
*   Функция склонений слов по числу.                                                       *
*******************************************************************************************/	
function skGift($n,$s1,$s2,$s3, $b = false){
    $m = $n % 10; $j = $n % 100;
    if($b) $n = '<b>'.$n.'</b>';
    if($m==0 || $m>=5 || ($j>=10 && $j<=20)) return $n.' '.$s3;
    if($m>=2 && $m<=4) return  $n.' '.$s2;
    return $n.' '.$s1;
}

/*******************************************************************************************
*   Функция даты в формате День Месяц Год в Часов : Минут                                  *
*******************************************************************************************/
function giftDate($date, $full = true){
	global $server_time;
	
	if($full)
		return $date = langdate('j F Y в H:i', $date);
	else
		return $date = langdate('j M Y в H:i', $date);
}

/*******************************************************************************************
*   Контент окон.                                                                          *
*******************************************************************************************/
if($logged){
    if(isset($_GET['in'])){
	$in = $_GET['in'];
    }else{
	$in = "main";}
	$user_id = $user_info['user_id'];

	//################### Вывод всех подарков пользователя ###################//
	if($in == 'main'){
	$metatags['title'] = $lang['gifts'];
	$uid = intval($_GET['uid']);
			
	if($_GET['page'] > 0) $page = intval($_GET['page']); else $page = 1;
	$gcount = 10;
	$limit_page = ($page-1)*$gcount;
			
	$owner = $db->super_query("SELECT user_name, user_gifts FROM `".PREFIX."_users` WHERE user_id = '{$uid}'");
			
	$tpl->load_template('new_gifts/head.tpl');
	$tpl->set('{uid}', $uid);
	if($user_id == $uid){
		$tpl->set('[owner]', '');
		$tpl->set('[/owner]', '');
		$tpl->set_block("'\\[not-owner\\](.*?)\\[/not-owner\\]'si","");
	} else {
		$tpl->set('[not-owner]', '');
		$tpl->set('[/not-owner]', '');
		$tpl->set_block("'\\[owner\\](.*?)\\[/owner\\]'si","");
	}
	$tpl->set('{name}', gramatikName($owner['user_name']));
	$tpl->set('{gifts-num}', '<span id="num">'.$owner['user_gifts'].'</span> '.gram_record($owner['user_gifts'], 'gifts'));
	if($owner['user_gifts']){
		$tpl->set('[yes]', '');
		$tpl->set('[/yes]', '');
		$tpl->set_block("'\\[no\\](.*?)\\[/no\\]'si","");
	} else {
		$tpl->set('[no]', '');
		$tpl->set('[/no]', '');
		$tpl->set_block("'\\[yes\\](.*?)\\[/yes\\]'si","");
	}
			
	$tpl->compile('info');
	if($owner['user_gifts']){
		$sql_ = $db->super_query("SELECT tb1.gid, gift, from_uid, msg, gdate, anonim, tb2.user_search_pref, user_name, user_photo, user_last_visit, user_sex FROM `".PREFIX."_new_gifts` tb1, `".PREFIX."_users` tb2 WHERE tb1.uid = '{$uid}' AND tb1.from_uid = tb2.user_id {$sql_where} ORDER by `gdate` DESC LIMIT {$limit_page}, {$gcount}", 1);
		$tpl->load_template('new_gifts/gift.tpl');
		foreach($sql_ as $row){
			$gift_sql = $db->super_query("SELECT img, title, msg_gift FROM `".PREFIX."_new_gifts_list` WHERE gid = '{$row['gift']}'");
			$tpl->set('{id}', $row['gid']);
			$tpl->set('{uid}', $row['from_uid']);

			//Скрываем пользователя если подарок отправлен анонимно
			if($row['anonim'] == 1 AND $user_id == $uid){
				$tpl->set('{author}', 'Неизвестный отправитель');
				$tpl->set('[link]', '');
				$tpl->set('[/link]', '');
			} else {
				$tpl->set('{author}', $row['user_search_pref']);
				$tpl->set('{names}', gramatikName($row['user_name']));
				$link = '/u' . $row['from_uid'];
				$tpl->set('[link]', '<a href="'.$link.'" onClick="Page.Go(this.href); return false">');
				$tpl->set('[/link]', '</a>');
			}
			$tpl->set('[anonim]', '');
			$tpl->set('[/anonim]', '');
			if($row['anonim'] == 1 AND $user_id == $uid){
				$tpl->set_block("'\\[anonim\\](.*?)\\[/anonim\\]'si","");
			} else {			    
			}
			if($row['anonim'] == 1 AND $user_id == $uid)
				if($row['user_photo'])
					
					$tpl->set('{ava}', '{theme}/images/no_ava_50.png');
				else
					$tpl->set('{ava}', '{theme}/images/no_ava_50.png');
			    else
				    
					$tpl->set('{ava}', '/uploads/users/'.$row['from_uid'].'/50_'.$row['user_photo']);
			$tpl->set('{gift_img}', '/new_gifts/img/gifts/'.$gift_sql['img'].'.png');
			megaDate($row['gdate'], 1, 1);
			
			//Определение пола пользователя который отправил подарок
			if($row['anonim'] == 1 AND $user_id == $uid){
			    $tpl->set('{sex}', 'Подарил');
			}elseif($row['user_sex'] == 0){
				$tpl->set('{sex}', 'Подарил(а)');
			}elseif($row['user_sex'] == 1){
			    $tpl->set('{sex}', 'Подарил');
			}elseif($row['user_sex'] == 2){
			    $tpl->set('{sex}', 'Подарила');
			}
						
			if($row['msg'])
				$tpl->set('{msg}', '&laquo;'.stripslashes($row['msg']).'&raquo;');
					else
				$tpl->set('{msg}', '');
					
			$tpl->set('{title}', stripslashes($gift_sql['title']));
			$tpl->set('{msg_gift}', stripslashes($gift_sql['msg_gift']));
				
			//Показ скрытых текста только для владельца страницы
			if($user_id == $uid){
				$tpl->set('[user_page]', '');
				$tpl->set('[/user_page]', '');
				$tpl->set_block("'\\[not-user_page\\](.*?)\\[/not-user_page\\]'si","");
			} else {
				$tpl->set('[not-user_page]', '');
				$tpl->set('[/not-user_page]', '');
				$tpl->set_block("'\\[user_page\\](.*?)\\[/user_page\\]'si","");
			}
						
			if($sql_where)
				$db->query("UPDATE `".PREFIX."_new_gifts` SET status = 0 WHERE gid = '{$row['gid']}'");
						
			$tpl->compile('content');
			}
			navigation($gcount, $owner['user_gifts'], "/gifts{$uid}?page=");
				
		if($sql_where AND !$sql_)
		msgbox('', '<br /><br />Новых подарков еще нет.<br /><br /><br />', 'info_2');
		}
	}
	
	//################### Вывод всех подарков в окне при нажатии подарить подарок ###################//
	if($in == 'giftsList'){
		NoAjaxQuery();
		$for_user_id = intval($_POST['user_id']);
			
		$cat = intval($_POST['cat']);
		if($cat <= 0) $cat = 0;
		$checkCat = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_new_gifts_cat` WHERE id = '{$cat}'");
		if(!$checkCat['cnt']) $cat = 0;	
        
		//Вывод и проверка на то сколько осталось бесплатных подарков
		$gift_free = $db->super_query("SELECT giftfree_active, giftfree_count, giftfree_date FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
		
		$fgifts_date = giftDate($gift_free['giftfree_date']);
		
		$fgifts_c = skGift($gift_free['giftfree_count'], 'подарок', 'подарка', 'подарков');
		
		if($gift_free['giftfree_active'] == 1)
		    $fgifts = "У вас осталось <b>{$fgifts_c}</b>. Окончание действия пакета: <b>{$fgifts_date}</b>";
		else
			$fgifts = "Хотите дарить подарки бесплатно? — Есть решение! <span class=\"fl_r ibtn ibtn-border ibtn-big\" onclick=\"giftWindow.giftFree();\">Приобрести пакет</span>";		
			
		echo "<div class=\"giftPopupClass\"><div id=\"giftContent\"><div class=\"gift-window-subscribe-informer\" style=\"background: #e2bf43\">{$fgifts}</div>";		
						
		$user_ava = $db->super_query("SELECT user_photo FROM `".PREFIX."_users` WHERE user_id = '{$for_user_id}'");
			
		//Подгрузка аватара в js
		if($user_ava['user_photo']){
			$ava = '/uploads/users/'.$for_user_id.'/'.$user_ava['user_photo'];
		} else {
			$ava = '/templates/Default/images/no_ava.gif';
		}
			
		if($cat) $sql_where = "WHERE cat = '{$cat}'";
		else $sql_where = "";
			
		$sql_ = $db->super_query("SELECT gid, img, price, msg_gift FROM `".PREFIX."_new_gifts_list` {$sql_where} ORDER by `gid` DESC", 1);
		
	    //Список подарков для выбора
		foreach($sql_ as $gift){
		
		if($gift_free['giftfree_active'] == 1){
		    $gprice = '<strong>Бесплатно</strong>';
		}else{
			$gprice = skGift($gift['price'], 'балл', 'балла', 'баллов');			
		}
		
		echo "<div class=\"one_gift\" id=\"g{$gift['gid']}\" onClick=\"giftWindow.selectGift('{$gift['gid']}', '{$for_user_id}', '{$gprice}', '{$ava}', '{$gift['img']}'); return false\">
			  <em style=\"background: url(/new_gifts/img/gifts/{$gift['img']}.png) no-repeat scroll center center;width:96px;height:96px;\" class=\"gt\"></em>
			  <div class=\"viewInfo\" id=\"g{$gift['gid']}\">{$gprice}</div>
		      </div>";
		}
			
		echo '</div>';
			
		//Выводим список категорий
		$sql_cats = $db->super_query("SELECT id, name, fon FROM `".PREFIX."_new_gifts_cat` ORDER by `name` DESC", 1);
		
		echo '<div id="giftMenu"><table>';
		
        //Вывод категории со всеми подарками		
		if($cat == 0)
			echo '<tr><td onClick="giftWindow.giftsList(\''.$for_user_id.'\', 1); return false" class="item" ><span class="selector">Все подарки</span></td></tr>';
		else
			echo '<tr><td onClick="giftWindow.giftsList(\''.$for_user_id.'\', 1); return false" class="item" ><span>Все подарки</span></td></tr>';

		//Подгрузка фона для категорий	
		if($cat == 0)
			$cat_fon = '/new_gifts/img/bg_gift.png';
				
        foreach($sql_cats as $row_cats){
            if($cat == $row_cats['id']){
				
		    if($row_cats['fon'])
				$cat_fon = '/new_gifts/img/fon/'.$row_cats['fon'];
				else
				$cat_fon = '/new_gifts/img/bg_gift.png';
						
			}
	    }
		
        //Вывод созданных категорий		
		foreach($sql_cats as $row_cats){
				
			if($cat == $row_cats['id'])
				echo '<tr><td onClick="giftWindow.giftsList(\''.$for_user_id.'\', \'1\', \''.$row_cats['id'].'\'); return false" class="item" ><span class="selector">'.$row_cats['name'].'</span></td></tr>';
			else
			    echo '<tr><td onClick="giftWindow.giftsList(\''.$for_user_id.'\', \'1\', \''.$row_cats['id'].'\'); return false" class="item" ><span>'.$row_cats['name'].'</span></td></tr>';
				
		}
			
		echo '</table></div>';
			
		echo '</div>';
			
		echo '<style>#giftContent {background: url('.$cat_fon.') repeat scroll left top transparent;float: right;height: 454px;overflow-x: hidden !important;overflow-y: auto;padding: 0;width: 589px;}.box_footer{display:none}</style><div class=\"clear\"></div>';
			
		exit();
	}
	
	//################### Отправка подарка в БД ###################//
	if($in == 'sendGift'){
		NoAjaxQuery();
		$for_user_id = intval($_POST['for_user_id']);
		$gift = intval($_POST['gift']);
		$anonim = intval($_POST['anonim']);
		if($anonim < 0 OR $anonim > 1) $anonim = 0;
		$msg = ajax_utf8(textFilter($_POST['msg']));
		$gifts = $db->super_query("SELECT price, user_id FROM `".PREFIX."_new_gifts_list` WHERE gid = '".$gift."'");
				
		//Выводим текущий баланс свой
		$row = $db->super_query("SELECT user_balance, giftfree_active FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
		//Если куплен пакет то отправляем подарки бесплатно
		if($row['giftfree_active'] == 1){
				$db->query("INSERT INTO `".PREFIX."_new_gifts` SET uid = '{$for_user_id}', gift = '{$gift}', msg = '{$msg}', anonim = '{$anonim}', gdate = '{$server_time}', from_uid = '{$user_id}'");
				$db->query("UPDATE `".PREFIX."_users` SET giftfree_count = giftfree_count-1 WHERE user_id = '{$user_id}'");
				$db->query("UPDATE `".PREFIX."_users` SET user_gifts = user_gifts+1 WHERE user_id = '{$for_user_id}'");
					
				//Вставляем событие в моментальные оповещания
				$check2 = $db->super_query("SELECT user_last_visit FROM `".PREFIX."_users` WHERE user_id = '{$for_user_id}'");
					
				$update_time = $server_time - 70;
	
				if($check2['user_last_visit'] >= $update_time){
						
					if($anonim == 1){
							
						$user_info['user_photo'] = '';
						$user_info['user_search_pref'] = 'Неизвестный отправитель';
						$from_user_id = $for_user_id;
							
					} else
						$from_user_id = $user_id;
						
					$gift_sql = $db->super_query("SELECT img FROM `".PREFIX."_new_gifts_list` WHERE gid = '{$gift}'");
						
					$action_update_text = "<img src=\"/new_gifts/img/gifts/{$gift_sql['img']}.png\" width=\"50\" align=\"right\" />{$msg}";
						
					$db->query("INSERT INTO `".PREFIX."_updates` SET for_user_id = '{$for_user_id}', from_user_id = '{$from_user_id}', type = '7', date = '{$server_time}', text = '{$action_update_text}', user_photo = '{$user_info['user_photo']}', user_search_pref = '{$user_info['user_search_pref']}', lnk = '/gifts{$for_user_id}'");
									
					mozg_create_cache("user_{$for_user_id}/updates", 1);
									
				//ИНАЧЕ Добавляем +1 юзеру для оповещания
				} else {
					
					$cntCacheNews = mozg_cache("user_{$for_user_id}/new_gift");
					mozg_create_cache("user_{$for_user_id}/new_gift", ($cntCacheNews+1));
					
				}
					
				mozg_mass_clear_cache_file("user_{$for_user_id}/profile_{$for_user_id}|user_{$for_user_id}/gifts");

				//Отправка уведомления на E-mail
				if($config['news_mail_6'] == 'yes'){
					$rowUserEmail = $db->super_query("SELECT user_name, user_email FROM `".PREFIX."_users` WHERE user_id = '".$for_user_id."'");
					if($rowUserEmail['user_email'] AND $EMAIL_block_data['n_gifts']){
						include_once ENGINE_DIR.'/classes/mail.php';
						$mail = new dle_mail($config);
						$rowMyInfo = $db->super_query("SELECT user_search_pref FROM `".PREFIX."_users` WHERE user_id = '".$user_id."'");
						$rowEmailTpl = $db->super_query("SELECT text FROM `".PREFIX."_mail_tpl` WHERE id = '6'");
						$rowEmailTpl['text'] = str_replace('{%user%}', $rowUserEmail['user_name'], $rowEmailTpl['text']);
						$rowEmailTpl['text'] = str_replace('{%user-friend%}', $rowMyInfo['user_search_pref'], $rowEmailTpl['text']);
						$rowEmailTpl['text'] = str_replace('{%rec-link%}', $config['home_url'].'gifts'.$for_user_id, $rowEmailTpl['text']);
						$mail->send($rowUserEmail['user_email'], 'Вам отправили новый подарок', $rowEmailTpl['text']);
					}
				}		
		
		}else{
		
		//Если пакет не куплен то отправляем по той цене которую они стоят
		if($gifts['price'] AND $user_id != $for_user_id){
			if($row['user_balance'] >= $gifts['price']){
				$db->query("INSERT INTO `".PREFIX."_new_gifts` SET uid = '{$for_user_id}', gift = '{$gift}', msg = '{$msg}', anonim = '{$anonim}', gdate = '{$server_time}', from_uid = '{$user_id}'");
				$db->query("UPDATE `".PREFIX."_users` SET user_balance = user_balance-{$gifts['price']} WHERE user_id = '{$user_id}'");
				$db->query("UPDATE `".PREFIX."_users` SET user_gifts = user_gifts+1 WHERE user_id = '{$for_user_id}'");
					
				//Вставляем событие в моментальные оповещания
				$check2 = $db->super_query("SELECT user_last_visit FROM `".PREFIX."_users` WHERE user_id = '{$for_user_id}'");
					
				$update_time = $server_time - 70;
	
				if($check2['user_last_visit'] >= $update_time){
						
					if($anonim == 1){
							
						$user_info['user_photo'] = '';
						$user_info['user_search_pref'] = 'Неизвестный отправитель';
						$from_user_id = $for_user_id;
							
					} else
						$from_user_id = $user_id;
						
					$gift_sql = $db->super_query("SELECT img FROM `".PREFIX."_new_gifts_list` WHERE gid = '{$gift}'");
						
					$action_update_text = "<img src=\"/new_gifts/img/gifts/{$gift_sql['img']}.png\" width=\"50\" align=\"right\" />{$msg}";
						
					$db->query("INSERT INTO `".PREFIX."_updates` SET for_user_id = '{$for_user_id}', from_user_id = '{$from_user_id}', type = '7', date = '{$server_time}', text = '{$action_update_text}', user_photo = '{$user_info['user_photo']}', user_search_pref = '{$user_info['user_search_pref']}', lnk = '/gifts{$for_user_id}'");
									
					mozg_create_cache("user_{$for_user_id}/updates", 1);
									
				//ИНАЧЕ Добавляем +1 юзеру для оповещания
				} else {
					
					$cntCacheNews = mozg_cache("user_{$for_user_id}/new_gift");
					mozg_create_cache("user_{$for_user_id}/new_gift", ($cntCacheNews+1));
					
				}
					
				mozg_mass_clear_cache_file("user_{$for_user_id}/profile_{$for_user_id}|user_{$for_user_id}/gifts");

				//Отправка уведомления на E-mail
				if($config['news_mail_6'] == 'yes'){
					$rowUserEmail = $db->super_query("SELECT user_name, user_email FROM `".PREFIX."_users` WHERE user_id = '".$for_user_id."'");
					if($rowUserEmail['user_email'] AND $EMAIL_block_data['n_gifts']){
						include_once ENGINE_DIR.'/classes/mail.php';
						$mail = new dle_mail($config);
						$rowMyInfo = $db->super_query("SELECT user_search_pref FROM `".PREFIX."_users` WHERE user_id = '".$user_id."'");
						$rowEmailTpl = $db->super_query("SELECT text FROM `".PREFIX."_mail_tpl` WHERE id = '6'");
						$rowEmailTpl['text'] = str_replace('{%user%}', $rowUserEmail['user_name'], $rowEmailTpl['text']);
						$rowEmailTpl['text'] = str_replace('{%user-friend%}', $rowMyInfo['user_search_pref'], $rowEmailTpl['text']);
						$rowEmailTpl['text'] = str_replace('{%rec-link%}', $config['home_url'].'gifts'.$for_user_id, $rowEmailTpl['text']);
						$mail->send($rowUserEmail['user_email'], 'Вам отправили новый подарок', $rowEmailTpl['text']);
					}
				}	
	
			} else
				echo '1';
		}
		}
		exit();
	}
	
	//################### Удаление подарка ###################//
	if($in == 'delGift'){
		NoAjaxQuery();
		$gid = intval($_POST['gid']);
		$row = $db->super_query("SELECT uid FROM `".PREFIX."_new_gifts` WHERE gid = '{$gid}'");
		if($user_id == $row['uid']){
			$db->query("DELETE FROM `".PREFIX."_new_gifts` WHERE gid = '{$gid}'");
			$db->query("UPDATE `".PREFIX."_users` SET user_gifts = user_gifts-1 WHERE user_id = '{$user_id}'");
			mozg_mass_clear_cache_file("user_{$user_id}/profile_{$user_id}|user_{$user_id}/gifts");
		}
		exit();
	}
	
	//################### Окно покупки пакета бесплатных подарков ###################//
	if($in == 'giftFree'){
		NoAjaxQuery();
        $gift_free = $db->super_query("SELECT giftfree_active, giftfree_count, giftfree_date FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");		
		if($gift_free['giftfree_active'] == 1){
		msgbox('', '<div style="padding:30px">У вас уже есть пакет подарков</div>', 'info');
		}else{
		$tpl->load_template('gifts/gift_free.tpl');
		$tpl->set('{uid}', $user_id);
		$giftfrees = $db->super_query("SELECT giftfree1, giftfree2, giftfree3 FROM `".PREFIX."_new_gifts_free`");
		$tpl->set('{free1}', skGift($giftfrees['giftfree1'], 'Балл', 'Балла', 'Баллов'));
		$tpl->set('{free2}', skGift($giftfrees['giftfree2'], 'Балл', 'Балла', 'Баллов'));
		$tpl->set('{free3}', skGift($giftfrees['giftfree3'], 'Балл', 'Балла', 'Баллов'));
		}
		$tpl->compile('content');
		AjaxTpl();
	    exit;
	}
	
	//################### Покупка 1-го пакета, 100 подарков ###################//
	if($in == 'giftFree_1'){
		NoAjaxQuery();
		//Выводим текущий баланс свой
		$row = $db->super_query("SELECT user_balance FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
		$rows = $db->super_query("SELECT giftfree1 FROM `".PREFIX."_new_gifts_free`");
		
		$pricegift = $rows['giftfree1'];
		
	    //Если пакет не куплен то отправляем по той цене которую они стоят
		if($pricegift AND $user_id == $user_id){
			if($row['user_balance'] >= $pricegift){
			    $datatime = 1 ? $server_time + (1 * 60 * 60 * 24) : 0;
				$db->query("UPDATE `".PREFIX."_users` SET user_balance = user_balance-{$pricegift}, giftfree_active = '1', giftfree_count = '100', giftfree_date = '{$datatime}' WHERE user_id = '{$user_id}'");
			} else
				echo '1';
		}
	    exit;
	}
	
	//################### Покупка 2-го пакета, 700 подарков ###################//
	if($in == 'giftFree_2'){
		NoAjaxQuery();
		//Выводим текущий баланс свой
		$row = $db->super_query("SELECT user_balance FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
		
		$pricegift = '20';
		
	    //Если пакет не куплен то отправляем по той цене которую они стоят
		if($pricegift AND $user_id == $user_id){
			if($row['user_balance'] >= $pricegift){
			    $datatime = 7 ? $server_time + (7 * 60 * 60 * 24) : 0;
				$db->query("UPDATE `".PREFIX."_users` SET user_balance = user_balance-{$pricegift}, giftfree_active = '1', giftfree_count = '700', giftfree_date = '{$datatime}' WHERE user_id = '{$user_id}'");
			} else
				echo '1';
		}
	    exit;
	}
	
	//################### Покупка 3-го пакета, 3000 подарков ###################//
	if($in == 'giftFree_3'){
		NoAjaxQuery();
		$uid = intval($_POST['uid']);
		//Выводим текущий баланс свой
		$row = $db->super_query("SELECT user_balance FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
		
		$pricegift = '40';
		
	    //Если пакет не куплен то отправляем по той цене которую они стоят
		if($pricegift AND $user_id == $uid){
			if($row['user_balance'] >= $pricegift){
			    $datatime = 30 ? $server_time + (30 * 60 * 60 * 24) : 0;
				$db->query("UPDATE `".PREFIX."_users` SET user_balance = user_balance-{$pricegift}, giftfree_active = '1', giftfree_count = '3000', giftfree_date = '{$datatime}' WHERE user_id = '{$uid}'");
			} else
				echo '1';
		}
	    exit;
	}
	$tpl->clear();
	$db->free();
} else {
	$user_speedbar = $lang['no_infooo'];
	msgbox('', $lang['not_logged'], 'info');
}
?>
