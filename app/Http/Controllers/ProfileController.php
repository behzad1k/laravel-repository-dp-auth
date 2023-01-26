<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\SupplementaryRequest;
use App\Models\CreditCard;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        try {
            $profilePhotoName = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->move(public_path('/images/profile_photos'), $profilePhotoName);
            $idCardPhotoName = time() . '.' . $request->id_card_photo->extension();
            $request->id_card_photo->move(public_path('/images/id_card_photos'), $idCardPhotoName);
        }catch (Exception $e){

    }
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }

    public function supplementaryInfo(){
        return view('profile.supplementary_info');
    }

    public function supplementaryInfoUpdate(SupplementaryRequest $request){
        $profilePhotoName = time().'.'.$request->profile_photo->extension();
        $request->profile_photo->move(public_path('/images/profile_photos'), $profilePhotoName);
        $idCardPhotoName = time().'.'.$request->id_card_photo->extension();
        $request->id_card_photo->move(public_path('/images/id_card_photos'), $idCardPhotoName);
        $params = $request->toArray();
        $params['profile_photo'] = $profilePhotoName;
        $params['id_card_photo'] = $idCardPhotoName;
        $params['active'] = 1;
        $cardParams = array_intersect_key($params,array('card_number'=>'','account_number'=>''));
        $cardParams['user_id'] = auth()->id();
        CreditCard::create($cardParams);
        auth()->user()->update($params);
        return redirect(route('home'));
    }
}
