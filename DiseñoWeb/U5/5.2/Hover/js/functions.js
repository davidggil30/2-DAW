$(document).ready(function(){
  // Agrega el evento hover al párrafo
  $("p").hover(
    function(){
      // Función que se ejecuta cuando el mouse entra en el párrafo
      $(this).text("Entraste al párrafo");
    },
    function(){
      // Función que se ejecuta cuando el mouse sale del párrafo
      $(this).text("Saliste del párrafo");
    }
  );
});