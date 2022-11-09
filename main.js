// VARIABLES//
const openButton = document.getElementById('open-btn');
const closeButton = document.querySelector('.close-btn');
const modalContainer = document.querySelector('.modal-container');

// EVENTLISTENERS//
// Open the modal using Open Button
openButton.addEventListener('click', function(){
    modalContainer.style.display = 'block';
})

// Close the modal using Close Button
closeButton.addEventListener('click', function(){
    modalContainer.style.display = 'none';
})