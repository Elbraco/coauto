// instanciation de shop basket
let basket = new ShopBasket();
    //si on est bien dans la page shop ou cart
    if(window.location.href.indexOf('/shopping/shop') != -1 || window.location.href.indexOf('/shopping/cart') !== -1) {
        console.log('je suis dans shop ou cart');
        
        //affichage  panier
        basket.displayShoppingBasket()

        // au click de 'ajouter au panier'
        $('.addToCart').on('click', function(e) {
            e.preventDefault();
            // récupération données
            // données id
            let venteId = $(this).data('id');
            
            // données name
            let name = $(this).data('name');

            // données quanitity
            let quantity = $('#vente-' + venteId).val() +1;

            // données price
            let price = $(this).data('price');
            
            // données picture
            let picture = $(this).data('picture');
            
            //ajout au panier du produit
            basket.addToCart(venteId, name, quantity, price, picture);
           
            
        }) 

        // boutton supprimer
        $(document).on("click", ".trash-beer", function(e) {
            // empeche l'évenement
            e.preventDefault();

            // Données de l'id à supprimer
            let id = $(this).data('id');

            // retire id  supprimé
            basket.removeToBasket(id);

            // actualise le panier
            basket.displayShoppingBasket();
        })
           
    }
    // click sur validate
    $(document).on("click", "#validate", function() {

        let URLROOT = 'https://braco.sites.3wa.io/test/coauto';

        // notre panier
      let items = localStorage.getItem('basketShopping');
      
      let shopping;
        $.ajax({
            // fichier exécuté
            url: URLROOT + '/shopping/ajaxaddcart',

            // type POST
            method: 'post',

            // données reçu
            data : {shopping : items},
        })
        // redirection
        location.assign(URLROOT +'/shopping/validation');
        
        // supprime les articles apres l'envoie
      basket.clearBasket();
        
      })
           
    
