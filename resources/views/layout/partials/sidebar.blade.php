<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{--<li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('assets/images/profile-icon.svg') }}" alt="profile" class="rounded-circle" width="31">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">
                        @if(session()->get('mabna_website_admin_session'))
                            {{ session()->get('mabna_website_admin_session')['first_name'] .' '. session()->get('mabna_website_admin_session')['last_name'] }}
                        @endif
                    </span>
--}}{{--                    <span class="text-secondary text-small text-right">مدیر سایت</span>--}}{{--
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>--}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-index') }}">
                <span class="menu-title">میز کار</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">XDSL-PLUS</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('show-report-FetchAllInvalidNumber') }}">ليست شماره هاي نامعتبر</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('show-report-FetchAllTCICenter') }}">ليست مراکز مخابراتي</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('show-report-FetchAllOperators') }}">ليست اپراتورها</a></li>
                </ul>
            </div>
        </li>
        {{--<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">رابط کاربری</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
                <span class="menu-title">آیکون ها</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
                <span class="menu-title">فرم ها</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-title">آمارها</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
                <span class="menu-title">جداول</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">نمونه صفحات</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">پروژه ها</h6>
                </div>
                <button class="btn btn-block btn-lg btn-gradient-primary mt-4">  اضافه کردن پروژه + </button>
                <div class="mt-4">
                  <div class="border-bottom">
                    <p class="text-secondary">دسته بندی ها</p>
                  </div>
                  <ul class="gradient-bullet-list mt-4">
                    <li>رایگان</li>
                    <li>پولی</li>
                  </ul>
                </div>
              </span>
        </li>--}}
    </ul>
</nav>
