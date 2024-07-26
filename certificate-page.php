<?php include "layouts/main-header.php"; ?>
<?php
if (isset($_POST["pay"])) {
    print_r($_POST);
}
?>

<div class="breadcumb-area ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>AFI Certificate </h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>AFI Certificate - Card </span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->

<div class="team-area clear-fix bg-light pt-5">
    <div class="container">
        <div class="col-12">
            <div class="hx-site-title-1 text-center">
                <span>Certificate</span>
                <h2>AFI Certificate Form </h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 pb-5">
                <div class="card">
                    <form id="pdfform" method="POST">
                        <div class="row" style="padding: 50px;" id="step1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile No:</label>
                                    <input type="tel" class="form-control" id="a11" name="mob" maxlength="10"
                                     required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email:</label>
                                    <input type="email" class="form-control" id="a22" 
                                        name="emaill" required="">
                                </div>
                                <div class="form-group required otp">
                                    <label class="control-label">Otp: </label>
                                   <div class="form-group">
                                        <input type="text" name="otp" id="otp" class="form-control" />
                                        <label class="error" style="display:none;" id="otp-error">OTP does not match.</label>
                                    </div>
                                </div>
                                <div>
                                    <label class="control-label">Type of Memebership </label><br>
                                    <input type="radio" id="Student" name="fav_language" value="1">
                                    <label for="Student"> Student</label><br>
                                    <input type="radio" id="Lifetime" name="fav_language" value="2">
                                    <label for="Lifetime">Lifetime</label><br>
                                    <!-- <input type="radio" id="Associate" name="fav_language" value="3">
                                    <label for="Associate">Associate</label><br>
                                    <input type="radio" id="Pharma" name="fav_language" value="4">
                                    <label for="Pharma">Pharma</label><br> -->
                                    <input type="radio" id="Patron" name="fav_language" value="5">
                                    <label for="Patron">Patron</label>
                                </div>
                           <div class="text-right">
                                <input type="submit" id="sendotp" name="next" class="sendotp action-button theme-btn"
                            value="Verify" />
                            </div>

                        <input style="float:right; display:none;" type="button" id="stepone" name="next"
                            class="next action-button theme-btn" value="Download certificate" />

                            </div>

                           
                          
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "layouts/main-footer.php"; ?>
<script >
  
$(document).ready(function() {
    $('#sendotp').on('click', function() {
        var mobilenum = $('#a11').val().trim();

        if (mobilenum === '') {
            alert("Mobile number cannot be empty.");
            return;
        }

        $.ajax({
            url: "sendotp.php",
            type: "POST",
            data: {
                mobile: mobilenum
            },
            success: function(data) {
                // console.log(data);
                sessionStorage.setItem("otpstore", data);
                $('.otp').show();
                $('#sendotp').hide();
                $('#stepone').show();
                $('#otp-error').hide();
            },
            error: function(xhr, status, error) {
                console.error("Error sending OTP:", error);
                alert("Error sending OTP. Please try again later.");
            }
        });
    });

    $('#stepone').on('click', function() {
        var mobile = $('#a11').val();
        var email = $('#a22').val();
        var encodedMobile = encodeURIComponent(mobile);
        var encodedEmail = encodeURIComponent(email);
        var membershipType = $("input[name='fav_language']:checked").val();
        var encodedMembershipType = encodeURIComponent(membershipType);
        console.log(membershipType);

        var redirectUrl = 'certificate-fnc.php?mob=' + encodedMobile + '&email=' + encodedEmail + '&membership=' + encodedMembershipType;

        window.location.href = redirectUrl;
    });

    $('#pdfform').on('submit', function(event) {
        event.preventDefault();
    });
});




</script>
