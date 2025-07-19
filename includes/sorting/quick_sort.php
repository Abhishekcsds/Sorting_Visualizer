<?php
function quickSortWithSteps($array) {
    $steps = [];
    $comparisons = 0;
    $swaps = 0;
    
    function quickSort(&$array, $left, $right, &$steps, &$comparisons, &$swaps) {
        if ($left < $right) {
            $pivotIndex = partition($array, $left, $right, $steps, $comparisons, $swaps);
            quickSort($array, $left, $pivotIndex - 1, $steps, $comparisons, $swaps);
            quickSort($array, $pivotIndex + 1, $right, $steps, $comparisons, $swaps);
        }
    }
    
    function partition(&$array, $left, $right, &$steps, &$comparisons, &$swaps) {
        $pivot = $array[$right];
        $i = $left - 1;
        
        for ($j = $left; $j < $right; $j++) {
            $comparisons++;
            $steps[] = [
                'array' => $array,
                'compared' => [$j, $right],
                'swapped' => false,
                'comparisons' => $comparisons,
                'swaps' => $swaps
            ];
            
            if ($array[$j] < $pivot) {
                $i++;
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
                $swaps++;
                
                $steps[] = [
                    'array' => $array,
                    'compared' => [$i, $j],
                    'swapped' => true,
                    'comparisons' => $comparisons,
                    'swaps' => $swaps
                ];
            }
        }
        
        $temp = $array[$i + 1];
        $array[$i + 1] = $array[$right];
        $array[$right] = $temp;
        $swaps++;
        
        $steps[] = [
            'array' => $array,
            'compared' => [$i + 1, $right],
            'swapped' => true,
            'comparisons' => $comparisons,
            'swaps' => $swaps
        ];
        
        return $i + 1;
    }
    
    quickSort($array, 0, count($array) - 1, $steps, $comparisons, $swaps);
    
    return [
        'sorted_array' => $array,
        'steps' => $steps,
        'total_comparisons' => $comparisons,
        'total_swaps' => $swaps
    ];
}
?>