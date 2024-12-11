<?php
$url = 'http://lab.vntu.org/api-server/lab8.php';
$params = array(
    'user' => 'student',
    'pass' => 'p@ssw0rd'
);

$url_with_params = $url . '?' . http_build_query($params);

$response = file_get_contents($url_with_params);

if ($response === FALSE) {
    die('Помилка при отриманні даних');
}

$data = json_decode($response, true);

if ($data === NULL) {
    die('Помилка при розборі JSON');
}

$people = array();
foreach ($data as $group) {
    if (is_array($group)) {
        $people = array_merge($people, $group);
    }
}
echo '<table border="1">';
echo '<tr><th>Ім’я</th><th>Приєднання</th><th>Звання</th><th>Локація</th></tr>';

foreach ($people as $person) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($person['name']) . '</td>';
    echo '<td>' . htmlspecialchars($person['affiliation']) . '</td>';
    echo '<td>' . htmlspecialchars($person['rank']) . '</td>';
    echo '<td>' . htmlspecialchars($person['location']) . '</td>';
    echo '</tr>';
}
echo '</table>';
?>