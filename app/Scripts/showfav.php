<?php
use Illuminate\Support\Facades\DB;

$results = DB::select('select * from favourite where User_ID = ?',[$user->id]);
$number = count($results);
$i=0;
$j=0;

while($number>0){
    $films = DB::select('select * from films where id = ?',[$results[$i]->Film_ID]);
    $id=$films[$j]->id;
    echo "<a href=/film/$id><div class=record>".$films[$j]->Title."</br></div></a>";
    $number--;
    $i++;
}

?>