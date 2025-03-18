<?php

class ViewSignUp
{
    private ?string $message = "";

    //getter setter
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
        return "
           <main class='cadre-login'>

            <form method='post'>
                <h1 class='cadre-login__titre'> Inscription </h1>

                <div class='cadre-login__soustitre'>
                    <label for='firstname' class='cadre-login__soustitre__texte'> Nom : </label>
                    <input type='text' id='firstname' class='cadre-login__soustitre__input' name='firstname' required />
                </div>

                <div class='cadre-login__soustitre'>
                    <label for='lastname' class='cadre-login__soustitre__texte'> Prénom : </label>
                    <input type='text' id='lastname' class='cadre-login__soustitre__input' name='lastname' required/>
                </div>

                <div class='cadre-login__soustitre'>
                    <label for='email' class='cadre-login__soustitre__texte'> E-mail : </label>
                    <input type='text' id='email' class='cadre-login__soustitre__input' name='email' required/>
                </div>


                <div class='cadre-login__soustitre'>
                    <label for='password' class='cadre-login__soustitre__texte'> Mot de passe :</label>
                    <input type='password' id='password' class='cadre-login__soustitre__input' name='password' required/>
                    <p class='cadre-login__soustitre__conditions'>12 caractères minimum, au moins 1 majuscule, 1 minuscule
                        et 1 caractère spécial (!@#$%&()_)</p>
                </div>

                <div class = 'cadre-login__soustitre'>
                    <label for='confirmpass' class='cadre-login__soustitre__texte'> Confirmer le mot de passe : </label>
                    <input type='password' id='confirmpass' class='cadre-login__soustitre__input' name='confirmpass' required/>
                    <p id='messagepassword' class='cadre-login__soustitre__conditions'></p>
                </div>    
                
                <div class='cadre-login__soustitre__submit'>
                    <input type='submit' value='Continuer' name='submit' class='cadre-login__soustitre__submit__texte'>
                </div>

                <p class='cadre-login__oublie'>" . $this->getMessage() . "</p>
            </form> 

            <div class='cadre-login__oublie'>
                <a href='./mdpoublie.html' class='cadre-login__oublie__texte'> Retour </a>
            </div>
            
        </main>
        ";
    }
}
