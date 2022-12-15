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
            
            .current{
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

        .searchbox{
            position:fixed;
            left:10%;
            top:15%;
            text-align:center;
        }
        
        .textfield{
            font-size:140%;
        }
        
        .submit{
            font-size:120%;
            margin-top:1%;
            color:white;
            background-color:#0c1d38;
            border:none;
            padding:10px;
            border-radius:15px;
        }
        
        .submit:hover{
            background-color:#122b52; 
        }
        
        .results{
            position:fixed;
            top:18%;
            left:40%;
            overflow:auto;
            font-size:150%;
            text-align:left;
            line-height:3.5;
            height:50%;
            width:40%;
        }
        
        .record{
            width:50%;
            padding-left:5%;
        }
        
        .record:hover{
            background-color:#122b52;
        }
        
        img{
            width:5%;
        }
</style>
</head>
<body>
<div class="nav">
<ul>
<a href="{{ url('') }}"><li>Strona Glowna</li></a>
<a href="{{ url('/film') }}"><li class="current">Filmy</li></a>
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
       		<div class="searchbox">
       			<h2>Wyszukaj Film</h2>
       			<form method="get" action="">
       				<input type="text" class="textfield" name="textfield"><br>
       				<input type="submit" class="submit" name="submit" value="Wyszukaj"><br><br><br><br>
       				<h3>Gatunek</h3>
       				<input type="checkbox" class="checkbox" name="gatunek[]" value="Horror">
                    <label for="horror">Horror</label>
                    <input type="checkbox" class="checkbox" name="gatunek[]" value="Scifi">
                    <label for="scifi">Sci-Fi</label>
                    <input type="checkbox" class="checkbox" name="gatunek[]" value="Akcja">
                    <label for="akcja">Akcja</label>
                    <br><br>
                    <input type="checkbox" class="checkbox" name="gatunek[]" value="Dokumentalny">
                    <label for="dokumentalny">Dokumentalny</label>
                    <input type="checkbox" class="checkbox" name="gatunek[]" value="Psychologiczny">
                    <label for="psychologiczny">Psychologiczny</label>
                    <input type="checkbox" class="checkbox" name="gatunek[]" value="Historyczny">
                    <label for="historyczny">Historyczny</label>
                    <br><br>
                    <input type="checkbox" class="checkbox" name="gatunek[]" value="Anime">
                    <label for="anime">Anime</label>
                    <input type="checkbox" class="checkbox" name="gatunek[]" value="Familijny">
                    <label for="familijny">Familijny</label>
                    <input type="checkbox" class="checkbox" name="gatunek[]" value="Thriller">
                    <label for="thriller">Thriller</label>
                    <br><br>
                    <input type="checkbox" class="checkbox" name="gatunek[]" value="Komedia">
                    <label for="komedia">Komedia</label>
                    <input type="checkbox" class="checkbox" name="gatunek[]" value="Fantasy">
                    <label for="fantasy">Fantasy</label>
                    <input type="checkbox" class="checkbox" name="gatunek[]" value="Dramat">
                    <label for="dramat">Dramat</label>
                    <br><br><br><br>
                    <h3>Czas trwania</h3>
                    <input type="range" value="240" id="dlugosc" name="dlugosc" min="30" max="240" oninput="this.nextElementSibling.value = this.value">
                    <output>240</output>
  					<label for="volume">minut</label>
       			</form>
       		</div>
       		
       		<div class="results">
				<?php include(app_path().'\Scripts\searchfilm.php'); ?>
       		</div>
       </div>
    </body>
</html>