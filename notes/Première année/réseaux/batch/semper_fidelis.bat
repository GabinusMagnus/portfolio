@echo off

echo le code page actuellement utilis� est
mode con cp /status

mode con cp select=850
echo changement pour :
mode con cp /status

echo il est %time /T% heure
echo la version est : %ver%
echo le r�pertoire courant est : %cd%
echo il contient les fichiers : %dir%
@echo on
set /p commande=Entrez une commande :;%commande$%

