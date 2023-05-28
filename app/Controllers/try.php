<?php 
$columnheads = ["payment_method", "type", "date", "amount", "description"];

// $data = Array ( ['payment_method'] => 1, ['type'] => 1, ['date'] => '29-05-22', ['amount'] => 222, ['description'] => 'Dadad', ['method'] => 'post' );

for ($i = 0; $i < count($columnheads); $i++) { 
   print_r(":$columnheads[$i]", $columnheads[$i] );
    
}