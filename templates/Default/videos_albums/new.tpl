<script type="text/javascript" src="/system/inc/js/upload.photo.js"></script>
<script type="text/javascript">
var loading_photo_pins = false;
var loaded_pins_name = null;
$(document).ready(function(){
	aj1 = new AjaxUpload('upload', {
		action: '/index.php?go=albums_videos&act=load_pins',
		name: 'uploadfile',
		data: {
			add_act: 'upload'
		},
		accept: 'image/*',
		onSubmit: function (file, ext) {
			if(!(ext && /^(jpg|png|jpeg|gif|jpe)$/.test(ext))) {
				Box.Info('err', 'Ошибка', 'Неверный формат файла');
				return false;
			}
			$('#upload').hide();
			$('#prog_poster').show();
		},
		onComplete: function (file, row){
			var exp = row.split('|');
			if(exp[0] == 'size'){
				Box.Info('err', 'Ошибка', 'Файл привышает 5 МБ');
			} else {
				$('#r_poster').attr('src', '/uploads/videos/albums/'+exp[0]+'/o_'+exp[1]).show();
			}
			$('#upload').show();
			$('#prog_poster, #size_small, #upload_butt').hide();
			loading_photo_pins = true;
			loaded_pins_name = exp[1];
		}
	});
});
function createNewPin(){
	var descr = $('#descr').val();
	if(loading_photo_pins){
		$.post('/index.php?go=albums_videos&act=create', {descr: descr, file: loaded_pins_name}, function(d){
			Box.Info('inf', 'Информация', 'Новый альбом успешно добавлен!');
			viiBox.clos('add_box', 1);
			Page.Go(location.href);
		});
	}else Box.Info('err', 'Ошибка', 'Вы не загрузили фотографию');
}
</script>
<div class="miniature_box" style="z-index:10100;">
<div class="miniature_pos" style="width:320px;margin-top: 50px;"">
<div style="float:left; padding:20px; width:320px; background-color:#4C77A4;  margin-left:-20px; margin-top:-20px; color:#fff; font-weight:bold;">
<span style="float:left;">Добавить альбом</span>
<span style="float:right;"><a class="cursor_pointer fl_r" style="color: rgb(197, 197, 197);font-size:12px" onClick="viiBox.clos('add_box', 1);">Закрыть</a></span></div>
		<div class="clear"></div>
		

			
			<div class="clear"></div>
		
		
		<div class="fl_l" style="padding: 15px;margin-top: 23px;">
		<input  placeholder="Название альбома" id="descr" style="height: 20px;width: 290px"></input>
		<div class="apps_block" style="width: 294px;"><div class="apps_top border_radius_5"><div class="fl_l"><div class="button_div fl_l" id="upload_butt"><div class="fl_l" style="margin-top: 3px; color: #999;padding-right: 15px">ЗАГРУЗКА ЛОГОТИПА</div><button type="submit" class="inp  " id="upload">Выбрать файл</button></div><div class="clear"></div><br></div><div id="prog_poster" style="display: none;margin-top:1px;background:url('/templates/Default/images/progress_grad.gif');width:94px;height:18px;border:1px solid #006699; float:left"></div><div class="clear"></div><img src="" id="r_poster" style="
height: 191px;
width: 262px;
"></div></div></div>
		
		
		
			<div class="clear"></div>
	
			<div style="cursor: pointer;border: 2px dotted #1B99E0; float: left; padding:10px 20px; width: 316px; background-color: #eff1f3; margin-left: -20px; color: #459A45; z-index:103;" onclick="createNewPin()();">
<center style="
    opacity: 0.7;
">
<div style="
    font-size: 15px;
 
">Добавить альбом</div>


</center>
</div>
			
		</div>
		<div class="clear"></div>
 </div>
 <div class="clear" style="height:100px"></div>
</div>