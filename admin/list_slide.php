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
  		$count = db::query($conn,"SELECT count(*) as soluong FROM slide");
  		$result = $count->fetch_assoc();
  		$soluong = $result['soluong'];
  		$numrows = isset($_GET['pageSize'])?(int)$_GET['pageSize']:5;
		$numpages = $soluong / $numrows;
		if($soluong % $numrows !=0){
			$numpages++;
		}
		if(isset($_GET['curpage']))
			$curpage = $_GET['curpage'];
		else
			$curpage = 1;
		$off = $numrows*($curpage-1);
		$pageSize = isset($_GET['pageSize'])?(int)$_GET['pageSize']:5;

  	 ?>
    <div class=" col-sm-12">
		<form action="list_slide.php" metdod="get" accept-charset="utf-8" class="form-inline col-sm-10" id="formfilter">
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
				<button type="submit" class="btn btn-sm btn-info">Filter</button>
			</div>
		</form>
	</div>
	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Alt</th>
			<th>Image</th>
			<th><a href="add_slide.php" class="btn btn-xs btn-success" title="">Create</a></th>
		</tr>
		<?php
			$name_filter = isset($_GET['keyword'])? " where slide.image like '%".$_GET['keyword']."%'" : "";
			//$where = $role_id == 0 ? "":" and users.role = $role_id";
	  		$sql = "select slide.id,slide.alt,slide.image from slide $name_filter order by slide.id ASC LIMIT $numrows OFFSET $off";

	  		$users = db::query($conn,$sql);
	  		$loop =0;
			while ($row = $users->fetch_assoc()) {
				echo "<tr>
					<td>".$row['id']."</td>
					<td>".$row['alt']."</td>
					<td><img src="."./images/slide/".$row['image']." style='width: 100px;'></td>";

					if($_SESSION['role'] == 900){
						echo "<td><a href='edit_slide.php?id=".$row['id']."' class='btn btn-xs btn-success'>Edit</a></td>";
					}
					echo "
				</tr>";
			}
		 ?>
		<img src="" style="width: 100px;">
	</table>
	<div class= "pages">
	<?php
		if($numpages>1)
		{
			$pagesize = isset($_GET['pageSize'])?(int)$_GET['pageSize']:5;
			echo "<p>Trang:&nbsp; ";
			for($i=1; $i<=$numpages; $i++)
				echo "<a href='list_slide.php?pageSize={$pagesize}&curpage={$i}'>{$i}</a> &nbsp;";
			echo"</p>";
		}
	 ?>
	</div>
  <!-- /.content-wrapper -->
  	<?php include('layouts/footer.php'); ?>
