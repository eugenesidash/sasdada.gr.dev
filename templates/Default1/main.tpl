<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<style type="text/css" media="all">html, body{font-family:tahoma, arial, verdana, sans-serif, Lucida Sans;background: url('{fon_facemy}') no-repeat center top fixed;margin:0px;padding:0px;font-size:11px;overflow-x:hidden;-moz-background-size:cover;-o-background-size:100% auto;-webkit-background-size:100% auto;-khtml-background-size:cover;background-size:cover;}</style>
<head>
{header}
<noscript><meta http-equiv="refresh" content="0; URL=/badbrowser.php"></noscript>
<script type="text/javascript" src="/templates/Default/js/rating.js"></script>
<noscript><meta http-equiv="refresh" content="0; URL=/badbrowser.php"></noscript>
<link media="screen" href="{theme}/style/style.css" type="text/css" rel="stylesheet" /> 
 <link media="screen" href="{theme}/style/nprogress.css" type="text/css" rel="stylesheet" />
<link media="screen" href="{theme}/im_chat/im_chat.css" type="text/css" rel="stylesheet" />
{js}[not-logged]<script type="text/javascript" src="{theme}/js/reg.js"></script>[/not-logged]
[logged]<link media="screen" href="/new_gifts/new_gifts.css" type="text/css" rel="stylesheet" /><script type="text/javascript" src="/new_gifts/new_gifts.js"></script>[/logged]
<script type="text/javascript" src="{theme}/js/fon.js"></script>
<script type="text/javascript" src="{theme}/js/chat.js"></script>
<script type="text/javascript" src="{theme}/js/nprogress.js"></script>
<link rel="shortcut icon" href="{theme}/images/fav.png" />
</head>
<body onResize="onBodyResize()" class="no_display">
<div id="doLoad"></div>

<div class="scroll_fix_bg no_display" onMouseDown="myhtml.scrollTop()"><div class="scroll_fix_page_top">Наверх</div></div>
<div class="head" [not-logged]style="height:45px"[/not-logged]>
 <div class="autowrs">
 
 

 
 
 
  [logged]<a class="udinsMy" href="/news{news-link}" onClick="Page.Go(this.href); return false;" id="news_link"><span id="new_news">{new-news}</span></a>[/logged]
  [not-logged]<a href="/" class="udinsMy" style="margin-left:5px;margin-top: 4px;"></a>[/not-logged]
  [logged]<div class="headmenu">
   <!--search-->
   <div id="seNewB">
    <input type="text" value="Поиск" class="fave_input search_input" 
		onBlur="if(this.value==''){this.value='Поиск';this.style.color = '#c1cad0';}" 
		onFocus="if(this.value=='Поиск'){this.value='';this.style.color = '#000'}" 
		onKeyPress="if(event.keyCode == 13) gSearch.go();"
		onKeyUp="FSE.Txt()"
		onClick="if(this.value != 0) $('.fast_search_bg').show()"
	id="query" maxlength="65" />
	<div id="search_types">
	 <input type="hidden" value="1" id="se_type" />
	 <div class="search_type" id="search_selected_text" onClick="gSearch.open_types('#sel_types'); return false">по людям</div>
	 <div class="search_alltype_sel no_display" id="sel_types">
	  <div id="1" onClick="gSearch.select_type(this.id, 'по людям'); FSE.GoSe($('#query').val()); return false" class="search_type_selected">по людям</div>
	  <div id="2" onClick="gSearch.select_type(this.id, 'по видеозаписям'); FSE.GoSe($('#query').val()); return false">по видеозаписям</div>
	  <div id="3" onClick="gSearch.select_type(this.id, 'по заметкам');  FSE.GoSe($('#query').val()); return false">по заметкам</div>
	  <div id="4" onClick="gSearch.select_type(this.id, 'по сообществам'); FSE.GoSe($('#query').val()); return false">по сообществам</div>
	  <div id="5" onClick="gSearch.select_type(this.id, 'по аудиозаписям');  FSE.GoSe($('#query').val()); return false">по аудиозаписям</div>
	 </div>
	</div>
   <div class="fast_search_bg no_display" id="fast_search_bg">
   <a href="/" style="padding:12px;background:#eef3f5" onClick="gSearch.go(); return false" onMouseOver="FSE.ClrHovered(this.id)" id="all_fast_res_clr1"><text>Искать</text> <b id="fast_search_txt"></b><div class="fl_r fast_search_ic"></div></a>
   <span id="reFastSearch"></span>
   </div>
   </div>
   <!--/search-->
   <div class="newHling">
    <a class="cursor_pointer" onclick="logout.box()">выйти</a>
