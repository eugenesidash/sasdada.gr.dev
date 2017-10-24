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
	
//Добавление подарка
if(isset($_POST['save'])){
	$price = intval($_POST['price']);
	$title = textFilter($_POST['title']);
	$msg_gift = textFilter($_POST['msg_gift']);
	$cat = intval($_POST['cat']);
	
	//Разришенные форматы
	$allowed_files = array('png');

	//Получаем данные о фотографии
	$image_tmp = $_FILES['thumbnail']['tmp_name'];
	$image_name = totranslit($_FILES['thumbnail']['name']); // оригинальное название для оприделения формата
	$image_size = $_FILES['thumbnail']['size']; // размер файла
	$type = end(explode(".", $image_name)); // формат файла

	//Проверям если, формат верный то пропускаем
	if($price){
	  if(isset($title) AND !empty($title)){
	    if(isset($msg_gift) AND !empty($msg_gift)){
		  if(in_array(strtolower($type), $allowed_files)){
			if($image_size < 200000){
					$rand_name = $server_time;
					move_uploaded_file($image_tmp, ROOT_DIR.'/new_gifts/img/gifts/'.$rand_name.'.'.$type);
					$db->query("INSERT INTO `".PREFIX."_new_gifts_list` SET img = '".$rand_name."', price = '".$price."', cat = '".$cat."', title = '".$title."', msg_gift = '".$msg_gift."'");
					msgbox('Информация', 'Подарок успешно добавлен', '?mod=new_gifts');
			} else
				msgbox('Ошибка', 'Изображение подарка превышает допустимый размер 200 кб', 'javascript:history.go(-1)');
		  } else
			  msgbox('Ошибка', 'Неправильный формат', 'javascript:history.go(-1)');
	    } else
		      msgbox('Ошибка', 'Напишите описание подарка', 'javascript:history.go(-1)');
	   } else
		   msgbox('Ошибка', 'Напишите название подарка', 'javascript:history.go(-1)');
	} else
		msgbox('Ошибка', 'Укажите цену подарка', 'javascript:history.go(-1)');
	
	die();
}

//Редактирование подарка
if($_GET['act'] == 'edit'){	
    $id = intval($_GET['id']);

	//Сохраняем
	if(isset($_POST['saves'])){
	
	$price = intval($_POST['price']);
	$title = textFilter($_POST['title']);
	$msg_gift = textFilter($_POST['msg_gift']);
	$cat = intval($_POST['cat']);

	//Проверям если, формат верный то пропускаем
	if($price){
	  if(isset($title) AND !empty($title)){
	    if(isset($msg_gift) AND !empty($msg_gift)){
					$db->query("UPDATE `".PREFIX."_new_gifts_list` SET price = '".$price."', cat = '".$cat."', title = '".$title."', msg_gift = '".$msg_gift."' WHERE gid = '".$id."'");
					msgbox('Информация', 'Подарок успешно изменен', '?mod=new_gifts');
	    } else
		      msgbox('Ошибка', 'Напишите описание подарка', 'javascript:history.go(-1)');
	   } else
		   msgbox('Ошибка', 'Напишите название подарка', 'javascript:history.go(-1)');
	} else
		msgbox('Ошибка', 'Укажите цену подарка', 'javascript:history.go(-1)');

		exit();
		
	}
	
	echoheader();

	echohtmlstart('Редактирование подарка');
	
	$egift = $db->super_query("SELECT * FROM `".PREFIX."_new_gifts_list` WHERE gid = '".$id."'");
	
    $sql_cats = $db->super_query("SELECT id, name FROM `".PREFIX."_new_gifts_cat` ORDER by `name` DESC", 1);	
    foreach($sql_cats as $row_cats){
	    $cats .= '<option value="'.$row_cats['id'].'">'.$row_cats['name'].'</option>';		
    }
	
	$selsorlist = installationSelected($egift['cat'], $cats);
	
	echo <<<HTML
<style type="text/css" media="all">
.inpu{width:437px;}
textarea{width:430px;height:100px;}
</style>

<form action="" method="POST">

<div class="fllogall" style="width:180px">Цена:</div>
 <input type="text" name="price" class="inpu" style="width:300px" value="{$egift['price']}"/>
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">Название подарка:</div>
 <input type="text" name="title" class="inpu" style="width:300px" value="{$egift['title']}"/>
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">Описание подарка:</div>
 <textarea type="text" name="msg_gift" class="inpu" style="width:300px" />{$egift['msg_gift']}</textarea>
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">Категория:</div>
 <select name="cat" class="inpu" style="width:310px">
  <option value="0">Не выбрана</option>
  {$selsorlist}
 </select>
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">Изображение подарка:</div>
 <img src="/new_gifts/img/gifts/{$egift['img']}.png" style="max-width:96px;" /><br />
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">&nbsp;</div>
 <input type="submit" value="Сохранить" class="inp" name="saves" style="margin-top:0px" />
 <input type="submit" value="Назад" class="inp" style="margin-top:0px" onClick="history.go(-1); return false" />

</form>
HTML;

	echohtmlend();
	
	exit();
	
}

