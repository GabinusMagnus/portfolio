@echo off

set /p login=saisir l'utilisateur : 

rem si l'argument est vide, sauter jusquà la ligne 15
if "%login%"=="" goto usage

rem sameolstory
if "%login%"=="/?" goto usage

if exist c:\users\%login%\NUL (
echo le repertoire %login% existe !
goto fin
) else (

rem créer un utilisateur et l'ajouter au groupe Administrateurs
net user %login% %login% /add /homedir:c:\users\%login%
net localgroup Administrateurs %login% /add

rem destruction de compte

net user %login /delete

)
goto fin
:usage
echo usage : second.bat nom_utilisateur
:fin