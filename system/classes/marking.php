<?php
/* 
	Appointment: Парсинг данных
	File: parse.php 
 
*/

class parse{

	function BBparse($source, $preview = true){
		global $config;

		 $patterns = array(); 
       
        $patterns[0] = '/\[sup]/'; 
        $patterns[1] = '/\[\/sup]/'; 
        $patterns[2] = '/\[sub]/'; 
        $patterns[3] = '/\[\/sub]/'; 
        $patterns[4] = '/\[h1]/'; 
        $patterns[5] = '/\[\/h1]/'; 
        $patterns[6] = '/\[h2]/'; 
        $patterns[7] = '/\[\/h2]/'; 
        $patterns[8] = '/\[h3]/'; 
        $patterns[9] = '/\[\/h3]/'; 
        $patterns[10] = '/\[h4]/'; 
        $patterns[11] = '/\[\/h4]/'; 
        $patterns[12] = '/\[h5]/'; 
        $patterns[13] = '/\[\/h5]/'; 
        $patterns[14] = '/\[h6]/'; 
        $patterns[15] = '/\[\/h6]/'; 
		$patterns[16] = '/\[tbody]/';
		$patterns[17] = '/\[\/tbody]/'; 
		$patterns[18] = '/\[table]/';
		$patterns[19] = '/\[\/table]/'; 
		$patterns[20] = '/\[tr]/';
		$patterns[21] = '/\[\/tr]/'; 
		$patterns[22] = '/\[td]/';
		$patterns[23] = '/\[\/td]/'; 
		$patterns[24] = '/\[th]/';
		$patterns[25] = '/\[\/th]/'; 
		
        $replacements = array(); 

        $replacements[0] = "<sup>"; 
        $replacements[1] = "</sup>"; 
        $replacements[2] = "<sub>"; 
        $replacements[3] = "</sub>"; 
        $replacements[4] = "<h1>"; 
        $replacements[5] = "</h1>"; 
        $replacements[6] = "<h2>"; 
        $replacements[7] = "</h2>"; 
        $replacements[8] = "<h3>"; 
        $replacements[9] = "</h3>"; 
        $replacements[10] = "<h4>"; 
        $replacements[11] = "</h4>"; 
        $replacements[12] = "<h5>"; 
        $replacements[13] = "</h5>"; 
        $replacements[14] = "<h6>"; 
        $replacements[15] = "</h6>";
		$replacements[16] = "<tbody>"; 
        $replacements[17] = "</tbody>";
		$replacements[18] = "<table  class=\"wikiTable wk_table\">"; 
        $replacements[19] = "</table>";
		$replacements[20] = "<tr>"; 
        $replacements[21] = "</tr>";
		$replacements[22] = "<td>"; 
        $replacements[23] = "</td>";
		$replacements[24] = "<th>"; 
        $replacements[25] = "</th>";
		
		
		
		
		$source = str_ireplace("{theme}", "&#123;theme}", $source);
		$source = str_ireplace("[lok]", "<a href=\"ссылка\" onmouseover=\"document.image1.src='http://htmlbook.ru/example/images/sun2.png'\" onmouseout=\"document.image1.src='http://htmlbook.ru/example/images/sun1.png'\"><img src=\"http://htmlbook.ru/example/images/sun1.png\" border=\"0\" name=\"image1\"></a>", str_ireplace("[/lok]", "</a>", $source));

		$source = preg_replace("/\[list\](.*?)\[\/list\]/si", "<ul class=\"list\">\\1</ul>", $source);
        $source = preg_replace("/\[\*\](.*?)\\n/si", "<br /><li>\\1</li>", $source);
		
		$source = str_ireplace("[b]", "<b>", str_ireplace("[/b]", "</b>", $source));
		$source = str_ireplace("[i]", "<i>", str_ireplace("[/i]", "</i>", $source));
		$source = str_ireplace("[u]", "<u>", str_ireplace("[/u]", "</u>", $source));
		 $source = preg_replace('/\[url\](?:http:\/\/)?(.+)\[\/url\]/', "<a target=\"_blank\" href=\"http://$1\">$1</a>", $source);
		$source = preg_replace('/\[url\s?=\s?([\'"]?)(?:http:\/\/)?(.+)\1\](.*?)\[\/url\]/', "<a target=\"_blank\" href=\"http://$2\">$3</a>", $source);
		$source = preg_replace('/\[color\s?=\s?([\'"]?)(?:http:\/\/)?(.+)\1\](.*?)\[\/color\]/', "<span style=\"color:$2\">$3</span>", $source);
	    $source = preg_replace('/\[img\](?:http:\/\/)?(.+)\[\/img\]/', "<img src=\"http://$1\">$1</img>", $source);
		$source = preg_replace('/\[img\s?=\s?([\'"]?)(?:http:\/\/)?(.+)\1\](.*?)\[\/img\]/', "<img src=\"http://$2\">$3</img>", $source);
        $source = preg_replace($patterns, $replacements, $source);
		$source = preg_replace("#\[(left|right|center)\](.+?)\[/\\1\]#is", "<div align=\"\\1\">\\2</div>", $source);
		
		$source = preg_replace( "#\[quote\](.+?)\[/quote\]#is", "<blockquote>\\1</blockquote>", $source );
		
		if(stripos($source, "[video]") !== false || stripos($source, "[photo]") !== false || stripos($source, "[link]") !== false){
			$source = preg_replace("#\\[video\\](.*?)\\[/video\\]#ies", "\$this->BBvideo('\\1', '{$preview}')", $source);
			$source = preg_replace("#\\[photo\\](.*?)\\[/photo\\]#ies", "\$this->BBphoto('\\1', '{$preview}')", $source);
			$source = preg_replace("#\\[link\\](.*?)\\[/link\\]#ies", "\$this->BBlink('\\1')", $source);
		}
		
		return $source;
		
	}
	