//Удаление подарка
if($_GET['act'] == 'del'){
	$id = intval($_GET['id']);
	$row = $db->super_query("SELECT img FROM `".PREFIX."_new_gifts_list` WHERE gid = '".$id."'");
	if($row){
		$db->query("DELETE FROM `".PREFIX."_new_gifts_list` WHERE gid = '".$id."'");
		@unlink(ROOT_DIR."/new_gifts/img/gifts/".$row['img'].'.png');
		header('Location: ?mod=new_gifts');
	}
}

//Добавление категории
if(isset($_POST['addcat'])){
	$name = textFilter($_POST['names']);
	
	//Получаем данные о фотографии
	$image_tmp = $_FILES['c_img']['tmp_name'];
	$image_name = totranslit($_FILES['c_img']['name']); // оригинальное название для оприделения формата
	$image_rename = substr(md5($server_time+rand(1,100000)), 0, 20); // имя файла
	$image_size = $_FILES['c_img']['size']; // размер файла
	$type = end(explode(".", $image_name)); // формат файла
	
	//Проверка названия категории
	if(isset($name) AND !empty($name)){			
			$res_type = strtolower('.'.$type);
			move_uploaded_file($image_tmp, ROOT_DIR.'/new_gifts/img/fon/'.$image_rename.'.'.$type);
			$db->query("INSERT INTO `".PREFIX."_new_gifts_cat` SET name = '{$name}', fon = '{$image_rename}{$res_type}'");				
			msgbox('Информация', 'Категория успешно создана', '?mod=new_gifts');			
	} else
		msgbox('Ошибка', 'Укажите название категории', 'javascript:history.go(-1)');
		
	exit();
}

//Редактирование категории
if($_GET['act'] == 'edit_cat'){	
    $id = intval($_GET['id']);
	
	//Сохраняем
	if(isset($_POST['save_cat'])){

	$cat_name = textFilter($_POST['cat_name']);

	//Проверям если, формат верный то пропускаем
	if(isset($cat_name) AND !empty($cat_name)){
					$db->query("UPDATE `".PREFIX."_new_gifts_cat` SET name = '".$cat_name."' WHERE id = '".$id."'");
					msgbox('Информация', 'Категория успешно изменена', '?mod=new_gifts');
	} else
		msgbox('Ошибка', 'Нельзя чтобы поле было пустым', 'javascript:history.go(-1)');

		exit();
		
	}
	
	echoheader();

	echohtmlstart('Редактирование категории');
	
    $cgift = $db->super_query("SELECT name FROM `".PREFIX."_new_gifts_cat` WHERE id = '".$id."'");
	
	echo <<<HTML
<style type="text/css" media="all">
.inpu{width:437px;}
textarea{width:430px;height:100px;}
</style>

<form action="" method="POST">

<div class="fllogall" style="width:180px">Название категории:</div>
 <input type="text" name="cat_name" class="inpu" style="width:300px" value="{$cgift['name']}"/>
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">&nbsp;</div>
 <input type="submit" value="Сохранить" class="inp" name="save_cat" style="margin-top:0px" />
 <input type="submit" value="Назад" class="inp" style="margin-top:0px" onClick="history.go(-1); return false" />

</form>
HTML;

	echohtmlend();
	
	exit();	
}

