const email = document.getElementById('mail')
const mdp = document.getElementById('password')
const mdpComfirm = document.getElementById('confirmpass')
const btnConfirminfo = document.querySelector('.cadre-login__soustitre__submit__texte')
const MessageMdp = document.getElementById('messageMdp')



MessageMdp.style.display='none'


const regexMail = /^[a-z0-9.-]+@[a-z0-9.-]+.[a-z]{2,6}$/;
const regexMDP = /^(?=.?[A-Z])(?=.?[a-z])(?=.?[0-9])(?=.?[#?!@$%^&-]).{8,}$/;

/*REGEX MAIL*/
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

/* REGEX MDP*/

btnConfirminfo.addEventListener('click',function(e){
    e.preventDefault()

    console.log('ici 1')
    if(regexMDP.test(mdp.value) && regexMDP.test(mdpComfirm.value)){
        console.log('ok1')

        if(mdp.value===mdpComfirm.value){
            console.log('ok2')

            mdp.style.border = 'solid 1px rgb(31, 219, 72)'
            mdp.style.boxShadow=' 0px 0px 2px rgb(100, 206, 0.12)'


            mdpComfirm.style.border = 'solid 1px rgb(31, 219, 72)'
            mdpComfirm.style.boxShadow=' 0px 0px 2px rgb(100, 206, 0.12)'

            MessageMdp.style.display='none'

            console.log('mdp:',mdp.value)

            console.log('mdpComf:',mdpComfirm.value)

        }else{
            messageErreur()

        }

    }else{

        messageErreur()
    }

})

const messageErreur=function(){

    MessageMdp.style.display='block'
    MessageMdp.style.fontFamily='"Kanit", serif'
    MessageMdp.style.margin='0'
    MessageMdp.style.color='rgb(236, 87, 87)'
    MessageMdp.style.transform='translateY(-14px)'
    mdp.style.border= 'solid 2px rgba(220, 135, 135, 0.91)'
    mdp.style.boxShadow=' 0px 0px 2px rgb(199, 84, 84)' 
 
    mdpComfirm.style.border= 'solid 2px rgba(220, 135, 135, 0.91)'
    mdpComfirm.style.boxShadow=' 0px 0px 2px rgb(240, 14, 14)' 
}