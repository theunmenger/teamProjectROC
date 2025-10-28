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

$title = $_POST['title'] ?? '';
$vak = $_POST['vak'] ?? '';
$opdracht = $_POST['opdracht'] ?? '';
$doel = $_POST['doel'] ?? '';
$status = $_POST['status'] ?? 'niet afgerond';

if ($title === '' || $vak === '' || $opdracht === '') {
    http_response_code(400);
    exit('Verplichte velden ontbreken');
}

$conn = db();
$sql = ""; // sql
echo "Ticket toegevoegd";