<script type="text/javascript">
var page = 1;
$(document).ready(function(){
	$(window).scroll(function(){
		if($(document).height() - $(window).height() <= $(window).scrollTop()+($(document).height()/2-250)){
			pages.Page('{id}');
		}
	});
	langNumric('langPages', '{pages-num}', 'страница', 'страницы', 'страниц', 'страница', 'В сообществе ещё нет страниц.');
});
</script>
<div class="search_form_tab" style="margin-top:-9px">
 <div class="buttonsprofile albumsbuttonsprofile buttonsprofileSecond" style="height:20px">
  <a href="/public{id}" onClick="Page.Go(this.href); return false;"><div><b>К сообществу</b></div></a>
  <div class="buttonsprofileSec"><a href="/pages{id}" onClick="Page.Go(this.href); return false;"><div><b>Страницы</b></div></a></div>
  <a href="/pages{id}?act=new" onClick="Page.Go(this.href); return false;" class="{no}"><div><b>Новая страница</b></div></a>
  <div style="margin: 2px;float:right"> {pages-num} <span id="langPages"> </span></div>
 </div>

</div>
<div class="clear"></div>
<div class="margin_top_10"></div><div class="allbar_title" style="text-align: center;border-bottom:0px;margin-bottom:0px">


 Ваша группа может содержать дополнительные страницы с информацией, структуру и содержание которых можно настроить на этой вкладке.

<div class="clear" style="border-bottom:1px solid #58a358;margin: 20px -12px 40px -12px;"></div>
</div>

