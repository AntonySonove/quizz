<?php

class ViewFooter
{
  private ?string $script;

  public function getScript(): ?string
  {
    return $this->script;
  }

  public function setScript(?string $script): self
  {
    $this->script = $script;
    return $this;
  }


  //METHOD

  public function displayView(): string
  {
    return ("
      <footer>
          <p class='footer-texte'>Copyright© Antony, Lassana, Pedro et Perrine - 2025 | Tous droits réservés</p>
      </footer>



      " . $this->getScript() . "
    </body>
    </html>
    ");
  }
}

// <script src='../../js/accueil.js'></script>
// <script src='../../js/barre-recherche.js'></script>
// <script src='../../js/creercompte.js'></script>
// <script src='../../js/description-quiz.js'></script>
// <script src='../../js/mdpoublie.js'></script>
// <script src='../../js/quiz.js'></script>
// <script src='../../js/Regexmodif-info.js'></script>
// <script src='../../js/seconnecter.js'></script>
// <script src='../../js/testrecupAPI.js'></script>