window.addEventListener('DOMContentLoaded', function(){
    const passButton = document.querySelectorAll('.form-pass-button');
    passButton.forEach(function (btn) {
       btn.addEventListener('click', function (){
          const inputAsociado = document.getElementById(btn.getAttribute('data-input'));
          inputAsociado.type = inputAsociado.type === "text" ? "password" : "text";
       });
    });
});