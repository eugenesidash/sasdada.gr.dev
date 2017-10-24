

<link media="screen" href="/templates/Default/style/video.css" type="text/css" rel="stylesheet" /> 

<script type="text/javascript">
$(document).ready(function(){
	videos.scroll();
});
</script>
<div class="speedbar no_display" id="speedbar" style="margin-top: -9px;margin-left: -12px;width: 100.6%;display: block; ">[owner]У Вас[/owner][not-owner]У {name}[/not-owner] <span id="nums">{albums-num}</span> </div>
<br />
<div class="buttonsprofile albumsbuttonsprofile" style="height:10px;">
 <a href="/videos/{user-id}" onClick="Page.Go(this.href); return false;"><div>[owner]Все видеозаписи[/owner][not-owner]К видеозаписям {name}[/not-owner]</div></a>
 <div class="activetab"><a href="/videos/albums_{user-id}" onClick="Page.Go(this.href); return false;"><div>[owner]Все видеоальбомы[/owner][not-owner]Видеоальбомы {name}[/not-owner]</div></a></div>
 [admin-video-add][owner]<a href="/" onClick="videos.addbox(); return false;">Добавить c PC</a>[/owner][/admin-video-add]

 [admin-video-add][owner]<a href="/" onClick="videos.add(); return false;">Добавить видеоролик</a>[/owner][/admin-video-add]
 [not-owner]<a href="/u{user-id}" onClick="Page.Go(this.href); return false;">К странице {name}</a>[/not-owner]

 [group=1]
 
 [admin-video-add][owner]<div style="margin: 2px;float:right">

 
 <a href="/" onClick="AlbumsVideos.add_box(); return false"><div><b>Новый альбом</b></div></a></div>[/owner][/admin-video-add][/group]
</div>
<div class="clear"></div><div style="margin-top:10px;"></div>
<input type="hidden" value="{user-id}" id="user_id" />
<input type="hidden" id="set_last_id" />
<input type="hidden" id="videos_num" value="{albums-num}" />
[group=1]







[/group]