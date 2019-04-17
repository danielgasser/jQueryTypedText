<?php
$data = array(
    'PHP 5.x',
    'PHP Frameworks:',
    ' - Laravel',' - Symfony',
    'MySQL',
    'SQL',
    'SQL-Server',
    'Javascript',
    'jQuery',
    'jQuery-UI',
    'jQuery-Mobile',
    'JSON',
    'Ajax',
    'HTML5',
    'Analyse',
    'Pflichtenhefte',
    'Benutzeroberflächen',
    'Daten-Modellierungen',
    'Umsetzungen',
    'Datenbanken');
function checkOldIE($ie) {
    $t = $_SERVER['HTTP_USER_AGENT'];
    return (stripos($t, $ie) === false);
}
$iEError = '<h1>Diese Seite läuft ab Internet Explorer Version 10.0. Aber hier trotzdem ein paar Daten für Sie ;-)</h1>';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="img/fav.ico" type="image/x-icon">
    <title>Daniel Gasser - Programmierer aus Leidenschaft</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="scripts/typedText.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script>
        var globalCounter = 3400,
            all = '<?php  echo json_encode($data);
                ?>';
        $(document).ready(function () {
            "use strict";

            /**
             *
             * 2014-09-14
             * Still in development...
             *
             */

            var arr = {
                    de: {
                        welcome: 'Willkommen',
                        coding: 'Programmieren mit Leidenschaft',
                        mail: 'E-Mail:'
                    },
                    en: {
                        welcome: 'Welcome',
                        coding: 'Programming with passion',
                        mail: 'email:'
                    }
            };
                $('#title').typedText({
                    textToType: [arr.de.welcome],
                    cursorTimer: 500,
                    counter: globalCounter - 150
                });
                window.setTimeout(function () {
                    $('#title2').typedText({
                        textToType: [arr.de.coding],
                        cursorTimer: 500,
                        counter: globalCounter
                    });
                }, globalCounter);
                window.setTimeout(function () {
                    $('#mail-title').typedText({
                        textToType: [arr.de.mail],
                        cursorTimer: 500,
                        counter: globalCounter
                    });
                }, globalCounter * 2.5);
                window.setTimeout(function () {
                    $('#mail').typedText({
                        textToType: ['software@daniel-gasser.com'],
                        cursorTimer: 500,
                        counter: globalCounter
                    });
                }, globalCounter * 3);
                window.setTimeout(function () {
                    $('#comm-title').typedText({
                        textToType: ['Communities:'],
                        cursorTimer: 500,
                        counter: globalCounter
                    });
                }, globalCounter * 3.5);
                window.setTimeout(function () {
                    $('#comm').typedText({
                        textToType: ['StackOverflow'],
                        cursorTimer: 500,
                        counter: globalCounter
                    });
                }, globalCounter * 4);
                window.setTimeout(function () {
                    $('#gplus').typedText({
                        textToType: ['Google+'],
                        cursorTimer: 500,
                        counter: globalCounter
                    });
                }, globalCounter * 4.5);
                window.setTimeout(function () {
                    $('#skills').typedText({
                        textToType: ['Skills:'],
                        cursorTimer: 500,
                        counter: globalCounter / 2
                    });
                }, globalCounter * 5);
                window.setTimeout(function () {
                    var data = $.parseJSON(all),
                        he,
                        sk = $('#sk'),
                        hu = sk.height;
                    sk.height(hu + 20);

                    $.each(data, function (i, n) {
                        var selectIt = $('<div>').attr('id', 'skills_' + i),
                            counter = parseInt((globalCounter / 8), 10) * i;
                        selectIt.hide();
                        window.setTimeout(function () {
                            selectIt
                                .appendTo('#list-skills')
                                .typedText({
                                    textToType: [n],
                                    cursorTimer: 250,
                                    counter: 0
                                });
                            hu = sk.height();
                            sk.height(hu + 22);
                            he = $(window).height();
                            $('html, body').animate({ scrollTop: he}, 1000);
                        }, counter);
                        window.setTimeout(function () {
                            selectIt.show();
                        }, counter + 1500);
                    });
                }, globalCounter * 6);
                window.setTimeout(function () {
                    $('#footer').typedText({
                        textToType: ['©by daniel-gasser.com'],
                        cursorTimer: 500,
                        counter: globalCounter * 2
                    });
                    $('#mail').html('<a href="mailto:software@daniel-gasser.com">software@daniel-gasser.com</a>').css('font-size', '14px');
                    $('#comm').html('<a target="_blank" href="http://stackoverflow.com/users/1387233/pc-shooter">StackOverflow</a>').css('font-size', '14px');
                    $('#gplus').html('<a target="_blank" href="https://plus.google.com/+DanielGasserCom/about">Google+</a>').css('font-size', '14px');
                }, globalCounter * 8);
        });
    </script>
</head>
<body>
    <div id="container">
        <?php
        if (!checkOldIE('MSIE 9.0')){
            echo $iEError;
            echo '<pre><h3>Skills:';
            print_r($data);
            echo '</h3></pre>';
            echo '<h3>E-Mail: <a href="mailto:software@daniel-gasser.com">software@daniel-gasser.com</a></h3>';
            exit;
        }

        ?>
        <div id="lang"></div>
        <h1 id="title"></h1>
        <h3 id="title2"></h3>
        <div id="title3"></div>
        <h3 id="mail-title"></h3>
        <div id="mail"></div>
        <h3 id="comm-title"></h3>
        <div id="comm"></div>
        <div id="gplus"></div>
        <div>
            <h2 id="skills"></h2>
            <div id="sk">
                <ul id="list-skills"></ul>
            </div>
        </div>
    </div>
    <div id="footer">

    </div>
</body>
</html>