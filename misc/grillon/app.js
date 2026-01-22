const container = document.getElementById('container');
const grillon_wrapper = document.getElementById('grillon-wrapper');
const grillon = document.getElementById('grillon');

function moveGrillon(x, y, cursorDegree, transitionDuration) {
    grillon_wrapper.style.transitionDuration = `${transitionDuration}ms`;
    grillon_wrapper.style.transform = `translate(${x}px, ${y}px)`;

    let finalRotation = 0;
    let scaleX = 1;

    if (Math.abs(cursorDegree) < 90) {
        scaleX = -1; 
        finalRotation = -cursorDegree; 
    } else {
        scaleX = 1;
        finalRotation = cursorDegree + 180;
    }

    grillon.style.setProperty('--scaleX', scaleX);
    grillon.style.setProperty('--deg', `${finalRotation}deg`);

    grillon.classList.add('moving');
    setTimeout(() => {
        grillon.classList.remove('moving');
    }, transitionDuration);
}

// Get css degree value for a object to point to (newX, newY) from (oldX, oldY)
function getCursorDegree(oldX, oldY, newX, newY) {
    const deltaX = newX - oldX;
    const deltaY = newY - oldY;
    const radians = Math.atan2(deltaY, deltaX);
    const degrees = radians * (180 / Math.PI);
    return degrees;
}

function findNewPlace() {
    const containerRect = container.getBoundingClientRect();
    const grillonRect = grillon_wrapper.getBoundingClientRect();

    const maxX = containerRect.width - grillonRect.width;
    const maxY = containerRect.height - grillonRect.height;

    const oldX = grillonRect.left - containerRect.left;
    const oldY = grillonRect.top - containerRect.top;

    let newX, newY, distance;
    
    const minDistance = 250; 
    let attempts = 0;

    do {
        newX = Math.floor(Math.random() * maxX);
        newY = Math.floor(Math.random() * maxY);
        
        const deltaX = newX - oldX;
        const deltaY = newY - oldY;
        distance = Math.sqrt(deltaX * deltaX + deltaY * deltaY);
        
        attempts++;
    } while (distance < minDistance && attempts < 100); 

    const transitionDuration = distance / 1.5;

    moveGrillon(newX, newY, getCursorDegree(oldX, oldY, newX, newY), transitionDuration);
}

grillon_wrapper.addEventListener('mouseover', findNewPlace);

// Initialize grillon position
findNewPlace();