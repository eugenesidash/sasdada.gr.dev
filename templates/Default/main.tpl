<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
[logged]<style type="text/css" media="all">html, body{font-family:tahoma, arial, verdana, sans-serif, Lucida Sans;background: url('{fon_facemy}') no-repeat center top fixed;margin:0px;padding:0px;font-size:11px;overflow-x:hidden;-moz-background-size:cover;-o-background-size:100% auto;-webkit-background-size:100% auto;-khtml-background-size:cover;background-size:cover;}</style>[/logged]
<head>
{header}
<noscript><meta http-equiv="refresh" content="0; URL=/badbrowser.php"></noscript>
<link media="screen" href="{theme}/style/style.css" type="text/css" rel="stylesheet" /> 

 <link media="screen" href="/templates/Default/style/video.css" type="text/css" rel="stylesheet" /> 
 <link media="screen" href="{theme}/style/ppages.css" type="text/css" rel="stylesheet" />
[not-logged]<link media="screen" href="{theme}/reg_style/css.css" type="text/css" rel="stylesheet" /> [/not-logged]
<link media="screen" href="{theme}/style/nprogress.css" type="text/css" rel="stylesheet" />
<link media="screen" href="{theme}/im_chat/im_chat.css" type="text/css" rel="stylesheet" />
{js}[not-logged]<script type="text/javascript" src="{theme}/js/reg.js"></script>[/not-logged]
    [logged]<link media="screen" href="/new_gifts/new_gifts.css" type="text/css" rel="stylesheet" /><script type="text/javascript" src="/new_gifts/new_gifts.js"></script>[/logged]
<script type="text/javascript" src="{theme}/js/fon.js"></script>
<script type="text/javascript" src="{theme}/js/chat.js"></script>
<script type="text/javascript" src="{theme}/js/nprogress.js"></script>
<script type="text/javascript" src="{theme}/js/zodiak.js"></script>
<!-- <link rel="shortcut icon" href="templates/Default/images/favicon.ico" /> -->
<link rel="shortcut icon" href="templates/Default/images/45.png" />
</head>
<body onResize="onBodyResize()" class="no_display">
<div class="scroll_fix_bg no_display" onMouseDown="myhtml.scrollTop()"><div class="scroll_fix_page_top">Наверх</div></div>
<div id="doLoad"></div>
[logged]<div class="head">[/logged]
<div class="autowr">
 

 [logged]<a href="/news" onClick="Page.Go(this.href); return false"><div class="udins"></div></a>[/logged]

 
 


  <div class="headmenu">

  [logged]<!-- <a href="/messages" onClick="Page.Go(this.href); return false;">
    <div class="headm_posic">
	<div id="new_msg">{msg}</div>
	<img src="{theme}/images/spacer.gif" class="headm_ic_mess" />
    </div>
   </a>
   <a href="/friends{requests-link}" onClick="Page.Go(this.href); return false;" id="requests_link">
    <div class="headm_posic">
	<div id="new_requests">{demands}</div>
	<img src="{theme}/images/spacer.gif" class="headm_ic_friend" />
    </div>
   </a>
   <a href="/news{news-link}" onClick="Page.Go(this.href); return false;" id="news_link">
    <div class="headm_posic">
	<div id="new_news">{new-news}</div>
	<img src="{theme}/images/spacer.gif" class="headm_ic_news" />
    </div>
   </a>
      <a href="/?go=search" onClick="Page.Go(this.href); return false;" id="news_link">
    <div class="headm_posic">
	<img src="{theme}/images/spacer.gif" class="headm_ic_pin" />
    </div>
   </a> -->

   [/logged]
   </div>
    <div class="headmenu-x">
   [logged]
   <!-- <a href="/audio" onClick="doLoad.js(0); player.open(); return false;">
    <div class="headm_posic"><img src="/templates/Default/images/player.png" class="headm_posic-x" id="fplayer_pos" />
    </div>
   </a> -->
   <a href="/?act=logout">
    <div class="headm_posic-x">
	<img src="{theme}/images/spacer.gif" class="headm_ic_logout" />
    </div>
   </a>

   
  [/logged]
   </div>
    <div>
	

[logged]	

