<?php
	$app_secret = 'K8DwiAJn8454euzrPgfs'; // Секретный код
	$app_id = '2747932'; // ID приложения
	$uid = $_GET['uid'];
	$hash = $_GET['hash'];
	$userid = $user_info['user_id'];

	// Если пустой ид пользователя или хеш, или проверка хеша не прошла - выбрасываем ошибку

	if(empty($hash) or empty($uid) or $hash!=md5($app_id.$uid.$app_secret)) {
	    die('Ошибка авторизации!');

	} else {    // Если всё прошло хорошо - начинаем привязку
      	
		$row = $db->super_query("SELECT user_vk FROM `".PREFIX."_users` WHERE user_id = '".$user_info['user_id']."'"); // Проверяем привязана ли страница
	
        if($row['user_vk'] == 0){

				$db->query("UPDATE LOW_PRIORITY `".PREFIX."_users` SET user_vk = '{$uid}' WHERE user_id = '{$userid}'");

				header('Location: /u'.$userid);
	} else {
				header('Location: /u'.$userid);
	}

	}
?>