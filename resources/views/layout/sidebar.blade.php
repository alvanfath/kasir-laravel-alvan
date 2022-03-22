        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->

                        <!-- All User -->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard')}}"
                                aria-expanded="false">
                                <i class="fas fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <!-- End All User -->

                        <!-- Only Admin -->
                        @if (auth()->user()->role =="admin")
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('indexadmin')}}"
                                aria-expanded="false">
                                <i class="fa-solid fa-users"></i>
                                <span class="hide-menu">Data User</span>
                            </a>
                        </li>
                        @endif
                        <!-- End Only Admin -->

                        <!-- Only Manager -->
                        @if (auth()->user()->role =="manager")
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('indexm')}}"
                                aria-expanded="false">
                                <i class="fa-solid fa-bars"></i>
                                <span class="hide-menu">Data Menu</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('laporan')}}"
                                aria-expanded="false">
                                <i class="fa-solid fa-database"></i>
                                <span class="hide-menu">Laporan</span>
                            </a>
                        </li>
                        @endif
                        <!-- End Only Manager -->

                        <!-- Only Kasir -->
                        @if (auth()->user()->role =="kasir")
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('indexk')}}"
                                aria-expanded="false">
                                <i class="fa-solid fa-cash-register"></i>
                                <span class="hide-menu">Data Transaksi</span>
                            </a>
                        </li>
                        @endif
                        <!-- End Only Kasir -->

                        <!-- logout -->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout')}}"
                                aria-expanded="false">
                                <i class="fa-solid fa-circle-left"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                        <!-- End Logout -->
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
