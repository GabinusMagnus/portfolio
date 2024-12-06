@echo off
rem encodage utf8
chcp 65001

rem effacement de l'écran
cls
echo nous sommes le %date%
rem affichage de l'heure du début jusqu'aux cinq premiers caractères
echo Il est %time:~,5%

rem affichage du répertoire système
echo Le répertoire du système Windows est : %windir:~3%
echo Il contient les fichiers système : && dir %windir%% /a:h
pause