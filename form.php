<?php include "layouts/main-header.php"; 

$url =  base64_decode(urldecode($_GET['f']));

$query      = "SELECT * FROM tbl_membership_details";
$runQuery   =  $connect->query($query);
$dataObject = $runQuery->fetch_object();

$lifetime   = $dataObject->lifeMCost;
$patron     = $dataObject->spacialPCost;
$associate  = $dataObject->associateCost;
$pharma     = $dataObject->overseasCost;
$student    = $dataObject->studentCost;

if($url=='student'){$customAmount =  rtrim($student); $type="MEMBERSHIP";}
else if($url=='patron'){$customAmount =  rtrim($patron); $type="PATRON MEMBERSHIP";}
else if($url=='associate'){$customAmount =  rtrim($associate); $type="ASSOCIATE MEMBERSHIP";}
else if($url=='pharma'){$customAmount = rtrim($pharma); $type="PHARMA MEMBERSHIP";}
else if($url=='lifetime'){$customAmount = rtrim($lifetime); $type="LIFE MEMBERSHIP";}

?> 

<style>
/* Form styles */
.error {
    color: #ff0000;
}
.form-group label span {
    color: #ff0000;
}
#msform {
	width: 100%;
	margin: 50px auto;
	
	position: relative;
}
#msform fieldset {
	background: #fff;
	border: 0 none;
	border-radius: 5px;
	box-sizing: border-box;
	width: 100%;
	margin: 0 0% 20px;
	
	/*stacking fieldsets above each other*/
	position: relative;
}
 
/* Hide all except first fieldset */
#msform fieldset:not(:first-of-type) {
	display: none;
}
img.logo {
	max-width: 155px;
	margin-top: 5px;
}
#msform p {
	color: #8b9ab0;
	font-size: 12px;
}
 
#msform label {
	padding-right:0px 15px;
	font-size: 16px;
	text-align: left;
	
/*
	font-weight:600px !important;
*/
}
 
 
/* Inputs */
#msform input, #msform textarea {
	padding: 5px 15px;
	border: 1px solid transparent;
	border-radius: 3px;
	margin-bottom: 10px;
	margin-top: 5px;
	background-color: #eef5ff;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #333;
	font-size: 14px;
	font-family: inherit;
}
#msform input:focus, #msform textarea:focus {
	outline: none;
	border-color: #7bbdf3;
}
 
/* Buttons */
 
#msform .submitbutton {
	width: 30%;
	text-transform: uppercase;
	background: #d91b5b;
	font-weight: bold;
	color: white;
	border: 1px solid transparent;
	border-radius: 3px;
	cursor: pointer;
	padding: 12px 5px;
	margin: 10px 0;
	font-size: 16px;
	display: inline-block;
	-webkit-transition: all 0.2s;
	-moz-transition: all 0.2s;
	transition: all 0.2s;
}
 
#msform .action-button {
	width: 30%;
	text-transform: uppercase;
	background: #d91b5b;
	font-weight: bold;
	color: white;
	border: 1px solid transparent;
	border-radius: 3px;
	cursor: pointer;
	padding: 12px 5px;
	margin: 10px 0;
	font-size: 16px;
	display: inline-block;
	-webkit-transition: all 0.2s;
	-moz-transition: all 0.2s;
	transition: all 0.2s;
}
#msform .previous.action-button {
	background: #fff;
	border: 1px solid #7bbdf3;
	color: #7bbdf3;
}
 
#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 10px 30px 1px rgba(0, 0, 0, 0.2);
}
 
/* Headings */
.fs-title {
	font-size: 20px;
	font-weight: 400;
	color: #a94442;
	margin-bottom: 20px;
	background-color: #9999CC;
	margin-top: 20px;
	padding:5px;
	color:#fff;
}
.fs-subtitle {
	font-weight: 400;
	font-size: 19px;
	color: #434a54;
	margin-bottom: 20px;
}
 
/* Progressbar */
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}
#progressbar li {
	list-style-type: none;
	color: #8b9ab0;
	text-transform: uppercase;
	font-size: 9px;
	width: 25%;
	float: left;
	position: relative;
	text-align: center;
}
#progressbar li.active {
	color: #d91b5b;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3em;
	margin: 0 auto 5px auto;
	text-align: center;
}
 
/* Progressbar connectors */
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1;
}
#progressbar li:first-child:after {
	/* connector not needed before the first step */
	content: none; 
}
 
/* Marking active/completed steps green */
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #d91b5b;
	color: white;
}
 
/* css for checkbox */
 
/* The container */
#msform .checkstyle {
  display: inline-flex;
  position: relative;
  width: auto;
  padding-left: 35px;
  padding-right: 25px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 16px;
  
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
 
/* Hide the browser's default checkbox */
#msform .checkstyle input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}
 
/* Create a custom checkbox */
#msform .checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}
 
/* On mouse-over, add a grey background color */
#msform .checkstyle:hover input ~ .checkmark {
  background-color: #ccc;
}
 
/* When the checkbox is checked, add a blue background */
#msform .checkstyle input:checked ~ .checkmark {
  background-color: #2196F3;
}
 
/* Create the checkmark/indicator (hidden when not checked) */
#msform .checkmark:after {
  content: "";
  position: absolute;
  display: none;
}
 
/* Show the checkmark when checked */
#msform .checkstyle input:checked ~ .checkmark:after {
  display: block;
}
 
/* Style the checkmark/indicator */
#msform .checkstyle .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
 
.terms_text a:hover {
    text-decoration:none !important;
}
 
