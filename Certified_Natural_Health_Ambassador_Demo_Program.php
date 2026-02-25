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
    $programType   = 'Demo Program';
    $programDate   = $_POST['programDate'] ?? '';
    $basefare      = 99;
    // $basefare      = $_POST['basefare'] ?? 'INR 0';
    // $basefare      = (int) filter_var($basefare, FILTER_SANITIZE_NUMBER_INT);

    // Validation
    if (!$name || !$mobile || !$email || !$qualification || !$address || !$programDate) {
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
            `Program_Date`,
            `Total Fees`,
            `Registration_Time`
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())
    ");

    $insert->bind_param(
        "sssssssi",
        $name,
        $mobile,
        $address,
        $email,
        $qualification,
        $programType,
        $programDate,
        $basefare
    );

    if ($insert->execute()) {
       $encryptedEmail = urlencode(encryptData($email));
        $encryptedFlag = urlencode(encryptData('false'));
        echo('Email:' . $encryptedEmail);
        
        header("Location: ./Certified_Natural_Health_Ambassador_Program/payment.php?e=$encryptedEmail&&c=$encryptedFlag&&p=true");
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
    <title>Certified Natural Health Ambassador (CNHA)- Demo Program</title>
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
                        <h2 class="section-title">Certified Natural Health Ambassador – Demo Session </h2>
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
                        <p class="ntext"><strong>Date : Pick your Date</strong><br>
                            <strong>Demo 1 :</strong> 10 January 2026 | Saturday<br>
                            <strong>OR</strong><br>
                            <strong>Demo 2 :</strong> 11 January 2026 | Sunday<br>
                            <strong>OR</strong><br>
                            <strong>Demo 3 :</strong> 17 January 2026 | Saturday<br>
                            <strong>Time :</strong> 7:00 PM Onwards<br>
                            <strong>Language :</strong> Hindi<br>
                            <strong>Duration :</strong> 90 Minutes (Live Online)<br>
                            <strong>Registration :</strong> <del>₹1000</del> ₹99 (Limited Seats) <br>
                            <strong>A Health Awareness & Education Program </strong> <del>₹1000</del> ₹99 (Limited
                            Seats)
                        </p>
                        <div class="imageParent">
                            <img src="./Certified_Natural_Health_Ambassador_Program/img/why1.jpeg" alt="Why">
                        </div>

                        <div class="mt-5">
                            <h3 class="strip"> क्यों जुड़ना चाहिए? Why Join? </h3>
                            <ul class="ntext increaseLineHeight" style="list-style: inside;">

                                <li>आज हर घर में कोई न कोई गंभीर बीमारी मौजूद है - डायबिटीज, BP, मोटापा, तनाव</li>
                                <li>महंगे इलाज/दवाइयों का बोझ </li>
                                <li>Studies suggest: गंभीर बीमारी में कई परिवार कर्ज़/उधार पर निर्भर होते हैं
                                    <br />👉 अब मय है इलाज के साथ-साथ preventive care अपनाने का

                                </li>
                            </ul>
                            <div class="imageParent">
                                <img src="./Certified_Natural_Health_Ambassador_Program/img/90minutes.jpeg"
                                    alt="About the Demo Session (90 Minutes)">
                            </div>
                        </div>

                        <div class="mt-5">
                            <p class="ntext" style="font-weight:500;text-align:center">About the Demo Session (90
                                Minutes)</p>
                            <p class="mt-5 ntext" style="font-weight:800;font-size:22px">In this interactive
                                introduction, you will discover:</p>
                            <!-- <p class="ntext" style="font-weight:800;font-size:22px">Ayurveda Basics </p> -->
                            <ul class="ntext" style="list-style: inside;">
                                <li>Current health challenges vs Ayurveda’s approach</li>
                                <li>Why every family needs a Health Guardian</li>
                                <li>Ayurveda basics explained in a simple way</li>
                                <li>3 Easy & Ever-Useful Health Mantras for daily life (also need to change this line in
                                    prospectus content)</li>
                                <li>Natural Preventive care secrets you can use at home</li>
                                <li>Insights about the Certified Natural Health Ambassador Program (CNHA) - (Level 1 &
                                    Level 2)</li>
                            </ul>
                            <div><i> 👉 This demo is your first step towards becoming a Certified Natural Health
                                    Ambassador.</i> </div>
                            <div><i>Bonus for all attendees: Digital Health Companion PDF + Demo e-Certificate</i>
                            </div>


                            <h2 class="mt-5"> Registration Details:</i></h2>
                            <!-- <div class="imageParent">
                                <img src="./Certified_Natural_Health_Ambassador_Program/img/Image-demo.jpeg"
                                    alt="CME Event 2">
                            </div> -->
                            <div style="display:flex;flex-direction:column; gap:8px;">
                                <div> <b>Fee:</b> <del>₹1000</del> ₹99 (Limited Seats) <br>
                                    <div> <b>Format:</b> Live Online (with Q&A) </div>
                                    <div> <b>Next Batch:</b> <i>24 January 2026 onwards</i> </div>
                                    <!-- <div> [🟢 Enroll in Level 1 – ₹1,999]</div> -->
                                    <div> <i>⚡ 🎁 Complete the Demo Session and receive a ₹500 discount coupon for CNHA
                                            Level 1 or Level 2 enrollment.</i> </div>

                                </div>

                                <p class="mt-5 ntext" style="font-weight:800;font-size:22px">Trainer</p>
                                <div class="imageParent">
                                    <img src="./Certified_Natural_Health_Ambassador_Program/img/trainerHighlight.jpeg"
                                        alt="CME Event 2">
                                </div>

                                <p class="ntext" style="font-weight:800;font-size:22px">Ayurvedacharya Dr. Abhishek </p>
                                <ul class="ntext" style="list-style: inside;">
                                    <li><b> Founder – </b> Ayurveda Federation of India (AFI), Sabka Vaidya, Saatvik
                                        Vaidya,
                                        Veda 24x7</li>
                                    <li><b> 16+ Years Clinical Experience | 5000+ Ayurveda Doctors & Students Trained
                                        </b>
                                    </li>
                                    <li><b> Author – </b> Kidney Kavach, Sampurna Swasthya, Saatvik Ved</li>
                                    <li><b> Creator – </b> DNA Kayakalp Protocol (Evidence-based Kidney Care Framework)
                                    </li>
                                    <li><b> Editor-in-Chief – </b> Veda 24x7 (India’s First Vedic Wellness Newspaper)
                                    </li>
                                    <li><b> Recognized Speaker & Mentor</b> at national and international Ayurveda
                                        forums &
                                        conferences</li>
                                    <li><b> Special Focus Areas – </b> Kidney Care, Lifestyle Diseases, Ayurveda
                                        Education,
                                        and Public Awareness</li>
                                </ul>


                                <div>[▶️ Watch Intro Video] (video icon linked to your embedded YouTube/Vimeo file)
                                </div>

                                <p class="mt-5 ntext" style="font-weight:800;font-size:22px">Disclaimer & Important Note
                                </p>
                                <ul class="ntext" style="list-style: inside;">
                                    <li> This program is for <b> health awareness and natural lifestyle education. </b>
                                    </li>
                                    <li> All practices taught are <b> preventive and supportive for everyday self-care.
                                        </b>
                                    </li>
                                    <li> Certification is for <b> knowledge and awareness only. </b> </li>
                                </ul>
                                <div style="display:flex;flex-direction:column; gap:8px;">
                                    <div>👉 <a href="tel:+9220358400"> 📞 Assistance: 92203 58400</a> | <a
                                            href="https://sabkavaidya.com/" target="_blank">🌐 sabkavaidya.com </a>
                                    </div>
                                    <!-- <div>👉▶️ Watch Intro Video] - CNHA course video </div> -->
                                </div>
                            </div>
                            <div class="video_section mt-4">
                                <div class=" imageParent" id="videoFrameId">
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/6w_2drnqC1c?si=qM-b4ae3P6e4WQ_0"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
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
                                <span style="font-weight:bold; font-size:13px"> 📝 सीटें सीमित—अभी रजिस्टर करें!
                                </span>
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
            <form action="Certified_Natural_Health_Ambassador_Demo_Program.php" method="POST" enctype="multipart/form-data">
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
                        <label> <span class="required">*</span> Select Slot</label>
                        <select class="form-control" name="programDate" required value="<?= $_POST['programDate'] ?? '' ?>">
                            <option value="">Select an option</option>
                            <option value="10 January 2026 | Saturday">10 January 2026 | Saturday</option>
                            <option value="11 January 2026 | Sunday">11 January 2026 | Sunday</option>
                            <option value="17 January 2026 | Saturday">17 January 2026 | Saturday</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label> <span class="required">*</span> Select Slot </label>
                        <br/>
                       <input type="radio" id="10 January 2026 | Saturday" name="programDate" value="10 January 2026 | Saturday"
                            <?= (($_POST['programDate'] ?? '') === '10 January 2026 | Saturday') ? 'checked' : '' ?>>
                        <label for="10 January 2026 | Saturday">10 January 2026 | Saturday</label><br>
                        <input type="radio" id="11 January 2026 | Sunday" name="programDate" value="11 January 2026 | Sunday"
                            <?= (($_POST['programDate'] ?? '') === '11 January 2026 | Sunday') ? 'checked' : '' ?>>
                        <label for="11 January 2026 | Sunday">11 January 2026 | Sunday</label><br>
                        <input type="radio" id="17 January 2026 | Saturday" name="programDate" value="17 January 2026 | Saturday"
                            <?= (($_POST['programDate'] ?? '') === '17 January 2026 | Saturday') ? 'checked' : '' ?>>
                        <label for="17 January 2026 | Saturday">17 January 2026 | Saturday</label><br>
                    </div> -->
                    <div style="display:flex;justify-content:space-between;gap:12px" class="rs-col mt-4">
                        <h5 class="totalFeeBox rs-order-1"><strong>Total Fees: <input type="text"
                                    class="form-control feesInput" value="INR 99" name="basefare"
                                    id="basefare"></strong>
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