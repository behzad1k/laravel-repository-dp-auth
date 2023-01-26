@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' =>
'login', 'title' => __('Life And Me ')]) @section('content')

    <div class="container">
        <div class="card perspective md-row">
            <div class="card-header card-header-primary text-center">
                    <h4 class="card-title">
                      Life And Me
                    </h4>
            </div>
            <div class="d-flex flex-row">
              <div class="card right-card m-0 p-lg-5 py-5 px-0 col-md-6">
                  <div class="container">
                      <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-login-tab" data-bs-toggle="tab" data-bs-target="#nav-login"
                              role="tab" aria-controls="nav-login" aria-selected="true">
                              ورود
                          </button>
                          <button class="nav-link" id="nav-signup-tab" data-bs-toggle="tab" data-bs-target="#nav-signup"
                              role="tab" aria-controls="nav-signup" aria-selected="false">
                              ثبت نام
                          </button>
                      </div>
                      <div class="tab-content p-lg-5 py-5 px-2" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-login" role="tabpanel"
                              aria-labelledby="nav-login-tab">
                              <form method="POST" action="{{ route('login') }}">
                                  @csrf
                                  <div class="mb-4">
                                      <label for="email" class="form-label float-right">ایمیل</label>
                                      <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                          <div class="input-group">
                                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                                              <input type="text" class="form-control" id="email"
                                                  aria-describedby="enterEmail" placeholder="ایمیل" name="email" />
                                          </div>
                                      </div>
                                      @if ($errors->has('email'))
                                          <div class="error text-danger pl-3" for="email" style="display: block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </div>
                                      @endif
                                  </div>
                                  <div class="mb-4">
                                      <label for="password" class="form-label float-right">رمز ورود</label>
                                      <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                          <div class="input-group">
                                              <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                              <input type="password" class="form-control" id="password"
                                                  aria-describedby="enterPassword" placeholder="رمز ورود" name="password" />
                                          </div>
                                          @if ($errors->has('password'))
                                              <div class="error text-danger pl-3" for="password" style="display: block">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                              </div>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="mb-4 form-check d-flex flex-row align-items-center">
                                      <label for="remember-me" class="form-check-label"><input type="checkbox"
                                              class="form-check-input" id="remember-me" style="margin-left: 6px" />مرا به خاطر
                                          بسپار</label>
                                  </div>
                                  <button class="btn btn-primary float-right my-3">
                                      ورود
                                  </button>
                              </form>
                          </div>
                          <div onload="getInfo()" class="tab-pane fade" id="nav-signup" role="tabpanel" aria-labelledby="nav-tab-signup">
                              <form method="POST" action="{{ route('register') }}">
                                  @csrf
                                  <div class="mb-4">
                                      <label for="firstlastname" class="form-label float-right">نام و نام خانوادگی</label>
                                      <div class="input-group">
                                          <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                          <input type="text" class="form-control" aria-label="First Name" placeholder="نام" name="name" />
                                          <input type="text" class="form-control" aria-label="Last Name"
                                              placeholder="نام خانوادگی" name='surname' />
                                      </div>
                                  </div>
                                  <div class="mb-4">
                                      <label for="social_id" class="form-label float-right">کد ملی</label>
                                      <div class="bmd-form-group{{ $errors->has('social_id') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                                            <input type="text" class="form-control" aria-label="Social ID"
                                                placeholder="کد ملی" name="social_id" />
                                        </div>
                                        @if ($errors->has('social_id'))
                                          <div id="name-error" class="error text-danger pl-3" for="social_id" style="display: block;">
                                            <strong>{{ $errors->first('social_id') }}</strong>
                                          </div>
                                        @endif
                                      </div>
                                  </div>
                                  <div class="mb-4">
                                      <label for="phone_number" class="form-label float-right">تلفن همراه</label>
                                      <div class="bmd-form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-phone-square"></i></span>
                                            <input id="phone_number" type="phone_number" class="form-control" placeholder="تلفن همراه" name="phone_number" />
                                        </div>
                                        @if ($errors->has('phone_number'))
                                          <div id="name-error" class="error text-danger pl-3" for="phone_number" style="display: block;">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                          </div>
                                        @endif
                                      </div>
                                  </div>
                                  <div class="mb-4">
                                      <label for="email" class="form-label float-right">ایمیل</label>
                                      <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <div class="input-group">
                                            <i class="material-icons input-group-text">email</i>
                                            <input type="email" class="form-control" placeholder="ایمیل" name="email" />
                                        </div>
                                        @if ($errors->has('email'))
                                          <div id="name-error" class="error text-danger pl-3" for="email" style="display: block;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                          </div>
                                        @endif
                                      </div>
                                  </div>
                                  <div class="mb-4">
                                      <label for="password" class="form-label float-right">کلمه عبور</label>
                                      <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                          <div class="input-group">
                                              <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                              <input type="password" class="form-control" id="password"
                                                     aria-describedby="enterPassword" placeholder="کلمه عبور" name="password" />
                                          </div>
                                          @if ($errors->has('password'))
                                              <div class="error text-danger pl-3" for="password" style="display: block">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                              </div>
                                          @endif
                                      </div>
                                  </div>

                                  <button id="registerButton" class="btn btn-primary float-right my-3">
                                      ثبت نام
                                  </button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card col-6 left-card m-0 d-none d-md-flex">
                  <div class="card-body d-flex align-items-center">
                      <img src="{{ asset('material') }}/img/bg1.webp" alt="this is a background for customer club"
                          class="image-fluid w-100" />
                  </div>
              </div>
            </div>
        </div>
    </div>
   <script>
       {{--var info;--}}
       {{--$(function(){--}}
       {{--    $('div[onload]').trigger('onload');--}}
       {{--});--}}
       {{--function getInfo(){--}}
       {{--    $.ajaxSetup({--}}
       {{--        headers: {--}}
       {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
       {{--        }--}}
       {{--    });--}}
       {{--    jQuery.ajax({--}}
       {{--        url: "{{ url('/passGen') }}",--}}
       {{--        method: 'get',--}}
       {{--        success: function(result){--}}
       {{--            info = result;--}}
       {{--        }});--}}
       {{--}--}}
       {{--jQuery(document).ready(function(){--}}
       {{--    jQuery('#registerButton').click(function(e){--}}
       {{--        e.preventDefault();--}}
       {{--        phoneNumber = document.getElementById('phone_number').value;--}}
       {{--        $.ajaxSetup({--}}
       {{--            headers: {--}}
       {{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
       {{--            }--}}
       {{--        });--}}
       {{--        jQuery.ajax({--}}
       {{--            url: "{{  }}",--}}
       {{--            method: 'get',--}}
       {{--            success: function(result){--}}

       {{--            }--}}
       {{--        });--}}
       {{--    });--}}
       // });
   </script>
@endsection
