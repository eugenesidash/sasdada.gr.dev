<?php
define("MOZG", true);

include 'system/classes/mysql.php';
include 'system/data/db.php';
		include_once 'variable_secret_key.php';
		$m_key = $secret_key;
		$arHash = array($_POST['m_operation_id'],
		$_POST['m_operation_ps'],
		$_POST['m_operation_date'],
		$_POST['m_operation_pay_date'],
		$_POST['m_shop'],
		$_POST['m_orderid'],
		$_POST['m_amount'],
		$_POST['m_curr'],
		$_POST['m_desc'],
		$_POST['m_status'],
		$m_key);
		$sign_hash = strtoupper(hash('sha256', implode(":", $arHash)));
		
		$id   = abs((int)$_POST['m_orderid']);
		$sum  = abs((int)$_POST['m_amount']);
		$date = time();
		
		
		if($sum == 300) {
			$sum = 500;
		}
		elseif($sum == 600) {
			$sum = 1000;
		}
		elseif($sum == 900) {
			$sum = 1500;
		}
		
		$script = "
		<script type='text/javascript'>
			function setLocation() {
				document.location.href = 'payeer';
			}
		</script>
		";
		
		if ($_POST["m_sign"] == $sign_hash && $_POST['m_status'] == "success") {
			$db->query("UPDATE `".PREFIX."_users` SET user_balance = user_balance + '{$sum}' WHERE user_id = '{$id}'");
			$db->query("INSERT INTO `". PREFIX ."_payments` (payment_user, payment_datecreat, payment_money, payment_cont, payment_system) VALUES ('$id', '$date', '$sum', 'оплачен', 'payeer')");
			
			$file = fopen("order-payeer.txt", "a+");
			fwrite($file, "ID Пользователя: $id; Сумма: $sum; Дата: $date\n\r");
			fclose($file);
			
		}
	
	
		echo $script;

	

?>