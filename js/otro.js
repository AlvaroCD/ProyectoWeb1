'use strict'
alert("Hola mundo");

var nombre = prompt("Como te llamas?"), edad = prompt("Cuál es tu edad?"), empleado = true,
     salario = prompt("Cual es tu salario?");

var num1 = parseInt(prompt("Ingresa el primer numero: "));
var num2 = parseInt(prompt("Ingresa el segundo numero: "));
var result = (num1 + num2);

console.log(nombre);
console.log(typeof nombre);
console.log(edad);
console.log(typeof edad);
console.log(empleado);
console.log(typeof empleado);
console.log(salario);
console.log(typeof salario);

console.log("La suma de: " + num1 + " + " + num2 + " = " + result);