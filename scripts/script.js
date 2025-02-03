// Load competences
async function loadCompetences(){

    // Get data
    const competences = jsyaml.load(await (await fetch('./ressources/competences.yaml')).text());

    // Get target
    const competences_list = document.getElementById('competences_list');

    // Load data
    competences.forEach(categorie => {
        
        // Create div
        const competence_categorie = document.createElement('div');
        competence_categorie.className = 'competence-categorie';
        competences_list.appendChild(competence_categorie);

        // Create competence title
        const competence_categorie_title = document.createElement('p');
        competence_categorie_title.className = 'competence-categorie-title';
        competence_categorie_title.textContent = categorie.name;
        competence_categorie.appendChild(competence_categorie_title);

        // Create list container
        const competence_categorie_list = document.createElement('div');
        competence_categorie_list.className = 'competence-categorie-list';
        competence_categorie.appendChild(competence_categorie_list);

        // Create each categorie
        categorie.competences.forEach(competence => {
            
            // Create div
            const div = document.createElement('div');
            div.className = 'competence-categorie-list-item';
            competence_categorie_list.appendChild(div);

            // Create icon
            let splited = competence.icon.split(' ');
            let type, name;
            if (splited.length === 2){
                type = splited[0];
                name = splited[1];
            } else { 
                type = 'brands';
                name = splited[0];
            }
            
            const icon = document.createElement('i');
            icon.className = `fa-${type} fa-${name}`;
            div.appendChild(icon);

            // Create name
            const competence_name = document.createElement('p');
            competence_name.textContent = competence.name;
            div.appendChild(competence_name);

            // Subtitle
            const competence_subtitle = document.createElement('p');
            competence_subtitle.textContent = competence.subtitle;
            div.appendChild(competence_subtitle);

        });


    });

}
loadCompetences();

// Load realisation
async function loadRealisations(){

    // Folder
    const folder = "./ressources/realisations/";

    // Get data
    const realisations = jsyaml.load(await (await fetch('./ressources/realisations.yaml')).text());

    // Get target
    const realisations_list = document.getElementById('realisations_list');

    // Load data
    realisations.forEach(categorie => {
        
        // Create list item
        const listItem = document.createElement('li');
        listItem.className = 'card-item swiper-slide';
        realisations_list.appendChild(listItem);

        // Create link
        const link = document.createElement('a');
        link.href = categorie.link;
        link.target = '_blank';
        link.rel = 'noopener noreferrer';
        link.className = 'card-link';
        listItem.appendChild(link);

        // Create image
        const image = document.createElement('img');
        image.src = folder + categorie.icon;
        image.alt = `Logo de ${categorie.name}`;
        image.className = 'card-image';
        link.appendChild(image);

        // Create badges container
        const badges = document.createElement('div');
        badges.className = 'badges';
        link.appendChild(badges);

        // Create badges
        categorie.tags.forEach(badge => {
            const badgeElement = document.createElement('p');
            badgeElement.className = 'badge';
            badgeElement.textContent = badge;
            badges.appendChild(badgeElement);
        });

        // Create title
        const title = document.createElement('h2');
        title.className = 'card-title';
        title.textContent = categorie.name;
        link.appendChild(title);

        // Create description
        const description = document.createElement('p');
        description.className = 'card-description';
        description.textContent = categorie.description;
        link.appendChild(description);

        // Create button
        const button = document.createElement('button');
        button.className = 'card-button';
        const buttonImage = document.createElement('img');
        buttonImage.src = 'ressources/forward_icon.svg';
        buttonImage.alt = 'Watch more';
        button.appendChild(buttonImage);
        link.appendChild(button);

    });

}
loadRealisations();

// Move to mouse
const heroLeft = document.querySelector('.hero-left');
const heroRight = document.querySelector('.hero-right');
document.addEventListener('mousemove', (e) => {
    const mouseX = e.clientX / window.innerWidth;
    const mouseY = e.clientY / window.innerHeight;

    const FORCE = 10;

    heroLeft.style.transform = `translate(-${mouseX * FORCE}px, ${mouseY * FORCE}px)`;
    heroRight.style.transform = `translate(${mouseX * FORCE}px, -${mouseY * FORCE}px)`;
});


new Swiper('.card-wrapper', {
    // Optional parameters
    loop: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets: true,
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    breakpoints: {
        0:{
            slidesPerView: 1
        },
        700:{
            slidesPerView: 2
        },
        1150:{
            slidesPerView: 3
        }
    }
  
  });