<input type="text" value="" class="fave_input search_input hinput" 
    onBlur="if(this.value=='') this.value='';this.style.color = '#c3d6ed';" 
    onFocus="if(this.value=='')this.value='';this.style.color = '#c3d6ed'"
    onKeyPress="if(event.keyCode == 13) gSearch.go();"
    onKeyUp="FSE.Txt()"
    onClick="if(this.value != 0) $('.fast_search_bg').show()"
	
	id="query" maxlength="65" style="color: rgb(195, 214, 237);border-left-width: 0px;
border-top-width: 0px;
border-bottom-width: 0px;
height: 20px;
width: 250px;
border-top-left-radius: 3px;
border-top-right-radius: 3px;
border-bottom-right-radius: 3px;
border-bottom-left-radius: 3px;
margin-top: 12px;
margin-right: 14px;
float: right;
background-color: rgb(53, 93, 138);" />


	<div id="search_types">
	 <input type="hidden" value="1" id="se_type" />
	 <div class="search_type" id="search_selected_text" onClick="gSearch.open_types('#sel_types'); return false">по людям</div>
	 <div class="search_alltype_sel no_display" id="sel_types">
	  <div id="1" onClick="gSearch.select_type(this.id, 'по людям'); FSE.GoSe($('#query').val()); return false" class="search_type_selected">по людям</div>
	  <!-- <div id="2" onClick="gSearch.select_type(this.id, 'по видеозаписям'); FSE.GoSe($('#query').val()); return false">по видеозаписям</div> -->
	  <div id="3" onClick="gSearch.select_type(this.id, 'по заметкам');  FSE.GoSe($('#query').val()); return false">по заметкам</div>
	 <!--  <div id="4" onClick="gSearch.select_type(this.id, 'по сообществам'); FSE.GoSe($('#query').val()); return false">по сообществам</div>
	  <div id="5" onClick="gSearch.select_type(this.id, 'по аудиозаписям');  FSE.GoSe($('#query').val()); return false">по аудиозаписям</div> -->
	 </div>
	</div>
   <div class="fast_search_bg no_display" id="fast_search_bg">
   <a href="/" style="padding:12px;background:#eef3f5" onClick="gSearch.go(); return false" onMouseOver="FSE.ClrHovered(this.id)" id="all_fast_res_clr1"><text>Искать</text> <b id="fast_search_txt"></b><div class="fl_r fast_search_ic"></div></a>
   <span id="reFastSearch"></span>
   </div>
   
   [/logged]
   
   
 </div>
 </div>
</div>



  [logged] <div style="height:40px;padding-bottom:65px;"></div>[/logged]


<div class="clear"></div>
<div style="margin-top:-55px;"></div>
<div class="autowr">
 <div class="content" [logged]style="width:845px;"[/logged]>
[logged]<div class="shadow">
  <div class="speedbar no_display" id="">{speedbar}</div>
  <div class="padcont">[/logged]
  
   [logged]
  <div class="page">
  
  
  

