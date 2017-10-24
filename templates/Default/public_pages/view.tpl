<script type="text/javascript">
var page = 1;
$(document).ready(function(){
	$('#fast_text_1').focus();
	langNumric('langMsg', '{msg-num}', 'сообщение', 'сообщения', 'сообщений', 'сообщение', 'сообщение');
	music.jPlayerInc();
});
</script>
<div id="jquery_jplayer"></div>
<input type="hidden" id="teck_id" value="" />
<input type="hidden" id="teck_prefix" value="" />
<input type="hidden" id="typePlay" value="standart" />
<div class="search_form_tab" style="margin-top:-9px;background:#fff">
 <div class="buttonsprofile albumsbuttonsprofile buttonsprofileSecond" style="height:22px">
  <a href="/public{id}" onClick="Page.Go(this.href); return false;"><div><b>К сообществу</b></div></a>
  <a href="/pages{id}" onClick="Page.Go(this.href); return false;"><div><b>Страницы</b></div></a>
  <div class="buttonsprofileSec"><a href="/pages{id}?act=view&id={fid}" onClick="Page.Go(this.href); return false;"><div><b>Просмотр страницы->{title}</b></div></a></div>
  [admin-2]<div class="fl_r">
    

   <div class="sett_privacy" style="margin-bottom:0px" onClick="settings.privacyOpen('msg')" id="privacy_lnk_msg">Редактировать</div>
     [admin]<div class="sett_hover sett_privacy" onClick="pages.Fix('{fid}')" id="fix_text">{fix-text}</div>[/admin]
   <div class="sett_openmenu no_display" id="privacyMenu_msg" style="margin-left:-3px;margin-top:-1px;width:142px">
   <div id="selected_p_privacy_lnk_msg" class="sett_selected" onClick="settings.privacyClose('msg')">Редактировать</div>
   
    <div class="sett_hover" onClick="pages.EditTitle()">Редактировать название</div>
	[admin-2] <div class="sett_hover" id="editLnk"  onClick="pages.EditText(); return false">Редактировать страницу</div>[/admin-2]
    
 
   </div>
   <div class="mgclr"></div>
  </div>
 </div>
</div>
<div class="clear"></div>
<div class="note_full_title" style="margin-top:8px">
 <span id="titleTeck"><a href="/pages{id}?act=view&id={fid}" onClick="Page.Go(this.href); return false" id="editTitleSaved">{title}</a></span>
 <div id="editTitle" class="no_display">
 <input type="text" class="videos_input" value="{title}" id="title" maxlength="65" size="65" />
 <div class="clear" style="margin-top:-5px;margin-bottom:35px;line-height:14px">
   <div class="button_div fl_l"><button onClick="pages.SaveEditTitle('{fid}')">Сохранить</button></div>
   <div class="button_div_gray fl_l margin_left" id="editClose"><button onClick="pages.CloseEditTitle()">Отмена</button></div>
  </div>
  <div class="clear"></div>
 </div>

</div>
<div class="err_yellow no_display pages_infos_div"></div>
<br />
<div class="pages_msg_border" >

<div class="pages_text" >

 <span id="teckText">{text}</span>
 
 <div class="clear"></div>
 <form method="POST" action="" name="entryform" >
 <div class="no_display" id="editTextTab" style="margin-top: -29px; margin-left: -35px; width: 795px;">
<br />
 <div class="wysiwyg_bbpanel" style="width: 782px;">
 <div onClick="bbcodes.tag('[b]', '[/b]')" class="wysiwyg_icbold cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Жирный', 'bb_bold_', '0')" id="bb_bold_1"></div>
 <div onClick="bbcodes.tag('[i]', '[/i]')" class="wysiwyg_ici cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Курсивный', 'bb_i_', '0')" id="bb_i_1"></div>
 <div onClick="bbcodes.tag('[u]', '[/u]')" class="wysiwyg_icunderline cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Подчеркнутый', 'bb_underline_', '0')" id="bb_underline_1"></div>
 <div onClick="bbcodes.tag('[left]', '[/left]')" class="wysiwyg_icpleft cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Выровнять по левому краю', 'bb_pleft_', '0')" id="bb_pleft_1"></div>
 <div onClick="bbcodes.tag('[center]', '[/center]')" class="wysiwyg_icpcenter cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Выровнять по центру', 'bb_pcenter_', '0')" id="bb_pcenter_1"></div>
 <div onClick="bbcodes.tag('[right]', '[/right]')" class="wysiwyg_icpright cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Выровнять по правому краю', 'bb_pright_', '0')" id="bb_pright_1"></div>
 <div onClick="bbcodes.tag('[quote]', '[/quote]')" class="wysiwyg_icquote cursor_pointer border_radius_3" onMouseOver="myhtml.title('1', 'Добавить цитату', 'bb_quote_', '0')" id="bb_quote_1"></div>

 <div class="wysiwyg_iclink cursor_pointer border_radius_3" onClick="wysiwyg.linkBox()" onMouseOver="myhtml.title('1', 'Добавить ссылку', 'bb_link_', '0')" id="bb_link_1"></div>

 <div class="clear"></div>
</div>
  <textarea class="inpst" name="text" style="min-width: 784.7px; max-width: 98.7%; width: 768px; height: 549px; margin: 0px; " id="editText">{edit-text}</textarea>
  <div class="clear note_add_bg" style="margin-left: 0px;width: 731px;max-width: 89.9%;margin-bottom: -7px;line-height: 7px;">
  <div style="margin-top: -10px;">
   <div class="button_div fl_l"><button onClick="pages.SaveEdit('{fid}')" id="saveedit">Сохранить</button></div>
   <div class="button_div_gray fl_l margin_left" id="editClose"><button onClick="pages.CloseEdit()">Отмена</button></div>
</div>

 <div onClick=Page.Go('pages{id}?act=help'); return false; style="cursor: pointer;color: green;margin: 6px;float:right">Помощь по разметке</div>
  </div>
  </form>
  <div class="clear"></div>
 </div>

</div>
<div class="clear"></div>
</div>
 [admin-2]
<div class="note_add_bg clear support_addform pages_addmsgbg " style="text-align: center;">


<div class="clear"></div>


   <center> <div class="sett_hover"  onClick="pages.DelBox('{fid}', '{id}')" style="color: gray;">Удалить страницу</div> </center>

<div class="clear"></div>
</div>[/admin-2]