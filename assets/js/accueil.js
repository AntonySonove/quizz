const quizContainer = document.querySelector('.quiz-container');
const categoriesContainer = document.querySelector('#categories');
let cards = [];
let objCards = {};


// GRID DE QUIZ

const cardsHome = async () => {
    cards = [];
    try {
        const recupApi = await fetch('https://quizz.adrardev.fr/api/quizzs/all');
        if (!recupApi.ok || recupApi.status !== 200) {
            console.error("Erreur lors de la récupération des données : ", recupApi.statusText);
            return;
        }
        const transformedData = await recupApi.json();
        createCards(transformedData);
        objCards = transformedData;
    } catch (error) {
        console.error("Erreur lors de l'appel à l'API : ", error);
    }
};
cardsHome();

function createCards(array) {
    array.forEach((item) => {
        let newCard = document.createElement('a');
        quizContainer.appendChild(newCard);
        newCard.setAttribute('href', 'assets/pages/description-quiz.html');
        newCard.classList.add('quiz-card-container');
        
        newCard.innerHTML = `
        <article class="quiz-card">
        <img class="quiz-card__img" src="assets/img/img_quiz/${item.title}.jpg" alt="Image du quiz">
        <h4 class="quiz-card__title">
        ${item.title}
        </h4>
        </article>
        `;
    })
}


// CATÉGORIES INPUT

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


// FILTRER CATÉGORIES

const categoriesInput = document.querySelector('#categories');

categoriesInput.addEventListener('change', (event) => {
    const selectedValue = event.target.value;
    filterCategories(selectedValue);
});

function filterCategories(categ) {
    const cards = document.querySelectorAll('.quiz-card');

    for (let i = 0; i < cards.length; i++) {
        if (categ === "Toutes") {
            cards[i].style.display = "block";
        } else {
            const hasMatchingCategory = objCards[i].categories.some(category => category.title === categ);
            
            if (hasMatchingCategory) {
                cards[i].style.display = "block";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
}



// LIEN VERS LA PAGE SUIVANTE

quizContainer.addEventListener('click', (e) => {
    const targetCard = e.target.closest('.quiz-card'); 
    if (targetCard) {
        const cards = Array.from(quizContainer.querySelectorAll('.quiz-card'));
        index = cards.indexOf(targetCard);
        index = objCards[index];
        sessionStorage.setItem('quizObj', JSON.stringify(index));
    }
})



// const redirectToQuestionsPage = (categoryId) => {
//     const url = new URL("assets/pages/lienapi2.html", window.location.origin); 
//     url.searchParams.set("categoryId", categoryId); 
//     window.location.href = url.href;
// };
