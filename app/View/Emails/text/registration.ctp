<?php
$projecthost  = PROJECTHOST;

echo <<<EOF

Ваш e-mail был использован для регистрации на resp.su.

Для подтверждения регистрации перейдите по ссылке: {$projecthost}users/activation/$code
EOF;
?>
