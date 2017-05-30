var splitter,cont1,cont2;
var last_x,window_width;

function init()
{
  window_width=window.innerWidth;
  splitter=document.getElementById("splitter");
  cont1=document.getElementById("section");
  cont2=document.getElementById("Fahrzeug");
  var dx=cont1.clientWidth;
  splitter.style.marginLeft=dx+"px";
  dx+=splitter.clientWidth;
  cont2.style.marginLeft=dx+"px";
  dx=window_width-dx;
  cont2.style.width=dx+"px";
  splitter.addEventListener("mousedown",spMouseDown);
}

function spMouseDown(e)
{
  splitter.removeEventListener("mousedown",spMouseDown);
  window.addEventListener("mousemove",spMouseMove);
  window.addEventListener("mouseup",spMouseUp);
  last_x=e.clientX;
}

function spMouseUp(e)
{
  window.removeEventListener("mousemove",spMouseMove);
  window.removeEventListener("mouseup",spMouseUp);
  splitter.addEventListener("mousedown",spMouseDown);
  resetPosition(last_x);
}

function spMouseMove(e)
{
  resetPosition(e.clientX);
}

function resetPosition(nowX)
{
  var dx=nowX-last_x;
  dx+=cont1.clientWidth;
  cont1.style.width=dx+"px";
  splitter.style.marginLeft=dx+"px";
  dx+=splitter.clientWidth;
  cont2.style.marginLeft=dx+"px";
  dx=window_width-dx;
  cont2.style.width=dx+"px";
  last_x=nowX;
}