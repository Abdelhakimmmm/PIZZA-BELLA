// ------------------------------------------nav bar-----------
const burger = document.querySelector("#burger");
const pop = document.querySelector("#pop");


window.addEventListener('scroll', () => {
  // console.log ("test");
  if (window.scrollY > 25) {
    navbar.style.height = "0";
        // popup.style.opacity = 1;

  } else {
    navbar.style.height = "150px";
  }
})

// ***************berger

let isPopUpVisible = false;

burger.addEventListener('click', () => {
  // Vérifier l'état actuel de la pop-up
  if (isPopUpVisible) {
    // Si la pop-up est visible, la masquer en définissant le transform à sa valeur initiale (par exemple translateX(-100%))
    pop.style.transform = 'translateX(100%)';
    // Mettre à jour l'état de la pop-up
    isPopUpVisible = false;
  } else {
    // Si la pop-up est cachée, l'afficher en définissant le transform à 'translateX(0)'
    pop.style.transform = 'translateX(0)';
    // Mettre à jour l'état de la pop-up
    isPopUpVisible = true;
  }
});

// RECHERCHER

const recherchertxt = document.querySelector('#Recherchert');
const wrapper = document.querySelector('.wrapper');
// const possibliities = document.querySelector('#possibliities');


// Ajouter un écouteur d'événement pour l'événement "input"
recherchertxt.addEventListener('input', searchArticle);

// Fonction de recherche
function searchArticle() {
  const searchValue  = recherchertxt.value.toLowerCase(); // Convertir en minuscules pour une correspondance insensible à la casse

  // Parcourir tous les articles
  const articles = document.getElementsByClassName('ChoixPizza');
  for (let i = 0; i < articles.length; i++) {
      const article = articles[i];
      // Récupérer le nom de l'article dans la classe 'Npizz'
      const articleName = article.getElementsByClassName('Npizz')[0].textContent.toLowerCase();

        // Vérifier si le nom de l'article correspond à la valeur de recherche
      if (articleName.includes(searchValue)) {
        article.style.display = ''; // A-fficher l'article s'il correspond à la recherche
        article.style.margin = '-10% 25%';
        wrapper.style.height = '100px';
        // possibliities.style.height = "500px";

      } else {
        article.style.display = 'none'; // Masquer l'article s'il ne correspond pas à la recherche
      }
  }
}