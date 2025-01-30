// SESSION STORAGE
const data = sessionStorage.getItem("quizObj");
const chosenQuiz = JSON.parse(data);

console.log(chosenQuiz.id)

const quizTitle = document.querySelector('.description-title');
const quizDescription = document.querySelector('.description-text');
const quizImage = document.querySelector('.description-img');

quizTitle.textContent = chosenQuiz.title;
quizDescription.textContent = chosenQuiz.description;
quizImage.src = `../img/img_quiz/${chosenQuiz.title}.jpg`
