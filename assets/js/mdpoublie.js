const email = document.getElementById('mail')

const regexMail = /^[a-z0-9.-]+@[a-z0-9.-]+.[a-z]{2,6}$/;

email.addEventListener('keyup', ()=>{ 

    if (regexMail.test(email.value)){
        email.style.border = 'solid 1px rgb(31, 219, 72)'
        email.style.boxShadow=' 0px 0px 2px rgb(100, 206, 0.12)'
        email.style.background='white'

    } else {

        email.style.border= 'solid 2px rgb(240, 14, 14)'
        email.style.boxShadow=' 0px 0px 2px rgb(199, 84, 84)' 
    }
})