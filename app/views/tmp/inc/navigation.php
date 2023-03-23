<nav class="sidebar">
    <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
        <?php echo COMPANY_NAME?>
    </a>
    <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
    </div>
    </div>
    <div class="sidebar-body">
    <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
            <a href="<?php echo _route('dashboard:index')?>" class="nav-link">
                <i class="link-icon" data-feather="home"></i>
                <span class="link-title">Dashboard</span>
            </a>
        </li>

        <?php if(isVendor()) :?>
            <li class="nav-item">
                <a href="<?php echo _route('company:index')?>" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Companies</span>
                </a>
            </li>
        <?php endif?>

        <li class="nav-item">
            <a href="<?php echo _route('branch:index')?>" class="nav-link">
                <i class="link-icon" data-feather="folder"></i>
                <span class="link-title">Branches</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo _route('user:index')?>" class="nav-link">
                <i class="link-icon" data-feather="users"></i>
                <span class="link-title">Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo _route('product:index')?>" class="nav-link">
                <i class="link-icon" data-feather="database"></i>
                <span class="link-title">Products</span>
            </a>
        </li>
    </ul>
    </div>
</nav>