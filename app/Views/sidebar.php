<div class="container-scroller d-flex">
<nav class="mysidebarrr sidebar sidebar-offcanvas" id="sidebar">
  <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
      </button>
      <ul class="nav">
       <!--  <li class="nav-item sidebar-category">
        </li> -->
        <?php
        $session = session();
        $role = $session->get('role');
        // print_r($role); die();

        $dashboardLink = '#';
        if ($role) {
            switch ($role) {
                case 'Supervisor':
                    $dashboardLink = base_url('supervisor_dashboard');
                    break;
                case 'Manager':
                    $dashboardLink = base_url('manager_dashboard');
                    break;
                case 'Superadmin':
                    $dashboardLink = base_url('superadmin_dashboard');
                    break;
                case 'Vendor':
                    $dashboardLink = base_url('vendor_dashboard');
                case 'Client':
                    $dashboardLink = base_url('vendor_dashboard');
                    break;
            }
        }
        ?>
        <li class="nav-item">
        <a class="nav-link" href="<?= esc($dashboardLink); ?>">
          <i class="mdi mdi-view-quilt menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <?php if ($role === 'Superadmin'): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('list_supervisor') ?>">
            <i class="mdi mdi-chart-pie menu-icon"></i>
            <span class="menu-title">Supervisor</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('list_manager') ?>">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Manager</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('list_vendor') ?>">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Vendor</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('report') ?>">
            <i class="mdi mdi-emoticon menu-icon"></i>
            <span class="menu-title">Reports</span>
          </a>
        </li>
      <?php elseif ($role === 'Manager'): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('list_supervisor') ?>">
            <i class="mdi mdi-chart-pie menu-icon"></i>
            <span class="menu-title">Supervisor</span>
          </a>
        </li>
      <?php elseif ($role === 'Client'): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('list_order') ?>">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Place Order</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('order_report') ?>">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Order Report</span>
          </a>
        </li>
      <?php endif; ?>
    </ul>
      
    </nav>
