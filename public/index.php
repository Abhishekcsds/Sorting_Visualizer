<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';
// Rest of your code
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate initial array if not exists
if (!isset($_SESSION['array'])) {
    $_SESSION['array'] = generateRandomArray(20, MIN_VALUE, MAX_VALUE);
}
?>

<div class="container">
    <h1>Sorting Algorithm Visualizer</h1>
    
    <div class="controls">
        <div class="control-group">
            <label for="algorithm">Algorithm:</label>
            <select id="algorithm">
                <option value="bubble">Bubble Sort</option>
                <option value="selection">Selection Sort</option>
                <option value="merge">Merge Sort</option>
                <option value="quick">Quick Sort</option>
            </select>
        </div>
        
        <div class="control-group">
            <label for="array-size">Array Size:</label>
            <input type="range" id="array-size" min="5" max="50" value="20">
            <span id="size-value">20</span>
        </div>
        
        <div class="control-group">
            <label for="speed">Speed:</label>
            <input type="range" id="speed" min="1" max="10" value="5">
            <span id="speed-value">5</span>
        </div>
        
        <button id="generate-btn">Generate New Array</button>
        <button id="sort-btn">Start Sorting</button>
        <button id="reset-btn">Reset</button>
    </div>
    
    <div id="visualization-container">
        <?php include 'views/visualization.php'; ?>
    </div>
    
    <div id="stats">
        <p>Comparisons: <span id="comparisons">0</span></p>
        <p>Swaps: <span id="swaps">0</span></p>
        <p>Time: <span id="time">0</span> ms</p>
    </div>
</div>

<script src="assets/js/main.js"></script>
<script src="assets/js/visualizer.js"></script>
<script src="assets/js/ajax.js"></script>

<?php
require_once 'includes/footer.php';
?>