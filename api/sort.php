<?php
require_once '../config.php';
require_once '../includes/functions.php';
require_once '../includes/sorting/bubble_sort.php';
require_once '../includes/sorting/quick_sort.php';
require_once '../includes/sorting/merge_sort.php';
require_once '../includes/sorting/selection_sort.php';

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

session_start();
if (!isset($_SESSION['array'])) {
    echo json_encode(['error' => 'Array not initialized']);
    exit;
}

$array = $_SESSION['array'];
$algorithm = isset($_POST['algorithm']) ? $_POST['algorithm'] : 'bubble';

$startTime = microtime(true);

switch ($algorithm) {
    case 'bubble':
        $result = bubbleSortWithSteps($array);
        break;
    case 'selection':
        $result = selectionSortWithSteps($array);
        break;
    case 'merge':
        $result = mergeSortWithSteps($array);
        break;
    case 'quick':
        $result = quickSortWithSteps($array);
        break;
    default:
        echo json_encode(['error' => 'Invalid algorithm']);
        exit;
}

$timeTaken = (microtime(true) - $startTime) * 1000; // Convert to milliseconds

$response = [
    'success' => true,
    'algorithm' => $algorithm,
    'original_array' => $array,
    'sorted_array' => $result['sorted_array'],
    'steps' => $result['steps'],
    'time' => round($timeTaken, 2),
    'comparisons' => $result['total_comparisons'],
    'swaps' => $result['total_swaps']
];

echo json_encode($response);
?>