﻿<div id="video_shows_{vid}" class="">
<div id="video_shows_{vid}" class=""><div id="video_show_{vid}" class="video_view" onClick="videos.setEvent(event, {owner-id}, '{close-link}')">
<div class="photo_close" onClick="videos.close({owner-id}, '{close-link}'); return false"></div>
 <div class="video_show_bg">
  <div class="video_show_object">
    <div class="video_show_title">	
	<div id="video_full_title_{vid}" class="fl_l tiiii"></div>
	<div class="titles1"><div class="fl_r">| <a href="/" onClick="videos.close({owner-id}, '{close-link}','{vid}'); return false">Закрыть</a></div>	
	<div class="fl_r" style="margin-right:3px;"><a href="/" onClick="videos.min('{vid}'); return false">Свернуть</a></div>	
	</div>
	<div class="titles2 fl_r">	
	<div class="close_bi fl_r" onClick="videos.close({owner-id}, '{close-link}','{vid}'); return false">	
	<div class="mv_close_control"></div>	
	</div>		
	<div class="close_bi fl_r" onClick="videos.max('{vid}'); return false">		
	<div class="mv_max_control"></div>		
	</div>
	</div>
	<div class="clear"></div> 
	</div>
   <div id="video_object">{video}</div>
   [not-owner]<div id="addok"><a href="/" onClick="videos.addmylist('{vid}'); return false">Добавить в Мои Видеозаписи</a></div>[/not-owner]
  </div>
  <div class="video_show_panel" id="video_del_info">
   <div class="photo_leftcol video_show_left_col">
    <div class="video_show_descr" id="video_full_descr_{vid}">{descr}</div>
    <div class="video_show_date">Добавлена {date}</div><br />
	[all-comm]<a href="/" onClick="videos.allcomment({vid}, {comm-num}, {owner-id}); return false" id="all_href_lnk_comm"><div class="photo_all_comm_bg" id="all_lnk_comm">Показать {prev-text-comm}</div></a><span id="all_comments"></span>[/all-comm]
	[admin-comments]<span id="comments">{comments}</span>
    <div class="photo_com_title">Ваш комментарий</div>
    <textarea id="comment" class="inpst" style="width:520px;height:70px;margin-bottom:10px;"></textarea>
    <div class="button_div fl_l"><button onClick="videos.addcomment({vid}); return false" id="add_comm">Отправить</button></div>[/admin-comments]
   </div>
   <div class="photo_rightcol">
    {views}
    Отправитель:<br /><a href="/u{uid}" onClick="Page.Go(this.href); return false">{author}</a><br /><br />
	<div class="menuleft" style="width:220px;">
     [owner]<a href="/" onClick="videos.editbox({vid}); return false"><img class="icon addfr_fan" src="{theme}/images/redv.png" alt="" /><div>Редактировать видеозапись</div></a> 
	 <a href="/" onClick="videos.delet({vid}, 1); return false"><img class="icon addfr_fan" src="{theme}/images/tfdr.png" alt="" /><div>Удалить видеозапись</div></a>[/owner]
	 <a onClick="Report.Box('video', '{vid}')"><img class="icon addfr_fan" src="{theme}/images/khjg.png" alt="" /><div>Пожаловаться на видеозапись</div></a>
    </div>
   </div>
  <div class="clear"></div>
  </div>
 </div>
</div>
</div>