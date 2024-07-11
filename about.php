<?php
include "layouts/main-header.php"; 
	$query = "SELECT * FROM tbl_about_us ORDER BY about_us_id_pk DESC LIMIT 1";
	$runQuery   =  $connect->query($query);
	$dataObj    =  $runQuery->fetch_object();
?>

	<div class="top-header marquee pt-2">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-md-12">
                    <div class="marquee_text">
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop();"
                            onmouseout="this.start();"><a
                                href="file:///C:/Users/user/Downloads/AFI-Project/AFI-Project/membership.html">AFI
                                Membership Plans</a></marquee>
                        <marquee behavior="scroll" direction="Right" onmouseover="this.stop();"
                            onmouseout="this.start();"><a href="#">Ayurved Arjun Event</a></marquee>
                    </div>
                </div>

            </div>
        </div>
    </div>
	
	<!-- about-area start-->
     <div class="hx-about-style-3 pb-5">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 col-12">
                    <div class="hx-about-content">
                        <div class="hx-site-title">
                            <h1>About Us</h1>
                        </div>                        
                        <p>
                        Ayurveda Federation of India is an organization established three years ago. Our aim was to provide a platform for people associated with Ayurveda across the country to come together. There are many organizations in the field of Ayurveda, but certain aspects compelled us to think that we should take some special actions.
                        </p>
                                  
						<!-- <div class="btn-style"><a href="mission.php">अधिक देखें!</a></div> -->
                        <h2 class="mt-3">Our Previous Activities:</h2>
                        <p>Since the formation of the Ayurveda Federation of India, we have worked on several Ayurvedic issues over the past two years. We faced challenges in our activities, deeply considered them, and took several successful steps to resolve them.</p>
                      
                        <h2 class="mt-3">Committees and Activities:</h2>
                        <p>Our organization has various committees working in different fields. </p>
                        <ul>
                            <li>- International Committee: We have formed an international representative organization that is working to present India's Ayurvedic practices to the world.</li>
                            <li>- Student Committee: We have an internal platform to address the issues of students at the national level.</li>
                            <li>- Educational Committee: This committee is striving to elevate the standards of higher education and medical skills in Ayurveda.</li>
                        </ul>
                        <h2 class="mt-3">Stringent Actions:</h2>
                        <p>
                        Our organization has deeply examined the issues in Ayurveda and made rigorous efforts to address them. Our members are contributing in their respective fields to face challenges and improve Ayurveda.</p>
                        <h2 class="mt-3">Working on Legal Policies in Ayurveda: </h2>
                        <p>We are also working on legal issues in the field of Ayurveda, such as Ayurvedic injections and the development of doctor appointments in Ayurveda. Our aim is to see development in the Ayurvedic field and for it to be accepted as an important medical system.</p>

                        <p>Ayurveda Federation of India is an organization that takes Ayurvedic problems seriously and faces difficulties to solve them. We want Ayurveda to play a significant role both in the world and in India and to help advance this ancient medical system.</p>

                        <p>Ayurveda Federation of India (AFI) is an ideal organization committed to solving Ayurvedic problems. Our objective is to bring all representatives on a platform to work together with mutual consent, so we can improve Ayurveda.</p>

                        <h2 class="mt-3">Our Members and Committees:  </h2>
                        <p>Our organization’s members possess expertise in various fields and participate in different committees that contribute to the development of Ayurveda. Our International Body works to present our Ayurvedic heritage globally, while the National Committee focuses on highlighting Ayurvedic issues in India.</p>
                        <p>Our members include regular Ayurvedic doctors, pharmacists, teachers, and professionals from various fields, all contributing to enriching Ayurveda. We are also working on legal policies in Ayurveda, such as Ayurvedic injections and the development of Ayurvedic doctor appointments. We strive to make Ayurveda better and gain worldwide acceptance. </p>
                        <p>We deeply consider the development of Ayurveda, addressing every stakeholder’s challenges. We are determined to collectively advance Ayurveda and promote it as a significant medical system both nationally and globally.</p>

                        <h2 class="mt-3">Direction of Ayurveda Federation of India:</h2>
                        <h5 class="mt-3">
                            1. Organization's Objective:   </h5>
                            <ul>
                                <li> - Obtained registration from the Ministry of Corporate Affairs, Government of India on Doctor's Day.</li>
                                <li> - Working towards resolving issues with various Ayurveda organizations in the country.</li>
                            </ul>
  
                            <h5 class="mt-3">2. Commencement of Work: </h5>
                            <ul>
                                <li> - Formed a committee to solve problems.</li>
                                <li>- Obtained registration from the Central Government.</li>
                            </ul>
                            
                              <h5 class="mt-3">
                                3. Ayurvedic Education Matters: </h5>
                            <ul>
                                <li>  - Addressed the issue of unauthorized colleges in Uttar Pradesh.</li>
                                <li>   - Resolved registration issues despite most students being qualified.</li>
                            </ul>
   

                              <h5 class="mt-3">     4. Problem Solving:</h5>
                                <ul>
                                    <li>  - Worked on resolving issues in Ayodhya.</li>
                                    <li>- Provided recognition for BMC students in Haryana.</li>
                                </ul>
                              <h5 class="mt-3">5. Additional Issues:</h5>
                                <ul>
                                    <li>  - Addressed topics like radiology and the PCPNDT Act.</li>
                                    <li> - This organization works on such recognized issues.</li>
                                </ul>

                                <h5 class="mt-3">6. Role of the Federation:</h5>
                                <ul>
                                    <li>  - Assists in Ayushman Bharat, Ayurvedic science, and other medical matters.</li>
                                </ul>

                                <h5 class="mt-3">7. Public Health Sensitivity:</h5>
                                <ul>
                                    <li>  - Recognized organization working on constitutional and social issues.</li>
                                </ul>

                                <h5 class="mt-3">8. Global Science and Legal Action in Ayurveda:</h5>
                                <ul>
                                    <li>  - Working for more alternatives.</li>
                                </ul>

                            <h5 class="mt-3">9. New Avenues for Health and Social Integration in Ayurveda:</h5>
                                <ul>
                                    <li>  - Raising awareness about the importance of Ayurveda among the government and people. </li>
                                    <li>- Promoting Ayurvedic medicine further.</li>
                                </ul>

                             <h5 class="mt-3">10. Support and Recognition of Ayurveda and Medical Practice:</h5>
                                 <ul>
                                    <li> - Working with more related individuals to organize efforts. </li>
                                    <li>- Facilitating government recognition for Ayurvedic practitioners.</li>
                                </ul>








                  </div>
                </div>
                <!-- <div class="col-lg-5 col-sm-12">
                    <div class="hx-about-img">
                       <img src="<?= IMG_PATH; ?>about-us/<?php echo $dataObj->aboutUs_img; ?>" alt=""> 
                    </div>
                </div> -->
            </div>
         <!-- .hx-counter-area end -->
        </div>
    </div>
    <!-- about-area end-->
    
     <!-- about-area start-->
    <div class="hx-about-style-3 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-12">
                    <div class="hx-about-img">
                       <img src="<?= IMG_PATH; ?>about-us/<?php echo $dataObj->aboutUs_img; ?>" alt=""> 
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="hx-about-content">
                        <div class="hx-site-title">
                            <h2>About Ayurveda</h2>
                        </div>                        
                        <p><?= $dataObj->aboutFounder; ?></p>
                    </div>
                </div>
            </div>
         <!-- .hx-counter-area end -->
        </div>
    </div>
    <!-- about-area end-->
    
	<div class="join_india ptb-100-70">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-l2">
                    <div class="hx-site-title-1 text-center">
                        <span>Join with Us</span>
                        <h2>Join Ayurveda Federation of India</h2>
                    </div>
                </div>

                <div class="col-12">
                    <div class="ayurveda">
                        <div class="row">
                            <div class="col-md-4 col-12 mb-3 ">
                                <a href="member-id-card.php"><img src="assets/images/afi1.png"
                                        class="img-fluid afilift"></a>
                            </div>
                            <div class="col-md-4 col-12 mb-3 ">
                                <img src="assets/images/afi2.png" class="img-fluid afilift">
                            </div>
                            <div class="col-md-4 col-12 mb-3 ">
                                <a href="membership.php"><img src="assets/images/afi3.png"
                                        class="img-fluid afilift"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<?php include "layouts/main-footer.php"; ?>