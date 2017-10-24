<div class="friends_onefriend width_100" id="friend_{user-id}">
 <a href="/u{user-id}" onClick="Page.Go(this.href); return false"><div class="friends_ava"><img src="{ava}" alt="" id="ava_{user-id}" /></div></a>
 <div class="fl_l" style="width:500px">
 
 

 <a href="/u{user-id}" onClick="Page.Go(this.href); return false"><b>{name}<span class="qq_friens">{online}</span></b></a><div class="friends_clr"></div>
  {country}{city}<div class="friends_clr"></div>
  {age}<div class="friends_clr"></div>
  <span class="online">{online}</span><div class="friends_clr"></div>
 </div>
 
 
 
 <div class="menuleft fl_r friends_m">
     <a href="/" onClick="messages.new_({user-id}); return false"><div class="box_messrq">Написать сообщение</div></a>
	 <a onclick="Page.Go(this.href); return false" href="/friends/{user-id}"><div class="box_messrq">Просмотреть друзей</div></a>
 </div>
</div>