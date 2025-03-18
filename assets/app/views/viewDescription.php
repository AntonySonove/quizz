<?php
class ViewDescription{





    public function displayView(){

        return '<main class="description-container">
        <div class="description-top-container-flex">
            <div class="description-left">
                <img class="description-img" src="../../img/img_question/img_test.jpg" alt="Image du quiz">
                <a class="description-classification-btn" href="quiz.html">C\'est parti !</a>
            </div>
            <div class="description-right">
                <h1 class="description-title">aee</h1>
                <p class="description-text">Lorem ipsum dolor sit amet. Ut molestiae galisum id inventore velit et quidem numquam? Id quia provident id laboriosam aliquam aut galisum nihil et odio totam aut quisquam consequatur non voluptate</p>
            </div>
        </div>
        <div class="description-comments">
            <h4 class="description-comments__title">Commentaires :</h4>
            <ul class="description-comments__list">
                <li class="description-comments__list__item">
                    <img src="../../img/img_profil/ronaldinho.webp" alt="Image de profil">
                    <div class="description-comments__list__comment">
                        <div class="description-comments__list__comment__upper-line">
                            <p>Ronaldinho Gaúcho</p>
                            <p> • il y a 2 jours</p>
                        </div>
                        <p class="description-comments__list__comment__comment">Platon, c\'est un peu le gars qui a inventé le concept des idées, mais qui n\'avait pas d\'idée de comment faire taire Socrate. 😂</p>
                        <div class="description-comments__list__comment__btn">
                            <div class="description-comments__list__comment__btn__like">
                                <img src="../../img/icone/like-icon.webp" alt="Like icon">
                                <p>1.594</p>
                            </div>
                            <div class="description-comments__list__comment__btn__dislike">
                                <img src="../../img/icone/dislike-icon.webp" alt="Dislike icon">
                                <p>3</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="description-comments__list__item">
                    <img src="../../img/img_profil/image-37.webp" alt="Image de profil">
                    <div class="description-comments__list__comment">
                        <div class="description-comments__list__comment__upper-line">
                            <p>Manu Mac</p>
                            <p> • il y a 12 jours</p>
                        </div>
                        <p class="description-comments__list__comment__comment">9/10, presque parfait, tout comme le Parthénon. On voit que la grandeur, ça me connaît. 😌🏛️</p>
                        <div class="description-comments__list__comment__btn">
                            <div class="description-comments__list__comment__btn__like">
                                <img src="../../img/icone/like-icon.webp" alt="Like icon">
                                <p>2</p>
                            </div>
                            <div class="description-comments__list__comment__btn__dislike">
                                <img src="../../img/icone/dislike-icon.webp" alt="Dislike icon">
                                <p>395</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </main>';

    }
}