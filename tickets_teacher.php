<?php
require_once __DIR__ . '/auth.php';
start_session();
$user = current_user();

if (!$user || $user['role'] !== 'teacher') {
    http_response_code(403);
    exit('Geen toegang');
}

$conn = db();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = ""; // sql
    echo "Tickets ophalen";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $vak = $_POST['vak'] ?? '';
    $opdracht = $_POST['opdracht'] ?? '';
    $deadline = $_POST['deadline'] ?? null;

    if ($title === '' || $vak === '' || $opdracht === '') {
        http_response_code(400);
        exit('Verplichte velden ontbreken');
    }

    $sql = ""; // sql
    echo "Ticket toegevoegd";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $id = $_PUT['opdrachtenleraarid'] ?? '';
    $title = $_PUT['title'] ?? '';
    $vak = $_PUT['vak'] ?? '';
    $opdracht = $_PUT['opdracht'] ?? '';
    $deadline = $_PUT['deadline'] ?? null;

    if ($id === '' || $title === '' || $vak === '' || $opdracht === '') {
        http_response_code(400);
        exit('Verplichte velden ontbreken');
    }

    $sql = ""; // sql
    echo "Ticket aangepast";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['opdrachtenleraarid'] ?? '';
    if ($id === '') {
        http_response_code(400);
        exit('id verplicht');
    }
    $sql = ""; // sql
    echo "Ticket verwijderd";
    exit;
}

http_response_code(405);
exit('Alleen GET, POST, PUT, DELETE toegestaan');