$(document).ready(function(){
    $("button").click(function(){
      // Oculta el primer elemento de la primera lista
      $("ul:first li:first").hide();

      // Oculta el primer elemento de la segunda lista
      $("ul:last li:first").hide();
    });
  });