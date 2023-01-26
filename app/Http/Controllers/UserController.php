<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller{
    private $userRepo;
    public function __construct(UserContract $userRepo){
        $this->userRepo = $userRepo;
    }
    public function index(){
        return view('users.index', ['users' => $this->userRepo->getAll(20)]);
    }
    public function create(){
        return view('users.crud')
            ->with('isEdit',false)
            ->with('userTypes',$this->userRepo->getUserTypes());
    }
    public function store(UserRequest $request){
        $params = $request->only('email','password','user_type_id','name','surname','birthday');
        if ($this->userRepo->store($params))
            return redirect(route('users.create'))->with('status','کاربر جدید ثبت شد.');
        else
            return redirect(route('users.create'))->with('status','کاربر ثبت نشد.');
    }
    public function edit(User $user){
        return view('users.crud')
            ->with('isEdit',true)
            ->with('userTypes',$this->userRepo->getUserTypes())
            ->with('user',$user);
    }
    public function update(UserRequest $request,User $user){
        $params = $request->only('email','user_type_id','name','surname','birthday');
        if ($this->userRepo->update($user,$params))
            return redirect(route('users.edit',$user))->with('status','کاربر بروزرسانی شد');
        else
            return redirect(route('users.edit',$user))->with('status','کاربر بروزرسانی نشد');
    }
    public function delete(User $user){
        $this->userRepo->delete($user);
        return redirect(route('users.index'))->with('status','کاربر حذف شد');
    }
}
