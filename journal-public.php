<?php

	 ob_start();
   require_once './vendor/autoload.php';
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   
   require './vendor/phpmailer/phpmailer/src/Exception.php';
   require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
   require './vendor/phpmailer/phpmailer/src/SMTP.php';

    include "layouts/main-header.php";
    
    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
        $page_no = $_GET['page_no'];
    }else{
        $page_no = 1;
    }

    $total_records_per_page = 1;
    
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";
    
    $result_count = mysqli_query(
    $connect,
    "SELECT COUNT(*) As total_records FROM `tbl_publication` where pub_createdFor='1'"
    );
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1;


$getMetas   =  "SELECT * FROM tbl_publication where pub_createdFor='1' order by pub_id Desc LIMIT $offset, $total_records_per_page";
$runQuery   =  $connect->query($getMetas);

?>

	<div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>AFI Publications</h2>
                        <ul>
                            <li><a href="<?php echo BASEPATH;?>index.php">Home</a></li>
                            <li><span>Publications</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- .hx-team-area start -->
    <div class="team-area clear-fix  bg-light pt-5 pb-5">
        <div class="container">
             <div class="col-12">
                <div class="hx-site-title-1 text-center">
                    <span>Publications</span>
                    <h2>AFI Publications</h2>
                </div>
            </div>
            <div class="row justify-content-center">
			
				<?php if(mysqli_num_rows($runQuery) >= 1 ){
        
				while($row = $runQuery->fetch_object()) { ?>
			
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="teams p-3 achievements ">
							<img src="admin/uploads/publications/<?php echo $row->pub_thumbnail; ?>" class="img-responsive" alt="Team">
							<h4 style="font-size: 18px; margin-top: 10px; text-align: justify;"><?php echo $row->pub_title; ?></h4>
							<p><?php echo substr($row->pub_shortdesc, 0, 100); ?></p>
							<div class="btns text-center">
								<div class="btn-style"><a href="journal-public-detail.php?pid=<?php echo base64_encode($row->pub_id);?>" >Read More !</a></div>
							</div>
                    </div>
                </div>            
				
				<?php } }else{ ?>
            
					<div class="col-12 col-md-4">
						<p>No Publications Found!</p>
					</div>
						
				<?php } ?>
                
            </div>
			
			
    
		<?php if($total_no_of_pages > 1){?>
		<style>
		.pagination {
			display: inline-block;
			padding-left: 0;
			margin: 20px 0;
			border-radius: 4px;
		}.pagination>li {
			display: inline;
		}.pagination>li:first-child>a, .pagination>li:first-child>span {
			margin-left: 0;
			border-top-left-radius: 4px;
			border-bottom-left-radius: 4px;
		}
		.pagination>li>a, .pagination>li>span {
			position: relative;
			float: left;
			padding: 6px 12px;
			margin-left: -1px;
			line-height: 1.42857143;
			color: #337ab7;
			text-decoration: none;
			background-color: #fff;
			border: 1px solid #ddd;
		}
		</style>

		<ul class="pagination">
			<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
			<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
			</li>
			   
			<?php 
			if ($total_no_of_pages <= 10){  	 
				for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
					if ($counter == $page_no) {
				   echo "<li class='active'><a>$counter</a></li>";	
						}else{
				   echo "<li><a href='?page_no=$counter'>$counter</a></li>";
						}
				}
			}
			elseif($total_no_of_pages > 10){
				
			if($page_no <= 4) {			
			 for ($counter = 1; $counter < 8; $counter++){		 
					if ($counter == $page_no) {
				   echo "<li class='active'><a>$counter</a></li>";	
						}else{
				   echo "<li><a href='?page_no=$counter'>$counter</a></li>";
						}
				}
				echo "<li><a>...</a></li>";
				echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
				echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
				}
		
			 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
				echo "<li><a href='?page_no=1'>1</a></li>";
				echo "<li><a href='?page_no=2'>2</a></li>";
				echo "<li><a>...</a></li>";
				for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
				   if ($counter == $page_no) {
				   echo "<li class='active'><a>$counter</a></li>";	
						}else{
				   echo "<li><a href='?page_no=$counter'>$counter</a></li>";
						}                  
			   }
			   echo "<li><a>...</a></li>";
			   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
			   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
					}
				
				else {
				echo "<li><a href='?page_no=1'>1</a></li>";
				echo "<li><a href='?page_no=2'>2</a></li>";
				echo "<li><a>...</a></li>";
		
				for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
				  if ($counter == $page_no) {
				   echo "<li class='active'><a>$counter</a></li>";	
						}else{
				   echo "<li><a href='?page_no=$counter'>$counter</a></li>";
						}                   
						}
					}
			}
		?>
			
			<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
			<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
			</li>
			<?php if($page_no < $total_no_of_pages){
				echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
				} ?>
		</ul>
		
		<?php } ?>
	
        </div>	
		
    </div>


<div class="py-5">
	<div class="container">
			<form method="post" id="manuscriptform" enctype="multipart/form-data" 
		action="manuscript.php">
		
		<div class="hx-site-title-1 text-center">
		<h2 class="text-center mb-6">Submit Manuscript Here</h2>
                </div>
		<div class="card p-4">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Your Full Name</label>
						<input type="text" class="form-control" placeholder="Full Name" name="name" id="name" required="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Your Email</label>
						<input type="email" class="form-control" placeholder="Your Email" name="email" id="email" required="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Your Contact Number</label>
						<input type="tel" class="form-control" placeholder="Your Contact Number" name="phone" id="phone"
							required="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Your Title of Article</label>
						<input type="text" class="form-control" placeholder="Your Title of Article" name="title" id="title" required="">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Your Subject</label>
						<div>
							<input type="text" class="form-control w-100" placeholder="Write something..." name="message" id="message" required="">
							
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
			     	<div class="upload-content">
						<div class="upload-file h-100">
						<img src="./assets/images/cloud-computing.png" alt="cloud computing" width="25" height="25" class="ml-2">
					    	<input type="file" name="uploaded_file" class="form-control p-1 shadow-none w-30"id="file" required>
						</div>
					
						</div>
						 <label for="file" style="color:red;">Please upload files that are under 2 mb* </label>
					</div>
				</div>

				<div class="col-md-12 text-right">
					<input type="submit" class="theme-btn" value="Submit">
				</div>
			</div>
		</div>
			
		</form>
	</div>
</div>






<?php include "layouts/main-footer.php"; ?>