<a class="cursor_pointer" onClick="pogoda.box()">погода</a>
<a href="/tv" onClick="Page.Go(this.href); return false">TV</a>

	<div style="position:absolute;width:95px;text-align:center;margin-top:38px;margin-left:365px;">
<div class="staticpl_prev" onclick="player.prev()"></div>
  <div class="staticpl_play" onclick="player.onePlay()"></div>
  <div class="staticpl_pause" onclick="player.pause()"></div>
  <div class="staticpl_next" onclick="player.next()"></div></br>
	</div>
	<a href="/audio" onClick="doLoad.js(0); player.open(); return false;" id="fplayer_pos">музыка</a>
    <a href="/?go=search&type=2" onClick="Page.Go(this.href); return false">видео</a>
    <a href="/?go=search&type=4" onClick="Page.Go(this.href); return false">сообщества</a>
    <a href="/?go=search&online=1" onClick="Page.Go(this.href); return false">люди</a>	
   </div>
  </div>[/logged]
 </div>
 <div class="clear"></div>
</div>
<div style="height:40px;background:#6A9DD1;padding-bottom:65px;"></div>
<div class="clear"></div>

<div id="globalContainer">
<div id="content">

[logged]
<div id="leftCol">
<div style="background:rgba(228, 228, 240, 0.82);border:1px solid #CFD6E2;padding:10px;margin: 0 15px 5px 5px;"><a href="/news{news-link}" onClick="Page.Go(this.href); return false;" id="news_link">Новости друзей<span id="new_news">{new-news}</span></a></div>
<div class="navLeft">
<ul>

<li class="li_nav"><a href="{my-page-link}" onclick="Page.Go(this.href); return false;" id="myhome"><span class="left_label inl_bl">Моя Страница</span></a></li>
<li class="li_nav"><a href="/messages" onclick="Page.Go(this.href); return false;"><span class="left_label inl_bl">Мои Сообщения <div class="fl_r" id="new_msg">{msg}</div></span></a></li>
<li class="li_nav"><a href="/friends" onclick="Page.Go(this.href); return false;" id="requests_link"><span class="left_label inl_bl">Мои Друзья <div class="fl_r" id="new_requests">{demands}</div></span></a></li>
<li class="li_nav"><a href="/albums/{my-id}" onclick="Page.Go(this.href); return false;" id="requests_link_new_photos"><span class="left_label inl_bl">Мои Альбомы <div class="fl_r" id="new_photos">{new_photos}</div></span></a></li>
<li class="li_nav"><a href="/fave" onclick="Page.Go(this.href); return false;"><span class="left_label inl_bl">Мои Закладки</span></a></li>
<li class="li_nav"><a href="/videos" onclick="Page.Go(this.href); return false;"><span class="left_label inl_bl">Мои Видео</span></a></li>
<li class="li_nav"><a href="/audio" onClick="doLoad.js(0); player.open(); return false;"><span class="left_label inl_bl">Моя Музыка</span></a></li>
<li class="li_nav" style="display:none"><a href="/apps" onclick="Page.Go(this.href); return false;"><span class="left_label inl_bl">Мои Apps</span></a></li>
<li class="li_nav"><a href="/groups" onclick="Page.Go(this.href); return false;"><span class="left_label inl_bl">Мои Группы</span></a></li>
<li class="li_nav"><a href="/news" onclick="Page.Go(this.href); return false;" id="news_link"><span class="left_label inl_bl">Моя Лента</span></a></li>
<li class="li_nav"><a href="/notes" onclick="Page.Go(this.href); return false;"><span class="left_label inl_bl">Мои Заметки</span></a></li>
<li class="li_nav"><a href="/youtubevideo" onclick="Page.Go(this.href); return false;"><span class="left_label inl_bl">YouTube видео</span></a></li>
<li class="li_nav"><a href="/game" onclick="Page.Go(this.href); return false;"><span class="left_label inl_bl">Игры</span></a></li>
<div class="more_div"></div>
<li class="li_nav"><a href="/balance" onClick="Page.Go(this.href); return false"><span class="left_label inl_bl">Мой Баланс</span></a></li>
<li class="li_nav"><a href="/support" onClick="Page.Go(this.href); return false"><span class="left_label inl_bl">Поддержка<span class="fl_r" id="new_support">{new-support}{supports-owner}</span></span></a></li>
</ul>
</div>