//Удаление категории
if($_GET['act'] == 'del_cat'){
	
	$id = intval($_GET['id']);
	
	$row = $db->super_query("SELECT fon FROM `".PREFIX."_new_gifts_cat` WHERE id = '".$id."'");
	if($row){
		$db->query("DELETE FROM `".PREFIX."_new_gifts_cat` WHERE id = '".$id."'");
		@unlink(ROOT_DIR."/new_gifts/img/gifts/c_fon/".$row['fon']);
		header('Location: ?mod=new_gifts');
	}
	
	exit();
	
}

//Сохраняем
if(isset($_POST['savesfree'])){

$free1 = intval($_POST['free1']);
$free2 = intval($_POST['free2']);
$free3 = intval($_POST['free3']);

//Проверям если, все верно то пропускаем
if($free1){
	if($free2){
	    if($free3){
				$db->query("UPDATE `".PREFIX."_new_gifts_free` SET giftfree1 = '".$free1."', giftfree2 = '".$free2."', giftfree3 = '".$free3."'");
				msgbox('Информация', 'Цены пакетов подарков изменены', '?mod=new_gifts');
	    } else
		    msgbox('Ошибка', 'Не указана цены 3-го пакета', 'javascript:history.go(-1)');
	} else
		msgbox('Ошибка', 'Не указана цены 2-го пакета', 'javascript:history.go(-1)');
} else
	msgbox('Ошибка', 'Не указана цены 1-го пакета', 'javascript:history.go(-1)');

exit();
}

echoheader();

//Выводим список загруженных подарков
if($_GET['page'] > 0) $page = intval($_GET['page']); else $page = 1;
$gcount = 5;
$limit_page = ($page-1)*$gcount;

$numRows = $db->super_query("SELECT COUNT(*) AS cnt FROM `".PREFIX."_new_gifts_list`");

$sql_ = $db->super_query("SELECT * FROM `".PREFIX."_new_gifts_list` ORDER by `gid` DESC LIMIT {$limit_page}, {$gcount}", 1);

foreach($sql_ as $row){
$catsg = $db->super_query("SELECT name FROM `".PREFIX."_new_gifts_cat` WHERE id = '".$row['cat']."'");

if($catsg['name']){
   $catal = "{$catsg['name']}";
}else{
   $catal = "Не выбрано";
}

	$gifts .= <<<HTML
<div style="float:left;width:100%;min-height:105px;line-height:17px;color:#777">
<img src="/new_gifts/img/gifts/{$row['img']}.png" style="float:left;margin-right:10px;background:#f0f0f0" width="96" height="96" />
<div style="margin-top:5px"></div>
<div style="float:right"><a href="?mod=new_gifts&act=edit&id={$row['gid']}"><b>Изменить подарок</b></a></div>
<div>Цена: &nbsp;<b>{$row['price']}</b> баллов</div>
<div style="float:right"><a href="?mod=new_gifts&act=del&id={$row['gid']}"><b>Удалить подарок</b></a></div>
<div>Название подарка: &nbsp;<b>{$row['title']}</b></div>
<div>Описание подарка: &nbsp;<b>{$row['msg_gift']}</b></div>
<div>Категория: &nbsp;<b>{$catal}</b></div>
</div><div class="mgcler"></div>
HTML;
}

echohtmlstart('Добавление подарка');

//Присвоение категории подарку
$sql_catss = $db->super_query("SELECT id, name FROM `".PREFIX."_new_gifts_cat` ORDER by `name` DESC", 1);	
foreach($sql_catss as $row_catss){
	$catss .= '<option value="'.$row_catss['id'].'">'.$row_catss['name'].'</option>';	
}	
$sellist = installationSelected('', $catss);
			
