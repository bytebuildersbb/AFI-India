<?php include "../layouts/main-header.php"; 

    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
        $page_no = $_GET['page_no'];
    }else{
        $page_no = 1;
    }

    $total_records_per_page = 8;
    
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


$getMetas   =  "SELECT * FROM tbl_blog where type='1' order by blog_id_pk Desc LIMIT $offset, $total_records_per_page";
$runQuery   =  $connect->query($getMetas);

$getMetass   =  "SELECT * FROM tbl_blog where type='1' order by blog_id_pk Desc LIMIT 5";
$runQuerys   =  $connect->query($getMetass);
?>

	<div class="breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Blog | News</h2>
                        <ul>
                            <li><a href="<?php echo BASEPATH;?>index.php">Home</a></li>
                            <li><span>Blog | News</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- hx-blog-area start -->
    <div class="hx-blog-area py-5">
        <div class="container">
            <div class="col-l2">
                <div class="hx-site-title-1 text-center">
                    <span>From Our Blog</span>
                    <h2>Latest News</h2>
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-4 col-md-8 col-sm-10 col-12">
                    <div class="hx-blog-sidebar">
                       
                        <div class="widget recent-post-widget">
                            <h3>Recent Articles</h3>
                            <div class="posts">
								
								<?php if(mysqli_num_rows($runQuerys) >= 1 ){
        
								while($rows = $runQuerys->fetch_object()) { 
								?>
							
                                <div class="post">
                                    <div class="img-holder">
                                        <img src="<?php echo BASEPATH;?>admin/uploads/blogs/<?php echo $rows->blogImg; ?>" alt>
                                    </div>
                                    <div class="details">
                                        <h4><a href="detail.php?q=<?php echo $rows->urlSlug; ?>"><?php echo $rows->blogTitle; ?></a></h4>
                                    </div>
                                </div>
								<?php } } ?>
                                
                            </div>
                        </div>
						<?php 
                        $querys = "SELECT * FROM tbl_blog_category ORDER BY blog_category_id_pk DESC LIMIT 5";
                        $runQuerys   =  $connect->query($querys);
						?>
						<div class="widget tag-widget">
							<h3>Post Category</h3>
							<ul>
								<?php  while($rowx = $runQuerys->fetch_object()){?>
									<li><a href="category.php?q=<?php echo $rowx->blog_category_id_pk; ?>"><?php echo $rowx->categoryName; ?></a></li>
								<?php } ?>
							</ul>
						</div>	
                        
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
					
						<?php if(mysqli_num_rows($runQuery) >= 1 ){
        
							while($row = $runQuery->fetch_object()) { 
							$dat = date_create($row->createdOn);
							$blogdate =  date_format($dat,"d M Y");
							?>
						
							<div class="col-lg-6 col-md-6 col-12">
								<div class="hx-blog-item">
									<div class="hx-blog-img">
										<img src="<?php echo BASEPATH;?>admin/uploads/blogs/<?php echo $row->blogImg; ?>" alt="">
									</div>
									<div class="hx-blog-content">
										<h3><a href="detail.php?q=<?php echo $row->urlSlug; ?>"><?php echo $row->blogTitle; ?></a></h3>
										<?php echo substr(base64_decode($row->blogContent), 0, 50); ?>										
									
										<ul class="post-meta">
											<li><img src="<?php echo BASEPATH;?>assets/images/blog/6.jpg" alt=""></li>
											<li>By<a href="#">Admin</a></li>
											<li><?php echo $blogdate; ?></li>
										</ul>
									</div>
								</div>
							</div>
						
						<?php } }else{ ?>
            
							<div class="col-12 col-md-4">
								<p>No Blog Found!</p>
							</div>
								
						<?php } ?>
						
                        
                     </div>
                     <div class="pagination-wrapper pagination-wrapper-left pt-4 pb-4">
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

			</div>
		</div>
		<!-- hx-blog-area start -->


<div class="join_india py-2">
    <div class="container">
        <div class="hx-site-title-1 text-center">
            <span>Join with Us</span>
            <h2>Join Ayurveda Federation of India</h2>
        </div>
        <div class="ayurveda">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 text-center">
                    <a href="membership.php">
                        <img src="../assets/images/afi3.png" class="img-fluid afilift">
                    </a>
                </div>
                     <div class="col-md-4 mb-3 text-center">
                            <a href="#">
                                <img src="../assets/images/certificate.png" class="img-fluid afilift">
                            </a>
                        </div>
                <div class="col-md-4 mb-3 text-center">
                    <a href="certificate-page.php">
                        <img src="../assets/images/afi2-new.png" class="img-fluid afilift">
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
		
		


		
		
	</div>




<?php include "../layouts/main-footer.php"; ?>