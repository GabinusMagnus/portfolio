@echo off
rem encodage utf8
chcp 65001

rem effacement de l'�cran
cls
echo nous sommes le %date%
rem affichage de l'heure du d�but jusqu'aux cinq premiers caract�res
echo Il est %time:~,5%

rem affichage du r�pertoire syst�me
echo Le r�pertoire du syst�me Windows est : %windir:~3%
echo Il contient les fichiers syst�me : && dir %windir%% /a:h
pause