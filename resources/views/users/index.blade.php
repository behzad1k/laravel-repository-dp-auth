@extends('layouts.app', ['activePage' => 'userList', 'titlePage' => __('لیست کاربران')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title ">کاربران</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{route('users.create')}}" class="btn btn-sm btn-primary">افزودن</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th class="text-center">
                                            نام
                                        </th>
                                        <th class="text-center">
                                            ایمیل
                                        </th>
                                        <th class="text-center">
                                            نقش کاربر
                                        </th>
                                        <th class="text-center">
                                            تاریخ تولد
                                        </th>
                                        <th class="text-center">
                                            تنظیمات
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="text-center">
                                                {{$user->getName()}}
                                            </td>
                                            <td class="text-center">
                                                {{$user->email}}
                                            </td>
                                            <td class="text-center">
                                                {{$user->userType->title}}
                                            </td>
                                            <td class="text-center">
                                                {{$user->profile->birthday ?? ''}}
                                            </td>
                                            <td class="td-actions text-center text-nowrap">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{route('users.edit',$user['id'])}}" data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <a rel="tooltip" class="btn btn-success btn-link" onclick="confirm('کاربر حذف شود؟')" href="{{route('users.delete',$user['id'])}}" data-original-title="" title="">
                                                    <i class="material-icons">delete</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
