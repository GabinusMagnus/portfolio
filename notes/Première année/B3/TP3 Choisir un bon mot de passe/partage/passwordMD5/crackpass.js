/*********************************************************
	lancer MD4SHA.html
	renter un mot de passe constitué du nom en de la date de naissance
	ex: 27cochou05 ou cochou2705 et lancer la génération du hash MD5
	Ouvrir alors crackpass.html y copier le hash MD5
	entrer alors les éléments de social intelligency
	et lancer la recherche du mot de passe
**********************************************************/

function crack()
{
	/* Table contenant la liste des valeurs à tester */
	var tablechars = ["",nom.value,jour.value,mois.value,dizans.value,ans.value,prenom.value,ville.value,noix.value];
	var TempsDebutEnMs = Date.now(); // Mesure date de début nombre de ms depuis 1 janv1970 0h
	var i3 = 0;
	var i2 = 0;
	var i1 = 0;
	var i0 = 0;
	var chaine =""; // chaine qui va prendre toutes les valeurs possibles
	var trouve=0;
	var nombreEssai=0;
   	while ((i3 < tablechars.length)&(trouve==0))
	{	
		while ((i2 < tablechars.length)&(trouve==0))
		{
    		while ((i1 < tablechars.length)&(trouve==0)) 
			{
				while ((i0 < tablechars.length)&(trouve==0)) 
				{
    				chaine=tablechars[i3]+tablechars[i2]+tablechars[i1]+tablechars[i0];	
					HashTest.value = calcMD5(chaine);
					if (HashTest.value==CopieHash.value) 
					{
    					MDP.value = chaine;
						trouve=1;
						NbEssai.value = nombreEssai;
						//stringTest.value = chaine;
					} 
    				i0++;
					nombreEssai++;				
				}
    			i0=0;
    			i1++;
			}
			i1=0;
    		i2++;
		}
		i2=0;
		i3++;
	}
	i3=0;
	if (trouve==0) //si on a pas trouvé de correspondance
	{
    	MDP.value = "Pas trouvé";
		NbEssai.value = nombreEssai;
		HashTest.value ="";
	} 
	duree.value = Date.now()-TempsDebutEnMs; // Calcul de la durée necessaire pour trouver le Mot de passe
}


GO.onclick = function() // demande de crack
{
	crack();
}

