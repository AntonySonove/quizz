//! Fonctions pour le visuel d'une réponse sélectionnée
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
answerButtonSelectedA.addEventListener("click",()=>{
    answerButtonSelectedA.classList.toggle("answerButtonSelected");
    answerButtonSelectedA.classList.toggle("answerButton");
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
let tAnswer={
    a:1,
    b:0,
    c:0,
    d:0,
}
answerButton.addEventListener("click",()=>{
    answerButtonSelectedA.classList.remove("rightAnswer");
    answerButtonSelectedB.classList.remove("rightAnswer");
    answerButtonSelectedC.classList.remove("rightAnswer");
    answerButtonSelectedD.classList.remove("rightAnswer");
    answerButtonSelectedA.classList.remove("wrongAnswer");
    answerButtonSelectedB.classList.remove("wrongAnswer");
    answerButtonSelectedC.classList.remove("wrongAnswer");
    answerButtonSelectedD.classList.remove("wrongAnswer");
    if (tAnswer.a==1){
        answerButtonSelectedA.classList.add("rightAnswer");
    }
    if (tAnswer.a!=1 && selectCountA==1){
        answerButtonSelectedA.classList.add("wrongAnswer");
    }
    if (tAnswer.b==1){
        answerButtonSelectedB.classList.add("rightAnswer");
    }
    if (tAnswer.b!=1 && selectCountB==1){
        answerButtonSelectedB.classList.add("wrongAnswer");
    }
    if (tAnswer.c==1){
        answerButtonSelectedC.classList.add("rightAnswer");
    }
    if (tAnswer.c!=1 && selectCountC==1){
        answerButtonSelectedC.classList.add("wrongAnswer");
    }
    if (tAnswer.d==1){
        answerButtonSelectedD.classList.add("rightAnswer");
    }
    if (tAnswer.d!=1 && selectCountD==1){
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
suivant.addEventListener("click",()=>answerButtonCount=0);