<div class="clearsw"><div class="fsdoty489">
 <div class="panelUsers">
 
  <a class="" href="{my-page-link}" onClick="Page.Go(this.href); return false;"> <div class="clearswasfasda">{myphoto_header}</div> <div class="clearswasfasdssa">  Моя страница</div> </a>

  
  
   <div class="cruig"></div>
  
  <a class="ative3 i-f" href="/albums/{my-id}" onClick="Page.Go(this.href); return false;" id="requests_link_new_photos">Фотографии<div class="" id="myprof4" onMouseOut="$('.js_titleRemove').remove();"><div id="new_photos">{new_photos}</div></div></a>
     <!-- <a class="ative1 ic_msw"  href="/audio" onClick="Page.Go(this.href); return false;">Моя музыка<div class="ic_msw" id="myprof2" onMouseOut="$('.js_titleRemove').remove();"><div id="new_msg"></div></div></a> -->
   <!-- <a class="ative5 i-v" href="/videos" onClick="Page.Go(this.href); return false;">Видеозаписи<div onMouseOut="$('.js_titleRemove').remove();" id="myprof6" class=""></div></a> -->
   <!--  <a class="ative7 i-s" href="{groups-link}" onClick="Page.Go(this.href); return false;" id="new_groups_lnk">Сообщества<div onMouseOut="$('.js_titleRemove').remove();" id="myprof8" class=""><div id="new_groups">{new_groups}</div></div></a> -->
  <a class="ative9 i-za" href="/notes" onClick="Page.Go(this.href); return false;">Заметки<div onMouseOut="$('.js_titleRemove').remove();" id="myprof10" class=""></div></a>
  <!-- <a class="ative4 i-z" href="/fave" onClick="Page.Go(this.href); return false;">Закладки<div id="myprof5" class="" onMouseOut="$('.js_titleRemove').remove();"></div></a>
    <a class="ative13 i-pd" href="/gifts{my-id}"onClick="Page.Go(this.href); return false;">Мои Подарки<div onMouseOut="$('.js_titleRemove').remove();" id="myprof14" class=""><div id="new_gifts">{new-gifts}</div></div></a> -->
  <a class="ative2 ic_friendss" href="/index.php?go=guests" onClick="Page.Go(this.href); return false;" id="requests_link">Мои гости<div class="ic_friendss" id="myprof3" onMouseOut="$('.js_titleRemove').remove();"><div id="new_requests"></div></div></a>
  
  <!--<a href="/mysocial" onClick="Page.Go(this.href); return false;"><div class=""></div></a>-->
  <!-- <a class="ative6 i-l" href="/chat" onClick="Page.Go(this.href); return false;">Общий чат<div onMouseOut="$('.js_titleRemove').remove();" id="myprof7" class=""></div></a> -->

  <a class="ative8 i-n" href="/news{news-link}" onClick="Page.Go(this.href); return false;" id="news_link">Новости<div onMouseOut="$('.js_titleRemove').remove();" id="myprof9" class=""><div id="new_news">{new-news}</div></div></a>
  
   <!-- <a class="ative8 i-qwe" href="/pins" onClick="Page.Go(this.href); return false;" id="news_link">Стикеры<div onMouseOut="$('.js_titleRemove').remove();" id="myprof9" class=""><div id="new_news">{new-news}</div></div></a> -->
 
  
  <a class="ative10 i-nv" href="/settings" onClick="Page.Go(this.href); return false;">Настройки<div onMouseOut="$('.js_titleRemove').remove();" id="myprof11" class=""></div></a>
  <!-- <a class="ative11 i-p" href="/my_stats" onClick="Page.Go(this.href); return false;">Статистика<div onMouseOut="$('.js_titleRemove').remove();" id="myprof12" class=""><div id="new_support"></div></div></a> -->
  <!-- <a class="ative12 i-b" href="/balance" onClick="Page.Go(this.href); return false;" id="ubm_link">Баланс<div onMouseOut="$('.js_titleRemove').remove();" id="myprof13" class=""></div></a> -->

  <a class="i-nang" href="/my_stats" onClick="addbox.times(); return false">Тех. Поддержка <span class="fl_r" id="new_support">{new-support}{supports-owner}</span><div onMouseOut="$('.js_titleRemove').remove();" id="myprof15" class=""></div></a>
 </div> 
 <div class="clearssssw">  <div class="clear"></div>
 
  <div id="audioPlayer"></div>
  
 <div id="page" style="min-height:521px;">
 
[/logged]
 
  {info}{content}</div>  <div class="clear"></div>
     [logged]
  <div class="clear"></div>
 </div> </div> <div class="footer">
<!--  <a href="/?go=search&online=1" onClick="Page.Go(this.href); return false">люди</a>
 <a href="/?go=search&type=2" onClick="Page.Go(this.href); return false">видео</a>
 <a href="/blog"[logged]onClick="Page.Go(this.href); return false">блог</a> -->
 <a href="/?act=change_mobile">мобильная версия</a>
<!--  <a href="/reviews" onClick="Page.Go(this.href); return false">отзывы</a> -->
 <div>Ваш Факел &copy; {dategod} <!-- <a class="cursor_pointer" onClick="translate.box()" onMouseOver="myhtml.title('1', 'Выбор используемого языка на сайте', 'langTitle', 1)" id="langTitle1">{lang}</a> --></div>
 
</div><div class="clear"></div> </div>  <div class="clear"></div> 
 </div>
 <div class="clear"></div>
 </div> 
</div>[/logged]
[logged]<script type="text/javascript" src="{theme}/js/push.js"></script>
<div class="no_display"><audio id="beep-three" controls preload="auto"><source src="{theme}/images/soundact.ogg"></source></audio></div>
<div id="updates"></div>[/logged]
<div class="clear"></div>
</body>
</html>