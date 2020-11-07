class ShopBasket {

	constructor() {
		//articles sélectionnés
		this.items = this.loadBasket();
		// console.log('thisitems',this.items);

		//affichage du panier
		this.displayItemsBasket();
	}

	// Ajout Panier
	addToCart(venteId, name, quantity, price, picture) {

		venteId = parseInt(venteId);
		quantity = parseInt(quantity);
		//création d'item
		let item = {
			venteId: venteId,
			name: name,
			quantity: quantity,
			price: price,
			picture: picture
		}

		for (let index = 0; index < this.items.length; index++) {
			//si l'id du produit correspond  id du produit
			if (this.items[index].venteId == venteId) {
				//on ajoute le nb de produit
				this.items[index].quantity += quantity

				// sauvegarde du panier
				this.saveShoppingBasket();

				return true;
			}
		}
		//ajout article
		this.items.push(item);

		//sauvegarde du panier
		this.saveShoppingBasket();
	}

	// items vide
	clearBasket() {
		this.items = [];
		//sauvegarde du panier
		this.saveShoppingBasket();
	}

	// Affichage du nombre d'article
	displayItemsBasket() {
		// Si le nb d'article est supérieur a 0
		if (this.items.length > 0) {
			// Affichage du nb d'article
			$('.nbItemsBasket').text(this.items.length);
			
		} else {
			// sinon 0
			$('.nbItemsBasket').text('0');
		}
				
	}
	
	// chargement panier
	loadBasket() {
		//chargement de 'basketshopping' dans le local storage
		let items = loadDataFromDomStorage('basketShopping');

		//si null, Création tableau 
		if (items == null) {
			items = [];
		}
		return items;
	}

	// Enregistrement du panier
	saveShoppingBasket() {
		// localstorage
		saveDataToDomStorage('basketShopping', this.items);

		//display basket
		this.displayItemsBasket();

		//si on est bien sur la page shop ou cart
		if (window.location.href.indexOf('/shopping/shop') !== -1 || window.location.href.indexOf('/shopping/cart') !== -1) {

			//affichage de tout le panier
			this.displayShoppingBasket();
		}
	}

	// AFFICHAGE PANIER
	displayShoppingBasket() {
		let urlImg = 'https://braco.sites.3wa.io/test/coauto/public/img/shopping/';

		let totalPrice = 0;

		// si  nb article > 0
		if (this.items.length > 0) {

			$('#displayShopping table tbody').empty();

			// Récupération du nb articles
			for (let i = 0; i < this.items.length; i++) {

				let itemsQuantity = parseFloat(this.items[i].quantity);
				let itemsPrice = parseFloat(this.items[i].price);

				totalPrice += itemsQuantity * itemsPrice ;

				let tr = $('<tr>');
				// on ajoute à tr 
				tr.append('<td> <img id="small-picture" src="' + urlImg + '' + this.items[i].picture + '"></td> <td>' + this.items[i].name + '</td> <td>' + this.items[i].price.toFixed(2) + '€</td> <td>' + this.items[i].quantity + '</td> <td>' + (parseFloat(this.items[i].quantity) * parseFloat(this.items[i].price)).toFixed(2) + '€</td> <td><button class="trash-beer" data-index="' + i + '"><i class="fa fa-trash"></i></button></td>')

				// on ajoute au tableau les élements des articles
				$('#displayShopping table tbody').append(tr);

			}

			// calcul du prix TVA
			let priceTva = totalPrice * 20 / 100;

			// calcul du prix TTC
			let priceTTC = priceTva + totalPrice
			// console.log('totalp', totalPrice);
			// console.log('ttc = ',priceTTC);
			// console.log('tva',totalPrice * 20 / 100);

			//prix total dans l'élément pricetva
			$('.priceTVA').text(priceTva.toFixed(2));

			//prix total dans l'élément pricettc
			$('.priceTTC').text(priceTTC.toFixed(2));

			//prix total dans l'élément totalPrice
			$('.totalPrice').text(totalPrice.toFixed(2));

			// Si article bouton validate activé
			$("#validate").prop("disabled", false);

		} else {
		// sinon pas d'article
			$('#displayShopping').css('display', 'none');
			$('#displayShoppingEmpty').css('display', 'block');
			// $('#displayShopping table tbody').html('Votre panier ne contient aucun article');
			
			// bouton validate non utilisable
			$("#validate").prop("disabled", true);
		}
	}

	// Retirer article
	removeToBasket(id) {

		// supprime l'article en question
		this.items.splice(id, 1);

		//chargement du panier
		let basket = this.loadBasket();

		if (this.basket == null) {
			//0.00 dans la balise des prix 
			$(".totalPrice").text("0.00");
			$('.priceTVA').text("0.00");
			$('.priceTTC').text("0.00");
		}
		//Sauvegarde du panier
		this.saveShoppingBasket();
	}
	

}