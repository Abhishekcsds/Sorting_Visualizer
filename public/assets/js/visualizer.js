class SortingVisualizer {
    constructor(containerId) {
        this.container = document.getElementById(containerId);
        this.array = [];
        this.steps = [];
        this.currentStep = 0;
        this.isSorting = false;
        this.speed = 5;
        this.animationId = null;
        
        this.init();
    }
    
    init() {
        this.renderArray();
    }
    
    renderArray(highlightIndices = [], swapped = false) {
        this.container.innerHTML = '';
        
        const maxValue = Math.max(...this.array);
        const containerHeight = this.container.clientHeight;
        
        this.array.forEach((value, index) => {
            const bar = document.createElement('div');
            bar.className = 'bar';
            
            // Calculate height based on value
            const height = (value / maxValue) * containerHeight;
            bar.style.height = `${height}px`;
            
            // Add value label if there's space
            if (this.array.length <= 30) {
                bar.textContent = value;
            }
            
            // Highlight compared elements
            if (highlightIndices.includes(index)) {
                bar.classList.add('compared');
            }
            
            // Highlight swapped elements
            if (swapped && highlightIndices.includes(index)) {
                bar.classList.add('swapped');
            }
            
            this.container.appendChild(bar);
        });
    }
    
    loadArray(newArray) {
        this.array = [...newArray];
        this.steps = [];
        this.currentStep = 0;
        this.renderArray();
    }
    
    loadSteps(steps) {
        this.steps = steps;
    }
    
    startVisualization() {
        if (this.isSorting || this.steps.length === 0) return;
        
        this.isSorting = true;
        this.visualizeStep();
    }
    
    visualizeStep() {
        if (this.currentStep >= this.steps.length) {
            this.isSorting = false;
            return;
        }
        
        const step = this.steps[this.currentStep];
        this.array = [...step.array];
        this.renderArray(step.compared, step.swapped);
        
        // Update stats
        document.getElementById('comparisons').textContent = step.comparisons;
        document.getElementById('swaps').textContent = step.swaps;
        
        this.currentStep++;
        
        // Calculate delay based on speed (1-10)
        const delay = 1000 / this.speed;
        
        this.animationId = setTimeout(() => {
            this.visualizeStep();
        }, delay);
    }
    
    stopVisualization() {
        this.isSorting = false;
        if (this.animationId) {
            clearTimeout(this.animationId);
            this.animationId = null;
        }
    }
    
    setSpeed(newSpeed) {
        this.speed = newSpeed;
    }
}

// Initialize visualizer
const visualizer = new SortingVisualizer('visualization-container');