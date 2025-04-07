<?php

$start = $_GET['start'] ?? null;
$end = $_GET['end'] ?? null;

if (!$start || !$end) {
    echo json_encode(['error' => 'Missing parameters']);
    exit;
}

try {
    $startDate = new DateTime($start);
    $endDate = new DateTime($end);

    $tuesdays = 0;
    while ($startDate <= $endDate) {
        if ($startDate->format('N') == 2) { // 2 — вторник
            $tuesdays++;
        }
        $startDate->modify('+1 day');
    }

    echo json_encode(['tuesdays' => $tuesdays]);
} catch (Exception $e) {
    echo json_encode(['error' => 'Invalid dates']);
}


//  для проверки (domain - адрес сервера ) http://domain/tuesday.php?start=2025-01-01&end=2025-03-01
