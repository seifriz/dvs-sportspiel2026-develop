@echo off
chcp 1252 >nul

title Commit-Push der Produktiv-Version

setlocal

:: Pfad zum Produktiv-Ordner: \dvs-sportspiel2026...
set WEB_DIR=G:\www\dvs-sportspiel2026-Website\dvs-sportspiel2026


echo Commit-Push der Produktiv-Version aus dem 'dvs-sportspiel2026'-Verzeichnis
echo ==========================================================================
echo.
echo Soll die Produktiv-Version
echo.
echo %WEB_DIR%
echo.
echo commited und gepushed werden? (J/N)
echo.
choice /c JN /n /m "Bitte bestätigen Sie mit J (Ja) oder N (Nein): "

if errorlevel 2 goto :abbruch
if errorlevel 1 goto :pushen

:pushen
cd /d %WEB_DIR%

:: Standard Commit-Message, wenn keine angegeben
set MESSAGE=auto update
if not "%~1"=="" set MESSAGE=%~1

echo.
echo Git Auto Push
echo =============
echo.
echo Repository: %WEB_DIR%
echo Commit-Message: %MESSAGE%
echo.

git add .
git commit -m "%MESSAGE%" 2>nul
if errorlevel 1 (
    echo Keine neuen Änderungen zum Commit.
)

for /f "delims=" %%b in ('git rev-parse --abbrev-ref HEAD') do set BRANCH=%%b
echo Push zu origin/%BRANCH% ...
git push origin %BRANCH%

echo.
echo Commit-Push abgeschlossen!

goto :ende

:abbruch
echo Commit-Push Vorgang wurde abgebrochen!

:ende

endlocal

pause

