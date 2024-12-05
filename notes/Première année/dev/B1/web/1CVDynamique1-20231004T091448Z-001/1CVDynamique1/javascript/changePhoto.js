
var imgAffichee='';

//function photoGrosse()
//{ 
//    document.getElementById('photoCV').style.width = '50%'
//}
//


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

function agranditPhoto()
{
    document.getElementById('photoCV').style.width = '200%'
}

function imageNormale()
{
    document.getElementById('photoCV').style.width = '100%';
    document.getElementById('photoCV').style.height = '100%';

}