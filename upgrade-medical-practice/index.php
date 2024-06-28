<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <title>Medical Practices Page</title>
</head>

<body style="font-family: 'Now';">
    <?php
 include "connection.php";

$sql = "SELECT coupon_code FROM upgrade_medical_form_coupon";
$result = $conn->query($sql);

// Array to store all available coupons
$available_coupons = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Store each coupon code in the array
        $available_coupons[] = $row["coupon_code"];
    }
}

$conn->close();


?>

  <section class="health_ambasador_section">
    <div class="health_ambasador_area">
      <div class="container">
        <div class="title_main">
          <div class="heading_area">
            <h1>Upgrade & Grow Your Medical Practice</h1>
          </div>
        </div>
        <div class="health_ambasador_area">
          <img src="./images/national clinical workshop-02.png" alt="health" class="health_ambasador_img" />
        </div>
      </div>
    </div>
  </section>

  <section class="coach_section">
    <div class="coach_area">
      <div class="container">
        <div class="title_main">
          <h3 class="coach">Learn detailed Neuro Panchakarma procedures
          </h3>
        </div>
        <div class="neuro_punchkarma_list">
          <ul>
            <li>Patient assessment and personalized treatment plans</li>
            <li>Herbal formulations and their applications</li>
            <li>Techniques for enhancing neurological health</li>
            <li>Strategies for integrating Neuropanchkarma into your practice</li>
          </ul>
        </div>
        <div class="img_national_clinic">
          <img src="./images/national clinical workshop-03.jpg" alt="National-clinical" class="national_clic_img" />
        </div>
        <div class="register_area">
          <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Register Now</a>
        </div>
      </div>
    </div>
  </section>

  <section class="workshoptime_section">
    <div class="workshoptime_area">
      <div class="container">
        <div class="title_main">
          <h3 class="coach">Training Details</h3>
        </div>
        <div class="img_national_clinic">
          <img src="./images/national clinical workshop-04-04.jpg" alt="Training-img" class="national_clic_img" />
        </div>
      </div>
    </div>
  </section>

  <section class="as_youknow_section">
    <div class="as_youknow_area">
      <div class="container">
        <div class="title_main">
          <h3 class="coach">Why Choose Neuro Panchakarma Training?</h3>
        </div>
        <div class="img_national_clinic">
          <img src="./images/national clinical workshop-06.jpg" alt="Training-img" class="national_clic_img" />
        </div>
      </div>
    </div>
  </section>

  <section class="demo_plan_section">
    <div class="demo_plan_area">
      <div class="container">
        <div class="title_main">
          <h3 class="coach">Top Experts will take sessions</h3>
        </div>
        <div class="img_national_clinic">
          <img src="./images/national clinical workshop-05-05-05 (1).jpg" alt="Training-img"
            class="national_clic_img" />
        </div>
      </div>
    </div>
  </section>

  <section class="video_section">
    <div class="video_area">
      <div class="container">
        <div class="title_main">
        </div>
        <div class="video_play_area">
          <iframe width="720" height="400" src="https://www.youtube.com/embed/Ch17_UpBs7Q?si=tSbo_eUhb2Xf9RSC" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="work_desc_area">
          <div class="list_main">
            <ul>
                <li class="list_acco">Accommodation and Fooding will not be provided by the organizers during offline sessions!</li>
              <li>Normal Fees of the Course is <strong>₹ 5100</strong></li>
              <li>After using the inaugural discount coupon code the fees will be <strong>₹ 2100!</strong>
                (if you don't have any coupon code then call on this number to get your coupon: <span
                  style="color: green;font-weight: 600;">8077785404</span>)
              </li>
              <li class="list_acco"><strong style="font-size:18px;">ऑफ़लाइन सत्र के दौरान आयोजकों द्वारा आवास और भोजन उपलब्ध नहीं कराया जाएगा!</strong></li>
              <li><strong>कोर्स की सामान्य फीस ₹5100 है।</strong></li>
              <li><strong>उद्घाटन डिस्काउंट कूपन कोड का उपयोग करने के बाद शुल्क ₹ 2100 होगा!</strong></li>
              <li><strong>(यदि आपके पास कोई कूपन कोड नहीं है तो अपना कूपन प्राप्त करने के लिए इस नंबर पर कॉल करें:
                  8077785404)</strong></li>
            </ul>
            <div class="register_area">
              <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Register Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>

   <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registration for this course is closed.</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <!--  <form id="healthForm" action="medical-practice.php" method="post" >-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-6 col-sm-12 col-12">-->
              <!--        <div class="mb-3">-->
              <!--          <label for="exampleFormControlInput1" class="form-label">Name (नाम)</label><span class="text-danger">*</span>-->
              <!--          <input type="name" class="form-control" id="exampleFormControlInput1" name="name" required-->
              <!--            placeholder="Enter Your Name" onclick="sbtn()">-->
              <!--        </div>-->
              <!--      </div>-->
              <!--      <div class="col-md-6 col-sm-12 col-12">-->
              <!--        <div class="mb-3">-->
              <!--          <label for="exampleFormControlInput1" class="form-label">DOB (जन्म तिथि)</label><span class="text-danger">*</span>-->
              <!--          <input type="date" class="form-control" id="exampleFormControlInput1" name="dob" required-->
              <!--            placeholder="Enter Your DOB">-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-6 col-sm-12 col-12">-->
              <!--        <div class="mb-3">-->
              <!--          <label for="exampleFormControlInput1" class="form-label">WhatsApp No. (व्हाट्सएप नंबर)</label><span class="text-danger">*</span>-->
              <!--          <input type="tel" class="form-control" id="exampleFormControlInput1" name="whatsapp" required-->
              <!--            placeholder="Enter WhatsApp No."-->
              <!--            pattern="[0-9]{10}"-->
              <!--            minlength="10" maxlength="10">-->
              <!--        </div>-->
              <!--      </div>-->
              <!--      <div class="col-md-6 col-sm-12 col-12">-->
              <!--        <div class="mb-3">-->
              <!--          <label for="exampleFormControlInput1" class="form-label">Mobile No. (मोबाइल नंबर)</label><span class="text-danger">*</span>-->
              <!--          <input type="tel" class="form-control" id="exampleFormControlInput1"-->
                       
              <!--            name="mobile" required-->
              <!--            pattern="[0-9]{10}"-->
                          
              <!--            minlength="10" maxlength="10"-->
              <!--            placeholder="Enter Your No.">-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--    <div class="mb-3">-->
              <!--      <label for="exampleFormControlInput1" class="form-label">Email (ईमेल)</label><span class="text-danger">*</span>-->
              <!--      <input type="email" class="form-control" id="exampleFormControlInput1"-->
              <!--      name="email" -->
              <!--        placeholder="Enter Your Email">-->
              <!--    </div>-->
              <!--    <div class="mb-3">-->
              <!--      <label for="exampleFormControlTextarea1" class="form-label">Address (पता)</label>-->
              <!--      <textarea class="form-control" id="exampleFormControlTextarea1"-->
              <!--      name="address"  rows="3"></textarea>-->
              <!--    </div>-->
              <!--    <div class="row">-->
              <!--      <div class="col-md-6 col-sm-12 col-12">-->
              <!--        <div class="mb-3">-->
              <!--          <label for="exampleFormControlInput1" class="form-label">Pin Code (पिन कोड)</label>-->
              <!--          <input type="number" class="form-control" id="exampleFormControlInput1"-->
              <!--          name="pincode" -->
              <!--            placeholder="Enter Pin Code">-->
              <!--        </div>-->
              <!--      </div>-->
              <!--      <div class="col-md-6 col-sm-12 col-12">-->
              <!--        <div class="mb-3">-->
              <!--          <label for="exampleFormControlInput1" class="form-label">Qualification (शैक्षणिक-->
              <!--            योग्यता)</label>-->
              <!--          <input type="text" class="form-control" id="exampleFormControlInput1"-->
              <!--          name="qualification" -->
              <!--            placeholder="Enter Qualification">-->
              <!--        </div>-->
              <!--      </div>-->
              <!--      <div class="col-md-6 col-sm-12 col-12">-->
              <!--        <div class="mb-1">-->
              <!--          <label for="exampleFormControlInput1" class="form-label">Coupon </label>-->
              <!--          <input type="text" class="form-control" id="exampleFormControlInput1"-->
              <!--          name="coupon"-->
              <!--            placeholder="Coupon" onchange="couponvalidate(this.value)">-->
              <!--        </div>-->
              <!--      </div>-->
              <!--          <span id="message" style="color:green !important"></span>-->
              <!--           <span id="err" style="color:red !important"></span>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--    <div class="modal-footer">-->
                    
              <!--      <input type="submit" class="btn btn-secondary bg-success" value="Submit" id="submit" disabled>-->
              <!--      <div class="note_area">-->
              <!--      <p><strong>(नोट: यदि आपके पास कूपन नहीं है तो आप हमारे नंबर पर कॉल करके इसे प्राप्त कर सकते हैं।) -->
              <!--        किसी भी सहायता के लिए कॉल करें: </strong><a href="#">8077785404                                   </a></p>-->
              <!--    </div>-->
              <!--    </div>-->
              <!--</form>-->
            </div>
          </div>
        </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    function sbtn(){
    document.getElementById('submit').disabled=false;
  };

function couponvalidate(coupon) {
    var coupon_from_phps= <?php echo json_encode($available_coupons); ?>;
    var enteredCoupon  = coupon.toUpperCase();
    var amount;

    var isvalid = coupon_from_phps.some(function(coupon_from_form) {
        return coupon_from_form === enteredCoupon && coupon_from_form.length === enteredCoupon.length;
    });

    console.log(isvalid);

    if(isvalid) {
      amount = 2100;
      document.getElementById('message').innerHTML = "Coupon code applied successfully" + "<br>" +"Total amount: 	₹" + +amount ;
      document.getElementById('err').innerHTML = "";
      document.getElementById('submit').disabled = false;
      return true;
    }
    else if (enteredCoupon == ''){
      document.getElementById('message').innerHTML = "";
      document.getElementById('err').innerHTML = "";
      document.getElementById('submit').disabled = false;
    }
    else{
      amount = 5100;
      document.getElementById('message').innerHTML = "";
      document.getElementById('err').innerHTML = "Please enter a valid coupon code" + "<br>" +"Total amount: 	₹" + amount;
      document.getElementById('submit').disabled = true;
      return false;
    }
  }
</script>
</body>

</html>