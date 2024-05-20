const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text"),
      logoImg = document.getElementById("logo-img");

      toggle.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
      });

      modeSwitch.addEventListener("click", ()=>{
        body.classList.toggle("dark");

        if (logoImg.src.includes("aereopuerto1.png")) {
            logoImg.src = "../imagenes/aereopuerto.png";
        } else {
            logoImg.src = "../imagenes/aereopuerto1.png";
        }

        if (body.classList.contains("dark")) {
            modeText.innerHTML = "Modo Claro";
        } else {
            modeText.innerHTML = "Modo Oscuro";
        }

      });
