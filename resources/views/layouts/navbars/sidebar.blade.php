<div class="sidebar" data-color="orange">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="https://creative-tim.com/" class="simple-text logo-normal">
            {{__('شرکت لایف اند می')}}
        </a>
        <div class="user-profile-container">
            <img src="{{ asset('images') }}/profile_photos/{{$logged_in_user['profile_photo'] ?? ''}}" alt="user profile picture">
        </div>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
                <li class="nav-item {{ $activePage == 'dashboard' ? ' active' : '' }}">
                    <a class="nav-link my-nav-link" href="{{ route('home') }}">
                        <i class="material-icons">dashboard</i>
                        <p>{{ __('داشبورد') }}</p>
                    </a>
                </li>
                @if($logged_in_user->isAdmin())
                    <li class="nav-item {{ ($activePage == 'userList' || $activePage == 'userCreate') ? ' active' : '' }}">
                        <a class="nav-link my-nav-link" data-toggle="collapse" href="#user-management" aria-expanded="false" id="user">
                            <i class="material-icons">people</i>
                            <p>{{ __('کاربران') }}
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="user-management">
                            <ul class="nav">
                                <li class="nav-item{{ $activePage == 'userList' ? ' active' : '' }}">
                                    <a class="nav-link  my-nav-link" href="{{ route('users.index') }}">
                                        <i class="material-icons">list_alt</i>
                                        <span class="sidebar-normal">{{ __('لیست کاربران') }} </span>
                                    </a>
                                </li>
                                <li class="nav-item{{ $activePage == 'userCreate' ? ' active' : '' }}">
                                    <a class="nav-link  my-nav-link" href="{{ route('users.create') }}">
                                        <i class="material-icons">person_add</i>
                                        <span class="sidebar-normal">{{ __('افزودن کاربر') }} </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
        </ul>
    </div>
</div>
<script>
    function activePage(activePage) {
        let id = activePage.split(/(?=[A-Z])/)[0];
        let sidebarElem = document.getElementById(id)
        if (sidebarElem) {
            sidebarElem.setAttribute('aria-expanded', 'true');
            sidebarElem.nextElementSibling.classList.add('show');
        }
    }
    activePage('{{$activePage}}');
</script>
