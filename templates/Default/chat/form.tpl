<script language="javascript" type="text/javascript">
<!--
var ie=document.all?1:0;
var ns=document.getElementById&&!document.all?1:0;

function InsertSmile(SmileId)
{
    if(ie)
    {
    document.all.message.focus();
    document.all.message.value+=" "+SmileId+" ";
    }

    else if(ns)
    {
    document.forms['guestbook'].elements['message'].focus();
    document.forms['guestbook'].elements['message'].value+=" "+SmileId+" ";
    }

    else
    alert("Ваш браузер не поддерживается!");
}
// -->
</script>

<div style="background: #f5f5f5;padding: 10px;">
<form method="post" name="guestbook">
<textarea name="message" class="videos_input wysiwyg_inpt fl_l im_msg_texta" id="textcom" style="width:735px;height:20px" placeholder="Введите Ваше сообщение.." onkeypress="if(event.keyCode == 10 || (event.keyCode == 13)) chatz.send()"></textarea>

<div class="button_div fl_r" style="margin-left: 30px;margin-top: 2.5px;"><button onclick="chatz.send(); return false" id="msg_send">Отправить</button></div>


<table>
<tr>
    <td style="cursor: pointer;" onclick='InsertSmile(":)")'><img src='http://www.kolobok.us/smiles/icq/smile.gif'></td>
    <td style="cursor: pointer;" onclick='InsertSmile("xD")'><img src='http://www.kolobok.us/smiles/icq/biggrin.gif'></td>
    <td style="cursor: pointer;" onclick='InsertSmile("8)")'><img src='http://www.kolobok.us/smiles/icq/cool.gif'></td>
<td style="cursor: pointer;" onclick='InsertSmile(":*")'><img src='http://www.kolobok.us/smiles/icq/kiss.gif'></td>
<td style="cursor: pointer;" onclick='InsertSmile(":P")'><img src='http://www.kolobok.us/smiles/icq/blum1.gif'></td>
</tr>
</table>

</form>
<div class="clear"></div>
</div>


<iframe style="border:1px solid #009CFF;overflow:hidden;border-radius:5px;-webkit-border-radius:5px;-moz-border-radius: 5px;" frameborder="0" scrolling="no" src="http://lovi.fm/mini/?c=3&a=1&r=1&h=165&s=1092,1090,1281,1275,1843,1727,871" width="770" height="165"></iframe>
