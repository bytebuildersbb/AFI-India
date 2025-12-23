<?php
session_start();
$successMessage = $_SESSION['successMessage'] ?? '';
unset($_SESSION['successMessage']);


 include "./KidneyCare_Batch2/connection.php";
 include "./KidneyCare_Batch2/encrption.php";
 
// Handle POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    
    $id = $_POST['registration_id'] ?? ''; // from hidden input or localStorage
    $email = $_POST['email'] ?? '';


    if (empty($id) && empty($email)) {
        die("Missing both ID and Email. Cannot update record.");
    }

    // Decide update method
    if (!empty($id)) {
        $whereClause = "id = ?";
        $bindType = "i";
        $bindValue = $id;
    } else {
        $whereClause = "`Email ID` = ?";
        $bindType = "s";
        $bindValue = $email;
    }

    $fullname = $_POST['fullname'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
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
        $uploadDir = './KidneyCare_Batch2/uploads/';
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

     $sql = "UPDATE `Kidney Care Batch 2 Registration`
        SET 
            `Name` = ?,
            `New Mobile Number` = ?,
            `Email ID` = ?,
            `Qualification` = ?,
            `System Practiced` = ?,
            `State & City` = ?,
            `Clinic / Institution / Hospital Name` = ?,
            `Years of Clinical Experience` = ?,
            `Are You Treating Kidney Patients?` = ?,
            `Select Your Registration Type` = ?,
            `Upload Degree Certificate / Registration Proof` = ?,
            `Add-on Features` = ?,
            `Postal Address` = ?,
            `Preferred Payment Mode` = ?,
            `Referral Code (if any)` = ?,
            `Total Fees` = ?,
            `Detail Filled Time` = ?
            WHERE $whereClause";

    $stmt = $conn->prepare($sql);

    // Bind all update fields + the where parameter
     $typeString = "sssssssisssssssis" . $bindType;

    $detailFilledTime = date("Y-m-d H:i:s");

    $stmt->bind_param(
        $typeString,
        $fullname, $mobile, $email, $qualification, $system,
        $location, $clinic, $experience, $treating, $registration_type,
        $certificatePath, $addon, $address, $payment, $referral, $basefare,
        $detailFilledTime,
        $bindValue
    );


    if ($stmt->execute()) {
        // Redirect to payment step
        $encryptedEmail = urlencode(encryptData($email));
        $encryptedFlag = urlencode(encryptData('false'));
        echo('Email:' . $$email);
        
        header("Location: ./KidneyCare_Batch2/payment.php?e=$encryptedEmail&&c=$encryptedFlag");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
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
    <link rel="stylesheet" href="./KidneyCare_Batch2/styles.css">
    <style type="text/css">
        .increaseLineHeight li{
                line-height:2.5;
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
                        <h2 class="section-title">Kidney Care Vaidya (KCV) – Batch 2</h2>
                        <p class="lead text-center">🌿 3-Day Online CME </p>
                        <div class="imageParent">
                            <img src="./KidneyCare_Batch2/img/3 Day Online CME - 1.jpg" alt="CME Event 2">
                        </div>
                        <p class="ntext"><strong>Date:</strong> 24, 25 & 26 October 2025<br>
                            <strong>Time:</strong> 7:00 PM Onwards<br>
                            <strong>Mode:</strong> 100% Online (Join from Anywhere)<br>
                            <strong>Eligibility:</strong> Registered / Institutionally Qualified Ayurved Doctors & Graduates 
                        </p>
<div class="imageParent">
                                <img src="./KidneyCare_Batch2/img/3 Day Online CME - 1(a).jpg" alt="CME Event 2">
                            </div>

                        <div class="mt-5">
                            <h3 class="stripTwo">“जहाँ Dialysis रुकती है, वहाँ से DNA Kayakalp Protocol शुरू होता है!”</h3>
                            <br/>
                            <blockquote class="blockquote">Dialysis, transplant और दीर्घकालिक दवाइयों की सीमाएँ हैं- ऐसे
                                में Ayurveda एक सुरक्षित, पूरक और root-cause-oriented दृष्टिकोण दे सकता है। अगर आप
                                Kidney Failure से जूझ रहे patients के लिए ग्राउंड-लेवल प्रभाव बनाना चाहते हैं-यह CME
                                आपके लिए है।</blockquote>
                            
                        </div>
                        <div class="mt-5">
                            <h3 class="strip"> सेशन के प्रमुख विषय</h3>
                            <ul class="ntext increaseLineHeight" style="list-style: inside;">
                                <li >✅ <b> Ayurvedic Clinical Approach → </b> रोग के मूल कारण पर कार्य </li>
                                <li>✅ <b> DNA Kayakalp Protocol → </b> CKD के लिए step-by-step framework </li>
                                <li>✅ <b> Hidden Truths of Kidney Failure → </b> clinical realities & hidden challenges
                                    doctors must know </li>
                                <li>✅ <b> Modern Diagnosis + Ayurvedic Intervention का समन्वय </b> </li>
                                <li>✅ <b> Dialysis, Steroids, Transplant → </b> side-effects/limitations की वास्तविकता
                                </li>
                                <li>✅ <b> Ayurveda as a Safe & Root-Cause Option → </b> sustainable, patient-centric
                                    approach </li>
                                <li>✅ <b> Building a Successful Kidney Practice → </b> रोगी जुड़ाव, trust & outcomes
                                </li>
                                <li>✅ <b> Case Studies & Practical Insights → </b> real patient improvements
                                    (documented) </li>
                            </ul>
                            <div class="imageParent">
                                <img src="./KidneyCare_Batch2/img/3 Day Online CME - 2.jpg" alt="CME Event 2">
                            </div>
                        </div>
                        <div class="mt-5">
                            <h3 class="mt-5 strip"> 3-Day Program Snapshot</h3>
                            <p class="ntext" style="font-weight:600;text-align:center"> Live Online | 24–25–26 October 2025 | 7 PM onwards
                            </p>

                            <h2 class="mt-5"> Day 1 - <i>Foundations & Context</i></h2>
                            <ul class="ntext" style="list-style: inside;">
                                <li>CKD burden (India + global) कार्य </li>
                                <li>क्यों kidney cases बढ़ रहे हैं (lifestyle, OTC analgesics/PPIs, co-morbidities)</li>
                                <li>दोष–धातु–मूत्र प्रणाली (Ayurvedic lens)</li>
                                <li>DNA Kayakalp Protocol - philosophy & framework</li>
                                <li>Live Q&A</li>
                            </ul>
                            <h2 class="mt-5"> Day 2 - <i>Protocols, Diet & Labs</i></h2>
                            <ul class="ntext" style="list-style: inside;">
                                <li>DNA Kayakalp Protocol in detail → step-by-step clinical application</li>
                                <li><b> Lab → Diet Mapping → </b> lab reports (Creatinine, Urea, Electrolytes, eGFR) को
                                    <b> DASH/Mediterranean + MDRD </b> nutrition principles से जोड़कर <b> Ayurvedic diet
                                        protocols </b> में translate करना — ताकि practical, patient-friendly outcomes
                                    मिलें
                                </li>
                                <li><b> HIF pathway (overview & relevance) +</b> अन्य research-backed scientific
                                    insights</li>
                                <li>Real case studies → documented improvements</li>
                                <li><b> Red-flags → </b> कब advanced intervention/Referral ज़रूरी है</li>
                            </ul>

                            <h2 class="mt-5"> Day 3 - <i>Clinic SOPs & Real-World Practice</i></h2>
                            <ul class="ntext" style="list-style: inside;">
                                <li><b> OPD demo → </b> intake forms, counselling scripts, follow-up cadence</li>
                                <li><b> रोगी अपेक्षा-संवाद & Ethical counselling </b> (dialysis/transplant context)</li>
                                <li><b> Detailed treatment protocols → </b> Diet, Medications, Panchakarma, Rasayana,
                                    follow-up regimen</li>
                                <li><b> Submission brief → </b> Live Q&A • MCQ & certification flow</li>
                            </ul>
                            <div> <b>Recordings:</b> revision-only (limited time) </div>
                            <div> <b>E-Certificate: </b> live attendance + MCQ + 1 submission आवश्यक </div>

                            <div class="imageParent">
                                <img src="./KidneyCare_Batch2/img/3 Day Online CME - 3.jpg" alt="CME Event 2">

                            </div>

                        </div>
                        <div class="mt-5">
                            <h3 class="strip">Why Ayurveda in CKD?  </h3>
                            <p class="ntext" style="text-align:center">
                                <b>Conventional care:</b>  <br/>
                                Fatigue | Immunity Loss | BP Spike <br/> 
                                <span style="color:Red">“Dialysis for life”</span><br/>
                                vs<br/>
                                <b>Ayurveda:</b> <br/>
                                Detox | Rasayan | Pran Urja <br />
                                <span style="color:green">“Address the root with a complementary approach” </span><br/>
                            </p>
                            <div class="imageParent">
                                <img src="./KidneyCare_Batch2/img/3 Day Online CME - 4.jpg" alt="CME Event 2">
                            </div>
                        </div>
                        <div class="mt-5">
                            <h3 class="strip">Fee Structure </h3>
                            <ul class="ntext increaseLineHeight" style="list-style: inside;">
                                <li> <b> General Registration</b>
                                    <ul class="ntext" style="list-style: none;margin-left: 20px">
                                        <li> 🎓 Doctors (BAMS/Practicing):<b> ₹2,499</b></li>
                                        <li> 🧑‍🎓 Students (Intern/PG):<b> ₹1,799</b></li>
                                    </ul>
                                </li>
                                <li><b> Early Bird Registration(till 19 Oct 2025):</b>
                                    <ul class="ntext" style="list-style: none;margin-left: 20px">
                                        <li>🎓 Doctors (BAMS/Practicing):<b> ₹1,899</b></li>
                                        <li>🧑‍🎓 Students (Intern/PG):<b> ₹1,299</b></li>
                                    </ul>
                                    
                                    </li>
                                <li><b>Add-on (+1000):</b>
                                    <ul class="ntext" style="list-style: inside;margin-left: 20px">
                                        <li>Printed Handouts + Kidney Kavach Book</li>
                                        <li>Printed Certificate, Printed Care Vaidya Clinic Certificate, Unique Program
                                            ID Card (couriered)</li>
                                        <li>WhatsApp Group Lifetime Access + hands-on support</li>
                                    </ul>
                                </li>

                                <li><b>Base Pass Includes (all): </b>
                                    <ul class="ntext" style="list-style: none;margin-left: 20px">
                                        <li>✔️ Lifetime WhatsApp Group</li>
                                        <li>✔️ Recording access (limited, for revision)</li>
                                        <li>✔️ Live Q&A + Case discussions</li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="imageParent">
                                <img src="./KidneyCare_Batch2/img/3 Day Online CME - 5.jpg" alt="CME Event 2">

                            </div>
                        </div>
                        <div class="mt-5">
                            <h3 class="strip"> Certification & Eligibility </h3>
                            <ul class="ntext increaseLineHeight"  style="list-style: inside;">
                                <li><b>Certification (3 नियम): </b>
                                    <ul class="ntext" style="list-style: inside;margin-left: 20px">
                                        <li><b>Full Attendance </b>(Live Sessions)</li>
                                        <li><b>1 Submission:</b> Patient Success Story या Awareness Video</li>
                                        <li><b>Short MCQ:</b> ~25 Questions</li>
                                    </ul>
                                    
                                </li>
                                <li> <b>Eligibility: </b>
                                    <br />🔐 केवल <b>Registered / Institutionally Qualified Ayurveda Doctors & Graduates
                                    </b>
                                </li>
                                
                            </ul>
                            
                                <div style="text-align:center; display:flex; flex-direction:column; gap:8px" class="mt-5">
                                    <h3>🔥 “3 दिन का सेशन… जीवन भर की Clinical Clarit</h3>
                                    <h3>🚀 “सीमित सीट — Early Bird बुकिंग का लाभ </h3>
                                    <h3>🌿 “Join evidence-based clinical learning in Ayurveda!”</h3>
                                </div>
                                
                            
                            <div class="imageParent">
                                <img src="./KidneyCare_Batch2/img/3 Day Online CME - 6.jpg" alt="CME Event 2">

                            </div>
                        </div>

                        <div class="mt-5">
                            <h3 class="strip">Purpose of the Program </h3>
                            <li>“इस CME का उद्देश्य <b>सिर्फ clinical learning </b> देना नहीं है, बल्कि आपको <b>
                                    evidence-based, स्पष्ट और व्यावहारिक tools </b> देना है, जिनसे आप Kidney Care में
                                <b> ground level </b> पर <b> वास्तविक प्रभाव </b> बना सकें।”
                            </li>
                            <ul class="ntext increaseLineHeight" style="list-style: inside;">
                                <li><b>हमारा फोकस है कि आप Kidney Care में:</b>
                                    <ul class="ntext" style="list-style: inside;margin-left: 20px">
                                        <li><b>Clinic-ready protocols </b> अपनाएँ</li>
                                        <li><b>रोगी परामर्श व देखभाल </b> में आत्मविश्वास विकसित करें</li>
                                        <li><b>एक supportive ecosystem </b> के सहारे इस प्रोग्राम के बाद भी अपने
                                            practice को निरंतर आगे बढ़ें</li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="imageParent">
                                <img src="./KidneyCare_Batch2/img/3 Day Online CME - 7.jpg" alt="CME Event 2">

                            </div>
                        </div>
                        <div class="mt-5">
                            <h3>लोगों को इस गंभीर समस्या में लाभ पहुंचाने के लिए आप भी जिम्मेदारी लें !</h3>
                                <h4>Verified Facts: </h4>
                            
                            <ul class="ntext increaseLineHeight" style="list-style: inside;">
                                <li>
                                    <b> हाल ही की सिस्टमैटिक रिव्यू (2025) के अनुसार लगभग 13% वयस्क आबादी किसी न किसी
                                        स्तर पर CKD से प्रभावित है। यह दर क्षेत्र और शहरी–ग्रामीण पृष्ठभूमि के अनुसार
                                        अलग-अलग पाई गई।</b>
                                    <b>India CKD prevalence (15+ years): ~13% (pooled) </b> across community studies,
                                    varies by region/urban-rural (systematic
                                    review, 2025). (Links: <a href="https://onlinelibrary.wiley.com/doi/full/10.1111/nep.14420,
                                    https://pubmed.ncbi.nlm.nih.gov/39763170/"
                                        target="_blank">Click here</a>)
                                </li>
                                <li>
                                    <b> वैश्विक बोझ (Global Burden):</b> <br /> दुनिया में लगभग <b>70 करोड़ लोग CKD के
                                        साथ जी रहे हैं </b>और केवल 2021 में ही लगभग <b> 15 लाख लोगों की मृत्यु </b> इसका
                                    कारण बनी।
                                    <br /> CKD की मृत्यु दर की स्थिति 1990 में 18वें स्थान से बढ़कर 2021 में लगभग <b>
                                        11वें स्थान </b>पर पहुँच गई।
                                    <br />  700 million people living with CKD, ~1.5 million deaths in 2021. CKD’s
                                    mortality rank rose from 18th (1990) to ~11th (2021) globally. (Link: <a
                                        href="https://bmcnephrol.biomedcentral.com/articles/10.1186/s12882-025-04309-7"
                                        target="_blank">Click here </a>)
                                </li>
                                <li>
                                    <b> कहाँ सबसे अधिक प्रभावित? </b>
                                    <br />CKD का सबसे बड़ा बोझ LMICs (Low & Middle-Income Countries) में है।
                                    <br />विश्व के कुल CKD रोगियों का लगभग एक-तिहाई हिस्सा भारत और चीन में पाया जाता है।
                                    <br />Growth concentrated in LMICs, nearly one-third of CKD patients live in India &
                                    China. (Link:<a href="https://www.nature.com/articles/s41581-024-00820-6"
                                        target="_blank">Click here</a>)
                                </li>
                                <li><b>आहार से जुड़ा वैज्ञानिक आधार (Diet Frameworks): </b>
                                    <ul style="list-style: inside;" class="ntext increaseLineHeight">
                                        <li><b>DASH Diet </b> → रक्तचाप नियंत्रण में लाभकारी</li>
                                        <li><b> MDRD / Renal Nutrition → </b> प्रोटीन, सोडियम, पोटैशियम और फॉस्फोरस पर
                                            नियंत्रण</li>
                                        <li>इन आधुनिक आहार-रिसर्च को समझकर <b> इन्हें आयुर्वेदिक आहार (Ahara) सिद्धांतों
                                            </b> से जोड़कर कैसे उपयोग करना है, इस कार्यक्रम में आप यह सीखकर रोगियों के
                                            लिए व्यवहारिक और सुरक्षित विकल्प तैयार कर पाएंगे।</li>
                                    </ul>
                                    <b> Diet frameworks with evidence signals:</b> DASH shows BP benefits, MDRD/renal
                                    nutrition focuses on protein/sodium/potassium/phosphorus management—translate
                                    thoughtfully to <b> Ayurvedic Ahara.</b> (Link: <a
                                        href="https://pmc.ncbi.nlm.nih.gov/articles/PMC8003274/"
                                        target="_blank">Click here/</a>)
                                </li>
                            </ul>
                        </div>
                        <div class="mt-5 ntext">
                            <p class="ntext"><strong>🔰 Hurry! Limited Seats – Early Bird till 19th October</strong></p>
                            <p class="ntext">📞 For Queries: 9220358400<br>
                                📩 Email: Ayurvedafederation@gmail.com</p>
                        </div>

                        <div class="video_section mt-4">
                            <div class=" imageParent" id="videoFrameId">
                              <iframe width="560" height="315" src="https://www.youtube.com/embed/Z-gZ18LS1pY?si=QTOTN7jHLFIGgbmK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <form id="termsForm" class="floatingButton">
                        <div class="cta-button text-center" style="    width: 100%;">
                            <button type="button" class="btn btn-primary btn-lg " style="display:flex;flex-direction:column;width: 100%;margin-top:0;background: linear-gradient(90deg,rgba(255, 0, 0, 1) 0%, rgba(117, 0, 0, 1) 100%);" onclick="goToRegister(event)">
                                <span style="font-weight:bold; font-size:26px; margin-bottom:5px;    letter-spacing: 1px;">Register Now <br/></span>
                                <span style="font-weight:bold; font-size:13px">    📝 सीटें सीमित—अभी रजिस्टर करें!   </span>
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
            <h3 class="mb-4">📝 Kidney Care CME Registration</h3>
            <?php if (!empty($successMessage)) : ?>
            <div class="alert alert-success"><?= $successMessage ?></div>
            <?php endif; ?>
            <!-- <form method="post" enctype="multipart/form-data"> -->
            <form action="3-Day-Online-CME.php" method="POST" enctype="multipart/form-data">
                <!-- Step 1 -->
                <input type="hidden" name="registration_id" id="registration_id">
                <div id="step1">
                    <div class="form-group">
                        <label><span class="required">*</span> Full Name</label>
                        <input type="text" class="form-control" name="fullname" value="<?= $_POST['fullname'] ?? '' ?>"
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
                    <button type="button" class="btn btn-primary" onclick="nextStep(1)">Next</button>
                </div>
                <!-- Step 2 -->
                <div id="step2" style="display: none;">
                    <div class="form-group">
                        <label> <span class="required">*</span> Qualification</label>
                        <select class="form-control" name="qualification" required>
                            <option>BAMS</option>
                            <!--<option>BNYS</option>-->
                            <!--<option>BHMS</option>-->
                            <!--<option>BUMS</option>-->
                            <!--<option>BSMS</option>-->
                            <!--<option>MD</option>-->
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><span class="required">*</span> System Practiced</label>
                        <select class="form-control" name="system" required>
                            <option selected="true">Ayurveda</option>
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
                        <label><span class="required">*</span> Upload Degree Certificate / State Registration
                            Certificate</label>
                        <input type="file" accept=".pdf,.jpg,.jpeg,.png" class="form-control-file" name="certificate"
                            onchange="fileUploadHandle(this)" required>
                    </div>
                     <div class="form-group">
                    <label> <span class="required">*</span> Select Your Registration Type</label><br>
                    <select class="form-control" id="category" name="registration_type" required
                        onchange="calculateFee()">
                        <option value="">-- Select --</option>
                        <option value="Intern">Ayurved Intern / PG Scholar</option>
                        <option value="Doctor">Ayurved Doctor</option>
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
                    <div class="form-group" id="referralCodeBoxId">
                        <label>Referral Code (if any)</label>
                        <input type="text" id="referralCodeId" class="form-control" onkeyup="applyCoupen()" name="referral">
                    </div>
                    <div style="display:flex;justify-content:space-between;gap:12px" class="rs-col mt-4">
                        <h5 class="totalFeeBox rs-order-1"><strong>Total Fees: <input type="text"
                                    class="form-control feesInput" value="INR 0" name="basefare" id="basefare"></strong>
                        </h5>

                        <div style="display:flex;gap:12px" class="rs-order-2">
                            <button type="button" style="margin-top:0" class="rs-flex-1 btn btn-secondary"
                                onclick="nextStep(0)">Back</button>
                            <button type="submit" style="margin-top:0" class="rs-flex-1 btn btn-primary">Proceed to
                                Pay</button>
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
                }
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

            fetch('./KidneyCare_Batch2/check_email.php', {
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
    function applyCoupen(){
        let coupenList = ['svkcv1899'];
        const referralField = document.getElementById("referralCodeId").value;
        if(referralField !== '' && referralField !==undefined){
            const referralCode = referralField.toLowerCase();
            if (coupenList.includes(referralCode)) {
                console.log("Referral code matched!");
                isCoupenApplied= true;
                calculateFee();
            } else {
                console.log("Invalid referral code!");
                isCoupenApplied= false;
                calculateFee();
            }

        }
    }


    function calculateFee() {
        let baseFee = 0;
        const catValue = document.getElementById("category").value;
        if (catValue === "Intern") {
            baseFee = 1299;
           document.getElementById("referralCodeBoxId").style.display = 'none';
        }
        // if (catValue === "Intern") baseFee = 1;

        else if (catValue === "Doctor"){
          baseFee = 1899;
          isReferralCode= true;
           document.getElementById("referralCodeBoxId").style.display = 'block';
        } 

    

        let addonValue = document.querySelector('input[name="addon"]:checked') ? document.querySelector('input[name="addon"]:checked').value : 'No';
        (addonValue === 'Yes') ? addonValue = true: addonValue = false;

        if (addonValue){
          baseFee += 1000;  
        } 
        
        if(isCoupenApplied && catValue === "Doctor"){
            baseFee -= 1899;
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