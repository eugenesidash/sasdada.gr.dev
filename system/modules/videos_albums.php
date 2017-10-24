<?php
/*  
	Appointment: Видео -> Видеоальбомы
	File: videos_albums.php 
	Author: 9797 
	Engine: Vii Engine
	Copyright: TT"By-By" (с) 2014
	Данный код незащищен авторскими правами)
*/
if(!defined('MOZG'))
	die('Not Found');

if($ajax == 'yes')
	NoAjaxQuery();
	
if(!$logged) header('Location: /');

$user_id = $user_info['user_id'];
$act = $_GET['act'];

	
switch($act){



	case "new":
		NoAjaxQuery();
		$tpl->load_template('videos_albums/new.tpl');
		$tpl->compile('content');
		AjaxTpl();
		die();
	break;
	
	case "load_pins":
		NoAjaxQuery();
		
		$image_tmp = $_FILES['uploadfile']['tmp_name'];
		$image_name = totranslit($_FILES['uploadfile']['name']);
		$image_rename = substr(md5($server_time+rand(1,100000)), 0, 20);
		$image_size = $_FILES['uploadfile']['size'];
		$type = end(explode(".", $image_name));
		
		$max_size = 1024 * 5000;
		
		if($image_size <= $max_size){
			$allowed_files = explode(', ', 'jpg, jpeg, jpe, png, gif');
			if(in_array(strtolower($type), $allowed_files)){
				$res_type = strtolower('.'.$type);	
				$upDir = ROOT_DIR.'/uploads/videos/albums/'.$user_id.'/';
				
				if(!is_dir($upDir)){ 
					@mkdir($upDir, 0777);
					@chmod($upDir, 0777);
				}
				
				$rImg = $upDir.$image_rename.$res_type;
				
				if(move_uploaded_file($image_tmp, $rImg)){
				
					include_once ENGINE_DIR.'/classes/images.php';
					
					$tmb = new thumbnail($rImg);
					$tmb->size_auto(600);
					$tmb->jpeg_quality(95);
					$tmb->save($upDir.'o_'.$image_rename.$res_type);
					
					$tmb = new thumbnail($rImg);
					$tmb->size_auto(200, 1);
					$tmb->jpeg_quality(97);
					$tmb->save($rImg);
					
					die($user_id.'|'.$image_rename.$res_type);
				}
			}
		}else
			die('size');
	
		die();
	break;
	
	case "create":
		NoAjaxQuery();
		
		$descr = ajax_utf8(textFilter($_POST['descr'], 300000));
		$file = textFilter($_POST['file']);
		if(!$file) die();
		$db->query("INSERT INTO `".PREFIX."_videos_albums` (uid, descr, photo) VALUES ('{$user_id}', '{$descr}', '{$file}')");
		$db->query("UPDATE `".PREFIX."_users` SET user_videos_albums_num=user_videos_albums_num+1 WHERE user_id='{$user_id}'");
		die();
	break;
	

		case "del":
			NoAjaxQuery();
			$del = $db->super_query("SELECT uid FROM `".PREFIX."_videos_albums` WHERE  uid = '{$get_user_id}'");

			if($row['uid'] != $user_id || !$row['uid']){
				$id = intval($_POST['id']);
				$db->query("DELETE FROM `".PREFIX."_videos_albums` WHERE id = '{$id}'");
				$db->query("UPDATE `".PREFIX."_users` SET user_videos_albums_num=user_videos_albums_num-1 WHERE user_id='{$user_id}'");
			}
			die();
		break;
		
		
		

		case "editsave":
			NoAjaxQuery();
			
			$id = intval($_POST['id']);
			$descr = ajax_utf8(textFilter($_POST['descr'], false, true));
			$strLn = strlen($descr);
			if($strLn > 50)
				$descr = substr($descr, 0, 50);
			
			$row = $db->super_query("SELECT uid, descr FROM `".PREFIX."_videos_albums` WHERE id = '{$id}'");
			
			if($row['uid'] == $user_id AND isset($descr) AND !empty($descr)){

				$db->query("UPDATE `".PREFIX."_videos_albums`SET descr = '{$descr}' WHERE id = '{$id}'");
			
				
			}
			
			exit;
		break;
		
		  
		case "load_photo":
			NoAjaxQuery();
			$tpl->set('{id}', intval($_GET['id']));
			$tpl->load_template('/videos_albums/load_photo.tpl');
			$tpl->compile('content');
			AjaxTpl();
			die();
		break;

	
		case "uploadimg":
			NoAjaxQuery();

			include ENGINE_DIR.'/classes/images.php';

			$id = intval($_GET['id']);

			$uploaddir = ROOT_DIR.'/uploads/videos/albums/';
			
			
			if(!is_dir($uploaddir.$id)){ 
				@mkdir($uploaddir.$id, 0777 );
				@chmod($uploaddir.$id, 0777 );
			}
		
			$allowed_files = array('jpg', 'png', 'gif');

			
			$image_tmp = $_FILES['uploadfile']['tmp_name'];
			$image_name = totranslit($_FILES['uploadfile']['name']); 
			$image_rename = substr(md5($server_time+rand(1,100000)), 0, 15); 
			$image_size = $_FILES['uploadfile']['size']; 
			$type = end(explode(".", $image_name)); 
			if(in_array($type, $allowed_files)){
				if($image_size < 5000000){
					$res_type = '.'.$type;
					$uploaddir = ROOT_DIR.'/uploads/videos/albums/'.$user_id.'/'; 
					if(move_uploaded_file($image_tmp, $uploaddir.$image_rename.$res_type)) {
					
					
						$tmb = new thumbnail($uploaddir.$image_rename.$res_type);
						$tmb->jpeg_quality(97);
						$tmb->save($uploaddir.'o_'.$image_rename.$res_type);

						
						$res_type = $db->safesql($res_type);

						$db->query("UPDATE `".PREFIX."_videos_albums` SET `photo`='{$image_rename}{$res_type}' WHERE `id`='{$id}'");
						echo $config['home_url'].'uploads/videos/albums/'.$user_id.'/'.$image_rename.$res_type;

					} else
						echo 'bad';
				} else
					echo 'big_size';
			} else
				echo 'bad_format';

		break;

	
		case "edit":
			NoAjaxQuery();
			$vid = intval($_POST['vid']);
				$get_user_id = intval($_GET['get_user_id']);
			if(!$get_user_id)
			$get_user_id = $user_id;
  
	
			
			$sql_albums = $db->super_query("SELECT id, photo, descr, videos_num FROM `".PREFIX."_videos_albums` WHERE uid = '{$get_user_id}' ORDER BY RAND() ", 1);
			$row_albums = $db->super_query("SELECT  id, photo, descr, videos_num FROM `".PREFIX."_videos_albums` WHERE uid = '{$get_user_id}' ");
			if($vid){
				$row = $db->super_query("SELECT title, descr, privacy FROM `".PREFIX."_videos` WHERE id = '{$vid}' AND owner_user_id = '{$user_id}'");
				if($row){
					$tpl->load_template('videos_albums/editpage.tpl');
					foreach($sql_albums as $row_albums){
			$options .= '<option value="'.$row_albums['id'].'">'.$row_albums['descr'].'</option>';
		}
		$tpl->set('{category}', $options);

					$tpl->compile('content');
					AjaxTpl();
				}
			}
			die();
		break;
		

		
		

		case "addsave":
			NoAjaxQuery();
			$vid = intval($_POST['vid']);
			$id = intval($_POST['id']);
				$get_user_id = intval($_GET['get_user_id']);
			if(!$get_user_id)
			$get_user_id = $user_id;
			$sql_albums = $db->super_query("SELECT id, photo, descr, videos_num FROM `".PREFIX."_videos_albums` WHERE uid = '{$get_user_id}' ORDER BY RAND() LIMIT 6", 1);
			$row_albums = $db->super_query("SELECT  id, photo, descr, videos_num FROM `".PREFIX."_videos_albums` WHERE uid = '{$get_user_id}' ");
		
			if($vid){
			
			

							
									
				
				$albums = intval($_POST['albums']);
				

				
				$row = $db->super_query("SELECT owner_user_id FROM `".PREFIX."_videos` WHERE id = '{$vid}'");
				if($row['owner_user_id'] == $user_id){
					$db->query("UPDATE `".PREFIX."_videos` SET  albums = '{$albums}' WHERe id = '{$vid}'");
$db->query("UPDATE `".PREFIX."_videos_albums` SET videos_num=videos_num+1 WHERE id= '{$albums}' ");
					echo stripslashes($albums);
					
				}
			}
			
			die();
		break;
	

		case "delsave":
			NoAjaxQuery();
			$vid = intval($_POST['vid']);
				$get_user_id = intval($_GET['get_user_id']);
			if(!$get_user_id)
			$get_user_id = $user_id;
			
			if($vid){
				
				$albums = intval($_POST['albums']);
				

		
				$row = $db->super_query("SELECT albums, owner_user_id FROM `".PREFIX."_videos` WHERE id = '{$vid}'");
				if($row['owner_user_id'] == $user_id){
				$db->query("UPDATE `".PREFIX."_videos` SET  albums = '0' WHERe id = '{$vid}'");
                $db->query("UPDATE `".PREFIX."_videos_albums` SET videos_num=videos_num-1 WHERE id= '{$row['albums']}' ");

					echo stripslashes($albums);
					
				}
			}
			die();
		break;
	
	case "all":
	$tpl->load_template('videos_albums/head.tpl');
	$get_user_id = intval($_GET['get_user_id']);
			if(!$get_user_id)
			$get_user_id = $user_id;
						$noalbums = $db->super_query("SELECT user_videos_albums_num FROM `".PREFIX."_users` WHERE user_id = '{$get_user_id}'");
										$owner = $db->super_query("SELECT user_videos_num, user_search_pref FROM `".PREFIX."_users` WHERE user_id = '{$get_user_id}'");
			$row = $db->super_query("SELECT  user_videos_albums_num FROM `".PREFIX."_users` ");

$name_info = explode(' ', $owner['user_search_pref']);
						$tpl->set('{user-id}', $get_user_id);
							

			 
						$tpl->set('{name}', gramatikName($name_info[0]));
						$tpl->set('{albums-num}', $cnt.' '.gram_record($cnt,'albums'));
						$cnt = $noalbums['user_videos_albums_num'];
            $tpl->set('{albums-num}', $cnt.' '.gram_record($cnt,'albums'));
						if($get_user_id == $user_id){
							$tpl->set('[owner]', '');
							$tpl->set('[/owner]', '');
							$tpl->set_block("'\\[not-owner\\](.*?)\\[/not-owner\\]'si","");
						} else {
							$tpl->set('[not-owner]', '');
							$tpl->set('[/not-owner]', '');
							$tpl->set_block("'\\[owner\\](.*?)\\[/owner\\]'si","");
						}
						
						if($config['video_mod_add'] == 'yes'){
							$tpl->set('[admin-video-add]', '');
							$tpl->set('[/admin-video-add]', '');
						} else
							$tpl->set_block("'\\[admin-video-add\\](.*?)\\[/admin-video-add\\]'si","");
			
			
						$tpl->compile('info');

						$tpl->load_template('videos_albums/all_albums.tpl');
						$metatags['title'] = 'Все видеоальбомы';
   $get_user_id = intval($_GET['get_user_id']);
			if(!$get_user_id)
			$get_user_id = $user_id;
			
			$sql_albums = $db->super_query("SELECT id, photo, descr, videos_num  FROM `".PREFIX."_videos_albums` WHERE  uid = '{$get_user_id}' ORDER by `id` ", 1);
			$row_albums = $db->super_query("SELECT  id, photo, descr, videos_num FROM `".PREFIX."_videos_albums` ");

	if($sql_albums){
				foreach($sql_albums as $row_albums){
				
				$tpl->set('{photo}', $row_albums['photo']);
								
								$tpl->set('{get_user_id}', $get_user_id);
								$tpl->set('{id}', $row_albums['id']);
								$tpl->set('{videos-num}', $row_albums['videos_num']);
								if($row_albums['descr'])
									$tpl->set('{descr}', stripslashes($row_albums['descr']).'...');
								else
									$tpl->set('{descr}', '');
						
		
				
		
						
						
						
						if($get_user_id == $user_id){
							$tpl->set('[owner]', '');
							$tpl->set('[/owner]', '');
							$tpl->set_block("'\\[not-owner\\](.*?)\\[/not-owner\\]'si","");
						} else {
							$tpl->set('[not-owner]', '');
							$tpl->set('[/not-owner]', '');
							$tpl->set_block("'\\[owner\\](.*?)\\[/owner\\]'si","");
						}
						
						if($config['video_mod_add'] == 'yes'){
							$tpl->set('[admin-video-add]', '');
							$tpl->set('[/admin-video-add]', '');
						} else
							$tpl->set_block("'\\[admin-video-add\\](.*?)\\[/admin-video-add\\]'si","");
			
						$tpl->compile('content');
		}
			} else {
						
		$tpl->load_template('videos_albums/no_albums.tpl');
	
						if($user_info['user_id'] == $uid){
							$tpl->set('[owner]', '');
							$tpl->set('[/owner]', '');
							$tpl->set_block("'\\[not-owner\\](.*?)\\[/not-owner\\]'si","");
						} else {
							$tpl->set('[not-owner]', '');
							$tpl->set('[/not-owner]', '');
							$tpl->set_block("'\\[owner\\](.*?)\\[/owner\\]'si","");
						}
						$tpl->compile('content');
					}
						
					
		
		
	break;
	
	
	
	
	case "all_videos":
	$tpl->load_template('videos_albums/head.tpl');
	
	$get_user_id = intval($_GET['get_user_id']);
			if(!$get_user_id)
			$get_user_id = $user_id;
						$noalbums = $db->super_query("SELECT user_videos_albums_num FROM `".PREFIX."_users` WHERE user_id = '{$get_user_id}'");
										$owner = $db->super_query("SELECT user_videos_num, user_search_pref FROM `".PREFIX."_users` WHERE user_id = '{$get_user_id}'");
			$row = $db->super_query("SELECT  user_videos_albums_num FROM `".PREFIX."_users` ");

$name_info = explode(' ', $owner['user_search_pref']);
						$tpl->set('{user-id}', $get_user_id);
							

			 
						$tpl->set('{name}', gramatikName($name_info[0]));
						$tpl->set('{albums-num}', $cnt.' '.gram_record($cnt,'albums'));
						$cnt = $noalbums['user_videos_albums_num'];
            $tpl->set('{albums-num}', $cnt.' '.gram_record($cnt,'albums'));
						if($get_user_id == $user_id){
							$tpl->set('[owner]', '');
							$tpl->set('[/owner]', '');
							$tpl->set_block("'\\[not-owner\\](.*?)\\[/not-owner\\]'si","");
						} else {
							$tpl->set('[not-owner]', '');
							$tpl->set('[/not-owner]', '');
							$tpl->set_block("'\\[owner\\](.*?)\\[/owner\\]'si","");
						}
						
						if($config['video_mod_add'] == 'yes'){
							$tpl->set('[admin-video-add]', '');
							$tpl->set('[/admin-video-add]', '');
						} else
							$tpl->set_block("'\\[admin-video-add\\](.*?)\\[/admin-video-add\\]'si","");
			
						$tpl->compile('info');

						
						
$tpl->load_template('videos_albums/all_videos.tpl');

    $get_user_id = intval($_GET['get_user_id']);
			if(!$get_user_id)
			$get_user_id = $user_id;
  
            $id = intval($_POST['id']);
 $id = intval($_GET['id']);
 $row_name = $db->super_query("SELECT  descr FROM `".PREFIX."_videos_albums` WHERE id = '{$id}' AND uid = '{$get_user_id}' ");
$metatags['title'] = ' '.$row_name['descr'].'';
			$sql_albums = $db->super_query("SELECT id, photo, add_date, title, comm_num, descr  FROM `".PREFIX."_videos` WHERE albums != '0' AND albums = '{$id}' AND owner_user_id = '{$get_user_id}' ORDER by `add_date` LIMIT 6", 1);
			$row = $db->super_query("SELECT  id, add_date, photo, title, comm_num, descr  FROM `".PREFIX."_videos` ");

	if($sql_albums){
				foreach($sql_albums as $row){
				
				$tpl->set('{photo}', stripslashes($row['photo']));
								$tpl->set('{title}', stripslashes($row['title']));
								$tpl->set('{user-id}', $get_user_id);
								$tpl->set('{id}', $row['id']);
								if($row['descr'])
									$tpl->set('{descr}', stripslashes($row['descr']).'...');
								else
									$tpl->set('{descr}', '');
							$tpl->set('{comm}', $row['comm_num'].' '.gram_record($row['comm_num'], 'comments'));
	megaDate(strtotime($row['add_date']));
		
				
		
						
						
						
						if($get_user_id == $user_id){
							$tpl->set('[owner]', '');
							$tpl->set('[/owner]', '');
							$tpl->set_block("'\\[not-owner\\](.*?)\\[/not-owner\\]'si","");
						} else {
							$tpl->set('[not-owner]', '');
							$tpl->set('[/not-owner]', '');
							$tpl->set_block("'\\[owner\\](.*?)\\[/owner\\]'si","");
						}
						
						if($config['video_mod_add'] == 'yes'){
							$tpl->set('[admin-video-add]', '');
							$tpl->set('[/admin-video-add]', '');
						} else
							$tpl->set_block("'\\[admin-video-add\\](.*?)\\[/admin-video-add\\]'si","");
			
			
						$tpl->compile('content');
						
		} 
							
					} else {
						
		$tpl->load_template('videos_albums/no_videos.tpl');
	
						if($user_info['user_id'] == $uid){
							$tpl->set('[owner]', '');
							$tpl->set('[/owner]', '');
							$tpl->set_block("'\\[not-owner\\](.*?)\\[/not-owner\\]'si","");
						} else {
							$tpl->set('[not-owner]', '');
							$tpl->set('[/not-owner]', '');
							$tpl->set_block("'\\[owner\\](.*?)\\[/owner\\]'si","");
						}
						$tpl->compile('content');
					}
		
		
		
	break;
		
		
}

?>