<?php include "layouts/main-header.php"; ?>
<?php
   if(isset($_POST["pay"])){
      print_r($_POST);
   }
?>

<div class="breadcumb-area ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>AFI Member ID - Card </h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>AFI Member ID - Card </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->

   <div class="team-area clear-fix  bg-light pt-5   ">
        <div class="container">
             <div class="col-12">
                <div class="hx-site-title-1 text-center">
                    <span>Membership Form</span>
                    <h2>AFI Member ID - Card </h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                      <form action="HDFC_NEW/payrouter.php" method="POST">
                        <div class="row" style="padding: 50px;">
                           <div class="col-md-4 imgUp">
                                    <div class="imagePreview"></div>
                                        <label class="btn btn-primary">
                                             <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload Picture <input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>

                                  </div><!-- col-2 -->
                         <div class="col-md-8">
                            <div class="form-group">
                               <label for="exampleInputEmail1">Name:</label>
                               <input type="text" class="form-control" id="exampleInputEmail1" name="name" required="">
                            </div>
                            <div class="form-group">
                               <label for="exampleInputEmail1">Father Name:</label>
                               <input type="text" class="form-control" id="exampleInputEmail1" name="fName" required="">
                            </div>
                              <div class="form-group">
                               <label for="exampleInputEmail1">Mobile No:</label>
                               <input type="text" class="form-control" id="a11" name="mob" onchange="bbb(this.value)" required="">
                            </div>
                              <div class="form-group">
                               <label for="exampleInputEmail1">Email:</label>
                               <input type="email" class="form-control" id="a22" onchange="aaa(this.value)" name="emaill" required="">
                            </div>
                            <div class="form-group">
                               <label for="exampleInputEmail1">Designation (if Any):</label>
                               <input type="text" class="form-control" id="exampleInputEmail1" name="designation" required="">
                            </div>
                            <div class="form-group">
                               <label for="exampleInputEmail1">Blood Group:</label>
                               <input type="text" class="form-control" id="exampleInputEmail1" name="bGroup" required="">
                            </div>
                            <div class="form-group">
                               <label for="exampleInputEmail1">Address:</label>
                               <input type="text" class="form-control" id="exampleInputEmail1" name="address" required="">
                            </div>
                            <div class="form-group pt-3">
                              <input type="submit" name="pay" value="Pay 250" class="theme-btn">
                            </div>

                         </div>
                         
                         <!-- Payment Gateway Felids -->
                         <div style="display: block;">
                         <input class="textbox" type="hidden" name="merchantId" id="merchantId" value="M00081"> 
                         <input class="textbox" type="hidden" name="apiKey" id="apiKey" value="Gu5Tk4rw7NY5hU6Fr9an6tq1yD9WI3fY"> 
                         <input class="textbox" type="hidden" name="txnId" id="txnId" value="KRDOPF417">
                         <input class="textbox" type="hidden" name="amount" id="amount" value="250.00"> 
                         <input class="textbox" type="hidden" name="dateTime" id="dateTime" value="2023-11-25 06:24:16">
                         <input class="textbox" type="hidden" name="custMail" id="custMail" value=""> 
                         <input class="textbox" type="hidden" name="custMobile" id="custMobile" value=""> 
                         <input class="textbox" type="hidden" name="udf1" id="udf1" value="NA">
                         <input class="textbox" type="hidden" name="udf2" id="udf2" value="NA">
                         <input class="textbox1" type="hidden" name="returnURL" id="returnURL" value="https://afi-india.in/response.php">
                         <input class="textbox" type="hidden" name="productId" id="productId" value="DEFAULT">
                         <input class="textbox" type="hidden" name="channelId" id="channelId" value="0"> 
                         <input class="textbox" type="hidden" name="isMultiSettlement" id="isMultiSettlement" value="0">
                         <input class="textbox" type="hidden" name="txnType" id="txnType" value="DIRECT">
                         <input class="textbox" type="hidden" name="instrumentId" id="instrumentId" value="NA">
                         <input class="textbox" type="hidden" name="udf3" id="udf3" value="IDCARD">
                         <input class="textbox" type="hidden" name="udf4" id="udf4" value="NA">
                         <input class="textbox" type="hidden" name="udf5" id="udf5" value="NA">
                         <input class="textbox" type="hidden" name="cardDetails" id="cardDetails" value="NA">
                         <input class="textbox" type="hidden" name="cardType" id="cardDetails" value="NA">
                         </div>
                        </div>
                      </form>
                    </div>
                </div>
        </div>
    </div>
</div>

<?php include "layouts/main-footer.php"; ?>
<script type="text/javascript">

     imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
     blah.src = URL.createObjectURL(file)
     $("#blah").css("display","block");
     main1.src = URL.createObjectURL(file)
     $("#main1").css("display","block");
     $("#imgInp").css("margin-top","120px");
     $("#imgInp").css("position","relative");
  }
}
</script>
<script>
    aaa=(aa)=>{
          document.getElementById("custMail").value=aa; 
}
bbb=(bb)=>{
      document.getElementById("custMobile").value=bb;
}
</script>