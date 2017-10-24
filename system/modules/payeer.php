<?php

if(!defined('MOZG'))
	die('Hacking attempt!');

if($ajax == 'yes')
	NoAjaxQuery();
		$user_id = $user_info['user_id'];
		$owner = $db->super_query("SELECT user_balance, user_id FROM `".PREFIX."_users` WHERE user_id='{$user_id}'");
		$balance = $owner['user_balance'];
		
		$tpl->load_template('payeer/index.html');
		
		$tpl->set('{alt_name}', $alt_name);
		$tpl->set('{title}', stripslashes($row['title']));
		$tpl->set('{text}', stripslashes($row['text']));
		$tpl->set('{shop_id}', ''); // SHOP ID
		$tpl->set('{m_sign}', ''); // SIGN
		$tpl->set('{user_id}', $user_info['user_id']);
		$tpl->set('{deskript}', "Покупка голосов в соц. сети на движке Vii-Engine");
		$tpl->set('{balance_user}', $balance);
		$tpl->compile('content');

			
		$owner = $db->super_query("SELECT user_balance, balance_rub FROM `".PREFIX."_users` WHERE user_id = '{$user_id}'");
			
			
	
			

	

?>