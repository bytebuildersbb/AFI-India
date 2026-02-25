<?php
session_start();
$successMessage = $_SESSION['successMessage'] ?? '';
unset($_SESSION['successMessage']);


include "./Certified_Natural_Health_Ambassador_Program/connection.php";
include "./Certified_Natural_Health_Ambassador_Program/encrption.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    // Collect POST data
    $name          = $_POST['name'] ?? '';
    $address       = $_POST['address'] ?? '';
    $mobile        = $_POST['mobile'] ?? '';
    $email         = $_POST['email'] ?? '';
    $qualification = $_POST['qualification'] ?? '';
    $programType   = $_POST['programType'] ?? '';
    $basefare      = $_POST['basefare'] ?? 'INR 0';
    $basefare      = (int) filter_var($basefare, FILTER_SANITIZE_NUMBER_INT);

    // Validation
    if (!$name || !$mobile || !$email || !$programType || !$qualification || !$address) {
        echo json_encode([
            "success" => false,
            "message" => "Required fields missing"
        ]);
        exit;
    }

    // 1️⃣ Check email exists
    $check = $conn->prepare("
        SELECT Id
        FROM `Certified Natural Health Ambassador Program Registration`
        WHERE `Email ID` = ?
    ");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo json_encode([
            "success" => false,
            "message" => "This email is already registered"
        ]);
        $check->close();
        $conn->close();
        exit;
    }
    $check->close();

    // 2️⃣ Insert full record (FROM submit_registration.php)
    $insert = $conn->prepare("
        INSERT INTO `Certified Natural Health Ambassador Program Registration`
        (
            `Name`,
            `Mobile`,
            `Address`,
            `Email ID`,
            `Qualification`,
            `Program_Type`,
            `Total Fees`,
            `Registration_Time`
        )
        VALUES (?,?, ?, ?, ?, ?, ?, NOW())
    ");

    $insert->bind_param(
        "ssssssi",
        $name,
        $mobile,
        $address,
        $email,
        $qualification,
        $programType,
        $basefare
    );

    if ($insert->execute()) {
       $encryptedEmail = urlencode(encryptData($email));
        $encryptedFlag = urlencode(encryptData('false'));
        echo('Email:' . $encryptedEmail);
        
        header("Location: ./Certified_Natural_Health_Ambassador_Program/payment.php?e=$encryptedEmail&&c=$encryptedFlag");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $insert->close();
    $conn->close();
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certified Natural Health Ambassador (CNHA) Program</title>
    <link rel="stylesheet" href="https://afi-india.in/css/style.css">
    <link rel="stylesheet" href="https://afi-india.in/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://afi-india.in/css/responsive.css">
    <link rel="stylesheet" href="./Certified_Natural_Health_Ambassador_Program/styles.css">
    <style type="text/css">
        .increaseLineHeight li {
            line-height: 2.5;
        }
    </style>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <section class="course-details section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="course-content">
                        <h2 class="section-title">Certified Natural Health Ambassador (CNHA)</h2>
                        <p class="lead text-center"><b>अपने परिवार और समाज के स्वास्थ्य संरक्षक बनें! </b>
                            <br />
                            Be the True Health Guardian and Real-Life Hero for Your Family & Community!
                            <br />
                            <b><i>(Course Designed as per Skill India Parameters)</i></b>
                        </p>
                        <!--<div class="imageParent">-->
                        <!--    <img src="./Certified_Natural_Health_Ambassador_Program/img/Image-whatCNHA..jpeg"-->
                        <!--        alt="CME Event 2">-->
                        <!--</div>-->
                        <p class="ntext"><strong>Date:</strong> 24 January 2026 Onwards(2 Class Weekly)<br>
                            <strong>Time:</strong> 7:00 PM Onwards<br>
                            <strong>Mode:</strong> 100% Online (Join from Anywhere)<br>
                            <strong>Eligibility:</strong> Post Graduated/ Graduated/ Intermediate/ High School
                        </p>
                        <div class="imageParent">
                            <img src="./Certified_Natural_Health_Ambassador_Program/img/why2.jpeg"
                                alt="CME Event 2">
                        </div>

                        <div class="mt-5">
                            <h3 class="strip"> क्यों जुड़ना चाहिए? Why Join? </h3>
                            <ul class="ntext increaseLineHeight" style="list-style: inside;">

                                <li>अपने शरीर के बारे में गहराई से समझें </li>
                                <li>अस्पतालों के महंगे बिल से बचें, घर पर ही सरल उपाय सीखें </li>
                                <li>छोटी-छोटी बीमारियों को बिना डर के Natural तरीकों से संभालना सीखें </li>
                                <li>Sattvik lifestyle & Ayurveda-based prevention अपनाएँ </li>
                                <li>खुद को और अपने परिवार को बनाइए Health Guardian </li>
                                <li>समाज में स्वास्थ्य जागरूकता फैलाकर एक आदर्श भूमिका निभाइए </li>
                            </ul>
                            <div><i> 👉 Demo Session attendees receive a ₹500 discount coupon (valid for 48 hours after the session). </i></div>
                            <div class="imageParent">
                                <img src="./Certified_Natural_Health_Ambassador_Program/img/programSummary.png"
                                    alt="CME Event 2">
                            </div>

                            
                        </div>

                        <div class="mt-5">
                            <h2 class="mt-5"> Level 1 – <i> Foundation (4 Weeks)</i></h2>
                            <div class="imageParent">
                                <img src="./Certified_Natural_Health_Ambassador_Program/img/level1.png"
                                    alt="CME Event 2">
                            </div>
                            <p class="ntext" style="font-weight:500;text-align:center"> Certified Natural Health
                                Ambassador </p>
                            <p class="mt-5 ntext" style="font-weight:800;font-size:22px">आप क्या सीखेंगे (What You Will Learn?) </p>
                            <p class="ntext" style="font-weight:800;font-size:22px">Ayurveda Basics </p>
                            <ul class="ntext" style="list-style: inside;">
                                <li>आयुर्वेद के मूल सिद्धांत Bio Energies (Body & Mind Dosha / Gunas) & Balance</li>
                                <li>Body Prakriti Assessment</li>
                                <li>Rasa - 6 Tastes & their effect on digestion & mind</li>
                            </ul>

                            <p class="ntext" style="font-weight:800;font-size:22px">Lifestyle Secrets</p>
                            <ul class="ntext" style="list-style: inside;">
                                <li>Dinacharya & Ritucharya</li>
                                <li>Daily routine hacks: water, food, sleep, yoga, and lifestyle routines</li>
                                <li>Seasonal prevention tips</li>
                            </ul>

                            <p class="ntext" style="font-weight:800;font-size:22px">Health Management</p>
                            <ul class="ntext" style="list-style: inside;">
                                <li>Daily health hacks (fever, acidity, stress, pain)</li>
                                <li><b>LDP Protocol –</b> (Life of Disciplined People and role of the ANB Pillars around
                                    this) → (Sattvik lifestyle, Diet, sleep, breathing, relaxation, Impact of emotions
                                    on disease etc) </li>
                                <li><b>S.A.M.A.Y. –</b> Simple Ayurveda Methods to Align Your Body with Time</li>
                                <li><b>N.A.T.U.R.E. –</b> Natural Ayurveda Techniques Using Rhythms & Elements - Healing
                                    through 5 Elements (Earth, Water, Fire, Air, Ether)</li>
                                <li><b>V.R.A.T.–</b> Vital Renewal through Active Time-Fasting - A simple guide to
                                    fasting for health, energy, and disease prevention</li>
                                <li><b>Natural Remedies:</b> 10 simple herbs/spices every home must use.</li>
                            </ul>


                            <p class="ntext" style="font-weight:800;font-size:22px">आपको क्या मिलेगा? (What You
                                Receive?)</p>
                            <ul class="ntext" style="list-style: inside;">
                                <li>CNHA Level 1 Certificate</li>
                                <li>Sampurna Swasthya Book – PDF</li>
                                <li>Saatvik Ved – Printed Book Edition</li>
                                <li>Lifetime WhatsApp Community Access</li>
                                <li>Session-wise Digital Handouts (checklists, trackers, summaries)</li>
                            </ul>

                            <div style="display:flex;flex-direction:column; gap:8px;">
                                <div> <b>Duration:</b> 4 Weeks | 8 Sessions (2 per week)</div>
                                <div> <b>Course Value:</b><del> ₹11,000 </del> </div>
                                <div> <b>Registration Fee:</b> ₹1,999 only <i>(Limited-time launch offer)</i> </div>
                                <!-- <div> [🟢 Enroll in Level 1 – ₹1,999]</div> -->
                                <div> <i>👉 Demo Session attendees also get an extra ₹500 discount coupon. (Timer - expire in
                                        48 Hours after the Demo session) </i> </div>

                            </div>


                            <h2 class="mt-5"> Level 2 – <i>Advanced Master (8 Weeks)</i></h2>
                            <div class="imageParent">
                                <img src="./Certified_Natural_Health_Ambassador_Program/img/level2.png"
                                    alt="CME Event 2">
                            </div>
                            <p class="ntext" style="font-weight:500;text-align:center"> Certified Natural Health
                                Ambassador – Master   </p>
                            <p class="mt-5 ntext" style="font-weight:800;font-size:22px">आप क्या सीखेंगे (What You Will Learn?) </p>

                            <p class="ntext" style="font-weight:800;font-size:22px">Lifestyle Disease Prevention & Diet
                            </p>
                            <ul class="ntext" style="list-style: inside;">
                                <li>Blood Pressure (B.P.), Diabetes, Thyroid, Obesity, High Cholesterol - Early warning
                                    signs & natural prevention.</li>
                                <li>Prakriti-based diet protocols useful across multiple health conditions.</li>
                            </ul>

                            <p class="ntext" style="font-weight:800;font-size:22px">Advanced Protocols</p>
                            <ul class="ntext" style="list-style: inside;">
                                <li><b>R.E.S.E.T. -</b> Remove Excess Substances for Energy Transformation - Ancient
                                    science of detox and rejuvenation (Home-friendly detox practices, Seasonal Cleansing
                                    Protocols, Emotional Healing Basics)</li>
                            </ul>

                            <p class="ntext" style="font-weight:800;font-size:22px">Practical Skills</p>
                            <ul class="ntext" style="list-style: inside;">
                                <li>
                                    <b> Decode D.I.A.G.N.O.S.E. →</b> “Discover Illness And Gain Necessary Outcomes
                                    Safely with Education” - बिना किसी भ्रम या गलत मार्गदर्शन के, स्पष्ट रूप से मेडिकल
                                    जांच रिपोर्ट्स को पढ़ना सीखें - Master the art of reading medical reports clearly,
                                    without confusion or misguidance
                                    <ul class="ntext" style="list-style: inside;">
                                        <li>How to understand reports like CBC, LFT, KFT, USG etc .</li>
                                        <li>Avoiding panic through right knowledge.</li>
                                    </ul>
                                </li>
                            </ul>

                            <p class="ntext" style="font-weight:800;font-size:22px">Life Mastery & Leadership</p>
                            <ul class="ntext" style="list-style: inside;">
                                <li>
                                    <b>Morning Magic Club – </b>Daily powerful morning rituals to train your body, mind,
                                    and spirit through simple, nature-inspired practices.
                                </li>
                                <li>
                                    <b>महामानव कैसे बनें - The Superhuman Code:</b> Ancient Wisdom for Modern Life
                                    Mastery (Ancient Superhuman Code for Modern Life)
                                </li>
                                <li>
                                    <b>Ayurveda Industry Opportunities & Basics of Ayurveda Entrepreneurship </b>
                                    (Pharmacy, Herbs, Wellness, Plantation)
                                    <ul class="ntext" style="list-style: inside;">
                                        <li>Opening Ayurveda pharmacy store (A-Z process).</li>
                                        <li>Ayurveda herb farming & home plantation.</li>
                                        <li>Ayurveda factory - product creation (basic compliance).</li>
                                    </ul>
                                </li>
                                <li>
                                  <b>  Public Health Awareness & Leadership Skills </b>
                                    <ul class="ntext" style="list-style: inside;">
                                        <li>How to conduct society/family wellness talks or offline camp / event Activities, online activities.</li>
                                        <li>Skill practice: drafting letters/emails for wellness events, public connect, or community approvals.</li>
                                        <li>Practical assignments with mentor review.</li>
                                    </ul>
                                    
                                </li>
                            </ul>

                            <p class="ntext" style="font-weight:800;font-size:22px">🎁 What You Receive 🎁 आपको क्या
                                मिलेगा?</p>
                            <ul class="ntext" style="list-style: inside;">
                                <li> CNHA – Master Certificate + Print Plaque </li>
                                <li>Saatvik Ved – Printed book (Daily Health Reader) </li>
                                <li>Sampurna Swasthya - Printed Book (Free after release) </li>
                                <li> 2 Family Members → Free Prakriti Assessment & Online Consultation (or at our nearby
                                    Partner Center) </li>
                                <li>Lifetime Ayurveda Mentor Guidance - Senior doctor (to support and guide you around
                                    as your Daily Health Companion) </li>
                                <li>Special privileges in all future Online & offline activities. </li>
                                <li>Special Feature on Veda 24x7 News Media as CNHA Ambassador </li>
                            </ul>


                            <div> <b>Duration:</b> 8 Weeks | 16 Sessions (2 per week)</div>
                            <div> <b>Course Value:</b> <del> ₹20,000 </del> <i>(including advanced training & materials)</i>
                            </div>
                            <div style="display:flex;flex-direction:column; gap:8px;">

                            <div> <b>Registration Fee:</b> ₹2,799 only <i>(Limited-time launch offer)</i> </div>
                            <!-- <div> [🟢 Enroll in Level 1 – ₹1,999]</div> -->
                            <div class="imageParent">
                                <img src="./Certified_Natural_Health_Ambassador_Program/img/levelRegistrationFee.png"
                                    alt="CME Event 2">
                            </div>

                            <div class=""> <b>Combo Offer & Upgrade Path:</b>
                                <div class="ntext ParBox" style="list-style: inside;">
                                   <div class="childBox"> 
                                    <b>Direct Master Enrollment (Recommended): </b>
                                    Enroll directly in 
                                    <b> Level 2- Master</b> for ₹2,799/-</div>
                                   <div class="childBox"><div><b>Upgrade Path: </b>Start with <b></div> Level 1 (₹1,999) </b> → Upgrade later by
                                        paying <div><b> ₹1,999 </b>(Total ₹3,998).</div> </div>
                                </div>
                            </div>
                            <div style="color: #b52b2b;background: #ffe2e2;border: 1px solid #eb8282;padding: 6px;border-radius: 4px;">Direct Master enrollment is more economical; the upgrade option is for those who prefer to first complete Level 1 separately</div>
                            <!-- <div>[🟢 Enroll Now]</div> -->
                            <div><i> 👉 Demo Session attendees also get an extra ₹500 discount coupon. (Timer - expire
                                    in 48 Hours after the Demo session) </i></div>
                            </div>
                            <p class="mt-5 ntext" style="font-weight:800;font-size:22px">Trainer</p>
                                                    <div class="imageParent">
                            <img src="./Certified_Natural_Health_Ambassador_Program/img/trainerHighlight.jpeg"
                                alt="CME Event 2">
                        </div>

                            <p class="ntext" style="font-weight:800;font-size:22px">Ayurvedacharya Dr. Abhishek </p>
                            <ul class="ntext" style="list-style: inside;">
                                <li><b> Founder – </b> Ayurveda Federation of India (AFI), Sabka Vaidya, Saatvik Vaidya,
                                    Veda 24x7</li>
                                <li><b> 16+ Years Clinical Experience | 5000+ Ayurveda Doctors & Students Trained </b>
                                </li>
                                <li><b> Author – </b> Kidney Kavach, Sampurna Swasthya, Saatvik Ved</li>
                                <li><b> Creator – </b> DNA Kayakalp Protocol (Evidence-based Kidney Care Framework)</li>
                                <li><b> Editor-in-Chief – </b> Veda 24x7 (India’s First Vedic Wellness Newspaper)</li>
                                <li><b> Recognized Speaker & Mentor</b> at national and international Ayurveda forums &
                                        conferences</li>
                                <li><b> Special Focus Areas – </b> Kidney Care, Lifestyle Diseases, Ayurveda Education,
                                    and Public Awareness</li>
                            </ul>
                            <div>👉 To explore Dr. Abhishek’s journey & contributions, scan the QR.</div>
                            <div>👉 Scan QR or [▶️ Watch Intro Video]</div>

                            <p class="mt-5 ntext" style="font-weight:800;font-size:22px">Guest Faculty Sessions</p>
                            <div>Along with Dr. Abhishek’s core training, select sessions will be conducted by invited
                                guest faculty, covering:</div>
                            <ul class="ntext" style="list-style: inside;">
                                <li>Herbs & Plantation Insights</li>
                                <li>Pharmacy, Ayurveda Industry Applications & Factory Practices</li>
                                <li>Academic Perspectives from Senior Professors of Ayurveda Colleges</li>
                            </ul>
                            <div>👉 Guest sessions by senior professors and industry experts ensure practical,
                                research-backed, and industry-oriented learning.</div>

                            <p class="mt-5 ntext" style="font-weight:800;font-size:22px">Assessment & Certification
                                (Skill India Aligned)</p>
                            <ul class="ntext" style="list-style: inside;">
                                <li> <b> Attendance: </b> Minimum 80% required </li>
                                <li> <b> Assignments may include: </b> prakriti self-report, diet log, fasting practice,
                                    wellness activity log, OR conducting one small awareness activity (online/offline)
                                    under mentor guidance. </li>
                                <li> <b> Final Exam: </b> MCQ Test + Practical Demo + Viva (as per Skill India
                                    Parameters) </li>
                                <li> <b> Certification: </b> Awarded upon successful completion of learning + assessment
                                </li>
                            </ul>

                            <p class="mt-5 ntext" style="font-weight:800;font-size:22px">Disclaimer & Important Note</p>
                            <ul class="ntext" style="list-style: inside;">
                                <li> This program is for <b> health awareness and natural lifestyle education. </b>
                                </li>
                                <li> All practices taught are <b> preventive and supportive for everyday self-care. </b>
                                </li>
                                <li> Certification is for <b> knowledge and awareness only. </b> </li>
                            </ul>
                            <div style="display:flex;flex-direction:column; gap:8px;">

                            <div>👉 <a href="tel:+9220358400"> 📞 Assistance: 92203 58400</a> | <a href="https://sabkavaidya.com/" target="_blank">🌐 sabkavaidya.com </a></div>
                            <div>👉[🟢 Enroll Now Button] </div>
                            <div>👉▶️ Watch Intro Video] - CNHA course video </div>
                            </div>
                        </div>
                        <div class="video_section mt-4">
                            <div class=" imageParent" id="videoFrameId">
                                <iframe width="560" height="315"
                                    src="https://www.youtube.com/embed/ZERh0nGYQDY?si=BHwaOQKIirf73XZL"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                   <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/ZERh0nGYQDY?si=BHwaOQKIirf73XZL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                            </div>
                        </div>
                    </div>
                    <form id="termsForm" class="floatingButton">
                        <div class="cta-button text-center" style="    width: 100%;">
                            <button type="button" class="btn btn-primary btn-lg "
                                style="display:flex;flex-direction:column;width: 100%;margin-top:0;background: linear-gradient(90deg,rgba(255, 0, 0, 1) 0%, rgba(117, 0, 0, 1) 100%);"
                                onclick="goToRegister(event)">
                                <span
                                    style="font-weight:bold; font-size:26px; margin-bottom:5px;    letter-spacing: 1px;">Enroll
                                    Now <br /></span>
                                <span style="font-weight:bold; font-size:13px"> 📝 सीटें सीमित—अभी रजिस्टर करें! </span>
                            </button>
                        </div>
                    </form>
                    <div class="floating-icon">
                        <div class="beforeHover">
                            <ion-icon style="color:white" size="medium" name="play"></ion-icon>
                        </div>
                        <div class="afterHover">
                            <a href="#videoFrameId" style="color:white; text-decoration:none">Watch Video</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popup -->
    <div class="popup-overlay" id="termsPopup-overlay" onclick="closePopup('termsPopup')"></div>
    <div class="popup" id="termsPopup">
        <span class="close-btn" onclick="closePopup('termsPopup')">&times;</span>
        <h3>Terms and Conditions</h3>
        <p class="ntext">
            In order to maintain a high quality, interactive and disciplined learning environment, all participants are
            expected to adhere to the following rules:
        <ul style="list-style: inside;border-bottom: 1px solid #ebebeb;padding-bottom: 1rem;" class="ntext">
            <li>This session will be live only — no recordings of any kind will be made available.</li>
            <li>One person = one registration — group viewing is not allowed.</li>
            <li>It is mandatory to keep the camera on for the entire session.</li>
            <li>This is a serious clinical CME . Since high-value information will be provided, we expect personal and
                honest participation from everyone.</li>
        </ul>
        <p class="ntext">
            महत्वपूर्ण: कृपया रजिस्ट्रेशन से पहले ध्यानपूर्वक पढ़ें
        </p>
        <ul style="list-style: inside;" class="ntext">

            <li>उच्च गुणवत्ता, संवादात्मक और अनुशासित लर्निंग वातावरण बनाए रखने हेतु सभी प्रतिभागियों से निम्नलिखित
                नियमों का पालन अपेक्षित है:</li>
            <li>यह सत्र केवल लाइव होगा — किसी भी प्रकार की रिकॉर्डिंग उपलब्ध नहीं कराई जाएगी।</li>
            <li>एक व्यक्ति = एक रजिस्ट्रेशन — ग्रुप व्यूइंग की अनुमति नहीं है।</li>
            <li>पूरा सत्र कैमरा ऑन रखना अनिवार्य है।</li>
            <li>यह एक गंभीर क्लिनिकल CME है। चूंकि इसमें उच्च-मूल्य की जानकारी दी जाएगी, इसलिए हम सभी से व्यक्तिगत और
                ईमानदार सहभागिता की अपेक्षा करते हैं</li>
            </p>
    </div>

    <div class="popup-overlay" id="formPopup-overlay" onclick="closePopup('formPopup')"></div>
    <div class="popup form-wrapper-popup" id="formPopup">
        <div class="form-wrapper">
            <span class="close-btn" onclick="closePopup('formPopup')">&times;</span>
            <h3 class="mb-4">📝 Certified Natural Health Ambassador Program</h3>
            <?php if (!empty($successMessage)) : ?>
            <div class="alert alert-success">
                <?= $successMessage ?>
            </div>
            <?php endif; ?>
            <!-- <form method="post" enctype="multipart/form-data"> -->
            <form action="Certified_Natural_Health_Ambassador_Program.php" method="POST" enctype="multipart/form-data">
                <!-- Step 1 -->
                <input type="hidden" name="registration_id" id="registration_id">
                <div id="step1">
                    <div class="form-group">
                        <label><span class="required">*</span> Full Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $_POST['name'] ?? '' ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label><span class="required">*</span> Mobile Number (WhatsApp Enabled)</label>
                        <input type="tel" class="form-control" name="mobile" value="<?= $_POST['mobile'] ?? '' ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label><span class="required">*</span> Email ID</label>
                        <input type="email" class="form-control" name="email" value="<?= $_POST['email'] ?? '' ?>"
                            required>
                    </div>
                      <div class="form-group">
                        <label> <span class="required">*</span> Qualification</label>
                        <select class="form-control" name="qualification" required>
                            <option value="">Select an option</option>
                            <option value="Post Graduated" >Post Graduated</option>
                            <option value="Graduated" >Graduated</option>
                            <option value="Intermediate" >Intermediate</option>
                            <option value="High School" >High School</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label><span class="required">*</span> City State</label>
                        <input type="text" class="form-control" name="address" value="<?= $_POST['address'] ?? '' ?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label> <span class="required">*</span> Program</label>
                        
                        <br/>
                        
                       <input type="radio" id="Level1" name="programType" value="Level 1"
                            <?= (($_POST['programType'] ?? '') === 'Level 1') ? 'checked' : '' ?>
                            onchange="calculateFee()" required>
                        <label for="Level1">Level 1</label><br>
                        
                        <input type="radio" id="Level2" name="programType" value="Level 2" required
                            <?= (($_POST['programType'] ?? '') === 'Level 2') ? 'checked' : '' ?>
                            onchange="calculateFee()">
                        <label for="Level2">Level 2</label><br>

                    </div>
                    
                    
                    <div style="display:flex;justify-content:space-between;gap:12px" class="rs-col mt-4">
                        <h5 class="totalFeeBox rs-order-1"><strong>Total Fees: <input type="text"
                                    class="form-control feesInput" value="INR 0" name="basefare" id="basefare"></strong>
                        </h5>

                        <div style="display:flex;gap:12px" class="rs-order-2">
                            <button type="submit" style="margin-top:0" class="rs-flex-1 btn btn-primary">Proceed to
                                Pay</button>
                            <!--onclick="nextStep(2)"-->
                        </div>
                    </div>
                </div>
                <!-- Step 3-->
               
                <div id="step3" style="display: none;">
                    <button type="button" class="btn btn-secondary" onclick="nextStep(1)">Back</button>
                    <button type="submit" class="btn btn-danger btn-lg">Submit Registration</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function goToRegister(event) {

            // Redirect to register.php
            // window.location.href = './KidneyCare/register.php';
            openPopup(event, 'formPopup');
        }

        function openPopup(event, id) {
            event.preventDefault();
            document.getElementById(id + '-overlay').style.display = 'block';
            document.getElementById(id).style.display = 'block';
        }

        function closePopup(id) {
            document.getElementById(id + '-overlay').style.display = 'none';
            document.getElementById(id).style.display = 'none';
        }

        //      function nextStep(step) {
        //     document.getElementById('step1').style.display = (step === 0) ? 'block' : 'none';
        //     document.getElementById('step2').style.display = (step === 1) ? 'block' : 'none';
        //     document.getElementById('step3').style.display = (step === 2) ? 'block' : 'none';
        // }
        function nextStep(step) {
            console.log('step', step);

            if (step === 1) {
                const currentStep = document.getElementById('step1');
                const inputs = currentStep.querySelectorAll("input, select, textarea");
                for (let input of inputs) {
                    if (!input.checkValidity()) {
                        input.reportValidity();
                        return;
                    };
                }
                // Get email value
                const email = document.querySelector('input[name="email"]').value;
                console.log('email', email);
                if (!email) {
                    alert("Please enter your email.");
                    return;
                }

                // Validate email format
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    alert("Please enter a valid email address.");
                    return;
                }

                // AJAX call to check email
                // fetch('./KidneyCare/check_email.php', {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/x-www-form-urlencoded'
                //     },
                //     body: `email=${encodeURIComponent(email)}`
                // })
                const fullName = document.querySelector('input[name="fullname"]').value;
                const phone = document.querySelector('input[name="mobile"]').value;

                fetch('./Certified_Natural_Health_Ambassador_Program/check_email.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `email=${encodeURIComponent(email)}&full_name=${encodeURIComponent(fullName)}&phone=${encodeURIComponent(phone)}`
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.exists) {
                            alert("This email is already registered. Please use a different email.");
                        } else {
                            localStorage.setItem('registration_id', data.id);
                            document.getElementById('registration_id').value = localStorage.getItem('registration_id');

                            // Show next step
                            document.getElementById('step1').style.display = 'none';
                            document.getElementById('step2').style.display = 'block';
                            document.getElementById('step3').style.display = 'none';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert("Something went wrong while checking the email.");
                    });

                return; // stop here until check finishes
            }

            if (step === 0) {
                document.getElementById('step1').style.display = 'block';
                document.getElementById('step2').style.display = 'none';
                document.getElementById('step3').style.display = 'none';
            }

            if (step === 2) {
                // Basic validation for step 2 fields
                const currentStep = document.getElementById('step2');
                const inputs = currentStep.querySelectorAll("input, select, textarea");
                for (let input of inputs) {
                    if (!input.checkValidity()) {
                        input.reportValidity();
                        return;
                    }
                }

                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'none';
                document.getElementById('step3').style.display = 'block';
            }
        }

        function fileUploadHandle(inputElement) {
            const file = inputElement.files[0];
            if (file && file.size > 5 * 1024 * 1024) {
                alert("File too large. Max 5MB allowed.");
                inputElement.value = ""; // reset file input
            }
        }

        let isCoupenApplied = false;

        const addon = document.querySelector('input[name="addon"]');
        function applyCoupen() {
            let coupenList = ['svkcv1899'];
            const referralField = document.getElementById("referralCodeId").value;
            if (referralField !== '' && referralField !== undefined) {
                const referralCode = referralField.toLowerCase();
                if (coupenList.includes(referralCode)) {
                    console.log("Referral code matched!");
                    isCoupenApplied = true;
                    calculateFee();
                } else {
                    console.log("Invalid referral code!");
                    isCoupenApplied = false;
                    calculateFee();
                }

            }
        }


        function calculateFee() {
            let baseFee = 0;
        
            const selectedProgram = document.querySelector(
                'input[name="programType"]:checked'
            );
        
            if (!selectedProgram) {
                document.getElementById("basefare").value = "INR 0";
                return;
            }
        
            const catValue = selectedProgram.value;
        
            if (catValue === "Level 1") {
                baseFee = 1999;
            } else if (catValue === "Level 2") {
                baseFee = 2799;
            }
        
            document.getElementById("basefare").value = `INR ${baseFee}`;
        }

        // function nextStep(step) {
        //     let currentStep;
        //     if (step === 1) currentStep = document.getElementById('step1');
        //     else if (step === 2) currentStep = document.getElementById('step2');

        //     // Validate current step fields before proceeding
        //     if (currentStep) {
        //         const inputs = currentStep.querySelectorAll("input, select, textarea, radio");
        //         for (let input of inputs) {
        //             if (!input.checkValidity()) {
        //                 input.reportValidity(); // show error
        //                 return; // stop going to next step
        //             }
        //         }
        //     }

        //     // Hide all steps
        //     document.getElementById('step1').style.display = 'none';
        //     document.getElementById('step2').style.display = 'none';
        //     document.getElementById('step3').style.display = 'none';

        //     // Show selected step
        //     if (step === 0) document.getElementById('step1').style.display = 'block';
        //     if (step === 1) document.getElementById('step2').style.display = 'block';
        //     if (step === 2) document.getElementById('step3').style.display = 'block';
        // }
    </script>

</body>

</html>