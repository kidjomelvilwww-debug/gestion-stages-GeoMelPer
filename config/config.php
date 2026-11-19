<?php
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $l) {
        if ($l === '' || $l[0] === '#') continue;
        [$k, $v] = explode('=', $l, 2);
        $_ENV[trim($k)] = trim($v, " \"'");
    }
}