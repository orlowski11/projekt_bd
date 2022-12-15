<?php

use Illuminate\Support\Facades\DB;

if (isset($_GET['textfield']) && $_GET['textfield']!=null) {
    
    $name = $_GET['textfield'];
    
    $results = DB::select('select * from users where name like ?',[$name.'%']);
    
    $number = count($results);
    $i=0;
    
    while($number>0){
        $id=(string)$results[$i]->id;
        echo "<a href=/users/$id><div class=record>".$results[$i]->name."</br></div></a>";
        $number--;
        $i++;
    }
}
?>