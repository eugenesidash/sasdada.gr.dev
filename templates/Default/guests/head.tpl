<script type="text/javascript">
	$('#speedbar').show();
	$('#speedbar').text(lang_guests);
</script>
 <div class="topss"></div>

<div class="buttonsprofile albumsbuttonsprofile" style="height:-10px;">

   <a href="/u{user-id}" onClick="Page.Go(this.href); return false;"><div><b>[not-owner]К странице {name}[/not-owner][owner]К моей странице[/owner]</b></div></a>
 [owner]<a onclick="guest.clear(); return false" href="/">Очистить список</a>
[/owner]
</div>
<div class="jje_guenst no_display" id="guest_clear" style="font-weight:normal;">Список гостей успешно очищен!</div>
[no-guests] 	<div class="swrf" align="center">  [owner]{name} вашу страницу пока что никто не посетил :([/owner][not-owner]Вы стали первым кто посетил страницу {name}[/not-owner]</div>[/no-guests]
