const prenom = document.getElementById("prenom");
const nom = document.getElementById("name");
const email = document.getElementById("mail");
const password = document.getElementById("password");
const passwordnewPass = document.getElementById("newPass");
const passwordComfirmNewPassNewPass = document.getElementById("confirmNewPass");
const btnConfirminfo = document.getElementById("btn-confirm-info");
const Messagepassword = document.getElementById("messagepassword");

Messagepassword.style.display = "none";

const regexNom = /^(?=.{2,})[a-zà-ÿ]*(?:[ '\-][a-zà-ÿ]*)*$/;
const regexMail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
const regexpassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;

/*REGEX NAME*/
nom.addEventListener("keyup", () => {
    if (regexNom.test(nom.value)) {
        nom.style.border = "solid 1px rgb(31, 219, 72)";
        nom.style.boxShadow = " 0px 0px 2px rgb(100, 206, 0.12)";
        nom.style.background = "white";
    } else {
        nom.style.border = "solid 2px rgb(240, 14, 14)";
        nom.style.boxShadow = " 0px 0px 2px rgb(199, 84, 84)";
    }
});

/*REGEX PRENOM*/
prenom.addEventListener("keyup", () => {
    if (regexNom.test(prenom.value)) {
        prenom.style.border = "solid 1px rgb(31, 219, 72)";
        prenom.style.boxShadow = " 0px 0px 2px rgb(100, 206, 0.12)";
        prenom.style.background = "white";
    } else {
        prenom.style.border = "solid 2px rgb(240, 14, 14)";
        prenom.style.boxShadow = " 0px 0px 2px rgb(199, 84, 84)";
    }
});

/*REGEX MAIL*/
email.addEventListener("keyup", () => {
    if (regexMail.test(email.value)) {
        email.style.border = "solid 1px rgb(31, 219, 72)";
        email.style.boxShadow = " 0px 0px 2px rgb(100, 206, 0.12)";
        email.style.background = "white";
    } else {
        email.style.border = "solid 2px rgb(240, 14, 14)";
        email.style.boxShadow = " 0px 0px 2px rgb(199, 84, 84)";
    }
});

/* REGEX password*/

btnConfirminfo.addEventListener("click", function (e) {
    e.preventDefault();

    if (regexpassword.test(password.value) && regexpassword.test(passwordComfirmNewPass.value)) {
        if (passwordnewPass.value === passwordComfirmNewPass.value) {
            passwordnewPass.style.border = "solid 1px rgb(31, 219, 72)";
            passwordnewPass.style.boxShadow = " 0px 0px 2px rgb(100, 206, 0.12)";

            passwordComfirmNewPass.style.border = "solid 1px rgb(31, 219, 72)";
            passwordComfirmNewPass.style.boxShadow = " 0px 0px 2px rgb(100, 206, 0.12)";

            Messagepassword.style.display = "none";

            console.log("password:", passwordnewPass.value);

            console.log("passwordComf:", passwordComfirmNewPass.value);
        } else {
            messageErreur();
        }
    } else {
        messageErreur();
    }
});

const messageErreur = function () {
    Messagepassword.style.display = "block";
    Messagepassword.style.fontFamily = '"Kanit", serif';
    Messagepassword.style.margin = "0";
    Messagepassword.style.color = "rgb(236, 87, 87)";
    passwordnewPass.style.border = "solid 2px rgb(240, 14, 14)";
    passwordnewPass.style.boxShadow = " 0px 0px 2px rgb(199, 84, 84)";
    passwordComfirmNewPass.style.border = "solid 2px rgb(240, 14, 14)";
    passwordComfirmNewPass.style.boxShadow = " 0px 0px 2px rgb(199, 84, 84)";
};
