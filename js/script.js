(function () {
    document.addEventListener('DOMContentLoaded', function () {
       
        let bouton = document.querySelector('button');

       bouton.addEventListener('click', function(){

        let nav = document.querySelector('header nav'); // changement de classe la nav
        nav.classList.toggle('invisible');

        // Pas de scroll quand la nav apparaît
        let body = document.querySelector('body'); 

        if(nav.classList.contains('invisible')){
            body.classList.remove('no-scroll');
        } else {
            body.classList.add('no-scroll'); 
        }
      
    })
        
    });
})();