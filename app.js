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


//Funcion Carrousel

const seccionContainers = [...document.querySelectorAll('.seccion-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

seccionContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
} )


// Funcion Estrellas

const stars = document.querySelectorAll(".stars i");

stars.forEach((star, index1) => {
  star.addEventListener("mouseover", () => {
    stars.forEach((star, index2) => {
      if (index2 <= index1) {
        star.classList.add("hovered");
      } else {
        star.classList.remove("hovered");
      }
    });
  });

  star.addEventListener("click", () => {
    stars.forEach((star, index2) => {
      if (index2 <= index1) {
        star.classList.add("active");
      } else {
        star.classList.remove("active");
      }
    });
  });
});

// Restablecer estilos cuando el cursor sale del contenedor de estrellas
document.querySelector(".stars").addEventListener("mouseleave", () => {
  stars.forEach((star) => {
    star.classList.remove("hovered");
  });
});
