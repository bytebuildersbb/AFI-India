<?php
    ob_start();
    ob_end_flush();

session_start();
include "layouts/main-header.php";

$pubcationid = base64_decode($_GET['pid']);

$getMetas   =  "SELECT * FROM tbl_publication where pub_id='$pubcationid'";
$runQuery   =  $connect->query($getMetas);
$result     = $runQuery->fetch_object();

/*if(isset($_POST['submit'])){ 
    
    $membershipidno = $_POST['phone'];
    $_SESSION['verifiedUser'] = $pubcationid;
    
    $inst = "Insert into `tbl_publication_logs`(`publication_id`, `member_id`, `who_watched`)values('$pubcationid', '$membershipidno', '1')";
    $rst   =  $connect->query($inst);
    
}*/
$code = '';

if(isset($_POST['submit'])){
    $memberID   = $_POST['memberID'];
    $name       = $_POST['name'];
    $forstudent = "practitioner";

    $mobile     = $_POST['mobile'];
    $email      = $_POST['email'];
    $returnurl  = $_POST['returnurl'];
    
    $query = "SELECT * FROM `tbl_publication` where pub_id='$memberID'";
    $runQuery   =  $connect->query($query);
    
    $data = $runQuery->fetch_object();
    
    
    $tpdf           = $data->pub_pdf;
     
    $pdf_path       = $_SERVER['DOCUMENT_ROOT']."/admin/uploads/publications/pdf/";
    $pdf            = $pdf_path.$tpdf;
   
    
    $query = "INSERT INTO `tbl_foundingteamdownloadpdf`( `ft_id`,`f_name`, `f_forstudent`, `f_mobile`, `f_email` ) VALUES ( '$memberID','$name','$forstudent','$mobile','$email' )";
    $runQuery   =  $connect->query($query);
        
    if($runQuery){
        $code = 'show';
    }
    
    // "/whd/admin/uploads/publications/pdf/1709295597PDF.pdf"
    if ($pdf) { ?>
         <script>
            var pdfurl = "/admin/uploads/publications/pdf/" + "<?php echo $tpdf; ?>";
            // console.log("pdfurl", pdfurl);
            // window.location.href = pdfurl;

            fetch(pdfurl)
        .then(response => response.blob())
        .then(blob => {
            var url = URL.createObjectURL(blob);

            var a = document.createElement("a");
            a.href = url;
            a.download = "downloaded_pdf_file.pdf"; 
            a.style.display = "none";

            document.body.appendChild(a);
            a.click();

            document.body.removeChild(a);


            // This is if you want to redirect back 
            // window.location.href = "/whd/journal-public.php?page_no=1";
        })
        .catch(error => console.error("Error downloading PDF:", error));
         </script>
        
        <?php
        // exit;
    } else {
        // Handle file not found error
        echo " File not found.";
    }
}
//session_destroy();
?>
<style>
html {user-select: none;}
.jdoct{display:none;}
a[disabled="disabled"] {pointer-events: none;}
#resend{display: none;}
#resend-otp-sec{display: none;}
p.abc {
    margin: 0 auto;
    text-align: center !important;
    font-size: 20px;
}
</style>
<!-- admin/uploads/publications/pdf/1709295597PDF.pdf -->
<?php if(isset($_GET['pid'])){ ?>
    
<?php //if(isset($_SESSION['verifiedUser']) && $_SESSION['verifiedUser'] == $pubcationid){?>
<?php if(!empty($code)){?>
    <div class="container pt-5 pb-5" id="jdoc" oncontextmenu="return false;" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false">

            <!-- <p><a href="<?php echo "admin/uploads/publications/pdf/".$result->pub_pdf; ?>"><img src="img/download-pdf.png"></a></p> -->
            <p class="abc mb-3"><strong style="font-size: 40px;color:#ed5217;">Thankyou!!</strong></p>
          <p class="abc"> Your file has been downloaded successfully.</p>
          <p class="abc" style="color:green !important;font-size:17px !important;">(Please check download section in your mobile!)</p>
    </div>
    
    

<?php }else{ ?>


    <div class="container pt-5 pb-5">
    	<div class="row justify-content-center">
    		<div class="col-12" style="padding-right:0px;padding-left:0px;">
    			<div class="col-md-10 col-xs-12">
                <form id="journaldoc" action="<?php echo $_SERVER['PHP_SELF'];?>?pid=<?php echo $_GET['pid'];?>" method="POST">
    			    <form  method="post" name="foundingteam">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required> 
                        </div>

                        <!-- <div class="form-group">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Number" pattern="[6789][0-9]{9}" title="Please enter valid phone number" required>
                        </div>  -->
                        <div class="form-group required otp">
							<label class="control-label col-12">Otp: </label>
							<div class="col-sm-10">
								<input type="text" name="otp" id="otp"/>
								<label class="error" style="display:none;" id="otp-error">OTP does not match.</label>
							</div>
						</div>
<!-- 						
						<input style="float:right;" type="button" id="sendotp" name="next" class="sendotp action-button"  /> -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required>
                        </div>    
                        <input type="hidden" name="memberID" value="<?php echo $pubcationid; ?>" >
                        <input type="hidden" name="returnurl" value="<?php echo $_SERVER['REQUEST_URI']; ?>" >
                       <!-- <button type="submit" name="submit" class="btn btn-primary">Submit</button>-->
                   
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <div class="otp-container">
                                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" maxlength="10">
                                <a href="javascript:void(0);" class="sendOtp btn btn-primary">Send OTP</a>    
                            </div>
                            <span id="memiderror"></span>
                        </div> 
<!-- 
                        <!-- <form action="your_script.php" method="post" id="otp_verification_form"> -->
                        <!-- <input type="hidden" name="expected_otp" id="expected_otp" value="<?php echo $otp; ?>"-->
                        <!-- Hidden field to pass the expected OTP to the form -->
                        <!-- <input type="text" name="otp" id="otp_input" placeholder="Enter OTP" required> -->
                        <!-- <input type="button" value="Verify OTP" id="verify_otp_button"> -->
                    <!-- </form> --> 

                        <div class="form-group otpfield" style="display:none;">
                            <label for="exampleInputPassword1">OTP</label>
                            <div class="otp-container">
                                <input type="text" class="form-control" id="otp_number" placeholder="OTP">
                                <a href="javascript:void(0)" id="verify_otp_button" class="btn btn-primary">Verify OTP</a>    
                                <!-- <input type="button" value="Verify OTP" id="verify_otp_button" class="btn btn-primary"> -->
                            </div>
                            <input type="hidden" id="publicationid" value="<?php echo $publicationid; ?>" />
                        </div>
                        <div class="form-group mt-1" id="resend-otp-sec">
                            <span id="timer" style="color : #007bff"></span>
                            <a href="javascript:void()" class="resend" id="resend">Resend OTP</a>
                        </div>
                <button type="submit" disabled name="submit" class="btn btn-primary memsub" style="display:none;">Submit</button>
           
                        </div>
                       
                       <!-- <a href="javascript:void(0)" class="btn btn-primary sendOtp">Send Otp</a>
                        <!-- <button type="submit" name="submit" class="btn btn-primary">Submit</button>-->
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php } ?>



<?php }else{ ?>

    <div class="container pt-5 pb-5">
    	<div class="row justify-content-center">
    		<div class="col-12" style="padding-right:0px;padding-left:0px;">
    			<div class="col-md-10 col-xs-12">
                    <p>Something went wrong!</p>    			        
    			</div>
    		</div>
    	</div>
    </div>    	

<?php } ?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    document.addEventListener("keyup", function (e) {
        var keyCode = e.keyCode ? e.keyCode : e.which;
        if (keyCode == 44) {
            stopPrntScr();
        }
    });
    function stopPrntScr() {
        jQuery('#jdoc').hide();
    }
    function AccessClipboardData() {
        try {
            window.clipboardData.setData('text', "Access Restricted");
        } catch (err) {
        }
    }
    setInterval("AccessClipboardData()", 300);

    jQuery(document).ready(function($){
        $('#otp-error').hide();
        $('.memsub').hide(); 
        
        $('.sendOtp').click(function(){
            var phone = $('#mobile').val(); 
            // var data = "123456";
            // $("#resend").hide();

            // $("#otp_number").attr('data-otp',data)
            // $('.otpfield').show();
            // $('.sendOtp').attr('disabled', true);
            // sessionStorage.setItem("otpstore", data);
            if(phone.length==10){

                $.ajax({
                    url: "send_otp_nmber.php",
                    type: "POST",
                    data: {phone: phone},
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        $("#resend").hide();

                        $("#otp_number").attr('data-otp',data)
                        $('.otpfield').show();
                        $('.sendOtp').attr('disabled', true);
                        sessionStorage.setItem("otpstore", data);
                    },
                    error: function() {}
                });
            }else{
                alert('Please enter 10 Digit Number');
            }
        });

          // JavaScript code
$(document).ready(function() {
    $('#sendOtpBtn').on('click', function() { 
        var phone = $('.phone_number_otp').val();
        if(phone.length == 10) {
            $('#verify_otp').show();
            $("#otp").val('');
            $("#verifyBtn").show();
            $.ajax({
                url: "verify_otp.php",
                cache: false,
                type: "POST",
                data: {'phone': phone},
                success: function(result) {
                    $("#otp_number").attr('data-otp', result);
                    $("#phone").css('width', '100%');
                    $("#sendOtpBtn").hide();
                }
            });
        } else {
            $('#verify_otp').hide();
        } 
    });

    $('#verify_otp_button').on('click', function() {
        var enteredOTP = $('#otp_number').val();
        var expectedOTP = $('#otp_number').data('otp'); 
        if (enteredOTP!= ''){
            if (enteredOTP == expectedOTP) {
                $("#verify_otp_button").hide();
                $(".sendOtp").hide();
                $(".memsub").show();
                $("#resend").hide();
                $(".memsub").prop("disabled", false);
            } else {
                $("#verify_otp_button").show();
                $(".sendOtp").show();
                $(".memsub").hide();
                $("#resend").show();
                $("#resend-otp-sec").show();
                resendOtpTimer();
                alert("Invalid OTP! Please enter correct code or change your phone number.")
            }
        }else{
            alert('Please enter otp');
        }
    });
    // Declare counter outside the function to persist its value
    function resendOTP() {

        $('#otp-error').hide();
        $('.memsub').hide(); 
        
            var phone = $('#mobile').val(); 
            // $("#resend").hide();
            // $("#otp_number").attr('data-otp',data)
            // $('.otpfield').show();
            // $('.sendOtp').attr('disabled', true);
            // sessionStorage.setItem("otpstore", data);
            if(phone.length==10){

                $.ajax({
                    url: "send_otp_nmber.php",
                    type: "POST",
                    data: {phone: phone},
                    dataType: "json",
                    success: function(data) {
                        $("#resend").hide();
                        $("#otp_number").attr('data-otp',data)
                        $('.otpfield').show();
                        $('.sendOtp').attr('disabled', true);
                        sessionStorage.setItem("otpstore", data);
                    },
                    error: function() {}
                });
            }else{
                alert('Please enter 10 Digit Number');
            }
        $("#resend-otp-sec").hide();
    }
    function resendOtpTimer() {
        var seconds = 60;
        $("#resend").css("color", "#ADD8E6");
        $("#resend").off("click");
        $("#timer").show();
        function updateTimer() {
            seconds--;
            if (seconds >= 0) {
                var displaySeconds = seconds % 60;
                var displayMinutes = Math.floor(seconds / 60);
                
                $('#timer').text(
                    (displayMinutes < 10 ? "0" : "") + displayMinutes + ":" + 
                    (displaySeconds < 10 ? "0" : "") + displaySeconds
                );
            } else {
                $('#timer').hide(); // Hide the timer when it reaches 00:00
                clearInterval(timerInterval);
                $("#resend").css("color", "#007bff");
                $("#resend").on("click", function(event) {
                    console.log("it has been clicked!");
                    resendOTP();
                });
            }
        }
    
        var timerInterval = setInterval(updateTimer, 1000);
    }

    });

        if($("input:checkbox[name='termsclsname']:checked").length == 0){
        $('#temsandconderror').show();
    }
        $('#otp').on('keyup', function(){
            var otpstore = parseInt(sessionStorage.getItem("otpstore"));
            if(otpstore == $('#otp').val()){
                $('.sendOtp').hide();
                $('.memsub').show(); // Show the submit button when OTP matches
            } else {
                $('#otp-error').show();
                $('.sendOtp').show();
                $('.memsub').hide(); // Hide the submit button when OTP doesn't match
            }
        });
    });
</script>


<?php include "layouts/main-footer.php"; ?>
