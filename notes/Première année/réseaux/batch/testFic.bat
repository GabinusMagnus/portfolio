@echo off

rem si l'argument est vide, sauter jusqu� la ligne 15
if "%1"=="" goto usage

rem sameolstory
if "%1"=="/?" goto usage

if exist %1\NUL (
echo le repertoire %1 existe !
) else (
if exist %1 (
echo le fichier %1 est pr�sent
) else echo %1 est absent
)
goto fin
:usage
echo usage : testFic nomfichier
:fin