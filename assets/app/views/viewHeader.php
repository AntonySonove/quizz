<?php

class ViewHeader
{
    public function displayView(): string
    {
        return ("
    <!DOCTYPE html>
    <html lang='en'>

    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='icon' type='image/x-icon' href='../assets/img/icone/favicoquiz.ico'>
        <link
            href='https://fonts.googleapis.com/css2?family=Irish+Grover&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'
            rel='stylesheet'>
        <title>QuizAttack</title>
        <link rel='stylesheet' href='../../css/style.css'>
    </head>

    <body>
    <header>
        <nav class='nav-container'>
            <a href='../controllers/controllerHome.php'><img class='logo' src='../../img/logo.png' alt='Logo QuizAttack'></a>
            <ul class='nav-list'>
                <li><a class='nav-list__item' href='../controllers/controllerScore.php'>Statistiques</a></li>
                <li><a class='nav-list__item' href='../controllers/controllerSignIn.php'>Se connecter</a></li>
                <li><a class='nav-list__item' href='../controllers/controllerSignUp.php'>Créer compte</a></li>
            </ul>
        </nav>
    </header>
    ");
    }
}
