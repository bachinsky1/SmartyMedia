<?php 
if ( !isset($_POST['field'], $_POST['operator'], $_POST['value']) ) {
    exit;
}

// Нужно преобразовать входящий массив в строку типа  "size:>100+forks:20+folowers:<100"
// Сначала объединяем field и value. 
// На выходе будет ['size'=>100, 'forks'=>20, ]
$params = array_combine($_POST['field'], $_POST['value']); 
$reqv = ""; $i=0;   // $i - счетчик для цикла foreach. Можно задействовать for, но foreach удобнее

foreach($params as $key=>$val) {
    $operator = $_POST['operator'][$i++] ?? ''; // Проверка на выход из массива. На всякий случай. PHP 7+
    $reqv .= "$key:$operator$val+";             // Здесь строится окончательная строка GET-параметров q=...
}

$url =  "https://api.github.com/search/repositories?q=" . mb_substr($reqv, 0, -1); // Убираем последний плюс. Он лишний

// Готовим запрос
$cInit = curl_init();
curl_setopt($cInit, CURLOPT_URL, $url);
curl_setopt($cInit, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($cInit, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($cInit, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($cInit, CURLOPT_USERPWD, $user . ':' . $pwd);

$output = curl_exec($cInit); // Выполняем запрос
$info = curl_getinfo($cInit, CURLINFO_HTTP_CODE); // Можно проверять $info на предмет нештатных ситуаций

curl_close($cInit); // Закрываем соединение

// Подготовим объект для Datatables
$tmp = json_decode($output); $items = [];
if (isset($tmp->errors)) {
    echo '<br>message: ' . $tmp->message;
    exit;
}

foreach ($tmp->items as $item) {
    $items[] = [
        '<a href="'. $item->html_url .'" target="_blank">' . '<img src="'. $item->owner->avatar_url .'" width="30px">' . '</a>',
        '<a href="'. $item->html_url .'" target="_blank">' . $item->name . '</a>',
        $item->size,
        $item->forks_count,
        $item->stargazers_count,
        $item->watchers_count,
    ];
}

//var_dump($tmp);
header('Content-Type: application/json');
echo json_encode( $items );