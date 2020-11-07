  // AJAX NOS SERVICES presta.php
  // représente les prestations
  let links = document.querySelectorAll('.prestation')

  // représente la section ou on affiche les prestations
  let display = document.getElementById('info-presta');

  // récupération de tous les links
  for (let i = 0; i < links.length; i++) {
    let link = links[i]

    link.addEventListener('click', function (e) {
      e.preventDefault()
      // instanciation XMLhttpRequest
      const xhr = new XMLHttpRequest();
      // l'état
      xhr.onreadystatechange = function () {
        // si opération terminée et si état 200
        if (xhr.readyState === 4 && xhr.status === 200) {
          // renvoie la réponse
          xhr.responseText

          // affichage de la réponse dans la section 
          display.innerHTML = xhr.responseText

          // sinon erreur
        } else if (xhr.status === 404) {
          // on renvoie null
          xhr.send(null)
          console.log("erreur");
        }

      }
      // méthode get (récupération). 
      xhr.open('get', this.getAttribute('href'), true);
      xhr.send(null);
    })
  }

  function OnclickQuestion() {
    let question = document.querySelectorAll('.question');
    let reponse = document.querySelectorAll('.reponse');

    // récupération de toutes les questions
    for (let i = 0; i < question.length; i++) {

      // au click on ouvre la réponse
      question[i].addEventListener('click', function () {
        reponse[i].classList.toggle('show');
      })
    }
  }

  // menu reponsive
  function menuResponsive() {
    let menuNav = document.querySelectorAll("nav");

    // récupération de toutes la nav
    for (let i = 0; i < menuNav.length; i++) {
      if (menuNav[i].style.display === "block") {
        menuNav[i].style.display = "none";
      } else {
        menuNav[i].style.display = "block";
        menuNav[i].classList.add('block')
      }
    }

  }
  // reprénsente icon en tablette téléphone
  let icon = document.querySelector('.icon');
  icon.addEventListener('click', menuResponsive);


  // message qui apparait et part au scroll
  window.addEventListener('scroll', () => {
    // postion au pixel du scroll vertical
    let scroll = window.pageYOffset;
    let messageScroll = 115

    // Message qui doit apparaitre
    let message = document.querySelector('.message-fermeture')
    // console.log(scroll);

    if (scroll > messageScroll) {

      message.classList.remove('effect-hidden')
      message.classList.add('effect-block')

    }
    if (scroll < messageScroll) {
      message.classList.remove('vu')
      message.classList.add('effect-hidden')
    }

  })


  OnclickQuestion();