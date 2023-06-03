var execinput = document.getElementById("execinput");



execinput.addEventListener("input", () => {

    if (execinput.value.toLocaleLowerCase() === "exec") {
        let command = document.getElementById("userinput").value
        exec(command);

    } else if (execinput.value.toLocaleLowerCase() === "stash") {
        stash();
        /**/
    }
});
function exec(command) {
    //alert(command);

}
function stash() {
    document.getElementById("historytable").innerHTML = document.getElementById("historytable").innerHTML +
        '<tr width="100%"> <th style="float:left;">' +
        document.getElementById("userinput").value.toLocaleLowerCase() +
        '</th> <th style="float:right; ">' +
        'Stash <button onclick="exec();">Exec</button>' +
        '</th></tr>';
}
