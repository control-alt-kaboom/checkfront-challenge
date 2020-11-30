<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use App\Http\Controllers\MemberController;
use App\Models\Member;
use App\Http\Resources\  {MemberResource, ModelCollection};
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/api/members', function () {
    $data = MemberResource::collection(Member::all());
    return [
        'code' => Response::HTTP_OK,
        'meta' => [
            'count' => $data->count()
        ],
        'data' => $data
    ];
});

$router->get('/api/members-activated/{period}', function (\Illuminate\Http\Request $request) {
    $period = $request->period;

    $results = DB::select(
        "SELECT members.user_id, members.signup_date FROM members WHERE user_id IN
        (
            SELECT
                m.user_id AS user_id
            FROM activity AS a
            LEFT JOIN members AS m USING(user_id)
            WHERE
                a.act_type='Select_Category'
            AND DATEDIFF(a.act_timestamp, m.signup_date) <= :p1
        ) AND user_id IN (
            SELECT
                m.user_id AS user_id
            FROM activity AS a
            LEFT JOIN members AS m USING(user_id)
            WHERE
                a.act_type='Add_Flavour'
            AND DATEDIFF(a.act_timestamp, m.signup_date) <= :p2
        )", ['p1' => $period,'p2' => $period] );


    return [
        'code' => Response::HTTP_OK,
        'meta' => [
            'count' => (is_array($results)) ? count($results) : 0,
            'period' => (integer) $period
        ],
        'data' => $results
    ];
});

$router->get('/api/member/{id}', function (\Illuminate\Http\Request $request) {
    $data = Member::find($request->id);

    return [
        'code' => Response::HTTP_OK,
        'meta' => [
            'count' => 1
        ],
        'data' => $data
    ];
});
