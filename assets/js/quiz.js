const answerButtonSelectedA=document.getElementById("answerButtonSelectedA");
const answerButtonSelectedB=document.getElementById("answerButtonSelectedB");
const answerButtonSelectedC=document.getElementById("answerButtonSelectedC");
const answerButtonSelectedD=document.getElementById("answerButtonSelectedD");
// console.log(answerButtonSelectedA);

function answerSelectedA(){
    answerButtonSelectedA.classList.toggle("answerButtonSelected");
    answerButtonSelectedA.classList.toggle("answerButton");
    answerButtonSelectedB.classList.add("answerButton");
    answerButtonSelectedC.classList.add("answerButton");
    answerButtonSelectedD.classList.add("answerButton");
    answerButtonSelectedB.classList.remove("answerButtonSelected");
    answerButtonSelectedC.classList.remove("answerButtonSelected");
    answerButtonSelectedD.classList.remove("answerButtonSelected");
}
function answerSelectedB(){
    answerButtonSelectedB.classList.toggle("answerButtonSelected");
    answerButtonSelectedB.classList.toggle("answerButton");
    answerButtonSelectedA.classList.add("answerButton");
    answerButtonSelectedC.classList.add("answerButton");
    answerButtonSelectedD.classList.add("answerButton");
    answerButtonSelectedA.classList.remove("answerButtonSelected");
    answerButtonSelectedC.classList.remove("answerButtonSelected");
    answerButtonSelectedD.classList.remove("answerButtonSelected");
}
function answerSelectedC(){
    answerButtonSelectedC.classList.toggle("answerButtonSelected");
    answerButtonSelectedC.classList.toggle("answerButton");
    answerButtonSelectedB.classList.add("answerButton");
    answerButtonSelectedA.classList.add("answerButton");
    answerButtonSelectedD.classList.add("answerButton");
    answerButtonSelectedA.classList.remove("answerButtonSelected");
    answerButtonSelectedB.classList.remove("answerButtonSelected");
    answerButtonSelectedD.classList.remove("answerButtonSelected");
}
function answerSelectedD(){
    answerButtonSelectedD.classList.toggle("answerButtonSelected");
    answerButtonSelectedD.classList.toggle("answerButton");
    answerButtonSelectedB.classList.add("answerButton");
    answerButtonSelectedC.classList.add("answerButton");
    answerButtonSelectedA.classList.add("answerButton");
    answerButtonSelectedA.classList.remove("answerButtonSelected");
    answerButtonSelectedB.classList.remove("answerButtonSelected");
    answerButtonSelectedC.classList.remove("answerButtonSelected");
}