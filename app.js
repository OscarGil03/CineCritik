function validar() {
    let usuario = document.getElementById("usuario").value;
    let pass = document.getElementById("pass").value;

    if(usuario == "Admin" && pass == "Pass1234"){
        window.location.assign("main.html");
    }else{
        alert('Usuario o Contraseña incorrecto');
        return;
    }
}

