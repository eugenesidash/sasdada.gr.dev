<div class="search_form_tab" style="margin-top:-9px;background:#fff">
 <div class="buttonsprofile albumsbuttonsprofile buttonsprofileSecond" style="height:22px">
  <a href="/public{id}" onClick="Page.Go(this.href); return false;"><div><b>К сообществу</b></div></a>
  <a href="/pages{id}" onClick="Page.Go(this.href); return false;"><div><b>Страницы</b></div></a>
  <div class="buttonsprofileSec"><a href="/pages{id}?act=help" onClick="Page.Go(this.href); return false;"><div><b>Помощь по разметке</b></div></a></div>
  
    
 

   <div class="mgclr"></div>

 </div>
</div>
<br />
<div class="margin_top_10"></div><div class="allbar_title" style="text-align: center;border-bottom:0px;margin-bottom:0px">


На сайте смешано два вида разметки это:Html+CSS и BBCode.<br />
Для предотвращения взломов нельзя использовать JS-скрипты и PHP.

<div class="clear" style="border-bottom:1px solid #58a358;margin: 20px -12px 40px -12px;"></div>
</div>
<center><h1>Список тегов для оформления новости</h1></center>




<table  class="wikiTable wk_table">
<caption>
</caption><tbody>
<tr><th><center>Тег</center></th><th> <center>Вывод в HTML</center></th><th>  <center>Пример</center></th></tr>
<tr><td> <center>[b]Текст[/b]</center></td><td><center>< b > < / b ></center></td><td><center><b>ВДрогичине</b>
</center></tr>
<tr><td> <center> [i] Текст [/i]</center></td><td><center>< i >< / i ></center></td><td> <center><i>ВДрогичине</i>
</center></tr>
<tr><td><center>[u]Текст[/u] </center></td><td><center>< u > < / u ></center></td><td>  <center> <u>ВДрогичине</u></center></td></tr>
<tr><td><center>[url= сылка] Текст[/url]</center></td><td><center>< a url= "ссылка "> название < / a ></center></td><td>  <center><a href="#">ВДрогичине</a>
</center></td></tr>
<tr><td><center>[img= ссылка] [/img]</center></td><td><center>< img src =  " ссылка "> < / img ></center></td><td>  <center><img src="http://vdrogichine.by/android/android.png" width="50px" ></img>
</center></td></tr>
<tr><td><center>[color= цвет][/color]</center></td><td><center>< span style = " color: Цвет " >текст< / span ></td><td>  <center><span style="color:gold">ВДрогичине</span>
</center></td></tr>
<tr><td><center>[quote]Текст[/quote]</center></td><td><center>< blockquote >текст< / blockquote ></center></td><td>  <center><blockquote>ВДрогичине</blockquote>
</center></td></tr>
<tr><td><center>[table][tbody]Текст[/tbody][/table] </center></td><td><center>< table  class="wikiTable wk_table" >< tbody >текст< / tbody >< / table ></center></td><td><center><table  class="wikiTable wk_table"><tbody>ВДрогичине</tbody></table></center></td></tr>
<tr><td><center>< hr ></center></td><td><center>< hr ></center></td><td><center><hr>ВДрогичине<hr></center></td></tr>
<tr><td><center>[h6]Текст[/h6] [h5]Текст[/h5] [h4]Текст[/h4] [h3]Текст[/h3] [h2]Текст[/h2] [h1]Текст[/h1]</center></td><td><center>< h6 >< /h6> < h5 > < /h5 > < h4 >< /h4> < h3 >< /h3 > < h2 >< /h2 > < h1 >< /h1 ></center></td><td><center><h5>ВДрогичине<h5/></center></td></tr>

</tbody></table>

<center><h1>Создание таблицы</h1></center>




