// 1eme evenement : fait defiler un texte ==========
var titre = document.getElementById("anim");
titre.style.position="relative";
let topPos = 1600;
let dir = -1;

function hautBas(){
    if (topPos==-100){
        topPos=1600;  
    }
    topPos += 2*dir;
    titre.style.left=topPos+"px";
    requestAnimationFrame(hautBas);
}
requestAnimationFrame(hautBas);

//2 eme evenement : change la couleur de l'arriere plan en entrant dans les champs de saisie input
document.querySelectorAll('.boiteSaisie').forEach(item => {
    item.addEventListener('focus', event => {
      item.style.backgroundColor = "blanchedalmond";
    })
  });

//3 eme evenement : change la couleur de l'arriere plan en sortant des champs de saisie input
 document.querySelectorAll('.boiteSaisie').forEach(item => {
    item.addEventListener('blur', event => {
      item.style.backgroundColor = "white";
    })
  });

//4 eme evenement : 
  document.querySelectorAll('#menu ul li a').forEach(item => {
    item.addEventListener('mouseover', event => {
      item.style.color="#e2c014";
    })
  });

  document.querySelectorAll('#menu ul li a').forEach(item => {
    item.addEventListener('mouseout', event => {
        item.style.color = "white";
    })
  });

//5 eme evenement :image suit le pointeur de la souris
document.onmousemove = suitsouris;

function suitsouris(evenement)
{
    if(navigator.appName=="Microsoft Internet Explorer")
    {
            var x = event.x+document.body.scrollLeft;
            var y = event.y+document.body.scrollTop;
    }
    else
    {
            var x =  evenement.pageX;
            var y =  evenement.pageY;
    }
    document.getElementById("image_suit_souris").style.left = (x+20)+'px';
    document.getElementById("image_suit_souris").style.top  = (y+20)+'px';
}

