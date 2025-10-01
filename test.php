<?php
header('Content-type: text/html; charset=UTF-8');
$html = file_get_contents('./index.html');
$n = preg_match_all('#localize\.(\w+)\s*:\s*["\']([^"\']*)["\']#i', $html, $matches);
$arr = [];
for ($i = 0; $i < $n; $i++) {
    $key = $matches[1][$i];
    $value = $matches[2][$i];
    if (!in_array($key, array_keys($arr))) {
        $arr[$key] = $value;
    }
}
foreach ($arr as $key => $value) {
    echo "'$key' => Util::tran('$value')," . PHP_EOL;
}
