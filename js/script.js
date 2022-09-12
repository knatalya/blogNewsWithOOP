document.getElementById("save").onclick = function(event) {
    let name = document.getElementById("name").value;
    let text = document.getElementById("new").value;
    let announcement = document.getElementById("announcement").value;
    if (text === "" || name === "" || announcement === "") {
        alert("Поля заполнены не полностью! Заполните.");
    }
    if (name.length > 50) {
        alert("Заголовок слишком длинный!");
    }
}