.listordercls {
	line-height: 25px !important;
	font-size:13px !important;
	list-style: none !important;
	padding-left:0px !important;
}
.otp{display:none;}
</style>

	<div class="breadcumb-area">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="breadcumb-wrap text-center">
                     <h2>AFI Membership Form</h2>
                     <ul>
                        <li><a href="<?php echo BASEPATH;?>index.php">Home</a></li>
                        <li><span>AFI Membership Form</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- .breadcumb-area end -->
      
      <div class="hx-registration-area ptb-100-70">
         <div class="container">
            <div class="col-l2">
               <div class="hx-site-title-1 text-center">
                  <span>Registration</span>
                  <h2>AFI Membership Form</h2>
               </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-xs-12">
		
				<!-- multistep form -->
				<form class="form-horizontal form" id="msform" method="POST" enctype="multipart/form-data">
					<!-- progressbar -->
					<ul id="progressbar">
						<li class="active">Account Information</li>
						<li>Personal Information</li>
						<li>Preview</li>
						<li>Finish</li>
					</ul>
					
					<div id="sucessmsg" style="display:none;"><h2 class="fs-subtitle" style="color: #dc3c52; font-size:22px; text-align:center;">Form Submitted Successfully</h2></div>
					<div id="errormsg" style="display:none;"><h2 class="fs-subtitle" style="color: #dc3c52; font-size:22px; text-align:center;">Oops.. Something wrong.</h2></div>
					
					<!-- fieldsets -->
					<fieldset id="step1">					
						
						<div align="center">
							<h3 class="fs-subtitle">AFI Membership Form</h3>
							<p>Fill all form field to go to next step</p>
						</div>				   
						<h2 class="fs-title">Account Information</h2>
					
						<div class="form-group required">
							<label class="control-label col-12">Name <sup style="color: red;">*</sup>: </label>
							<div class="col-sm-10">
								<input type="text" name="name" id="name" required>
							</div>
						</div>
					
						<div class="form-group required">
							<label class="control-label col-12">Mobile Number<span>*</span>: </label>
							<div class="col-sm-10">
								<input type="text" name="mobilenumber" id="mobile" maxlength="10" required>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Email<span>*</span>: </label>
							<div class="col-sm-10">
								<input type="text" name="email" id="email" required>
							</div>
						</div>
						
						<div class="form-group required otp">
							<label class="control-label col-12">Otp: </label>
							<div class="col-sm-10">
								<input type="text" name="otp" id="otp"/>
								<label class="error" style="display:none;" id="otp-error">OTP does not match.</label>
							</div>
						</div>
						
						<input style="float:right;" type="button" id="sendotp" name="next" class="sendotp action-button" value="Next" />
						<input style="float:right; display:none;" type="button" id="stepone" name="next" class="next action-button" value="Next" />
					</fieldset>
				
					<fieldset id="step2">						
						<h2 class="fs-title">Personal Information</h2>						
					
						<div class="form-group required">
							<label class="control-label col-12">Father Name<span>*</span>: </label>
							<div class="col-sm-10">
								<input type="text" name="father_name" id="father_name"/>
							</div>
						</div>
						
						<div class="form-group required">  
							<label class="control-label col-12">Sex (लिंग<span>*</span>):</label>
							<div class="col-sm-10">
								<label class="checkstyle">Male
									<input type="radio" name="gender" value="Male" class="gender">
									<span class="checkmark"></span>
								</label>
							
								<label class="checkstyle">Female
									<input type="radio" name="gender" value="Female" class="gender">
									<span class="checkmark"></span>
								</label>
								
								<label for="gender" id="gender" class="error" generated="true"></label>
							</div>						
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Communication Address<span>*</span>: </label>
							<div class="col-sm-10">
								<input type="text" name="communication_address" id="communication_address"/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Permanent Address<span>*</span>: </label>
							<div class="col-sm-10">
								<input type="text" name="permanent_address" id="permanent_address"/>
							</div>
						</div>
						
						<div class="form-group required">
                            <label class="control-label col-12">Date Of Birth<span>*</span>: </label>
                            <div class="col-sm-10">
                                    <input type="text" name="dob" id="dob" placeholder="DD-MM-YYYY" />
                            </div>
                        </div>
						
						<?php
                                // Define an array of states
                                $states = [
                                    "ANDAMAN & NICOBAR",
                                    "ANDHRA PRADESH",
                                    "ARUNACHAL PRADESH",
                                    "ASSAM",
                                    "BIHAR",
                                    "CHANDIGARH",
                                    "CHATTISGARH",
                                    "DADRA & NAGAR",
                                    "DAMAN & DIU",
                                    "DELHI",
                                    "GOA",
                                    "GUJRAT",
                                    "HARYANA",
                                    "HIMACHAL PRADESH",
                                    "JAMMU & KASHMIR",
                                    "JHARKHAND",
                                    "KARNATAKA",
                                    "KERALA",
                                    "LAKSHDWEEP",
                                    "MADHYA PRADESH",
                                    "MAHARASHTRA",
                                    "MANIPUR",
                                    "MEGHALAYA",
                                    "MIZORAM",
                                    "NAGALAND",
                                    "NEW DELHI",
                                    "ORISSA",
                                    "PONDICHERY",
                                    "PUNJAB",
                                    "RAJASTHAN",
                                    "SIKKIM",
                                    "TAMIL NADU",
                                    "TRIPURA",
                                    "UTTAR PRADESH",
                                    "UTTARANCHAL",
                                    "WEST BENGAL"
                                ];

                                // Sort the array alphabetically
                                sort($states);
                                ?>

                        <div class="form-group required">
                            <label class="control-label col-12">State<span>*</span>: </label>
                            <div class="col-sm-10">
                                <select class="list-dt" id="state" name="state">
                                    <option value="">--Please Select State--</option>
                                    <?php
                                        // Iterate through the sorted array and create options for each state
                                        foreach ($states as $state) {
                                            echo '<option value="' . $state . '">' . $state . '</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group required">
							<label class="control-label col-12">Pin Code<span>*</span>: </label>
							<div class="col-sm-10">
								<input type="text" name="postalcode" id="postalcode"/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Nationality<span>*</span>: </label>
							<div class="col-sm-10">
								<select class="list-dt" id="nationality" name="nationality">
                                    <option value="">--Select--</option>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                    <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
							</div>
						</div>
				
				<?php if(isset($url) && $url =='student'){?>		
				<!-- Student Fields -->
						<div class="form-group required">
							<label class="control-label col-12">College Name in which you are studying : कॉलेज का नाम जिसमें आप पढ़ रहे हैं (कृपया तभी भरें जब आप आयुर्वेद के छात्रहों<span>*</span>): </label>
							<div class="col-sm-10">
								<input type="text" name="collageName" id="collageName"/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Enrollment No<span>*</span>:</label>
							<div class="col-sm-10">
								<input type="text" name="enrollmentNo" id="enrollmentNo"/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Upload your degree Certificate or College Identity Card : अपना कॉलेज पहचान पत्र अपलोड करें <span>*</span>:</label>
							<div class="col-sm-10">
								<input type="file" name="studentIdCard" id="studentIdCard">
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Through whom did you come to know about Ayurveda Federation? आयुर्वेद फेडरेशन ऑफ़ इंडिया के बारे में आपको किसके माध्यम से पता चला?<span>*</span></label>
							<div class="col-sm-10">
								<input type="text" name="nameNew7" id="nameNew7"/>
							</div>
						</div>
						
				<!-- Student Fields -->		
				
				<?php } ?>
				
				<?php if(isset($url) && $url  == 'lifetime'){?>
				<!-- Life Time  Fields -->
						<div class="form-group required">
							<label class="control-label col-12">Clinic Address<span>*</span> :</label>
							<div class="col-sm-10">
								<input type="text" name="clinicAddress" id="clinicAddress"/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">State (in which you are working/practicing) : राज्य (जिसमें आप काम कर रहे हैं/अभ्यास कर रहे हैं)<span>*</span>	</label>
							<div class="col-sm-10">
								<input type="text" name="stateBoard" id="stateBoard"/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Board Registration Number (Kindly fill only if you are a doctor) - बोर्ड पंजीकरण संख्या <span>*</span></label>
							<div class="col-sm-10">
								<input type="text" name="registerdDate" id="registerdDate"/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Through whom did you come to know about Ayurveda Federation? आयुर्वेद फेडरेशन ऑफ़ इंडिया के बारे में आपको किसके माध्यम से पता चला?<span>*</span></label>
							<div class="col-sm-10">
								<input type="text" name="nameNew7" id="nameNew7"/>
							</div>
						</div>
						
				<!-- Life Time Fields -->
				
				<?php } ?>
				
				<?php if(isset($url) && $url =='pharma' || isset($url) && $url =='associate'  || isset($url) && $url =='patron'){?>
				
				<!-- Pharma  Fields -->
						<div class="form-group required">
							<label class="control-label col-12">Qualification - (योग्यता)<span>*</span></label>
							<div class="col-sm-10">
								<input type="text" name="nameNew1055" id="nameNew1055"/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Profession - (आपका व्यवसाय)<span>*</span></label>
							<div class="col-sm-10">
								<input type="text" name="nameNew1155" id="nameNew1155"/>
							</div>
						</div>
						
						
				<!-- Pharma Fields -->
				<?php } ?>
				
				
						<div class="form-group required">  
							<label class="control-label col-12">Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?  (क्या आप आयुर्वेद से जुड़ी विभिन्न समस्याओं के लिए कार्य कर रहे "आयुर्वेद फेडरेशन ऑफ़ इंडिया" में अपना कुछ समय दे सकते हैं? )<span>*</span></label>
							<div class="col-sm-10">
								<label class="checkstyle">Yes
									<input type="radio" name="nameNew8" value="yes">
									<span class="checkmark"></span>
								</label>
							
								<label class="checkstyle">No
									<input type="radio" name="nameNew8" value="no">
									<span class="checkmark"></span>
								</label>
								
								<label for="gender" class="error" id="nameNew8" generated="true"></label>
							</div>						
						</div>
						
						<div class="form-group required">  
							<label class="control-label col-12">If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time? - यदि आप अपना समय "आयुर्वेद फेडरेशन ऑफ़ इंडिया" के आयुर्वेद के उत्थान से संबंधित मुद्दों पर लगा सकते हैं, तो आप अपना समय किस रूप में देना चाहेंगे?<span>*</span></label>
							<div class="col-sm-10">
								<label class="checkstyle">As a member of the District or State or Central executive
									<input type="radio" name="nameNew9" value="As a member of the District or State or Central executive" data-id="dsc">
									<span class="checkmark"></span>
								</label>
							
								<label class="checkstyle">As a volunteer
									<input type="radio" name="nameNew9" value="As a volunteer" data-id="volunteer">
									<span class="checkmark"></span>
								</label>
								
								<label class="checkstyle">As a Normal member Only
									<input type="radio" name="nameNew9" value="As a Normal member Only" data-id="normalMember">
									<span class="checkmark"></span>
								</label>
								
								<label for="gender" class="error" id="nameNew9" generated="true"></label>
							</div>						
						</div>
						
						<div class="form-group">
							<label class="control-label col-12">(Upload your recent Photograph)<span>*</span>: </label>
							<div class="col-sm-5">
								<input type="file" name="profilePic" id="profilePic">
							</div>
						</div>
					
						<input type="button" name="previous" id="previous1" class="previous action-button" value="Previous" />
						<input style="float:right;" type="button" id="steptwo" name="next" class="next action-button" value="Next" />
					</fieldset>				
				
					<fieldset id="step3">
					
						<h2 class="fs-title">Other Information</h2>
						
						<div class="form-group required">
							<label class="control-label col-12">Name: </label>
							<div class="col-sm-10">
								<input type="text" name="name" id="name2" disabled/>
							</div>
						</div>
					
						<div class="form-group required">
							<label class="control-label col-12">Mobile Number: </label>
							<div class="col-sm-10">
								<input type="text" name="mobilenumber" id="mobile2" maxlength="10" disabled/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Email: </label>
							<div class="col-sm-10">
								<input type="text" name="email" id="email2" disabled/>
							</div>
						</div>
				  
						<div class="form-group required">
							<label class="control-label col-12">Father Name: </label>
							<div class="col-sm-10">
								<input type="text" name="father_name" id="father_name2" disabled/>
							</div>
						</div>
						
						<div class="form-group required">  
							<label class="control-label col-12">Sex (लिंग):</label>
							<div class="col-sm-10">
								<label class="checkstyle">Male
									<input type="radio" name="gender1" value="Male" class="Male" disabled>
									<span class="checkmark"></span>
								</label>
							
								<label class="checkstyle">Female
									<input type="radio" name="gender1" value="Female" class="Female" disabled>
									<span class="checkmark"></span>
								</label>
								
								<label for="gender" id="gender2" class="error" generated="true"></label> 
							</div>						
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Communication Address: </label>
							<div class="col-sm-10">
								<input type="text" name="communication_address" id="communication_address2" disabled/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Permanent Address: </label>
							<div class="col-sm-10">
								<input type="text" name="permanent_address" id="permanent_address2" disabled/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Date Of Birth: </label>
							<div class="col-sm-10">
								<input type="date" name="dob" id="dob2" disabled/>
							</div>
						</div>
						
						<?php
                                // Define an array of states
                                $states = [
                                    "ANDAMAN & NICOBAR",
                                    "ANDHRA PRADESH",
                                    "ARUNACHAL PRADESH",
                                    "ASSAM",
                                    "BIHAR",
                                    "CHANDIGARH",
                                    "CHATTISGARH",
                                    "DADRA & NAGAR",
                                    "DAMAN & DIU",
                                    "DELHI",
                                    "GOA",
                                    "GUJRAT",
                                    "HARYANA",
                                    "HIMACHAL PRADESH",
                                    "JAMMU & KASHMIR",
                                    "JHARKHAND",
                                    "KARNATAKA",
                                    "KERALA",
                                    "LAKSHDWEEP",
                                    "MADHYA PRADESH",
                                    "MAHARASHTRA",
                                    "MANIPUR",
                                    "MEGHALAYA",
                                    "MIZORAM",
                                    "NAGALAND",
                                    "NEW DELHI",
                                    "ORISSA",
                                    "PONDICHERY",
                                    "PUNJAB",
                                    "RAJASTHAN",
                                    "SIKKIM",
                                    "TAMIL NADU",
                                    "TRIPURA",
                                    "UTTAR PRADESH",
                                    "UTTARANCHAL",
                                    "WEST BENGAL"
                                ];

                                // Sort the array alphabetically
                                sort($states);
                                ?>

                        <div class="form-group required">
                            <label class="control-label col-12">State<span>*</span>: </label>
                            <div class="col-sm-10">
                                <select class="list-dt" id="state" name="state">
                                    <option value="">--Please Select State--</option>
                                    <?php
                                        // Iterate through the sorted array and create options for each state
                                        foreach ($states as $state) {
                                            echo '<option value="' . $state . '">' . $state . '</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group required">
							<label class="control-label col-12">Pin Code: </label>
							<div class="col-sm-10">
								<input type="text" name="postalcode" id="postalcode2" disabled/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Nationality: </label>
							<div class="col-sm-10">
								<select class="list-dt" id="nationality" name="nationality2" disabled>
                                    <option value="">--Select--</option>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                    <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
							</div>
						</div>
				
				<?php if(isset($url) && $url=='student'){?>		
				<!-- Student Fields -->
						<div class="form-group required">
							<label class="control-label col-12">College Name in which you are studying : कॉलेज का नाम जिसमें आप पढ़ रहे हैं (कृपया तभी भरें जब आप आयुर्वेद के छात्रहों): </label>
							<div class="col-sm-10">
								<input type="text" name="collageName" id="collageName2" disabled/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Enrollment No:</label>
							<div class="col-sm-10">
								<input type="text" name="enrollmentNo" id="enrollmentNo2" disabled/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Upload your degree Certificate or College Identity Card : अपना कॉलेज पहचान पत्र अपलोड करें :</label>
							<div class="col-sm-10">
								<input type="file" name="studentIdCard" id="studentIdCard2" disabled>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Through whom did you come to know about Ayurveda Federation? आयुर्वेद फेडरेशन ऑफ़ इंडिया के बारे में आपको किसके माध्यम से पता चला?</label>
							<div class="col-sm-10">
								<input type="text" name="nameNew7" id="nameNew72" disabled/>
							</div>
						</div>
						
				<!-- Student Fields -->		
				
				<?php } ?>
				
				<?php if(isset($url) && $url=='lifetime'){?>
				<!-- Life Time  Fields -->
						<div class="form-group required">
							<label class="control-label col-12">Clinic Address :</label>
							<div class="col-sm-10">
								<input type="text" name="clinicAddress" id="clinicAddress2" disabled/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">State (in which you are working/practicing) : राज्य (जिसमें आप काम कर रहे हैं/अभ्यास कर रहे हैं)	</label>
							<div class="col-sm-10">
								<input type="text" name="stateBoard" id="stateBoard2" disabled/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Board Registration Number (Kindly fill only if you are a doctor) - बोर्ड पंजीकरण संख्या </label>
							<div class="col-sm-10">
								<input type="text" name="registerdDate" id="registerdDate2" disabled/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Through whom did you come to know about Ayurveda Federation? आयुर्वेद फेडरेशन ऑफ़ इंडिया के बारे में आपको किसके माध्यम से पता चला?</label>
							<div class="col-sm-10">
								<input type="text" name="nameNew7" id="nameNew72" disabled/>
							</div>
						</div>
						
				<!-- Life Time Fields -->
				
				<?php } ?>
				
				<?php if(isset($url) && $url =='pharma' || isset($url) && $url =='associate'  || isset($url) && $url =='patron'){?>
				
				<!-- Pharma  Fields -->
						<div class="form-group required">
							<label class="control-label col-12">Qualification - (योग्यता)</label>
							<div class="col-sm-10">
								<input type="text" name="nameNew1055" id="nameNew10552" disabled/>
							</div>
						</div>
						
						<div class="form-group required">
							<label class="control-label col-12">Profession - (आपका व्यवसाय)</label>
							<div class="col-sm-10">
								<input type="text" name="nameNew1155" id="nameNew11552" disabled/>
							</div>
						</div>
						
						
				<!-- Pharma Fields -->
				<?php } ?>
				
				
						<div class="form-group required">  
							<label class="control-label col-12">Can you devote your time to the "Ayurveda Federation of India" working on various problems related to Ayurveda?  (क्या आप आयुर्वेद से जुड़ी विभिन्न समस्याओं के लिए कार्य कर रहे "आयुर्वेद फेडरेशन ऑफ़ इंडिया" में अपना कुछ समय दे सकते हैं? )</label>
							<div class="col-sm-10">
								<label class="checkstyle">Yes
									<input type="radio" name="nameNew82" value="yes" class="yes" disabled>
									<span class="checkmark"></span>
								</label>
							
								<label class="checkstyle">No
									<input type="radio" name="nameNew82" value="no" class="no" disabled>
									<span class="checkmark"></span>
								</label>
								
								<label for="gender" class="error" id="nameNew82" generated="true" ></label>
							</div>						
						</div>
						
						<div class="form-group required">  
							<label class="control-label col-12">If you can devote your time to the issues related to the upliftment of Ayurveda of the "Ayurveda Federation of India", then in what form would you like to give your time? - यदि आप अपना समय "आयुर्वेद फेडरेशन ऑफ़ इंडिया" के आयुर्वेद के उत्थान से संबंधित मुद्दों पर लगा सकते हैं, तो आप अपना समय किस रूप में देना चाहेंगे?</label>
							<div class="col-sm-10">
								<label class="checkstyle">As a member of the District or State or Central executive
									<input type="radio" name="nameNew92" value="As a member of the District or State or Central executive" class="dsc" disabled>
									<span class="checkmark"></span>
								</label>
							
								<label class="checkstyle">As a volunteer
									<input type="radio" name="nameNew92" value="As a volunteer" class="volunteer" disabled>
									<span class="checkmark"></span>
								</label>
								
								<label class="checkstyle">As a Normal member Only
									<input type="radio" name="nameNew92" value="As a Normal member Only" class="normalMember" disabled>
									<span class="checkmark"></span>
								</label>
								
								<label for="gender" class="error" id="nameNew921" generated="true"></label>
							</div>						
						</div>
						
						
						<input type="button" name="previous"  id="previous2" class="previous action-button" value="Previous" />
						<input style="float:right;" type="button" id="stepthree" name="next" class="next action-button" value="Next" />
					</fieldset>
				
					<fieldset id="step4">
						
						<h2 class="fs-title">Finish</h2>
					
						<div class="form-group">
							<div class="col-sm-10">
								<a href = "#" style="text-decoration: none;" class="terms_text">
									<label style="padding-left: 30px;" class="checkstyle">I agree and accept the terms and conditions
										<input type="checkbox" id="termscls" name="termsclsname" value="on">
										<span class="checkmark"></span>
								    </label>
								</a>
								<label id="temsandconderror" style="color:red;display:none;">Please Accept Terms & Conditions</label>
								
								<input type="hidden" name="memberType" value="<?php echo $url;?>" />
								<input type="hidden" name="type" value="<?php echo $type;?>" />
								<input type="hidden" name="customAmount" value="<?php echo $customAmount; ?>">
							</div>
						</div>
						
						<div class="loader" style="display:none;"> 		
							<div style="display: flex;position: relative;align-items: center;justify-content: center;">
								<div style="display: flex;align-items: center;justify-content: center; position: absolute;z-index: 9999;">
									<img src="<?php echo BASEPATH;?>assets/images/loader.gif" style="width:40%;">
								</div>
							</div>
						</div>
					
						<input type="button" name="previous" id="previous3" class="previous action-button" value="Previous" />				  
						<input style="float:right;" type="submit" id="stepfour" name="submit" class="submitbutton" value="Submit" />
						
					</fieldset>
			   
				</form>
	 
				</div>
			</div>
		</div>      
	</div>
	
	<div class="container">
           <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-xs-12">
                  <h3>Refund Policies</h3>
                      <p>1.	We reserve the right to accept or refuse membership at our discretion.</p>
                      <p>2.	The money paid to the Ayurveda Federation of India( A constitutional body of Ayurveda Vigyan Forum) will be refunded into the bank account of the user within 7-15 working days.</p>
                    
                     <p>3. Users can cancel the Membership within Two Days after the completion of payment. </p>
                     
                      <p>4.	If any document is found wrong, your membership will be cancelled and your fees will be refunded as per Federation Policy.</p>
                      
                       <p>5. Membership can be terminated only from the office of the organization.</p>
              </div>
          </div>
       </div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="https://codefixup.com/demo/multi-step-form/js/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
 
   

document.addEventListener("DOMContentLoaded", function() {
  flatpickr("#dob", {
    dateFormat: "d-m-Y", // Set the date format
    maxDate: "today",
    yearDropdown: true,  
  });
});


</script>

<script>
$(window).on('load', function () 
{
    $("input", "#step2").addClass("ignore");
    $("input", "#step3").addClass("ignore");
    $("input", "#step4").addClass("ignore");
});
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    }
    else {
        return true;
    }
}
        
