<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
	<form method="POST" action="https://hdfcprodsigning.in/onepayVAS/payprocessor">
		<div class="form-group">
			<div class="col-md-6">
				<label>merchantId</label>
				<input type="text" name="merchantId" class="form-control" value="M0002">
			</div>
			<div class="col-md-6">
				<label>apiKey</label>
				<input type="text" name="apiKey" class="form-control" value="jpuT0821">
			</div>
			<div class="col-md-6">
				<label>txnId</label>
				<input type="text" name="txnId" class="form-control" value="<?php echo rand();?>">
			</div>
			<div class="col-md-6">
				<label>Amount</label>
				<input type="text" name="Amount" class="form-control" value="100.00">
			</div>
			<div class="col-md-6">
				<label>dateTime</label>
				<input type="text" name="dateTime" class="form-control" value="2018-08-01 13:20:33">
			</div>
			<div class="col-md-6">
				<label>custMobile</label>
				<input type="text" name="custMobile" class="form-control" value="9876588877">
			</div>
			<div class="col-md-6">
				<label>custMail</label>
				<input type="text" name="custMail" class="form-control" value="abc@abc.com">
			</div>
			<div class="col-md-6">
				<label>channelId</label>
				<input type="text" name="channelId" class="form-control" value="0">
			</div>
			<div class="col-md-6">
				<label>txnType</label>
				<input type="text" name="txnType" class="form-control" value="DIRECT/REDIRECT">
			</div>
			<div class="col-md-6">
				<label>returnURL</label>
				<input type="text" name="returnURL" class="form-control" value="http://payone.tech/abc/">
			</div>
			<div class="col-md-6">
				<label>productId</label>
				<input type="text" name="productId" class="form-control" value="DEFAULT">
			</div>
			<div class="col-md-6">
				<label>udf1</label>
				<input type="text" name="udf1" class="form-control" value="NA">
			</div>
			<div class="col-md-6">
				<label>udf2</label>
				<input type="text" name="udf2" class="form-control" value="NA">
			</div>
			<div class="col-md-6">
				<label>udf3</label>
				<input type="text" name="udf3" class="form-control" value="NA">
			</div>
			<div class="col-md-6">
				<label>udf4</label>
				<input type="text" name="udf4" class="form-control" value="NA">
			</div>
			<div class="col-md-6">
				<label>instrumentId</label>
				<input type="text" name="instrumentId" class="form-control" value="NA">
			</div>
			<div class="col-md-6">
				<label>cardDetails</label>
				<input type="text" name="cardDetails" class="form-control" value="CC/DC">
			</div>
			<div class="col-md-6">
				<label>cardType</label>
				<input type="text" name="cardType" class="form-control" value="NA">
			</div>
			<div class="col-md-6">
				<button type="submit" name="submit">Submit</button>
				
			</div>
		</div>
	</form>
</body>
</html>