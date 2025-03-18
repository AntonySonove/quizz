const prenom = document.getElementById('prenom')
const nom = document.getElementById('name')
const email = document.getElementById('mail')
const mdp = document.getElementById('password')
const mdpnewPass = document.getElementById('newPass')
const mdpComfirmNewPassNewPass = document.getElementById('confirmNewPass')
const btnConfirminfo = document.getElementById('btn-confirm-info')
const MessageMdp = document.getElementById('messageMdp')


MessageMdp.style.display='none'

const regexNom = /^(?=.{2,})[a-zà-ÿ]*(?:[ '\-][a-zà-ÿ]*)*$/;
const regexMail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
const regexMDP = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;


/*REGEX NAME*/
nom.addEventListener('keyup', ()=>{ 
    
    if (regexNom.test(nom.value)){
        nom.style.border = 'solid 1px rgb(31, 219, 72)'
        nom.style.boxShadow=' 0px 0px 2px rgb(100, 206, 0.12)'
        nom.style.background='white'
     
    } else {

        nom.style.border= 'solid 2px rgb(240, 14, 14)'
        nom.style.boxShadow=' 0px 0px 2px rgb(199, 84, 84)' 
    }
})

/*REGEX PRENOM*/
prenom.addEventListener('keyup', ()=>{ 
    
    if (regexNom.test(prenom.value)){
        prenom.style.border = 'solid 1px rgb(31, 219, 72)'
        prenom.style.boxShadow=' 0px 0px 2px rgb(100, 206, 0.12)'
        prenom.style.background='white'
     
    } else {

        prenom.style.border= 'solid 2px rgb(240, 14, 14)'
        prenom.style.boxShadow=' 0px 0px 2px rgb(199, 84, 84)' 
    }
})


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

    if(regexMDP.test(mdp.value) && regexMDP.test(mdpComfirmNewPass.value)){
        
    
        if(mdpnewPass.value===mdpComfirmNewPass.value){
            
            mdpnewPass.style.border = 'solid 1px rgb(31, 219, 72)'
            mdpnewPass.style.boxShadow=' 0px 0px 2px rgb(100, 206, 0.12)'

            mdpComfirmNewPass.style.border = 'solid 1px rgb(31, 219, 72)'
            mdpComfirmNewPass.style.boxShadow=' 0px 0px 2px rgb(100, 206, 0.12)'

            MessageMdp.style.display='none'

            console.log('mdp:',mdpnewPass.value)

            console.log('mdpComf:',mdpComfirmNewPass.value)
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
    mdpnewPass.style.border= 'solid 2px rgb(240, 14, 14)'
    mdpnewPass.style.boxShadow=' 0px 0px 2px rgb(199, 84, 84)' 
    mdpComfirmNewPass.style.border= 'solid 2px rgb(240, 14, 14)'
    mdpComfirmNewPass.style.boxShadow=' 0px 0px 2px rgb(199, 84, 84)' 
}

