<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <span class="brand-text font-weight-light">Video Rental</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php?page=add" class="nav-link">
                        <i class="nav-icon fas fa-plus-square"></i>
                        <p>Add Video</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=view" class="nav-link">
                        <i class="nav-icon fas fa-video"></i>
                        <p>View All Videos</p>
                    </a>
                </li>
                <!-- Logout Link -->
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
