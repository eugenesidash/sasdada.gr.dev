<div id="userGiftsList">
<div class="gift" id="gift_{id}">
 
<div class="giftImg" >
<img src="{gift_img}" width="150px" />
</div>
 
<div class="giftInfo">
<div class="giftName">
{title}</div>

<div class="giftDesc">{msg_gift}</div>
 
<div class="giftMess">{msg}</div>
<div class="giftSenderInfo">
 
<div class="senderAva">
[link]
<img src="{ava}" alt=""/>
[/link]
</div>
<div class="senderInfo">
<div class="senderName">{sex}: [link]{author}[/link]</div>
<div class="sendDate">{date}</div>
<div class="senderLinks">
[not-user_page][anonim]<a href="/gifts{uid}" onClick="Page.Go(this.href); return false;">Подарки {names}</a>[/anonim][/not-user_page]
[user_page][anonim]<a href="/gifts{uid}" onClick="Page.Go(this.href); return false;">Подарки {names}</a> | <a href="/" onClick="giftWindow.giftsList('{uid}', 1); return false">Отправить подарок в ответ</a> |[/anonim] <a href="/" onClick="giftWindow.deleteGift('{id}'); return false">Удалить</a>[/user_page]
</div></div></div></div></div></div>