<?php session_start(); ?>
<html>
<head>
<meta charset="UTF-8">
<script src="apitools.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="input" class="container">
  <table>
  <tr>
<?php
require('helper_functions.php');
if (isset($_POST['APIselector'])){
  $APICall = $_POST['APIselector'];
?>
<form action="main.php" method="post" target="main">
<td class="one">
  <h4><?php echo ($APICall == 'Credentials') ? "Credentials" : "Parameters" ?></h4>
<?php 
  if($APICall != 'Credentials') {
?>
  <li><label><span class="tooltip">API username<span class="tooltiptext">Set under Credentials</span></span></label><?php echo $_SESSION["Username"]; ?></li>
  <li><label><span class="tooltip">API Endpoint<span class="tooltiptext">Set under Credentials</span></span></label><?php echo $_SESSION["Environment"]; ?></li>
  <li><label><span class="tooltip">UUID<span class="tooltiptext">All requests must have an UUID (Universally unique identifier) assigned to them in the format xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx where x is a hexadecimal digit (0-9 and a-f).</span></span></label><input type="text" name="UUID" value="<?php echo uuid(); ?>"></li>
<?php
  }
  switch ($APICall) {
    case "Credentials":
?>
  <li><label><span class="tooltip">API username<span class="tooltiptext">API credentials are provided by Trustly during integration.</span></span></label><input type="text" name="Username" placeholder="API username" value="<?php echo $_SESSION['Username'] ?>"></li>
  <li><label>API Password</label><input type="password" name="Password" placeholder="API password" value="<?php echo $_SESSION['Password'] ?>"></li>
  <li><label><span class="tooltip">API Endpoint<span class="tooltiptext">Trustly's endpoint</span></span></label>
      <input type="text" name="Environment" value="<?php echo $_SESSION['Environment'] ?>">
    </li>
</td>
<td class="two">
  <li><label>Private RSA key</label><textarea name="RSAKey" rows="28" cols="90" placeholder="Paste private RSA key"></textarea></li>
</td>
<?php
    break;

    case "RegisterAccount":
?>
  <li><label>EndUserID</label><input type="text" name="EndUserID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label>ClearingHouse</label><input type="text" name="ClearingHouse" value="SWEDEN"></li>
  <li><label>BankNumber</label><input type="text" name="BankNumber" value="83279"></li>
  <li><label>AccountNumber</label><input type="text" name="AccountNumber" value="60000015"></li>
  <li><label>Firstname</label><input type="text" name="Firstname" value="Steve"></li>
  <li><label>Lastname</label><input type="text" name="Lastname" value="Smith"></li>
</td>
<td class="two">
  <h4>Attributes</h4>
  <li><label>DateOfBirth</label><input type="text" name="DateOfBirth" value="1990-01-20"></li>
  <li><label>MobilePhone</label><input type="text" name="MobilePhone" placeholder="+46709876543">&nbsp;(optional)</li>
  <li><label>NationalIdentificationNumber</label><input type="text" name="NationalIdentificationNumber" placeholder="790131-1234">&nbsp;(optional)</li>
  <li><label>AddressCountry</label><input type="text" name="AddressCountry" placeholder="SE">&nbsp;(optional)</li>
  <li><label>AddressPostalCode</label><input type="text" name="AddressPostalCode" placeholder="SE-11253">&nbsp;(optional)</li>
  <li><label>AddressCity</label><input type="text" name="AddressCity" placeholder="Stockholm">&nbsp;(optional)</li>
  <li><label>AddressLine1</label><input type="text" name="AddressLine1" placeholder="Main street 1">&nbsp;(optional)</li>
  <li><label>AddressLine2</label><input type="text" name="AddressLine2" placeholder="Apartment 123, 2 stairs up">&nbsp;(optional)</li>
  <li><label>Address</label><input type="text" name="Address" placeholder="Use only if needed">&nbsp;(optional)</li>
  <li><label>Email</label><input type="text" name="Email" placeholder="test<?php echo rand(1,100000000) ?>@trustly.com"></li>
  <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
</td>
<?php
    break;
        case "RegisterAccountPayout":
?>
  <li><label>EndUserID</label><input type="text" name="EndUserID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label>ClearingHouse</label><input type="text" name="ClearingHouse" value="SWEDEN"></li>
  <li><label>BankNumber</label><input type="text" name="BankNumber" value="83279"></li>
  <li><label>AccountNumber</label><input type="text" name="AccountNumber" value="60000015"></li>
  <li><label>Firstname</label><input type="text" name="Firstname" value="Steve"></li>
  <li><label>Lastname</label><input type="text" name="Lastname" value="Smith"></li>
  <li><label>NotificationURL</label><input type="text" name="NotificationURL" value="https://test.trustly.com/demo/notifyd_test"></li>
  <li><label>EndUserID</label><input type="text" name="EndUserID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label>MessageID</label><input type="text" name="MessageID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label>Amount</label><input type="text" name="Amount" value="10"></li>
  <li><label>Currency</label><input type="text" name="Currency" value="SEK"></li>
</td>
<td class="two">
  <h4>Attributes</h4>
  <li><label>ShopperStatement</label><input type="text" name="ShopperStatement" placeholder="trustly.com">&nbsp;(optional)</li>
  <li><label>ExternalReference</label><input type="text" name="ExternalReference" placeholder="MerchExtRef000">&nbsp;(optional)</li>
  <li><label>PSPMerchant</label><input type="text" name="PSPMerchant" placeholder="Merchant name">&nbsp;(optional)</li>
  <li><label>PSPMerchantURL</label><input type="text" name="PSPMerchantURL" placeholder="https://">&nbsp;(optional)</li>
  <li><label>MCC</label><input type="text" name="MerchantCategoryCode" placeholder="7656">&nbsp;(optional)</li>
  <li><label>DateOfBirth</label><input type="text" name="DateOfBirth" value="1990-01-20"></li>
  <li><label>MobilePhone</label><input type="text" name="MobilePhone" placeholder="+46709876543">&nbsp;(optional)</li>
  <li><label>NationalIdentificationNumber</label><input type="text" name="NationalIdentificationNumber" placeholder="790131-1234">&nbsp;(optional)</li>
  <li><label>AddressCountry</label><input type="text" name="AddressCountry" placeholder="SE">&nbsp;(optional)</li>
  <li><label>AddressPostalCode</label><input type="text" name="AddressPostalCode" placeholder="SE-11253">&nbsp;(optional)</li>
  <li><label>AddressCity</label><input type="text" name="AddressCity" placeholder="Stockholm">&nbsp;(optional)</li>
  <li><label>AddressLine1</label><input type="text" name="AddressLine1" placeholder="Main street 1">&nbsp;(optional)</li>
  <li><label>AddressLine2</label><input type="text" name="AddressLine2" placeholder="Apartment 123, 2 stairs up">&nbsp;(optional)</li>
  <li><label>Address</label><input type="text" name="Address" placeholder="Use only if needed">&nbsp;(optional)</li>
  <li><label>Email</label><input type="text" name="Email" placeholder="test<?php echo rand(1,100000000) ?>@trustly.com"></li>
  <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
  <h4 type="button" style="cursor: pointer" id="OptionalAttributeHeader">SenderInformation (Click to show / hide)</h4>
  <div id="OptionalAttributes" style="display: none">
    <li><label>Partytype</label>
      <select name="Partytype_2">&nbsp;(optional)
        <option selected></option>
        <option value="PERSON" >PERSON</option>
        <option value="ORGANISATION">ORGANISATION</option>
      </select>&nbsp;(optional)
    </li>
    <li><label>Adress</label><input type="text" name="Adress_2" placeholder="Street 1, 12345 Barcelona">&nbsp;(optional)</li>
    <li><label>CountryCode</label><input type="text" name="CountryCode_2" placeholder="SE">&nbsp;(optional)</li>
    <li><label>CustomerID</label><input type="text" name="CustomerID_2" placeholder="123456789">&nbsp;(optional)</li>
    <li><label>DateOfBirth</label><input type="date" name="DateOfBirth_2" placeholder="1990-03-31">&nbsp;(optional)</li>
    <li><label>Firstname</label><input type="text" name="Firstname_2" placeholder="Steve">&nbsp;(optional)</li>
    <li><label>LastName</label><input type="text" name="LastName_2" placeholder="Smith">&nbsp;(optional)</li>
  </div>
</td>
<?php
    break;
    case "AccountPayout":
?>
  <li><label>NotificationURL</label><input type="text" name="NotificationURL" value="https://test.trustly.com/demo/notifyd_test"></li>
  <li><label>AccountID</label><input type="text" name="AccountID" value="2883919934"></li>
  <li><label>EndUserID</label><input type="text" name="EndUserID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label>MessageID</label><input type="text" name="MessageID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label>Amount</label><input type="text" name="Amount" value="10"></li>
  <li><label>Currency</label><input type="text" name="Currency" value="SEK"></li>
</td>
<td class="two">
<h4>Attributes - SenderInformation</h4>
  <li><label>Partytype</label>
    <select name="Partytype_2">&nbsp;(optional)
      <option selected></option>
      <option value="PERSON" >PERSON</option>
      <option value="ORGANISATION">ORGANISATION</option>
    </select>&nbsp;(optional)
  </li>
  <li><label>DateOfBirth</label><input type="date" name="DateOfBirth_2" placeholder="1990-03-31">&nbsp;(optional)</li>
  <li><label>CountryCode</label><input type="text" name="CountryCode_2" placeholder="SE">&nbsp;(optional)</li>
  <li><label>Firstname</label><input type="text" name="Firstname_2" placeholder="Steve">&nbsp;(optional)</li>
  <li><label>LastName</label><input type="text" name="LastName_2" placeholder="Smith">&nbsp;(optional)</li>
  <li><label>Adress</label><input type="text" name="Adress_2" placeholder="Street 1, 12345 Barcelona">&nbsp;(optional)</li>
  <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
</td>
<?php
    break;
    case "Deposit":
?>
  <li><label><span class="tooltip">NotificationURL<span class="tooltiptext">The URL to which notifications for this transaction should be sent to.</span></span></label><input type="text" name="NotificationURL" value="https://test.trustly.com/demo/notifyd_test"></li>
  <li><label><span class="tooltip">EndUserID<span class="tooltiptext">ID, username, hash or anything uniquely identifying the end-user requesting the deposit.</span></span></label><input type="text" name="EndUserID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label><span class="tooltip">MessageID<span class="tooltiptext">Merchant's unique ID for the deposit.</span></span></label><input type="text" name="MessageID" value="<?php echo rand(1,100000000) ?>"></li>
  <h4>Attributes</h4>
  <li><label><span class="tooltip">Currency<span class="tooltiptext">The currency to settle to the merchant's Trustly account.</span></span></label><input type="text" name="Currency" value="SEK"><span class="required">*</span></li>
  <li><label><span class="tooltip">Firstname<span class="tooltiptext">The end-user's first name.</span></span></label><input type="text" name="Firstname" value="Steve"><span class="required">*</span></li>
  <li><label><span class="tooltip">Lastname<span class="tooltiptext">The end-user's last name.</span></span></label><input type="text" name="Lastname" value="Smith"><span class="required">*</span></li>
  <li><label><span class="tooltip">Email<span class="tooltiptext">The email address of the end user.</span></span></label><input type="text" name="Email" value="test<?php echo rand(1,100000000) ?>@trustly.com"><span class="required">*</span></li>
  <li><label><span class="tooltip">Locale<span class="tooltiptext">The end-users localization preference in the format [language[_territory]] (en_GB).</span></span></label><input type="text" name="Locale" placeholder="en_US">&nbsp;(optional)</li>
  <li><label><span class="tooltip">SuggestedMinAmount<span class="tooltiptext">The minimum amount the end-user is allowed to deposit. Do not use this attribute in combination with Amount.</span></span></label><input type="text" name="SuggestedMinAmount" placeholder="5.00">&nbsp;(optional)</li>
  <li><label><span class="tooltip">SuggestedMaxAmount<span class="tooltiptext">The maximum amount the end-user is allowed to deposit. Do not use this attribute in combination with Amount.</span></span></label><input type="text" name="SuggestedMaxAmount" placeholder="500.00">&nbsp;(optional)</li>
  <li><label><span class="tooltip">Amount<span class="tooltiptext">The amount to deposit. Do not use this attribute in combination with SuggestedMinAmount or SuggestedMaxAmount.</span></span></label><input type="text" name="Amount" value="1.00">&nbsp;(optional)</li>
  <li><label><span class="tooltip">Country<span class="tooltiptext">The ISO 3166-1-alpha-2 code of the end-user's country.</span></span></label><input type="text" name="Country" value="SE">&nbsp;(optional)</li>
  <li><label><span class="tooltip">AccountID<span class="tooltiptext">For Trustly Express.</span></span></label><input type="text" name="AccountID" placeholder="1234567890">&nbsp;(optional)</li>
  <li><label><span class="tooltip">NationalIdentificationNumber<span class="tooltiptext">The end-user's social security number / personal number / birth number.</span></span></label><input type="text" name="NationalIdentificationNumber" placeholder="790131-1234">&nbsp;(optional)</li>
  <li><label><span class="tooltip">UnchangeableNationalIdentificationNumber<span class="tooltiptext">Locks NationalIdentificationNumber. For Sweden only.</span></span></label><input type="checkbox" value="1" name="UnchangeableNationalIdentificationNumber">&nbsp;(optional)</li>
  <li><label><span class="tooltip">RequestDirectDebitMandate<span class="tooltiptext">For TDD only</span></span></label><input type="checkbox" value="1" name="RequestDirectDebitMandate">&nbsp;(optional)</li>
  <li><label><span class="tooltip">QuickDeposit<span class="tooltiptext">For TDD only</span></span></label><input type="checkbox" value="1" name="QuickDeposit">&nbsp;(optional)</li>
  <li><label><span class="tooltip">HoldNotifications<span class="tooltiptext">For manual handling of notifications.</span></span></label><input type="checkbox" value="1" name="HoldNotifications">&nbsp;(optional)</li>
  <li><label><span class="tooltip">RequestKYC<span class="tooltiptext">For Pay n Play</span></span></label><input type="checkbox" value="1" name="RequestKYC">&nbsp;(optional)</li>
  <li><label><span class="tooltip">Method<span class="tooltiptext">For iDeal and FBB</span></span></label>
    <select name="Method">
      <option value="" selected></option>
      <option value="deposit.bank.netherlands.ideal">iDeal</option>
      <option value="deposit.bank.sweden.swish">Swish</option>
      <option value="deposit.bank.finland.aaba_bankbutton">AABA</option>
      <option value="deposit.bank.finland.daba_bankbutton">DABA</option>
      <option value="deposit.bank.finland.hand_bankbutton">HAND</option>
      <option value="deposit.bank.finland.popf_bankbutton">POPF</option>
      <option value="deposit.bank.finland.hels_bankbutton">HELS</option>
      <option value="deposit.bank.finland.itel_bankbutton">ITEL</option>
      <option value="deposit.bank.finland.sban_bankbutton">SBAN</option>
      <option value="deposit.bank.finland.ndea_bankbutton">NDEA</option>
      <option value="deposit.bank.finland.omsp_bankbutton">OMSP</option>
      <option value="deposit.bank.finland.okoy_bankbutton">OKOY</option>
    </select>&nbsp;(optional)</li>
  <br><br><br>
</td>
<td class="two">
  <h4 type="button" style="cursor: pointer" id="OptionalAttributeHeader">Optional attributes (Click to show / hide)</h4>
  <div id="OptionalAttributes" style="display: none">
    <li><label>IP</label><input type="text" name="IP" placeholder="83.140.44.184">&nbsp;(optional)</li>
    <li><label>SuccessURL</label><input type="text" name="SuccessURL" placeholder="https://trustly.com/thank_you.html">&nbsp;(optional)</li>
    <li><label>FailURL</label><input type="text" name="FailURL" value="https://trustly.com/payment_error.html">&nbsp;(optional)</li>
    <li><label>TemplateURL</label><input type="text" name="TemplateURL" placeholder="https://example.org/checkout_trustly.html">&nbsp;(optional)</li>
    <li>
      <label>URLTarget</label>
      <select name="URLTarget">
        <option selected></option>
        <option value="_self" >_SELF</option>
          <option value="_top">_TOP</option>
          <option value="_parent" >_PARENT</option>
      </select>&nbsp;(optional)
    </li>
    <li><label>MobilePhone</label><input type="text" name="MobilePhone" placeholder="+46709876543">&nbsp;(optional)</li>
    <li><label>ShopperStatement</label><input type="text" name="ShopperStatement" placeholder="trustly.com">&nbsp;(optional)</li>
    <li><label>ShippingAddressCountry</label><input type="text" name="ShippingAddressCountry" placeholder="SE">&nbsp;(optional)</li>
    <li><label>ShippingAddressPostalCode</label><input type="text" name="ShippingAddressPostalCode" placeholder="SE-11253">&nbsp;(optional)</li>
    <li><label>ShippingAddressCity</label><input type="text" name="ShippingAddressCity" placeholder="Stockholm">&nbsp;(optional)</li>
    <li><label>ShippingAddressLine1</label><input type="text" name="ShippingAddressLine1" placeholder="Main street 1">&nbsp;(optional)</li>
    <li><label>ShippingAddressLine2</label><input type="text" name="ShippingAddressLine2" placeholder="Apartment 123, 2 stairs up">&nbsp;(optional)</li>
    <li><label>ShippingAddress</label><input type="text" name="ShippingAddress" placeholder="Use only if needed">&nbsp;(optional)</li>
    <li><label>ExternalReference</label><input type="text" name="ExternalReference" placeholder="MerchExtRef000">&nbsp;(optional)</li>
    <li><label>ChargeAccountID</label><input type="text" name="ChargeAccountID" placeholder="9594811343">&nbsp;(optional)</li>
    <li><label>MCC</label><input type="text" name="MerchantCategoryCode" placeholder="7656">&nbsp;(optional)</li>
    <li><label>PSPMerchant</label><input type="text" name="PSPMerchant" placeholder="Merchant name">&nbsp;(optional)</li>
    <li><label>PSPMerchantURL</label><input type="text" name="PSPMerchantURL" placeholder="https://">&nbsp;(optional)</li>
    <li><label>DisableLocalisation</label><input type="checkbox" value="1" name="DisableLocalisation">&nbsp;(optional)</li>
    <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
    <h4>RecipientInformation</h4>
    <li><label>Partytype</label>
      <select name="Partytype_2">&nbsp;(optional)
        <option selected></option>
        <option value="PERSON" >PERSON</option>
        <option value="ORGANISATION">ORGANISATION</option>
      </select>&nbsp;(optional)
    </li>
    <li><label>Firstname</label><input type="text" name="Firstname_2" placeholder="Mark">&nbsp;(optional)</li>
    <li><label>Lastname</label><input type="text" name="Lastname_2" placeholder="Smith">&nbsp;(optional)</li>
    <li><label>CountryCode</label><input type="text" name="CountryCode_2" placeholder="ES">&nbsp;(optional)</li>
    <li><label>CustomerID</label><input type="text" name="CustomerID_2" placeholder="123456789">&nbsp;(optional)</li>
    <li><label>Address</label><input type="text" name="Address_2" placeholder="Main street 1, 12345, Barcelona">&nbsp;(optional)</li>
    <li><label>DateOfBirth</label><input type="text" name="DateOfBirth_2" placeholder="1980-01-30">&nbsp;(optional)</li>
  </div>
  <br>
</td>
<?php
    break;
    case "Refund":
?>
  <li><label>OrderID</label><input type="text" name="OrderID" value="1478035889"></li>
  <li><label>Amount</label><input type="text" name="Amount" value="10"></li>
  <li><label>Currency</label><input type="text" name="Currency" value="SEK"></li>
</td>
<td class="two">
  <h4>Attributes</h4>
  <li><label>ExternalReference</label><input type="text" name="ExternalReference" placeholder="MerchExtRef000">&nbsp;(optional)</li>
  <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
</td>
<?php
    break;
    case "Withdraw":
?>
  <li><label>NotificationURL</label><input type="text" name="NotificationURL" value="https://test.trustly.com/demo/notifyd_test"></li>
  <li><label>EndUserID</label><input type="text" name="EndUserID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label>MessageID</label><input type="text" name="MessageID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label>Currency</label><input type="text" name="Currency" value="EUR"></li>
  <h4>Attributes</h4>
  <li><label>Firstname</label><input type="text" name="Firstname" value="Steve"><span class="required">*</span></li>
  <li><label>Lastname</label><input type="text" name="Lastname" value="Smith"><span class="required">*</span></li>
  <li><label>Email</label><input type="text" name="Email" value="test<?php echo rand(1,100000000) ?>@trustly.com"><span class="required">*</span></li>
  <li><label>DateOfBirth</label><input type="date" name="DateOfBirth" value="1990-01-20"><span class="required">*</span></li>
  <li><label>Locale</label><input type="text" name="Locale" placeholder="en_US">&nbsp;(optional)</li>
  <li><label>SuggestedAmount</label><input type="text" name="SuggestedAmount" placeholder="89.00">&nbsp;(optional)</li>
  <li><label>Amount</label><input type="text" name="Amount" placeholder="90.00">&nbsp;(optional)</li>
  <li><label>SuggestedMinAmount</label><input type="text" name="SuggestedMinAmount" placeholder="5.00">&nbsp;(optional)</li>
  <li><label>SuggestedMaxAmount</label><input type="text" name="SuggestedMaxAmount" placeholder="500.00">&nbsp;(optional)</li>
  <li><label>Country</label><input type="text" name="Country" value="SE">&nbsp;(optional)</li>
</td>
<td class="two">
  <h4 type="button" style="cursor: pointer" id="OptionalAttributeHeader">Optional attributes (Click to show / hide)</h4>
  <div id="OptionalAttributes" style="display: none">
    <li><label>IP</label><input type="text" name="IP" placeholder="83.140.44.184">&nbsp;(optional)</li>
    <li><label>SuccessURL</label><input type="text" name="SuccessURL" placeholder="https://trustly.com/thank_you.html">&nbsp;(optional)</li>
    <li><label>FailURL</label><input type="text" name="FailURL" value="https://trustly.com/payment_error.html">&nbsp;(optional)</li>
    <li><label>TemplateURL</label><input type="text" name="TemplateURL" placeholder="https://example.org/checkout_trustly.html">&nbsp;(optional)</li>
    <li>
      <label>URLTarget</label>
      <select name="URLTarget">&nbsp;(optional)
        <option selected></option>
        <option value="_self" >_SELF</option>
        <option value="_top">_TOP</option>
        <option value="_parent" >_PARENT</option>
      </select>
    </li>
    <li><label>ClearingHouse</label><input type="text" name="ClearingHouse" placeholder="SWEDEN">&nbsp;(optional)</li>
    <li><label>BankNumber</label><input type="text" name="BankNumber" placeholder="83279">&nbsp;(optional)</li>
    <li><label>AccountNumber</label><input type="text" name="AccountNumber" placeholder="9048832662">&nbsp;(optional)</li>
    <li><label>MobilePhone</label><input type="text" name="MobilePhone" placeholder="+46709876543">&nbsp;(optional)</li>
    <li><label>NationalIdentificationNumber</label><input type="text" name="NationalIdentificationNumber" placeholder="790131-1234">&nbsp;(optional)</li>
    <li><label>UnchangeableNationalIdentificationNumber</label><input type="checkbox" value="1" name="UnchangeableNationalIdentificationNumber">&nbsp;(optional)</li>
    <li><label>AddressCountry</label><input type="text" name="AddressCountry" placeholder="SE">&nbsp;(optional)</li>
    <li><label>AddressPostalCode</label><input type="text" name="AddressPostalCode" placeholder="SE-11253">&nbsp;(optional)</li>
    <li><label>AddressCity</label><input type="text" name="AddressCity" placeholder="Stockholm">&nbsp;(optional)</li>
    <li><label>AddressLine1</label><input type="text" name="AddressLine1" placeholder="Main street 1">&nbsp;(optional)</li>
    <li><label>AddressLine2</label><input type="text" name="AddressLine2" placeholder="Apartment 123, 2 stairs up">&nbsp;(optional)</li>
    <li><label>Address</label><input type="text" name="Address" placeholder="Use only if needed">&nbsp;(optional)</li>
    <li><label>HoldNotifications</label><input type="checkbox" value="1" name="HoldNotifications">&nbsp;(optional)</li>
    <li><label>PSPMerchant</label><input type="text" name="PSPMerchant">&nbsp;(optional)</li>
    <li><label>DisableLocalisation</label><input type="checkbox" value="1" name="DisableLocalisation">&nbsp;(optional)</li>
    <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
    <br>
    <h4>SenderInformation (Optional)</h4>
    <li><label>Partytype</label>
      <select name="Partytype_2">&nbsp;(optional)
        <option selected></option>
        <option value="PERSON" >PERSON</option>
        <option value="ORGANISATION">ORGANISATION</option>
      </select>&nbsp;(optional)
    </li>
    <li><label>DateOfBirth</label><input type="date" name="DateOfBirth_2" placeholder="1990-03-31">&nbsp;(optional)</li>
    <li><label>CountryCode</label><input type="text" name="CountryCode_2" placeholder="SE">&nbsp;(optional)</li>
    <li><label>Firstname</label><input type="text" name="Firstname_2" placeholder="Steve">&nbsp;(optional)</li>
    <li><label>LastName</label><input type="text" name="LastName_2" placeholder="Smith">&nbsp;(optional)</li>
    <li><label>Adress</label><input type="text" name="Adress_2" placeholder="Street 1, 12345 Barcelona">&nbsp;(optional)</li>
  </div>
  <br>
</td>
<?php
    break;
    case "ApproveWithdrawal":
    case "DenyWithdrawal":
?>
  <li><label>OrderID</label><input type="text" name="OrderID" placeholder="123456"></li>
</td>
  <td class="two">
  <h4>Attributes</h4>
    <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
  </td>
<?php
    break;

    case "ViewAutomaticSettlementDetailsCSV":
?>
  <li><label>SettlementDate</label><input type="date" name="SettlementDate" placeholder="2014-04-01"></li>
  <li><label>Currency</label><input type="text" name="Currency" placeholder="SEK"></li>
  <li>
    <label>APIVersion</label>
    <select name="APIVersion">&nbsp;(optional)
      <option selected></option>
      <option value="1.1" >1.1</option>
        <option value="1.2">1.2</option>
    </select>
  </li>
</td>
  <td class="two">
    <h4>Attributes</h4>
    <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
  </td>
<?php
    break;

    case "SelectAccount":
?>
  <li><label>NotificationURL</label><input type="text" name="NotificationURL" value="https://test.trustly.com/demo/notifyd_test"></li>
  <li><label>EndUserID</label><input type="text" name="EndUserID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label>MessageID</label><input type="text" name="MessageID" value="<?php echo rand(1,100000000) ?>"></li>
</td>
<td class="two">
  <h4>Attributes</h4>
  <li><label>Locale</label><input type="text" name="Locale" placeholder="en_US">&nbsp;(optional)</li>
  <li><label>Country</label><input type="text" name="Country" value="SE">&nbsp;(optional)</li>
  <li><label>IP</label><input type="text" name="IP" placeholder="83.140.44.184">&nbsp;(optional)</li>
  <li><label>SuccessURL</label><input type="text" name="SuccessURL" placeholder="https://trustly.com/thank_you.html">&nbsp;(optional)</li>
  <li><label>FailURL</label><input type="text" name="FailURL" value="https://trustly.com/payment_error.html">&nbsp;(optional)</li>
  <li><label>TemplateURL</label><input type="text" name="TemplateURL" placeholder="https://example.org/checkout_trustly.html">&nbsp;(optional)</li>
  <li>
    <label>URLTarget</label>
    <select name="URLTarget">&nbsp;(optional)
      <option selected></option>
      <option value="_self" >_SELF</option>
        <option value="_top">_TOP</option>
        <option value="_parent" >_PARENT</option>
    </select>

  </li>
  <li><label>MobilePhone</label><input type="text" name="MobilePhone" placeholder="+46709876543">&nbsp;(optional)</li>
  <li><label>Firstname</label><input type="text" name="Firstname" value="Steve"><span class="required">*</span></li>
  <li><label>Lastname</label><input type="text" name="Lastname" value="Smith"><span class="required">*</span></li>
  <li><label>NationalIdentificationNumber</label><input type="text" name="NationalIdentificationNumber" placeholder="790131-1234">&nbsp;(optional)</li>
  <li><label>UnchangeableNationalIdentificationNumber</label><input type="checkbox" value="1" name="UnchangeableNationalIdentificationNumber">&nbsp;(optional)</li>
  <li><label>DateOfBirth</label><input type="date" name="DateOfBirth" value="1990-01-20"><span class="required">*</span></li>
  <li><label>Email</label><input type="text" name="Email" value="test<?php echo rand(1,100000000) ?>@trustly.com"><span class="required">*</span></li>
  <li><label>RequestDirectDebitMandate</label><input type="checkbox" name="RequestDirectDebitMandate" value="1">&nbsp;(optional)</li>
  <li><label>DisableLocalisation</label><input type="checkbox" value="1" name="DisableLocalisation">&nbsp;(optional)</li>
  <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
</td>

<?php
    break;

    case "Charge":
?>
  <li><label>AccountID</label><input type="text" name="AccountID" placeholder="1774941262"></li>
  <li><label>NotificationURL</label><input type="text" name="NotificationURL" value="https://test.trustly.com/demo/notifyd_test"></li>
  <li><label>EndUserID</label><input type="text" name="EndUserID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label>MessageID</label><input type="text" name="MessageID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label>Amount</label><input type="text" name="Amount" value="101"></li>
  <li><label>Currency</label><input type="text" name="Currency" value="SEK"></li>
</td>
<td class="two">
  <h4>Attributes</h4>
  <li><label>ShopperStatement</label><input type="text" name="ShopperStatement" value="Sport Shop"></li>
  <li><label>Email</label><input type="text" name="Email" value="test<?php echo rand(1,100000000) ?>@trustly.com"></li>
  <li><label>PaymentDate</label><input type="date" name="PaymentDate"></li>
  <li><label>ExternalReference</label><input type="text"OCR placeholder="OCR" name="ExternalReference"></li>
  <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
</td>
<?php
    break;

    case "CancelCharge":
?>
  <li><label>OrderID</label><input type="text" name="OrderID" placeholder="123456"></li>
</td>
<td class="two">
  <h4>Attributes</h4>
  <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
</td>
<?php
    break;

    case "DirectDebitMandate":
?>
  <li><label>NotificationURL</label><input type="text" name="NotificationURL" value="https://test.trustly.com/demo/notifyd_test"></li>
  <li><label>EndUserID</label><input type="text" name="EndUserID" value="<?php echo rand(1,100000000) ?>"></li>
  <li><label>MessageID</label><input type="text" name="MessageID" value="<?php echo rand(1,100000000) ?>"></li>
</td>
<td class="two">
  <h4>Attributes</h4>
  <li><label>AccountID</label><input type="text" name="AccountID" placeholder="1774941262">&nbsp;(optional)</li>
  <li><label>MerchantReference</label><input type="text" name="MerchantReference" placeholder="MerchRef_001">&nbsp;(optional)</li>
  <li><label>Country</label><input type="text" name="Country" value="SE">&nbsp;(optional)</li>
  <li><label>Firstname</label><input type="text" name="Firstname" value="Steve"><span class="required">*</span></li>
  <li><label>Lastname</label><input type="text" name="Lastname" value="Smith"><span class="required">*</span></li>
  <li><label>Locale</label><input type="text" name="Locale" placeholder="en_US">&nbsp;(optional)</li>
  <li><label>Email</label><input type="text" name="Email" value="test<?php echo rand(1,100000000) ?>@trustly.com"><span class="required">*</span></li>
  <li><label>MobilePhone</label><input type="text" name="MobilePhone" placeholder="+46709876543">&nbsp;(optional)</li>
  <li><label>SuccessURL</label><input type="text" name="SuccessURL" placeholder="https://trustly.com/thank_you.html">&nbsp;(optional)</li>
  <li><label>FailURL</label><input type="text" name="FailURL" value="https://trustly.com/payment_error.html">&nbsp;(optional)</li>
  <li><label>AddressLine1</label><input type="text" name="AddressLine1" placeholder="Main street 1">&nbsp;(optional)</li>
  <li><label>AddressLine2</label><input type="text" name="AddressLine2" placeholder="Apartment 123, 2 stairs up">&nbsp;(optional)</li>
  <li><label>AddressCity</label><input type="text" name="AddressCity" placeholder="Stockholm">&nbsp;(optional)</li>
  <li><label>AddressPostalCode</label><input type="text" name="AddressPostalCode" placeholder="SE-11253">&nbsp;(optional)</li>
  <li><label>AddressCountry</label><input type="text" name="AddressCountry" placeholder="SE">&nbsp;(optional)</li>
  <li><label>URLScheme</label><input type="text" name="URLScheme" placeholder="yourCustomURLScheme://">&nbsp;(optional)</li>
  <li><label>DisableLocalisation</label><input type="checkbox" value="1" name="DisableLocalisation">&nbsp;(optional)</li>
  <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
<?php
    break;

    case "Balance":
?>
  <input type="hidden" name="UUID" value="<?php echo uuid() ?>">
  <h4>Press "Submit" to check balance for current merchant</h4>
</td>
<?php
    break;

    case "GetWithdrawals":
?>
  <li><label>OrderID</label><input type="text" name="OrderID" placeholder="123456"></li>
</td>
<td class="two">
  <h4>Attributes</h4>
  <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="15"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
</td>
<?php    
    break;

    case "AccountLedger":
?>
  <li><label>FromDate</label><input type="date" name="FromDate" placeholder="2018-05-30"></li>
  <li><label>ToDate</label><input type="date" name="ToDate" placeholder="2018-06-01"></li>
  <li><label>Currency</label><input type="text" name="Currency" placeholder="EUR"></li>
</td>
<td class="two">
  <h4>Attributes</h4>
  <li><label><input type="text" name="CustomAttributeKey" placeholder="Custom attribute key" size="5"></label><input type="text" name="CustomAttributeValue" placeholder="Custom attribute value">&nbsp;(optional)</li>
</td>
<?php
    break;

    case "GenerateSignature":
?>

  <label>Method</label>
    <select name="Method">
      <option value="Deposit">Deposit</option>
      <option value="Refund">Refund</option>
      <option value="SelectAccount">SelectAccount</option>
      <option value="RegisterAccount">RegisterAccount</option>
      <option value="Withdraw">Withdraw</option>
      <option value="AccountPayout">AccountPayout</option>
      <option value="Charge">Charge</option>
    </select>
</td>
<td class="two">
  <li><label>JSON Data Object</label><textarea name="JSON" rows="25" cols="50" placeholder="Paste JSON Data Object."></textarea></li>
</td>
<?php
    break;
  }
?>
  <input type="hidden" name="myAPICall" value="<?php echo $APICall ?>">
</tr>
</table>
  <input type="submit" name="Submit" value="Submit <?php if ($_SESSION["Environment"] == "https://api.trustly.com/1") echo "to LIVE" ?>" class="btn" />
  </form>
<?php
} elseif ( isset( $_POST['myAPICall'] ) ){
  $APICall = $_POST['myAPICall'];

  if (!empty($_POST['CustomAttributeValue']) and !empty($_POST['CustomAttributeKey'])) {
    $formFields['Attributes'][$_POST['CustomAttributeKey']] = $_POST['CustomAttributeValue'];
  }
  
  switch ($APICall) {
    case "Credentials":
      $_SESSION["Username"] = $_POST['Username'];
      $_SESSION["Password"] = $_POST['Password'];
      $_SESSION["Environment"] = $_POST['Environment'];
      $_SESSION["RSAKey"] = $_POST['RSAKey'];
      exit;
    break;
    case "GenerateSignature":
      $method = $_POST['Method'];
      $uuid = $_POST['UUID'];
      $formFields = json_decode($_POST['JSON'], true);
      $formFields['Username'] = $_SESSION["Username"];
      $formFields['Password'] = $_SESSION["Password"];
      $keypath = $_SESSION['RSAKey'];
      //echo $method . $uuid . serialize_data($formFields);
      $signature = onlySign($method, $uuid, $formFields, $keypath);
      print_r("<div class='callResult right'>-----Signature-----<br/>");
      print_r($signature);
      print_r("</div>");
      // echo serialize_data($formFields);
      exit;
    break;
    case "RegisterAccount":
      $Parameters = array('EndUserID','ClearingHouse','AccountNumber','BankNumber','Firstname','Lastname');
      $Attributes = array('DateOfBirth','MobilePhone','NationalIdentificationNumber','AddressCity','AddressCountry','AddressLine1','AddressLine2','AddressPostalCode','Email');
      $formFields['BankNumber'] = $_POST['BankNumber'];
    break;

    case "AccountPayout":
      $Parameters = array('Amount','AccountID','Currency','NotificationURL','EndUserID','MessageID');
      $SenderInformation = array('DateOfBirth_2','CountryCode_2','Firstname_2','LastName_2','Adress_2','Partytype_2');
    break;

    case "RegisterAccountPayout":
      $Parameters = array('EndUserID','ClearingHouse','AccountNumber','BankNumber','Firstname','Lastname','NotificationURL','MessageID','Amount','Currency');
      $Attributes = array('ShopperStatement', 'ExternalReference', 'PSPMerchant', 'PSPMerchantURL', 'MerchantCategoryCode', 'DateOfBirth', 'MobilePhone', 'NationalIdentificationNumber', 'AddressCountry', 'AddressPostalCode', 'AddressCity', 'AddressLine1', 'AddressLine2', 'Address', 'Email', 'CustomAttributeKey');
      $SenderInformation = array('Adress_2', 'CountryCode_2','CustomerID_2','DateOfBirth_2','Firstname_2','LastName_2', 'Partytype_2');
    break;

    case "Deposit":
      $Parameters = array('MessageID','EndUserID','NotificationURL');
      $Attributes = array('Currency','Firstname','Lastname','Email','Locale','SuggestedMinAmount','SuggestedMaxAmount','Amount','Country','IP','SuccessURL','FailURL','TemplateURL','URLTarget','MobilePhone','NationalIdentificationNumber','AccountID','UnchangeableNationalIdentificationNumber','ShopperStatement','ShippingAddressCountry','ShippingAddressPostalCode','ShippingAddressCity','ShippingAddressLine1','ShippingAddressLine2','ShippingAddress','ChargeAccountID','RequestDirectDebitMandate','QuickDeposit','HoldNotifications','RequestKYC','Method','PSPMerchant','MerchantCategoryCode','PSPMerchantURL','ExternalReference');
      $RecipientInformation = array('Partytype_2','Firstname_2','Lastname_2','CountryCode_2','CustomerID_2','Address_2','DateOfBirth_2');
    break;

    case "Refund":
      $Parameters = array('OrderID','Amount','Currency','Attributes');
      $Attributes = array('ExternalReference');
    break;

    case "Withdraw":
      $Parameters = array('NotificationURL','EndUserID','MessageID','Currency');
      $Attributes = array('Firstname','Lastname','Email','DateOfBirth','Locale','SuggestedAmount','SuggestedMinAmount','SuggestedMaxAmount','Country','IP','SuccessURL','FailURL','TemplateURL','URLTarget','ClearingHouse','BankNumber','AccountNumber','MobilePhone','NationalIdentificationNumber','UnchangeableNationalIdentificationNumber','AddressCountry', 'AddressPostalcode','AddressCity','AddressLine1','AddressLine2','Address','SuggestedAmount','HoldNotifications','PSPMerchant', 'Amount');
      $SenderInformation = array('DateOfBirth_2','CountryCode_2','Firstname_2','LastName_2','Adress_2','Partytype_2');
    break;

    case "ApproveWithdrawal":
    case "DenyWithdrawal":
      $Parameters = array('OrderID');
    break;

    case "ViewAutomaticSettlementDetailsCSV":
      $Parameters = array('SettlementDate','Currency');
      $Attributes = array('APIVersion');
    break;

    case "SelectAccount":
      $Parameters = array('NotificationURL','EndUserID','MessageID');
      $Attributes = array('Locale','Country','IP','SuccessURL','FailURL','TemplateURL','URLTarget','MobilePhone','Firstname','Lastname','NationalIdentificationNumber','UnchangeableNationalIdentificationNumber','DateOfBirth','Email','RequestDirectDebitMandate');
    break;

    case "Charge":
      $Parameters = array('AccountID','NotificationURL','EndUserID','MessageID','Amount','Currency');
      $Attributes = array('ShopperStatement','Email', 'PaymentDate','ExternalReference');
    break;

    case "CancelCharge":
      $Parameters = array('OrderID');
    break;

    case "DirectDebitMandate":
      $Parameters = array('NotificationURL','EndUserID','MessageID');
      $Attributes = array('AccountID','MerchantReference','Country','Firstname','Lastname','Locale','Email','MobilePhone','SuccessURL','FailURL','AddressLine1', 'AddressLine2', 'AddressCity', 'AddressPostalCode', 'AddressCountry', 'URLScheme', 'URLScheme', 'DisableLocalisation');
    break;

    case "Balance":
      $Parameters = array();
    break;

    case "GetWithdrawals":
      $Parameters = array('OrderID');
    break;

    case "AccountLedger":
      $Parameters = array('FromDate','ToDate','Currency');
    break;
  }
  if ($Parameters) {
    foreach($Parameters as $field) {
      if (!empty($_POST[$field])) {
        $formFields[$field] = $_POST[$field];
      }
    }
  }
  if (isset($Attributes)) {
    foreach($Attributes as $field) {
      if (!empty($_POST[$field])) {
        $formFields['Attributes'][$field] = $_POST[$field];
    }
  }
  } else { 
    $formFields['Attributes'] = null;
  }
  if (isset($SenderInformation)) {
    foreach($SenderInformation as $field) {
      if (!empty($_POST[$field])) {
        $trimmedField = rtrim($field,'_2');
        $formFields['Attributes']['SenderInformation'][$trimmedField] = $_POST[$field];
      }
    }
  }

  if (isset($RecipientInformation)) {
    foreach($RecipientInformation as $field) {
      if (!empty($_POST[$field])) {
        $trimmedField = rtrim($field,'_2');
        $formFields['Attributes']['RecipientInformation'][$trimmedField] = $_POST[$field];
      }
    }
  }

  if (isset($Recipients)) {
    foreach($Recipients as $field) {
      if (!empty($_POST[$field])) {
        $trimmedField = rtrim($field,'_2');
        $formFields['Attributes']['Recipients'][0][$trimmedField] = $_POST[$field];
      }
    }
  }
  $formFields['Username'] = $_SESSION["Username"];
  $formFields['Password'] = $_SESSION["Password"];
  $environment = $_SESSION["Environment"];
  $keypath = $_SESSION['RSAKey'];
  $uuid = $_POST['UUID'];
  $r = API($APICall,$formFields,$environment,$keypath,$uuid);
}
?>
</div>
</body>
</html>