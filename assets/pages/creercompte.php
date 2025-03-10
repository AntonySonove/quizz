<?php
include("controllerAccount");
include("viewHeader");
include("viewFooter");
class ViewHeader{

//METHOD
public function displayView():string{
    return '
            <div class="cadre-login">
                
                <h1 class="cadre-login__titre"> Inscription </h1>

                <div class = "cadre-login__soustitre">
                    <label for="firstname" class="cadre-login__soustitre__texte"> Nom : </label>
                    <input type="text" id="firstname" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="firstname"/>
                </div>

                <div class = "cadre-login__soustitre">
                    <label for="lastname" class="cadre-login__soustitre__texte"> Prénom : </label>
                    <input type="text" id="lastname" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="lastname"/>
                </div>

                <div class = "cadre-login__soustitre">
                    <label for="email" class="cadre-login__soustitre__texte"> E-mail : </label>
                    <input type="text" id="mail" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="email"/>
                </div>

                <div class = "cadre-login__soustitre">
                    
                    <label for="role" class="cadre-login__soustitre__texte"> Formateur : </label>
                    <input type="checkbox" id="checkForm" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="checkForm" value="Formateur"/>
                    <label for="role" class="cadre-login__soustitre__texte"> Stagiaire : </label>
                    <input type="checkbox" id="checkStag" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="checkStag"/>
                </div>

                <div class ="cadre-login__soustitre">
                    <label for="password" class="cadre-login__soustitre__texte"> Mot de passe :</label>
                    <input type="text" id="password" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="password"/>
                    <p class ="cadre-login__soustitre__conditions">12 caractères minimum, au moins 1 majuscule, 1 minuscule et 1 caractère spécial (!@#$%&()_)</p>
                    </form>
                </div>

                <div class = "cadre-login__soustitre">
                    <label for="confpassword" class="cadre-login__soustitre__texte"> Confirmer le mot de passe : </label>
                    <input type="text" id="confirmpass" class="cadre-login__soustitre__input" style="width: 450px; height: 40px" name="confpassword"/>
                    <p id=messagepassword class="cadre-login__soustitre__message" style="width: 400px; align-self: center; margin: 0;">*Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.</p>
                </div>

                <div class="cadre-login__soustitre__submit">
                        <input type="submit" value="Continuer" a href="./confirmation.html" style="width: 450px; height: 60px" class="cadre-login__soustitre__submit__texte">
                </div>
                <div class = "cadre-login__oublie">
                    <a href="./passwordoublie.html" class = "cadre-login__oublie__texte"> Retour </a>
                </div>
            </div>
            <p>ok</p>';
        }
    }
?>