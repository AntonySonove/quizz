



const contactApi =  async () => {
    //Data va récup Toutes les données de l'api
    const response = await fetch('https://quizz.adrardev.fr/api/quizz/1');//await permet de faire notre fonction en mode asynchrone cela permet d'avoir une réponse et non une promesse
    console.log(response);
    console.log(response.ok);
    console.log(response.status);
    //Plutôt que de Travailler sur la réponse, on va la transformé en objet JS 
    const dataTransformed = await response.json();  //on va traduire le json en js en await pour attendre qu'il est bien terminer de transformer avant de passer a la suite
    console.log(dataTransformed);
    console.log(dataTransformed.elevation);
    apiDiv.innerText = dataTransformed.latitude + ' ' + dataTransformed.longitude;
};
contactApi();