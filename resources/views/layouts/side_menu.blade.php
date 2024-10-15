<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo" style="display: block;text-align: center;height: 100px">

        <a href="index.html" class="app-brand-link" style="margin-bottom: 10px">
        <span class="app-brand-logo demo" style="margin: auto">
          {{-- <img src="{{asset('assets/img/')}}" width="100%" height="100%"> --}}
        </span>
        </a>
        <p class="app-brand-text demo menu-text fw-bold">Farhty</p>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>

    </div>


    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class=" menu-item {{ url()->current() == url("/") ? "active" : "" }} ">
            <a href="{{route('home') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div >لوحة التحكم</div>
            </a>
        </li>
            <!-- Layouts -->
        <li class="{{ url()->current() == url('/admins') ? "active" : "" }} menu-item">
            <a href="{{ url('/admins') }}" class="menu-link">
                <i class="menu-icon  ti ti-users"></i>
                <div >المديرين</div>
            </a>
        </li>
        <li class="{{ url()->current() == url('/users') ? "active" : "" }} menu-item">
            <a href="{{ url('/users') }}" class="menu-link">
                <i class="menu-icon  ti ti-user-star"></i>
                <div >الحسابات المشهورة</div>
            </a>
        </li>
        <li class="{{ url()->current() == url('/questions') ? "active" : "" }} menu-item">
            <a href="{{ url('/questions') }}" class="menu-link">
                <i class="menu-icon  ti ti-device-tv"></i>
                <div >الاسئلة</div>
            </a>
        </li>
        <li class="{{ url()->current() == url('/packages') ? "active" : "" }} menu-item">
            <a href="{{ url('/packages') }}" class="menu-link">
                <i class="menu-icon  ti ti-users"></i>
                <div >الباقات</div>
            </a>
        </li>

        <li class="{{ url()->current() == url('/banners') ? "active" : "" }} menu-item">
            <a href="{{ url('/banners') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-flag"></i>
                <div >البنرات</div>
            </a>
        </li>
        <li class="{{ url()->current() == url('/platforms') ? "active" : "" }} menu-item">
            <a href="{{ url('/platforms') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-brand-facebook"></i>
                <div >منصات السوشيال ميديا</div>
            </a>
        </li>
        <li class="{{ url()->current() == url('/contacts') ? "active" : "" }} menu-item">
            <a href="{{ url('/contacts') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users-group"></i>
                <div >تواصل معنا</div>
            </a>
        </li>
        <li class="{{ url()->current() == url('/privacy') ? "active" : "" }} menu-item">
            <a href="{{ url('/privacy') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-function-off"></i>
                <div >سياسة الخصوصية </div>
            </a>
        </li>
        <li class="{{ url()->current() == url('/condition') ? "active" : "" }} menu-item">
            <a href="{{ url('/condition') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-ballpen"></i>
                <div>الشروط والاحكام</div>
            </a>
        </li>

    </ul>
</aside>
