<?php
class ViewScore{

    //! attributs
    private ?string $globalList="";
    private ?string $themeList="";
    private ?string $quizzList="";

    //! getter et setter

    public function getGlobalList(): ?string{
        return $this->globalList;
    }
    public function setGlobalList(?string $globalList): ViewScore{
        $this->globalList=$globalList;
        return $this;
    }
    public function getThemeList(): ?string{
        return $this->themeList;
    }
    public function setThemeList(?string $themeList): ViewScore{
        $this->themeList=$themeList;
        return $this;
    }
    public function getQuizzList(): ?string{
        return $this->quizzList;
    }
    public function setQuizzList(?string $quizzList): ViewScore{
        $this->quizzList=$quizzList;
        return $this;
    }


    //! method 

    public function displayView():string{
        return '
            <main class="maincontainer__statistique">
                <h1 class="maincontainer__statistique__title">Statistique global</h1>
                <table class="maincontainer__statistique__tableauxglobal">
                    <tr>
                        <th>Classement</th>
                        <th>Pseudo</th>
                        <th>Questionnaire résolue</th>
                        <th>Note</th>
                        <th>Score</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Ronaldinho</td>
                        <td>3/4</td>
                        <td>30/30</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Ronaldinho</td>
                        <td>3/4</td>
                        <td>30/30</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Ronaldinho</td>
                        <td>3/4</td>
                        <td>30/30</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Ronaldinho</td>
                        <td>3/4</td>
                        <td>30/30</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Ronaldinho</td>
                        <td>3/4</td>
                        <td>30/30</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Ronaldinho</td>
                        <td>3/4</td>
                        <td>30/30</td>
                        <td>100</td>
                    </tr>
                </table>
        
                
        
                <h1 class="maincontainer__statistique__title">Statistique par thèmes</h1>
        
                <table class="maincontainer__statistique__tableauxbytheme">
                    <tr>
                        <th>Classement</th>
                        <th>thème les plus joué</th>
                        <th>Etoile</th>
                        
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>sport</td>
                        <td>4.6⭐</td>
                        
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>sport</td>
                        <td>4.6⭐</td>
                        
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>sport</td>
                        <td>4.6⭐</td>
                        
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>sport</td>
                        <td>4.6⭐</td>
                        
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>sport</td>
                        <td>4.6⭐</td>
                        
                    </tr>
                </table>
        
                <h1 class="maincontainer__statistique__title">Statistique quiz</h1>
        
                <table class="maincontainer__statistique__tableauxquizz">
                    <tr>
                        <th>Classement</th>
                        <th>Quizz le plus joué</th>
                        <th>thème</th>
                        <th>Score</th>
                        
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>sport quizz 1</td>
                        <td>sport</td>
                        <td>4.6⭐</td>
                        
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>sport quizz 1</td>
                        <td>sport</td>
                        <td>4.6⭐</td>
                        
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>sport quizz 1</td>
                        <td>sport</td>
                        <td>4.6⭐</td>
                        
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>sport quizz 1</td>
                        <td>sport</td>
                        <td>4.6⭐</td>
                        
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>sport quizz 1</td>
                        <td>sport</td>
                        <td>4.6⭐</td>
                        
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>sport quizz 1</td>
                        <td>sport</td>
                        <td>4.6⭐</td>
                        
                    </tr>
                </table>
            </main>
            
            ';
    }
}
?>