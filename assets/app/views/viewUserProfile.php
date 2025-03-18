<?php

//je définis ma variable daffichage
$nomCO = "";
$emailCo = "";

//je vérifie qu'il y a une session et que le login dans session n'est pas vide
if (isset($_SESSION['login']) && !empty($_SESSION['login']) && isset($_SESSION['email'])  && !empty($_SESSION['email'])) {

    //Je peux modifier ma variable d'affichage
    $nomCo = $_SESSION['login'];
    $emailCO = $_SESSION['email'];
}


class ViewUserProfile
{


    //METHOD
    public function displayView(): string

    {
        return '

            <div class="cadre-profil__infos">
                <a href="./modif-info.html"><img class="cadre-login__infos__modif" src="/assets/img/icone/edit-violet-icon.webp" alt="Icone de modif"> </a>
                <img class="cadre-login__infos__photo" src="/assets/img/img_profil/ronaldinho.webp" alt="Photo de profil">
                <p class="cadre-login__infos__nom">  </p>
                <p class="cadre-login__infos__mail">  </p>
            </div>

            <div class="cadre-login__score">
                <p class="cadre-login__score__global"> Score : </p>
                <p class="cadre-login__score__global__note"> 6/10 </p>
                <p class="cadre-login__score__theme"> Score par thème : </p>
                <ul class="cadre-login__score__theme__score">
                    <li>Histoire : 6/10 </li>
                    <li>Animaux : 7/10 </li>
                    <li>Jeux vidéos : 6/10</li>
                    <li>Culture Générale : 7/10 </li>
                </ul>
            </div>

            <div class="cadre-login__quiz">
                <p class="cadre-login__quiz__derniersquiz"> Mes derniers quiz effectués : </p>
                <ul class="cadre-login__quiz_listequiz">
                    <li>Grèce Antique : 7 /10</li>
                    <li>Rome Antique : 6 / 10</li>
                    <li> Egypte Ancienne : 6/10 </li>
                </ul>
            </div> ';
    }
}
