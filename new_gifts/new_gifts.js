/*******************************************************************************************
*   JavaScript отвичающий функционал новых подарков.                                       *
*******************************************************************************************/
var giftWindow = {
	giftsList: function(user_id, c, cat){
		if(c)
			var cache = 0;
		else
			var cache = 1;
			
		Box.Page('/index.php?go=new_gifts&in=giftsList', 'user_id='+user_id+'&cat='+cat, 'gifts', 749, 'Выберите подарок', '', 0, 0, '', 0, 1, 1, 0, cache);
	},
	selectGift: function(gid, fid, price, ava, gift){
		Box.Close(0, 1);
		Box.Show('send_gift'+gid, 600, 'Отправление подарка', 
			'<div id="gift-room-send"><div class="giftPreview"><div class="giftArea"><div class="giftBlock"><div class="giftroom-left"><div class="giftImg" style="background-position: 50% 50%; background-repeat: no-repeat no-repeat;"><img src="/new_gifts/img/gifts/'+gift+'.png"></div></div><div class="giftroom-arrow"></div><div class="giftroom-right"><em class="userInfo" style="background:url('+ava+') center center no-repeat"></em></div></div><div class="textArea"><span>Людям очень нравится</span> получать подарки.<br>На сообщения с подарками реагируют в 10 раз чаще!</div></div><div class="bottomGiftBlock"><div class="giftroom-row"><div class="form-field nclear"><div class="form-label"><label for="example-input">Подпишите свой подарок:</label></div><div class="form-data"><textarea id="msgfgift'+gid+'" class="form-text"></textarea></div></div></div><div class="giftroom-row"><a class="secondary-link choiceOther" onclick="giftWindow.giftsList();">Выбрать другой подарок</a><div class="giftroom-center"><div class="ibtn ibtn-blue ibtn-big center-help-wrap" onclick="giftWindow.sendGift('+gid+', '+fid+');">Отправить подарок</div><div class="price">'+price+'</div></div><div class="anonym-gift"><div class="html_checkbox" id="g_anonim'+gid+'" onClick="myhtml.checkbox(this.id);">Анонимный подарок</div></div></div></div>', 
		'', '', '', '', 0, 0, 0, 0, 0, 1);
	},
	sendGift: function(gfid, fid){
		var anonim = $('#g_anonim'+gfid).val();
		var msgfgift = $('#msgfgift'+gfid).val();
		$('#box_loading').show().css('margin-top', '-5px');
		$.post('/index.php?go=new_gifts&in=sendGift', {for_user_id: fid, gift: gfid, anonim: anonim, msg: msgfgift}, function(d){
			if(d == 1){
			    Box.Close();
				giftWindow.giftSendError('gifterr', 'Ошибка отправления подарка', 'На вашем счету недостаточно баллов', 250, 4000);
			} else {
				Box.Close();
				giftWindow.giftSend('giftok', 'Подарок отправлен', 'Ваш подарок успешно отправлен', 250, 2000);
			}
		});
	},
	deleteGift: function(gid){
		$('#gift_'+gid).html('<center><div class="color777" style="padding:35px"><center>Подарок удалён.</div></center>');
		updateNum('#num');
		$.post('/index.php?go=new_gifts&in=delGift', {gid: gid});
	},
	giftFree: function(){
		Box.Page('/index.php?go=new_gifts&in=giftFree', '', 'gift1', 620, 'Покупка пакета подарков', '', '', '', '', '', 0, 0, 0, 0, 0);
	},
	giftFree_1: function(uid){
		$.post('/index.php?go=new_gifts&in=giftFree_1', {uid:uid}, function(d){
			if(d == 1){
			    Box.Close();
				giftWindow.giftSendError('gifterr1', 'Ошибка покупки пакета', 'На вашем счету недостаточно баллов', 250, 4000);
			} else {
				Box.Close();
				giftWindow.giftSend('giftok1', 'Пакет подарков куплен', 'Вы успешно купили пакет подарков', 250, 2000);
			}
		});
	},
	giftFree_2: function(uid){
		$.post('/index.php?go=new_gifts&in=giftFree_2', {uid:uid}, function(d){
			if(d == 1){
			    Box.Close();
				giftWindow.giftSendError('gifterr1', 'Ошибка покупки пакета', 'На вашем счету недостаточно баллов', 250, 4000);
			} else {
				Box.Close();
				giftWindow.giftSend('giftok1', 'Пакет подарков куплен', 'Вы успешно купили пакет подарков', 250, 2000);
			}
		});
	},
	giftFree_3: function(uid){
		$.post('/index.php?go=new_gifts&in=giftFree_3', {uid:uid}, function(d){
			if(d == 1){
			    Box.Close();
				giftWindow.giftSendError('gifterr1', 'Ошибка покупки пакета', 'На вашем счету недостаточно баллов', 250, 4000);
			} else {
				Box.Close();
				giftWindow.giftSend('giftok1', 'Пакет подарков куплен', 'Вы успешно купили пакет подарков', 250, 2000);
			}
		});
	},
	giftSend: function(bid, title, content, width, tout){
		var top_pad = ($(window).height()-115)/2;
		$('body').append('<div id="'+bid+'" class="giftSend"><div class="giftSend_margin" style="width: '+width+'px; margin-top: '+top_pad+'px"><b><span>'+title+'</span></b><br /><br />'+content+'</div></div>');
		$(bid).show();
		
		if(!tout)
			var tout = 2400;
		
		setTimeout("giftWindow.giftSendClose()", tout);
	},
	giftSendError: function(bid, title, content, width, tout){
		var top_pad = ($(window).height()-115)/2;
		$('body').append('<div id="'+bid+'" class="giftSendError"><div class="giftSendError_margin" style="width: '+width+'px; margin-top: '+top_pad+'px"><b><span>'+title+'</span></b><br /><br />'+content+'</div></div>');
		$(bid).show();
		
		if(!tout)
			var tout = 5000;
		
		setTimeout("giftWindow.giftSendErrorClose()", tout);
	},
	giftSendClose: function(){
		$('.giftSend').fadeOut();
	},
	giftSendErrorClose: function(){
		$('.giftSendError').fadeOut();
	}
}