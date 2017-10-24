//Oven
var aries = {
  box: function(){
        var tmp = '<div class="miniature_box" id="aries">'+
'<div class="miniature_pos" style="width: 606px;background: #383838;">'+
  '<div class="miniature_title fl_l apps_box_text" style="color:#fff">Гороскоп Овена на сегодня</div><a class="cursor_pointer fl_r" style="font-size:12px;color:#fff" onClick="$(\'#aries\').hide(); $(\'html, body\').css(\'overflow-y\', \'auto\');">Закрыть</a>'+
  '<div class="clear"></div>'+
  '<div style="left:300px; width: 606px; height: 500px; border: 0px solid #F8F8F8; overflow:hidden;"><iframe style="position:relative; width: 738px; height: 953px; right: 135px; bottom: 209px;" scrolling="yes" src="http://goroskop.open.by/aries/today" width="785px;"></iframe></div></div>'+
  '<div class="clear"></div>'+
'</div>'+
'<div class="clear" style="height: 0px"></div>'+
'</div>';
        var check = $('#aries').length;
if(!check){
   if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
   $('html, body').css('overflow-y', 'hidden');
   if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
   $('body').append(tmp);
} else
          $('#aries').show();
  }
}


//Telec
var taurus = {
  box: function(){
        var tmp = '<div class="miniature_box" id="taurus">'+
'<div class="miniature_pos" style="width: 606px;background: #383838;">'+
  '<div class="miniature_title fl_l apps_box_text" style="color:#fff">Гороскоп Телеца на сегодня</div><a class="cursor_pointer fl_r" style="font-size:12px;color:#fff" onClick="$(\'#taurus\').hide(); $(\'html, body\').css(\'overflow-y\', \'auto\');">Закрыть</a>'+
  '<div class="clear"></div>'+
  '<div style="left:300px; width: 606px; height: 500px; border: 0px solid #F8F8F8; overflow:hidden;"><iframe style="position:relative; width: 738px; height: 953px; right: 135px; bottom: 209px;" scrolling="yes" src="http://goroskop.open.by/taurus/today" width="785px;"></iframe></div></div>'+
  '<div class="clear"></div>'+
'</div>'+
'<div class="clear" style="height: 0px"></div>'+
'</div>';
        var check = $('#taurus').length;
if(!check){
   if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
   $('html, body').css('overflow-y', 'hidden');
   if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
   $('body').append(tmp);
} else
          $('#taurus').show();
  }
}

//Bleznec
var gemini = {
  box: function(){
        var tmp = '<div class="miniature_box" id="gemini">'+
'<div class="miniature_pos" style="width: 606px;background: #383838;">'+
  '<div class="miniature_title fl_l apps_box_text" style="color:#fff">Гороскоп Блезнеца на сегодня</div><a class="cursor_pointer fl_r" style="font-size:12px;color:#fff" onClick="$(\'#gemini\').hide(); $(\'html, body\').css(\'overflow-y\', \'auto\');">Закрыть</a>'+
  '<div class="clear"></div>'+
  '<div style="left:300px; width: 606px; height: 500px; border: 0px solid #F8F8F8; overflow:hidden;"><iframe style="position:relative; width: 738px; height: 953px; right: 135px; bottom: 209px;" scrolling="yes" src="http://goroskop.open.by/gemini/today" width="785px;"></iframe></div></div>'+
  '<div class="clear"></div>'+
'</div>'+
'<div class="clear" style="height: 0px"></div>'+
'</div>';
        var check = $('#gemini').length;
if(!check){
   if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
   $('html, body').css('overflow-y', 'hidden');
   if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
   $('body').append(tmp);
} else
          $('#gemini').show();
  }
}

//Rak
var cancer = {
  box: function(){
        var tmp = '<div class="miniature_box" id="cancer">'+
'<div class="miniature_pos" style="width: 606px;background: #383838;">'+
  '<div class="miniature_title fl_l apps_box_text" style="color:#fff">Гороскоп Рака на сегодня</div><a class="cursor_pointer fl_r" style="font-size:12px;color:#fff" onClick="$(\'#cancer\').hide(); $(\'html, body\').css(\'overflow-y\', \'auto\');">Закрыть</a>'+
  '<div class="clear"></div>'+
  '<div style="left:300px; width: 606px; height: 500px; border: 0px solid #F8F8F8; overflow:hidden;"><iframe style="position:relative; width: 738px; height: 953px; right: 135px; bottom: 209px;" scrolling="yes" src="http://goroskop.open.by/cancer/today" width="785px;"></iframe></div></div>'+
  '<div class="clear"></div>'+
'</div>'+
'<div class="clear" style="height: 0px"></div>'+
'</div>';
        var check = $('#cancer').length;
if(!check){
   if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
   $('html, body').css('overflow-y', 'hidden');
   if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
   $('body').append(tmp);
} else
          $('#cancer').show();
  }
}

