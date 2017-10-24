<link rel="stylesheet" type="text/css" href="http://st0.vk.me/css/al/wkview.css" />



<div class="ava">
<span id="ava"><img src="{ava}" />
<div style="margin-left: 162px;margin-top: -34px;z-index:50;position:absolute;">
<div style="background:url('/templates/Default/images/likes_miss.png'); height: 32px;width: 38px;color: #FFFFFF;font-size: 21px;text-align:center;"><b>{rate-ava}</b></div>
</div>
</span>
</div>
<div class="profiewr">
<div class="titleu">{name}</div>
<div class="status cursor_pointer"><a>Рейтинг: {rate}</a></div>
<div class="load_photo_quote">Данная страница пренадлежит участнику <a href="/u{user-id}" onclick="Page.Go(this.href); return false;">{name}</a>. <br>Здесь Вы можете перейти на полную версию странички участника, либо проголосовать за него, с помощью кнопок расположенных справа.</div>
</div>


<div class="profile_l">
[group=1]
<div class="button_blue fl_l" style="margin-top:35px;">
<button onclick="amiss.delet({user-id}); return false;" style="width:161px">Оннулировать рейтинг</button>
</div>
<input id="newrate" type="text" style="width:148px;margin-top:5px;color:#c1cad0"  class="videos_input" />
<div class="button_gray fl_l">
<button onclick="amiss.newrate({user-id}); return false;" style="width:161px">Повысить рейтинг</button>
</div>
[/group]
<div class="button_blue fl_l" style="margin-top:5px;">
<button onclick="miss.vote({user-id},1); return false;" style="width:161px">Нравится </button>
</div>

<div class="button_blue fl_l" style="margin-top:5px;">
<button onclick="miss.vote({user-id},2); return false;" style="width:161px">Не нравится </button>
</div>

<div class="button_blue fl_l" style="margin-top:5px;">
<button onclick="Page.Go('/u{user-id}'); return false;" style="width:161px">Страница на сайте</button>
</div>

<div class="button_blue fl_l" style="margin-top:5px;">
<button onclick="Page.Go('/mister'); return false;" style="width:161px">Другие участники</button>
</div>

</div>