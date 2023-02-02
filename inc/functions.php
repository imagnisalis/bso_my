<?php
function getCurrentUrlInfo(): array
{
    $currentPath = $_SERVER['PHP_SELF'];
    $pathInfo = pathinfo($currentPath);
    $hostName = $_SERVER['HTTP_HOST'];
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';
    return array(
        'path' => $currentPath,
        'pathInfo' => $pathInfo,
        'hostName' => $hostName,
        'protocol' => $protocol
    );
}
