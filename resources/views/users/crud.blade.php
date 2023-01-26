@extends('layouts.app', ['activePage' => 'userCreate', 'titlePage' => __('کاربران')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{$isEdit ? route('users.update',$user) : route('users.store') }}" autocomplete="off" class="form-horizontal" id="new-user">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title text-center">{{$isEdit ? __('ویرایش کابر') :  __('افزودن کابر')}}</h4>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row mb-3 mt-5 justify-content-center">
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <div class="input-group">
                                                <i class="material-icons input-group-text">person</i>
                                                <div class="form-control p-0 input-shade">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} input-lg" name="name" id="input-name" type="text" placeholder="{{ __('نام') }}" required="true" value="{{$user->profile->name ?? ''}}" aria-required="true"/>
                                                </div>
                                            </div>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-5 justify-content-center">
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('surname') ? ' has-danger' : '' }}">
                                            <div class="input-group">
                                                <i class="material-icons input-group-text">badge</i>
                                                <div class="form-control p-0 input-shade">
                                                    <input class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }} input-lg" name="surname" id="input-name" type="text" placeholder="{{ __('نام خانوادگی') }}" value="{{$user->profile->surname ?? ''}}" required="true" aria-required="true"/>
                                                </div>
                                            </div>
                                            @if ($errors->has('surname'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('surname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-5 justify-content-center">
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <div class="input-group">
                                                <i class="material-icons input-group-text">email</i>
                                                <div class="form-control p-0 input-shade">
                                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input-lg" name="email" id="input-email" type="email" placeholder="{{ __('ایمیل') }}" value="{{$user->email ?? ''}}" required />
                                                </div>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                    @if(!$isEdit)
                                        <div class="row mb-3 mt-5 justify-content-center">
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                                    <div class="input-group">
                                                        <i class="material-icons input-group-text">key</i>
                                                        <div class="form-control p-0 input-shade">
                                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input-lg" name="password" id="input-name" type="password" placeholder="{{ __('کلمه عبور') }}" required="true" aria-required="true"/>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('password'))
                                                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row mb-3 mt-5 justify-content-center">
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('user_type_id') ? ' has-danger' : '' }}">
                                                <div class="input-group">
                                                    <p class="input-group-text">نقش کاربر</p>
                                                    <select class="form-select" id="cars" name="user_type_id" form="new-user">
                                                        @if($isEdit)
                                                            @foreach($userTypes as $userType)
                                                              <option value="{{$userType->id}}" {{$user->user_type_id == $userType->id}}>{{$userType->title}}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach($userTypes as $userType)
                                                              <option value="{{$userType->id}}" >{{$userType->title}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                @if ($errors->has('user_type_id'))
                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('user_type_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3 justify-content-center">
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('birthday') ? ' has-danger' : '' }}">
                                                <label for="input-bday" class="form-label">تاریخ تولد</label>
                                                <div class="input-group">
                                                    <i class="material-icons input-group-text">event</i>
                                                    <div class="form-control p-0 input-shade">
                                                        <input class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }} input-lg example1" name="birthday" id="input-bday" type="text" placeholder="{{ __('تاریخ تولد') }}" value="{{ old('birthday', isset($user->profile->birthday) ? jalali_to_gregorian(explode('-',$user->profile->birthday)[0],explode('-',$user->profile->birthday)[1],explode('-',$user->profile->birthday)[2]) : '')}}" required="true" aria-required="true"/>
                                                    </div>
                                                </div>
                                                @if ($errors->has('birthday'))
                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('birthday') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('ثبت') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
