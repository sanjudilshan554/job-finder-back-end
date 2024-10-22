<?php

namespace App\Http\Controllers;

use App\Models\User;
use domain\Facade\PermissionFacade\PermissionFacade;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    // use FormHelper;

    /**
     * groups
     *
     * @return void
     */
    public function groups()
    {
        return PermissionFacade::groups();
    }

    /**
     * allList
     *
     * @return void
     */
    public function allList()
    {
        return PermissionFacade::allList();
    }

    /**
     * userPermissionsList
     *
     * @param  int $user_id
     * @return void
     */
    public function userPermissionsList($user_id)
{
    // Find the user by ID
    $user = User::find($user_id);

    // Check if the user exists
    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    // Get all permissions for the user and return them
    return $user->getAllPermissions()->pluck('name');
}


    /**
     * updatePermissions
     *
     * @param  Request $request
     * @param  int $user_id
     * @return void
     */
    public function updatePermissions(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user->syncPermissions($request->permissions);
        return response()->json(['status' => 'success']);
    }

    /**
     * print
     *
     * @param  mixed $userData
     * @return void
     */
    public function print(Request $userData)
    {
        // $user = Auth::user();
        // $response['printed_by'] = $user->name;
        // $response['user'] = $userData;
        // $user = User::find($userData->id);
        // $response['tc'] =  $this;
        // $response['user'] =  $user;
        // $response['permissions'] =  PermissionFacade::allList();
        // $response['groups'] = PermissionFacade::groups();
        // $pdf = PDF::loadView('print.pages.permission', $response);
        // return $pdf->stream('Permission.pdf', ['Attachment' => false]);
    }
}
