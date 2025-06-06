const tabs = document.querySelectorAll('.tab-btn');
const contents = document.querySelectorAll('.content > *');


tabs.forEach(tab => {
    tab.addEventListener('click', () => {
       
        removeActiveClass();
        tab.classList.add('active');

        setContent(tab.getAttribute("attached"));

    });
});

function removeActiveClass() {
    tabs.forEach(tab => {
        tab.classList.remove('active');
    });
}

function setContent(key){
    for (let content of contents) {
        if (content.getAttribute("key") === key) {
            content.hidden = false;
        } else {
            content.hidden = true;
        }
    }
}