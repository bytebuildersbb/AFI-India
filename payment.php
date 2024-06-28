<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
	<!-- <form method="POST" action="https://hdfcprodsigning.in/onepayVAS/payprocessor">
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
	</form> -->
	<table class="table table-bordered" style="width: 50% !important; margin:auto; margin-top: 20px;">
		<thead>
			<tr>
				<th colspan="4" scope="col" align="center" style="text-align: center; font-size: 24px;">HDFC Payment</th>
			</tr>
		</thead>
		<tbody>
			<form action="https://hdfcprodsigning.in/onepayVAS/" method="POST">
				<tr>
					<td>Merchant ID</td>
					<td><input type="AN" name="merchantId" class="form-control" value="V2534"></td>
				</tr>
				<tr>
					<td>API Key</td>
					<td><input type="AN" name="apiKey" class="form-control" value="78755465"></td>
				</tr>
				<tr>
					<td>TXN Id</td>
					<td><input type="AN" name="txnId" class="form-control" value="77983779999"></td>
				</tr>
				<tr>
					<td>Amount</td>
					<td><input type="number" name="Amount" class="form-control" value="100.00"></td>
				</tr>
				<tr>
					<td>Date Time</td>
					<td><input type="text"  name="dateTime" class="form-control" value="<?php echo date('yy-M-d H:m:s', time()); ?>"></td>
				</tr>
				<tr>
					<td>Customer Email</td>
					<td><input type="AN" name="custMail" class="form-control" value="akanand42@gmail.com"></td>
				</tr>
				<tr>
					<td>Channel ID</td>
					<td><input type="N" name="channelId" class="form-control" value="0"></td>
				</tr>
				<tr>
					<td>TXN Type</td>
					<td><input type="A" name="txnType" class="form-control" value="REDIRECT"></td>
				</tr>
				<tr>
					<td>Return URL</td>
					<td><input type="A" name="returnURL" class="form-control" value="Https://hgdf.ppf.docs.axps"></td>
				</tr>
				<tr>
					<td>Product Id</td>
					<td><input type="AN" name="productId" class="form-control" value="12524468"></td>
				</tr>
				<tr>
					<td>Instrument ID</td>
					<td><input type="A" name="instrumentId" class="form-control" value="NB/CC/DC/UPI"></td>
				</tr>
				<tr>
					<td>Card Type</td>
					<td><input type="A" name="cardType" class="form-control" value="CC/DC"></td>
				</tr>
				<tr>
					<td>Submit Form</td>
					<td><input type="submit" name="submit" class="btn btn-info"></td>
				</tr>
			</form>
		</tbody>
	</table>
</body>
</html>