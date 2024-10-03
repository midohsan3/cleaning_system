{{-- sidebar @s --}}
<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{route('front')}}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ url('imgs/logo.jpg') }}" srcset="{{ url('imgs/logo.jpg') }} 2x"
                    alt="logo">
                <img class="logo-dark logo-img" src="{{ url('imgs/logo.jpg') }}" srcset="{{ url('imgs/logo.jpg') }} 2x"
                    alt="logo-dark">
                <img class="logo-small logo-img logo-img-small" src="{{ url('imgs/logo.jpg') }}"
                    srcset="{{ url('imgs/logo.jpg') }} 2x" alt="logo-small">
            </a>
        </div>

        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none
                d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni
                  ni-menu"></em></a>
        </div>
    </div>{{-- .nk-sidebar-element --}}

    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Cleaning System</h6>
                    </li>{{-- .nk-menu-item --}}

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.dashboard.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-meter"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>{{-- .nk-menu-item --}}

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Applications</h6>
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><i class="icon far fa-user-tie"></i></span>
                            <span class="nk-menu-text">Staff-Management</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.employee.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.leave.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Leave &
                                        Permissions</span></a>
                            </li>
                        </ul>{{-- .nk-menu-sub --}}
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni
                          ni-users-fill"></em></span>
                            <span class="nk-menu-text">Customer-Management</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.customer.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">List</span></a>
                            </li>
                        </ul>{{-- .nk-menu-sub --}}
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-handshake"></i></span>
                            <span class="nk-menu-text">Services</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.service.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">List</span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{route('admin.skill.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Skills</span></a>
                            </li>
                        </ul>{{-- .nk-menu-sub --}}
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon icon ni ni-calendar"></em></span>
                            <span class="nk-menu-text">Booking</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.booking.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Booking
                                        List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.hiring.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Hiring
                                        List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.booking.schedule')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Schedule</span></a>
                            </li>
                        </ul>{{-- .nk-menu-sub --}}
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><i class="icon fas fa-file-invoice-dollar"></i></span>
                            <span class="nk-menu-text">Invoices</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('admin.invoice.index') }}" class="nk-menu-link"><span
                                        class="nk-menu-text"> List</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-key"></i>
                            </span>
                            <span class="nk-menu-text">Permissions</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.role.index')}}" class="nk-menu-link">
                                    <span class="nk-menu-text">All</span>
                                </a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="=====" class="nk-menu-link">
                                    <span class="nk-menu-text">Add New</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Accounting</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin.cash.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-money-bill-alt"></i>
                            </span>
                            <span class="nk-menu-text">Cash</span>
                        </a>
                    </li>

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">System Helpers</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin.nationality.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fal fa-map"></i>
                            </span>
                            <span class="nk-menu-text">Nationalities</span>
                        </a>
                    </li>

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Front</h6>
                    </li>

                    <li class="nk-menu-item">
                        <a href="======" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-sliders-h"></i>
                            </span>
                            <span class="nk-menu-text">Sliders</span>
                        </a>
                    </li>

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt"></h6>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('logout') }}" class="nk-menu-link" onclick="event.preventDefault();
            document.getElementById('logout-frm').submit();">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-sign-out-alt"></i>
                            </span>
                            <span class="nk-menu-text">LogOut</span>
                        </a>
                    </li>
                    <form id="logout-frm" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>{{-- .nk-menu --}}
            </div>{{-- .nk-sidebar-menu --}}
        </div>{{-- .nk-sidebar-content --}}
    </div>{{-- .nk-sidebar-element --}}
</div>
{{-- sidebar @e --}}