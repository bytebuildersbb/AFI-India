<?php include "layouts/main-header.php"; ?>
<style>
.success_section .heading_main{display: flex;align-items: center;justify-content: center;text-align: center;}
.success_section{margin-top: 10%;}
.success_section .jumbotron h1{font-weight: 800;color: #f98100;margin-bottom: 2%;}
.success_section .jumbotron p{font-weight: 500;}
.success_section .jumbotron .image_main{margin-bottom: 2%;}
.success_section .jumbotron .lead a.btn-primary{background-color: #ed5217;border: none;padding: 6px 18px;box-shadow: #ed5217 0px 3px 6px;font-weight: 500;}
.success_section .jumbotron p a.contactus{color: #f58925;}
.success_section .jumbotron .lead a.btn-primary:hover{background-color: #f58925;box-shadow: #f58925 0px 3px 6px;}
.success_section .heading_main{display: flex;align-items: center !important;justify-content: center !important;text-align: center !important;}
.success_section{margin-top: 4%;}
</style>

    <div class="success_section">
        <div class="container">
            <div class="rows">
                <div class="jumbotron text-center">
                    <h1 class="display-3">Thank You!</h1>
                    <div class="image_main">
                        <img src="../img/tickpng.png" width="12%" alt="thankyou"/>
                    </div>
                    <p class="lead">Payment Successfully Completed.</p>
                    <hr>
                    <p>
                      Having trouble? <a href="/" class="contactus">Contact us</a>
                    </p>
                    <p class="lead">
                      <a class="btn btn-primary btn-sm" href="/" role="button">Continue to homepage</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
	
<?php include "layouts/main-footer.php"; ?>