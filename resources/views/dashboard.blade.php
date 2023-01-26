@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('داشبورد')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category">فضا مصرف شده</p>
                        <h3 class="card-title">49/50
                            <small>GB</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-danger">warning</i>
                            <a href="#pablo">فضای بیشتری داشته باشید...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">store</i>
                        </div>
                        <p class="card-category">سود</p>
                        <h3 class="card-title">$34,245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i>۲۴ ساعت اخیر
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <p class="card-category">مشکلات حل شده</p>
                        <h3 class="card-title">75</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> توسط گیت‌هاب
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">دنبال‌کننده</p>
                        <h3 class="card-title">+245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> هم‌اکنون
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-lg-flex">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h3 class="card-title text-center">
                        اطلاعات کاربر
                    </h3>
                </div>
                <div class="card-body py-5 px-5">
                    <div class="d-sm-flex justify-content-between py-4 flex-wrap">
                        <span class="d-flex align-items-center">
                            <h4 class="m-0">
                                نام و نام خانوادگی :
                            </h4>
                            <p class="m-0 p-0 mr-3">
                                {{$user->getName() ?? ''}}
                            </p>
                        </span>
                    </div>
                    <div class="d-sm-flex justify-content-between py-4 flex-wrap">
                         <span class="d-flex align-items-center my-4 my-sm-0">
                            <h4 class="m-0">
                                ایمیل :
                            </h4>
                            <p class="p-0 m-0 mr-3">
                                {{$user->email}}
                            </p>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card mr-lg-4">
                <div class="card-header card-header-primary">
                    <h3 class="card-title text-center">
                        اطلاعات حساب
                    </h3>
                </div>
                <div class="card-body py-5 px-5">
                    <div class="d-sm-flex justify-content-center py-4 mb-3 mb-sm-0">
                        <span class="d-flex align-items-center">
                             <h4 class="m-0">
                                تاریخ تولد :
                            </h4>
                            <p class="m-0 p-0 mr-3">
                                {{$user->profile->birthday ?? ''}}
                            </p>
                        </span>
                    </div>
                    <div class="d-sm-flex justify-content-center py-4 mb-3 mb-sm-0">
                        <span class="d-flex align-items-center">

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
