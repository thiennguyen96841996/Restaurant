<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersEditFormRequest;
use App\Http\Requests\UsersAddFormRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepositoryInterface;
use App\User;
use Auth;

class UsersController extends Controller
{
     /**
     * @var PostRepositoryInterface|\App\Repositories\RepositoryInterface
     */
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->getUser();

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersAddFormRequest $request)
    {
        $users = new User();
        $password = bcrypt(config('app.password'));
        $avatar = config('app.imgdefault');
        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'avatar' => $avatar,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'role' => $request->role,
        ];
        $this->userRepository->create($data);
       
        return redirect()->route('users.index')->with('status', __('created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UsersEditFormRequest $request)
    {
        // $user = new User();
        $user = $this->userRepository->find($id);
        $password = $request->get('password');
        if($password != '') {
            $password = Hash::make($password);
        } else {
            $password = $user->password;
        }
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $password,
            'phone' => $request->get('phone'),
            'sex' => $request->get('sex'),
            'role' => $request->get('role'),
            'address' => $request->get('address'),
        ];
        $this->userRepository->update($id, $data);

        return redirect()->route('users.index')->with('status', __('updated'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = $this->userRepository->find($id);
        $users->delete();

        return redirect()->route('users.index')->with('status', __('deleted'));
    }
}
