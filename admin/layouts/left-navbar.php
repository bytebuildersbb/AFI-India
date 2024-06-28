<div class="container-fluid page-body-wrapper">
	<!-- partial:partials/_sidebar.html -->
	<nav class="sidebar sidebar-offcanvas" id="sidebar">
		<ul class="nav">
			<li class="nav-item">
				<a class="nav-link" data-url="dashboard" href="../dashboard/">
					<span class="menu-title">Dashboard</span>
					<i class="icon-screen-desktop menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="settings" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
					<span class="menu-title">Settings</span>
					<i class="icon-settings menu-icon"></i>
				</a>
				<div class="collapse" id="ui-basic">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="settings" href="../settings/slider.php">Slider</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="settings" href="../settings/achievements-memories.php"> Achievement & Memories</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="settings" href="../settings/about-us.php">About Us</a></li>						
						<li class="nav-item"> <a class="nav-link" data-url="settings" href="../settings/member-count.php">Member Count</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="blogs" data-toggle="collapse" href="#ui-blog" aria-expanded="false" aria-controls="ui-blog">
					<span class="menu-title">Blogs | News</span>
					<i class="icon-book-open menu-icon"></i>
				</a>
				<div class="collapse" id="ui-blog">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="blogs" href="../blogs/">Create Blog</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="blogs" href="../blogs/listing">Blog List</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="blogs" href="../blogs/createcategory.php">Create Category</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="blogs" href="../blogs/catlisting.php">Category List</a></li>
					</ul>
				</div>
			</li>
			<!--<li class="nav-item active">
				<a class="nav-link" data-toggle="collapse" href="#ui-blogg" aria-expanded="false" aria-controls="ui-blogg">
					<span class="menu-title">News</span>
					<i class="icon-book-open menu-icon"></i>
				</a>
				<div class="collapse" id="ui-blogg">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" href="../news/">Add News</a></li>
						<li class="nav-item"> <a class="nav-link" href="../news/listing">News List</a></li>
					</ul>
				</div>
			</li> -->
			<li class="nav-item">
				<a class="nav-link" data-url="article" data-toggle="collapse" href="#ui-navbarr" aria-expanded="false" aria-controls="ui-navbar">
					<span class="menu-title">Article</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="ui-navbarr">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="article" href="../article/">Add</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="article" href="../article/listing">List</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="video" data-toggle="collapse" href="#ui-bloggg" aria-expanded="false" aria-controls="ui-bloggg">
					<span class="menu-title">Video</span>
					<i class="icon-book-open menu-icon"></i>
				</a>
				<div class="collapse" id="ui-bloggg">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="video" href="../video/">Add Video</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="video" href="../video/listing">Video List</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="form" data-toggle="collapse" href="#ui-blogggg" aria-expanded="false" aria-controls="ui-blogggg">
					<span class="menu-title">Membership / Course Data</span>
					<i class="icon-book-open menu-icon"></i>
				</a>
				<div class="collapse" id="ui-blogggg">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="form" href="../form/index.php">Membership Data</a></li>
						<!--<li class="nav-item"> <a class="nav-link" data-url="form" href="../form/data2.php">Patron</a></li>-->
						<li class="nav-item"> <a class="nav-link" data-url="form" href="../form/download.php">Membership Download</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="form" href="../form/couse.php">Course Data</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="form" href="../form/couseD.php">Course Data Download</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="committee" href="../committee/">
					<span class="menu-title">Core Committee</span>
					<i class="icon-people menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="contactus" href="../contactus/">
					<span class="menu-title">Contact Us List</span>
					<i class="icon-phone menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="memberships" href="../memberships/">
					<span class="menu-title">Membership</span>
					<i class="icon-wallet menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="navbar" data-toggle="collapse" href="#ui-navbar" aria-expanded="false" aria-controls="ui-navbar">
					<span class="menu-title">Navbar</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="ui-navbar">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="navbar" href="../navbar/">Navbar</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="navbar" href="../navbar/listing">List</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="pageMeta" data-toggle="collapse" href="#ui-pageMeta" aria-expanded="false" aria-controls="ui-pageMeta">
					<span class="menu-title">Page Meta</span>
					<i class="icon-book-open menu-icon"></i>
				</a>
				<div class="collapse" id="ui-pageMeta">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="pageMeta" href="../pageMeta/">Create Meta</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="pageMeta" href="../pageMeta/listing">Page Meta List</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="create-page" href="../create-page/">
					<span class="menu-title">Create Page</span>
					<i class="icon-doc menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="maintenance" href="../maintenance/">
					<span class="menu-title">Maintenance Mode</span>
					<i class="icon-arrow-down-circle menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="subscribers" href="../subscribers/">
					<span class="menu-title">Newsletter Subscribers</span>
					<i class="icon-menu menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="related-links" href="../related-links/">
					<span class="menu-title">Related Links</span>
					<i class="icon-arrow-down-circle menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="tranaction" href="../tranaction/">
					<span class="menu-title">Transaction History</span>
					<i class="icon-arrow-down-circle menu-icon"></i>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="doctors" data-toggle="collapse" href="#ui-doctorInfo" aria-expanded="false" aria-controls="ui-doctorInfo">
					<span class="menu-title">Dr. INFO | Achievement</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="ui-doctorInfo">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="doctors" href="../doctors/listing">List</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="doctors" href="../doctors/">Create</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="course" data-toggle="collapse" href="#ui-addcourse" aria-expanded="false" aria-controls="ui-addcourse">
					<span class="menu-title">Course</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="ui-addcourse">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="course" href="../course/">Add Course</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="course" href="../course/listing">Course List</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="events" data-toggle="collapse" href="#events" aria-expanded="false" aria-controls="events">
					<span class="menu-title">Events</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="events">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="events" href="../events/">Add Event</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="events" href="../events/listing">Events List</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="agnilist" data-toggle="collapse" href="#agnilist" aria-expanded="false" aria-controls="agnilist">
					<span class="menu-title">Agnivesh Journal List</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="agnilist">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="agnilist" href="../agnilist/">List</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="mpracticeslist" data-toggle="collapse" href="#mpracticeslist" aria-expanded="false" aria-controls="mpracticeslist">
					<span class="menu-title">Medical Practices List</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="mpracticeslist">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="mpracticeslist" href="../mpracticeslist/">List</a></li>
					</ul>
					<!--<ul class="nav flex-column sub-menu">-->
					<!--	<li class="nav-item"> <a class="nav-link" data-url="mpractices_trans" href="../mpractices_trans/">MP Transaction List</a></li>-->
					<!--</ul>-->
				</div>
			</li>
			<!--<li class="nav-item">-->
			<!--	<a class="nav-link" data-url="mpractices_trans" data-toggle="collapse" href="#mpractices_trans" aria-expanded="false" aria-controls="mpractices_trans">-->
			<!--		<span class="menu-title">MP Transaction List</span>-->
			<!--		<i class="icon-menu menu-icon"></i>-->
			<!--	</a>-->
			<!--	<div class="collapse" id="mpractices_trans">-->
			<!--		<ul class="nav flex-column sub-menu">-->
			<!--			<li class="nav-item"> <a class="nav-link" data-url="mpractices_trans" href="../mpractices_trans/">List</a></li>-->
			<!--		</ul>-->
			<!--	</div>-->
			<!--</li>-->
			<li class="nav-item">
				<a class="nav-link" data-url="halist" data-toggle="collapse" href="#halist" aria-expanded="false" aria-controls="halist">
					<span class="menu-title">Health-Ambassador List</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="halist">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="halist" href="../halist/">List</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="coupon_health_amb" data-toggle="collapse" href="#coupon_health_amb" aria-expanded="false" aria-controls="coupon_health_amb">
					<span class="menu-title">HA Coupon List</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="coupon_health_amb">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="coupon_health_amb" href="../coupon_health_amb/">List</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="coupon_medical_pract" data-toggle="collapse" href="#coupon_medical_pract" aria-expanded="false" aria-controls="coupon_medical_pract">
					<span class="menu-title">MP Coupon List</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="coupon_medical_pract">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="coupon_medical_pract" href="../coupon_medical_pract/">List</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="publications" data-toggle="collapse" href="#publications" aria-expanded="false" aria-controls="publications">
					<span class="menu-title">Publications</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="publications">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="publication" href="../publication/">Add Publication</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="publication" href="../publication/listing">Publications List</a></li>
						<!--li class="nav-item"> <a class="nav-link" data-url="publication" href="../publication/logs.php">Publications Logs</a></li-->
						<li class="nav-item"> <a class="nav-link" data-url="publication" href="../publication/view_listing.php">Publications Logs</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="foundingTeam" data-toggle="collapse" href="#foundingTeam" aria-expanded="false" aria-controls="foundingTeam">
					<span class="menu-title">Founding Team</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="foundingTeam">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="foundingTeam" href="../foundingTeam/">Add Team</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="foundingTeam" href="../foundingTeam/listing">Founding Team List</a></li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-url="gallery" data-toggle="collapse" href="#gallery" aria-expanded="false" aria-controls="gallery">
					<span class="menu-title">Gallery</span>
					<i class="icon-menu menu-icon"></i>
				</a>
				<div class="collapse" id="gallery">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item"> <a class="nav-link" data-url="gallery" href="../gallery/">Add Image</a></li>
						<li class="nav-item"> <a class="nav-link" data-url="gallery" href="../gallery/listing">Image List</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</nav>
	