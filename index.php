<?php session_start();
$_SESSION["Username"] = "PA_NAME";
$_SESSION["Password"] = "PA_PASSWORD";
$_SESSION["RSAKey"] = "RSA_KEY";
$_SESSION["Environment"] = 'https://test.trustly.com/api/1';
?>
<html>
<head>
  <title>APITools</title>
  <link id="favicon" href="favico.png" rel="shortcut icon" type="image/png">
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
      <button type="submit" value="Deposit" name="APIselector">Deposit</input>
      <button type="submit" value="Charge" name="APIselector">Charge</input>
      <button type="submit" value="CancelCharge" name="APIselector">CancelCharge</input>
      <button type="submit" value="Refund" name="APIselector">Refund</input>
      <button type="submit" value="SelectAccount" name="APIselector">SelectAccount</input>
      <button type="submit" value="RegisterAccount" name="APIselector">RegisterAccount</input>
      <button type="submit" value="AccountPayout" name="APIselector">AccountPayout</input>
      <button type="submit" value="RegisterAccountPayout" name="APIselector">RegisterAccountPayout</input>
      <button type="submit" value="Withdraw" name="APIselector">Withdraw</input>
      <button type="submit" value="ApproveWithdrawal" name="APIselector">ApproveWithdrawal</input>
      <button type="submit" value="DenyWithdrawal" name="APIselector">DenyWithdrawal</input>
      <button type="submit" value="AccountLedger" name="APIselector">AccountLedger</input>
      <button type="submit" value="Balance" name="APIselector">Balance</input>
      <button type="submit" value="ViewAutomaticSettlementDetailsCSV" name="APIselector">ViewAutomaticSettlementDetailsCSV</input>
      <button type="submit" value="GetWithdrawals" name="APIselector">GetWithdrawals</input>
      <button type="submit" value="Credentials" name="APIselector">Credentials</input>
    </div>
  </form>
<iframe src="main.php" class="main" name="main"></iframe>
</body>
</html>
