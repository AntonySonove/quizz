<?php

class ViewHome
{
  private ?string $quizzList = '';

  public function getQuizzList(): ?string
  {
    return $this->quizzList;
  }

  public function setQuizzList(?string $quizzList): self
  {
    $this->quizzList = $quizzList;
    return $this;
  }

  //METHOD
  public function displayView(): string
  {
    return ("
      <main>
        <section class='search-container'>
            <div class='search-container-flex'>
                <h3 class='search-container-flex__title'>Retrouvez un Quiz !</h3>
                <div class='search-container__nav-bar-flex'>
                    <input class='search-container__search-bar' type='text'
                        placeholder='Histoire, chiens, la france, c'est à toi...'>
                    <div class='search-container__icon-container'>
                        <img class='search-container__icon-container-icon' src='assets/img/icone/loupe-icon.webp'
                            alt='Icone de loupe'>
                    </div>
                </div>
            </div>
        </section>

        <select id='categories' placeholder='Catégories'>
            <option value='Catégories' disabled selected hidden>Catégories</option>
            <option value='Toutes'>Toutes</option>
        </select>

        <section class='quiz-container'>" .
      $this->getQuizzList()
      . "</section>
      </main>
    ");
  }
}
