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
        return '
           <main class="cadre-login">

            <form id="cadre-login_form_inscription" method="post">
                <h1 class="cadre-login__titre"> Inscription </h1>

                <div class="cadre-login__soustitre">
                    <label for="firstname" class="cadre-login__soustitre__texte"> Nom : </label>
                    <input type="text" id="firstname" class="cadre-login__soustitre__input" name="firstname" />
                </div>

                <div class="cadre-login__soustitre">
                    <label for="lastname" class="cadre-login__soustitre__texte"> Prénom : </label>
                    <input type="text" id="lastname" class="cadre-login__soustitre__input" name="lastname" />
                </div>

                <div class="cadre-login__soustitre">
                    <label for="email" class="cadre-login__soustitre__texte"> E-mail : </label>
                    <input type="text" id="email" class="cadre-login__soustitre__input" name="email" />
                </div>


                <div class="cadre-login__soustitre">
                    <label for="password" class="cadre-login__soustitre__texte"> Mot de passe :</label>
                    <input type="password" id="password" class="cadre-login__soustitre__input" name="password" />
                    <p class="cadre-login__soustitre__conditions">12 caractères minimum, au moins 1 majuscule, 1 minuscule
                        et 1 caractère spécial (!@#$%&()_)</p>
                </div>

                <div class = "cadre-login__soustitre">
                        <label for="confirmpass" class="cadre-login__soustitre__texte"> Confirmer le mot de passe : </label>
                        <input type="password" id="confirmpass" class="cadre-login__soustitre__input" name="confirmpass"/>
                        <p id="messagepassword" class="cadre-login__soustitre__conditions"></p>
                </div>    
                
                <div class="cadre-login__soustitre__submit">
                <input type="submit" href= value="Continuer" name="submit" class="cadre-login__soustitre__submit__texte">
                </div>
                
            </form> 

            <div class="cadre-login__oublie">
                <a href="./mdpoublie.html" class="cadre-login__oublie__texte"> Retour </a>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                const form = document.getElementById("cadre-login_form_inscription");
                
                form.addEventListener("submit", function (event) {
                    event.preventDefault(); // Empêcher l\'envoi du formulaire 
                    
                    const formData = new FormData(form);
                    const data = {
                        firstname: formData.get("firstname"),
                        lastname: formData.get("lastname"),
                        email: formData.get("email"),
                        password: formData.get("password"),
                    };

                    // Vérification de la correspondance des mots de passe
                    if (data.password !== document.getElementById("confirmpass").value) {
                        document.getElementById("messagepassword").textContent = "Les mots de passe ne correspondent pas.";
                        return;
                    }

                    // Envoyer la requête POST à l\'API PHP
                    fetch("../../pages/API.PHP", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify(data),
                    })
                    .then(response => response.json())
                    .then(responseData => {
                        if (responseData.code === 200) {
                            alert("Inscription réussie !");
                            // Rediriger ou afficher un message de confirmation
                        } else {
                            alert("Erreur : " + responseData.message);
                        }
                    })
                    .catch(error => {
                        console.error("Erreur:", error);
                        alert("Une erreur est survenue.");
                    });
                });
            });
        </script>

            

    </main>
            ';
    }
}
