const play_btn = document.getElementById('play_btn');
const edit_btn = document.getElementById('edit_btn');
const writer_container = document.getElementById('writer_container');
const letter_container = document.getElementById("letter_container");
const textarea = document.getElementById("text");

const SPEED_FACTOR = 1;
const STATIC_WAIT = false;

let playing = false;

async function displayWord(container, word) {

    // Clean container
    container.innerHTML = "";

    // Define main letter (1 or 2 letter if >5 letters)
    let mainLetterIndex;
    if (word.length === 1) mainLetterIndex = 0;
    else if (word.length <= 5) mainLetterIndex = 1;
    else if (word.length <= 7) mainLetterIndex = 2;
    else mainLetterIndex = 3;

    // Generate letters
    let spans = [];
    for (let i = 0; i < word.length; i++) {
        const span = document.createElement("span");
        span.textContent = word[i];
        if (i === mainLetterIndex) span.classList.add("main");
        container.appendChild(span);
        spans.push(span);
    }

    // Get computed spans size until mainLetterIndex
    const beforeMainSpans = spans.slice(0, mainLetterIndex);
    let totalWidth = beforeMainSpans.reduce((acc, span) => acc + span.offsetWidth, 0);
    console.log(totalWidth);
    container.style.transform = `translateX(-${totalWidth}px)`;

    // Get wait time based on word length
    let waitTime;
    if (STATIC_WAIT) {
        waitTime = 200 * SPEED_FACTOR;
    } else {
        if (word.length <= 4) waitTime = 200 * SPEED_FACTOR;
        else if (word.length <= 6) waitTime = 300 * SPEED_FACTOR;
        else waitTime = 400 * SPEED_FACTOR;
    }

    // Add dealy if comma or period at the end of the word
    if (word.endsWith(",") || word.endsWith(".")) {
        waitTime += 200 * SPEED_FACTOR;
    }

    // Wait until return
    await new Promise(resolve => setTimeout(resolve, waitTime));

}

async function displayText(container, text) {

    // Split text into words (keep last punctuation with the word, ex: "monde,")
    const words = text.match(/\S+|\s+/g).filter(word => word.trim().length > 0);

    // Generate tokens
    for (const word of words) {
        if (!playing) return;
        await displayWord(container, word);
    }

}

function openEditor() {
    writer_container.classList.add("opened");

    play_btn.style.display = "flex";
    edit_btn.style.display = "none";
}

function closeEditor() {
    writer_container.classList.remove("opened");

    play_btn.style.display = "none";
    edit_btn.style.display = "flex";
}

play_btn.addEventListener("click", () => {
    closeEditor();
    playing = true;
    setTimeout(() => {
        displayText(letter_container, textarea.value);
    }, 600);
});

edit_btn.addEventListener("click", () => {
    openEditor();
    playing = false;
});

play_btn.click();