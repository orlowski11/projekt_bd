<?php

use Illuminate\Support\Facades\DB;

if (isset($_GET['textfield']) && ($_GET['textfield'])!=null){
    
    $title = $_GET['textfield'];
    
    $results = DB::select('select * from films where Title like ?',[$title.'%']);
    
    $number = count($results);
    $i=0;
    
    while($number>0){
        $id=(string)$results[$i]->id;
        echo "<a href=/film/$id><div class=record>".$results[$i]->Title."</br></div></a>";
        $number--;
        $i++;
    }
}
else if(isset($_GET['gatunek']) && $_GET['gatunek']!=null && isset($_GET['dlugosc'])){
    
    $gatunki = $_GET['gatunek'];
    $dlugosc = $_GET['dlugosc'];
    
    $number = count($gatunki);
    $i=0;
    
    while($number>0){
        $results = DB::select('select * from film_genre where Genre = ?',[$gatunki[$i]]);
    
        foreach($results as $result){
            $filmy = DB::select('select * from films where id = ?',[$result->Film_ID]);
        
            foreach($filmy as $film){
                if($film->Length<=$dlugosc)
                    echo "<a href=/film/$film->id><div class=record>".$film->Title."</br></div></a>";
            }
        }
        $number--;
        $i++;
    }
}
else if(isset($_GET['dlugosc'])){
    $dlugosc = $_GET['dlugosc'];
    $results = DB::select('select * from films where Length<=?',[$dlugosc]);
    
    foreach($results as $film){
        echo "<a href=/film/$film->id><div class=record>".$film->Title."</br></div></a>";
    }
}

?>