<?php
session_start();
$successMessage = $_SESSION['successMessage'] ?? '';
unset($_SESSION['successMessage']);


 include "./KidneyCare/connection.php";
 include "./KidneyCare/encrption.php";
 
// Handle POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $fullname = $_POST['fullname'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $email = $_POST['email'] ?? '';
    $qualification = $_POST['qualification'] ?? '';
    $system = $_POST['system'] ?? '';
    $location = $_POST['location'] ?? '';
    $clinic = $_POST['clinic'] ?? '';
    $experience = $_POST['experience'] ?? 0;
    $treating = $_POST['treating'] ?? '';
    $registration_type = $_POST['registration_type'] ?? '';
    $addon = $_POST['addon'] ?? '';
    $address = $_POST['address'] ?? '';
    $payment = $_POST['payment'] ?? '';
    $referral = $_POST['referral'] ?? '';
    $basefare = $_POST['basefare'] ?? 'INR 0';
    $basefare = (int) filter_var($basefare, FILTER_SANITIZE_NUMBER_INT);

    // Handle certificate file upload
    $certificatePath = '';
    if (isset($_FILES['certificate']) && $_FILES['certificate']['error'] === 0) {
        $uploadDir = './KidneyCare/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // create uploads/ if it doesn't exist
        }

        $filename = $fullname. '_' .uniqid() . '_' . basename($_FILES['certificate']['name']);
        $filename = preg_replace("/[^A-Za-z0-9_\-\.]/", '', $filename);
        $targetPath = $uploadDir . $filename;

        if ($_FILES['certificate']['size'] > 5 * 1024 * 1024) {
            die("File too large. Max 5MB allowed.");
        }

        $allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
        if (!in_array($_FILES['certificate']['type'], $allowedTypes)) {
            die("Invalid file type. Only PDF, JPG, PNG allowed.");
        }

        if (move_uploaded_file($_FILES['certificate']['tmp_name'], $targetPath)) {
            $certificatePath = $targetPath;
        } else {
            die("Error uploading certificate file.");
        }
    }

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO `Kidney Care CME Registration` 
    (`Name`, `New Mobile Number`, `Email ID`, `Qualification`, `System Practiced`, `State & City`, `Clinic / Institution / Hospital Name`, 
    `Years of Clinical Experience`, `Are You Treating Kidney Patients?`, `Select Your Registration Type`, `Upload Degree Certificate / Registration Proof`,
    `Add-on Features`, `Postal Address`, `Preferred Payment Mode`, `Referral Code (if any)`, `Total Fees`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssisssssssi",
        $fullname, $mobile, $email, $qualification, $system,
        $location, $clinic, $experience, $treating, $registration_type,
        $certificatePath, $addon, $address, $payment, $referral, $basefare
    );

    if ($stmt->execute()) {
    $successMessage = "✅ Registration Successful!";
    //   $last_id = $conn->insert_id;
    //   $encodedEmail = base64_encode($email);
    //     header("Location: ./KidneyCare/payment.php?e=$encodedEmail");
    //         // header("Location: ./KidneyCare/payment.php?$email=$email");
        $encryptedEmail = urlencode(encryptData($email)); // urlencode is safe for URL
        $encryptedFlag = urlencode(encryptData('false')); // urlencode is safe for URL
        header("Location: ./KidneyCare/payment.php?e=$encryptedEmail&&c=$encryptedFlag");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kidney Care Expert CME</title>
    <link rel="stylesheet" href="https://afi-india.in/css/style.css">
    <link rel="stylesheet" href="https://afi-india.in/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://afi-india.in/css/responsive.css">
    <link rel="stylesheet" href="./KidneyCare/styles.css">
</head>

<body>
    <section class="course-details section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="course-content">
                        <h2 class="section-title">Clinical Excellence of Ayurveda in Kidney Failure</h2>
                        <p class="lead text-center">🌿 2-Day Online CME</p>
                                                    <div class="imageParent">
                                <img src="./images/2-day-Online-CME-2.png" alt="CME Event 2">
                            </div>
                        <p class="ntext"><strong>Date:</strong> 14 & 15 August 2025<br>
                            <strong>Time:</strong> 7:00 PM Onwards<br>
                            <strong>Mode:</strong> 100% Online (Join from Anywhere)<br>
                            <strong>Eligibility:</strong> Registered / Institutionally Qualified AYUSH Doctors &
                            Graduates (AYURVEDA |
                            NATUROPATHY | UNANI | SIDDHA | HOMOEOPATHY)
                        </p>


                            <div class="imageParent">
                                <img src="./images/2-day-Online-CME-9.jpeg" alt="CME Event 9">
                            </div>


                        <div class="cta-button text-center mt-4">
                            <a href="#registration" class="btn btn-primary btn-lg">👉🏼 Register Now & Become a
                                Certified Kidney Care
                                Expert!</a>
                        </div>
                        <div class="mt-5">


                            <h3>🌟 Why Join This CME?</h3>
                            <blockquote class="blockquote">“The world tired of Dialysis, Transplant and Steroids needs
                                Ayurveda!”
                            </blockquote>
                            <p class="ntext">This CME is for those Vaidyas and AYUSH Doctors who want clinical clarity
                                in a complex
                                disease like
                                Kidney Failure – and want to become a new name of hope for patients.</p>
                            <p><strong>"Where dialysis ends, evidence-based Ayurveda begins — Welcome to the Clinical Chapter of the DNA Kayakalp Protocol!”</strong></p>


                            <div class="imageParent mt-5">
                                <img src="./images/2-day-Online-CME-1.png" alt="CME Event 1">
                            </div>
                            <h3>📘 Key Learning Modules</h3>
                            <ul class="ntext" style="list-style: inside;">
                                <li>Ayurvedic & Nature Based Clinical Approach to Kidney Diseases</li>
                                <li>DNA Kayakalp Protocol – Edge of Chronic Kidney Failure</li>
                                <li>Case Studies & Real Patient Success Stories</li>
                                <li>Side Effects of Dialysis, Steroids, Transplant</li>
                                <li>Modern Diagnosis + Ayurveda Intervention</li>
                                <li>Safe & Root-Cause Based Option</li>
                                <li>How to create a successful kidney practice</li>
                            </ul>


                            <h3 class="mt-5">💰 Fee Structure</h3>
                            <table class="table table-bordered ntext">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>General Fee</th>
                                        <th>Early Bird (Till 10 Aug 2025)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>AYUSH Interns / PG Scholars</td>
                                        <td>₹1499</td>
                                        <td>₹799</td>
                                    </tr>
                                    <tr>
                                        <td>AYUSH Doctors</td>
                                        <td>₹1999</td>
                                        <td>₹1299</td>
                                    </tr>
                                    <tr>
                                        <td>Add-on Kit (Optional)</td>
                                        <td>+ ₹1000</td>
                                        <td>+ ₹1000</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="imageParent">
                                <img src="./images/2-day-Online-CME-7.jpeg" alt="CME Event 7">
                            </div>

                            <h3 class="mt-5">💎 Add-on Features (with ₹1000 only)</h3>
                            <ul style="list-style: inside;" class="ntext">
                                <li>Printed Handouts & Kidney Kavach E-book</li>
                                <li>Unique Printed ID (sent to your address)</li>
                                <li>WhatsApp Group Lifetime Access + Post-CME Hands-on Support</li>
                            </ul>


                            <p class="mt-5">📜 Digital E-certificate will be awarded to all participants</p>
                            <div class="cta-button text-center mt-4">
                                <!-- <a href="#registration" class="btn btn-success btn-lg">👉🏼 Register Now & Become a Certified Kidney
              Care Expert!</a> -->
                            </div>
                        </div>
                            <div class="imageParent">
                                <img src="./images/2-day-Online-CME-4.png" alt="CME Event 4">
                            </div>
                              <div class="imageParent">
                                <img src="./images/2-day-Online-CME-8.jpeg" alt="CME Event 8">
                            </div>
                            <div class="imageParent">
                                <img src="./images/2-day-Online-CME-10.jpeg" alt="CME Event 10">
                            </div>




                        <div id="registration" class="mt-5 ">
                            <h3>📝 Registration</h3>
                            <p class="ntext">
                            <form id="termsForm">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agreeCheckbox">
                                    <label class="form-check-label" for="agreeCheckbox">
                                        I have read and agreed to all the <a href="#" onclick="openPopup(event,'termsPopup')">terms
                                            and conditions</a>.
                                    </label>
                                </div>

                                <button type="button" class="btn btn-primary btn-lg mt-3" onclick="goToRegister(event)">👉🏼
                                    Register Now</button>
                            </form>

                            </p>

                        </div>

                        <div class="mt-5 ntext">
                            <p class="ntext"><strong>🔰 Hurry! Limited Seats – Early Bird till 10th August</strong></p>
                            <p class="ntext">📞 For Queries: 9220358400<br>
                                📩 Email: Ayurvedafederation@gmail.com</p>
                        </div>

                            <div class="video_section mt-4">
                                <h3> Watch this video related to the Course: </h3>
                                <div class=" imageParent">
                                   <iframe width="100%" height="315"
                                    src="https://www.youtube.com/embed/Lfv_Wp87gUU?autoplay=1"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                    </iframe>
                                </div>
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
        
            <li>उच्च गुणवत्ता, संवादात्मक और अनुशासित लर्निंग वातावरण बनाए रखने हेतु सभी प्रतिभागियों से निम्नलिखित नियमों का पालन अपेक्षित है:</li>
            <li>यह सत्र केवल लाइव होगा — किसी भी प्रकार की रिकॉर्डिंग उपलब्ध नहीं कराई जाएगी।</li>
            <li>एक व्यक्ति = एक रजिस्ट्रेशन — ग्रुप व्यूइंग की अनुमति नहीं है।</li>
            <li>पूरा सत्र कैमरा ऑन रखना अनिवार्य है।</li>
            <li>यह एक गंभीर क्लिनिकल CME है। चूंकि इसमें उच्च-मूल्य की जानकारी दी जाएगी, इसलिए हम सभी से व्यक्तिगत और ईमानदार सहभागिता की अपेक्षा करते हैं</li>
        </p>
    </div>
    
    <div class="popup-overlay" id="formPopup-overlay" onclick="closePopup('formPopup')"></div>
    <div class="popup form-wrapper-popup" id="formPopup">
        <div class="form-wrapper">
            <span class="close-btn" onclick="closePopup('formPopup')">&times;</span>
        <h3 class="mb-4">📝 Kidney Care CME Registration</h3>
          <?php if (!empty($successMessage)) : ?>
            <div class="alert alert-success"><?= $successMessage ?></div>
        <?php endif; ?>
        <!-- <form method="post" enctype="multipart/form-data"> -->
        <form action="2-Day-Online-CME.php" method="POST" enctype="multipart/form-data">
            <!-- Step 1 -->
            <div id="step1">
                <div class="form-group">
                    <label><span class="required">*</span> Full Name</label>
                    <input type="text" class="form-control" name="fullname" value="<?= $_POST['fullname'] ?? '' ?>"
                        required>
                </div>
                <div class="form-group">
                    <label><span class="required">*</span> Mobile Number (WhatsApp Enabled)</label>
                    <input type="tel" class="form-control" name="mobile" value="<?= $_POST['mobile'] ?? '' ?>" required>
                </div>
                <div class="form-group">
                    <label><span class="required">*</span> Email ID</label>
                    <input type="email" class="form-control" name="email" value="<?= $_POST['email'] ?? '' ?>" required>
                </div>
                <button type="button" class="btn btn-primary" onclick="nextStep(1)">Next</button>
            </div>
            <!-- Step 2 -->
            <div id="step2" style="display: none;">
                <div class="form-group">
                    <label> <span class="required">*</span> Qualification</label>
                    <select class="form-control" name="qualification" required>
                        <option>BAMS</option>
                        <option>BNYS</option>
                        <option>BHMS</option>
                        <option>BUMS</option>
                        <option>BSMS</option>
                        <option>MD</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><span class="required">*</span> System Practiced</label>
                    <select class="form-control" name="system" required>
                        <option>Ayurveda</option>
                        <option>Naturopathy</option>
                        <option>Unani</option>
                        <option>Siddha</option>
                        <option>Homeopathy</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><span class="required">*</span> State & City</label>
                    <input type="text" class="form-control" name="location" required="">
                </div>
                <div class="form-group">
                    <label><span class="required">*</span> Clinic / Institution / Hospital Name</label>
                    <input type="text" class="form-control" name="clinic" required="">
                </div>
                <div class="form-group">
                    <label>Years of Clinical Experience</label>
                    <input type="number" class="form-control" name="experience" min="0">
                </div>
                <div class="form-group">
                    <label>Are You Treating Kidney Patients?</label>
                    <select class="form-control" name="treating">
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><span class="required">*</span> Upload Degree Certificate / State Registration Certificate</label>
                    <input type="file" accept=".pdf,.jpg,.jpeg,.png" class="form-control-file" name="certificate" onchange="fileUploadHandle(this)" required>
                </div>
                <div class="form-group">
                    <label> <span class="required">*</span> Select Your Registration Type</label><br>
                    <select class="form-control" id="category" name="registration_type" required
                        onchange="calculateFee()">
                        <option value="">-- Select --</option>
                        <option value="Intern">AYUSH Intern / PG Scholar</option>
                        <option value="Doctor">AYUSH Doctor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><span class="required">*</span> Add-on Features (Optional)</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="addon" id="addonYes" value="Yes"
                            onchange="calculateFee()" required>
                        <label class="form-check-label" for="addonYes">
                            Yes, I want printed kit & support access (+₹1000)
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="addon" id="addonNo" value="No"
                            onchange="calculateFee()" required>
                        <label class="form-check-label" for="addonNo">
                            No, only digital CME access
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label><span class="required">*</span> Postal Address (with Pincode)</label>
                    <textarea class="form-control" rows="3" name="address" required=""></textarea>
                </div>
                <div class="form-group" style="display:none">
                    <label>Preferred Payment Mode</label>
                    <select class="form-control" name="payment">
                        <option selected>Razorpay</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Referral Code (if any)</label>
                    <input type="text" class="form-control" name="referral">
                </div>
                <div style="display:flex;justify-content:space-between;gap:12px" class="rs-col mt-4">
                    <h5 class="totalFeeBox rs-order-1"><strong>Total Fees: <input type="text" class="form-control feesInput" value="INR 0" name="basefare" id="basefare"></strong></h5>

                    <div style="display:flex;gap:12px" class="rs-order-2">
                        <button type="button" style="margin-top:0" class="rs-flex-1 btn btn-secondary" onclick="nextStep(0)">Back</button>
                         <button type="submit" style="margin-top:0" class="rs-flex-1 btn btn-primary" >Proceed to Pay</button>
                         <!--onclick="nextStep(2)"-->
                    </div>
                </div>
            </div>
            <!-- Step 3 -->
            <div id="step3" style="display: none;">
                <button type="button" class="btn btn-secondary" onclick="nextStep(1)">Back</button>
                <button type="submit" class="btn btn-danger btn-lg">Submit Registration</button>
            </div>
        </form>
    </div>
     </div>
    

    <script>
        function goToRegister(event) {
            const isChecked = document.getElementById('agreeCheckbox').checked;
            if (!isChecked) {
                alert('Please agree to the terms and conditions before registering.');
                return;
            }
            // Redirect to register.php
            // window.location.href = './KidneyCare/register.php';
            openPopup(event, 'formPopup');
        }

        function openPopup(event, id) {
            event.preventDefault();
            document.getElementById(id+'-overlay').style.display = 'block';
            document.getElementById(id).style.display = 'block';
        }

        function closePopup(id) {
            document.getElementById(id+'-overlay').style.display = 'none';
            document.getElementById(id).style.display = 'none';
        }
        
    //      function nextStep(step) {
    //     document.getElementById('step1').style.display = (step === 0) ? 'block' : 'none';
    //     document.getElementById('step2').style.display = (step === 1) ? 'block' : 'none';
    //     document.getElementById('step3').style.display = (step === 2) ? 'block' : 'none';
    // }
    function nextStep(step) {
        console.log('step' , step);
            
        if (step === 1) {
            
            
            const currentStep = document.getElementById('step1');
            const inputs = currentStep.querySelectorAll("input, select, textarea");
            for (let input of inputs) {
                if (!input.checkValidity()) {
                    input.reportValidity();
                    return;
                }
            }
            
            
            // Get email value
            const email = document.querySelector('input[name="email"]').value;
            console.log('email' , email);
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
            fetch('./KidneyCare/check_email.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `email=${encodeURIComponent(email)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    alert("This email is already registered. Please use a different email.");
                } else {
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

    function fileUploadHandle(inputElement){
        const file = inputElement.files[0];
        if (file && file.size > 5 * 1024 * 1024) {
            alert("File too large. Max 5MB allowed.");
            inputElement.value = ""; // reset file input
        }
    }

    const addon = document.querySelector('input[name="addon"]');

    function calculateFee() {
        let baseFee = 0;
        const catValue = document.getElementById("category").value;
        if (catValue === "Intern") baseFee = 799;
        // if (catValue === "Intern") baseFee = 1;

        else if (catValue === "Doctor") baseFee = 1299;

        let addonValue = document.querySelector('input[name="addon"]:checked') ? document.querySelector(
            'input[name="addon"]:checked').value : 'No';
        (addonValue === 'Yes') ? addonValue = true: addonValue = false;

        if (addonValue) baseFee += 1000;

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