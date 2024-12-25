<?php
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($data) {
            $filename = 'carousel_data.json'; // Назва файла для збереження
            $json_data = json_encode($data, JSON_PRETTY_PRINT);

            if (file_put_contents($filename, $json_data)) {
                http_response_code(200);
                echo json_encode(['message' => 'Дані збережено успішно']);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Помилка при збереженні даних']);
            }
        } else {
           http_response_code(400);
           echo json_encode(['message' => 'Некоректні дані']);
       }
    } else {
        http_response_code(405);
        echo json_encode(['message' => 'Недозволений метод']);
    }
?>