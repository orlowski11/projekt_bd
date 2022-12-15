<?php
use Illuminate\Support\Facades\DB;

if (isset($_GET['addFilm'])){
    
    DB::insert('insert into films (Title,Description,Year,Length,Director) values (?, ?, ?, ?, ?)', [$_GET['title'], $_GET['desc'], (int)$_GET['year'], (int)$_GET['length'], $_GET['director']]);
    header( "refresh:0;url=/adminpanel" );
    
}

if (isset($_GET['delFilm'])){
    
    DB::delete('delete from films where id = ?', [(int)$_GET['id']]);
    header( "refresh:0;url=/adminpanel" );
    
}

if (isset($_GET['delUser'])){
    
    DB::delete('delete from users where name = ?', [$_GET['name']]);
    header( "refresh:0;url=/adminpanel" );
    
}

?>