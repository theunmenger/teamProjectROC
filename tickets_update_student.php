<?php
require_once __DIR__ . '/auth.php';
start_session();
$user = current_user();

if (!$user || $user['role'] !== 'student') {
    http_response_code(403);
    exit('Geen toegang');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Alleen POST toegestaan');
}

$id = $_POST['opdrachtenid'] ?? '';
$status = $_POST['status'] ?? '';

if ($id === '' || $status === '') {
    http_response_code(400);
    exit('id en status verplicht');
}

$conn = db();
$sql = ""; // sql
echo "Ticket aangepast";
?>