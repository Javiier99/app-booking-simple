<?php
function cargarEnv(string $ruta): void
{
    if (!is_readable($ruta)) return;

    foreach (file($ruta, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $linea) {
        $linea = trim($linea);
        if ($linea === '' || $linea[0] === '#' || strpos($linea, '=') === false) continue;

        [$clave, $valor] = explode('=', $linea, 2);
        $clave = trim($clave);
        $valor = trim($valor);

        $q = $valor[0] ?? '';
        if (($q === '"' || $q === "'") && substr($valor, -1) === $q && strlen($valor) >= 2) {
            $valor = substr($valor, 1, -1);
        }

        $_ENV[$clave] = $valor;
    }
}

function env(string $clave, ?string $porDefecto = null): ?string
{
    return $_ENV[$clave] ?? $porDefecto;
}

cargarEnv(dirname(__DIR__) . '/.env');