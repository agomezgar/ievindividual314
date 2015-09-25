
/*
 *    
 *      Copyright 2009 Antonio Gomez Garcia <agomeztron@yahoo.es>
 *      
 * Este programa es software libre; lo puedes redistribuir y/o modificar
 * bajo los terminos de la licencia publica GNU, publicada por la Free 
 * Software Foundation; ya sea la version 2 de la licencia, o cualquier 
 * version posterior.
 * 
 * Este programa se esta distribuyendo con la esperanza de que sea util 
 * a la comunidad, pero SIN NINGUNA GARANTIA, ¡RECLAMACIONES, AL MAESTRO 
 * ARMERO!, que decian en la mili. Si te quedas con la duda, examina los
 * terminos de la licencia GNU
 * 
 * Deberias haber recibido una copia de la Licencia Publica General GNU 
 * junto con esta aplicacion. Si no es asi, y te da pereza tirar de In-
 * ternet, escribe a: Free Software Foundation, Inc., 51 Franklin Street
 * , Fifth Floor, Boston, MA 02110-1301,USA.
 * 
 */
//validar grupo

var xhr;
function validargrupo(){
if(window.ActiveXObject){
xhr=new ActiveXObject("Microsoft.XMLHttp");
}
else if((window.XMLHttpRequest)||(typeof XMLHttpRequest)!=undefined){
xhr=new XMLHttpRequest();
}
else {
alert ("Su navegador no soporta AJAX");
return;
}
enviapeticionalumno();
}

function enviapeticionalumno(){
xhr.open("POST","grabaralumno.php",true);
xhr.onreadystatechange=procesaresultadoalumnos;
xhr.setRequestHeader ("Content-Type","application/x-www-form-urlencoded");
var datos=obtenerdatosalumno();

xhr.send(datos);
}

function obtenerdatosalumno(){
var controles=document.forms[0].elements;
var datos=new Array();
var cad="";

for (var i=0;i<controles.length;i++){
cad=encodeURIComponent(controles[i].name)+"=";
cad+=encodeURIComponent(controles[i].value);
datos.push(cad);
}
cad=datos.join("&");
return cad;
}
function procesaresultadoalumnos(){
if(xhr.readyState==4){
txt=unescape(xhr.responseText);
txt2=txt.replace(/\+/gi," ");

document.getElementById("alumno").innerHTML=txt2;
}
}

// validar alumno
var xhr2;
function validaralumno(){
if(window.ActiveXObject){
xhr2=new ActiveXObject("Microsoft.XMLHttp");
}
else if((window.XMLHttpRequest)||(typeof XMLHttpRequest)!=undefined){
xhr2=new XMLHttpRequest();
}
else {
alert ("Su navegador no soporta AJAX");
return;
}
enviapeticiondatos();
}

function enviapeticiondatos(){
xhr2.open("POST","grabarmateria.php",true);
xhr2.onreadystatechange=procesaresultadodatos;
xhr2.setRequestHeader ("Content-Type","application/x-www-form-urlencoded");
var datos2=obtenerdatos2();

xhr2.send(datos2);
}

function obtenerdatos2(){
var controles2=document.forms[0].elements;
var datos2=new Array();
var cad2="";

for (var i=0;i<controles2.length;i++){
cad2=encodeURIComponent(controles2[i].name)+"=";
cad2+=encodeURIComponent(controles2[i].value);
datos2.push(cad2);
}
cad2=datos2.join("&");

return cad2;

}
function procesaresultadodatos(){
if(xhr2.readyState==4){
txt=unescape(xhr2.responseText);
txt2=txt.replace(/\+/gi," ");

document.getElementById("materia").innerHTML=txt2;
}
}
// validar materia
var xhr3;
function validarmateria(){
if(window.ActiveXObject){
xhr3=new ActiveXObject("Microsoft.XMLHttp");
}
else if((window.XMLHttpRequest)||(typeof XMLHttpRequest)!=undefined){
xhr3=new XMLHttpRequest();
}
else {
alert ("Su navegador no soporta AJAX");
return;
}
enviapeticionmateria();
}

function enviapeticionmateria(){
xhr3.open("POST","grabarcurso.php",true);
xhr3.onreadystatechange=procesaresultadomateria;
xhr3.setRequestHeader ("Content-Type","application/x-www-form-urlencoded");
var datosmateria=obtenerdatosmateria();

xhr3.send(datosmateria);
}

function obtenerdatosmateria(){
var controles3=document.forms[0].elements;
var datosmateria=new Array();
var cad3="";

for (var i=0;i<controles3.length;i++){
cad3=encodeURIComponent(controles3[i].name)+"=";
cad3+=encodeURIComponent(controles3[i].value);
datosmateria.push(cad3);
}
cad3=datosmateria.join("&");

return cad3;

}
function procesaresultadomateria(){
if(xhr3.readyState==4){
txt=unescape(xhr3.responseText);
txt2=txt.replace(/\+/gi," ");

document.getElementById("curso").innerHTML=txt2;
}
}

// validar curso
var xhr4;
function validarcurso(){
if(window.ActiveXObject){
xhr4=new ActiveXObject("Microsoft.XMLHttp");
}
else if((window.XMLHttpRequest)||(typeof XMLHttpRequest)!=undefined){
xhr4=new XMLHttpRequest();
}
else {
alert ("Su navegador no soporta AJAX");
return;
}
enviapeticioncurso();
}

function enviapeticioncurso(){
xhr4.open("POST","presentadatos.php",true);
xhr4.onreadystatechange=procesaresultadocurso;
xhr4.setRequestHeader ("Content-Type","application/x-www-form-urlencoded");
var datoscurso=obtenerdatoscurso();

xhr4.send(datoscurso);
}

function obtenerdatoscurso(){
var controles4=document.forms[0].elements;
var datoscurso=new Array();
var cad4="";

for (var i=0;i<controles4.length;i++){
cad4=encodeURIComponent(controles4[i].name)+"=";
cad4+=encodeURIComponent(controles4[i].value);
datoscurso.push(cad4);
}
cad4=datoscurso.join("&");

return cad4;

}
function procesaresultadocurso(){
if(xhr4.readyState==4){
txt=unescape(xhr4.responseText);
txt2=txt.replace(/\+/gi," ");

document.getElementById("presentadatos").innerHTML=txt2;
}
}

// validar informe
var xhr5;
function validarinforme(){
if(window.ActiveXObject){
xhr5=new ActiveXObject("Microsoft.XMLHttp");
}
else if((window.XMLHttpRequest)||(typeof XMLHttpRequest)!=undefined){
xhr5=new XMLHttpRequest();
}
else {
alert ("Su navegador no soporta AJAX");
return;
}
enviapeticioninforme();
}



function enviapeticioninforme(){
xhr5.open("POST",destino,true);
xhr5.onreadystatechange=procesaresultadocurso;
xhr5.setRequestHeader ("Content-Type","application/x-www-form-urlencoded");
var datosinforme=obtenerdatosinforme();
alert(destino);
xhr5.send(datosinforme);
}

function obtenerdatosinforme(){
var controles5=document.form1.elements;
var datosinforme=new Array();
var cad5="";

for (var i=0;i<controles5.length;i++){
cad5=encodeURIComponent(controles5[i].name)+"=";
cad5+=encodeURIComponent(controles5[i].value);
datosinforme.push(cad5);
}
cad5=datosinforme.join("&");

return cad5;

}
function procesaresultadoinforme(){
if(xhr5.readyState==4){
txt=unescape(xhr5.responseText);
txt2=txt.replace(/\+/gi," ");

document.getElementById("grabado").innerHTML=txt2;
}
}
