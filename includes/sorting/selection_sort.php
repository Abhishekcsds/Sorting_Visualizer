<?php
function selectionSortWithSteps($array) {
    $steps = [];
    $comparisons = 0;
    $swaps = 0;
    $n = count($array);
    
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        
        for ($j = $i + 1; $j < $n; $j++) {
            $comparisons++;
            $steps[] = [
                'array' => $array,
                'compared' => [$minIndex, $j],
                'swapped' => false,
                'comparisons' => $comparisons,
                'swaps' => $swaps
            ];
            
            if ($array[$j] < $array[$minIndex]) {
                $minIndex = $j;
            }
        }
        
        if ($minIndex != $i) {
            $temp = $array[$i];
            $array[$i] = $array[$minIndex];
            $array[$minIndex] = $temp;
            $swaps++;
            
            $steps[] = [
                'array' => $array,
                'compared' => [$i, $minIndex],
                'swapped' => true,
                'comparisons' => $comparisons,
                'swaps' => $swaps
            ];
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