<?php

/**
 * Spam-sichere E-Mail-Ausgabe
 *
 * Erstellt eine E-Mail-Adresse als klickbaren Link,
 * verschlüsselt in HTML-Entities, damit Bots sie nicht leicht auslesen können.
 */
function safe_mail($user, $domain, $tld, $text = '', $class = '')
{
    $address = "$user@$domain.$tld";
    $display = $text ?: $address;
    $encoded = '';

    // Jeden Buchstaben als HTML-Entity ausgeben
    for ($i = 0; $i < strlen($address); $i++) {
        $encoded .= '&#' . ord($address[$i]) . ';';
    }

    $classAttr = $class ? ' class="' . htmlspecialchars($class) . '"' : '';

    return '<a href="mailto:' . $encoded . '"' . $classAttr . '>' . htmlspecialchars($display) . '</a>';
}


function safe_mail_text($user, $domain, $tld)
{
    $address = "$user@$domain.$tld";
    $encoded = '';

    // Jeden Buchstaben als HTML-Entity ausgeben
    for ($i = 0; $i < strlen($address); $i++) {
        $encoded .= '&#' . ord($address[$i]) . ';';
    }

    return $encoded;
}