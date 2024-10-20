<?php

namespace domain\Service\UserService;

use App\Models\User;
use domain\Facades\UserFacade\UserFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * User Service
 * php version 8
 *
 * @category Service
 * @author   CyberElysium <contact@cyberelysium.com>
 * @license  https://cyberelysium.com Config
 * @link     https://cyberelysium.com
 * */
class UserService
{
    protected $users;

    public function __construct()
    {
        $this->users = new User();
    }

    /**
     * Get
     * retrieve relevant data using user_id
     *
     * @param  int  $user_id
     * @return void
     */
    public function get(int $user_id)
    {
        return $this->users->find($user_id);
    }

    /**
     * getWithTrashed
     *
     * @param  mixed $user_id
     * @return void
     */
    public function getWithTrashed(int $user_id)
    {
        return $this->users->withTrashed()->find($user_id);
    }

    /**
     * getByEmail
     *
     * @param  mixed $email
     * @return void
     */
    public function getByEmail(string $email)
    {
        return $this->users->getByEmail($email);
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->users->all();
    }

    /**
     * allUsers
     *
     * @return void
     */
    public function allUsers()
    {
        return $this->users
            ->orderBy('name', 'asc')
            ->get();
    }


    /**
     * find
     *
     * @param  int $user_id
     * @return void
     */
    public function find(int $user_id)
    {
        return $this->users->find($user_id);
    }

    /**
     * Update
     * update existing data using user_id
     *
     * @param  array $data
     * @param  int   $user_id
     * @return void
     */
    public function update($data, $user_id)
    {
        $user = $this->users->where('id', $user_id)->first();

        // if (Auth::user()->id == $user_id) {
            // if (isset($data['password'])) {
            //     $data['password'] = bcrypt($data['password']);
            // }
        // } else {
            // if (isset($data['password'])) {
            //     $data['password'] = bcrypt($data['password']);
            // }
            $user->update($this->edit($user, $data));
            return "success";
        // }
    }

    /**
     * profileUpdate
     *
     * @param  mixed $data
     * @param  mixed $user_id
     * @return void
     */
    public function profileUpdate($data, $user_id)
    {
        $user = $this->users->find($user_id);
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
            $user->password = $data['password'];
        }
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
        return "success";
    }

    /**
     * Edit
     * merge data which retrieved from update function as an array
     *
     * @param  selyn $user
     * @param  array    $data
     * @return void
     */
    protected function edit(User $user, array $data)
    {
        return array_merge($user->toArray(), $data);
    }

    /**
     * make
     *
     * @param  array $data
     * @return void
     */
    public function store(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }


    /**
     * update Password
     *
     * @param  array $data
     * @return void
     */
    public function updatePassword(array $data, int $user_id)
    {
        $user = $this->users->withTrashed()->find($user_id);
        $user->password = bcrypt($data['password']);
        return $user->update();
    }

    /**
     * delete
     *
     * @param  int $user_id
     * @return void
     */
    public function delete(int $user_id)
    {
        $users = $this->users->find($user_id);

        $users->delete();
        return "success";
    }

    /**
     * restore
     *
     * @param  int $user_id
     * @return void
     */
    public function restore(int $user_id)
    {
        $users = $this->users->withTrashed()->find($user_id);
        $users->restore();
    }

    /**
     * retrieveHost
     *
     * @return void
     */
    public function retrieveHost()
    {
        return Auth::user();
    }
}
