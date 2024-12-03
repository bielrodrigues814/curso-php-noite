function validarFormulario() {
    let nome = document.forms[0]["nome"].value;
    let email = document.forms[0]["email"].value;
    if (nome === "" || email === "") {
        alert("Nome e email são obrigatórios.");
        return false;
    }
    return true;
}
