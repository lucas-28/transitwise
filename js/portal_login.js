document.getElementById("submit").addEventListener("click", function (e) {
    var ID = document.getElementById("EMID");
    var PW = document.getElementById("EMPW");
    console.log(ID.value);
    if (/^\d+$/.test(ID.value) == false) {
        alert("ID must be a number");
        e.preventDefault();
    }
});