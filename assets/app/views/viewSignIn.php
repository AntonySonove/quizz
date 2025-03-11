<?php

class ViewSignIn
{
  //METHOD
  public function displayView(): string
  {
    return ("
    <main class='cadre-login'>

      <h1 class='cadre-login__titre'> Connexion </h1>

      <form class='form-login' action='' method='post'>
        <div class='cadre-login__soustitre'>
          <label for='email-login' class='cadre-login__soustitre__texte'> E-mail : </label>
          <input type='text' id='email-login' class='cadre-login__soustitre__input' placeholder='' />
        </div>

        <div class='cadre-login__soustitre'>
          <label for='password-login' class='cadre-login__soustitre__texte'> Mot de passe :</label>
          <input type='password' id='password-login' class='cadre-login__soustitre__input' placeholder='' />
          <p id='messageMdp' class='cadre-login__soustitre__message'>*Le mot de passe n'est pas correct.</p>
        </div>

        <div class='cadre-login__soustitre__checkbox'>
          <input type='checkbox' name='remember' id='remember' checked>
          <label for='remember' class='cadre-login__soustitre__checkbox__checked'> Rester connecté </label>
        </div>

        <div class='cadre-login__soustitre__submit'>
          <input type='submit' value='Se connecter' a href='./userprofile.html'
                class='cadre-login__soustitre__submit__texte'>
        </div>
      </form>

      <div class='cadre-login__oublie'>
          <a href='mdpoublie.html' class='cadre-login__oublie__texte'> Mot de passe oublié ?</a>
      </div>

      <div class='cadre-login__creer'>
          <a href='creercompte.html' class='cadre-login__creer__texte'> Créer un compte</a>
      </div>
      
  </main>
      ");
  }
}