$(document).ready(function(){
    
    $("#name").on('keyup',function(){
       $("#name2").val($(this).val())
    });
    
    $("#mobile").on('keyup',function(){
       $("#mobile2").val($(this).val())
    });
    
    $("#email").on('keyup',function(){
       $("#email2").val($(this).val())
    });
    
    $("#father_name").on('keyup',function(){
       $("#father_name2").val($(this).val())
    });
    
    $("input:radio[name='gender']").change(function() {
       $('input[name="gender1"].'+$('input[name="gender"]:checked').val()).attr('checked', true);
    });
    
    $("#postalcode").on('keyup',function(){
       $("#postalcode2").val($(this).val())
    });
    
    $("#communication_address").on('keyup',function(){
       $("#communication_address2").val($(this).val())
    });
    
    $("#permanent_address").on('keyup',function(){
       $("#permanent_address2").val($(this).val())
    });
    
    $("#dob").on('change',function(){
       $("#dob2").val($(this).val())
    });
    
    const selectEles = document.querySelectorAll('select#state');
    selectEles[0].addEventListener('change', function() {
        selectEles[1].value = this.value;
    });
    
    const selectElesn = document.querySelectorAll('select#nationality');
    selectElesn[0].addEventListener('change', function() {
        selectElesn[1].value = this.value;
    });
    
    $("#collageName").on('keyup',function(){
       $("#collageName2").val($(this).val())
    });
    
    $("#enrollmentNo").on('keyup',function(){
       $("#enrollmentNo2").val($(this).val())
    });
    
    $("#clinicAddress").on('keyup',function(){
       $("#clinicAddress2").val($(this).val())
    });
    
    $("#stateBoard").on('keyup',function(){
       $("#stateBoard2").val($(this).val())
    });
    
    $("#registerdDate").on('keyup',function(){
       $("#registerdDate2").val($(this).val())
    });
    
    $("#nameNew1055").on('keyup',function(){
       $("#nameNew10552").val($(this).val())
    });
    
    $("#nameNew1155").on('keyup',function(){
       $("#nameNew11552").val($(this).val())
    });
    
    $("#nameNew7").on('keyup',function(){
       $("#nameNew72").val($(this).val())
    });
    
    $("input:radio[name='nameNew8']").change(function() {
       $('input:radio[name="nameNew82"].'+$('input:radio[name="nameNew8"]:checked').val()).attr('checked', true);
    });
    
    $("input:radio[name='nameNew9']").change(function() {
       $('input:radio[name="nameNew92"].'+$('input:radio[name="nameNew9"]:checked').attr('data-id')).attr('checked', true);
    });
    
    $('#otp').on('keyup', function(){
        var otpstore = parseInt(sessionStorage.getItem("otpstore"));
        if(otpstore == $('#otp').val()){
            $('#otp-error').hide();
        	$('#sendotp').hide();
        	$('#stepone').show();
        }else{
            $('#otp-error').show();
        }
    });
    
    $('#sendotp').click(function(){
        var error = 0;
    	var validateMobNum= /^\d*(?:\.\d{1,2})?$/;
    	var mobilenum = $('#mobile').val();
    	
    	if($('#name').val() == ''){
    	    if($('#name').next('label').length >=1 ){
    	        $('#name-error').html('This Field is required');
    	    }else{
    	        $('#name').after('<label class="error" id="name-error">This Field is required</label>');    
    	    }
    	    var error = 1;
    	}else{
    	    $('#name-error').hide();
    	}
    	
    	if(mobilenum == '' ){
    	    if($('#mobile').next('label').length >=1 ){
    	        $('#mobile-error').html('This Field is required');
    	    }else{
    	        $('#mobile').after('<label class="error" id="mobile-error">This Field is required</label>');    
    	    }
    	    var error = 1;
    	}else if(!validateMobNum.test(mobilenum)){
    	    $('#mobile-error').html('Please Enter Valid Number');
    	    
    	    var error = 1;
    	}else if(mobilenum.length < 10){
    	    $('#mobile-error').html('Please Enter Valid Number');
    	    
    	    var error = 1;
    	}else{
    	    $('#mobile-error').hide();
    	}
    	
    	if($('#email').val() == ''){
    	    if($('#email').next('label').length >=1 ){
    	        $('#email-error').html('This Field is required');
    	    }else{
    	        $('#email').after('<label class="error" id="email-error">This Field is required</label>');    
    	    }
    	    var error = 1;
    	}else if(IsEmail($('#email').val()) == false){
    	    $('#email-error').html('Please Enter Valid Email Address');
    	    
    	    var error = 1;
    	}else{
    	    $('#email-error').hide();
    	}
    	
    	if (error == 0)
    	{
    	    $('.otp').removeClass('otp');
    	    $('#otp-error').hide();
    	    
    	    $.ajax({
        		url: "sendotp.php",
        		type: "POST",
        		data: {mobile: mobilenum},
        		success: function(data)
        		{
        		    console.log(data);
        		    sessionStorage.setItem("otpstore", data);
        		
        		},
        		error: function(){}
        		
        	});
    	}
    	
        
    });
    
    $("#stepone").click(function()
    {
        var mobilenum = $('#mobile').val();
        
    	current_fs = $(this).parent();
    	next_fs = $(this).parent().next();
    	var error = 0;
    	var validateMobNum= /^\d*(?:\.\d{1,2})?$/;
    	
    	
    	if($('#name').val() == ''){
    	    if($('#name').next('label').length >=1 ){
    	        $('#name-error').html('This Field is required');
    	    }else{
    	        $('#name').after('<label class="error" id="name-error">This Field is required</label>');    
    	    }
    	    var error = 1;
    	}else{
    	    $('#name-error').hide();
    	}
    	
    	if(mobilenum == '' ){
    	    if($('#mobile').next('label').length >=1 ){
    	        $('#mobile-error').html('This Field is required');
    	    }else{
    	        $('#mobile').after('<label class="error" id="mobile-error">This Field is required</label>');    
    	    }
    	    var error = 1;
    	}else if(!validateMobNum.test(mobilenum)){
    	    $('#mobile-error').html('Please Enter Valid Number');
    	    
    	    var error = 1;
    	}else if(mobilenum.length < 10){
    	    $('#mobile-error').html('Please Enter Valid Number');
    	    
    	    var error = 1;
    	}else{
    	    $('#mobile-error').hide();
    	}
    	
    	if($('#email').val() == ''){
    	    if($('#email').next('label').length >=1 ){
    	        $('#email-error').html('This Field is required');
    	    }else{
    	        $('#email').after('<label class="error" id="email-error">This Field is required</label>');    
    	    }
    	    var error = 1;
    	}else if(IsEmail($('#email').val()) == false){
    	    $('#email-error').html('Please Enter Valid Email Address');
    	    
    	    var error = 1;
    	}else{
    	    $('#email-error').hide();
    	}
    	
    	if (error == 0)
    	{
    		$("input","#step2").removeClass("ignore");
    		
    		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    		$('#step1').hide();
    		$('#step2').show(); 
    		window.scrollTo(0, 0);
    	}
    
    });
    
    $("#previous1").click(function()
    {
    	$("input","#step2").addClass("ignore");
    	
    	current_fs = $(this).parent();
    	previous_fs = $(this).parent().prev();
    	
    	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    	$('#step2').hide();
    	$('#step1').show(); 
    	window.scrollTo(0, 0);
    });
    
    
$("#steptwo").click(function()
{
    
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	var error = 0;
	
	
    if($('#father_name').val() == ''){
        if($('#father_name').next('label').length >=1 ){
            $('#father_name-error').html('This Field is required');
        }else{
            $('#father_name').after('<label class="error" id="father_name-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#father_name-error').hide();
        
    }
    
    if($("input:radio[name='gender']:checked").length == 0){
        $('#gender').html('This Field is required');
        var error = 1;
    }else{
        $('#gender').hide();
    }
    	
    if($('#postalcode').val() == ''){
        if($('#postalcode').next('label').length >=1 ){
            $('#postalcode-error').html('This Field is required');
        }else{
            $('#postalcode').after('<label class="error" id="postalcode-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#postalcode-error').hide();
    }
    	
    if($('#communication_address').val() == ''){
        if($('#communication_address').next('label').length >=1 ){
            $('#communication_address-error').html('This Field is required');
        }else{
            $('#communication_address').after('<label class="error" id="communication_address-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#communication_address-error').hide();
    }
    
    if($('#permanent_address').val() == ''){
        if($('#permanent_address').next('label').length >=1 ){
            $('#permanent_address-error').html('This Field is required');
        }else{
            $('#permanent_address').after('<label class="error" id="permanent_address-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#permanent_address-error').hide();
    }
    
    if($('#dob').val() == ''){
        if($('#dob').next('label').length >=1 ){
            $('#dob-error').html('This Field is required');
        }else{
            $('#dob').after('<label class="error" id="dob-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#dob-error').hide();
    }
    
    if($('#state').val() == ''){
        if($('#state').next('label').length >=1 ){
            $('#state-error').html('This Field is required');
        }else{
            $('#state').after('<label class="error" id="state-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#state-error').hide();
    }
    
    if($('#nationality').val() == ''){
        if($('#nationality').next('label').length >=1 ){
            $('#nationality-error').html('This Field is required');
        }else{
            $('#nationality').after('<label class="error" id="nationality-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#nationality-error').hide();
    }
    
    /*==Student==*/
    if($('#collageName').val() == ''){
        if($('#collageName').next('label').length >=1 ){
            $('#collageName-error').html('This Field is required');
        }else{
            $('#collageName').after('<label class="error" id="collageName-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#collageName-error').hide();
    }
    
    if($('#enrollmentNo').val() == ''){
        if($('#enrollmentNo').next('label').length >=1 ){
            $('#enrollmentNo-error').html('This Field is required');
        }else{
            $('#enrollmentNo').after('<label class="error" id="enrollmentNo-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#enrollmentNo-error').hide();
    }
    
    if($('#studentIdCard').val() == ''){
        if($('#studentIdCard').next('label').length >=1 ){
            $('#studentIdCard-error').html('This Field is required');
        }else{
            $('#studentIdCard').after('<label class="error" id="studentIdCard-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#studentIdCard-error').hide();
    }
    
    /*==LifeTime==*/
    if($('#clinicAddress').val() == ''){
        if($('#clinicAddress').next('label').length >=1 ){
            $('#clinicAddress-error').html('This Field is required');
        }else{
            $('#clinicAddress').after('<label class="error" id="clinicAddress-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#clinicAddress-error').hide();
    }
    
    if($('#stateBoard').val() == ''){
        if($('#stateBoard').next('label').length >=1 ){
            $('#stateBoard-error').html('This Field is required');
        }else{
            $('#stateBoard').after('<label class="error" id="stateBoard-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#stateBoard-error').hide();
    }
   
    if($('#registerdDate').val() == ''){
        if($('#registerdDate').next('label').length >=1 ){
            $('#registerdDate-error').html('This Field is required');
        }else{
            $('#registerdDate').after('<label class="error" id="registerdDate-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#registerdDate-error').hide();
    }
    
    /*==Pharma==*/
    if($('#nameNew1055').val() == ''){
        if($('#nameNew1055').next('label').length >=1 ){
            $('#nameNew1055-error').html('This Field is required');
        }else{
            $('#nameNew1055').after('<label class="error" id="nameNew1055-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#nameNew1055-error').hide();
    }
    
    if($('#nameNew1155').val() == ''){
        if($('#nameNew1155').next('label').length >=1 ){
            $('#nameNew1155-error').html('This Field is required');
        }else{
            $('#nameNew1155').after('<label class="error" id="nameNew1155-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#nameNew1155-error').hide();
    }
    
    /*==All==*/
    if($('#nameNew7').val() == ''){
        if($('#nameNew7').next('label').length >=1 ){
            $('#nameNew7-error').html('This Field is required');
        }else{
            $('#nameNew7').after('<label class="error" id="nameNew7-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#nameNew7-error').hide();
    }
    
    if($("input:radio[name='nameNew8']:checked").length == 0){
        $('#nameNew8').html('This Field is required');
        var error = 1;
    }else{
        $('#nameNew8').hide();
    }
    
    if($("input:radio[name='nameNew9']:checked").length == 0){
        $('#nameNew9').html('This Field is required');
        var error = 1;
    }else{
        $('#nameNew9').hide();
    }
    
    if($('#profilePic').val() == ''){
        if($('#profilePic').next('label').length >=1 ){
            $('#profilePic-error').html('This Field is required');
        }else{
            $('#profilePic').after('<label class="error" id="profilePic-error">This Field is required</label>');    
        }
        var error = 1;
    }else{
        $('#profilePic-error').hide();
    }
    
	
	if (error == 0)
	{	
		$("input","#step3").removeClass("ignore");
		
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		$('#step2').hide();
		$('#step3').show(); 
		window.scrollTo(0, 0);
	}

});

$("#previous2").click(function()
{
	$("input","#step3").addClass("ignore");
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	$('#step3').hide();
	$('#step2').show(); 
	window.scrollTo(0, 0);
});

$("#stepthree").click(function()
{
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();	
	var error = 0;
	
	if (error == 0)
	{	
		$("input","#step4").removeClass("ignore");
		
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		$('#step3').hide();
		$('#step4').show(); 
		window.scrollTo(0, 0);
	}

});

$("#previous3").click(function()
{
	$("input","#step4").addClass("ignore");
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	$('#step4').hide();
	$('#step3').show(); 
	window.scrollTo(0, 0);
});


$("#msform").on('submit',function(e){
    e.preventDefault();
    
    if($("input:checkbox[name='termsclsname']:checked").length == 0){
        $('#temsandconderror').show();
    }else{
        $('.loader').show();
		$('#stepfour').attr("disabled", "disabled");
        $('#temsandconderror').hide();
        var formData = new FormData(this);
        $("#loadingmessage").show();
    	$.ajax({
    		url: "membershipformajaxsave.php",
    		type: "POST",
    		data: formData,
    		contentType: false,
    		cache: false,
    		processData:false,
    		beforeSend: function(){},
    		success: function(data)
    		{
    		    
    		    $('.loader').hide();
    		    console.log(data);
    		   // window.location=data;
    		     setTimeout(function(){document.location.href = data},1000);
    		    //return false;
    		
    		},
    		error: function(){}
    		
    	});	
	
    }
        
});


});


		

</script>


<?php include "layouts/main-footer.php"; ?>