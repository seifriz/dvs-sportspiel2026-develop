<?php
session_start();
// Einfaches CSRF-Token erzeugen und in der Session speichern
// Wird in send.php (CSRF-Check) geprüft
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrfToken = $_SESSION['csrf_token'];
?>

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
        .hero {
            background: url('images/hero2.jpeg') center center/cover no-repeat;
            color: white;
            height: 100%;
            min-height: 878px;
            padding: 100px 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .text-overlay {
            background-color: rgba(78, 109, 149, 0.73);
            padding: 1.5rem;
            border-radius: 1rem;
        }

        .section-padding {
            padding: 60px 0;
        }

        .navbar-brand img {
            height: 45px;
            margin-right: 10px;
        }

        /* Honeypot (Kontaktformular) unsichtbar, aber für Screenreader versteckt */
        .hp-field {
            position: absolute;
            left: -10000px;
            top: auto;
            width: 1px;
            height: 1px;
            overflow: hidden;
        }
    </style>
</head>
<body>


<!-- Working Header -->
<div style="
  background-color: #f8d7da;
  color: #721c24;
  padding: 30px; /* mehr Platz oben/unten */
  text-align: center;
  font-weight: bold;
  border-bottom: 2px solid #f5c6cb;
  font-size: 2em; /* größere Schrift */
">
    ⚠️ Diese Website befindet sich aktuell in Entwicklung. Bitte nicht weitergeben. ⚠️
</div>


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
                <li class="nav-item"><a class="nav-link" href="#">Start</a></li>
                <li class="nav-item"><a class="nav-link" href="#willkommen">Willkommen</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#programm" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">Programm</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#keynotes">Keynotes</a></li>
                        <li><a class="dropdown-item" href="#podium">Podiumsdiskussion</a></li>
                        <li><a class="dropdown-item" href="#arbeitskreise">Arbeitskreise</a></li>
                        <li><a class="dropdown-item" href="#workshops">Workshops</a></li>
                        <li><a class="dropdown-item" href="#poster">Posterpräsentation</a></li>
                        <li><a class="dropdown-item" href="#fachleiter">FachleiterInnentagungungen und Verband-Symposien</a></li>
                        <li><a class="dropdown-item" href="#gesellschaftsabend">Gesellschaftsabend</a></li>
                        <li><a class="dropdown-item" href="#sportprogramm">Sportprogramm</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#zeitplan">Zeitplan</a></li>
                <li class="nav-item"><a class="nav-link" href="#beitragsformat">Beitragsformat</a></li>
                <li class="nav-item"><a class="nav-link" href="#anmeldung">Anmeldung</a></li>
                <li class="nav-item"><a class="nav-link" href="#veranstaltungsort">Veranstaltungsort</a></li>
                <li class="nav-item"><a class="nav-link" href="#anreise">Anreise</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontakt">Kontakt</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<header class="hero text-center">
    <div class="container text-overlay">
        <h1 class="display-1">14. Sportspiel-Symposium der dvs</h1>
        <p class="fs-2">„SPIEL - <b>S</b>portspiel-<b>P</b>raxis: <b>I</b>nnovationen, <b>E</b>rkenntnisse & <b>L</b>eistungen“</p>
        <p class="fs-1">30.09. – 02.10.2026 | Deutsche Sporthochschule Köln</p>
        <!--<a href="#anmeldung" class="btn btn-primary btn-lg mt-3">Jetzt anmelden</a>-->
    </div>
</header>


<!-- Willkommen Section -->
<section id="willkommen" class="section-padding">
    <div class="container text-center">
        <h1>Willkommen zum Symposium</h1>
        <h3>„SPIEL – <b>S</b>portspiel | <b>P</b>raxis | <b>I</b>nnovationen | <b>E</b>rkenntnisse | <b>L</b>eistungen“</h3>
        <p class="mt-3">Im Rahmen des Tagungsthemas „SPIEL – <b>S</b>portspiel | <b>P</b>raxis | <b>I</b>nnovationen | <b>E</b>rkenntnisse | <b>L</b>eistungen“
            widmet sich das 14. Sportspiel-Symposium der dvs-Kommission Sportspiele einer breiten
            inhaltlichen Auseinandersetzung mit dem Sportspiel in all seinen Facetten. Thematisiert werden
            praxisnahe Impulse, wissenschaftliche Erkenntnisse, innovative Ansätze und leistungsorientierte
            Perspektiven. Die Veranstaltung richtet sich an WissenschaftlerInnen, TrainerInnen, Lehrkräfte und alle,
            die sich mit der Faszination und Komplexität von Sportspielen beschäftigen.<br>
            Wir freuen uns auf Euch!</p>
        <!-- 16:9 aspect ratio -->
        <!--        <div class="embed-responsive embed-responsive-16by9">-->
        <!--            <iframe class="embed-responsive-item" src="video/teaser_v4.mp4"></iframe>-->
        <!--        </div>-->
        <video class="img-fluid" controls poster="video/teaser_v4_poster.jpeg">
            <source src="video/teaser_v4.mp4" type="video/mp4">
            Dein Browser unterstützt das Video-Tag nicht.
        </video>
    </div>
</section>

<!-- Programm Section -->
<section id="programm" class="bg-light section-padding">
    <div class="container">
        <h2 class="text-center">Programm</h2>
        <div class="row text-center mt-3">
            <div class="col">
                <h5>Keynotes</h5>
                <p>Top-Speaker aus Forschung und Praxis präsentieren neueste Erkenntnisse.</p>
            </div>
            <div class="col">
                <h5>Podiumsdiskussion</h5>
                <p>Diskussion mit SpitzensportlerInnen und führenden TrainernInnen.</p>
            </div>
            <div class="col">
                <h5>Arbeitskreise</h5>
                <p>Arbeitskreise mit Einzelbeiträgen sowie die dvs-Kommissionssitzung Sportspiele.</p>
            </div>
            <div class="col">
                <h5>Workshops</h5>
                <p>Praxisworkshops in verschiedenen Sporthallen.</p>
            </div>
            <div class="col">
                <h5>Posterpräsentation</h5>
                <p>.</p>
            </div>
            <div class="col">
                <h5>FachleiterInnentagungungen und Verband-Symposien</h5>
                <p>.</p>
            </div>
            <div class="col">
                <h5>Gesellschaftsabend</h5>
                <p>Im Restaurant & Cafeteria Ulrich Türner.</p>
            </div>
            <div class="col">
                <h5>Mögliches Sportprogramm </h5>
                <p>In der Halle und Frühsport im Kölner Stadtwald</p>
            </div>
        </div>
    </div>
</section>

<!-- Keynotes Section -->
<section id="keynotes" class="section-padding">
    <div class="container text-center">
        <h2>Keynotes</h2>
        <div class="row people">
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="images/keynotes/Brand_Ralf_320x320.jpg" alt="Ralf Brand">
                    <h3 class="name">Ralf Brand</h3>
                    <p class="title">Univ.-Prof. Dr.</p>
                    <p class="description">Ralf Brand ist Professor für Sportpsychologie an der Universität Potsdam.
                        In seiner wissenschaftlichen Arbeit untersucht er, wie sich das mit Sport und Bewegung
                        verbundene affektive Erleben auf motivationale Prozesse der Verhaltensänderung auswirkt. Als
                        Gründer und mittlerweile Wissenschaftlicher Leiter des Zentrums für Praktische
                        Sportpsychologie an der UP. Transfer GmbH der Universität Potsdam ist er mit Fragen zur
                        Gestaltung, Durchführung und Qualitätssicherung sportpsychologischer Angebote im
                        Spitzensport bestens vertraut. Neben verschiedenen wissenschaftlichen Projekten und
                        Publikationen zum Thema Schiedsrichter im Sport leitete er selbst 16 Jahre Spiele in der 1.
                        Basketballbundesliga der Herren in Deutschland. Seit der Saison 2024-25 ist er für die
                        easyCredit Basket Ballbundesliga im Management des BBL-Elitekaders aktiv. In seinem Vortrag
                        setzt er sich mit SchiedsrichterInnen im Sportspiel auseinander.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="images/keynotes/Schubring_Astrid_320x320.jpg" alt="Astrid Schubring">
                    <h3 class="name">Astrid Schubring</h3>
                    <p class="title">Univ.-Prof. Dr.</p>
                    <p class="description">Astrid Schubring ist Professorin für Soziologie des Sports und leitet die
                        Abteilung Sportsoziologie an der Deutschen Sporthochschule in Köln. Sie promovierte 2014 am
                        Institut für Sportwissenschaft in Tübingen mit einer Studie zum Nachwuchsleistungssport und
                        erhielt 2015 den Promotionspreis der Universität Tübingen für ihre Dissertation. Von
                        2014-2023 war sie an der Universität Göteborg in Schweden tätig, wo sie sich 2019
                        habilitierte.
                        In ihrer Forschung beschäftigt sich Prof.‘in Schubring u.a. mit den sozialen Bedingungen der
                        Gesundheit von Athlet:innen, der Schaffung nachhaltiger Förderstrukturen und der
                        Karriereentwicklung im Olympischen und Paralympischen Sport. In ihrem Vortrag stellt sie
                        ausgewählte Ergebnisse aus einem <a
                                href="https://www.dshs-koeln.de/institut-fuer-soziologie-und-genderforschung/abteilung-sportsoziologie/forschung/qualift-trainerinnen-qualifizierung-von-frauen-fuer-den-trainerberuf/">BISp-geförderten
                            Kooperationsprojekt zur Qualifizierung und den Karrierewegen von Trainerinnen im
                            deutschen Spitzensport</a> vor.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 item">
                <div class="box"><img class="rounded-circle" src="images/keynotes/Jaspers_Schorer_320x320_2.jpg" alt="Jörg Schorer">
                    <h3 class="name">Jörg Schorer</h3>
                    <p class="title">Uni-Prof. Dr.</p>
                    <p class="description">Jörg Schorer ist der Leiter des Arbeitsbereichs „Sport und Bewegung“ an der Carl von Ossietzky Universität Oldenburg. Seine Forschungsschwerpunkte sind u.a.
                        Talent im Sport, Expertise in der Lebensspanne und Wahrnehmung im Sport und in der Schule. Im Rahmen seiner Sportspielforschung kooperiert er mit dem Deutschen Handballbund,
                        dem Deutschen Tischtennisbund und dem Deutschen Curling Verband. </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hörsaal Section -->
<section id="podium" class="bg-light section-padding">
    <div class="container text-center">
        <h2>Podiumsdiskussion</h2>
        <p>Diskussion mit SpitzensportlerInnen und führenden TrainernInnen.</p>
        <img src="images/hoersaal.jpg" alt="Hörsaal der Podiumsdiskussion" class="img-fluid mt-4" style="max-width: 75%; height: auto;">
    </div>
</section>

<!-- Arbeitskreise Section -->
<section id="arbeitskreise" class="section-padding">
    <div class="container text-center">
        <h2>Arbeitskreise</h2>
        <p>Zahlreiche (themenspezifische) Arbeitskreise mit Einzelbeiträgen sowie die dvs-Kommissionssitzung Sportspiele im NawiMedi.</p>
        <div style="display: flex; justify-content: center; align-items: center; gap: 20px; flex-wrap: wrap;">
            <img src="images/nawimedi1.jpg" alt="NawiMedi 1" style="max-width: 30%; height: auto;">
            <img src="images/nawimedi2.jpg" alt="NawiMedi 2" style="max-width: 25%; height: auto;">
            <img src="images/nawimedi3.jpg" alt="NawiMedi 3" style="max-width: 25%; height: auto;">
        </div>
    </div>
</section>

<!-- Workshops Section -->
<section id="workshops" class="bg-light section-padding">
    <div class="container text-center">
        <h2>Workshops</h2>
        <p>Praxisworkshops in verschiedenen Sporthallen.</p>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <img src="images/sporthalle1.jpg" class="img-fluid rounded shadow" alt="Sporthalle 1">
            </div>
            <div class="col-md-4 mb-4">
                <img src="images/sporthalle2.jpg" class="img-fluid rounded shadow" alt="Sporthalle 2">
            </div>
        </div>
    </div>
</section>

<!-- Posterpräsentation Section -->
<section id="poster" class="section-padding">
    <div class="container text-center">
        <h2>Posterpräsentation</h2>
        <p>Posterpräsentation und Kaffeepausen im Hauptgebäude.</p>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5 mb-4 d-flex justify-content-center">
                <img src="images/hauptgebaeude1.jpg" class="img-fluid rounded shadow" alt="Hauptgebäude 1" style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="col-md-5 mb-4 d-flex justify-content-center">
                <img src="images/hauptgebaeude2.jpg" class="img-fluid rounded shadow" alt="Hauptgebäude 2" style="max-height: 400px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Fachleitertagungen Section -->
<section id="fachleiter" class="bg-light section-padding">
    <div class="container text-center">
        <h2>FachleiterInnentagungen und Verband-Symposien</h2>
        <p>FachleiterInnentagungen (Satelliten-Workshops), Verbands-Symposien.</p>
        <div class="d-flex justify-content-center align-items-center gap-2">
            <img src="images/langbank.jpg" class="img-fluid rounded shadow" alt="Langbank" style="max-height: 300px; object-fit: contain;">
            <img src="images/tischtennis.jpg" class="img-fluid rounded shadow" alt="Tischtennis" style="max-height: 300px; object-fit: contain;">
        </div>
    </div>
</section>

<!-- Gesellschaftsabend Section -->
<section id="gesellschaftsabend" class="section-padding">
    <div class="container text-center">
        <h2>Gesellschaftsabend</h2>
        <p>Gesellschaftsabend am 01.10.2026 (voraussichtlich ab 19:30 Uhr) im Restaurant & Cafeteria Ulrich Türner.</p>
        <p>Guts-Muths-Weg 1<br>
            50933 Köln</p>
        <p>Das Restaurant befindet sich im selben Gebäudekomplex wie das Hockey- und Judoleistungszentrum und das
            Gästehaus der Deutschen Sporthochschule Köln. Es ist fußläufig (ca. 5 Minuten) vom Veranstaltungsort
            entfernt.</p>
        <img src="images/tuernner.png" alt="Restaurant Ulrich Türner" class="img-fluid rounded shadow" style="max-width: 100%; height: auto; margin-top: 1rem;">
    </div>
</section>

<!-- Sportprogramm Section -->
<section id="sportprogramm" class="bg-light section-padding">
    <div class="container text-center">
        <h2>Mögliches Sportprogramm</h2>
        <p>Mögliches Sportprogramm in der Halle und Frühsport im Kölner Stadtwald.</p>
        <p>Weitere detaillierte Informationen zum Programm folgen zu gegebener Zeit.</p>
        <div class="d-flex justify-content-center gap-3 mt-3 flex-wrap">
            <img src="images/halle.jpg" alt="Sporthalle" class="img-fluid rounded shadow" style="max-width: 45%; height: auto;">
            <img src="images/luftbild.jpg" alt="Luftbild Kölner Stadtwald" class="img-fluid rounded shadow" style="max-width: 45%; height: auto;">
        </div>
    </div>
</section>

<!-- Zeitplan Section (/css/timeline3.css) -->
<section id="zeitplan" class="section-padding">
    <div class="container">
        <h2 class="text-center">Zeitplan</h2>
        <ul class="timeline">
            <li class="event">
                <div class="left-arrow"></div>
                <div class="time">Oktober 2025</div>
                <h3>First Announcement</h3>
                <div class="description">
                    <p>Schalten der Webpräsenz.</p>
                </div>
            </li>
            <li class="event">
                <div class="left-arrow"></div>
                <div class="time text-success">15.12.2025</div>
                <h3 class="text-success">Beitragsaufruf und Beginn der Anmeldung (Early-Bird)</h3>
                <div class="description">
                    <!--                    <p>Beiträge können <a href="conftool">eingereicht</a> werden und die <a-->
                    <!--                            href="conftool">Anmeldung</a> ist möglich.</p>-->
                    <p>Beiträge können eingereicht werden und die Anmeldung ist möglich.</p>
                </div>
            </li>
            <li class="event">
                <div class="left-arrow"></div>
                <div class="time text-danger">01.03.2026</div>
                <h3 class="text-danger">Einreichungsfrist für Beiträge</h3>
                <!--                <div class="description">-->
                <!--                    <p>Ende der Beitragseinreichung.</p>-->
                <!--                </div>-->
            </li>
            <li class="event">
                <div class="left-arrow"></div>
                <div class="time">15.04.2026</div>
                <h3>Rückmeldung über Gutachten der Beiträge</h3>
                <!--                <div class="description">-->
                <!--                    <p>Lorem ipsum dolor sit amet.</p>-->
                <!--                </div>-->
            </li>
            <li class="event">
                <div class="left-arrow"></div>
                <div class="time text-danger">31.05.2026</div>
                <h3 class="text-danger">Ende der Anmeldung (Early-Bird)</h3>
                <!--                <div class="description">-->
                <!--                    <p>Lorem ipsum dolor sit amet.</p>-->
                <!--                </div>-->
            </li>
            <li class="event">
                <div class="left-arrow"></div>
                <div class="time text-danger">15.07.2026</div>
                <h3 class="text-danger">Ende der Anmeldung (Regulärer Tarif)</h3>
                <!--                <div class="description">-->
                <!--                    <p>Lorem ipsum dolor sit amet.</p>-->
                <!--                </div>-->
            </li>
            <li class="event">
                <div class="left-arrow"></div>
                <div class="time">30.09. - 02.10.2026</div>
                <h3>Symposium</h3>
                <div class="description">
                    <p>14. Sportspiel-Symposium der dvs</p>
                </div>
            </li>
        </ul>
    </div>
</section>

<!-- Beitragsformate Section -->
<section id="beitragsformat" class="bg-light section-padding">
    <div class="container text-center">
        <h2>Beitragsformat</h2>
        <p><span>&#8226;</span> Kurzvortrag als Einzelbeitrag innerhalb eines Arbeitskreises</p>
        <p><span>&#8226;</span> Poster</p>
        <p><span>&#8226;</span> Arbeitskreis</p>
        <p><span>&#8226;</span> Praxisworkshop</p>
        <p>Konkrete Hinweise zur Beitragseinreichung folgen.</p>
    </div>
</section>

<!-- Anmeldung Section -->
<section id="anmeldung" class="section-padding">
    <div class="container text-center">
        <h2>Anmeldung</h2>
        <h3>Teilnahmegebühren</h3>
        <table class="table table-bordered border-secondary align-middle">
            <thead>
            <tr class="table-secondary border-secondary">
                <th scope="col"></th>
                <th scope="col">Nicht-Mitglieder</th>
                <th scope="col">dvs-Mitglieder</th>
                <th scope="col">Studierende</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <tr>
                <td class="table-secondary"><b>Early-Bird Tarif</b><br>
                    (15.12.2025 - 31.05.2026)
                </td>
                <td>205 €</td>
                <td>165 €</td>
                <td>100 €</td>
            </tr>
            <tr>
                <td class="table-secondary"><b>Regulärer Tarif</b><br>
                    (01.06. - 15.07.2026)
                </td>
                <td>245 €</td>
                <td>200 €</td>
                <td>125 €</td>
            </tr>
            <tr>
                <td class="table-secondary"><b>Vorortregistrierung</b><br>
                    (30.09. - 02.10.2026)
                </td>
                <td>275 €</td>
                <td>225 €</td>
                <td>140 €</td>
            </tr>
            <tr>
                <td class="table-secondary"><b>Tagesgäste<br>
                        Early-Bird Tarif</b></td>
                <td colspan="3">115 €</td>
            </tr>
            <tr>
                <td class="table-secondary"><b>Tagesgäste<br>
                        Regulärer Tarif</b></td>
                <td colspan="3">140 €</td>
            </tr>
            <tr>
                <td class="table-secondary"><b>Tagesgäste<br>
                        Vorortregistrierung</b></td>
                <td colspan="3">155 €</td>
            </tr>
            <tr>
                <td class="table-light"><b>Get-Together Abend</b><br>
                    (30.09.2026)
                </td>
                <td class="table-light" colspan="3">Essen und Getränke auf SelbstzahlerInnenbasis<br>
                    <i>Bei Anmeldung bitte angeben, ob Interesse an einer Teilnahme besteht.</i></td>
            </tr>
            <tr>
                <td class="table-secondary"><b>Gesellschaftsabend<br>
                        -Dinner-</b><br>
                    (01.10.2026)
                </td>
                <td colspan="3">85 €</td>
            </tr>
            </tbody>
        </table>

        <!-- <p>Ab dem 15.12.2025 hier möglich.</p> -->
        <!-- <a href="#" class="btn btn-primary btn-lg mt-3">Zur Anmeldung (!erst ab 15.12. freischalten!)</a> -->
    </div>
</section>

<!-- Veranstaltungsort Section -->
<section id="veranstaltungsort" class="bg-light section-padding">
    <div class="container text-center">
        <h2>Veranstaltungsort</h2>
        <h3>Deutsche Sporthochschule Köln</h3>
        <p><a href="https://www.dshs-koeln.de">Deutsche Sporthochschule Köln</a></p>
        <div class="mt-3">
            <img src="images/sporthochschule1.jpg" alt="Sporthochschule Bild 1" class="img-fluid rounded shadow mb-3" style="max-width: 100%; height: auto;">
            <img src="images/sporthochschule2.jpg" alt="Sporthochschule Bild 2" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
        </div>
    </div>
</section>

<!-- Anreise Section -->
<section id="anreise" class="section-padding">
    <div class="container text-center">
        <h2>Anreise</h2>
        <p>Deutsche Sporthochschule Köln<br>
            Am Sportpark Müngersdorf 6<br>
            50933 Köln</p>
        <h3>Mit dem Auto</h3>
        <p>Sie finden die Deutsche Sporthochschule in Köln-Müngersdorf, direkt am Sportpark Müngersdorf und dem
            RheinEnergie Stadion. Sie erreichen uns über die A1, Autobahnausfahrt Köln-Lövenich. Folgen Sie der
            Beschilderung zum RheinEnergieStadion bis zum Hinweisschild Deutsche Sporthochschule.</p>
        <h3>Mit öffentlichen Verkehrsmitteln</h3>
        <p>Stadtbahn Linie 1 - Junkersdorf/Weiden (bzw. Brück/Bensberg bei Einstieg Haltestelle Weiden-West) oder
            Busse der KVB-Linien 141 / 143 / 144, Haltestelle Junkersdorf/Sporthochschule oder Haltestelle
            RheinEnergieSTADION.</p>
        <h5>Verbindung vom Flughafen</h5>
        <p>S-Bahn S 13 bis Messe/Deutz, dann Stadtbahn Linie 1 (Junkersdorf/Weiden), Haltestelle
            Junkersdorf/Sporthochschule oder Haltestelle RheinEnergieSTADION.</p>
        <h5>Verbindung vom Bahnhof</h5>
        <p>Vom Kölner Hauptbahnhof mit der Stadtbahn Linie 16 oder 18 bis Neumarkt, dann Linie 1 (Richtung
            Junkersdorf/Weiden), Haltestelle Junkersdorf/Sporthochschule oder Haltestelle RheinEnergieSTADION. Am
            Bahnhof Köln-Deutz steigen Sie direkt in die Stadtbahn Linie 1 (Richtung Junkersdorf/Weiden).</p>
        <p>Zur weiteren Orientierung nutzen Sie bitte unseren <a href="https://www.dshs-koeln.de/fileadmin/redaktion/Hochschule/Campus_und_Freizeit/Campusplan_DSHS.pdf">Lageplan</a>.
            Um von der Haltestelle Junkersdorf/Sporthochschule auf unseren Campus zu kommen, nutzen Sie bitte die Straße Am Sportpark
            Müngersdorf. Der Fußweg zwischen der Straße Am Römerhof und dem Gebäude mit der Nummer 6 ist derzeit
            aufgrund von Baumaßnahmen gesperrt (siehe
            <a href="https://www.dshs-koeln.de/fileadmin/redaktion/Hochschule/Campus_und_Freizeit/Baustellen/DSHS-Lageplan_INFO-SPERRUNG.pdf">Karte Wegführung</a>).</p>
        <p>Weitere Informationen zu barrierefreien Gebäudezugängen, Angeboten und Unterstützungsmöglichkeiten auf dem Campus erhalten Sie auf der Webseite
            <a href="https://www.dshs-koeln.de/hochschule/barrierefreie-hochschule/">DSHS Köln.</a></p>
    </div>
</section>

<!-- Kontakt Section -->
<section id="kontakt" class="bg-light section-padding">
    <div class="container text-center">
        <h2>Kontakt</h2>
        <div class="social"><i class="icon bi-envelope-at"></i> <?= safe_mail('info', 'sportspiel2026', 'de') ?></div>
        <br>
        <h5>Organisatorische Leitung (Hauptansprechperson)</h5>
        <div class="social">Dr. M. Geisen<br>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal">Nachricht schreiben</button>
            <br>
            Telefon: +49 221 4982 8735<br>
        </div>
        <br>
        <h5>Abteilungsleitung</h5>
        <div class="social">Univ.-Prof. Dr. S. Klatt</div>

        <!-- Kontaktformular Modal -->
        <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactModalLabel">Ihre Nachricht</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
                    </div>
                    <div class="modal-body">
                        <div id="formAlert" class="alert d-none" role="alert"></div>

                        <form id="contactForm" novalidate>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required minlength="2" maxlength="80" autocomplete="name">
                                <div class="invalid-feedback">Bitte gib deinen Namen (min. 2 Zeichen) an.</div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E‑Mail</label>
                                <input type="email" class="form-control" id="email" name="email" required autocomplete="email">
                                <div class="invalid-feedback">Bitte gib eine gültige E‑Mail-Adresse an.</div>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Betreff</label>
                                <input type="text" class="form-control" id="subject" name="subject" required maxlength="120">
                                <div class="invalid-feedback">Bitte gib einen Betreff an.</div>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Nachricht</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required minlength="10" maxlength="3000"></textarea>
                                <div class="invalid-feedback">Bitte formuliere deine Nachricht (mind. 10 Zeichen).</div>
                            </div>

                            <!-- CSRF Token -->
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken, ENT_QUOTES) ?>">

                            <!-- Honeypot (Leer lassen) -->
                            <div class="hp-field" aria-hidden="true">
                                <label for="company">Firma</label>
                                <input type="text" id="company" name="company" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="d-grid">
                                <button id="submitBtn" type="submit" class="btn btn-primary">
                                    <span class="btn-text">Senden</span>
                                    <span class="spinner-border spinner-border-sm ms-2 d-none" aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <img src="images/team_800x514.jpg" class="img-fluid" alt="Team-Foto">
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
        <p class="mb-0">Deutsche Sporthochschule Köln - Institut für Trainingswissenschaft und Sportinformatik - Abteilung Kognitions- und Sportspielforschung</p>
        <p class="mb-1">Deutsche Sporthochschule Köln - Am Sportpark 6 - 50933 Köln</p>
        <p><a href="impressum.php" class="text-white">Impressum</a></p>
    </div>
