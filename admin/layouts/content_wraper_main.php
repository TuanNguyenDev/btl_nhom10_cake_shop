<?php 
  include '../model/db.php';
  $conn = db::open();
  $count = db::query($conn,"SELECT count(*) as soluong FROM products");
  $result = $count->fetch_assoc();
  $sanpham = $result['soluong'];
  $count = db::query($conn,"SELECT count(*) as soluong FROM bills");
  $result = $count->fetch_assoc();
  $donhang = $result['soluong'];
  $count = db::query($conn,"SELECT count(*) as soluong FROM contacts");
  $result = $count->fetch_assoc();
  $contacs = $result['soluong'];
  $count = db::query($conn,"SELECT count(*) as soluong FROM customer");
  $result = $count->fetch_assoc();
  $customer = $result['soluong'];
 ?>
 <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $sanpham?></h3>

              <p>Sản phẩm</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="list_product.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $donhang?><sup style="font-size: 20px"></sup></h3>

              <p>Đơn hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="bills.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $contacs?></h3>

              <p>Phản hồi</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="feed_back.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $customer?></h3>

              <p>Khách hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="list_customer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->