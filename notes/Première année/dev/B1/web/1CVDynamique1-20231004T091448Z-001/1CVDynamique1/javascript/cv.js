
var dateNaissance='';

function monage( )
{ if (dateNaissance==='')
	 dateNaissance=document.getElementById('dateNaiss').innerText;
var tdate = dateNaissance.split('/');
var annee=tdate[2];
var now=new Date();
var anneeCourante=now.getFullYear();
var age=anneeCourante-annee;
document.getElementById('dateNaiss').innerHTML=age+" ans";
}
function madate( )
{
document.getElementById('dateNaiss').innerText=dateNaissance;
}

