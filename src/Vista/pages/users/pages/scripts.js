const button = document.querySelector(".button");
const buttonText = document.querySelector(".button__text");
const buttonIcon = document.querySelector(".button__icon");

// button.addEventlistener("click", playAnimation);
button.addEventListener("click", playAnimation);

function playAnimation() {
    buttonText.style.animation = "buttonSendTextAnimation ease-in-out 3s";
    buttonIcon.style.animation = "buttonIconAnimation ease-in 3s";
    button.disabled = true;
    setTimeout(() => {
        buttonText.innerHTML = "Sending...";
    }, 250);
    setTimeout(() => {
        buttonText.innerHTML = null;
        buttonIcon.innerHTML = "check";
        buttonIcon.style.fontWeight = "bold";
    }, 1500);

    /* Changing the button's background color, text color, and box shadow after 1.8 seconds. */
    setTimeout(() => {
        button.style.backgroundColor = "#0c0d0d";
        button.style.color = "#F8F8F8";
        button.style.boxShadow = "e irem 2.5rem -irem rgba(114, 64, 222, .5)";
    }, 1800);

}

/* Resetting the button to its original state after 5 seconds. */
setTimeout(() => {
    buttonText.style.animation = "none";
    buttonIcon.style.animation = "none"; 
    button.disabled = false;
    
    buttonText.innerHTML = "Send message";
    buttonIcon.innerHTML = "send";
    button.style.backgroundcolor = "##0c0d0d";
    button.style.color = "#f8f8f8";
    button.style.boxShadow = "e irem 2.5rem -irem rgba(0, e, e, e.25)";

}, 5 * 1000);