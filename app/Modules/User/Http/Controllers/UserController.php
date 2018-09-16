<?php

namespace App\Modules\User\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\User\Contracts\UserRepositoryInterface;
use App\User;

class UserController extends Controller
{
    /**
     *
     * @return mixed
     */
    protected $userRepo;

    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepo
     */
    public function __construct(UserRepositoryInterface $userRepo)
    {
        parent::__construct();
        $this->userRepo = $userRepo;
    }
    public function index()
    {
        try {
            $data['metaTitle'] = 'User';
            $users = $this->userRepo->getUser(env('ADMIN_PAGINATE_COUNT'));
            return view('user::index', compact('users'), $data);
        }catch (Exception $e){
            abort(500);
            error_log("Error Thrown".$e->getMessage());
        }
    }

    public function create()
    {
        $data['metaTitle'] = 'User Create';
        return view('user::create', $data);
    }

    public function store()
    {
        $validatedData = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        try {
            $created = $this->userRepo->createUser($validatedData);
            if($created) {
                return redirect()->route('admin.user.index')
                    ->with('message', "The '".$created->name."' user has been created.");
            }else {
                return false;
            }
        }catch (Exception $e){
            abort(500);
            error_log("Error Thrown".$e->getMessage());
        }
    }

    public function edit(User $user)
    {
        $data['metaTitle'] = 'User Edit';
        return view('user::edit', compact('user'), $data);
    }

    public function update(User $user)
    {
        $validatedData = request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        try {
            $updated = $this->userRepo->updateUser($validatedData, $user->id);
            if($updated) {
                return redirect()->route('admin.user.index')
                    ->with('message', "The '".$user->name."' user has been updated.");
            }else {
                return false;
            }
        }catch (Exception $e){
            abort(500);
            error_log("Error Thrown".$e->getMessage());
        }

    }

    public function destroy(User $user)
    {
        try {
            $deleted = $this->userRepo->userDelete($user);
            if($deleted) {
                return redirect()->route('admin.user.index')
                    ->with('message', "The '".$user->name."' user has been deleted.");
            }else {
                return false;
            }
        }catch (Exception $e){
            abort(500);
            error_log("Error Thrown".$e->getMessage());
        }

    }
}
