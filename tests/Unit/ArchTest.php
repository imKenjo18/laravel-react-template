<?php

declare(strict_types=1);

arch()->preset()->php();
// arch()->preset()->strict();
arch()->preset()->laravel();
arch()->preset()->security();

arch('globals')
    ->expect('App')
    ->toUseStrictTypes()
    ->not->toUse(['dd', 'dump', 'die']);
