<?php 
use Illuminate\Support\Facades\Auth;

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Projekt</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            html{
                height: 100%;
                width: 100%;
            }
            body {
                font-family: 'Nunito', sans-serif;
                background-color:#040f21;
                position:absolute; 
            }
            
            a {
                color:white;
            }
            
            .nav {
                top:0;
                left:0;
                right:30%;
                position:fixed;
                background-color:#0c1d38;
                height: 9%;
                width: 70%%;
                color:white;
            }
            
            .toppanel {
                position:fixed;
                top:0;
                right:0;
                background-color:#0c1d38;
                height: 9%;
                width: 30%;
                text-align:right;
                
            }
            
            .current{
                background-color:#122b52;
            }
            
            .login{
                margin-top:5%;
                margin-right:5%;
                font-size:120%;
                padding-bottom:7%;
            }
            
            .main {
                position:fixed;
                top:9%;
                left:0;
                bottom:0;
                right:0;
                background-color:#040f21;
                height: 90%;
                width: 100%;
                color:white;
            }
            
            .content{
                position:fixed;
                text-align:left;
                top:20%;
                left:10%;
                right:10%;
            }
            
            ul{
                margin-top:2%;
                font-size:120%;
                text-align:left;
                list-style:none;
            }
            
            li{
                margin-top:0;
                top:0;
                bottom:0;
                display:inline;
                padding-top:2%;
                padding-bottom:2.5%;
                padding-left:2%;
                padding-right:2%;
            }

            
            li:hover{
                background-color:#122b52;
            }
            
            a{
                text-decoration:none;
            }
            
            .logintext{
                margin-top:2%;
                top:0;
                bottom:0;
                display:inline;
                padding-top:5%;
                padding-bottom:5.5%;
                padding-left:2%;
                padding-right:2%;
            }
            
            .logintext:hover{
                background-color:#122b52;
            }
        </style>
    </head>
    <body>
    	<div class="nav">
    		<ul>
    			<a href="{{ url('') }}"><li class="current">Strona Glowna</li></a>
    			<a href="{{ url('/film') }}"><li>Filmy</li></a>
    			<a href="{{ url('/users') }}""><li>Uzytkownicy</li></a>
    		</ul>
    	</div>
    
        <div class="toppanel">
            @if (Route::has('login'))
                <div class="login">
                    @auth
                    	<?php $id=Auth::id();
                    	   $admin=Auth::user()->admin;
                        echo "<a href=/users/$id class=logintext>Profil</a>";
                        if($admin){
                            echo "<a href=/adminpanel class=logintext>Admin Panel</a>";
                        }
                        ?>
                        <a href="{{ route('home') }}" class="logintext">Konto</a>
                    @else
                        <a href="{{ route('login') }}" class="logintext">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="logintext">Rejestracja</a>
                        @endif
                    @endauth
                </div>
            @endif
            
       <div class="main">
       		<div class="content">
       			<form method="GET">
       				<p>Tytul: <input type="text" name="title"></p>
       				<p>Opis: <input type="text" name="desc"></p>
       				<p>Rezyser:  <input type="text" name="director"></p>
       				<p>Rok produkcji: <input type="text" name="year"></p>
       				<p>Czas trwania:  <input type="text" name="length"></p>
					<input type="submit" name="addFilm" value="Dodaj film">
					<br><br><br>
					<p>Film_ID:  <input type="text" name="id1"></p>
					<p>Gatunek:  <input type="text" name="genre"></p>
					<input type="submit" name="addGenre" value="Przypisz gatunek">
					<br><br><br>
					<p>Film_ID:  <input type="text" name="id2"></p>
					<input type="submit" name="delFilm" value="Usun film">
					<br><br><br>
					<p>Nazwa uzytkownika:  <input type="text" name="name"></p>
					<input type="submit" name="delUser" value="Usun uzytkownika">
					<?php include(app_path().'\Scripts\admin.php'); ?>
       			</form>
       		</div>
       </div>
    </body>
</html>
