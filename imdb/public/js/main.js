

//Show and hide hamburger menu items
const hamburger = document.querySelector('.hamburger');
const menu = document.querySelector('.menu-items');

hamburger.addEventListener('click', function() {
    if(menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
    } else {
        menu.classList.add('hidden');
    }
});


//Hide flash messages
setTimeout(() => {
    const flash = document.querySelector('.flash');
    flash.classList.add('hidden');
}, 3000);


//Confirm delete
const showAlertButtons = document.querySelectorAll('.alert');
const messages = document.querySelectorAll('.message');
const closeAlertButtons = document.querySelectorAll('.close');

for(let i = 0; i < showAlertButtons.length; i++) {
    showAlertButtons[i].addEventListener('click', function() {
        if(messages[i].classList.contains('hidden')) {
            messages[i].classList.remove('hidden');
        }
    });
    closeAlertButtons[i].addEventListener('click', function() {
        messages[i].classList.add('hidden');
    });
    
}
    


