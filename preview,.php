<?php

$jsonUrl = 'http://9db4d84.studcloud.inf.ua/json.php'; 

$jsonData = file_get_contents($jsonUrl);

if ($jsonData === FALSE) {
    die('Error retrieving data from json.php');
}

$responses = json_decode($jsonData, true);

if ($responses === NULL) {
    die('Error decoding JSON');
}

echo '<table border="1">';
echo '<tr><th>Ім\'я</th><th>Email</th><th>Питання 1</th><th>Питання 2</th><th>Питання 3</th></tr>';

foreach ($responses as $response) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($response['name']) . '</td>';
    echo '<td>' . htmlspecialchars($response['email']) . '</td>';
    echo '<td>' . htmlspecialchars($response['question1']) . '</td>';
    echo '<td>' . htmlspecialchars($response['question2']) . '</td>';
    echo '<td>' . htmlspecialchars($response['question3']) . '</td>';
    echo '</tr>';
}
echo '</table>';
?>