//Lev
var leo = {
  box: function(){
        var tmp = '<div class="miniature_box" id="leo">'+
'<div class="miniature_pos" style="width: 606px;background: #383838;">'+
  '<div class="miniature_title fl_l apps_box_text" style="color:#fff">Гороскоп Льва на сегодня</div><a class="cursor_pointer fl_r" style="font-size:12px;color:#fff" onClick="$(\'#leo\').hide(); $(\'html, body\').css(\'overflow-y\', \'auto\');">Закрыть</a>'+
  '<div class="clear"></div>'+
  '<div style="left:300px; width: 606px; height: 500px; border: 0px solid #F8F8F8; overflow:hidden;"><iframe style="position:relative; width: 738px; height: 953px; right: 135px; bottom: 209px;" scrolling="yes" src="http://goroskop.open.by/leo/today" width="785px;"></iframe></div></div>'+
  '<div class="clear"></div>'+
'</div>'+
'<div class="clear" style="height: 0px"></div>'+
'</div>';
        var check = $('#leo').length;
if(!check){
   if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
   $('html, body').css('overflow-y', 'hidden');
   if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
   $('body').append(tmp);
} else
          $('#leo').show();
  }
}

//Deva
var virgo = {
  box: function(){
        var tmp = '<div class="miniature_box" id="virgo">'+
'<div class="miniature_pos" style="width: 606px;background: #383838;">'+
  '<div class="miniature_title fl_l apps_box_text" style="color:#fff">Гороскоп Девы на сегодня</div><a class="cursor_pointer fl_r" style="font-size:12px;color:#fff" onClick="$(\'#virgo\').hide(); $(\'html, body\').css(\'overflow-y\', \'auto\');">Закрыть</a>'+
  '<div class="clear"></div>'+
  '<div style="left:300px; width: 606px; height: 500px; border: 0px solid #F8F8F8; overflow:hidden;"><iframe style="position:relative; width: 738px; height: 953px; right: 135px; bottom: 209px;" scrolling="yes" src="http://goroskop.open.by/virgo/today" width="785px;"></iframe></div></div>'+
  '<div class="clear"></div>'+
'</div>'+
'<div class="clear" style="height: 0px"></div>'+
'</div>';
        var check = $('#virgo').length;
if(!check){
   if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
   $('html, body').css('overflow-y', 'hidden');
   if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
   $('body').append(tmp);
} else
          $('#virgo').show();
  }
}

//Vesi
var libra = {
  box: function(){
        var tmp = '<div class="miniature_box" id="libra">'+
'<div class="miniature_pos" style="width: 606px;background: #383838;">'+
  '<div class="miniature_title fl_l apps_box_text" style="color:#fff">Гороскоп Весов на сегодня</div><a class="cursor_pointer fl_r" style="font-size:12px;color:#fff" onClick="$(\'#libra\').hide(); $(\'html, body\').css(\'overflow-y\', \'auto\');">Закрыть</a>'+
  '<div class="clear"></div>'+
  '<div style="left:300px; width: 606px; height: 500px; border: 0px solid #F8F8F8; overflow:hidden;"><iframe style="position:relative; width: 738px; height: 953px; right: 135px; bottom: 209px;" scrolling="yes" src="http://goroskop.open.by/libra/today" width="785px;"></iframe></div></div>'+
  '<div class="clear"></div>'+
'</div>'+
'<div class="clear" style="height: 0px"></div>'+
'</div>';
        var check = $('#libra').length;
if(!check){
   if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
   $('html, body').css('overflow-y', 'hidden');
   if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
   $('body').append(tmp);
} else
          $('#libra').show();
  }
}

//Skorpion
var scorpio = {
  box: function(){
        var tmp = '<div class="miniature_box" id="scorpio">'+
'<div class="miniature_pos" style="width: 606px;background: #383838;">'+
  '<div class="miniature_title fl_l apps_box_text" style="color:#fff">Гороскоп Скорпиона на сегодня</div><a class="cursor_pointer fl_r" style="font-size:12px;color:#fff" onClick="$(\'#scorpio\').hide(); $(\'html, body\').css(\'overflow-y\', \'auto\');">Закрыть</a>'+
  '<div class="clear"></div>'+
  '<div style="left:300px; width: 606px; height: 500px; border: 0px solid #F8F8F8; overflow:hidden;"><iframe style="position:relative; width: 738px; height: 953px; right: 135px; bottom: 209px;" scrolling="yes" src="http://goroskop.open.by/scorpio/today" width="785px;"></iframe></div></div>'+
  '<div class="clear"></div>'+
'</div>'+
'<div class="clear" style="height: 0px"></div>'+
'</div>';
        var check = $('#scorpio').length;
if(!check){
   if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
   $('html, body').css('overflow-y', 'hidden');
   if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
   $('body').append(tmp);
} else
          $('#scorpio').show();
  }
}

