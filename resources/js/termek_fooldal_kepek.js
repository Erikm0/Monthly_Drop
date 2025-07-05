function showImage(element) {
    var termek_kepek_felso_sor = document.querySelectorAll('.fooldal_termek_kep');
    termek_kepek_felso_sor.forEach(function (kep) {
        if(kep.id !== "fokep"){
            kep.id = 'lathatatlan';
        }
    });

    var correspondingImage = document.querySelector('.fooldal_termek_kep[data-testid="' + element.getAttribute('data-testid') + '"]');
    if(correspondingImage.id !== "fokep"){
        correspondingImage.id = 'lathato';
    }
}

var termek_kepek_also_sor = document.querySelectorAll('.termek_kep_opciok');
termek_kepek_also_sor.forEach(function (kep) {
    kep.addEventListener('mouseover', function (event) {
        showImage(event.target);
    });
});
document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.querySelectorAll('.meretek_gomb');
    buttons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            selectSize(event.target);
        });
    });
});

function selectSize(button) {
    var parentDiv = button.closest('.termekek');
    var buttons = document.getElementsByClassName("meretek_gomb");
    var submits = document.getElementsByClassName("vasarlas_gomb")

    for (var i = 0; i < buttons.length; i++) {
        buttons[i].style.backgroundColor = '';
        buttons[i].style.borderRadius = '';
    }
    for (var j = 0; j < submits.length; j++) {
        submits[j].disabled = true;
    }

    button.style.backgroundColor = 'rgba(128, 128, 128, 0.5)';
    button.style.borderRadius = '25px';

    var hiddenInputs = document.querySelectorAll('.meret');
    hiddenInputs.forEach(function(hiddenInput) {
        hiddenInput.value = "";
    });

    var hiddenInput = parentDiv.querySelector('.meret');
    hiddenInput.value = button.getAttribute("data-meret");

    var submit = parentDiv.querySelector('.vasarlas_gomb');
    submit.disabled = false;

}

