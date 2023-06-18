window.onload=obtenerEstacion;

function obtenerEstacion(){  

    let body = document.getElementById("body");
    

    var today = new Date();
      var day = today.getDate();
      var month = today.getMonth() +1;
      var hoy = (day+"/"+month);
      
      console.log(hoy);

      switch (month) {
        case 1:
        case 2:
        case 12:
          body.style.background='linear-gradient(to bottom left,blue, 50%, cyan)';
          estacion="invierno";
        break;

        case 3:
        case 4:
        case 5:
          body.style.background='linear-gradient(to bottom right,LawnGreen, 50%,green)';
          estacion="primavera";
        break;

        case 6:
        case 7:
        case 8:
          body.style.background='linear-gradient(to bottom left,gold, 60%,orange)';
          estacion="verano";
        break;

        case 9:
        case 10:
        case 11:
          body.style.background='linear-gradient(to bottom right,brown, 60%,orange)';
          estacion="otoño";
    }
  
    console.log(estacion);


}