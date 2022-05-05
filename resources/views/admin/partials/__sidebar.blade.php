<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{ Route::currentRouteName() == 'appointments' ? 'active' : '' }}">
                    <a href="
                    {{ route('appointments') }}"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                </li>
                <li class="{{ Route::currentRouteName() == 'specialites.index' ? 'active' : '' }}">
                    <a href="{{ route('specialites.index') }}"><i class="fe fe-users"></i>
                        <span>Specialities</span></a>
                </li>
                <li class="{{ Route::currentRouteName() == 'doctors.index' ? 'active' : '' }}">
                    <a href="{{ route('doctors.index') }}"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                </li>
                <li class="{{ Route::currentRouteName() == 'patients.index' ? 'active' : '' }}">
                    <a href="{{ route('patients.index') }}"><i class="fe fe-user"></i> <span>Patients</span></a>
                </li>
                <li class="{{ Route::currentRouteName() == 'appointment.request' ? 'active' : '' }}">
                    <a href="{{ route('appointment.request') }}"><i class="fe fe-user"></i> <span>Appointment
                            requests</span></a>
                </li>
        </div>
    </div>
</div>
