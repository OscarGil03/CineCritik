// Funcion para validar el login
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


//Funcion NavTab Main Page
function NavTabResp() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }