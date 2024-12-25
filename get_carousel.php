<?php
header('Content-Type: application/json');

$filename = 'carousel_data.json'; // Файл, де зберігаються дані каруселі

if (file_exists($filename)) {
    $data = file_get_contents($filename);
    if ($data === false) {
        http_response_code(500);
        echo json_encode(['message' => 'Помилка читання файлу']);
        exit;
    }

    if (empty($data)) {
        echo json_encode([]);
        exit;
    }
    echo $data;
} else {
    echo json_encode([]);
}
?>