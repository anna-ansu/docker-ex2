<?php

return [
    '~^hello/(.*)$~' => [\Examples\Controllers\MainController::class, 'sayHello'],
    '~^$~' => [\Examples\Controllers\MainController::class, 'main'],
];
