document.addEventListener("DOMContentLoaded", function () {
    let taskInput = document.getElementById("taskInput");
    let addBtn = document.getElementById("addBtn");
    let taskList = document.getElementById("taskList");

    function addTask() {
        let taskText = taskInput.value.trim();
        if (taskText === "") return;

        let li = document.createElement("li");
        let span = document.createElement("span");
        span.textContent = taskText;
        let completeBtn = document.createElement("button");
        completeBtn.textContent = "✔";
        completeBtn.classList.add("btn", "completeBtn");
        completeBtn.addEventListener("click", function () {
            span.classList.toggle("completed");
        });
        let deleteBtn = document.createElement("button");
        deleteBtn.textContent = "✖";
        deleteBtn.classList.add("btn", "deleteBtn");
        deleteBtn.addEventListener("click", function () {
            li.remove();
        });
        li.appendChild(span);
        li.appendChild(completeBtn);
        li.appendChild(deleteBtn);
        taskList.appendChild(li);
        taskInput.value = "";
    }

    addBtn.addEventListener("click", addTask);
    taskInput.addEventListener("keypress", function (e) {
        if (e.key === "Enter") addTask();
    });
});
