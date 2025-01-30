const data = sessionStorage.getItem("quizObj");
const chosenQuiz = JSON.parse(data);

let chosenIndex = chosenQuiz.id - 1;

//! récupération de l'API pour les questions
const contactApi10 = async () => {
    try {
        const recupApi = await fetch('https://quizz.adrardev.fr/api/quizzs/all');
        console.log(recupApi);
        if (!recupApi.ok || recupApi.status !== 200) {
            console.error("Erreur lors de la récupération des données : ", recupApi.statusText);
            return;
        }
        const transformedData = await recupApi.json();
        // console.log(transformedData);
        // console.log(transformedData[chosenIndex]);
        //! récupération des données pour les questions et réponses
        //* question 1
        console.log(transformedData[chosenIndex].questions); //? liste des questions
        // console.log(transformedData[chosenIndex].questions.length);
        // console.log(transformedData[chosenIndex].questions[0].description); //? nom de la question
        // console.log(transformedData[chosenIndex].questions[0].answers);//? liste des réponses
        // console.log(transformedData[chosenIndex].questions[0].answers[0]); //? utiliser "valid" pour le compteur de bonnes réponses
        // console.log(transformedData[chosenIndex].questions[0].answers[0].valid); //? valeur true pour la bonne réponse
        // console.log(transformedData[chosenIndex].questions[0].answers[0].text); //? texte de la bonne réponse
        // //* question 2
        // console.log(transformedData[chosenIndex].questions[1].description);
        // console.log(transformedData[chosenIndex].questions[1].answers);
        // console.log(transformedData[chosenIndex].questions[1].answers[0]);
        // console.log(transformedData[chosenIndex].questions[1].answers[0].text);
        // //* question 3
        // console.log(transformedData[chosenIndex].questions[2].description);
        // console.log(transformedData[chosenIndex].questions[2].answers);
        // console.log(transformedData[chosenIndex].questions[2].answers[2]);
        // console.log(transformedData[chosenIndex].questions[2].answers[2].text);
        // //* question 4
        // console.log(transformedData[chosenIndex].questions[3].description);
        // console.log(transformedData[chosenIndex].questions[3].answers);
        // console.log(transformedData[chosenIndex].questions[3].answers[3]);
        // console.log(transformedData[chosenIndex].questions[3].answers[3].text);
       
        
        //! variables
        //* variables pour les fonctions
        const answerButtonSelectedA=document.getElementById("answerButtonSelectedA");
        const answerButtonSelectedB=document.getElementById("answerButtonSelectedB");
        const answerButtonSelectedC=document.getElementById("answerButtonSelectedC");
        const answerButtonSelectedD=document.getElementById("answerButtonSelectedD");
        const answerButton=document.getElementById("answerButton");
        const suivant=document.getElementById("suivant");
        let selectCountA=0;
        let selectCountB=0;
        let selectCountC=0;
        let selectCountD=0;
        let answerButtonCount=0;
        //* variable pour les questions
        const questionNumber= document.getElementById("questionNumber");
        const questionName=document.getElementById("questionName");
        let questionNumberCount=transformedData[chosenIndex].questions.length-transformedData[chosenIndex].questions.length+1;
        const textAnswerA=document.getElementById("textAnswerA");
        const textAnswerB=document.getElementById("textAnswerB");
        const textAnswerC=document.getElementById("textAnswerC");
        const textAnswerD=document.getElementById("textAnswerD");
        let next=0;
        const result=document.getElementById("result");
        let score=0;
        const resultContainer=document.getElementById("resultContainer");
        resultContainer.classList.add("resultContainerNone");
        
        //! application des question/réponses sur le html
        function nextQuestion(next){
            if (next==transformedData[chosenIndex].questions.length){
                result.innerText=`${score}/${transformedData[chosenIndex].questions.length}`;
            }
            else{
            questionNumber.innerText=`${questionNumberCount}/${transformedData[chosenIndex].questions.length}`
            questionName.innerText=transformedData[chosenIndex].questions[next].description;
            textAnswerA.innerText=transformedData[chosenIndex].questions[next].answers[0].text;
            textAnswerB.innerText=transformedData[chosenIndex].questions[next].answers[1].text;
            textAnswerC.innerText=transformedData[chosenIndex].questions[next].answers[2].text;
            textAnswerD.innerText=transformedData[chosenIndex].questions[next].answers[3].text;
            }
        }
        //! Fonctions pour le visuel d'une réponse sélectionnée
        answerButtonSelectedA.addEventListener("click",()=>{
            answerButtonSelectedA.classList.add("answerButtonSelected");
            answerButtonSelectedA.classList.remove("answerButton");
            answerButtonSelectedB.classList.add("answerButton");
            answerButtonSelectedC.classList.add("answerButton");
            answerButtonSelectedD.classList.add("answerButton");
            answerButtonSelectedB.classList.remove("answerButtonSelected");
            answerButtonSelectedC.classList.remove("answerButtonSelected");
            answerButtonSelectedD.classList.remove("answerButtonSelected");
            selectCountA=1;
            selectCountB=0;
            selectCountC=0;
            selectCountD=0;
            enabledAnswerButton()
        });
        answerButtonSelectedB.addEventListener("click",()=>{
            answerButtonSelectedB.classList.toggle("answerButtonSelected");
            answerButtonSelectedB.classList.toggle("answerButton");
            answerButtonSelectedA.classList.add("answerButton");
            answerButtonSelectedC.classList.add("answerButton");
            answerButtonSelectedD.classList.add("answerButton");
            answerButtonSelectedA.classList.remove("answerButtonSelected");
            answerButtonSelectedC.classList.remove("answerButtonSelected");
            answerButtonSelectedD.classList.remove("answerButtonSelected");
            selectCountA=0;
            selectCountB=1;
            selectCountC=0;
            selectCountD=0;
            enabledAnswerButton()    
        });
        answerButtonSelectedC.addEventListener("click",()=>{
            answerButtonSelectedC.classList.toggle("answerButtonSelected");
            answerButtonSelectedC.classList.toggle("answerButton");
            answerButtonSelectedB.classList.add("answerButton");
            answerButtonSelectedA.classList.add("answerButton");
            answerButtonSelectedD.classList.add("answerButton");
            answerButtonSelectedA.classList.remove("answerButtonSelected");
            answerButtonSelectedB.classList.remove("answerButtonSelected");
            answerButtonSelectedD.classList.remove("answerButtonSelected");
            selectCountA=0;
            selectCountB=0;
            selectCountC=1;
            selectCountD=0;
            enabledAnswerButton()
        });
        answerButtonSelectedD.addEventListener("click",()=>{
            answerButtonSelectedD.classList.toggle("answerButtonSelected");
            answerButtonSelectedD.classList.toggle("answerButton");
            answerButtonSelectedB.classList.add("answerButton");
            answerButtonSelectedC.classList.add("answerButton");
            answerButtonSelectedA.classList.add("answerButton");
            answerButtonSelectedA.classList.remove("answerButtonSelected");
            answerButtonSelectedB.classList.remove("answerButtonSelected");
            answerButtonSelectedC.classList.remove("answerButtonSelected");
            selectCountA=0;
            selectCountB=0;
            selectCountC=0;
            selectCountD=1;
            enabledAnswerButton()
        });
        //! Fonctions pour afficher les bonnes et mauvaises réponses
        answerButton.addEventListener("click",()=>{
            answerButtonSelectedA.classList.remove("rightAnswer");
            answerButtonSelectedB.classList.remove("rightAnswer");
            answerButtonSelectedC.classList.remove("rightAnswer");
            answerButtonSelectedD.classList.remove("rightAnswer");
            answerButtonSelectedA.classList.remove("wrongAnswer");
            answerButtonSelectedB.classList.remove("wrongAnswer");
            answerButtonSelectedC.classList.remove("wrongAnswer");
            answerButtonSelectedD.classList.remove("wrongAnswer");
            if (transformedData[chosenIndex].questions[next].answers[0].valid==true){
                answerButtonSelectedA.classList.add("rightAnswer");
                if(selectCountA==1){
                    score+=1
                    console.log(score);
                }
            }
            if (transformedData[chosenIndex].questions[next].answers[0].valid==false && selectCountA==1){
                answerButtonSelectedA.classList.add("wrongAnswer");
            }
            if (transformedData[chosenIndex].questions[next].answers[1].valid==true){
                answerButtonSelectedB.classList.add("rightAnswer");
                if(selectCountB==1){
                    score+=1
                    console.log(score);
                }
            }
            if (transformedData[chosenIndex].questions[next].answers[1].valid==false && selectCountB==1){
                answerButtonSelectedB.classList.add("wrongAnswer");
            }
            if (transformedData[chosenIndex].questions[next].answers[2].valid==true){
                answerButtonSelectedC.classList.add("rightAnswer");
                if(selectCountC==1){
                    score+=1
                    console.log(score);
                }
            }
            if (transformedData[chosenIndex].questions[next].answers[2].valid==false && selectCountC==1){
                answerButtonSelectedC.classList.add("wrongAnswer");
            }
            if (transformedData[chosenIndex].questions[next].answers[3].valid==true){
                answerButtonSelectedD.classList.add("rightAnswer");
                if(selectCountD==1){
                    score+=1
                    console.log(score);
                }
            }
            if (transformedData[chosenIndex].questions[next].answers[3].valid==false && selectCountD==1){
                answerButtonSelectedD.classList.add("wrongAnswer");
            }
            resetSelectCount();
            answerButton.disabled=true
            answerButtonCount=1 //? permet de bloquer le bouton validé pour ne pas pouvoir répondre a nouveau au quiz et fausser le résultat
        });
        function resetSelectCount(){
            selectCountA=0;
            selectCountB=0;
            selectCountC=0;
            selectCountD=0;
        }
        //! fonction pour activer/desactiver le bouton Valider
        answerButton.disabled=true;
        function enabledAnswerButton(){
            if (answerButtonCount==0){
                if(selectCountA==1||selectCountB==1||selectCountC==1||selectCountD==1){
                answerButton.disabled=false;
                }
            }
            else{
                answerButton.disabled=true;
            }
        }
        //! fonction pour faire apparaitre le bouton suivant
        suivant.disabled=true;
        answerButton.addEventListener("click",()=>suivant.disabled=false);
        //! fonctions du bouton suivant
        suivant.addEventListener("click",()=>{
            answerButtonSelectedA.classList.remove("rightAnswer");
            answerButtonSelectedB.classList.remove("rightAnswer");
            answerButtonSelectedC.classList.remove("rightAnswer");
            answerButtonSelectedD.classList.remove("rightAnswer");
            answerButtonSelectedA.classList.remove("wrongAnswer");
            answerButtonSelectedB.classList.remove("wrongAnswer");
            answerButtonSelectedC.classList.remove("wrongAnswer");
            answerButtonSelectedD.classList.remove("wrongAnswer");
            answerButtonSelectedA.classList.remove("answerButtonSelected");
            answerButtonSelectedA.classList.add("answerButton");
            answerButtonSelectedB.classList.remove("answerButtonSelected");
            answerButtonSelectedB.classList.add("answerButton");
            answerButtonSelectedC.classList.remove("answerButtonSelected");
            answerButtonSelectedC.classList.add("answerButton");
            answerButtonSelectedD.classList.remove("answerButtonSelected");
            answerButtonSelectedD.classList.add("answerButton");
            suivant.disabled=true;
            selectCountA=0;
            selectCountB=0;
            selectCountC=0;
            selectCountD=0;
            answerButtonCount=0;
            questionNumberCount+=1;
            // console.log(questionNumberCount);
            next+=1;
            nextQuestion(next);
        });
        //! fonction passage aux résultats une fois le quiz terminé
        function nextPage(){
            document.location.href="../pages/resultat-quiz.html";
        }
    } catch (error) {
        console.error("Erreur lors de l'appel à l'API : ", error);
    }
    nextQuestion(0);
    
};
contactApi10();