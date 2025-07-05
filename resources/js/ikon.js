function ikon(){
    let lathatatlan = document.getElementById("login")
    let reg_2 = document.getElementById("login_lathato")
    if(lathatatlan){
        lathatatlan.id = "login_lathato"
    }
    else if(reg_2){
        reg_2.id = "login"
    }
}

let btnIkon = document.querySelector('#ikon, #navbarDropdown');

btnIkon.addEventListener('click', function (event) {
    ikon();
});
