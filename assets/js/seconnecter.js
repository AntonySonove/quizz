const mdp = document.getElementById('password');
const texte = document.querySelector(".cadre-login__soustitre__message");
const email = document.getElementById('mail')

const regexMail = /^[a-z0-9.-]+@[a-z0-9.-]+.[a-z]{2,6}$/;
const regexMDP = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;

// mdp.addEventListener('keyup', ()=>{ 

//     if(regexMDP.test(mdp.value)){    
//             mdp.style.border = 'solid 1px rgb(31, 219, 72)'
//             mdp.style.boxShadow=' 0px 0px 2px rgb(100, 206, 0.12)'

//         }else{
//             messageErreur()
//         }

// })

texte.style.display = 'none';

const messageErreur = function () {

    texte.style.display = 'block'
    texte.style.fontFamily = '"Kanit", serif'
    texte.style.margin = '0'
    texte.style.color = 'rgb(236, 87, 87)'
    mdp.style.border = 'solid 2px rgb(240, 14, 14)'
    mdp.style.boxShadow = ' 0px 0px 2px rgb(199, 84, 84)'
}

/*REGEX MAIL*/
email.addEventListener('keyup', () => {

    if (regexMail.test(email.value)) {
        email.style.border = 'solid 1px rgb(31, 219, 72)'
        email.style.boxShadow = ' 0px 0px 2px rgb(100, 206, 0.12)'
        email.style.background = 'white'

    } else {

        email.style.border = 'solid 2px rgb(240, 14, 14)'
        email.style.boxShadow = ' 0px 0px 2px rgb(199, 84, 84)'
    }
})