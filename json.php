<?php

$servername = "mysql";
$username = "9db4d84";
$password = "sd536g9i";
$database = "9db4d84";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM survey_responses";
$result = $conn->query($sql);

$responses = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $response = [
            'name' => $row['name'],
            'email' => $row['email'],
            'question1' => $row['question1'],
            'question2' => $row['question2'],
            'question3' => $row['question3']
        ];
        $responses[] = $response;
    }
} else {
    echo "0 results";
}

$conn->close();


header('Content-Type: application/json; charset=utf-8');
echo json_encode($responses, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

?>