<?php
$sumpage = ceil($p->countProd()/6);
    echo "<center style='margin-top:4px'>";
    for($i = 1;$i <= $sumpage;$i++){
        echo "<a class= 'apage' href='index.php?Page=$i'>$i</a>";
        }
    echo "</center>";
?>