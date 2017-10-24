<div class="onevideo" id="video_{id}">
 <a href="" onClick="videos.show({id}, this.href); return false"><div class="onevideo_img"><img src="{photo}" alt="" /></div></a>
 <div class="onevideo_title"><a href="" id="video_title_{id}" onClick="videos.show({id}, this.href); return false">{title}</a></div>
 <div class="onevideo_inf2" id="video_descr_{id}">{descr}</div>
 <div class="onevideo_inf">{comm}</div>
 <div class="onevideo_inf">Добавлено {date}</div>
 [owner]<div class="onevideo_inf"><a href="/" onClick="videos.editbox({id}); return false">Редактировать</a> &nbsp;|&nbsp; <a onclick="videos.LoadPhoto({id}); return false;">Загрузить постер</a> &nbsp;|&nbsp; <a href="/" onclick="AlbumsVideos.vdel({id}); return false">Удалить из Альбома</a> </div>[/owner]
<input type="hidden" value="{id}" id="onevideo" />
</div>
<div class="clear"></div>