<div style="margin-left:5px;margin-top: 20px;position: absolute;text-align: center;">
<div id="ads">
<a href="balance?act=invite">
<b>А Вы знаете?</b>
</a>
<div class="profile_top_sep"></div>
<div class="rec2">
Что можете зарабатывать голоса,
<a href="balance?act=invite">приглашая</a>
сюда друзей?
</div>
</div>
</div>



</div>
[/logged]

 [not-logged]<div id="leftCol" style="padding-top:30px;"><div class="navLeft">
 <div class="leftpanel">
  <form method="POST" action="">
   <div class="flLg">Электронный адрес</div><input type="text" name="email" id="log_email" class="inplog" maxlength="50" />
   <div class="flLg">Пароль</div><input type="password" name="password" id="log_password" class="inplog" maxlength="50" />
   <div class="logpos">
    <div class="button_div"><button name="log_in" id="login_but" style="width:138px">Войти</button></div>
	<div style="margin-top:5px"><a href="/restore" onClick="Page.Go(this.href); return false">Не можете войти?</a></div>
   </div>
  </form>
 </div></div></div>[/not-logged]

<div id="rightPageContent">
<div class="speedbar [speedbar]no_display[/speedbar]" id="speedbar">{speedbar}</div>
<div id="audioPlayer"></div>
<div class="pages" id="page">{info}{content}</div>
  </div>
 <div class="clear"></div>
</div>

  <div class="footer">
   [logged]<a href="/?go=search&online=1" onClick="Page.Go(this.href); return false">люди</a>
   <a href="/?go=search&type=4" onClick="Page.Go(this.href); return false">сообщества</a>
   <a href="/?go=search&type=5" onClick="Page.Go(this.href); return false">музыка</a>
   <a href="/?go=search&type=2" onClick="Page.Go(this.href); return false">видео</a>
   <a href="/support?act=new" onClick="Page.Go(this.href); return false">помощь</a>
   <a href="/blog" onClick="Page.Go(this.href); return false">блог</a><br /><br />[/logged]
   <small>V-11 © 2013 <a href="/">Серёга Сикора</a></small><br/><br/>
  </div>

</div>

