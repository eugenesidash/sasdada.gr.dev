<style>

}
a{
	color: #0000cc;
    text-decoration:none;
}

form {
  display: inline;
  margin: 0;
  padding: 0;
}
h1, h3, h4, h5{
	font-family: Verdana, Arial, georgia;
	margin:0px;
	padding-top: 5px;
	padding-bottom: 3px;
	color: black;
}
h2 {
	font-family: Verdana, Arial, georgia;
	margin:0px;
	padding-top: 5px;
	padding-bottom: 3px;
	color: silver;
}

img {
	border: 0;
}
dl.videos dt {
float: left;
width: 130px;
margin:0px;
padding:6.5px;
font-size: 11px;
font-family: Verdana, Arial;
height: 170px;
}
dl.videos dt img {
border: 3px solid #fff; /*!Thumbnail Border Back Ground Color important quvic.js-> line no. 295*/
cursor: pointer; 
}
 
#videolist {
width: 720px;
height: 350px;
margin:0px;
padding:0px;
}

.video_thumb {background-color: white; position: relative; }

.thumbbox	{ display: inline-block;
					border: 0px solid #ffffff;
					
				}
.thumbbox 	{ padding: 0px; }
.thumbbox .duration { padding: 0px 0px; right: 3px; bottom: 6px; }
.ptitle	{ font-weight:bold; color:#000; }

.duration { 
border-bottom-left-radius: 2px 2px;
border-bottom-right-radius: 2px 2px;
border-top-left-radius: 2px 2px;
border-top-right-radius: 2px 2px;

opacity: 0.75;zoom: 1;
background-color: #6d6d6d;
color: white !important;
display: inline-block;
font-size: 11px;
font-weight: bold;
height: 15px;
line-height: 15px;
vertical-align: top;
position: absolute;
border: 0px;
}

.button {
   border: 1px solid #DDD;
   border-radius: 3px;
   text-shadow: 0 1px 1px white;
   -webkit-box-shadow: 0 1px 1px #fff;
   -moz-box-shadow:    0 1px 1px #fff;
   box-shadow:         0 1px 1px #fff;
   font: bold 11px Sans-Serif;
   padding: 6px 10px;
   white-space: nowrap;
   vertical-align: middle;
   color: #666;
   background: transparent;
   cursor: pointer;
}
.button:hover, .button:focus {
   border-color: #999;
   background: -webkit-linear-gradient(top, white, #E0E0E0);
   background:    -moz-linear-gradient(top, white, #E0E0E0);
   background:     -ms-linear-gradient(top, white, #E0E0E0);
   background:      -o-linear-gradient(top, white, #E0E0E0);
   -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.25), inset 0 0 3px #fff;
   -moz-box-shadow:    0 1px 2px rgba(0,0,0,0.25), inset 0 0 3px #fff;
   box-shadow:         0 1px 2px rgba(0,0,0,0.25), inset 0 0 3px #fff;
}
.button:active {
   border: 1px solid #AAA;
   border-bottom-color: #CCC;
   border-top-color: #999;
   -webkit-box-shadow: inset 0 1px 2px #aaa;
   -moz-box-shadow:    inset 0 1px 2px #aaa;
   box-shadow:         inset 0 1px 2px #aaa;
   background: -webkit-linear-gradient(top, #E6E6E6, gainsboro);
   background:    -moz-linear-gradient(top, #E6E6E6, gainsboro);
   background:     -ms-linear-gradient(top, #E6E6E6, gainsboro);
   background:      -o-linear-gradient(top, #E6E6E6, gainsboro);
}

</style>


<body>
<script>
var quvic = {};

quvic.MAX_RESULTS_LIST = 10;


quvic.THUMBNAIL_WIDTH = 175;

quvic.THUMBNAIL_HEIGHT = 131;


quvic.PLAYER_WIDESCREEN_WIDTH = 720;

quvic.PLAYER_STANDARD_WIDTH = 540;


quvic.PLAYER_HEIGHT = 405;


quvic.VIDEO_LIST_CSS_CLASS = 'videolist';

quvic.PREVIOUS_PAGE_BUTTON = 'previousPageButton';

quvic.NEXT_PAGE_BUTTON = 'nextPageButton';

quvic.STANDARD_FEED_URL_TOP_RATED = 
    'http://gdata.youtube.com/feeds/api/standardfeeds/top_rated?';

quvic.STANDARD_FEED_URL_MOST_VIEWED = 
    'http://gdata.youtube.com/feeds/api/standardfeeds/most_viewed?';

quvic.STANDARD_FEED_URL_MOST_POPULAR = 
    'http://gdata.youtube.com/feeds/api/standardfeeds/most_popular?';

quvic.STANDARD_FEED_URL_RECENTLY_FEATURED = 
    'http://gdata.youtube.com/feeds/api/standardfeeds/recently_featured?';

quvic.VIDEO_FEED_URL = 
    'http://gdata.youtube.com/feeds/api/videos?';

quvic.QUERY_URL_MAP = {
  'top_rated' : quvic.STANDARD_FEED_URL_TOP_RATED,
 
  'most_viewed' : quvic.STANDARD_FEED_URL_MOST_VIEWED,
 
  'most_popular' : quvic.STANDARD_FEED_URL_MOST_POPULAR,
  
  'recently_featured' : quvic.STANDARD_FEED_URL_RECENTLY_FEATURED,
 
  'search' : quvic.VIDEO_FEED_URL
};

quvic.nextPage = 2;

quvic.previousPage = 0;

quvic.previousSearchTerm = '';

quvic.previousQueryType = 'search';

quvic.jsonFeed_ = null;

quvic.appendScriptTag = function(scriptSrc, scriptId, scriptCallback) {
 
  var oldScriptTag = document.getElementById(scriptId);
  if (oldScriptTag) {
    oldScriptTag.parentNode.removeChild(oldScriptTag);
  }
  var script = document.createElement('script');
  script.setAttribute('src', 
      scriptSrc + '&v=2&alt=jsonc&callback=' + scriptCallback);
  script.setAttribute('id', scriptId);
  script.setAttribute('type', 'text/javascript');
  document.getElementsByTagName('head')[0].appendChild(script);
};

quvic.listVideos = function(queryType, searchTerm, page) {
  quvic.previousSearchTerm = searchTerm; 
  quvic.previousQueryType = queryType; 
  var queryUrl = quvic.QUERY_URL_MAP[queryType];
  if (queryUrl) {
    queryUrl += 'max-results=' + quvic.MAX_RESULTS_LIST +
        '&format=5&start-index=' + (((page - 1) * quvic.MAX_RESULTS_LIST) + 1);
    if (searchTerm != '') {
      queryUrl += '&q=' + encodeURI(searchTerm);
    }
    quvic.appendScriptTag(queryUrl, 
                         'searchResultsVideoListScript', 
                         'quvic.listVideosCallback');
    quvic.updateNavigation(page);
	
  } else {
    alert('Unknown feed type specified');
  }
};

quvic.PresentVideos = function(queryType, searchTerm, page) {
  quvic.previousSearchTerm = searchTerm; 
  quvic.previousQueryType = queryType; 
  var queryUrl = quvic.QUERY_URL_MAP[queryType];
  if (queryUrl) {
    queryUrl += 'max-results=' + quvic.MAX_RESULTS_LIST +
        '&format=5&start-index=' + (((page - 1) * quvic.MAX_RESULTS_LIST) + 1);
    if (searchTerm != '') {
      queryUrl += '&q=' + encodeURI(searchTerm);
    }
    quvic.appendScriptTag(queryUrl, 
                         'searchResultsVideoListScript', 
                         'quvic.listVideosCall');
    quvic.updateNavigation(page);
   }
};

quvic.listVideosCall = function(json) {
  quvic.jsonFeed_ = json.data;
  var div = document.getElementById(quvic.VIDEO_LIST_CSS_CLASS);
var html = ['<LABEL>'];
  
  var totalitems = number_format(json.data.totalItems);
  var items = eval(json.data.itemsPerPage);
  var start = eval(json.data.startIndex);
  var end = eval(start + items - 1);
 
if ( totalitems <= end ) {
  
  document.getElementById(quvic.NEXT_PAGE_BUTTON).disabled = true;
}

  html.push(''+start+' - '+end+' of '+totalitems+' ');
  html.push('</LABEL>');
  document.getElementById('videosinfo').innerHTML = html.join('');

  var items = json.data.items || [];
  var html = ['<dl class="videos">'];
  for (var i = 0; i < items.length; i++) {
    var title = json.data.items[i].title;
    var thumbnailUrl = json.data.items[i].thumbnail.sqDefault;
    var videoID = json.data.items[i].id;
    var duration = json.data.items[i].duration;
    html.push('<dt><a href=\'index.php?go=youtubevideo&act=send&good_video_lnk=http://www.youtube.com/watch?v='+ videoID +'&title='+addslashes(title)+'&descr='+addslashes(title)+'&img='+thumbnailUrl+'\'>Добавить в мои видеозаписи</a>');
    html.push('<span class="video_thumb thumbbox"><a href="javascript:playVideo(\''+videoID+'\',\''+addslashes(title)+'\')">');
	html.push('<img src="',thumbnailUrl,'" width="120" height="90" onmouseout="mouseOutImage(this)" onmouseover="mousOverImage(this,\'',videoID,'\',1)"></a>');
	html.push('<span class="duration">',getDurationTime(duration),'</span>');
	html.push('</span>');
	html.push('<br/>', title.substr(0,37), '</dt>');}
	html.push('</dl><br style="clear: left;"/>');
   
    document.getElementById(quvic.VIDEO_LIST_CSS_CLASS).innerHTML = html.join('');
 
  if (items.length > 0) {
    loadVideo(json.data.items[0].id);
  }
};

function loadVideo(videoID) {
  swfobject.embedSWF("http://www.youtube.com/v/" + videoID + "?version=3&enablejsapi=1&playerapiid=ytplayer&fs=1&autohide=1",
  'player', quvic.PLAYER_WIDESCREEN_WIDTH, quvic.PLAYER_HEIGHT, '9.0.0', false, false, {allowScriptAccess: 'always',allowfullscreen: 'true'});
  }

quvic.listVideosCallback = function(json) {
 quvic.jsonFeed_ = json.data;
  var div = document.getElementById(quvic.VIDEO_LIST_CSS_CLASS);

  var html = ['<LABEL>'];
  
  var totalitems = number_format(json.data.totalItems);
  var items = eval(json.data.itemsPerPage);
  var start = eval(json.data.startIndex);
  var end = eval(start + items - 1);
 
if ( totalitems <= end ) {
  
  document.getElementById(quvic.NEXT_PAGE_BUTTON).disabled = true;
}

  html.push(''+start+' - '+end+' of '+totalitems+' ');
  html.push('</LABEL>');
  document.getElementById('videosinfo').innerHTML = html.join('');



  while (div.childNodes.length >= 1) {
    div.removeChild(div.firstChild);
   
    }
 
  var items = json.data.items || [];
  var html = ['<dl class="videos">'];
  for (var i = 0; i < items.length; i++) {
    var title = json.data.items[i].title;
    var thumbnailUrl = json.data.items[i].thumbnail.sqDefault;
    var videoID = json.data.items[i].id;
    var duration = json.data.items[i].duration;

    html.push('<dt><a href=\'index.php?go=youtubevideo&act=send&good_video_lnk=http://www.youtube.com/watch?v='+ videoID +'&title='+addslashes(title)+'&descr='+addslashes(title)+'\'>Добавить в мои видеозаписи</a>');
    html.push('<span class="video_thumb thumbbox"><a href="javascript:playVideo(\''+videoID+'\',\''+addslashes(title)+'\')">');
	html.push('<img src="',thumbnailUrl,'" width="120" height="90" onmouseout="mouseOutImage(this)" onmouseover="mousOverImage(this,\'',videoID,'\',1)"></a>');
	html.push('<span class="duration">',getDurationTime(duration),'</span>');
	html.push('</span>');
	html.push('<br/>', title.substr(0,37), '</dt>');}
    html.push('</dl><br style="clear: left;"/>');

    document.getElementById(quvic.VIDEO_LIST_CSS_CLASS).innerHTML = html.join('');
};
 
quvic.updateNavigation = function(page) {
  quvic.nextPage = page + 1;
  quvic.previousPage = page - 1;
  document.getElementById(quvic.NEXT_PAGE_BUTTON).style.display = 'inline';
  document.getElementById(quvic.PREVIOUS_PAGE_BUTTON).style.display = 'inline';
  if (quvic.previousPage < 1) {
    document.getElementById(quvic.PREVIOUS_PAGE_BUTTON).disabled = true;
  } else {
    document.getElementById(quvic.PREVIOUS_PAGE_BUTTON).disabled = false;
  }
  document.getElementById(quvic.NEXT_PAGE_BUTTON).disabled = false;
};

function onPlayerError(errorCode) {
        alert("An error occured of type:" + errorCode);
      }
 

function onYouTubePlayerReady(playerId) {
        ytplayer = document.getElementById("player");
        ytplayer.addEventListener("onError", "onPlayerError");
      }


function playVideo(videoID,title){
     if(document.title)
		document.title = title;
    
	ytplayer.loadVideoById(videoID);
}

function HDPlayer() {
        resizePlayer(quvic.PLAYER_WIDESCREEN_WIDTH, quvic.PLAYER_HEIGHT);
       document.getElementById("Standard").disabled = false;
       document.getElementById("Widescreen").disabled = true;
      }

function HQPlayer() {
        resizePlayer(quvic.PLAYER_STANDARD_WIDTH, quvic.PLAYER_HEIGHT);
         document.getElementById("Widescreen").disabled = false;
         document.getElementById("Standard").disabled = true;
      }

function resizePlayer(width, height) {
        var playerObj = document.getElementById("player");
        playerObj.height = height;
        playerObj.width = width;
      }

function addslashes(str) {
	str=str.replace(/\'/g,'\\\'');
	str=str.replace(/\"/g,'');
	return str;
}

function stripslashes(str) {
	str=str.replace(/\\'/g,'\'');
	return str;
}

var imname;
var timer;
function mousOverImage(name,id,nr){
	if(name)
		imname = name;
	imname.src = "http://img.youtube.com/vi/"+id+"/"+nr+".jpg";
	imname.style.border = 	'3px solid #3B5998'; /*! Thumnail Hoover Color*/
	nr++;
	if(nr > 3)
		nr = 1;
	timer =  setTimeout("mousOverImage(false,'"+id+"',"+nr+");",1000);
}
function mouseOutImage(name){
	if(name)
		imname = name;
	imname.style.border = 	'3px solid #fff'; /*! Thumnail Back Ground Color important quvic.css-> line no. 46*/
	if(timer)
		clearTimeout(timer);
}
function getDurationTime(sec)
{
	var sec_div = ''+((sec%60) | 0);
	if(sec_div.length == 1)
		sec_div = '0'+sec_div;
	return ((sec/60) | 0)+':'+sec_div;
}
 
function number_format(numstr) {
  var numstr = String(numstr);
  var re0 = /(\d+)(\d{3})($|\..*)/;
  if (re0.test(numstr))
    return numstr.replace(
      re0,
      function(str,p1,p2,p3) { return number_format(p1) + "," + p2 + p3; }
    );
  else
    return numstr;
}
</script>

<script>
/*	SWFObject v2.2 <http://code.google.com/p/swfobject/> 
	is released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/
var swfobject=function(){var D="undefined",r="object",S="Shockwave Flash",W="ShockwaveFlash.ShockwaveFlash",q="application/x-shockwave-flash",R="SWFObjectExprInst",x="onreadystatechange",O=window,j=document,t=navigator,T=false,U=[h],o=[],N=[],I=[],l,Q,E,B,J=false,a=false,n,G,m=true,M=function(){var aa=typeof j.getElementById!=D&&typeof j.getElementsByTagName!=D&&typeof j.createElement!=D,ah=t.userAgent.toLowerCase(),Y=t.platform.toLowerCase(),ae=Y?/win/.test(Y):/win/.test(ah),ac=Y?/mac/.test(Y):/mac/.test(ah),af=/webkit/.test(ah)?parseFloat(ah.replace(/^.*webkit\/(\d+(\.\d+)?).*$/,"$1")):false,X=!+"\v1",ag=[0,0,0],ab=null;if(typeof t.plugins!=D&&typeof t.plugins[S]==r){ab=t.plugins[S].description;if(ab&&!(typeof t.mimeTypes!=D&&t.mimeTypes[q]&&!t.mimeTypes[q].enabledPlugin)){T=true;X=false;ab=ab.replace(/^.*\s+(\S+\s+\S+$)/,"$1");ag[0]=parseInt(ab.replace(/^(.*)\..*$/,"$1"),10);ag[1]=parseInt(ab.replace(/^.*\.(.*)\s.*$/,"$1"),10);ag[2]=/[a-zA-Z]/.test(ab)?parseInt(ab.replace(/^.*[a-zA-Z]+(.*)$/,"$1"),10):0}}else{if(typeof O.ActiveXObject!=D){try{var ad=new ActiveXObject(W);if(ad){ab=ad.GetVariable("$version");if(ab){X=true;ab=ab.split(" ")[1].split(",");ag=[parseInt(ab[0],10),parseInt(ab[1],10),parseInt(ab[2],10)]}}}catch(Z){}}}return{w3:aa,pv:ag,wk:af,ie:X,win:ae,mac:ac}}(),k=function(){if(!M.w3){return}if((typeof j.readyState!=D&&j.readyState=="complete")||(typeof j.readyState==D&&(j.getElementsByTagName("body")[0]||j.body))){f()}if(!J){if(typeof j.addEventListener!=D){j.addEventListener("DOMContentLoaded",f,false)}if(M.ie&&M.win){j.attachEvent(x,function(){if(j.readyState=="complete"){j.detachEvent(x,arguments.callee);f()}});if(O==top){(function(){if(J){return}try{j.documentElement.doScroll("left")}catch(X){setTimeout(arguments.callee,0);return}f()})()}}if(M.wk){(function(){if(J){return}if(!/loaded|complete/.test(j.readyState)){setTimeout(arguments.callee,0);return}f()})()}s(f)}}();function f(){if(J){return}try{var Z=j.getElementsByTagName("body")[0].appendChild(C("span"));Z.parentNode.removeChild(Z)}catch(aa){return}J=true;var X=U.length;for(var Y=0;Y<X;Y++){U[Y]()}}function K(X){if(J){X()}else{U[U.length]=X}}function s(Y){if(typeof O.addEventListener!=D){O.addEventListener("load",Y,false)}else{if(typeof j.addEventListener!=D){j.addEventListener("load",Y,false)}else{if(typeof O.attachEvent!=D){i(O,"onload",Y)}else{if(typeof O.onload=="function"){var X=O.onload;O.onload=function(){X();Y()}}else{O.onload=Y}}}}}function h(){if(T){V()}else{H()}}function V(){var X=j.getElementsByTagName("body")[0];var aa=C(r);aa.setAttribute("type",q);var Z=X.appendChild(aa);if(Z){var Y=0;(function(){if(typeof Z.GetVariable!=D){var ab=Z.GetVariable("$version");if(ab){ab=ab.split(" ")[1].split(",");M.pv=[parseInt(ab[0],10),parseInt(ab[1],10),parseInt(ab[2],10)]}}else{if(Y<10){Y++;setTimeout(arguments.callee,10);return}}X.removeChild(aa);Z=null;H()})()}else{H()}}function H(){var ag=o.length;if(ag>0){for(var af=0;af<ag;af++){var Y=o[af].id;var ab=o[af].callbackFn;var aa={success:false,id:Y};if(M.pv[0]>0){var ae=c(Y);if(ae){if(F(o[af].swfVersion)&&!(M.wk&&M.wk<312)){w(Y,true);if(ab){aa.success=true;aa.ref=z(Y);ab(aa)}}else{if(o[af].expressInstall&&A()){var ai={};ai.data=o[af].expressInstall;ai.width=ae.getAttribute("width")||"0";ai.height=ae.getAttribute("height")||"0";if(ae.getAttribute("class")){ai.styleclass=ae.getAttribute("class")}if(ae.getAttribute("align")){ai.align=ae.getAttribute("align")}var ah={};var X=ae.getElementsByTagName("param");var ac=X.length;for(var ad=0;ad<ac;ad++){if(X[ad].getAttribute("name").toLowerCase()!="movie"){ah[X[ad].getAttribute("name")]=X[ad].getAttribute("value")}}P(ai,ah,Y,ab)}else{p(ae);if(ab){ab(aa)}}}}}else{w(Y,true);if(ab){var Z=z(Y);if(Z&&typeof Z.SetVariable!=D){aa.success=true;aa.ref=Z}ab(aa)}}}}}function z(aa){var X=null;var Y=c(aa);if(Y&&Y.nodeName=="OBJECT"){if(typeof Y.SetVariable!=D){X=Y}else{var Z=Y.getElementsByTagName(r)[0];if(Z){X=Z}}}return X}function A(){return !a&&F("6.0.65")&&(M.win||M.mac)&&!(M.wk&&M.wk<312)}function P(aa,ab,X,Z){a=true;E=Z||null;B={success:false,id:X};var ae=c(X);if(ae){if(ae.nodeName=="OBJECT"){l=g(ae);Q=null}else{l=ae;Q=X}aa.id=R;if(typeof aa.width==D||(!/%$/.test(aa.width)&&parseInt(aa.width,10)<310)){aa.width="310"}if(typeof aa.height==D||(!/%$/.test(aa.height)&&parseInt(aa.height,10)<137)){aa.height="137"}j.title=j.title.slice(0,47)+" - Flash Player Installation";var ad=M.ie&&M.win?"ActiveX":"PlugIn",ac="MMredirectURL="+O.location.toString().replace(/&/g,"%26")+"&MMplayerType="+ad+"&MMdoctitle="+j.title;if(typeof ab.flashvars!=D){ab.flashvars+="&"+ac}else{ab.flashvars=ac}if(M.ie&&M.win&&ae.readyState!=4){var Y=C("div");X+="SWFObjectNew";Y.setAttribute("id",X);ae.parentNode.insertBefore(Y,ae);ae.style.display="none";(function(){if(ae.readyState==4){ae.parentNode.removeChild(ae)}else{setTimeout(arguments.callee,10)}})()}u(aa,ab,X)}}function p(Y){if(M.ie&&M.win&&Y.readyState!=4){var X=C("div");Y.parentNode.insertBefore(X,Y);X.parentNode.replaceChild(g(Y),X);Y.style.display="none";(function(){if(Y.readyState==4){Y.parentNode.removeChild(Y)}else{setTimeout(arguments.callee,10)}})()}else{Y.parentNode.replaceChild(g(Y),Y)}}function g(ab){var aa=C("div");if(M.win&&M.ie){aa.innerHTML=ab.innerHTML}else{var Y=ab.getElementsByTagName(r)[0];if(Y){var ad=Y.childNodes;if(ad){var X=ad.length;for(var Z=0;Z<X;Z++){if(!(ad[Z].nodeType==1&&ad[Z].nodeName=="PARAM")&&!(ad[Z].nodeType==8)){aa.appendChild(ad[Z].cloneNode(true))}}}}}return aa}function u(ai,ag,Y){var X,aa=c(Y);if(M.wk&&M.wk<312){return X}if(aa){if(typeof ai.id==D){ai.id=Y}if(M.ie&&M.win){var ah="";for(var ae in ai){if(ai[ae]!=Object.prototype[ae]){if(ae.toLowerCase()=="data"){ag.movie=ai[ae]}else{if(ae.toLowerCase()=="styleclass"){ah+=' class="'+ai[ae]+'"'}else{if(ae.toLowerCase()!="classid"){ah+=" "+ae+'="'+ai[ae]+'"'}}}}}var af="";for(var ad in ag){if(ag[ad]!=Object.prototype[ad]){af+='<param name="'+ad+'" value="'+ag[ad]+'" />'}}aa.outerHTML='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"'+ah+">"+af+"</object>";N[N.length]=ai.id;X=c(ai.id)}else{var Z=C(r);Z.setAttribute("type",q);for(var ac in ai){if(ai[ac]!=Object.prototype[ac]){if(ac.toLowerCase()=="styleclass"){Z.setAttribute("class",ai[ac])}else{if(ac.toLowerCase()!="classid"){Z.setAttribute(ac,ai[ac])}}}}for(var ab in ag){if(ag[ab]!=Object.prototype[ab]&&ab.toLowerCase()!="movie"){e(Z,ab,ag[ab])}}aa.parentNode.replaceChild(Z,aa);X=Z}}return X}function e(Z,X,Y){var aa=C("param");aa.setAttribute("name",X);aa.setAttribute("value",Y);Z.appendChild(aa)}function y(Y){var X=c(Y);if(X&&X.nodeName=="OBJECT"){if(M.ie&&M.win){X.style.display="none";(function(){if(X.readyState==4){b(Y)}else{setTimeout(arguments.callee,10)}})()}else{X.parentNode.removeChild(X)}}}function b(Z){var Y=c(Z);if(Y){for(var X in Y){if(typeof Y[X]=="function"){Y[X]=null}}Y.parentNode.removeChild(Y)}}function c(Z){var X=null;try{X=j.getElementById(Z)}catch(Y){}return X}function C(X){return j.createElement(X)}function i(Z,X,Y){Z.attachEvent(X,Y);I[I.length]=[Z,X,Y]}function F(Z){var Y=M.pv,X=Z.split(".");X[0]=parseInt(X[0],10);X[1]=parseInt(X[1],10)||0;X[2]=parseInt(X[2],10)||0;return(Y[0]>X[0]||(Y[0]==X[0]&&Y[1]>X[1])||(Y[0]==X[0]&&Y[1]==X[1]&&Y[2]>=X[2]))?true:false}function v(ac,Y,ad,ab){if(M.ie&&M.mac){return}var aa=j.getElementsByTagName("head")[0];if(!aa){return}var X=(ad&&typeof ad=="string")?ad:"screen";if(ab){n=null;G=null}if(!n||G!=X){var Z=C("style");Z.setAttribute("type","text/css");Z.setAttribute("media",X);n=aa.appendChild(Z);if(M.ie&&M.win&&typeof j.styleSheets!=D&&j.styleSheets.length>0){n=j.styleSheets[j.styleSheets.length-1]}G=X}if(M.ie&&M.win){if(n&&typeof n.addRule==r){n.addRule(ac,Y)}}else{if(n&&typeof j.createTextNode!=D){n.appendChild(j.createTextNode(ac+" {"+Y+"}"))}}}function w(Z,X){if(!m){return}var Y=X?"visible":"hidden";if(J&&c(Z)){c(Z).style.visibility=Y}else{v("#"+Z,"visibility:"+Y)}}function L(Y){var Z=/[\\\"<>\.;]/;var X=Z.exec(Y)!=null;return X&&typeof encodeURIComponent!=D?encodeURIComponent(Y):Y}var d=function(){if(M.ie&&M.win){window.attachEvent("onunload",function(){var ac=I.length;for(var ab=0;ab<ac;ab++){I[ab][0].detachEvent(I[ab][1],I[ab][2])}var Z=N.length;for(var aa=0;aa<Z;aa++){y(N[aa])}for(var Y in M){M[Y]=null}M=null;for(var X in swfobject){swfobject[X]=null}swfobject=null})}}();return{registerObject:function(ab,X,aa,Z){if(M.w3&&ab&&X){var Y={};Y.id=ab;Y.swfVersion=X;Y.expressInstall=aa;Y.callbackFn=Z;o[o.length]=Y;w(ab,false)}else{if(Z){Z({success:false,id:ab})}}},getObjectById:function(X){if(M.w3){return z(X)}},embedSWF:function(ab,ah,ae,ag,Y,aa,Z,ad,af,ac){var X={success:false,id:ah};if(M.w3&&!(M.wk&&M.wk<312)&&ab&&ah&&ae&&ag&&Y){w(ah,false);K(function(){ae+="";ag+="";var aj={};if(af&&typeof af===r){for(var al in af){aj[al]=af[al]}}aj.data=ab;aj.width=ae;aj.height=ag;var am={};if(ad&&typeof ad===r){for(var ak in ad){am[ak]=ad[ak]}}if(Z&&typeof Z===r){for(var ai in Z){if(typeof am.flashvars!=D){am.flashvars+="&"+ai+"="+Z[ai]}else{am.flashvars=ai+"="+Z[ai]}}}if(F(Y)){var an=u(aj,am,ah);if(aj.id==ah){w(ah,true)}X.success=true;X.ref=an}else{if(aa&&A()){aj.data=aa;P(aj,am,ah,ac);return}else{w(ah,true)}}if(ac){ac(X)}})}else{if(ac){ac(X)}}},switchOffAutoHideShow:function(){m=false},ua:M,getFlashPlayerVersion:function(){return{major:M.pv[0],minor:M.pv[1],release:M.pv[2]}},hasFlashPlayerVersion:F,createSWF:function(Z,Y,X){if(M.w3){return u(Z,Y,X)}else{return undefined}},showExpressInstall:function(Z,aa,X,Y){if(M.w3&&A()){P(Z,aa,X,Y)}},removeSWF:function(X){if(M.w3){y(X)}},createCSS:function(aa,Z,Y,X){if(M.w3){v(aa,Z,Y,X)}},addDomLoadEvent:K,addLoadEvent:s,getQueryParamValue:function(aa){var Z=j.location.search||j.location.hash;if(Z){if(/\?/.test(Z)){Z=Z.split("?")[1]}if(aa==null){return L(Z)}var Y=Z.split("&");for(var X=0;X<Y.length;X++){if(Y[X].substring(0,Y[X].indexOf("="))==aa){return L(Y[X].substring((Y[X].indexOf("=")+1)))}}}return""},expressInstallCallback:function(){if(a){var X=c(R);if(X&&l){X.parentNode.replaceChild(l,X);if(Q){w(Q,true);if(M.ie&&M.win){l.style.display="block"}}if(E){E(B)}}a=false}}}}();
</script>

<center>
<div style="width: 720px;">
</div>  
<div id="playerContainer" style="width: 720px;"> 
<object id="player"></object>
</div> 
<br> 
<div id="videoSize"> 
  <input  class="button" type="button" id="Widescreen" value="широкоэкранный" onClick="javascript:HDPlayer()" disabled="true"></input> 
  <input class="button" type="button" id="Standard" value="стандартный" onClick="javascript:HQPlayer()"></input> 
</div><br>
<div id="searchForm">
 <form class="blocks" id="searchForm" onSubmit="quvic.listVideos('search', this.searchTerm.value, 1); return false;"> 
               <input name="searchTerm" type="text" class="fave_input" value="" style="width: 280px;"> 
        <input class="button" type="submit" value="поиск"> 
      </form>
</div>
<br>
<div align="center">
    <a href="#" onClick="quvic.listVideos('recently_featured','',1); return false;"><b>Недавно просмотренные</b></a> |
	<a href="#" onClick="quvic.listVideos('top_rated','',1); return false;"><b>Лучшие</b></a> |
    <a href="#" onClick="quvic.listVideos('most_viewed','',1); return false;"><b>Самые популярные</b></a> |
    <a href="#" onClick="quvic.listVideos('most_popular','',1); return false;"><b>Популярное</b></a>
	</div>
<br><br>

 <div id="searchResultsNavigation" align="right"><LABEL id="videosinfo" align="right"></LABEL> <form id="navigationForm"><input class="button" type="button" id="previousPageButton" onClick="quvic.listVideos(quvic.previousQueryType, quvic.previousSearchTerm, quvic.previousPage);" value="<< назад" style="display: none;"></input><input class="button" type="button" id="nextPageButton" onClick="quvic.listVideos(quvic.previousQueryType, quvic.previousSearchTerm, quvic.nextPage);" value="вперед >>" style="display: none;"></input></form></div>

 
<div id="videolist"> 
<SCRIPT language=JavaScript type=text/javascript> 
			<!--
quvic.PresentVideos('recently_featured','',1);
//--> 
		</SCRIPT> 
</div> 
<div class="clear"></div>
<br>

<br>
</center>