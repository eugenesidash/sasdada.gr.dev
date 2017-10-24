
<!--cnt!-->
<div class="cnt">
<div class="cnt_floating animation" id="mleft" >
<!--register window!-->

<div class="register_w animation" id="registerw" >
<div class="padding_register">
<div class="font_reg">Регистрация</div>
<form>
<input type="text" style="width:418px;border:1px solid #d9d4b4; padding:15px; background-color:#fff; outline:none;margin-top:15px;" maxlength="30" id="name"placeholder="Ваше имя">

<input type="text" style="width:418px;border:1px solid #d9d4b4; padding:15px; background-color:#fff; outline:none;margin-top:15px;" maxlength="30" id="lastname" placeholder="Ваша фамилия">

<input type="text" style="width:418px;border:1px solid #d9d4b4; padding:15px; background-color:#fff; outline:none;margin-top:15px;" maxlength="30" id="email" placeholder="Ваш E-mail:">

<input type="password"  style="width:418px;border:1px solid #d9d4b4; padding:15px; background-color:#fff; outline:none;margin-top:15px;" maxlength="30" id="new_pass" placeholder="Пароль">

<input type="password"  style="width:418px;border:1px solid #d9d4b4; padding:15px; background-color:#fff; outline:none;margin-top:15px;" maxlength="30" id="new_pass2" placeholder="Пароль еще раз">

<button class="butth" style="width:450px;border:1px solid #2567aa;outline:none; border-radius:4px; padding:10px; color:#fff; font-weight:bold; cursor:pointer; text-shadow:0px 1px #333; margin-top:15px;" onClick="reg.finish(); return false">Регистрация</button>

</form>
</div>
</div>
<!--register window!/////////////!-->

<div class="logo"> </div>
<div class="textlogo">Χαίρε, ω χαίρε, Ελευθεριά!</div>
<div  >
<div class="formlogin">
<div class="loginjs">

<script>
function sx12(){
	$('#registerw').css('display','none');
	}
function sx13(){
	$('#registerw').css('margin-left','630px');
	}
	
	
//окно входа
function onLogin(){
	$('#mleft').css('margin-left','0px');
document.getElementById('w_login').style.backgroundImage = "url(../images/reg/black10.png)";
document.getElementById('w_login').style.boxShadow = "inset 0px 0px 10px 1px #222";
document.getElementById('w_reg').style.backgroundImage = "url(../images/reg/bg_log.png)";
document.getElementById('w_reg').style.boxShadow = "none";
//register close
$('#registerw').css('margin-left','200%');
setTimeout('sx12();',50);
$('#wloginfomr_full').css('opacity','1');
}
//окно регистрации
function onReg(){
	$('#mleft').css('margin-left','-300px');
document.getElementById('w_login').style.backgroundImage = "url(../images/reg/bg_log.png)";
document.getElementById('w_reg').style.boxShadow = "inset 0px 0px 10px 1px #222";
document.getElementById('w_reg').style.backgroundImage = "url(../images/reg/black10.png)";
document.getElementById('w_login').style.boxShadow = "none";
//window open register
$('#registerw').css('display','block');
setTimeout('sx13();',100);
$('#wloginfomr_full').css('opacity','0');

}
</script>
<div id="w_login" onClick="onLogin();" class="w_login wforms">Вход</div>
<div id="w_reg" onClick="onReg();" class="w_reg wforms">Регистрация</div>
</div>

</div>
<div class="wloginfomr_full animation" id="wloginfomr_full">
<form class="form-3" method="POST" action="">
<p class="clearfix">
				        <label for="login"><font color="FFFFFF"><b>Ваш email</b></font></label>
				        <input style="width:288px;border:1px solid #666666;outline:none; border-radius:4px; padding:15px;" type="text" name="email" id="log_email" placeholder="Email">
				    </p>
				    <p class="clearfix">
				        <label for="password"><font color="FFFFFF"><b>Ваш пароль</b></font></label>
				        <input style="width:288px;border:1px solid #666666;outline:none; border-radius:4px; padding:15px;" type="password" name="password" id="log_password" placeholder="Пароль"> 
				    </p> 
				    <p class="clearfix">
				        <button class="butth" name="log_in" id="login_but" style="width:320px;border:1px solid #2567aa;outline:none; border-radius:4px; padding:10px; color:#fff; font-weight:bold; cursor:pointer; text-shadow:0px 1px #333;" >Вход</button>
				    </p>
					
<a class="main-auth__remember" href="/restore" rel="nofollow">Напомнить пароль</a>
		
<center>
<br></br>
<br></br>
<!--
<script type="text/javascript" src="//vk.com/js/api/openapi.js?86"></script>

<script type="text/javascript">
  VK.init({apiId: 2747932});
</script>

<!- Put this div tag to the place, where Auth block will be ->
<div id="vk_auth"></div>
<script type="text/javascript">
VK.Widgets.Auth("vk_auth", {width: "200px", authUrl: '/?go=vklogin'});
</script>
</div> --></center>

		
</form>