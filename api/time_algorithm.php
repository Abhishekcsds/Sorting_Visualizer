<?php
require_once '../config.php';
require_once '../includes/functions.php';
require_once '../includes/sorting/bubble_sort.php';
require_once '../includes/sorting/selection_sort.php';
require_once '../includes/sorting/merge_sort.php';
require_once '../includes/sorting/quick_sort.php';
require_once '../includes/sorting/insertion_sort.php';

header('Content-Type: application/json');

session_start();
if (!isset($_SESSION['array'])) {
    echo json_encode(['error' => 'Array not initialized']);
    exit;
}

$array = $_SESSION['array'];
$algorithm = isset($_POST['algorithm']) ? $_POST['algorithm'] : 'bubble';

$startTime = microtime(true);

// Run without steps for timing
switch ($algorithm) {
    case 'bubble':
        $result = bubbleSortPHP($array);
        break;
    case 'selection':
        $result = selectionSortPHP($array);
        break;
    case 'merge':
        $result = mergeSortPHP($array);
        break;
    case 'quick':
        $result = quickSortPHP($array);
        break;
    case 'insertion':
        $result = insertionSortPHP($array);
        break;
    default:
        echo json_encode(['error' => 'Invalid algorithm']);
        exit;
}

$timeTaken = (microtime(true) - $startTime) * 1000; // Convert to milliseconds

echo json_encode([
    'success' => true,
    'algorithm' => $algorithm,
    'time' => round($timeTaken, 2)
]);
?>