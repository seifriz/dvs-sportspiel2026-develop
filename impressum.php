<?php
require_once 'functions.php';
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>14. Sportspiel-Symposium der dvs 2026</title>
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/bootstrap.bundle.min.js"></script>

    <style>
        .section-padding {
            padding: 60px 0;
        }

        .navbar-brand img {
            height: 45px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">	 -->
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="images/dvs_Logo_rot.webp" alt="dvs-Logo">14. Sportspiel-Symposium der dvs
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php#">Start</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#willkommen">Willkommen</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php#programm" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">Programm</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php#keynotes">Keynotes</a></li>
                        <li><a class="dropdown-item" href="index.php#podium">Podiumsdiskussion</a></li>
                        <li><a class="dropdown-item" href="index.php#arbeitskreise">Arbeitskreise</a></li>
                        <li><a class="dropdown-item" href="index.php#workshops">Workshops</a></li>
                        <li><a class="dropdown-item" href="index.php#poster">Posterpräsentation</a></li>
                        <li><a class="dropdown-item" href="index.php#fachleiter">FachleiterInnentagungungen und
                                Verband-Symposien</a></li>
                        <li><a class="dropdown-item" href="index.php#gesellschaftsabend">Gesellschaftsabend</a></li>
                        <li><a class="dropdown-item" href="index.php#sportprogramm">Sportprogramm</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#zeitplan">Zeitplan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#beitragsformat">Beitragsformat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#anmeldung">Anmeldung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#veranstaltungsort">Veranstaltungsort</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#anreise">Anreise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#kontakt">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--Impressum Section -->
<section id="impressum" class="section-padding">
    <div class="container text-center">
        <h1>Impressum</h1>
        <p class="mt-3">
            DeutscheSporthochschule Köln<br>
            Institut für Trainingswissenschaft und Sportinformatik<br>
            Abt. II Kognitions- und Sportspielforschung<br>
            Am Sportpark Müngersdorf 6<br>
            50933 Köln</p>
        <p>
            Telefon: +49 221 4982-8570<br>
            E-Mail: <?= safe_mail_text('info', 'sportspiel2026', 'de') ?><br>
        </p>

        <p>Inhaltlich Verantwortliche gemäß § 55 Abs. 2 RStV:<br>
            Univ.-Prof. Dr. Stefanie Klatt<br>
            Telefon: +49 221 4982-4312<br>
            E-Mail: <?= safe_mail_text('info', 'sportspiel2026', 'de') ?></p>

        <p>Gemäß § 28 BDSG widersprechen wir jeder kommerziellen Verwendung und Weitergabe unserer Daten.</p>

        <h5>Haftungsbeschränkung</h5>
        <p>Die Inhalte dieser Webpräsenz werden mit sorgfältiger inhaltlicher Kontrolle erstellt. Der Anbieter übernimmt aber keine Gewähr für die Aktualität, Vollständigkeit und Richtigkeit der
            bereitgestellten Inhalte. Die Nutzung der Inhalte der Webpräsenz erfolgt auf eigene Gefahr des Nutzers.
            Namentlich gekennzeichnete Inhalte geben die Meinung des jeweiligen Autors und nicht immer die Meinung des Anbieters wieder. Durch die Nutzung der Webpräsenz des Anbieters kommt keinerlei
            Vertragsverhältnis zwischen dem Nutzer und dem Anbieter zustande.</p>

        <h5>Externe Link</h5>
        <p>Diese Webpräsenz enthält externe Links (Verknüpfungen) zu Webangeboten Dritter. Diese Webangebote unterliegen der Haftung der jeweiligen Betreiber. Der Anbieter hat bei der ersten
            Verknüpfung der externen Links die Inhalte daraufhin überprüft, ob etwaige Rechtsverstöße bestehen. Zu
            diesem Zeitpunkt waren keine Rechtsverstöße ersichtlich. Der Anbieter hat keinen Einfluss auf die aktuelle und zukünftige Gestaltung sowie auf die Inhalte der verknüpften Seiten. Das
            Setzen von externen Links bedeutet nicht, dass sich der Anbieter die hinter dem Verweis oder Link
            liegenden Inhalte zu Eigen macht. Eine ständige Kontrolle der externen Links ist für den Anbieter ohne konkrete Hinweise auf Rechtsverstöße nicht zumutbar. Bei Kenntnis von Rechtsverstößen
            werden jedoch derartige externe Links unverzüglich gelöscht.</p>


        <h5>Urheber- und Leistungsschutzrechte</h5>
        <p>Die auf dieser Website veröffentlichten Inhalte unterliegen dem deutschen Urheber- und Leistungsschutzrecht. Jede vom deutschen Urheber- und Leistungsschutzrecht nicht zugelassene
            Verwertung bedarf der vorherigen schriftlichen Zustimmung des Anbieters oder jeweiligen Rechteinhabers. Dies
            gilt insbesondere für Vervielfältigung, Bearbeitung, Übersetzung, Einspeicherung, Verarbeitung bzw. Wiedergabe von Inhalten in Datenbanken oder anderen elektronischen Medien und Systemen.
            Inhalte und Rechte Dritter sind dabei als solche gekennzeichnet. Die unerlaubte Vervielfältigung
            oder Weitergabe einzelner Inhalte oder kompletter Seiten ist nicht gestattet und strafbar. Lediglich die Herstellung von Kopien und Downloads für den persönlichen, privaten und nicht
            kommerziellen Gebrauch ist erlaubt.
            Die Darstellung dieser Website in fremden Frames ist nur mit schriftlicher Erlaubnis zulässig.</p>

        <h5>Datenschutz</h5>
        <p>Durch den Besuch der Website des Anbieters können Informationen über den Zugriff (Datum, Uhrzeit, betrachtete Seite) gespeichert werden. Diese Daten sind anonymisiert und gehören nicht zu
            den personenbezogenen Daten. Sie werden nur zu statistischen Zwecken ausgewertet. Eine Weitergabe an
            Dritte, zu kommerziellen oder nichtkommerziellen Zwecken, findet nicht statt.
            Der Anbieter weist ausdrücklich darauf hin, dass die Datenübertragung im Internet Sicherheitslücken aufweisen und nicht lückenlos vor dem Zugriff durch Dritte geschützt werden kann.</p>
    </div>
</section>


<!-- Footer -->
<footer id="footer" class="bg-dark text-white text-center py-4">
    <div class="container">
        <a href="https://www.sportwissenschaft.de" target="_blank">
            <img src="images/dvs_Logo_rot.webp" alt="dvs-Logo" style="height: 45px; margin-bottom: 15px;">
        </a>
        <p class="mb-1">Veranstalter:
        <p class="mb-1">dvs-Kommission Sportspiele
        <p class="mb-1">und
        <p class="mb-0">Deutsche Sporthochschule Köln - Institut für Trainingswissenschaft und Sportinformatik -
            Abteilung Kognitions- und Sportspielforschung</p>
        <p class="mb-1">Deutsche Sporthochschule Köln - Am Sportpark 6 - 50933 Köln</p>
        <p><a href="impressum.php" class="text-white">Impressum</a></p>
    </div>
</footer>

</body>

</html>