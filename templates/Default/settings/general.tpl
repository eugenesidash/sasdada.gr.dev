<div class="search_form_tab" style="margin-top:-9px">
 <div class="buttonsprofile albumsbuttonsprofile buttonsprofileSecond" style="height:22px">
  <div class="buttonsprofileSec"><a href="/settings" onClick="Page.Go(this.href); return false;"><div><b>Общее</b></div></a></div>
  <a href="/settings/privacy" onClick="Page.Go(this.href); return false;"><div><b>Приватность</b></div></a>
  <a href="/settings/blacklist" onClick="Page.Go(this.href); return false;"><div><b>Черный список</b></div></a>

 </div>
</div>
<div class="err_yellow name_errors {code-1}" style="font-weight:normal;margin-top:25px">Код активации из письма с текущего почтового ящика принят. Осталось подтвердить код активации в письме, отправленном на новый почтовый ящик.</div>
<div class="err_yellow name_errors {code-2}" style="font-weight:normal;margin-top:25px">Код активации из письма с нового почтового ящика принят. Осталось подтвердить код активации в письме, отправленном на текущий почтовый ящик.</div>
<div class="err_yellow name_errors {code-3}" style="font-weight:normal;margin-top:25px">Адрес Вашей электронной почты был успешно изменен на новый.</div>

<div class="allbar_title">Перерасчет данных</div>
<div style="margin-bottom: 8px;color: #666666;text-align: centr;"><div class="item_info">Если количество ваших подписчиков, друзей или количество заявок отображается неверно, либо не отображается вообще, то используйте данную функцию.</div></div>
<div class="err_yellow no_display name_errors" id="ok_recheck" style="font-weight:normal;">Показатели <b>успешно</b> пересчитаны</div>
<div class="err_red no_display pass_errors" id="no_ok_recheck" style="font-weight:normal;">Ошибка в пересчете</div>
<div class="texta">&nbsp;</div>
<div class="button_div fl_l"><button onClick="settings.recheck(); return false" id="saverecheck">Пересчитать показатели</button></div>
<div class="mgclr"></div>

