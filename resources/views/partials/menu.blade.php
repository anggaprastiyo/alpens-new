<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.setting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('general_assumption_access')
                            <li class="{{ request()->is("admin/general-assumptions") || request()->is("admin/general-assumptions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.general-assumptions.index") }}">
                                    <i class="fa-fw fas fa-cog">

                                    </i>
                                    <span>{{ trans('cruds.generalAssumption.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('yield_curve_access')
                                <li class="{{ request()->is("admin/yield-curves*") || request()->is("admin/yield-curve-details*") ? "active" : "" }}">
                                    <a href="{{ route("admin.yield-curves.index") }}">
                                        <i class="fa-fw fas fa-chart-line"></i>
                                        <span>{{ trans('cruds.yieldCurve.title') }}</span>
                                    </a>
                                </li>
                        @endcan
                        @can('biaya_access')
                            <li class="{{ request()->is("admin/biayas*") || request()->is("admin/biaya-details*") ? "active" : "" }}">
                                <a href="{{ route("admin.biayas.index") }}">
                                    <i class="fa-fw fas fa-dollar-sign">

                                    </i>
                                    <span>{{ trans('cruds.biaya.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('price_historical_access')
                            <li class="{{ request()->is("admin/price-historicals") || request()->is("admin/price-historicals/*") ? "active" : "" }}">
                                <a href="{{ route("admin.price-historicals.index") }}">
                                    <i class="fa-fw fas fa-history">

                                    </i>
                                    <span>{{ trans('cruds.priceHistorical.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('asset_adjustment_access')
                            <li class="{{ request()->is("admin/asset-adjustments") || request()->is("admin/asset-adjustments/*") ? "active" : "" }}">
                                <a href="{{ route("admin.asset-adjustments.index") }}">
                                    <i class="fa-fw fas fa-adjust">

                                    </i>
                                    <span>{{ trans('cruds.assetAdjustment.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('bop_access')
                            <li class="{{ request()->is("admin/bops") || request()->is("admin/bops/*") ? "active" : "" }}">
                                <a href="{{ route("admin.bops.index") }}">
                                    <i class="fa-fw fas fa-file-invoice-dollar">

                                    </i>
                                    <span>{{ trans('cruds.bop.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('data_sap_access')
                            <li class="{{ request()->is("admin/data-saps") || request()->is("admin/data-saps/*") ? "active" : "" }}">
                                <a href="{{ route("admin.data-saps.index") }}">
                                    <i class="fa-fw fas fa-list-ul">

                                    </i>
                                    <span>{{ trans('cruds.dataSap.title') }}</span>

                                </a>
                            </li>
                        @endcan
{{--                        @can('yield_curve_detail_access')--}}
{{--                            <li class="{{ request()->is("admin/yield-curve-details") || request()->is("admin/yield-curve-details/*") ? "active" : "" }}">--}}
{{--                                <a href="{{ route("admin.yield-curve-details.index") }}">--}}
{{--                                    <i class="fa-fw far fa-circle">--}}

{{--                                    </i>--}}
{{--                                    <span>{{ trans('cruds.yieldCurveDetail.title') }}</span>--}}

{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                        @can('biaya_detail_access')--}}
{{--                            <li class="{{ request()->is("admin/biaya-details") || request()->is("admin/biaya-details/*") ? "active" : "" }}">--}}
{{--                                <a href="{{ route("admin.biaya-details.index") }}">--}}
{{--                                    <i class="fa-fw far fa-circle">--}}

{{--                                    </i>--}}
{{--                                    <span>{{ trans('cruds.biayaDetail.title') }}</span>--}}

{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
                        @can('bop_detail_access')
                            <li class="{{ request()->is("admin/bop-details") || request()->is("admin/bop-details/*") ? "active" : "" }}">
                                <a href="{{ route("admin.bop-details.index") }}">
                                    <i class="fa-fw far fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.bopDetail.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('data_sap_detail_access')
                            <li class="{{ request()->is("admin/data-sap-details") || request()->is("admin/data-sap-details/*") ? "active" : "" }}">
                                <a href="{{ route("admin.data-sap-details.index") }}">
                                    <i class="fa-fw far fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.dataSapDetail.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('manage_aseet_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-chart-pie">

                        </i>
                        <span>{{ trans('cruds.manageAseet.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('asset_migration_access')
                            <li class="{{ request()->is("admin/asset-migrations") || request()->is("admin/asset-migrations/*") ? "active" : "" }}">
                                <a href="{{ route("admin.asset-migrations.index") }}">
                                    <i class="fa-fw fas fa-chart-pie">

                                    </i>
                                    <span>{{ trans('cruds.assetMigration.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('obligasi_access')
                            <li class="{{ request()->is("admin/obligasis") || request()->is("admin/obligasis/*") ? "active" : "" }}">
                                <a href="{{ route("admin.obligasis.index") }}">
                                    <i class="fa-fw fas fa-dot-circle">

                                    </i>
                                    <span>{{ trans('cruds.obligasi.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('saham_access')
                            <li class="{{ request()->is("admin/sahams") || request()->is("admin/sahams/*") ? "active" : "" }}">
                                <a href="{{ route("admin.sahams.index") }}">
                                    <i class="fa-fw fas fa-dot-circle">

                                    </i>
                                    <span>{{ trans('cruds.saham.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('deposito_access')
                            <li class="{{ request()->is("admin/depositos") || request()->is("admin/depositos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.depositos.index") }}">
                                    <i class="fa-fw fas fa-dot-circle">

                                    </i>
                                    <span>{{ trans('cruds.deposito.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('reksadana_access')
                            <li class="{{ request()->is("admin/reksadanas") || request()->is("admin/reksadanas/*") ? "active" : "" }}">
                                <a href="{{ route("admin.reksadanas.index") }}">
                                    <i class="fa-fw fas fa-dot-circle">

                                    </i>
                                    <span>{{ trans('cruds.reksadana.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('rdpt_access')
                            <li class="{{ request()->is("admin/rdpts") || request()->is("admin/rdpts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.rdpts.index") }}">
                                    <i class="fa-fw fas fa-dot-circle">

                                    </i>
                                    <span>{{ trans('cruds.rdpt.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('investasi_langsung_access')
                            <li class="{{ request()->is("admin/investasi-langsungs") || request()->is("admin/investasi-langsungs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.investasi-langsungs.index") }}">
                                    <i class="fa-fw fas fa-dot-circle">

                                    </i>
                                    <span>{{ trans('cruds.investasiLangsung.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('manage_liability_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-chart-line">

                        </i>
                        <span>{{ trans('cruds.manageLiability.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('liability_portofolio_access')
                            <li class="{{ request()->is("admin/liability-portofolios") || request()->is("admin/liability-portofolios/*") ? "active" : "" }}">
                                <a href="{{ route("admin.liability-portofolios.index") }}">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span>{{ trans('cruds.liabilityPortofolio.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('liability_jkk_access')
                            <li class="{{ request()->is("admin/liability-jkks") || request()->is("admin/liability-jkks/*") ? "active" : "" }}">
                                <a href="{{ route("admin.liability-jkks.index") }}">
                                    <i class="fa-fw fas fa-dot-circle">

                                    </i>
                                    <span>{{ trans('cruds.liabilityJkk.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('liability_jkm_access')
                            <li class="{{ request()->is("admin/liability-jkms") || request()->is("admin/liability-jkms/*") ? "active" : "" }}">
                                <a href="{{ route("admin.liability-jkms.index") }}">
                                    <i class="fa-fw fas fa-dot-circle">

                                    </i>
                                    <span>{{ trans('cruds.liabilityJkm.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('liability_pensiun_access')
                            <li class="{{ request()->is("admin/liability-pensiuns") || request()->is("admin/liability-pensiuns/*") ? "active" : "" }}">
                                <a href="{{ route("admin.liability-pensiuns.index") }}">
                                    <i class="fa-fw fas fa-dot-circle">

                                    </i>
                                    <span>{{ trans('cruds.liabilityPensiun.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('liability_tht_access')
                            <li class="{{ request()->is("admin/liability-thts") || request()->is("admin/liability-thts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.liability-thts.index") }}">
                                    <i class="fa-fw fas fa-dot-circle">

                                    </i>
                                    <span>{{ trans('cruds.liabilityTht.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>