echo <<<HTML
<style type="text/css" media="all">
.inpu{width:50px;}
textarea{width:450px;height:50px;resize:none}
</style>

<form action="" enctype="multipart/form-data" method="POST">

<input type="hidden" name="mod" value="notes" />

<div class="fllogall" style="width:180px">Цена:</div>
 <input type="text" name="price" class="inpu" style="width:300px"/>
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">Название подарка:</div>
 <input type="text" name="title" class="inpu" style="width:300px" />
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">Описание подарка:</div>
 <textarea type="text" name="msg_gift" class="inpu" style="width:300px" /></textarea>
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">Категория:</div>
 <select name="cat" class="inpu" style="width:310px">
  <option value="0">Не выбрана</option>
  {$sellist}
 </select>
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">Изображение подарка .PNG, 96x96:</div>
 <input type="file" name="thumbnail" class="inpu" style="width:300px" />
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">&nbsp;</div>
 <input type="submit" value="Добавить подарок" class="inp" name="save" style="margin-top:0px" />
</form>
HTML;

echohtmlstart('Добавление новой категории');

echo <<<HTML
<form action="" enctype="multipart/form-data" method="POST">

<div class="fllogall" style="width:180px">Название категории:</div>
<input type="text" class="inpu" style="width:300px;margin-bottom:10px" name="names" />
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">Фон категории:</div>
 <input type="file" name="c_img" class="inpu" style="width:300px" />  <font color="red">Не обязательно</font>
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">&nbsp;</div>
<input type="submit" class="inp" style="margin-top:0px" name="addcat" value="Добавить категорию" />
</form>
HTML;

echohtmlstart('Изменение цены пакетов подарков');
$giftfrees = $db->super_query("SELECT giftfree1, giftfree2, giftfree3 FROM `".PREFIX."_new_gifts_free`");
echo <<<HTML
<form action="" enctype="multipart/form-data" method="POST">

<div class="fllogall" style="width:180px">Цена 1-го пакета (за 100 штук):</div>
<input type="text" class="inpu" style="width:300px;margin-bottom:10px" name="free1" value="{$giftfrees['giftfree1']}" />
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">Цена 2-го пакета (за 700 штук):</div>
 <input type="text" name="free2" class="inpu" style="width:300px" value="{$giftfrees['giftfree2']}"/>
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">Цена 3-го пакета (за 3000 штук):</div>
 <input type="text" name="free3" class="inpu" style="width:300px" value="{$giftfrees['giftfree3']}"/>
<div class="mgcler"></div>

<div class="fllogall" style="width:180px">&nbsp;</div>
<input type="submit" class="inp" style="margin-top:0px" name="savesfree" value="Изменить цену" />
</form>
HTML;

//Выводим категории
$sql_cats = $db->super_query("SELECT id, name FROM `".PREFIX."_new_gifts_cat` ORDER by `name` DESC", 1);
$i = 0;
foreach($sql_cats as $row_cats){
	
	$i++;
	
	$cats .= '<b>'.$i.'. '.$row_cats['name'].'</b>&nbsp;&nbsp;[ <a href="?mod=new_gifts&act=edit_cat&id='.$row_cats['id'].'">изменить</a> | <a href="?mod=new_gifts&act=del_cat&id='.$row_cats['id'].'">удалить</a> ]<br />';
	
}

echohtmlstart('Категории');

echo '<div style="margin-bottom:20px">'.$cats.'</div>';

echohtmlstart('Список подарков ('.$numRows['cnt'].')');

echo <<<HTML
{$gifts}
<div class="clr"></div>
HTML;

$query_string = preg_replace("/&page=[0-9]+/i", '', $_SERVER['QUERY_STRING']);
echo navigation($gcount, $numRows['cnt'], '?'.$query_string.'&page=');

echohtmlend();
?>