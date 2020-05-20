<?php

function setInternalServerError ($errno, $errstr, $errline, $errfile) {
    http_response_code(500);

    echo "<h1>Error</h1>";

    if (!DEBUB) {
        exit;
    }

    switch ($errno) {
        case E_USER_ERROR:
            echo "<strong>ERROR</stron> [{$errno}], [{$errstr}]";
            echo "Fatal error on line {$errline}, in file {$errfile}";
            break;

        case E_USER_WARNING:
            echo "<strong>WARNING</stron> [{$errno}], [{$errstr}]";
            break;

        case E_USER_NOTICE:
            echo "<strong>NOTICE</stron> [{$errno}], [{$errstr}]";
            break;

        default:
            echo "<strong>Unknow error type: </stron> [{$errno}], [{$errstr}]";
    }
    exit;
}

set_error_handler('setInternalServerError');
set_error_handler('setInternalServerError');