<table  class="wikiTable wk_table">
<caption>
</caption>
<tr><th><center>Тег</center></th><th> <center>Вывод в HTML</center></th><th>  <center>Название</center></th></tr>
<tr><td> <center>[table][/table]</center></td><td><center>< table  class="wikiTable wk_table" > содержимое  < / table ></center></td><td><center>Основа таблицы
</center></tr>
<tr><td> <center> [tr][/tr]</center></td><td><center>< tr >< / tr ></center></td><td> <center>Создание разделителя между уровнями таблицы
</center></tr>
<tr><td><center>[th][/th] </center></td><td><center>< th > < / th ></center></td><td>  <center>Темный ячейки таблицы</center></td></tr>
<tr><td><center>[td] [/td]</center></td><td><center>< td > < / td ></center></td><td>  <center>Светлые ячейки таблицы
</center></td></tr>

</table>

<table  class="wikiTable wk_table">
<tbody><tr><td>
<center><b>Создание шапки таблицы в BBCode</b></center>
<hr>
<code>
[table]
[tr][th]Ячейка шапки таблицы 1[/th][th]Ячейка шапки таблицы 2[/th][th]Ячейка шапки таблицы 3[/th][/tr]

[/table] </code>
<hr>
<br />
<center><b>Создание ячеек таблицы в BBCode</b></center>
<hr>
<code>
[tr][td]Ячейка таблицы 1[/td][td]Ячейка таблицы 2[/td][td]Ячейка таблицы 3[/td][/tr]
[tr][td]Ячейка таблицы 1[/td][td]Ячейка таблицы 2[/td][td]Ячейка таблицы 3[/td][/tr]
</code>
<hr>
<br />
<center><b>И получается вот такой BBCode таблицы </b></center>
<hr>
<code>
[table]
[tr][th]Ячейка шапки таблицы 1[/th][th]Ячейка шапки таблицы 2[/th][th]Ячейка шапки таблицы 3[/th][/tr]

[tr][td]Ячейка таблицы 1[/td][td]Ячейка таблицы 2[/td][td]Ячейка таблицы 3[/td][/tr]
[tr][td]Ячейка таблицы 1[/td][td]Ячейка таблицы 2[/td][td]Ячейка таблицы 3[/td][/tr]
[/table]
</code>
</td></tr></tbody></table>

<center><h1>Создание меню(Обычное)</h1></center>
<table  class="wikiTable wk_table">
<tr><th>Стиль</th><th>Обозначение</th></tr>

<tr><td>padding</td><td>Свойство padding позволяет задать величину поля сразу для всех сторон элемента</td></tr>
<tr><td>border-radius</td><td>Устанавливает радиус скругления уголков</td></tr>
<tr><td>margin</td><td>Свойство margin позволяет задать величину отступа сразу для всех сторон элемента или определить ее только для указанных сторон</td></tr>
</table>
<table  class="wikiTable wk_table">
<tbody><tr><td>
 <textarea class="inpst" name="text" style="min-width: 200.7px; max-width: 98.7%; width: 671px; height: 70px; margin: 0px; ">
<a href="ссылка"><img src="Адрес картинки" style="padding: 0px 0px 0px 0px; border-radius: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;"></a>
<a href="ссылка"><img src="Адрес картинки" style="padding: 0px 0px 0px 0px; border-radius: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;"></a>
<a href="ссылка"><img src="Адрес картинки" style="padding: 0px 0px 0px 0px; border-radius: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;"></a>
<a href="ссылка"><img src="Адрес картинки" style="padding: 0px 0px 0px 0px; border-radius: 0px 0px 0px 0px; margin: 0px 0px 0px 0px;"></a>
</textarea>
</td></tr></tbody></table>

<center><h1>Создание меню(2.0)</h1></center>
<table  class="wikiTable wk_table">
<tbody><tr><td>
 <textarea class="inpst" name="text" style="min-width: 200.7px; max-width: 98.7%; width: 671px; height: 342px; margin: 0px; ">

<style>
#map0 {position: relative; overflow: hidden;}
#map0 a {display: block;}
#map0 a#№Строки:hover {background: url(Адрес картинки которая будет иди поверх главной) -0px -0px;}
#map0 a#№Строки:hover {background: url(Адрес картинки которая будет иди поверх главной) -0px -00px;}
#map0 a#№Строки:hover {background: url(Адрес картинки которая будет иди поверх главной) -0px -0px;}