[logged]<script type="text/javascript">
function upClose(xnid){
	$('#event'+xnid).remove();
	$('#updates').css('height', $('.update_box').size()*123+'px');
}
function GoPage(event, p){
	var oi = (event.target) ? event.target.id: ((event.srcElement) ? event.srcElement.id : null);
	if(oi == 'no_ev' || oi == 'update_close' || oi == 'update_close2') return false;
	else {
		pattern = new RegExp(/photo[0-9]/i);
		pattern2 = new RegExp(/video[0-9]/i);
		if(pattern.test(p))
			Photo.Show(p);
		else if(pattern2.test(p)){
			vid = p.replace('/video', '');
			vid = vid.split('_');
			videos.show(vid[1], p, location.href);
		} else
			Page.Go(p);
	}
}
$(document).ready(function(){
	setInterval(function(){
		$.post('/index.php?go=updates', function(d){
			row = d.split('|');
			if(d && row[1]){
				if(row[0] == 1) uTitle = 'Новый ответ на стене';
				else if(row[0] == 2) uTitle = 'Новый комментарий к фотографии';
				else if(row[0] == 3) uTitle = 'Новый комментарий к видеозаписи';
				else if(row[0] == 4) uTitle = 'Новый комментарий к заметке';	
				else if(row[0] == 8) uTitle = 'Новое сообщение';			
				if(row[0] == 8){var uved = $("#new1")[0];uved.play();}
				
         		else if(row[0] == 10) uTitle = 'Ваша запись понравилась';
                else if(row[0] == 11) uTitle = 'Новая заявка';
				else if(row[0] == 12) uTitle = 'Заявка принята';
				else uTitle = 'Событие';
				
				
																if(row[0] == 8){
					sli = row[6].split('/');
					tURL = (location.href).replace('http://'+location.host, '').replace('/', '').split('#');
					if(!sli[2] && tURL[0] == 'messages') return false;
					if($('#new_msg').text()) msg_num = parseInt($('#new_msg').text().replace(')', '').replace('(', ''))+1;
					else msg_num = 1;
					$('#new_msg').html("<div class=\"headm_newac\">+"+msg_num+"</div>");
				}
				if(row[0] == 11){
					sli = row[6].split('/');
					tURL = (location.href).replace('http://'+location.host, '').replace('/', '').split('#');
					if(!sli[2] && tURL[0] == 'requests') return false;
					if($('#new_requests').text()) user_friends_num = parseInt($('#new_requests').text().replace(')', '').replace('(', ''))+1;
					else user_friends_num = 1;
					$('#new_requests').html("<div class=\"headm_newac\">+"+user_friends_num+"</div>");
				}
                                setTimeout('upClose('+row[4]+');', 10000);
				
				
				temp = '<div class="update_box cursor_pointer" id="event'+row[4]+'" onClick="GoPage(event, \''+row[6]+'\'); upClose('+row[4]+')"><div class="update_box_margin"><div style="height:19px"><span>'+uTitle+'</span><div class="update_close fl_r no_display" id="update_close" onMouseDown="upClose('+row[4]+')"><div class="update_close_ic" id="update_close2"></div></div></div><div class="clear"></div><div class="update_inpad"><a href="/u'+row[2]+'" onClick="Page.Go(this.href); return false"><img src="'+row[5]+'" id="no_ev" /></a><div class="update_data"><a id="no_ev" href="/u'+row[2]+'" onClick="Page.Go(this.href); return false">'+row[1]+'</a>&nbsp;&nbsp;'+row[3]+'</div></div><div class="clear"></div></div></div>';
				$('#updates').html($('#updates').html()+temp);
				if($('.update_box').size() <= 5) $('#updates').animate({'height': (123*$('.update_box').size())+'px'});
				if($('.update_box').size() > 5){
					evFirst = $('.update_box:first').attr('id');
					$('#'+evFirst).animate({'margin-top': '-123px'}, 400, function(){
						$('#'+evFirst).fadeOut('fast', function(){
							$('#'+evFirst).remove();
						});
					});
				}
			}
		});
	}, 4000);
});
</script>[/logged]




[logged]<script type="text/javascript" src="{theme}/js/push.js"></script>
<div class="no_display"><audio id="beep-three" controls preload="auto"><source src="{theme}/images/soundact.ogg"></source></audio></div>
<div id="updates"></div>[/logged]
<div class="clear"></div>
</body>
</html>



