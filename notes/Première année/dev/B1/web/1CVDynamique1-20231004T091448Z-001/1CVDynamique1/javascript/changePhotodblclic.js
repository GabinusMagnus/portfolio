
var imgAffichee='';

function changePhoto()
{  
    imgAffichee=document.getElementById('photoCV').src;
    indexHtml=new String("index.HTML");
    lengthIndexHTML= indexHtml.length;
    nveauChemin=window.location.href.substring(0,window.location.href.length- (lengthIndexHTML+1));
         if (imgAffichee===nveauChemin+"/assets/images/boy.png")
     {imgAffichee=nveauChemin+"/assets/images/harry.jpg";
         document.getElementById('photoCV').src=nveauChemin+"/assets/images/harry.jpg";
      
     }
    else 
    {  imgAffichee=nveauChemin+"/assets/images/boy.png";
        document.getElementById('photoCV').src=nveauChemin+"/assets/images/boy.png";
      
     }
}


function toucheClavier(){
    document.getElementById("bodyBg").style.fontFamily = "Helvetica, sans-serif";
}

var a =0;
function doubleClick(){
    if(a%2===0){
        document.getElementById("photoCV").style.float = "left";
        a +=1;
        
    }
    else{
        document.getElementById("photoCV").style.float = "initial";
        a +=1
        
    }
}

var photo = document.getElementById("/assets/images/boy.png");
// Fonction pour agrandir l'image
function agrandirImage() {
    photo.style.transform = "scale(2)"; // Agrandit l'image de deux fois sa taille
  }
  
  // Fonction pour ramener l'image à sa taille normale
  function tailleNormaleImage() {
    photo.style.transform = "scale(1)"; // Ramène l'image à sa taille normale
  }
  
  // Ajoutez les écouteurs d'événements pour suivre le survol de la souris
  photo.addEventListener("mouseenter", agrandirImage);
  photo.addEventListener("mouseleave", tailleNormaleImage);