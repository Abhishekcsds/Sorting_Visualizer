<?php
function bubbleSortWithSteps($array) {
    $steps = [];
    $n = count($array);
    $comparisons = 0;
    $swaps = 0;
    
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            $comparisons++;
            $step = [
                'array' => $array,
                'compared' => [$j, $j + 1],
                'swapped' => false,
                'comparisons' => $comparisons,
                'swaps' => $swaps
            ];
            
            if ($array[$j] > $array[$j + 1]) {
                // Swap elements
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
                $swaps++;
                
                $step['array'] = $array;
                $step['swapped'] = true;
                $step['swaps'] = $swaps;
            }
            
            $steps[] = $step;
        }
    }
    
    return [
        'sorted_array' => $array,
        'steps' => $steps,
        'total_comparisons' => $comparisons,
        'total_swaps' => $swaps
    ];
}
?>