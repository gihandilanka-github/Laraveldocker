<?php

namespace App\Modules\User\Repositories;

use App\Modules\User\Contracts\UserRepositoryInterface;
use App\Repositories\MainRepository;
use App\User;
use Illuminate\Contracts\Container\Container as App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserRepository extends MainRepository implements UserRepositoryInterface
{
    protected $userModel;

    public function __construct(App $app, User $user)
    {
        parent::__construct($app);
        $this->userModel = $user;
    }

    function model()
    {
        return 'App\User';
    }

    public function createUser($request) {
        $userData = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt('password'),
        ];

        return $this->userModel->create($userData);
    }

    public function getUser($pages = 0, $whereArr = []) {
        $users = $this->userModel->where($whereArr);
        if($pages) {
            $users = $users->paginate($pages);
        }else {
            if(array_key_exists('id', $whereArr)) {
                $users = $users->first();
            }else {
                $users = $users->get();
            }
        }

        return $users;
    }

    public function updateUser($data, $userId) {
        return $this->update($data, $userId);
    }

    public function userDelete($user)
    {
        return $user->delete();
    }

}