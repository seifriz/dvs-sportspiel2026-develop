@echo off
chcp 1252 >nul

title Build-Web: Erzeugt Produktiv-Version

setlocal

:: Pfad zum Produktiv-Ordner: \dvs-sportspiel2026...
set WEB_DIR=G:\www\dvs-sportspiel2026-Website\dvs-sportspiel2026

:: Pfad zum Dev-Ordner: \dvs-sportspiel2026-develop...
set DEV_DIR=G:\www\dvs-sportspiel2026-Website\dvs-sportspiel2026-develop


echo Build-Web: Erzeugt Produktiv-Version im 'dvs-sportspiel2026'-Verzeichnis
echo ========================================================================
echo.
echo Sollen die Dateien aus:
echo.
echo %DEV_DIR%
echo.
echo nach:
echo.
echo %WEB_DIR%
echo.
echo kopiert werden?
echo.
echo.
echo Achtung! %WEB_DIR% wird vollständig überschrieben! (J/N)
echo.
choice /c JN /n /m "Bitte bestätigen Sie mit J (Ja) oder N (Nein): "

if errorlevel 2 goto :abbruch
if errorlevel 1 goto :kopieren

:kopieren
:: Produktiv-Version im 'dvs-sportspiel2026'-Verzeichnis löschen...
:: rd /s /q "%WEB_DIR%"
rd /s /q "%WEB_DIR%"\css
rd /s /q "%WEB_DIR%"\images
rd /s /q "%WEB_DIR%"\js
rd /s /q "%WEB_DIR%"\node_modules
rd /s /q "%WEB_DIR%"\scss
rd /s /q "%WEB_DIR%"\video

:: Neue leere Verzeichnisstruktur aufbauen...
mkdir "%WEB_DIR%"\css\font
mkdir "%WEB_DIR%\images\keynotes"
mkdir "%WEB_DIR%\js"
mkdir "%WEB_DIR%\node_modules"
mkdir "%WEB_DIR%\scss"
mkdir "%WEB_DIR%\video"

:: Kopiere Dateien von 'dvs-sportspiel2026-develop' nach 'dvs-sportspiel2026' mit Originaldatum...

:: noch so machen, das in "%WEB_DIR%\" .git und .idea und readme.md erhaltenbleibt!!!!!

::xcopy "%DEV_DIR%\" "%WEB_DIR%\" /i /y

xcopy "%DEV_DIR%\css" "%WEB_DIR%\css" /s /e /i /y
xcopy "%DEV_DIR%\images" "%WEB_DIR%\images" /s /e /i /y
xcopy "%DEV_DIR%\js" "%WEB_DIR%\js" /s /e /i /y
xcopy "%DEV_DIR%\node_modules" "%WEB_DIR%\node_modules" /s /e /i /y
xcopy "%DEV_DIR%\scss" "%WEB_DIR%\scss" /s /e /i /y
xcopy "%DEV_DIR%\video" "%WEB_DIR%\video" /s /e /i /y

echo Build-Web abgeschlossen!

goto :ende

:abbruch
echo Build-Web Vorgang wurde abgebrochen!

:ende
endlocal

pause
