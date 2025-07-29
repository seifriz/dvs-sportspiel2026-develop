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
if errorlevel 1 goto :sync

:sync
:: Develop-Version synchronisieren in Produktiv-Version (mit Ausnahmen)...
robocopy "%DEV_DIR%" "%WEB_DIR%" /MIR /XF .gitignore README.md /XD .git .idea /R:1 /W:1

echo Build-Web abgeschlossen!

goto :ende

:abbruch
echo Build-Web Vorgang wurde abgebrochen!

:ende
endlocal

pause
