<div class="visualization" id="visualization">
    <?php
    if (isset($_SESSION['array'])) {
        $maxValue = max($_SESSION['array']);
        foreach ($_SESSION['array'] as $value) {
            $height = ($value / $maxValue) * 100;
            echo '<div class="bar" style="height: ' . $height . '%;"></div>';
        }
    }
    ?>
</div>