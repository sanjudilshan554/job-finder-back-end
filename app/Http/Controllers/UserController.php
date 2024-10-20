<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Resources\DataResource;
use App\Models\User; 
use domain\Facade\UserFacade\UserFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // if (Auth::user()->can('view_users')) {
        //     return Inertia::render('User/index');
        // } else {
        //     $response['alert-danger'] = 'You do not have permission to view the Users.';
        //     return redirect()->route('dashboard')->with($response);
        // }
    }

    /**
     * all
     *
     * @return void
     */
    public function all(Request $request)
    {
        $query = User::query()->orderBy('id', 'desc');
        if (isset($request->search_status)) {
            if ($request->search_status == 2) {
                $query->where('deleted_at', '!=', null);
            } else if ($request->search_status == 1) {
                $query->where('deleted_at', null);
            }
        }
        $payload = QueryBuilder::for($query)
            ->allowedSorts(['id'])
            ->allowedFilters(
                AllowedFilter::callback('search', function ($query, $value) {
                    $query->where('name', 'like', "%{$value}%");
                })
            )
            ->paginate(request('per_page', config('basic.pagination_per_page')));
        return DataResource::collection($payload);
    }

    /**
     * allUsers
     *
     * @return void
     */
    public function allUsers()
    {
        return UserFacade::allUsers();
    }

    /**
     * allAdmins
     *
     * @return void
     */
    public function allAdmins()
    {
        return UserFacade::allAdmins();
    }

    /**
     * store
     *
     * @param  CreateUserRequest $request
     * @return void
     */
    public function store(CreateUserRequest $request)
    {
        // if (Auth::user()->can('create_users')) {
            return UserFacade::store($request->all());
        // } else {
        //     $response['alert-danger'] = 'You do not have permission to create Users.';
        //     return redirect()->route('dashboard')->with($response);
        // }
    }

    /**
     * delete
     *
     * @param  int $user_id
     * @return void
     */
    public function delete(int $user_id)
    {
        // if (Auth::user()->can('delete_users')) {
        //     if (Auth::user()->id == $user_id) {
        //         return "The admin who is logged into the system cannot delete his account.";
        //     } else {
                return UserFacade::delete($user_id);
        //     }
        // } else {
        //     $response['alert-danger'] = 'You do not have permission to delete Users.';
        //     return redirect()->route('dashboard')->with($response);
        // }
    }

    /**
     * restore
     *
     * @param  int $user_id
     * @return void
     */
    public function restore(int $user_id)
    {
        if (Auth::user()->can('restore_users')) {
            return UserFacade::restore($user_id);
        } else {
            $response['alert-danger'] = 'You do not have permission to restore Users.';
            return redirect()->route('dashboard')->with($response);
        }
    }

    /**
     * update
     *
     * @param  UpdateUserRequest $request
     * @param  int $user_id
     * @return void
     */
    public function update(UpdateUserRequest $request, int $user_id)
    {
        return UserFacade::update($request->all(), $user_id);
    }

    /**
     * get
     *
     * @param  int $user_id
     * @return void
     */
    public function get(int $user_id)
    {

        $payload = UserFacade::get($user_id);
        return new DataResource($payload);
    }

    /**
     * loadUser
     *
     * @param  mixed $user_id
     * @return void
     */
    public function loadUser(int $user_id)
    {
        if (Auth::user()->can('update_users')) {
            $response = UserFacade::get($user_id);
            return Inertia::render('User/permissions', ['user' => $response]);
        } else {
            $response['alert-danger'] = 'You do not have permission to update Users.';
            return redirect()->route('dashboard')->with($response);
        }
    }

    /**
     * roles
     *
     * @return void
     */
    public function roles(int $user_id)
    {

        $payload = UserFacade::get($user_id);
        return new DataResource($payload);
    }
}
