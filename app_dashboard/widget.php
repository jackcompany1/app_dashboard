<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $userCount; ?></h3>

              <p>Total Category</p>
            </div>
            <div class="icon">
              <i class="fa fa-list-ol fa-6"></i>
            </div>
            <a href="category.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $userCountfb; ?><sup style="font-size: 20px"></sup></h3>

              <p>Total Places</p>
            </div>
            <div class="icon">
              <i class="fa fa-globe fa-6"></i>
            </div>
            <a href="places.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Push</h3>

              <p>Notification</p>
            </div>
            <div class="icon">
              <i class="fa fa-bell-o fa-6"></i>
            </div>
            <a href="notification.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Admin</h3>

              <p>Settings</p>
            </div>
            <div class="icon">
              <i class="fa fa-cogs fa-6"></i>
            </div>
 <a href="profile.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          
          </div>         
          </div>
        </div>