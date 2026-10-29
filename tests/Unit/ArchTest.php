<?php

declare(strict_types=1);

use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

arch()->preset()->php();
// arch()->preset()->strict();
arch()->preset()->laravel();
arch()->preset()->security();

arch('strict types')
    ->expect('App')
    ->toUseStrictTypes();

arch('every model has a factory')
    ->expect('App')
    ->extending(Model::class)
    ->toUseTrait(HasFactory::class);

arch('services are not used')
    ->expect('App\Services')
    ->not->toBeUsed();

arch('controllers')
    ->expect('App\Http\Controllers')
    ->not->toBeUsed();

arch('controllers do not validate inline')
    ->expect('App\Http\Controllers')
    ->not->toUse([
        Request::class,
        Validator::class,
        'request',
        'validator',
    ]);

arch('controllers do not use the DB facade')
    ->expect('App\Http\Controllers')
    ->not->toUse(DB::class);

arch('form requests do not use the DB facade')
    ->expect('App\Http\Requests')
    ->not->toUse(DB::class);

arch('form requests do not inject current user')
    ->expect('App\Http\Requests')
    ->not->toUse(CurrentUser::class);

arch('form requests do not use actions')
    ->expect('App\Http\Requests')
    ->not->toUse('App\Actions');

arch('actions')
    ->expect('App\Actions')
    ->toBeReadonly()
    ->toHaveMethod('handle')
    ->ignoring('App\Actions\Fortify')
    ->not->toHaveSuffix('Action');

arch('actions do not use request or controllers')
    ->expect('App\Actions')
    ->not->toUse([
        HttpRequest::class,
        'App\Http\Controllers',
        'request',
    ]);

arch('queries')
    ->expect('App\Queries')
    ->toBeReadonly()
    ->toHaveMethod('get')
    ->not->toHaveSuffix('Query');

arch('policies do not use the DB facade')
    ->expect('App\Policies')
    ->not->toUse(DB::class);

arch('notifications are queued')
    ->expect('App\Notifications')
    ->toImplement(ShouldQueue::class);
