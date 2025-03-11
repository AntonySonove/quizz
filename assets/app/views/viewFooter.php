<?php

class ViewFooter
{
  public function displayView(): string
  {
    return ("
      <footer>
          <p class='footer-texte'>Copyright© Antony, Lassana, Pedro et Perrine - 2025 | Tous droits réservés</p>
      </footer>

      <script src='../../js/accueil.js'></script>
      <script src='../../js/barre-recherche.js'></script>
    </body>
    </html>
    ");
  }
}