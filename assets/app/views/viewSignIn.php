<?php

class ViewSignIn
{

  private ?string $message;

  public function getMessage(): ?string
  {
    return $this->message;
  }

  public function setMessage(?string $message): self
  {
    $this->message = $message;
    return $this;
  }


  //METHOD
  public function displayView(): string
  {
    return ("
    <main class='cadre-login'>

      <h1 class='cadre-login__titre'> Connexion </h1>

      <form class='form-login' action='' method='post'>
        <div class='cadre-login__soustitre'>
          <label for='email-login' class='cadre-login__soustitre__texte'> E-mail : </label>
          <input type='text' id='email-login' name='email-login' class='cadre-login__soustitre__input' placeholder='' required />
        </div>

        <div class='cadre-login__soustitre'>
          <label for='password-login' class='cadre-login__soustitre__texte'> Mot de passe :</label>
          <input type='password' id='password-login' name='password-login' class='cadre-login__soustitre__input' placeholder='' required/>
          <p id='messageMdp' class='cadre-login__soustitre__message'></p>
        </div>

          <div class='cadre-login__soustitre__submit'>
          <input type='submit' value='Se connecter' name='submit-connexion' class='cadre-login__soustitre__submit__texte'>
        </div>
      </form> <p class='cadre-login__oublie__texte'>" . $this->getMessage()
      . " </p><div class='cadre-login__oublie'>
          <a href='mdpoublie.html' class='cadre-login__oublie__texte'> Mot de passe oublié ?</a>
      </div>

      <div class='cadre-login__creer'>
          <a href='creercompte.html' class='cadre-login__creer__texte'> Créer un compte</a>
      </div>
      
  </main>
      ");
  }
}
