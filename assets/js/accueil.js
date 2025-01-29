const quizContainer = document.querySelector('.quiz-container');
const categoriesContainer = document.querySelector('#categories');
let cards = [];


// GRID DE QUIZ

const cardsHome = async () => {
    cards = [];
    try {
        const recupApi = await fetch('https://quizz.adrardev.fr/api/question/all');
        if (!recupApi.ok || recupApi.status !== 200) {
            console.error("Erreur lors de la récupération des données : ", recupApi.statusText);
            return;
        }
        const transformedData = await recupApi.json();
        selectTitles(transformedData);
        createCards(cards)
    } catch (error) {
        console.error("Erreur lors de l'appel à l'API : ", error);
    }
};
cardsHome();

function selectTitles(data) {
    data.forEach(e => {
        cards.push(e.title);
    });
    const uniqueArray = [...new Set(cards)];
    cards = uniqueArray;
}

function createCards(array) {
    array.forEach((item) => {
        let newCard = document.createElement('a');
        quizContainer.appendChild(newCard);
        // newCard.setAttribute('href', 'assets/pages/description-quiz.html');
        newCard.classList.add('quiz-card-container')

        newCard.innerHTML = `
        <article class="quiz-card">
        <img class="quiz-card__img" src="assets/img/img_question/img_test.jpg" alt="Image du quiz">
        <h4 class="quiz-card__title">
        ${item}
        </h4>
        </article>
        `
    })
}


// CATÉGORIES

const createCategories = async () => {
    try {
        const recupApi = await fetch('https://quizz.adrardev.fr/api/category/all');
        if (!recupApi.ok || recupApi.status !== 200) {
            console.error("Erreur lors de la récupération des données : ", recupApi.statusText);
            return;
        }
        const transformedData = await recupApi.json();
        selectCategories(transformedData)
    } catch (error) {
        console.error("Erreur lors de l'appel à l'API : ", error);
    }
};
createCategories();

function selectCategories(data) {
    data.forEach((item) => {
        let newCategory = document.createElement('option');
        categoriesContainer.appendChild(newCategory);
        newCategory.setAttribute('value', item.title);
        newCategory.innerText = item.title;
    })
}


// CREATE DESCRIPTION-QUIZ PAGE

const descriptionTitle = document.querySelector('.description-title');

quizContainer.addEventListener('click', (e) => {
    if (e.target.parentElement.classList.contains('quiz-card-container')) {
        console.log(e.target.querySelector('.quiz-card__title').innerText);
        sessionStorage.setItem("quiz", e.target.querySelector('.quiz-card__title').innerText);

        
    }
    if (e.target.parentElement.parentElement.classList.contains('quiz-card-container')) {
        if (e.target.classList.contains('quiz-card__title')) {
            console.log(e.target.innerText)
        } else {
            console.log(e.target.parentElement.querySelector('.quiz-card__title').innerText)
        }
    }
})
