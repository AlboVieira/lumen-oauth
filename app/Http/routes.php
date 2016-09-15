<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->group(['middleware' => 'cors' ], function($app){

    $app->post('login', function() use($app) {
        $credentials = app()->make('request')->input("credentials");
        return $app->make('App\Auth\Proxy')->attemptLogin($credentials);
    });

});


$app->group(['middleware' => ['auth','cors' ] ], function($app)
{

    $app->get('/test', function() {
        return response()->json([
            "id" => 1,
            "name" => "A resource"
        ]);
    });
});




/*$app->group(['middleware' => 'auth'], function () use ($app) {

    $app->post('oauth/access-token', function() use($app) {
        return response()->json($app->make('oauth2-server.authorizer')->issueAccessToken());
    });

    /*$app->get('/', function ()    {
        dd('t');
        // Uses Auth Middleware
    });

    $app->get('user/profile', function () {
        // Uses Auth Middleware
    });
});*/


/*$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/test', function () use ($app) {
    return ['test' => true];
});
*/

/*
$app->get('/test', function () use ($app) {
    return $app->version();
});

*/