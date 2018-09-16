<?php

namespace App\Modules\User\Contracts;

use App\Contracts\MainRepositoryInterface;
use Illuminate\Http\Request;

interface UserRepositoryInterface extends MainRepositoryInterface
{
    /**
     * Create User
     * @param $data
     * @return mixed
     */
    public function createUser($data);

    /**
     * @param $data
     * @param $userId
     * @return mixed
     */
    public function updateUser($data, $userId);

    /**
     * @param int $pages
     * @param array $whereArr
     * @return mixed
     */
    public function getUser($pages = 0, $whereArr = []);

    /**
     * @param User $user
     * @return mixed
     */
    public function userDelete($user);

}
