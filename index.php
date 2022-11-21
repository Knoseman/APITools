<?php session_start();
$_SESSION["Username"] = "PA_NAME";
$_SESSION["Password"] = "PA_PASSWORD";
$_SESSION["RSAKey"] = "RSA_KEY";
?>
<html>
<head>
	<title>APITools</title>
	<link id="favicon" href="https://files.readme.io/4f00763-small-302f957-small-32x32.png" rel="shortcut icon" type="image/png">
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
body{
	font-family: 'Open Sans', sans-serif;
	font-size: 12px;
	margin: 0px;
	padding: 0px;
}
.outerDiv{
	padding-top: 15px;
	padding-left: 15px;
	width:100%; height: 50px;
	background-color: #00303f;
	color:  white;
	font-size: 24px;
	font-weight: bold;
}
.top {
	background-image: url("logotype_white.png");
	background-position: 10px 0px; background-repeat: no-repeat; background-size: 110px;
}
.menu {
	width: 100%;
	margin: 0;
	overflow: hidden;
	background-color: #ecebec;
}
.menu {
	float: left;
}
.menu button {
	display: inline-block;
	font-size: 14px;
	color: black;
	text-decoration: none;
	background-color: #d2d2d2;
	border-radius: 4px;
	padding: 10px;
	margin: 5px 5px;
	padding: 5px;
	outline:none;
}
.menu button:hover {
	background-color: #3d807c;
	color: white;
}
.menu button:focus {
	background-color: #004b50;
	color: white;
}
iframe {
	height: 100%;
	border : 0px;
}
.main {
	width: 100%;
}
</style>
</head>
<body>
<form action="main.php" method="post" target="main" id="APIselector">
	<div class="outerDiv">APITools</div>
	<div class="menu">
			<button onClick="document.getElementById('APIselector').submit();" value="Deposit" name="APIselector">Deposit</input>
			<button onClick="document.getElementById('APIselector').submit();" value="Charge" name="APIselector">Charge</input>
			<button onClick="document.getElementById('APIselector').submit();" value="CancelCharge" name="APIselector">CancelCharge</input>
			<button onClick="document.getElementById('APIselector').submit();" value="Refund" name="APIselector">Refund</input>
			<button onClick="document.getElementById('APIselector').submit();" value="SelectAccount" name="APIselector">SelectAccount</input>
			<button onClick="document.getElementById('APIselector').submit();" value="RegisterAccount" name="APIselector">RegisterAccount</input>
			<button onClick="document.getElementById('APIselector').submit();" value="AccountPayout" name="APIselector">AccountPayout</input>
                        <button onClick="document.getElementById('APIselector').submit();" value="RegisterAccountPayout" name="APIselector">RegisterAccountPayout</input>
			<button onClick="document.getElementById('APIselector').submit();" value="Withdraw" name="APIselector">Withdraw</input>
			<button onClick="document.getElementById('APIselector').submit();" value="ApproveWithdrawal" name="APIselector">ApproveWithdrawal</input>
			<button onClick="document.getElementById('APIselector').submit();" value="DenyWithdrawal" name="APIselector">DenyWithdrawal</input>
			<button onClick="document.getElementById('APIselector').submit();" value="AccountLedger" name="APIselector">AccountLedger</input>
			<button onClick="document.getElementById('APIselector').submit();" value="Balance" name="APIselector">Balance</input>
			<button onClick="document.getElementById('APIselector').submit();" value="ViewAutomaticSettlementDetailsCSV" name="APIselector">ViewAutomaticSettlementDetailsCSV</input>
			<button onClick="document.getElementById('APIselector').submit();" value="GetWithdrawals" name="APIselector">GetWithdrawals</input>
			<button onClick="document.getElementById('APIselector').submit();" value="Credentials" name="APIselector">Credentials</input>
	</div>
</form>
	<iframe src="main.php" class="main" name="main"></iframe>
</body>
</html>
