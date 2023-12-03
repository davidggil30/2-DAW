$(document).ready(function(){
  $("h2").mouseover(function(){
    $("h2").css("color", "red");
  });
  $("h2").mouseout(function(){
    $("h2").css("color", "black");
  });
});