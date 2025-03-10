const email = document.getElementById("mail");
const password = document.getElementById("password");
const passwordComfirm = document.getElementById("confirmpass");
const btnConfirminfo = document.querySelector(".cadre-login__soustitre__submit__texte");
const Messagepassword = document.getElementById("messagepassword");

Messagepassword.style.display = "none";

const regexMail = /^[a-z0-9.-]+@[a-z0-9.-]+.[a-z]{2,6}$/;
const regexpassword = /^(?=.?[A-Z])(?=.?[a-z])(?=.?[0-9])(?=.?[#?!@$%^&-]).{8,}$/;

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

    console.log("ici 1");
    if (regexpassword.test(password.value) && regexpassword.test(passwordComfirm.value)) {
        console.log("ok1");

        if (password.value === passwordComfirm.value) {
            console.log("ok2");

            password.style.border = "solid 1px rgb(31, 219, 72)";
            password.style.boxShadow = " 0px 0px 2px rgb(100, 206, 0.12)";

            passwordComfirm.style.border = "solid 1px rgb(31, 219, 72)";
            passwordComfirm.style.boxShadow = " 0px 0px 2px rgb(100, 206, 0.12)";

            Messagepassword.style.display = "none";

            console.log("password:", password.value);

            console.log("passwordComf:", passwordComfirm.value);
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
    Messagepassword.style.transform = "translateY(-14px)";
    password.style.border = "solid 2px rgba(220, 135, 135, 0.91)";
    password.style.boxShadow = " 0px 0px 2px rgb(199, 84, 84)";

    passwordComfirm.style.border = "solid 2px rgba(220, 135, 135, 0.91)";
    passwordComfirm.style.boxShadow = " 0px 0px 2px rgb(240, 14, 14)";
};
