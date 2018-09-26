<?php	
include('../pass_mag.php');




$filename = "schet.txt";
$handle = fopen($filename, "r");
if(!$handle){exit();}
$schet = fread($handle, filesize($filename));
fclose($handle);


if($schet > 139){
	exit();
}




//$url = "/home/users/f/freestyle/domains/amost.ivan-rezume.tk/image/catalog/";
$url = "/home/users/f/freestyle/domains/vubor-santehniki.ru/image/catalog/";





$url_skachivania = "https://santehnika-online.ru/dushevaja_programma/?PAGEN_1=";


// vanny   sifonu    komplektujushhie_dlja_vann   aksessuary       polotencesushiteli      unitazy      rakoviny       smesiteli     dushevaja_programma
$catalog = "dushevaja_programma";

// akrilovye  image  korziny_dlya_belya    kryuchki    mylnitsy     stakany    dozatory_dlya_zhidkogo_myla       dozatory_dlya_zhidkogo_myla      dozatory_dlya_zhidkogo_myla_vstraivaemye
// shtory_dlya_vannoy     zerkalo_kosmeticheskoe     derzhatel_dlya_salfetok      sushilki_dlya_belya        gidroyorshiki        derzhateli_dlya_gazet      derjateli_dlya_zapasnyh_rulonov
// derzhatel_dlya_stakanov       derzhatel_dlya_fena       derjateli_osvejitelya_vozduha        derzhatel_dlya_tualetnoy_bumagi       dispensery_dlya_vatnyh_diskov      ershiki
// karnizy_dlya_vannoy     kovriki        konteynery       kruchki_dlya_shtor        podstavki_dlya_predmetov       polki       polotentsederzhateli        poruchni     skrebki
// stoyki     stoliki      sushilki_dlya_belya       sidenya     tovary_dlya_bani      urny       nabory
// akrilovye        chugunnye         stalnye         iz_iskusstvennogo_kamnya
$nazvaie_papki = "image";


// Акриловая ванна      Сифоны      Комплектующие для ванны      Полотенцесушители
// Корзины для белья    Крючки для ванной      Мыльницы      Стаканы для ванной   Дозаторы для жидкого мыла      Встраиваемые дозаторы для мыла    
// Шторы для ванной   Косметические зеркала   Держатели для салфеток      Сушилки для белья     Вешалки для полотенец      Гидроершики        Держатели для газет и журналов    Держатели для запасных рулонов
// Держатели для стаканов       Держатели для фена      Держатели освежителя воздуха        Держатели для туалетной бумаги      Диспенсеры для ватных дисков       Ершики
// Карнизы для ванной       Коврики        Контейнеры     Крючки для штор       Подставки для предметов      Полки в ванную комнату        Полотенцедержатели        Поручни для ванной       Скребки
// Стойки для ванной     Столики для ванной     Сушилки для белья     Сиденья      Товары для бани       Урны для мусора     Наборы для ванной комнаты
// Акриловые ванны      Чугунные ванны          Стальные ванны     Ванны из искусственного камня     Унитазы          Раковины       Смесители       Душ
$name_category = "Душ";








function translit($str)
{
    $tr = array(
	"А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
	"Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
	"Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
	"О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
	"У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
	"Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
	"Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
	"в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
	"з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
	"м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
	"с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
	"ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
	"ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
	"."=>"_"," "=>"_","?"=>"_","/"=>"_","\\"=>"_",
	"*"=>"_",":"=>"_","*"=>"_","\""=>"_","<"=>"_",
	">"=>"_","|"=>"_", "'"=>"_", "`"=>"_"
        );
	return strtr($str,$tr);
}
    
function zamenit_probel($str)
{
    $tr = array(
	" "=>""
    );
    return strtr($str,$tr);
}















//считываем с сайта сантехника-онлайн
$filename = fopen($url_skachivania.$schet, "r");
while (!feof($filename)) {
	$stroka .= fgets($filename, 4096);
}
fclose($filename);



















// находим в документе ССЫЛКИ НА ТОВАРЫ
$stranicu_block_1 = explode("<div class=\"vidname \">", $stroka);
$stranicu_block_2 = array();
$stranicu_block_3 = array();


for ($y=1; $y<sizeof($stranicu_block_1); $y++){
	$stranica_do = strpos($stranicu_block_1[$y], "</a>");
	$stranica = trim(substr($stranicu_block_1[$y], 0, $stranica_do));	
	
	array_push($stranicu_block_2, $stranica);
}


