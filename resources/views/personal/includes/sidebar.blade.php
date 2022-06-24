<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <!-- Logo -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('personal.main') }}" class="nav-link active">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.likes.index') }}" class="nav-link ">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Понравившиеся посты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.comments.index') }}" class="nav-link ">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Мои комментарии
                    </p>
                </a>
            </li>
        </ul>

    </div>
    <!-- /.sidebar -->
</aside>
