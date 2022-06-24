<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <!-- Logo -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.categories') }}" class="nav-link active">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Категории
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.tags') }}" class="nav-link ">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Теги
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.posts') }}" class="nav-link ">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Посты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link ">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
            </li>
        </ul>

    </div>
    <!-- /.sidebar -->
</aside>