</style>
<div id="map0">
<img alt="" title="" src="Главная картинка">
<a id="№Строки" href="Ссылка на переход" alt="" style=" z-index: №Строки; left: 0px; top: 0px; width: 0px; height: 0px; position: absolute;"></a>
<a id="№Строки" href="Ссылка на переход" alt="" style=" z-index: №Строки; left: 0px; top: 0px; width: 0px; height: 0px; position: absolute;"></a>
<a id="№Строки" href="Ссылка на переход" alt="" style=" z-index: №Строки; left: 0px; top: 0px; width: 0px; height: 0px; position: absolute;"></a>


</div>
</textarea>
<br />
<center><b>Готовый исходник меню(2.0)</b></center>
<hr>
 <textarea class="inpst" name="text" style="min-width: 200.7px; max-width: 98.7%; width: 671px; height: 342px; margin: 0px; ">
<style>
#map0 {position: relative; overflow: hidden;}
#map0 a {display: block;}
#map0 a#l0:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -0px -5px;}
#map0 a#l1:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -0px -160px;}
#map0 a#l2:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -29px -238px;}
#map0 a#l3:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -138px -238px;}
#map0 a#l4:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -246px -238px;}
#map0 a#l5:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -29px -303px;}
#map0 a#l6:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -138px -303px;}
#map0 a#l7:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -247px -303px;}
#map0 a#l8:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -29px -365px;}
#map0 a#l9:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -138px -365px;}
#map0 a#l10:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -247px -365px;}
#map0 a#l11:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -18px -450px;}
#map0 a#l12:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -230px -450px;}
#map0 a#l13:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -18px -500px;}
#map0 a#l14:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -219px -500px;}
#map0 a#l15:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -18px -539px;}
#map0 a#l16:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -242px -539px;}
</style>
<div id="map0">
<img alt="" title="" src="/uploads/pages/mxcpx_54381894.jpg">
<a id="l0" href="#" alt="" style=" z-index: 0; left: 0px; top: 5px; width: 380px; height: 155px; position: absolute;"></a>
<a id="l1" href="#" alt="" style=" z-index: 1; left: 0px; top: 160px; width: 360px; height: 35px; position: absolute;"></a>
<a id="l2" href="#" alt="" style=" z-index: 2; left: 29px; top: 238px; width: 101px; height: 65px; position: absolute;"></a>
<a id="l3" href="#" alt="" style=" z-index: 3; left: 138px; top: 238px; width: 104px; height: 65px; position: absolute;"></a>
<a id="l4" href="#" alt="" style=" z-index: 4; left: 246px; top: 238px; width: 119px; height: 65px; position: absolute;"></a>
<a id="l5" href="#" alt="" style=" z-index: 5; left: 29px; top: 303px; width: 101px; height: 56px; position: absolute;"></a>
<a id="l6" href="#" alt="" style=" z-index: 6; left: 138px; top: 303px; width: 104px; height: 56px; position: absolute;"></a>
<a id="l7" href="#" alt="" style=" z-index: 7; left: 247px; top: 303px; width: 118px; height: 56px; position: absolute;"></a>
<a id="l8" href="#" alt="" style=" z-index: 8; left: 29px; top: 365px; width: 101px; height: 55px; position: absolute;"></a>
<a id="l9" href="#" alt="" style=" z-index: 9; left: 138px; top: 365px; width: 104px; height: 55px; position: absolute;"></a>
<a id="l10" href="#" alt="" style=" z-index: 10; left: 247px; top: 365px; width: 118px; height: 55px; position: absolute;"></a>
<a id="l11" href="#" alt="" style=" z-index: 11; left: 18px; top: 450px; width: 122px; height: 40px; position: absolute;"></a>
<a id="l12" href="#" alt="" style=" z-index: 12; left: 230px; top: 450px; width: 135px; height: 40px; position: absolute;"></a>
<a id="l13" href="#" alt="" style=" z-index: 13; left: 18px; top: 500px; width: 122px; height: 26px; position: absolute;"></a>
<a id="l14" href="#" alt="" style=" z-index: 14; left: 219px; top: 500px; width: 150px; height: 26px; position: absolute;"></a>
<a id="l15" href="#" alt="" style=" z-index: 15; left: 18px; top: 539px; width: 131px; height: 31px; position: absolute;"></a>
<a id="l16" href="#" alt="" style=" z-index: 16; left: 242px; top: 539px; width: 123px; height: 31px; position: absolute;"></a>
</textarea>
<style>
#map0 {position: relative; overflow: hidden;}
#map0 a {display: block;}
#map0 a#l0:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -0px -5px;}
#map0 a#l1:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -0px -160px;}
#map0 a#l2:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -29px -238px;}
#map0 a#l3:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -138px -238px;}
#map0 a#l4:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -246px -238px;}
#map0 a#l5:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -29px -303px;}
#map0 a#l6:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -138px -303px;}
#map0 a#l7:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -247px -303px;}
#map0 a#l8:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -29px -365px;}
#map0 a#l9:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -138px -365px;}
#map0 a#l10:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -247px -365px;}
#map0 a#l11:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -18px -450px;}
#map0 a#l12:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -230px -450px;}
#map0 a#l13:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -18px -500px;}
#map0 a#l14:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -219px -500px;}
#map0 a#l15:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -18px -539px;}
#map0 a#l16:hover {background: url(/uploads/pages/mxcpx_54381895.jpg) -242px -539px;}
</style>
<div id="map0">
<img alt="" title="" src="/uploads/pages/mxcpx_54381894.jpg">
<a id="l0" href="#" alt="" style=" z-index: 0; left: 0px; top: 5px; width: 380px; height: 155px; position: absolute;"></a>
<a id="l1" href="#" alt="" style=" z-index: 1; left: 0px; top: 160px; width: 360px; height: 35px; position: absolute;"></a>
<a id="l2" href="#" alt="" style=" z-index: 2; left: 29px; top: 238px; width: 101px; height: 65px; position: absolute;"></a>
<a id="l3" href="#" alt="" style=" z-index: 3; left: 138px; top: 238px; width: 104px; height: 65px; position: absolute;"></a>
<a id="l4" href="#" alt="" style=" z-index: 4; left: 246px; top: 238px; width: 119px; height: 65px; position: absolute;"></a>
<a id="l5" href="#" alt="" style=" z-index: 5; left: 29px; top: 303px; width: 101px; height: 56px; position: absolute;"></a>
<a id="l6" href="#" alt="" style=" z-index: 6; left: 138px; top: 303px; width: 104px; height: 56px; position: absolute;"></a>
<a id="l7" href="#" alt="" style=" z-index: 7; left: 247px; top: 303px; width: 118px; height: 56px; position: absolute;"></a>
<a id="l8" href="#" alt="" style=" z-index: 8; left: 29px; top: 365px; width: 101px; height: 55px; position: absolute;"></a>
<a id="l9" href="#" alt="" style=" z-index: 9; left: 138px; top: 365px; width: 104px; height: 55px; position: absolute;"></a>
<a id="l10" href="#" alt="" style=" z-index: 10; left: 247px; top: 365px; width: 118px; height: 55px; position: absolute;"></a>
<a id="l11" href="#" alt="" style=" z-index: 11; left: 18px; top: 450px; width: 122px; height: 40px; position: absolute;"></a>
<a id="l12" href="#" alt="" style=" z-index: 12; left: 230px; top: 450px; width: 135px; height: 40px; position: absolute;"></a>
<a id="l13" href="#" alt="" style=" z-index: 13; left: 18px; top: 500px; width: 122px; height: 26px; position: absolute;"></a>
<a id="l14" href="#" alt="" style=" z-index: 14; left: 219px; top: 500px; width: 150px; height: 26px; position: absolute;"></a>
<a id="l15" href="#" alt="" style=" z-index: 15; left: 18px; top: 539px; width: 131px; height: 31px; position: absolute;"></a>
<a id="l16" href="#" alt="" style=" z-index: 16; left: 242px; top: 539px; width: 123px; height: 31px; position: absolute;"></a>
</div>
</td></tr></tbody></table>
