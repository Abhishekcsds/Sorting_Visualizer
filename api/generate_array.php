<?php
require_once '../config.php';
require_once '../includes/functions.php';

header('Content-Type: application/json');

$size = isset($_POST['size']) ? (int)$_POST['size'] : 20;
$size = max(5, min(50, $size)); // Limit size between 5 and 50

$array = generateRandomArray($size, MIN_VALUE, MAX_VALUE);

session_start();
$_SESSION['array'] = $array;

echo json_encode([
    'success' => true,
    'array' => $array
]);
?>