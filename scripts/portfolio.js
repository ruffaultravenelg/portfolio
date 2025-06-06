const tabs = document.querySelectorAll('.tab-btn');
const img = document.getElementById('content_image');
const pdf = document.getElementById('content_pdf');
const IMG_FODLER = "ressources/portfolio/"


tabs.forEach(tab => {

    tab.addEventListener('click', () => {
        removeActiveClass();
        tab.classList.add('active');
        const imgPath = tab.getAttribute('img');

        if (imgPath === "pdf"){
            pdf.hidden = false;
            img.hidden = true;
        } else {
            pdf.hidden = true;
            img.hidden = false;
            img.src = IMG_FODLER + imgPath;
        }

    });

});

function removeActiveClass() {
    tabs.forEach(tab => {
        tab.classList.remove('active');
    });
}