	function BBvideo($source, $preview = false){
		global $config;
		
		$exp = explode('|', $source);
		$home_url = $config['home_url'];

		if(stripos($source, "{$exp[0]}|{$exp[1]}|{$home_url}") !== false){
			
			if($exp[3])
				if($exp[3] > 175)
					$width = "width=\'175\'";
				else
					$width = "width=\'{$exp[3]}\'";
					
			if($exp[4])
				if($exp[4] > 131)
					$height = "height=\'131\'";
				else
					$height = "height=\'{$exp[4]}\'";
			
			if($exp[5])
				$border = 'notes_videoborder';
				
			if($exp[6])
				$blank = 'target="_blank"';
			else
				$blank = "onClick=\"videos.show({$exp[1]}, this.href, \'/blog/view/{note-id}\'); return false\"";
			
			if($exp[7] == 1)
				$pos = "align=\"left\"";
			elseif($exp[7] == 2)
				$pos = "align=\"right\"";
			else
				$pos = "";
			
			if(!$preview){
				$link = "<a href=\"/video{$exp[0]}_{$exp[1]}_sec=notes/id={note-id}\" {$blank}>";
				$slink = "</a>";
			}

			$source = "<!--video:{$source}-->{$link}<img src=\"{$exp[2]}\" {$width} {$height} {$pos} class=\"notes_videopad {$border}\" />{$slink}<!--/video-->";
		}
		
		return $source;
	}
	
