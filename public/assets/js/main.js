document.addEventListener('DOMContentLoaded', function() {
    // DOM elements
    const algorithmSelect = document.getElementById('algorithm');
    const arraySizeSlider = document.getElementById('array-size');
    const sizeValue = document.getElementById('size-value');
    const speedSlider = document.getElementById('speed');
    const speedValue = document.getElementById('speed-value');
    const generateBtn = document.getElementById('generate-btn');
    const sortBtn = document.getElementById('sort-btn');
    const resetBtn = document.getElementById('reset-btn');
    
    // Initialize values
    sizeValue.textContent = arraySizeSlider.value;
    speedValue.textContent = speedSlider.value;
    
    // Event listeners
    arraySizeSlider.addEventListener('input', function() {
        sizeValue.textContent = this.value;
    });
    
    speedSlider.addEventListener('input', function() {
        speedValue.textContent = this.value;
        visualizer.setSpeed(parseInt(this.value));
    });
    
    generateBtn.addEventListener('click', function() {
        generateNewArray(parseInt(arraySizeSlider.value));
    });
    
    sortBtn.addEventListener('click', function() {
        const algorithm = algorithmSelect.value;
        startSorting(algorithm);
    });
    
    resetBtn.addEventListener('click', function() {
        resetVisualization();
    });
    
    // Initial array generation
    generateNewArray(parseInt(arraySizeSlider.value));
});

function generateNewArray(size) {
    fetch('api/generate_array.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `size=${size}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            visualizer.loadArray(data.array);
        }
    })
    .catch(error => console.error('Error:', error));
}

function startSorting(algorithm) {
    fetch('api/sort.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `algorithm=${algorithm}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('time').textContent = data.time;
            visualizer.loadArray(data.original_array);
            visualizer.loadSteps(data.steps);
            visualizer.startVisualization();
        }
    })
    .catch(error => console.error('Error:', error));
}

function resetVisualization() {
    visualizer.stopVisualization();
    generateNewArray(parseInt(document.getElementById('array-size').value));
    document.getElementById('comparisons').textContent = '0';
    document.getElementById('swaps').textContent = '0';
    document.getElementById('time').textContent = '0';
}