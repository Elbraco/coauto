### Projet Garage Co'Auto 
### http://localhost:8888/coauto/
### http://braco.sites.3wa.io/test/coauto/

Site e-commerce 
- HTML
- CSS
- Javascript
- PHP
- MySQL
- PDO
- jQuery
- Ajax
- Local Storage
- Responsive (Desktop - Tablette - Smartphone)


- inc  
Header : LOGO
           Lien - Google Fonts, Fontawesome, CSS 
           Script -  JQUERY, Javascript 
           Navigation -  Home - Boutique - Services - Contact
           Navigation -  Connexion - Mon profil - Déconnexion.
           Message covid à l'arrivé de la page (Session Storage)    
 
- Footer : LOGO
           Infos de l'entrepise. 
           Réseaux Sociaux.
-----

- Pages 
Index (Home) : Présentation de l'entreprise + photo
               Slider des derniers Articles enregistés (CSS).

Services : Présentation liste des services/prestations de l'entreprise dossier(prestation) (AJAX).
           Informations 'Question Fréquentes' (JAVASCRIPT) 


Contact : Infos sur l'entreprise. 
         Formulaire 'Nous Contacter'. (PHP)
         Iframe - Map google
-----
- Shopping 

Shop : Listes de tous les produits avec description + 'ajouter au panier' au
       survol.
       Article enregistré au clique enregistré (Local Storage).
       Icone du panier en position absolute : affiche le nombre d'articles
       Au clique, affiche le récapitulatif de la commande (cart.phtml).
       Gestion du Panier (JAVASCRIPT, JQUERY).

Cart : Récapitulatif de la commande en forme de tableau avec description et prix de la commande.
        Bouton pour supprimer l'article.
        Bouton Payer - Commande Envoyé et enregistré dans la base de données (AJAX, PHP). 
        Redirection à la page d'accueil avec message.
        Gestion du Panier (JAVASCRIPT, JQUERY).
-----
-Users 

login : Espace de connexion (USER)
        Formulaire avec message d'erreur (PHP)
        clique 'Se connecter' redirection page d'accueil avec message.

Register : Espace d'enregistrement
           Formulaire avec message d'erreur (PHP)
           clique 's'enregister' redirection page d'accueil avec message.

Profil : Espace personnel du profil connecté.
        Modifier/ Supprimer profil.
         affiche données du profil et historique de commande (PHP).

EditProfil : Espace personnel du profil connecté.
             Formulaire de modification du profil (PHP)

DeleteProfil : Suppression du profil connecté. (PHP)
-----
-Admin

Administration : Espace PRIVÉ (ADMIN) (PHP)
                 Affichage de tous les articles, utilisateurs, message contact,
                 dernieres commande. (PHP)
                 Modification/ Suppresion des articles, utilisateurs, messages. (PHP)
                 Ajouter article/ utilisateurs (PHP) 
                 Dernières commandes - affiche les commandes avec informations de la commande.
