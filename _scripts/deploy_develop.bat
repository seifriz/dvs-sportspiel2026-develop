@echo off
chcp 1252 >nul

title Deployment für Developer-Version!

setlocal

:: WinSCP-Kommandozeilentool
set WINSCP="C:\Program Files (x86)\WinSCP\WinSCP.com"

:: Skriptdatei
set SCRIPT="G:\www\dvs-sportspiel2026-Website\dvs-sportspiel2026-develop\_scripts\deploy_develop.txt"

:: Logfile
set LOG="G:\www\dvs-sportspiel2026-Website\___winscp_log_deploy_develop.txt"


echo Deployment für Developer-Version
echo ================================
echo.
echo Soll das Skript:
echo.
echo %SCRIPT%
echo.
echo ausgeführt werden?
echo.
echo Es synchronisiert den lokalen Ordner
echo.
echo G:\www\dvs-sportspiel2026-Website\dvs-sportspiel2026-develop
echo.
echo mit dem Developer-Ordner
echo.
echo /www-develop
echo.
echo auf dem Strato-Server. (J/N)
echo.
choice /c JN /n /m "Bitte bestätigen Sie mit J (Ja) oder N (Nein): "

if errorlevel 2 goto :abbruch
if errorlevel 1 goto :synchronisieren

:synchronisieren
:: WinSCP ausführen
%WINSCP% /script=%SCRIPT% /log=%LOG%

echo Synchronisierung Developer-Version abgeschlossen!

goto :ende

:abbruch
echo Synchronisierung wurde abgebrochen!

:ende

endlocal

pause
