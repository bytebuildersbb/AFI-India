<?php 
error_reporting(E_ALL); 
ini_set('display_errors', '1');
include "../layouts/main-header.php"; 

$url  =  $_REQUEST['q'];

$blogQuery  =  "SELECT * FROM tbl_blog WHERE urlSlug = '$url'";
$runQuery   =  $connect->query($blogQuery);
$dataObject =  $runQuery->fetch_object();

$dat = date_create($dataObject->createdOn);
$blogdate =  date_format($dat,"d M Y");

$content = base64_decode($dataObject->blogContent);

$getMetass   =  "SELECT * FROM tbl_blog where type='1' order by blog_id_pk Desc LIMIT 5";
$runQuerys   =  $connect->query($getMetass);

?>

	<section class="hx-blog-single-section hx-section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="hx-blog-content clearfix">
                        <div class="post">
                            <div class="entry-media">
                                <img src="<?php echo BASEPATH;?>admin/uploads/blogs/<?php echo $dataObject->blogImg; ?>" alt>
                            </div>
                            <ul class="entry-meta">
                                <li>
                                    <img src="<?php echo BASEPATH;?>assets/images/blog/author.jpg" alt>
                                    &nbsp; By <a href="#">Admin</a>
                                </li>
                                <li><?php echo $blogdate; ?></li>
                            </ul>
                            <?php echo $content; ?>
                        </div>

                        <!--div class="tag-share clearfix">
                            <div class="share">
                                <ul>
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div--> <!-- end tag-share -->

                        <!--div class="author-box">
                            <div class="author-avatar">
                                <a href="#"><img src="<?php echo BASEPATH;?>assets/images/blog-details/author.jpg" alt></a>
                            </div>
                            <div class="author-content">
                                <a href="#" class="author-name">Henry Joyes</a>
                                <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised</p>
                                <div class="socials">
                                    <ul class="social-link">
                                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div--> <!-- end author-box -->
                        <!--div class="more-posts clearfix">
                            <div class="previous-post">
                                <a href="#">
                                    <span class="post-control-link">Previous</span>
                                </a>
                            </div>
                            <div class="next-post">
                                <a href="0.html">
                                    <span class="post-control-link">Next post</span>
                                </a>
                            </div>
                        </div--> <!-- end more-posts -->

                        <!--div class="comments-area">
                            <div class="comments-section">
                                <h3 class="comments-title">Comments</h3>
                                <ol class="comments">
                                    <li class="comment even thread-even depth-1" id="comment-1">
                                        <div id="div-comment-1">
                                            <div class="comment-theme">
                                                <div class="comment-image"><img src="assets/images/blog-details/comments-author/img-1.jpg" alt></div>
                                            </div>
                                            <div class="comment-main-area">
                                                <div class="comment-wrapper">
                                                    <div class="comments-meta">
                                                        <h4>John Abraham <span class="comments-date">Octobor 28,2019 At 9.00am</span></h4>
                                                    </div>
                                                    <div class="comment-area">
                                                        <p>I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, </p>
                                                        <div class="comments-reply">
                                                            <a class="comment-reply-link" href="#"><span>Reply</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="children">
                                            <li class="comment">
                                                <div>
                                                    <div class="comment-theme">
                                                        <div class="comment-image"><img src="assets/images/blog-details/comments-author/img-2.jpg" alt></div>
                                                    </div>
                                                    <div class="comment-main-area">
                                                        <div class="comment-wrapper">
                                                            <div class="comments-meta">
                                                                <h4>Lily Watson <span class="comments-date">Octobor 28,2019 At 9.00am</span></h4>
                                                            </div>
                                                            <div class="comment-area">
                                                                <p>I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, </p>
                                                                <div class="comments-reply">
                                                                    <a  class="comment-reply-link" href="#"><span>Reply</span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="comment">
                                                        <div>
                                                            <div class="comment-theme">
                                                                <div class="comment-image"><img src="assets/images/blog-details/comments-author/img-1.jpg" alt></div>
                                                            </div>
                                                            <div class="comment-main-area">
                                                                <div class="comment-wrapper">
                                                                    <div class="comments-meta">
                                                                        <h4>John Abraham <span class="comments-date">Octobor 28,2019 At 9.00am</span></h4>
                                                                    </div>
                                                                    <div class="comment-area">
                                                                        <p>I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, </p>
                                                                        <div class="comments-reply">
                                                                            <a  class="comment-reply-link" href="#"><span>Reply</span></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="comment">
                                        <div>
                                            <div class="comment-theme">
                                                <div class="comment-image"><img src="assets/images/blog-details/comments-author/img-2.jpg" alt></div>
                                            </div>
                                            <div class="comment-main-area">
                                                <div class="comment-wrapper">
                                                    <div class="comments-meta">
                                                        <h4>Lily Watson <span class="comments-date">Octobor 28,2019 At 9.00am</span></h4>
                                                    </div>
                                                    <div class="comment-area">
                                                        <p>I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, </p>
                                                        <div class="comments-reply">
                                                            <a  class="comment-reply-link" href="#"><span>Reply</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div> <!-- end comments-section -->

                            <!--div class="comment-respond">
                                <h3 class="comment-reply-title">Post Comments</h3>
                                <form method="post" id="commentform" class="comment-form">
                                    <div class="form-textarea">
                                        <textarea id="comment" placeholder="Write Your Comments..."></textarea>
                                    </div>
                                    <div class="form-inputs">
                                        <input placeholder="Website" type="url">
                                        <input placeholder="Name" type="text">
                                        <input placeholder="Email" type="email">
                                    </div>
                                    <div class="form-submit">
                                        <input id="submit" value="Post Comment" type="submit">
                                    </div>
                                </form>
                            </div-->
                        </div--> <!-- end comments-area -->
                    </div>
                </div>
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
                        $query = "SELECT * FROM tbl_blog_category ORDER BY blog_category_id_pk DESC LIMIT 5";
                        $runQuery   =  $connect->query($query);
                    ?>
                    <div class="widget tag-widget">
                        <h3>Post Category</h3>
                        <ul>
							<?php  while($row = $runQuery->fetch_object()){?>
								<li><a href="category.php?q=<?php echo $row->blog_category_id_pk; ?>"><?php echo $row->categoryName; ?></a></li>
							<?php } ?>
                        </ul>
                    </div>		
                   
                </div>
            </div>
            </div>
        </div> <!-- end container -->
    </section>
    

<?php include "../layouts/main-footer.php"; ?>
