(function(){
    'use strict';
    document.addEventListener('DOMContentLoaded', function(){
        document.getElementById('resultado').innerText = moment('2021-04-07 14:17:05').fromNow();
        let horas = document.getElementsByClassName('time');
        Array.from(horas).forEach(function(item){
            item.innerText = moment(item.innerText).fromNow();
        });
    });
})();