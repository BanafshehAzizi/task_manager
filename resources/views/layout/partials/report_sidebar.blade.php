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
        {{--<li class="nav-item">
            <a class="nav-link" href="{{ route('report-index', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}">
                <span class="menu-title">میز کار گزارش ها</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>--}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-SubscribersActive', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش تعداد مشترکین فعال</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-NumberOfVillagesWithSingleVoiceCommunication', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش تعداد روستاهای دارای تک ارتباط</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-PassivePorts', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش تعداد پورت منصوبه</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-PublicRoadTelephone', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش تعداد تلفن همگانی جاده ای</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-UrbanPublicTelephone', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش تعداد تلفن همگانی شهری</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-Traffic', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">سایر گزارش های ترافیک</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-ExternalTrafficUsage', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش حجم ترافیک مصرفی مشترکین خارجی</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-InternalTrafficUsage', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش حجم ترافیک مصرفی مشترکین داخلی</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-AverageAccessSpeed', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش متوسط پهنای باند فروخته شده به کاربران نهایی</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-ZarfiatEnteghal', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش ظرفیت انتقال پهنای باند</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-BitStreamOtherOperators', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش بیت استریم به سایر اپراتورها</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-BitStreamPort', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش تعداد پورت منصوبه بیت استریم</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-UsablePort', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش تعداد پورت منصوبه آماده بهره برداری</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-UnusablePort', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش تعداد پورت منصوبه قابل بهره برداری</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('show-report-IT-Fact-EndUsers', ['year' => Request::segment(3), 'month' => Request::segment(4)]) }}" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">گزارش دایری End User</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
