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
      dynamicBullets: true
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