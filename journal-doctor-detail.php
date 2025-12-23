<?php
session_start();
include "layouts/main-header.php";

$pubcationid = base64_decode($_GET['pid']);

$getMetas   =  "SELECT * FROM tbl_publication where pub_id='$pubcationid'";
$runQuery   =  $connect->query($getMetas);
$result        = $runQuery->fetch_object();

if(isset($_POST['submit'])){
    
    $membershipidno = $_POST['membershipidno'];
    $_SESSION['verifiedUser'] = $pubcationid;
    
    $inst = "Insert into `tbl_publication_logs`(`publication_id`, `member_id`, `who_watched`)values('$pubcationid', '$membershipidno', '0')";
    $rst   =  $connect->query($inst);
    
}
//session_destroy();
?>
<style>
html {user-select: none;}
.jdoct{display:none;}
a[disabled="disabled"] {pointer-events: none;}
</style>

<?php if(isset($_GET['pid'])){ ?>

<?php if(isset($_SESSION['verifiedUser']) && $_SESSION['verifiedUser'] == $pubcationid){?>
    
    <div class="container" id="jdoc" oncontextmenu="return false;" onstrcmp="return false" onDrag="return false" onDrop="return false" onPaste="return false">
        <div class="row">
            <p><?php echo $result->pub_title; ?></p>
            <p><?php echo base64_decode($result->pub_desc); ?></p>
            <p><?php echo "admin/uploads/publications/".$result->pub_thumbnail; ?></p>
        </div>
    </div>
    
<?php }else{ ?>


    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-12" style="padding-right:0px;padding-left:0px;">
    			<div class="col-md-10 col-xs-12">
    			    
                    <form id="journaldoc" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Membership ID Number</label>
                            <input type="text" class="form-control" id="membershipidno" name="membershipidno" placeholder="Membership ID Number">
                            <span id="memiderror"></span>
                        </div> 
                        
                        <div class="form-group otpfield" style="display:none;">
                            <label for="exampleInputPassword1">OTP</label>
                            <input type="text" class="form-control" id="otp" placeholder="OTP">
                            <input type="hidden" id="publicationid" value="<?php echo $pubcationid; ?>" />
                            <span id="otp-error">Otp does not match.</span>
                        </div>
                        
                        <a href="javascript:void(0)" class="btn btn-primary sendOtp">Send Otp</a>
                        
                        <button type="submit" name="submit" class="btn btn-primary memsub" style="display:none;">Submit</button>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    

<?php } ?>



<?php }else{ ?>

    <div class="container">
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
            window.clipboardData.setData('text', "Access   Restricted");
        } catch (err) {
        }
    }
    setInterval("AccessClipboardData()", 300);
    
    jQuery(document).ready(function($){
        $('#otp-error').hide();
        
        $('.sendOtp').click(function(){
            
            var membershipidno = $('#membershipidno').val();
            var publicationid = $('#publicationid').val();
            
            if(membershipidno == ''){
                $('#memiderror').html('Please Enter Membership Id Number');
            }else{
            
                $.ajax({
                    url: "sendotpjournal.php",
                    type: "POST",
                    data: {membershipidno : membershipidno, publicationid: publicationid, type: 'doctor'},
                    dataType: "json",
                    success: function(data)
                    {
                        console.log(data);
                        $('.otpfield').show();
                        $('.sendOtp').attr('disabled', true);
                        sessionStorage.setItem("otpstore", data);
                            
                    },
                    error: function(){}
                    
                });
                
            }
        });
        
        $('#otp').on('keyup', function(){
            var otpstore = parseInt(sessionStorage.getItem("otpstore"));
            if(otpstore == $('#otp').val()){
                $('.sendOtp').hide();
            	$('.memsub').show();
            }else{
                $('#otp-error').show();
                $('.sendOtp').show();
                $('.memsub').hide();
            }
        });
        
        
    });
</script>

<?php include "layouts/main-footer.php"; ?>
