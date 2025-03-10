const password = document.getElementById("password");
const texte = document.querySelector(".cadre-login__soustitre__message");

const regexpassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
password.addEventListener("keyup", () => {
    if (regexpassword.test(password.value)) {
        password.style.border = "solid 1px rgb(31, 219, 72)";
        password.style.boxShadow = " 0px 0px 2px rgb(100, 206, 0.12)";
    } else {
        messageErreur();
    }
});

texte.style.display = "none";

const messageErreur = function () {
    texte.style.display = "block";
    texte.style.fontFamily = '"Kanit", serif';
    texte.style.margin = "0";
    texte.style.color = "rgb(236, 87, 87)";
    password.style.border = "solid 2px rgb(240, 14, 14)";
    password.style.boxShadow = " 0px 0px 2px rgb(199, 84, 84)";
};