	function BBphoto($source, $preview = false){
		global $config;
		
		$exp = explode('|', $source);
		$home_url = $config['home_url'];

		if(stripos($source, "{$exp[0]}|{$exp[1]}|{$home_url}") !== false){
			
			if($exp[3] > 160)
				$exp[2] = str_replace('/c_', '/', $exp[2]);
				
			if($exp[4] > 120)
				$exp[2] = str_replace('/c_', '/', $exp[2]);
				
			if($exp[3])
				if($exp[3] > 740)
					$width = "width=\'740\'";
				else
					$width = "width=\'{$exp[3]}\'";
					
			if($exp[4])
				if($exp[4] > 547)
					$height = "height=\'547\'";
				else
					$height = "height=\'{$exp[4]}\'";
			
			if($exp[5])
				$border = 'notes_videoborder';
				
			if($exp[6])
				$blank = 'target="_blank"';
			else
				$blank = "onClick=\"Photo.Show(this.href); return false\"";
			
			if($exp[7] == 1)
				$pos = "align=\"left\"";
			elseif($exp[7] == 2)
				$pos = "align=\"right\"";
			else
				$pos = "";
				
			if($exp[8] AND !$preview AND $exp[0] AND $exp[1]){
				$link = "<a href=\"/photo{$exp[0]}_{$exp[1]}_sec=notes/id={note-id}\" {$blank}>";
				$elink = "</a>";
			} elseif($exp[8]) {
				$link = "<a href=\"{$exp[2]}\" target=\"_blank\">";
				$elink = "</a>";
			} else {
				$link = '';
				$elink = '';
			}
			
			if($exp[0] AND $exp[1])
				$source = "<!--photo:{$source}-->{$link}<img class=\"notes_videopad {$border}\" src=\"{$exp[2]}\" {$width} {$height} {$pos} />{$elink}<!--/photo-->";
			else
				$source = "<!--photo:{$source}-->{$link}<img class=\"notes_videopad {$border}\" src=\"{$exp[2]}\" {$width} {$height} {$pos} />{$elink}<!--/photo-->";
		}
		
		return $source;
	}
	
	function BBlink($source){
		$exp = explode('|', $source);
		
		if($exp[0]){
			if(!$exp[1])
				$exp[1] = $exp[0];

			$source = "<!--link:{$source}--><a href=\"{$exp[0]}\" target=\"_blank\">{$exp[1]}</a><!--/link-->";
		}
		
		return $source;
	}
	
	

   
	
