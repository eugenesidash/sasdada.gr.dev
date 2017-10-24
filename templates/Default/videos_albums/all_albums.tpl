<div class="photo_row" id="album_{id}" style="width: 232px; height: 157px;cursor: copy;"><div class="cont" style="width: 240px; height: 145px;">
	
    <a   class="img_link [yes-photos]no_photo[/yes-photos] [yesdescr]photo_album_title_show[/yesdescr] edit_owner" style="width: 240px; height: 135px;">
		<img onclick="Page.Go('/videos/albums_{get_user_id}_{id}'); return false;" src="/uploads/videos/albums/{get_user_id}/o_{photo}" style="border-radius: 0;height: 100%;width: 100%;">
		[owner]
		<div class="photo_album_info cursor_pointer" onClick="AlbumsVideos.ShowEdit('{id}', this.id)"  return false" id="editLnk{id}" title="Редактировать альбом">
			<div class="photo_album_info_back"></div>
			<div class="photo_album_info_cont"></div>
		</div>
		<div class="photo_album_info cursor_pointer" onclick="AlbumsVideos.LoadPhoto({id}); return false" title="Изменить обложку" style="right:31px;">
			<div class="photo_album_info_back"></div>
			<div class="photo_album_info_cont" style="background:url(/templates/Default/images/photo_icons.png) 2px -23px no-repeat;height:12px;"></div>
		</div>
		<div class="photo_album_info cursor_pointer" onclick="AlbumsVideos.del({id}); return false" title="Удалить альбом" style="right:56px;">
			<div class="photo_album_info_back"></div>
			<div class="photo_album_info_cont" style="background:url(/templates/Default/images/photo_icons.png) 2px -77px no-repeat;height:12px;"></div>
		</div>
		 [/owner]
		<div class="video_album_info" style="width: 223px;">
		[owner]
				<div id="edit_videos_tab{id}" class="no_display" style="margin-left: -14px;">
 <input type="text" class="inpst doc_input" value="{descr}" maxlength="60" id="edit_val{id}" size="60" style="width: 221px;" />
 <div class="clear" style="margin-top:5px;margin-bottom:35px;margin-left:45px">
 <div class="button_div fl_l"><button onClick="AlbumsVideos.SaveEdit('{id}', 'editLnk')">Сохранить</button></div>
 <div class="button_div_gray fl_l margin_left"><button onClick="AlbumsVideos.CloseEdit('{id}', 'editLnk')">Отмена</button></div>
 </div>
 </div>
 [/owner]
		<div onclick="Page.Go('/videos/albums_{get_user_id}_{id}'); return false;" class="video_album_text fl_l">{descr}</div><div class="video_album_count fl_r"><div class="video_row_icon video_album_count_icon"></div>{videos-num}</div><br class="clear"></div>
	</a>
	</div><a class="bg"></a>
</div>