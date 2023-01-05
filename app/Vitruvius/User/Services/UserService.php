<?php
namespace Vitruvius\User\Services;

use App\Models\User;
use Vitruvius\User\Requests\UserRequest;
use Vitruvius\User\Repository\UserRepository;

class UserService
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->userRepository->all();
    }
    public function find($id)
    {
        return $this->userRepository->find($id);
    }
    public function create(UserRequest $request)
    {

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->national_id = $request->national_id;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return $user;

    }
    public function edit(User $user)
    {
        return $this->userRepository->find($user);
        // return "No";
    }

    public function update(UserRequest $request , User $model)
    {
        $user = $this->userRepository->find($model);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->national_id = $request->national_id;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return $user;
    }

}