	function BBdecode($source){
	
	    $patterns = array(); 
       
        $patterns[0] = '/\[sup]/'; 
        $patterns[1] = '/\[\/sup]/'; 
        $patterns[2] = '/\[sub]/'; 
        $patterns[3] = '/\[\/sub]/'; 
        $patterns[4] = '/\[h1]/'; 
        $patterns[5] = '/\[\/h1]/'; 
        $patterns[6] = '/\[h2]/'; 
        $patterns[7] = '/\[\/h2]/'; 
        $patterns[8] = '/\[h3]/'; 
        $patterns[9] = '/\[\/h3]/'; 
        $patterns[10] = '/\[h4]/'; 
        $patterns[11] = '/\[\/h4]/'; 
        $patterns[12] = '/\[h5]/'; 
        $patterns[13] = '/\[\/h5]/'; 
        $patterns[14] = '/\[h6]/'; 
        $patterns[15] = '/\[\/h6]/'; 
		$patterns[16] = '/\[tbody]/';
		$patterns[17] = '/\[\/tbody]/'; 
		$patterns[18] = '/\[table]/';
		$patterns[19] = '/\[\/table]/'; 
		$patterns[20] = '/\[tr]/';
		$patterns[21] = '/\[\/tr]/'; 
		$patterns[22] = '/\[td]/';
		$patterns[23] = '/\[\/td]/'; 
		$patterns[24] = '/\[th]/';
		$patterns[25] = '/\[\/th]/'; 
		
        $replacements = array(); 

        $replacements[0] = "<sup>"; 
        $replacements[1] = "</sup>"; 
        $replacements[2] = "<sub>"; 
        $replacements[3] = "</sub>"; 
        $replacements[4] = "<h1>"; 
        $replacements[5] = "</h1>"; 
        $replacements[6] = "<h2>"; 
        $replacements[7] = "</h2>"; 
        $replacements[8] = "<h3>"; 
        $replacements[9] = "</h3>"; 
        $replacements[10] = "<h4>"; 
        $replacements[11] = "</h4>"; 
        $replacements[12] = "<h5>"; 
        $replacements[13] = "</h5>"; 
        $replacements[14] = "<h6>"; 
        $replacements[15] = "</h6>";
		$replacements[16] = "<tbody>"; 
        $replacements[17] = "</tbody>";
		$replacements[18] = "<table  class=\"wikiTable wk_table\">"; 
        $replacements[19] = "</table>";
		$replacements[20] = "<tr>"; 
        $replacements[21] = "</tr>";
		$replacements[22] = "<td>"; 
        $replacements[23] = "</td>";
		$replacements[24] = "<th>"; 
        $replacements[25] = "</th>";

	
		
	

		$source = preg_replace("/\[list\](.*?)\[\/list\]/si", "<ul class=\"list\">\\1</ul>", $source);
        $source = preg_replace("/\[\*\](.*?)\\n/si", "<li>\\1</li>", $source);
				$source = str_ireplace("[lok]", "<a href=\"ссылка\" onmouseover=\"document.image1.src='http://htmlbook.ru/example/images/sun2.png'\" onmouseout=\"document.image1.src='http://htmlbook.ru/example/images/sun1.png'\"><img src=\"http://htmlbook.ru/example/images/sun1.png\" border=\"0\" name=\"image1\"></a>", str_ireplace("[/lok]", "</a>", $source));

		
		$source = str_ireplace("<b>", "[b]", str_ireplace("</b>", "[/b]", $source));
		$source = str_ireplace("<i>", "[i]", str_ireplace("</i>", "[/i]", $source));
		$source = str_ireplace("<u>", "[u]", str_ireplace("</u>", "[/u]", $source));
		$source = preg_replace('/\[url\](?:http:\/\/)?(.+)\[\/url\]/', "<a target=\"_blank\" href=\"http://$1\">$1</a>", $source);
		$source = preg_replace('/\[url\s?=\s?([\'"]?)(?:http:\/\/)?(.+)\1\](.*?)\[\/url\]/', "<a target=\"_blank\" href=\"http://$2\">$3</a>", $source);
		$source = preg_replace('/\[img\](?:http:\/\/)?(.+)\[\/img\]/', "<img src=\"http://$1\">$1</img>", $source);
		$source = preg_replace('/\[img\s?=\s?([\'"]?)(?:http:\/\/)?(.+)\1\](.*?)\[\/img\]/', "<img src=\"http://$2\">$3</img>", $source);
		$source = preg_replace('/\[color\s?=\s?([\'"]?)(?:http:\/\/)?(.+)\1\](.*?)\[\/color\]/', "<span style=\"color:$2\">$3</span>", $source);
        $source = preg_replace($patterns, $replacements, $source);
		$source = preg_replace("#<div align=\"(left|right|center)\">(.+?)</div>#is", "[\\1]\\2[/\\1]", $source);

		$source = preg_replace( "#\[quote\](.+?)\[/quote\]#is", "<blockquote>\\1</blockquote>", $source );
		
		$source = preg_replace( "#<blockquote>(.+?)</blockquote>#is", "[quote]\\1[/quote]", $source );
		
		if(stripos($source, "<!--photo:") !== false || stripos($source, "<!--video:") !== false || stripos($source, "<!--link:") !== false){
			$source = preg_replace("#\\<!--video:(.*?)\\<!--/video-->#ies", "\$this->BBdecodeVideo('\\1')", $source);
			$source = preg_replace("#\\<!--photo:(.*?)\\<!--/photo-->#ies", "\$this->BBdecodePhoto('\\1')", $source);
			$source = preg_replace("#\\<!--link:(.*?)\\<!--/link-->#ies", "\$this->BBdecodeLink('\\1')", $source);
		}
		
		return $source;
	
	}
	
	function BBdecodePhoto($source){
		$start = explode('-->', $source);
		$source = "[photo]{$start[0]}[/photo]";
		return $source;
	}
	
	function BBdecodeVideo($source){
		$start = explode('-->', $source);
		$source = "[video]{$start[0]}[/video]";
		return $source;
	}
	
	function BBdecodeLink($source){
		$start = explode('-->', $source);
		$source = "[link]{$start[0]}[/link]";
		return $source;
	}

}
?>