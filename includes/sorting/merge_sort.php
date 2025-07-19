<?php
function mergeSortWithSteps($array) {
    $steps = [];
    $comparisons = 0;
    $swaps = 0;
    
    function mergeSort(&$array, &$steps, &$comparisons, &$swaps) {
        if (count($array) <= 1) {
            return $array;
        }
        
        $mid = floor(count($array) / 2);
        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid);
        
        $left = mergeSort($left, $steps, $comparisons, $swaps);
        $right = mergeSort($right, $steps, $comparisons, $swaps);
        
        return merge($left, $right, $steps, $comparisons, $swaps);
    }
    
    function merge($left, $right, &$steps, &$comparisons, &$swaps) {
        $result = [];
        $leftIndex = 0;
        $rightIndex = 0;
        
        while ($leftIndex < count($left) && $rightIndex < count($right)) {
            $comparisons++;
            $steps[] = [
                'array' => array_merge($result, array_slice($left, $leftIndex), array_slice($right, $rightIndex)),
                'compared' => [$leftIndex, count($left) + $rightIndex],
                'swapped' => false,
                'comparisons' => $comparisons,
                'swaps' => $swaps
            ];
            
            if ($left[$leftIndex] < $right[$rightIndex]) {
                $result[] = $left[$leftIndex];
                $leftIndex++;
            } else {
                $result[] = $right[$rightIndex];
                $rightIndex++;
                $swaps++;
            }
        }
        
        while ($leftIndex < count($left)) {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        }
        
        while ($rightIndex < count($right)) {
            $result[] = $right[$rightIndex];
            $rightIndex++;
        }
        
        return $result;
    }
    
    $sortedArray = mergeSort($array, $steps, $comparisons, $swaps);
    
    return [
        'sorted_array' => $sortedArray,
        'steps' => $steps,
        'total_comparisons' => $comparisons,
        'total_swaps' => $swaps
    ];
}
?>