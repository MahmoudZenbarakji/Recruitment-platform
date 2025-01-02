<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('applications_job_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/chats*") ? "menu-open" : "" }} {{ request()->is("admin/applications*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/chats*") ? "active" : "" }} {{ request()->is("admin/applications*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.applicationsJob.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('chat_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.chats.index") }}" class="nav-link {{ request()->is("admin/chats") || request()->is("admin/chats/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-comments">

                                        </i>
                                        <p>
                                            {{ trans('cruds.chat.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('application_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.applications.index") }}" class="nav-link {{ request()->is("admin/applications") || request()->is("admin/applications/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-plus-square">

                                        </i>
                                        <p>
                                            {{ trans('cruds.application.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('comapny_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/reviews*") ? "menu-open" : "" }} {{ request()->is("admin/companies*") ? "menu-open" : "" }} {{ request()->is("admin/jobs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/reviews*") ? "active" : "" }} {{ request()->is("admin/companies*") ? "active" : "" }} {{ request()->is("admin/jobs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon far fa-address-card">

                            </i>
                            <p>
                                {{ trans('cruds.comapny.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('review_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.reviews.index") }}" class="nav-link {{ request()->is("admin/reviews") || request()->is("admin/reviews/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-star">

                                        </i>
                                        <p>
                                            {{ trans('cruds.review.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('company_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.companies.index") }}" class="nav-link {{ request()->is("admin/companies") || request()->is("admin/companies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-building">

                                        </i>
                                        <p>
                                            {{ trans('cruds.company.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('job_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.jobs.index") }}" class="nav-link {{ request()->is("admin/jobs") || request()->is("admin/jobs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-md">

                                        </i>
                                        <p>
                                            {{ trans('cruds.job.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('job_seeker_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/cvs*") ? "menu-open" : "" }} {{ request()->is("admin/applicatnts*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/cvs*") ? "active" : "" }} {{ request()->is("admin/applicatnts*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-address-book">

                            </i>
                            <p>
                                {{ trans('cruds.jobSeeker.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('cv_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cvs.index") }}" class="nav-link {{ request()->is("admin/cvs") || request()->is("admin/cvs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-invoice">

                                        </i>
                                        <p>
                                            {{ trans('cruds.cv.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('applicatnt_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.applicatnts.index") }}" class="nav-link {{ request()->is("admin/applicatnts") || request()->is("admin/applicatnts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-tie">

                                        </i>
                                        <p>
                                            {{ trans('cruds.applicatnt.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('finance_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/transactions*") ? "menu-open" : "" }} {{ request()->is("admin/payments*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/transactions*") ? "active" : "" }} {{ request()->is("admin/payments*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-dollar-sign">

                            </i>
                            <p>
                                {{ trans('cruds.finance.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('transaction_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transactions.index") }}" class="nav-link {{ request()->is("admin/transactions") || request()->is("admin/transactions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transaction.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('payment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.payments.index") }}" class="nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-invoice-dollar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.payment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('notification_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.notifications.index") }}" class="nav-link {{ request()->is("admin/notifications") || request()->is("admin/notifications/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.notification.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('setting_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/salaries*") ? "menu-open" : "" }} {{ request()->is("admin/job-types*") ? "menu-open" : "" }} {{ request()->is("admin/countries*") ? "menu-open" : "" }} {{ request()->is("admin/cities*") ? "menu-open" : "" }} {{ request()->is("admin/industries*") ? "menu-open" : "" }} {{ request()->is("admin/nationalities*") ? "menu-open" : "" }} {{ request()->is("admin/skils*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/salaries*") ? "active" : "" }} {{ request()->is("admin/job-types*") ? "active" : "" }} {{ request()->is("admin/countries*") ? "active" : "" }} {{ request()->is("admin/cities*") ? "active" : "" }} {{ request()->is("admin/industries*") ? "active" : "" }} {{ request()->is("admin/nationalities*") ? "active" : "" }} {{ request()->is("admin/skils*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-wrench">

                            </i>
                            <p>
                                {{ trans('cruds.setting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('salary_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.salaries.index") }}" class="nav-link {{ request()->is("admin/salaries") || request()->is("admin/salaries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-dollar-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.salary.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('job_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.job-types.index") }}" class="nav-link {{ request()->is("admin/job-types") || request()->is("admin/job-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-suitcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jobType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('country_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.countries.index") }}" class="nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-flag">

                                        </i>
                                        <p>
                                            {{ trans('cruds.country.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('city_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cities.index") }}" class="nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-signs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.city.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('industry_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.industries.index") }}" class="nav-link {{ request()->is("admin/industries") || request()->is("admin/industries/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-industry">

                                        </i>
                                        <p>
                                            {{ trans('cruds.industry.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('nationality_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.nationalities.index") }}" class="nav-link {{ request()->is("admin/nationalities") || request()->is("admin/nationalities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-flag">

                                        </i>
                                        <p>
                                            {{ trans('cruds.nationality.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('skil_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.skils.index") }}" class="nav-link {{ request()->is("admin/skils") || request()->is("admin/skils/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-500px">

                                        </i>
                                        <p>
                                            {{ trans('cruds.skil.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>