<div class="margin_top_10"></div><div class="allbar_title">Изменить пароль</div>
<div class="err_red no_display pass_errors" id="err_pass_1" style="font-weight:normal;">Пароль не изменён, так как прежний пароль введён неправильно.</div>
<div class="err_red no_display pass_errors" id="err_pass_2" style="font-weight:normal;">Пароль не изменён, так как новый пароль повторен неправильно.</div>
<div class="err_yellow no_display pass_errors" id="ok_pass" style="font-weight:normal;">Пароль успешно изменён.</div>
<div class="texta">Старый пароль:</div><input type="password" id="old_pass" class="inpst" maxlength="100" style="width:150px;" /><span id="validOldpass"></span><div class="mgclr"></div>
<div class="texta">Новый пароль:</div><input type="password" id="new_pass" class="inpst" maxlength="100" style="width:150px;" onMouseOver="myhtml.title('', 'Пароль должен быть не менее 6 символов в длину', 'new_pass')" /><span id="validNewpass"></span><div class="mgclr"></div>
<div class="texta">Повторите пароль:</div><input type="password" id="new_pass2" class="inpst" maxlength="100" style="width:150px;" onMouseOver="myhtml.title('', 'Введите еще раз новый пароль', 'new_pass2')" /><span id="validNewpass2"></span><div class="mgclr"></div>
<div class="texta">&nbsp;</div><div class="button_div fl_l"><button onClick="settings.saveNewPwd(); return false" id="saveNewPwd">Изменить пароль</button></div><div class="mgclr"></div>


	<div class="margin_top_10"></div><div class="allbar_title">Изменить имя</div>
	<style>
	.err_yellow{padding:11px; background:none repeat scroll 0 0 #F4EBBD; margin-bottom:10px; border:1px solid #D4BC4C; margin-top:10px;border-radius:5px 5px 5px 5px;}
    .err_not{ background:none repeat scroll 0 0 #F4F7FA;  border:1px solid #BFD2E4;  margin-bottom:10px;  padding:11px;border-radius:5px 5px 5px 5px;}
    .err_red{padding:10px;background:#faebeb;border:1px solid #ffc0cb;margin-bottom:10px;line-height:17px;border-radius:5px 5px 5px 5px;}
	.button_not{border:1px solid #b4b4b4;display:block;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px}
    .button_not button{background:#e5e5e5;color:#555;font-size:11px;font-family: Tahoma, Verdana, Arial, sans-serif, Lucida Sans;text-shadow:0px 1px 0px #fff;border:0px;border-top:1px solid #fff;padding:4px 15px 4px 15px;cursor:pointer;margin:0px;font-weight:bold;border-radius:2px;-moz-border-radius:2px;-webkit-border-radius:2px}
    </style>
    <div class="err_red no_display name_errors" id="err_name_1" style="font-weight:normal;">Специальные символы и пробелы запрещены.</div>
    <div class="err_red {block_new_name} name_errors" style="font-weight:normal;"><b>Заявка на смену имени была отклонена.</b><br>Ваше имя не было изменено администрацией, больше всего что имя не подходит правилам сайта... Проверьте правильность данных и попробуйте ещё раз.<br>Следующий раз вы сможете подать заявку: <b>{date}</b><br><br>Вы хотели сменить имя на: <b>{new_names}</b></div>
    <div class="err_yellow {block_new_name_2} name_errors" style="font-weight:normal;"><b>Заявка на смену имени была отправлена.</b><br>Ваше имя будет изменено после того как администрация рассмотрит вашу заявку...<br><br>Вы хотите сменить имя на: <b>{new_names}</b></div>
    <div class="err_yellow no_display name_errors" id="ok_name" style="font-weight:normal;"><b>Заявка на смену имени была отправлена.</b><br>Ваше имя будет изменено после того как администрация рассмотрит вашу заявку...</div>
    <div class="err_not {block_new_name_3} name_errors" style="font-weight:normal;"><b>Заявка на смену имени была принята.</b><br>Администрация одобрила вашу заявку на смену имени.<br>Следующий раз вы сможете сменить имя: <b>{date}</b><br><br>Ваше новое имя: <b>{new_names}</b></div>
    <div class="texta">Ваше имя:</div><input type="text" id="name" class="inpst" maxlength="100"  style="width:150px;" value="{name}" /><span id="validName"></span><div class="mgclr"></div>
    <div class="texta">Ваша фамилия:</div><input type="text" id="lastname" class="inpst" maxlength="100"  style="width:150px;" value="{lastname}" /><span id="validLastname"></span><div class="mgclr"></div>
    <div class="{block_but_1}" id="but_1"><div class="texta">&nbsp;</div><div class="button_div fl_l"><button onClick="settings.saveNewName(); return false" id="saveNewName">Изменить имя</button></div><div class="mgclr"></div></div>
    <div class="{block_but_2}" id="but_2"><div class="texta">&nbsp;</div><div class="button_not fl_l"><button>Изменить имя</button></div><div class="mgclr"></div></div>
	



<div class="allbar_title">Безопасность Вашей страницы</div>
<div class="texta">Последняя активность:</div>
<div style="margin:3px 0" class="fl_l" id="acts" onmouseover="myhtml.title('', 'IP последнего посещения {ip}', 'acts')">{log-user}</div>
<div class="mgclr"></div>
<div class="margin_top_10"></div>
<div class="margin_top_10"></div>
<div class="mgclr"></div>
<div class="texta">&nbsp;</div>
<div class="button_div fl_l">
<button onClick="settings.logs(); return false">Посмотреть историю активности</button>
</div>
<div class="mgclr"></div>
<div class="margin_top_10"></div><div class="allbar_title">Адрес Вашей электронной почты</div>
<div class="err_yellow name_errors no_display" id="ok_email" style="font-weight:normal;">На <b>оба</b> почтовых ящика придут письма с подтверждением.</div>
<div class="err_red no_display name_errors" id="err_email" style="font-weight:normal;">Неправильный email адрес</div>
<div class="texta">Текущий адрес:</div><div style="color:#555;margin-top:13px;margin-bottom:10px">{email}</div><div class="mgclr"></div>
<div class="texta">Новый адрес:</div><input type="text" id="email" class="inpst" maxlength="100" style="width:150px;" /><span id="validName"></span><div class="mgclr"></div>
<div class="texta">&nbsp;</div><div class="button_div fl_l"><button onClick="settings.savenewmail(); return false" id="saveNewEmail">Сохранить адрес</button></div><div class="mgclr"></div>

<div class="nSDelPg">Вы можете <a class="cursor_pointer" onClick="delMyPage()">удалить свою страницу</a>.</div>

<div class="margin_top_10"></div><div class="allbar_title">Профиль ВКонтакте</div>

<div class="texta2">Статус:</div><div style='margin-top:-13px;margin-left:50px'>{statusvk}</div><div class="mgclr"></div>
[yes-vk]<div class="texta2">Адрес страницы:</div><div style='margin-top:-13px;margin-left:100px'><a href="http://vk.com/id{linkvk}" target="_blank">http://vk.com/id{linkvk}</a></div><div class="mgclr"></div>[/yes-vk]
[no-vk]<div class="texta2">&nbsp;</div><a href="/settings/vkguard"><div class="button_div fl_l"><button><font color="#fff">Привязать страницу</font></button></div></a><div class="mgclr"></div><br>[/no-vk]
</div> 
