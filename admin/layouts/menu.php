<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= $_SESSION['image']?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['full_name']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Sản Phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="list_product.php"><i class="fa fa-circle-o"></i>Danh sách sản phẩm</a></li>
            <li><a href="add_product.php"><i class="fa fa-circle-o"></i>Thêm mới sản phẩm</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Loại sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_type.php"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
            <li><a href="add_type.php"><i class="fa fa-circle-o"></i> Thêm loại sản phẩm</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Slide</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_slide.php"><i class="fa fa-circle-o"></i> Danh sách slide</a></li>
            <li><a href="add_slide.php"><i class="fa fa-circle-o"></i> Thêm slide</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Khách hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_customer.php"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Đơn hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="bills.php"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="users.php">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="list_users.php"><i class="fa fa-circle-o"></i> Danh sách</a></li>
            <li><a href="add_users.php"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="users.php">
            <i class="fa fa-users"></i> <span>Phản hồi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="feed_back.php"><i class="fa fa-circle-o"></i> Danh sách</a></li>
            
          </ul>
        </li>
        <li>
          <a href="logout.php">
            <i class="fa fa-th"></i> <span>Logout</span>
          </a>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>