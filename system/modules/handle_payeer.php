<?php
if(!defined('MOZG'))
	die('Hacking attempt!');

if($ajax == 'yes')
	NoAjaxQuery();


if($logged){
	/*
	<form method="GET" action="//payeer.com/api/merchant/m.php">
<input type="hidden" name="m_shop" value="{shop_id}">
<input type="hidden" name="m_orderid" value="{user_id}">
<input style="border: 1px solid rgb(189, 189, 189);
height: 20px;
padding: 1px;
margin-bottom: 5px;" type="text" name="m_amount" placeholder="Укажите сумму" value="">
<input type="hidden" name="m_curr" value="RUB">

<input type="hidden" name="m_desc" value="{deskript}">
<input type="hidden" name="m_sign" value="{m_sign}"><br>
<input style="background: rgb(223, 106, 106);
width: 155px;
border: none;
color: white;
font-size: 18px;" type="submit" name="m_process" value="Попольнить" />
</form>
	*/
	$result = "Возникла ошибка";
	
	if(isset($_POST['m_amount'])) {
		$money = number_format((int)$_POST['m_amount'], 2, '.', '');
		include_once 'variable_secret_key.php';
		$m_shop = '17571076';
		$m_orderid = $user_info['user_id'];
		$m_amount = $money;
		$m_curr = 'RUB';
		$m_desc = base64_encode("Покупка голосов в соц. сети на движке Vii-Engine");
		$m_key = $secret_key;

		$arHash = array(
			$m_shop,
			$m_orderid,
			$m_amount,
			$m_curr,
			$m_desc,
			$m_key
		);
		$sign = strtoupper(hash('sha256', implode(":", $arHash)));
		
		$result = <<<H
		<p>Купить голосов на сумму: {$money}р.</p>
		<form method="GET" action="//payeer.com/api/merchant/m.php">
<input type="hidden" name="m_shop" value="{$m_shop}">
<input type="hidden" name="m_orderid" value="{$m_orderid}">
<input style="border: 1px solid rgb(189, 189, 189);
height: 20px;
padding: 1px;
margin-bottom: 5px;" type="hidden" name="m_amount" placeholder="Укажите сумму" value="{$money}">
<input type="hidden" name="m_curr" value="RUB">

<input type="hidden" name="m_desc" value="{$m_desc}">
<input type="hidden" name="m_sign" value="{$sign}"><br>
<input style="background: rgb(223, 106, 106);
width: 155px;
border: none;
color: white;
font-size: 18px;" type="submit" name="m_process" value="Попольнить" />
</form>
H;
		
		
	}
	
	$tpl->load_template('handle_payeer.tpl');
	$tpl->set('{result}', $result);
	$tpl->compile('content');
			
} 
else {
	header("Location: index.php"); // Если пользователь не авторизирован, отправляем на главную страницу
	exit;
}
?>

