<?php
function insertionSortWithSteps($array) {
    $steps = [];
    $comparisons = 0;
    $swaps = 0;
    $n = count($array);
    
    for ($i = 1; $i < $n; $i++) {
        $key = $array[$i];
        $j = $i - 1;
        
        while ($j >= 0 && $array[$j] > $key) {
            $comparisons++;
            $steps[] = [
                'array' => $array,
                'compared' => [$j, $j + 1],
                'swapped' => false,
                'comparisons' => $comparisons,
                'swaps' => $swaps
            ];
            
            $array[$j + 1] = $array[$j];
            $swaps++;
            $j--;
            
            $steps[] = [
                'array' => $array,
                'compared' => [$j + 1, $j + 2],
                'swapped' => true,
                'comparisons' => $comparisons,
                'swaps' => $swaps
            ];
        }
        
        $array[$j + 1] = $key;
    }
    
    return [
        'sorted_array' => $array,
        'steps' => $steps,
        'total_comparisons' => $comparisons,
        'total_swaps' => $swaps
    ];
}
?>