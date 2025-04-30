<header class="mb-5">
    @include('components.theme.header2')
    <nav class="main-navbar ">
        <div class="container font-bold">
            <ul>
                <li class="menu-item">
                    <a href="{{ route('dashboard') }}"
                        class='menu-link {{ request()->route()->getName() == 'dashboard'
                            ? 'active_navbar_new'
                            : '' }}'>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="{{ route('cashflow.add') }}"
                        class='menu-link {{ request()->route()->getName() == 'cashflow.add'
                            ? 'active_navbar_new'
                            : '' }}'>
                        <span>Tambah Cashflow</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('cashflow.index') }}"
                        class='menu-link {{ request()->route()->getName() == 'cashflow.index'
                            ? 'active_navbar_new'
                            : '' }}'>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('kategori.index') }}"
                        class='menu-link {{ request()->route()->getName() == 'kategori.index'
                            ? 'active_navbar_new'
                            : '' }}'>
                        <span>Kategori</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('wallet.index') }}"
                        class='menu-link {{ request()->route()->getName() == 'wallet.index'
                            ? 'active_navbar_new'
                            : '' }}'>
                        <span>Dompet</span>
                    </a>
                </li>
               
            </ul>
        </div>
    </nav>

</header>
