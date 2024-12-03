function hi() {
    alert("Bem-vindo ao PHP via Javascript!")
}

function pedirNome() {
    const nome = prompt("Insira seu nome: ")
    if (nome) {
        alert("Olá "+nome+"!")
    } else {
            alert("Nome Vazio!")

        }
    }