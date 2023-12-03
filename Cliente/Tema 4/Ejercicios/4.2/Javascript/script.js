const numeros = [5, 2, 9, 1, 4, 8, 3, 6];

document.getElementById("ordenar").addEventListener("click", function () {
  numeros.sort();
  mostrarResultado(numeros);
});

document.getElementById("revertir").addEventListener("click", function () {
  numeros.reverse();
  mostrarResultado(numeros);
});

document.getElementById("eliminarPrimero").addEventListener("click", function () {
  numeros.shift();
  mostrarResultado(numeros);
});

document.getElementById("eliminarUltimo").addEventListener("click", function () {
  numeros.pop();
  mostrarResultado(numeros);
});

document.getElementById("agregarComienzo").addEventListener("click", function () {
  const valorAApilar = document.getElementById("valorAApilar").value;
  numeros.unshift(parseInt(valorAApilar, 10));
  mostrarResultado(numeros);
});

document.getElementById("agregarFinal").addEventListener("click", function () {
  const valorApilar = document.getElementById("valorAApilar").value;
  numeros.push(parseInt(valorApilar, 10));
  mostrarResultado(numeros);
});

document.getElementById("eliminarIntermedio").addEventListener("click", function () {
  const posicionEliminar = document.getElementById("posicionAEliminar").value;
  const posicion = parseInt(posicionEliminar, 10);
  if (!isNaN(posicion) && posicion >= 0 && posicion < numeros.length) {
    numeros.splice(posicion, 1);
    mostrarResultado(numeros);
  } else {
    alert("La posicion a eliminar no es valida.");
  }
});


function mostrarResultado(array) {
  alert("Resultado: " + array.join(', '));
}