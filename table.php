<?php

$cols = 10;
$rows = 10;

echo "<table border = '1'";

for($tr = 1; $tr <= $rows; $tr++) {
    echo "<tr>";
    for($td = 1; $td <= $cols; $td++) {
        echo "<td>" ;
        if(($tr * $td) % 10 == 0){
            echo '<b>' . $tr * $td . '<b>';
        } else {
            echo $tr * $td;
        }
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";