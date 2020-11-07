// event DOM au chargement de la page
window.addEventListener('DOMContentLoaded', () => {

  // affiche popup dans 3 seconds
  setTimeout(function(){

    // La Popup
    let popup = document.getElementById('myPopup')


  let onceMessage = sessionStorage.getItem('message');
  
  // affiche une seul fois la popup dans la session en cours
  if(onceMessage != 'onetime') {
    sessionStorage.setItem('message', 'onetime');
    popup.style.display = "block";
  }

  // Fermeture de la popup
  let span = document.querySelector('.close');
  span.addEventListener('click', () => {
  popup.style.display = "none";

})
// Fermeture de la popup lorsque l'on clique en dehors 
window.addEventListener('click', () => {
  if (event.target == popup) {
    popup.style.display = "none";
  }
})
// affiche la popup dans 3 secondes
  }, 3000)



 })
  