print_r($stranicu_block_2);


for ($y=0; $y<sizeof($stranicu_block_2); $y++){
	$stranica_ot = strpos($stranicu_block_2[$y], "href=\"");
	$stranica_do = strpos($stranicu_block_2[$y], "\" data-cnt");
	
	
	echo "ot = ".$stranica_ot."\n";
	echo "do = ".$stranica_do."\n";
	
	//$stranica = substr($stranicu_block_2[$y], $stranica_ot + 6, $stranica_do);
	$stranica = substr($stranicu_block_2[$y], 0, $stranica_do);
	$stranica = substr($stranica, $stranica_ot + 6);
	
	array_push($stranicu_block_3, $stranica);
}








	
for ($j=0; $j<=sizeof($stranicu_block_3); $j++){

//for ($j=0; $j<=1; $j++){
		
		//   /product/akrilovaya_vanna_riho_miami_180_1656309/
		$stroka = '';
		$filename = fopen("https://santehnika-online.ru".$stranicu_block_3[$j], "r");
		while (!feof($filename)) {
			$stroka .= fgets($filename, 4096);
		}
		fclose($filename);
		
		
		
		
		
		
		
		
		
		//Название
		//<h1 itemprop="name">Акриловая ванна Triton Бэлла L</h1>
		
		$name_ot = strpos($stroka, "<h1 itemprop=\"name\">");
		$name_do = strpos($stroka, '</h1>');
		$name = trim(strip_tags(substr($stroka, $name_ot, $name_do - $name_ot)));
		echo "Название = ".$name."<br>\n";
		
		$name_img = strtolower(substr(translit($name), 0, 90));
		echo "Название_картинки = ".$name_img."<br>\n";
		
		
		
		
		
		
		
		
		
		
		
		
		// Цена
		$poisk_cena = eregi("<div class=\"newprice \"", $stroka);
		if($poisk_cena == 1){
			$cena_ot = strpos($stroka, "<div class=\"newprice \"");
			$cena_do = strpos($stroka, " <div id=\"price_order\"");
			$cena_1 = trim(strip_tags(substr($stroka, $cena_ot, $cena_do - $cena_ot)." >"));
			$cena_2 = trim(substr($cena_1, 0, -3));
			
			$cena_2_new = trim(substr($cena_2, 0, -4));
			
			$cena_3 = trim(substr($cena_2_new, 0, -3));
			$cena_4 = trim(substr($cena_2_new, -3));
			
			$cena = $cena_3.$cena_4;
			
			echo "Цена = ".$cena."<br>\n";
		}
		else{
			$cena_ot = strpos($stroka, "<div class=\"price\">");
			$cena_do = strpos($stroka, " <div id=\"price_order\"");
			$cena_1 = trim(strip_tags(substr($stroka, $cena_ot, $cena_do - $cena_ot)." >"));
			$cena_2 = trim(substr($cena_1, 0, -3));
			
			$cena_2_new = trim(substr($cena_2, 0, -4));
			
			$cena_3 = trim(substr($cena_2_new, 0, -3));
			$cena_4 = trim(substr($cena_2_new, -3));
			
			$cena = $cena_3.$cena_4;
			
			echo "Цена = ".$cena."<br>\n";
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		// Атрибуты - часть 1
		
		$atributu_chast_1_block_ot = strpos($stroka, "<div class=\"leftsubcol\">");
		$atributu_chast_1_block_do = strpos($stroka, "<div class=\"rightsubcol\">");
		$atributu_chast_1_block = substr($stroka, $atributu_chast_1_block_ot, $atributu_chast_1_block_do - $atributu_chast_1_block_ot);
		
		
		
		$atributu_parametr_chast_1 = explode("<span class=\"property_name\">", $atributu_chast_1_block);
		$atributu_parametr_chast_1_clear = array();
		
		for ($y=1; $y<sizeof($atributu_parametr_chast_1); $y++){
			$atributu_do = strpos($atributu_parametr_chast_1[$y], "<span class=\"property_value\"");
			$atributu_parametr = trim(strip_tags(substr($atributu_parametr_chast_1[$y], 0, $atributu_do)));
			
			//echo $atributu_parametr."\n";
			
			array_push($atributu_parametr_chast_1_clear, $atributu_parametr);
		}
		
		
		
		$atributu_value_chast_1 = explode("<span class=\"property_value\"", $atributu_chast_1_block);
		$atributu_value_chast_1_clear = array();
		
		for ($y=1; $y<sizeof($atributu_value_chast_1); $y++){
			$atributu_do = strpos($atributu_value_chast_1[$y], "</li>");
			$atributu_value = trim(strip_tags("<tag ".substr($atributu_value_chast_1[$y], 0, $atributu_do)));
			array_push($atributu_value_chast_1_clear, $atributu_value);
		}
		
		
		for ($y=0; $y<=sizeof($atributu_parametr_chast_1_clear); $y++){
			if($atributu_parametr_chast_1_clear[$y] == "Код товара:"){
			}
			else if($atributu_parametr_chast_1_clear[$y] == "Производство:"){
				$proizvodstvo = $atributu_value_chast_1_clear[$y];
			}
			else if($atributu_parametr_chast_1_clear[$y] == "Серия:"){
				$seria = $atributu_value_chast_1_clear[$y];
			}
			else if($atributu_parametr_chast_1_clear[$y] == "Модель:"){
				$model = $atributu_value_chast_1_clear[$y];
			}
			else if($atributu_parametr_chast_1_clear[$y] == "Страна:"){
				$strana = $atributu_value_chast_1_clear[$y];
			}
		}
		
		echo "SERIA = ".$seria;
		
		
		
		
		// Проверяю есть такой ПРОИЗВОДИТЕЛЬ $proizvodstvo
		// Если не существует добавляю в базу и узнаю ID производителя
		// таблица oc_manufacturer
		// manufacturer_id 	name 	image 	sort_order 
		$result = mysql_query("SELECT * FROM `oc_manufacturer` WHERE `name` LIKE '%".$proizvodstvo."%'");
		$num_rows = mysql_num_rows($result);
		
		if($num_rows == 0){
			mysql_query("INSERT INTO `oc_manufacturer` (`manufacturer_id`, `name`, `image`, `sort_order`) VALUES (NULL, '".$proizvodstvo."', '', '0')");
		}
		
		$result = mysql_query("SELECT * FROM `oc_manufacturer` WHERE `name` LIKE '%".$proizvodstvo."%'");
		$row = mysql_fetch_assoc($result);
		$manufacturer_id = $row['manufacturer_id'];
		echo "manufacturer_id = ".$manufacturer_id;
		$num_rows = 0;
		
		
		
		
		
		
		
		
		
		
		
		echo '$name_category = '.$name_category;
		
		
		
		
		// 001 Проверяю есть ли КАТЕГОРИИ:  $name_category -> $proizvodstvo -> $seria
		// Если не существует добавляю в базу и узнаю ID производителя
		
		// таблица oc_category_description
		// category_id 	language_id 	name 	description 	meta_title 	meta_description 	meta_keyword
		
		// таблица oc_category
		// category_id 	image 	parent_id 	top 	column 	sort_order 	status 	date_added 	date_modified
		
		// таблица oc_category_path
		// category_id    path_id    level
		
		// таблица oc_category_to_layout
		// category_id    store_id   layout_id
		
		// таблица oc_category_to_store
		// category_id    store_id
		
		
		
		
		// Проверяю существует категория $name_category
		// если нет, добавляю.
		
		$result = mysql_query("SELECT category_id FROM `oc_category_description` WHERE `name` LIKE '%".$name_category."%'");
		$num_rows = mysql_num_rows($result);
		
		echo 'XXXXXXXXXXXXXXXX$num_rows = '.$num_rows;
		
		
		if($num_rows == 0){
			mysql_query("INSERT INTO `oc_category` (`category_id`, `image`, `parent_id`, `top`, `column`, `sort_order`, `status`, `date_added`, `date_modified`) VALUES (NULL, '', '0', '1', '1', '1', '1', '".date(Y)."-".date(m)."-".date(d)." ".date(h).":".date(i).":".date(s)."', '".date(Y)."-".date(m)."-".date(d)." ".date(h).":".date(i).":".date(s)."')");
			
			$result = mysql_query("SELECT MAX(category_id) FROM `oc_category`");
			$row = mysql_fetch_assoc($result);
			$max_id_category_name_category = $row['MAX(category_id)'];
			
			echo '$max_id_category_name_category = '.$max_id_category_name_category;
			
			mysql_query("INSERT INTO `oc_category_description` (`category_id`, `language_id`, `name`, `description`, `meta_title`, `meta_description`, `meta_keyword`) VALUES ('".$max_id_category_name_category."', '1', '".$name_category."', 'Example of category description', '".$name_category."', '".$name_category."', '')");
			
			mysql_query("INSERT INTO `oc_category_path` (`category_id`, `path_id`, `level`) VALUES ('".$max_id_category_name_category."', '".$max_id_category_name_category."', '0')");
			
			mysql_query("INSERT INTO `oc_category_to_layout` (`category_id`, `store_id`, `layout_id`) VALUES ('".$max_id_category_name_category."', '0', '0')");
			mysql_query("INSERT INTO `oc_category_to_store` (`category_id`, `store_id`) VALUES ('".$max_id_category_name_category."', '0')");
		}
		else{
			$row = mysql_fetch_assoc($result);
			$max_id_category_name_category = $row['category_id'];
		}
		$num_rows = 0;
		
		
		
		
		
		
		
		
		// Проверяю существует категория $proizvodstvo
		// если нет, добавляю.
		
		$result = mysql_query("SELECT category_id FROM `oc_category_description` WHERE `name` LIKE '%".$proizvodstvo."%' AND category_id IN (SELECT category_id FROM `oc_category` WHERE `parent_id` = ".$max_id_category_name_category.")");
		$num_rows = mysql_num_rows($result);
		
		
		if($num_rows == 0){
			mysql_query("INSERT INTO `oc_category` (`category_id`, `image`, `parent_id`, `top`, `column`, `sort_order`, `status`, `date_added`, `date_modified`) VALUES (NULL, '', '".$max_id_category_name_category."', '1', '1', '1', '1', '".date(Y)."-".date(m)."-".date(d)." ".date(h).":".date(i).":".date(s)."', '".date(Y)."-".date(m)."-".date(d)." ".date(h).":".date(i).":".date(s)."')");
			
			$result = mysql_query("SELECT MAX(category_id) FROM `oc_category`");
			$row = mysql_fetch_assoc($result);
			$max_id_category_proizvodstvo = $row['MAX(category_id)'];
			
			mysql_query("INSERT INTO `oc_category_description` (`category_id`, `language_id`, `name`, `description`, `meta_title`, `meta_description`, `meta_keyword`) VALUES ('".$max_id_category_proizvodstvo."', '1', '".$proizvodstvo."', 'Example of category description', '".$proizvodstvo."', '".$proizvodstvo."', '')");
			
			mysql_query("INSERT INTO `oc_category_path` (`category_id`, `path_id`, `level`) VALUES ('".$max_id_category_proizvodstvo."', '".$max_id_category_name_category."', '0')");
			mysql_query("INSERT INTO `oc_category_path` (`category_id`, `path_id`, `level`) VALUES ('".$max_id_category_proizvodstvo."', '".$max_id_category_proizvodstvo."', '1')");
			
			mysql_query("INSERT INTO `oc_category_to_layout` (`category_id`, `store_id`, `layout_id`) VALUES ('".$max_id_category_proizvodstvo."', '0', '0')");
			mysql_query("INSERT INTO `oc_category_to_store` (`category_id`, `store_id`) VALUES ('".$max_id_category_proizvodstvo."', '0')");
		}
		else{
			$row = mysql_fetch_assoc($result);
			$max_id_category_proizvodstvo = $row['category_id'];
		}
		$num_rows = 0;
		
		
		
		
		
		
		
		
		
		
		
		// Проверяю существует категория $seria
		// если нет, добавляю.
			
		if($seria != ""){
			$result = mysql_query("SELECT category_id FROM `oc_category_description` WHERE `name` LIKE '%".$seria."%' AND category_id IN (SELECT category_id FROM `oc_category` WHERE `parent_id` = ".$max_id_category_proizvodstvo.")");
			$num_rows = mysql_num_rows($result);
			
			
			if($num_rows == 0){
				mysql_query("INSERT INTO `oc_category` (`category_id`, `image`, `parent_id`, `top`, `column`, `sort_order`, `status`, `date_added`, `date_modified`) VALUES (NULL, '', '".$max_id_category_proizvodstvo."', '1', '1', '1', '1', '".date(Y)."-".date(m)."-".date(d)." ".date(h).":".date(i).":".date(s)."', '".date(Y)."-".date(m)."-".date(d)." ".date(h).":".date(i).":".date(s)."')");
				
				$result = mysql_query("SELECT MAX(category_id) FROM `oc_category`");
				$row = mysql_fetch_assoc($result);
				$max_id_category_seria = $row['MAX(category_id)'];
				
				mysql_query("INSERT INTO `oc_category_description` (`category_id`, `language_id`, `name`, `description`, `meta_title`, `meta_description`, `meta_keyword`) VALUES ('".$max_id_category_seria."', '1', '".$seria."', 'Example of category description', '".$seria."', '".$seria."', '')");
				
				mysql_query("INSERT INTO `oc_category_path` (`category_id`, `path_id`, `level`) VALUES ('".$max_id_category_seria."', '".$max_id_category_name_category."', '0')");
				mysql_query("INSERT INTO `oc_category_path` (`category_id`, `path_id`, `level`) VALUES ('".$max_id_category_seria."', '".$max_id_category_proizvodstvo."', '1')");
				mysql_query("INSERT INTO `oc_category_path` (`category_id`, `path_id`, `level`) VALUES ('".$max_id_category_seria."', '".$max_id_category_seria."', '2')");
				
				mysql_query("INSERT INTO `oc_category_to_layout` (`category_id`, `store_id`, `layout_id`) VALUES ('".$max_id_category_seria."', '0', '0')");
				mysql_query("INSERT INTO `oc_category_to_store` (`category_id`, `store_id`) VALUES ('".$max_id_category_seria."', '0')");
			}
			else{
				$row = mysql_fetch_assoc($result);
				$max_id_category_seria = $row['category_id'];
			}
			
			$num_rows = 0;
		}
		
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		// сохраняю ИЗОБРАЖЕНИЯ на сервер
		//if (elements_counter==0 && $block_parent)
		
		$img_ot_1 = strpos($stroka, "<div class=\"leftcol\">");
		$img_block_1 = substr($stroka, $img_ot_1);
		
		$img_do_2 = stripos($img_block_1, "<ul class=\"uslovia\">");
		$img_block_2 = substr($img_block_1, 0, $img_do_2);
		
		
		$array_img = explode("href=\"", $img_block_2);
		$array_img_new = array();
		
		print_r($array_img);
		
		
		if(sizeof($array_img) == 3){
			for ($y=2; $y<=2; $y++){
				$konec_url_kartinki = stripos($array_img[$y], "\"");
				$url_kartinki = substr($array_img[$y], 0, $konec_url_kartinki);
				
				//echo $url_kartinki."\n";
				
				array_push($array_img_new, $url_kartinki);
			}
		}
		else{
			for ($y=3; $y<sizeof($array_img); $y++){
				$konec_url_kartinki = stripos($array_img[$y], "\"");
				$url_kartinki = substr($array_img[$y], 0, $konec_url_kartinki);
				
				//echo $url_kartinki."\n";
				
				array_push($array_img_new, $url_kartinki);
			}
		}
		
		
		
		//созданию директории
		$dir_catalog = $url.$catalog;
		if (!file_exists($dir_catalog)) {
			mkdir($dir_catalog);
		}
		
		$dir_nazvaie_papki = $url.$catalog."/".$nazvaie_papki;
		if (!file_exists($dir_nazvaie_papki)) {
			mkdir($dir_nazvaie_papki);
		}
		
		$dir_proizvodstvo = $url.$catalog."/".$nazvaie_papki."/".$proizvodstvo;
		if (!file_exists($dir_proizvodstvo)) {
			mkdir($dir_proizvodstvo);
		}
		
		
		
		$poisk_slova_video_v_img = eregi("Видео", $img_block_1);
		if($poisk_slova_video_v_img == 1){
			$chislo_img = 0;
		}
		else{
			$chislo_img = 1;
		}
		
		
		for ($y=0; $y<=sizeof($array_img_new)-$chislo_img; $y++){
			
			echo $array_img_new[$y]."\n";
			
			$handle_img = fopen("https://santehnika-online.ru".$array_img_new[$y], "r");
			while (!feof($handle_img)) {
				$copy_img .= fgets($handle_img, 4096);
			}
			fclose($handle_img);
			
			
			if($y == 0){
				$url_img_glav = "/catalog/".$catalog."/".$nazvaie_papki."/".$proizvodstvo."/".$name_img."_".$y.".jpg";
			}
			
			$newfile_img = fopen($url.$catalog."/".$nazvaie_papki."/".$proizvodstvo."/".$name_img."_".$y.".jpg", "w");
			fwrite($newfile_img, $copy_img);
			$copy_img = "";
		}
		
		
		
		
		
		
		
		
		
		
		//exit();
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		// Атрибуты - часть 2
		
		$atributu_chast_2_block_ot = strpos($stroka, "<div class=\"zebragroup1 chars vklad\">");
		$atributu_chast_2_block_do = strpos($stroka, "<div class=\"sc-of-del vklad sostav_postavki\">");
		$atributu_chast_2_block = substr($stroka, $atributu_chast_2_block_ot, $atributu_chast_2_block_do - $atributu_chast_2_block_ot);
		
		
		$atributu_parametr_chast_2 = explode("<div class=\"name\">", $atributu_chast_2_block);
		$atributu_parametr_chast_2_clear = array();
		
		for ($y=1; $y<sizeof($atributu_parametr_chast_2); $y++){
			$atributu_do = strpos($atributu_parametr_chast_2[$y], "</div>");
			$atributu_parametr = trim(strip_tags(substr($atributu_parametr_chast_2[$y], 0, $atributu_do)));
			
			$poisk_zapytoy = eregi(",", $atributu_parametr);
			
			
			if($poisk_zapytoy == 1){
				$do_zapytoi = strpos($atributu_parametr, ",");
				
				$atributu_parametr_bez_zapytoi = substr($atributu_parametr, 0, $do_zapytoi);
				$atributu_parametr_posle_zapytoi = trim(substr($atributu_parametr, $do_zapytoi + 1));
				
				$atributu_parametr = $atributu_parametr_bez_zapytoi." (".$atributu_parametr_posle_zapytoi.")";
			}
			
			array_push($atributu_parametr_chast_2_clear, $atributu_parametr);
		}
		
		
		
		
		
		
		$atributu_value_chast_2 = explode("<span class=\"value\">", $atributu_chast_2_block);
		$atributu_value_chast_2_clear = array();
		
		for ($y=1; $y<sizeof($atributu_value_chast_2); $y++){
			$atributu_do = strpos($atributu_value_chast_2[$y], "</li>");
			$atributu_value = trim(strip_tags(substr($atributu_value_chast_2[$y], 0, $atributu_do)));
			array_push($atributu_value_chast_2_clear, $atributu_value);
		}
		
		
		
		
		
		for ($y=0; $y<=sizeof($atributu_parametr_chast_2_clear); $y++){
			if($atributu_parametr_chast_2_clear[$y] == "Длина (см)"){
				$dlina = $atributu_value_chast_2_clear[$y];
			}
			else if($atributu_parametr_chast_2_clear[$y] == "Ширина (см)"){
				$wirina = $atributu_value_chast_2_clear[$y];
			}
			else if($atributu_parametr_chast_2_clear[$y] == "Высота с опорой (см)" || $atributu_parametr_chast_2_clear[$y] == "Высота (см)"){
				$vusota = $atributu_value_chast_2_clear[$y];
			}
			else if($atributu_parametr_chast_2_clear[$y] == "Высота (см)"){
				$vusota = $atributu_value_chast_2_clear[$y];
			}
		}
		




		
		
		

		




		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		// Проверяю есть ли ГРУППА атрибутов
		// Если нет добавляю в базу
		
		// таблица oc_attribute_group_description
		// attribute_group_id 	language_id 	name
		
		// таблица oc_attribute_group
		// attribute_group_id 	sort_order
		
		$result = mysql_query("SELECT * FROM `oc_attribute_group_description` WHERE `name` LIKE '%".$name_category."%'");
		$num_rows = mysql_num_rows($result);
		
		echo "DDDDDDDDD = ".$num_rows;
		
		if($num_rows == 0){
			
			mysql_query("INSERT INTO `oc_attribute_group` (`attribute_group_id`, `sort_order`) VALUES (NULL, '0')");
			
			$result = mysql_query("SELECT MAX(attribute_group_id) FROM `oc_attribute_group`");
			$row = mysql_fetch_assoc($result);
			$max_id_attribute_group = $row['MAX(attribute_group_id)'];
			
			mysql_query("INSERT INTO `oc_attribute_group_description` (`attribute_group_id`, `language_id`, `name`) VALUES ('".$max_id_attribute_group."', '1', '".$name_category."')");
		}
		else if($num_rows == 1){
			$result = mysql_query("SELECT * FROM `oc_attribute_group_description` WHERE `name` LIKE '%".$name_category."%'");
			$row = mysql_fetch_assoc($result);
			$max_id_attribute_group = $row['attribute_group_id'];
		}
		$num_rows = 0;
		
		
		
		
		
		
		
		
		// Проверяю есть ли ПЕРЕЧЕНЬ атрибутов
		// Если нет добавляю в базу
		// Создаю массив многомерный
		// где 1 - $atributu_parametr_chast_2_clear[$y]
		// где 2 - (id в базе OpenCart)
		// где 3 - $atributu_value_chast_2_clear[$y]
		
		// таблица oc_attribute_description
		// attribute_id 	language_id 	name 
		
		// таблица oc_attribute
		// attribute_id 	attribute_group_id 	sort_order
		
		
		
		$mgomernui_massiv_attribytov = array();
		
		
		// Проверяю есть ли атрибут "Страна" в моей ГРУППе атрибутов
		// если нет записываю
		if($strana != ""){
			$result = mysql_query("SELECT * FROM `oc_attribute_description` WHERE `name` LIKE '%Страна%' AND `attribute_id` IN (SELECT `attribute_id` FROM `oc_attribute` WHERE `attribute_group_id` = '".$max_id_attribute_group."')");
			$num_rows = mysql_num_rows($result);
			
			
			if($num_rows == 0){
				mysql_query("INSERT INTO `oc_attribute` (`attribute_id`, `attribute_group_id`, `sort_order`) VALUES (NULL, '".$max_id_attribute_group."', '0')");
				
				$result = mysql_query("SELECT MAX(attribute_id) FROM `oc_attribute`");
				$row = mysql_fetch_assoc($result);
				$max_id_attribute = $row['MAX(attribute_id)'];
				
				mysql_query("INSERT INTO `oc_attribute_description` (`attribute_id`, `language_id`, `name`) VALUES ('".$max_id_attribute."', '1', 'Страна')");
			}
			$num_rows = 0;
		}
		
		
		
		
		
		
		
		// Проверяю есть ли ВСЕ атрибуты в моей ГРУППе атрибутов
		// если нет записываю
		for ($y=0; $y<=sizeof($atributu_parametr_chast_2_clear); $y++){
			$result = mysql_query("SELECT * FROM `oc_attribute_description` WHERE `name` LIKE '%".$atributu_parametr_chast_2_clear[$y]."%' AND `attribute_id` IN (SELECT `attribute_id` FROM `oc_attribute` WHERE `attribute_group_id` = '".$max_id_attribute_group."')");
			$num_rows = mysql_num_rows($result);
			
			if($num_rows == 0){
				mysql_query("INSERT INTO `oc_attribute` (`attribute_id`, `attribute_group_id`, `sort_order`) VALUES (NULL, '".$max_id_attribute_group."', '0')");
				
				$result = mysql_query("SELECT MAX(attribute_id) FROM `oc_attribute`");
				$row = mysql_fetch_assoc($result);
				$max_id_attribute = $row['MAX(attribute_id)'];
				
				mysql_query("INSERT INTO `oc_attribute_description` (`attribute_id`, `language_id`, `name`) VALUES ('".$max_id_attribute."', '1', '".$atributu_parametr_chast_2_clear[$y]."')");
			}
			$num_rows = 0;
		}
		
		
		
		
		// Создаю массив многомерный
		// где 1 - $atributu_parametr_chast_2_clear[$y] - параметр атрибута
		// где 2 - (id атрибута в базе OpenCart)
		// где 3 - $atributu_value_chast_2_clear[$y] - значение атрибута
		
		for ($y=0; $y<=sizeof($atributu_parametr_chast_2_clear); $y++){
			$result = mysql_query("SELECT * FROM `oc_attribute_description` WHERE `name` LIKE '%".$atributu_parametr_chast_2_clear[$y]."%' AND `attribute_id` IN (SELECT `attribute_id` FROM `oc_attribute` WHERE `attribute_group_id` = '".$max_id_attribute_group."')");
			$row = mysql_fetch_assoc($result);
			$id_attribyte_iz_bazu_opencart = $row['attribute_id'];
			
			$mgomernui_massiv_attribytov[$y][0] = $atributu_parametr_chast_2_clear[$y];
			$mgomernui_massiv_attribytov[$y][1] = $id_attribyte_iz_bazu_opencart;
			$mgomernui_massiv_attribytov[$y][2] = $atributu_value_chast_2_clear[$y];
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		//запись в базу непосредственно ПРОДУКТа
		mysql_query("INSERT INTO `oc_product` (`product_id`, `model`, `sku`, `upc`, `ean`, `jan`, `isbn`, `mpn`, `location`, `quantity`, `stock_status_id`, `image`, `manufacturer_id`, `shipping`, `price`, `points`, `tax_class_id`, `date_available`, `weight`, `weight_class_id`, `length`, `width`, `height`, `length_class_id`, `subtract`, `minimum`, `sort_order`, `status`, `viewed`, `date_added`, `date_modified`) VALUES (NULL, '".$model."', '', '', '', '', '', '', '0', 1, 7, '".$url_img_glav."', '".$manufacturer_id."', '1', '".$cena.".0000', 0, 0, '".date(Y)."-".date(m)."-".date(d)."', '', 1, '".$dlina.".00000000', '".$wirina.".00000000', '".$vusota.".00000000', 1, 1, 1, 1, 1, 5, '".date(Y)."-".date(m)."-".date(d)." ".date(h).":".date(i).":".date(s)."', '".date(Y)."-".date(m)."-".date(d).":".date(h).":".date(i).":".date(s)."')");
		
		
		// определяем максимальный ID
		$result = mysql_query("SELECT MAX(product_id) FROM `oc_product`");
		$row = mysql_fetch_assoc($result);
		$max_id = $row['MAX(product_id)'];
		echo "MAX_ID = ".$max_id;
		
		
		
		
		
		
		// записываем ИЗОБРАЖЕНИЯ в базу данных
		echo "$chislo_img = ".$chislo_img."\n";
		echo "sizeof($array_img_new) = ".sizeof($array_img_new)."\n";
		for ($y=1; $y<=sizeof($array_img_new)-$chislo_img-1; $y++){
			echo "запись изображения в базу\n";
			mysql_query("INSERT INTO `oc_product_image` (`product_image_id`, `product_id`, `image`, `sort_order`) VALUES ('', '".$max_id."', '/catalog/".$catalog."/".$nazvaie_papki."/".$proizvodstvo."/".$name_img."_".$y.".jpg', '".$y."')");
		}
		
		
		
		//запись в базу параметров ПРОДУКТа
		mysql_query("INSERT INTO `oc_product_to_store` (`product_id`, `store_id`) VALUES ('".$max_id."', '0')");
		mysql_query("INSERT INTO `oc_product_to_layout` (`product_id`, `store_id`, `layout_id`) VALUES ('".$max_id."', 0, 0)");
		if($seria == ""){
			mysql_query("INSERT INTO `oc_product_to_category` (`product_id`, `category_id`) VALUES ('".$max_id."', '".$max_id_category_proizvodstvo."')");
		}
		else{
			mysql_query("INSERT INTO `oc_product_to_category` (`product_id`, `category_id`) VALUES ('".$max_id."', '".$max_id_category_seria."')");
		}
		mysql_query("INSERT INTO `oc_product_description` (`product_id`, `language_id`, `name`, `description`, `tag`, `meta_title`, `meta_description`, `meta_keyword`) VALUES ('".$max_id."', '1', '".$name."', '', '', '".$name."', '".$name."', '')");
		mysql_query("INSERT INTO `oc_url_alias` (`url_alias_id`, `query`, `keyword`) VALUES (NULL, 'product_id=".$max_id."', '".$name_img."')");
		
		
		
		
		
		
		// Добавляю значения атрибутов в базу
		for ($y=0; $y<=sizeof($atributu_parametr_chast_2_clear); $y++){
			mysql_query("INSERT INTO `oc_product_attribute` (`product_id`, `attribute_id`, `language_id`, `text`) VALUES ('".$max_id."', '".$mgomernui_massiv_attribytov[$y][1]."', '1', '".$mgomernui_massiv_attribytov[$y][2]."')");
		}
		
		$seria = "";
		$atributu_parametr_chast_2_clear = array();
		
		
		
}		
		
		

$schet += 1;
	
$fp_4 = fopen('schet.txt', 'w');
if(!$fp_4){exit();}
fwrite($fp_4, $schet);
fclose($fp_4);		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	








?>






















