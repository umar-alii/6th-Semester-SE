document.addEventListener("DOMContentLoaded", function () {
    const inputBox = document.getElementById("inputBox");
    const buttons = document.querySelector(".calculator");

    let expression = "";

    buttons.addEventListener("click", function (event) {
        const clickedButton = event.target.innerText;

        
        if (!event.target.classList.contains("button")) return;

        if (clickedButton === "=") {
            try {
                expression = eval(expression).toString(); 
            } catch (error) {
                expression = "Error"; 
            }
        } 
        else if (clickedButton === "AC") {
            expression = ""; 
        } 
        else if (clickedButton === "DEL") {
            expression = expression.slice(0, -1); 
        } 
        else {
            
            if (clickedButton === "." && expression.match(/[\d]*\.[\d]*$/)) return;
            
            expression += clickedButton;
        }

        inputBox.value = expression;
    });
});
