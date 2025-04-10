document.querySelector("form").addEventListener("submit", function (event) {
   
    const topicInput = document.querySelector("input[name='topics']").value.trim();

    if (!topicInput) {
        alert("Please enter the topics covered.");
        event.preventDefault();
        return;
    }

   
    const dropdowns = document.querySelectorAll("select");

    
    for (const dropdown of dropdowns) {
        if (!dropdown.value) {
            alert("All dropdowns must be selected.");
            event.preventDefault();
            return;
        }
    }
});
