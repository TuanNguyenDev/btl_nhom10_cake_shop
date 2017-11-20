<?php 
	include('checklog.php');
?>
	<?php include('layouts/head.php'); ?>
  <!-- Left side column. contains tde logo and sidebar -->
  	<?php include('layouts/menu.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  	<?php include('layouts/content_wraper.php'); ?>
  	<?php 
  		include('model/db.php');
  		$conn = db::open();
  		//phan trang
  		$name_filter = isset($_GET['keyword'])? " where contacts.name like '%".$_GET['keyword']."%'" : "";
  		$count = db::query($conn,"SELECT count(*) as soluong FROM contacts $name_filter");
  		$result = $count->fetch_assoc();
  		$sophanhoi = $result['soluong'];
  		$numrows = isset($_GET['pageSize'])?(int)$_GET['pageSize']:5;
		$numpages = $sophanhoi / $numrows;
		if($sophanhoi % $numrows !=0){
			$numpages++;
		}
		if(isset($_GET['curpage']))
			$curpage = $_GET['curpage'];
		else
			$curpage = 1;
		$off = $numrows*($curpage-1);


  	 ?>
    <div class=" col-sm-12">
		<form action="feed_back.php" metdod="get" accept-charset="utf-8" class="form-inline col-sm-10" id="formfilter">
			<div class="form-group">
				<label> Page Size</label>
					<select name="pageSize">
						<?php
							$pagesize = isset($_GET['pageSize'])?(int)$_GET['pageSize']:5;
							for ($i=5; $i <= 20; $i=$i+5) { 
								$selec = $pagesize == $i ? " selected":"";
								echo "<option value=\"$i\" ".$selec.">$i</option>";
							}
						?>
					</select>
			</div>
			<div class="form-group">
				<label>Search</label>
				<input type="text" value="" name="keyword" class="form-control">
				<button type="submit" class="btn btn-sm btn-info">Filter</button>
			</div>
		</form>
	</div>
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Subject</th>
			<th>Message</th>
			<th>Create at</th>
		</tr>
		<?php
			$name_filter = isset($_GET['keyword'])? " where contacts.name like '%".$_GET['keyword']."%'" : "";
	  		$sql = "select * from contacts $name_filter ORDER BY contacts.id DESC LIMIT $numrows OFFSET $off";

	  		$contacts = db::query($conn,$sql);
			while ($row = $contacts->fetch_assoc()) {
				echo "<tr>
					<td>".$row['id']."</td>
					<td>".$row['name']."</td>
					<td>".$row['email']."</td>
					<td>".$row['subject']."</td>
					<td>".$row['message']."</td>
					<td>".$row['create_at']."</td>
					<td><a href='reply.php?id=".$row['id']."' class='btn btn-xs btn-success'>Reply</a></td>
				</tr>";
			}
		 ?>
		
	</table>
	<div class= "pages">
	<?php
		if($numpages>1)
		{
			echo "<p>Trang:&nbsp; ";
			for($i=1; $i<=$numpages; $i++)
				echo "<a href='feed_back.php?curpage={$i}'>{$i}</a> &nbsp;";
			echo"</p>";
		}
	 ?>
	</div>
  <!-- /.content-wrapper -->
  	<?php include('layouts/footer.php'); ?>
