<?php
include "layouts/main-header.php"; 
	$query = "SELECT * FROM tbl_about_us ORDER BY about_us_id_pk DESC LIMIT 1";
	$runQuery   =  $connect->query($query);
	$dataObj    =  $runQuery->fetch_object();
?>
<style>
    .about-list li {
        list-style: disc;
    }

    .about-list {
        padding-left: 20px;
    }
</style>

<div class="top-header marquee pt-2">
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-md-12">
                <div class="marquee_text">
                    <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"><a
                            href="file:///C:/Users/user/Downloads/AFI-Project/AFI-Project/membership.html">AFI
                            Membership Plans</a></marquee>
                    <marquee behavior="scroll" direction="Right" onmouseover="this.stop();" onmouseout="this.start();">
                        <a href="#">Ayurved Arjun Event</a>
                    </marquee>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- about-area start-->
<div class="hx-about-style-3 py-5">
    <div class="container">
        <h1>About Us</h1>
        <p><strong>
                AFI is the Constituent Body of Ayurveda Vigyan Forum. Established in 2021, and the only apex
                Ayurveda organisation of India registered with the central government. </strong></p>
        <p><strong>A non-government, not-for-profit organisation, AFI is the voice of India's Ayurveda ecosystem and
                its stakeholders.</strong></p>
        <p><strong>From influencing policy to encouraging debate, engaging with policy makers of health and Ayurveda
                and civil society, AFI articulates the views and concerns of industry. </strong></p>
        <p><strong>
                AFI provides a platform for networking and consensus building within and across sectors and is
                the first port of call for Ayurveda industry, policy makers and the international Ayurveda
                community.</strong>
        </p>
        <p>The Ayurveda Federation of India (AFI) is the premier apex body representing the diverse and
            dynamic Ayurveda ecosystem in India. Established in 2021 and officially registered with the
            Central Government, AFI operates as a non-government, not-for-profit organisation. We serve as
            the unified voice for Ayurveda practitioners, stakeholders, and the broader industry, advocating
            for the growth, recognition, and integration of Ayurveda as a vital component of healthcare in
            India and globally.</p>

        <h2 class="mt-5 mb-2"> Our Mission</h2>
        <p>AFI is dedicated to promoting and advancing Ayurveda as the first line of treatment and public
            health improvement. We strive to uphold the honour and dignity of Ayurveda practitioners, foster
            cooperation among members, and build a strong, informed, and globally competitive Ayurveda
            community. Our mission extends to mentoring and supporting Ayurveda practitioners in acquiring
            expertise in technology, commerce, finance, and overall skill development to ensure global
            competitiveness.</p>

        <h2 class="mt-5 mb-2"> Our Vision</h2>
        <p>We envision an India where Ayurveda is at the forefront of healthcare, integrated seamlessly into
            the national health policy and recognized globally for its contributions to public health and
            well-being. AFI aims to create a policy environment conducive to the growth and development of
            Ayurveda and its practitioners, ensuring that the rich legacy of Ayurveda continues to thrive in
            the modern world.
        <p>


        <h2 class="mt-5 mb-2"> What We Do</h2>
        <ul class="about-list">
            <li class="mb-2">
                <strong> Policy Advocacy:</strong> AFI plays a proactive role in influencing and shaping
                policies related to Ayurveda by engaging with health policymakers, civil society, and
                international bodies. We work as a policy advisory body on matters concerning Ayurveda
                clinical practice, education, and research, ensuring that the voices of Ayurveda
                practitioners are heard and respected.
            </li>
            <li class="mb-2">
                <strong> Networking and Consensus Building:</strong> We provide a platform for networking,
                fostering collaboration, and building consensus within the Ayurveda community and across
                related sectors. AFI is the first point of contact for industry stakeholders, policymakers,
                and the international Ayurveda community, facilitating dialogue and cooperation.

            </li>
            <li class="mb-2">
                <strong> Skill Development and Capacity Building: </strong> Through seminars, workshops,
                training programs, and exhibitions, AFI equips Ayurveda practitioners with the knowledge and
                skills needed to excel in their fields. We promote research and the dissemination of
                information to enhance the quality and efficacy of Ayurveda practices.
            </li>
            <li class="mb-2">
                <strong>Global Outreach:</strong> AFI is committed to promoting Indian Ayurveda products and
                services in international markets. We facilitate joint ventures and partnerships between
                Indian companies and the global diaspora, expanding the reach and impact of Ayurveda
                worldwide.

            </li>
            <li class="mb-2">
                <strong>Public Health Initiatives: </strong> AFI organises free Ayurveda camps,
                dispensaries, and medical consultations to provide essential healthcare services to the poor
                and needy. We are dedicated to improving public health through the widespread adoption of
                Ayurveda.

            </li>
        </ul>

        <h2 class="mt-5 mb-2">Our Commitment </h2>
        <p> AFI is committed to the welfare and interests of Ayurveda practitioners and entrepreneurs. We
            actively seek solutions to their challenges and advocate for their rights and recognition. Our
            efforts are aimed at ensuring that Ayurveda is not only preserved but also flourishes in the
            modern healthcare landscape.
            Join us in our journey to elevate Ayurveda to new heights and make it an integral part of global
            health and wellness. Together, we can achieve a healthier, more balanced world rooted in the
            wisdom of Ayurveda.
        </p>
    </div>
</div>

<!-- about-area end-->

<div class="join_india py-5">
    <div class="container">
        <div class="hx-site-title-1 text-center">
            <span>Join with Us</span>
            <h2>Join Ayurveda Federation of India</h2>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="ayurveda">
                    <div class="row align-items-center">
                        <div class="col-md-4 mb-3 text-center">
                            <a href="membership.php">
                                <img src="assets/images/afi3.png" class="img-fluid afilift">
                            </a>
                        </div>
                        <div class="col-md-4 mb-3 text-center">

                            <div class="d-flex justify-content-center align-items-center text-center">
                                <a>
                                    <h3>Facebook Followers</h3>
                                    <h2>4.8K</h2>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 text-center">
                            <a href="certificate-page.php">
                                <img src="assets/images/afi2-new.png" class="img-fluid afilift">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "layouts/main-footer.php"; ?>