<?php
//global site name		
$siteName = "Ada Nostra";
$mainlang = 'sr';

$siteUrl = "https://adanostra.com";

//posjeceni url
$visitor_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "http" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

function switchLang($currentLang, $otherLang) {
	global $visitor_link;
	$replacedUrl = str_replace($currentLang, $otherLang, $visitor_link);
	return $replacedUrl;
}

// uklanjanje parametara url-a
$url = strtok($visitor_link, '?');
// folder/jezik 
$language = basename(dirname($url));
//$lang = $language;
//echo $language;
$pagename = basename($url);
//naziv stranice/fajla bez ekstenzije
//$pagename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $pagename); // potrebno u slucaju da url sadrzi .php ekstenziju
//include odgovarajuceg jezika
include('lang/lang-'.$language.'.php');
// include('lang/lang-en.php');
$jezici = array_filter(scandir('./lang'), function ($item) {
	return !is_dir('./lang/' . $item);
});
function activePage($currect_page){
	$url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
	$url = end($url_array);  
	if($currect_page == $url){
		echo 'active'; //class name in css 
	} 
}

//multijezicki linkovi
$langlinks = array();
foreach ($jezici as $jezik) {
	$jezik = preg_replace('/\\.[^.\\s]{3,4}$/', '', $jezik);
	$jezik = str_replace('lang-', '', $jezik);
	array_push($langlinks, $jezik);
}

//redirekcija ako nije setovan jezik
if (is_null($lang)) {
	flush();
	header("Location: " . $mainlang . "/home.php", true, 301);
	die('should have redirected by now');
}
?>
