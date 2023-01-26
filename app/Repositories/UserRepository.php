<?php


namespace App\Repositories;
use App\Contracts\ProfileContract;
use App\Models\User;
use App\Contracts\UserContract;
use App\Models\UserType;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserContract
{
    protected $profileRepo;
    public function __construct(User $model, ProfileContract $profileRepo){
        parent::__construct($model);
        $this->profileRepo = $profileRepo;
    }
    public function getUserTypes(){
        return UserType::all();
    }
    /*
     * Overriding parent's store method
     */
    public function store($data)
    {
        $data['password'] = Hash::make($data['password']);
        $newUser = parent::store(array_intersect_key($data,array_flip(['email', 'password', 'user_type_id'])));
        $data['user_id'] = $newUser->id;
        $this->profileRepo->store(array_intersect_key($data,array_flip(['birthday', 'name', 'surname', 'user_id'])));
        return $newUser;
    }
    /*
     * Overriding parent's update method
     */
    public function update($object, $data)
    {
        $data['birthday'] = faDateToEng($data['birthday']);
        $data['user_id'] = $object->id;
        $this->profileRepo->update($object->profile,array_intersect_key($data,array_flip(['birthday', 'name', 'surname', 'user_id'])));
        return parent::update($object,array_intersect_key($data,array_flip(['email', 'user_type_id'])));
    }
}
