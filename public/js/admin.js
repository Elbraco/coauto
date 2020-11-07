//ADMIN - Clique sur supprimer
function onClickDelete() {
  let removes = document.querySelectorAll('.fa-remove');

  // Récupérations des boutons supprimés
  for (let i = 0; i < removes.length; i++) {
    removes[i].addEventListener('click', function (e) {
      let deleteUser = window.confirm('Voulez-vous supprimer ce champ ?')

      if (!deleteUser) {
        // return true;
        e.preventDefault();
      }
    })
  }
}

function displayItemSave(name, numberItems) {
  let itemNumber = document.querySelectorAll(name);
  let nbitem = document.querySelector(numberItems);

  let numberUsers = itemNumber.length
  nbitem.textContent = numberUsers;
}

//ADMIN - Affiche le nombre d'user
displayItemSave('#email', '#numberuser')

//ADMIN - Affiche le nombre d'article
displayItemSave('.name', '#numberarticle')

//ADMIN - Affiche le nombre d'article
displayItemSave('#sujet', '#numbercontact')

// clique supprimer
onClickDelete();