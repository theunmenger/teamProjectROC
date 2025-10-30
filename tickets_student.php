<?php
require_once __DIR__ . '/auth.php';
start_session();
$user = current_user();

if (!$user || $user['role'] !== 'student') {
    http_response_code(403);
    exit('Geen toegang');
}

$conn = db();
$sql = ""; // sql
echo "Tickets ophalen";
?>