//Strelec
var sagittarius = {
  box: function(){
        var tmp = '<div class="miniature_box" id="sagittarius">'+
'<div class="miniature_pos" style="width: 606px;background: #383838;">'+
  '<div class="miniature_title fl_l apps_box_text" style="color:#fff">Гороскоп Стрельца на сегодня</div><a class="cursor_pointer fl_r" style="font-size:12px;color:#fff" onClick="$(\'#sagittarius\').hide(); $(\'html, body\').css(\'overflow-y\', \'auto\');">Закрыть</a>'+
  '<div class="clear"></div>'+
  '<div style="left:300px; width: 606px; height: 500px; border: 0px solid #F8F8F8; overflow:hidden;"><iframe style="position:relative; width: 738px; height: 953px; right: 135px; bottom: 209px;" scrolling="yes" src="http://goroskop.open.by/sagittarius/today" width="785px;"></iframe></div></div>'+
  '<div class="clear"></div>'+
'</div>'+
'<div class="clear" style="height: 0px"></div>'+
'</div>';
        var check = $('#sagittarius').length;
if(!check){
   if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
   $('html, body').css('overflow-y', 'hidden');
   if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
   $('body').append(tmp);
} else
          $('#sagittarius').show();
  }
}

//Kozerog
var capricorn = {
  box: function(){
        var tmp = '<div class="miniature_box" id="capricorn">'+
'<div class="miniature_pos" style="width: 606px;background: #383838;">'+
  '<div class="miniature_title fl_l apps_box_text" style="color:#fff">Гороскоп Козерога на сегодня</div><a class="cursor_pointer fl_r" style="font-size:12px;color:#fff" onClick="$(\'#capricorn\').hide(); $(\'html, body\').css(\'overflow-y\', \'auto\');">Закрыть</a>'+
  '<div class="clear"></div>'+
  '<div style="left:300px; width: 606px; height: 500px; border: 0px solid #F8F8F8; overflow:hidden;"><iframe style="position:relative; width: 738px; height: 953px; right: 135px; bottom: 209px;" scrolling="yes" src="http://goroskop.open.by/capricorn/today" width="785px;"></iframe></div></div>'+
  '<div class="clear"></div>'+
'</div>'+
'<div class="clear" style="height: 0px"></div>'+
'</div>';
        var check = $('#capricorn').length;
if(!check){
   if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
   $('html, body').css('overflow-y', 'hidden');
   if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
   $('body').append(tmp);
} else
          $('#capricorn').show();
  }
}


//Vodolei
var aquarius = {
  box: function(){
        var tmp = '<div class="miniature_box" id="aquarius">'+
'<div class="miniature_pos" style="width: 606px;background: #383838;">'+
  '<div class="miniature_title fl_l apps_box_text" style="color:#fff">Гороскоп Водолея на сегодня</div><a class="cursor_pointer fl_r" style="font-size:12px;color:#fff" onClick="$(\'#aquarius\').hide(); $(\'html, body\').css(\'overflow-y\', \'auto\');">Закрыть</a>'+
  '<div class="clear"></div>'+
  '<div style="left:300px; width: 606px; height: 500px; border: 0px solid #F8F8F8; overflow:hidden;"><iframe style="position:relative; width: 738px; height: 953px; right: 135px; bottom: 209px;" scrolling="yes" src="http://goroskop.open.by/aquarius/today" width="785px;"></iframe></div></div>'+
  '<div class="clear"></div>'+
'</div>'+
'<div class="clear" style="height: 0px"></div>'+
'</div>';
        var check = $('#aquarius').length;
if(!check){
   if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
   $('html, body').css('overflow-y', 'hidden');
   if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
   $('body').append(tmp);
} else
          $('#aquarius').show();
  }
}

//Riba
var pisces = {
  box: function(){
        var tmp = '<div class="miniature_box" id="pisces">'+
'<div class="miniature_pos" style="width: 606px;background: #383838;">'+
  '<div class="miniature_title fl_l apps_box_text" style="color:#fff">Гороскоп Рыбы на сегодня</div><a class="cursor_pointer fl_r" style="font-size:12px;color:#fff" onClick="$(\'#pisces\').hide(); $(\'html, body\').css(\'overflow-y\', \'auto\');">Закрыть</a>'+
  '<div class="clear"></div>'+
  '<div style="left:300px; width: 606px; height: 500px; border: 0px solid #F8F8F8; overflow:hidden;"><iframe style="position:relative; width: 738px; height: 953px; right: 135px; bottom: 209px;" scrolling="yes" src="http://goroskop.open.by/pisces/today" width="785px;"></iframe></div></div>'+
  '<div class="clear"></div>'+
'</div>'+
'<div class="clear" style="height: 0px"></div>'+
'</div>';
        var check = $('#pisces').length;
if(!check){
   if(is_moz && !is_chrome) scrollTopForFirefox = $(window).scrollTop();
   $('html, body').css('overflow-y', 'hidden');
   if(is_moz && !is_chrome) $(window).scrollTop(scrollTopForFirefox);
   $('body').append(tmp);
} else
          $('#pisces').show();
  }
}