</footer>

<!-- JavaScript Kontaktformular -->
<script>
    (function () {
        const form = document.getElementById('contactForm');
        const alertBox = document.getElementById('formAlert');
        const submitBtn = document.getElementById('submitBtn');
        const spinner = submitBtn.querySelector('.spinner-border');
        const btnText = submitBtn.querySelector('.btn-text');

        function showAlert(type, message) {
            alertBox.className = `alert alert-${type}`;
            alertBox.textContent = message;
        }

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            // Bootstrap Client-Validation
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }

            showAlert('info', 'Sende…');

            submitBtn.disabled = true;
            spinner.classList.remove('d-none');
            btnText.textContent = 'Senden…';

            try {
                const formData = new FormData(form);
                const res = await fetch('send.php', {
                    method: 'POST',
                    body: formData,
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                });
                const data = await res.json();

                if (data.success) {
                    showAlert('success', data.message || 'Nachricht erfolgreich versendet.');
                    form.reset();
                    form.classList.remove('was-validated');
                } else {
                    showAlert('danger', data.message || 'Senden fehlgeschlagen.');
                }
            } catch (err) {
                showAlert('danger', 'Netzwerk- oder Serverfehler. Bitte später erneut versuchen.');
            } finally {
                submitBtn.disabled = false;
                spinner.classList.add('d-none');
                btnText.textContent = 'Senden';
            }
        });
    })();
</script>

</body>

</html>
