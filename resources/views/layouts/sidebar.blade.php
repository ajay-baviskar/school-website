
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" key="t-menu">Menu</li>
        <li>
            <a href="{{url('home')}}">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Dashboards</span>
            </a>
        </li>
        @role('SuperAdmin')
        <li>
            <a href="{{url('notice')}}">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Notice</span>
            </a>
        </li>
        <li>
            <a href="{{url('gallary')}}">
                <i class="bx bx-home-circle"></i>
                <span key="t-dashboards">Gallary</span>
            </a>
        </li>
        <li>
            <a href="{{url('admission-form')}}">
                <i class="bx bx-file"></i>
                <span key="t-dashboards">Admission-form</span>
            </a>
        </li>


        <li>
            <a href="{{url('admissions')}}">
                <i class="bx bx-file"></i>
                <span key="t-dashboards">Submited Admission form</span>
            </a>
        </li>

        <li>

            <li>
                <a href="{{url('holidays')}}">
                    <i class="bx bx-file"></i>
                    <span key="t-dashboards">Holiday</span>
                </a>
            </li>
            <li>

            <a href="{{url('setting')}}">
                <i class="bx bx-file"></i>
                <span key="t-dashboards">Setting</span>
            </a>
        </li>
        <li>
            <a href="{{url('fees-payment')}}">
                <i class="bx bx-file"></i>
                <span key="t-dashboards">Fees Payment</span>
            </a>
        </li>
        <li>
            <a href="{{url('subscription')}}">
                <i class="bx bx-file"></i>
                <span key="t-dashboards">Subscription</span>
            </a>
        </li>
        <li>
            <a href="{{url('contacts')}}">
                <i class="bx bx-file"></i>
                <span key="t-dashboards">Contact</span>
            </a>
        </li>
        @endrole
    </ul>
</div>
