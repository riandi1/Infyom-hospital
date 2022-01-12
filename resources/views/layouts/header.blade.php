<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/') }}" data-toggle="tooltip" data-placement="right"
       title="{{ getAppName() }}">
        <img class="navbar-brand-full" src="{{getLogoUrl()}}" width="50px"
             alt="">&nbsp;<span class="navbar-brand-full-name">{{ getAppName() }}</span>
        <img class="navbar-brand-minimized" src="{{getLogoUrl()}}" width="50px"
             alt="">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
        @php
            $notifications = getNotification(Auth::user()->roles->pluck('name')->first());
            $notificationCount = count($notifications);
        @endphp
        <li class="nav-item dropdown header-navbar">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle open nav-link-lg"><i
                        class="far fa-bell"></i>
                @if(count(getNotification(Auth::user()->roles->pluck('name')->first())) != 0)
                    <span class="badge badge-warning navbar-badge bg-primary notification-count"
                          id="counter">{{ count(getNotification(Auth::user()->roles->pluck('name')->first())) }}</span>
                @else
                    <span class="badge bg-primary" id="counter"></span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right ml-4 dropdown-menu-width" id="dropdown">
                <div class="dropdown-header">{{ __('messages.notification.notifications') }}
                    <div class="float-right">
                        @if($notificationCount > 0)
                            <a href="#"
                               class="read-all-notification"
                               id="readAllNotification">{{ __('messages.notification.mark_all_as_read') }}</a>
                        @endif
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons force-scroll">
                    @if($notificationCount > 0)
                        @foreach($notifications as $notification)
                            <a href="#" data-id="{{ $notification->id }}"
                               class="dropdown-item notification" id="notification">
                                <div class="dropdown-item-desc">
                                    <i class="{{ getNotificationIcon($notification->type) }}"></i>
                                    <span data-toggle="tooltip" data-placement="top"
                                          data-delay='{"show":"500", "hide":"50"}'
                                          title="{{ $notification->title }}">
                                    <span>{{ Str::limit($notification->title, 35, '...') }}</span>
                                    <div class="text-primary ml-4">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</div>
                                </span>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="empty-state" data-height="400">
                            <p>{{ __('messages.notification.you_don`t_have_any_new_notification') }}</p>
                        </div>
                    @endif
                </div>
                <div class="empty-state d-none" data-height="400">
                    <p>{{ __('messages.notification.you_don`t_have_any_new_notification') }}</p>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown header-navbar">
            <a class="nav-link margin-right" id="loginUserName" data-toggle="dropdown" href="#"
               role="button"
               aria-haspopup="true" aria-expanded="false">
                {{ (Auth::user()->full_name)??'' }}
                <img class="img-avatar profile-header-img" id="loginUserImage" src="{{Auth::user()->image_url??'' }}"
                     alt="InfyOm">
            </a>
            <div class="dropdown-menu dropdown-menu-right ml-4">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item editProfile" href="#" data-toggle="modal" data-id="{{ getLoggedInUserId() }}">
                    <i class="fa fa-user"></i>{{ __('messages.user.edit_profile') }}</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-id="{{ getLoggedInUserId() }}"
                   data-target="#changePasswordModal"><i
                            class="fa fa-lock"></i>{{ __('messages.user.change_password') }}</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-id="{{ getLoggedInUserId() }}"
                   data-target="#changeLanguageModal"><i
                            class="fa fa-language"></i>{{__('messages.profile.change_language')}}</a>
                <a class="dropdown-item" href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out-alt"></i>{{ __('messages.user.logout') }}
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</header>
