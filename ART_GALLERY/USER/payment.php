<?php
include_once("header.php");
$rid=$_GET['reqid'];
$amount=$_GET['amount'];
?>

<style>

body{
background:#ddd;
min-height:100vh;
display:flex;
align-items:center;
justify-content:center;
font-family:Arial;
}

.card{
width:600px;
padding:3rem 3.5rem;
background:white;
box-shadow:0 6px 20px rgba(0,0,0,0.19);
border-radius:8px;
}

.card-title{
font-weight:700;
font-size:2.2em;
text-align:center;
margin-bottom:20px;
}

.nav{
display:flex;
justify-content:center;
}

.nav ul{
list-style:none;
display:flex;
gap:20px;
margin-bottom:30px;
padding:0;
}

.nav li a{
color:black;
text-decoration:none;
}

.active{
border-bottom:2px solid black;
font-weight:bold;
}

input{
border:none;
outline:none;
width:100%;
background:transparent;
font-size:14px;
height:30px;
}

.row-1{
border:1px solid rgba(0,0,0,0.15);
padding:10px;
border-radius:6px;
background:rgba(221,228,236,0.3);
margin-top:10px;
}

.row-2{
padding:0 8px;
}

#card-header{
font-weight:bold;
font-size:14px;
}

#card-inner{
font-size:12px;
color:gray;
}

/* FIELD ALIGNMENT */

.three{
display:flex;
gap:10px;
margin-top:10px;
}

.field{
flex:1;
border:1px solid rgba(0,0,0,0.15);
padding:10px;
border-radius:6px;
background:rgba(221,228,236,0.3);
display:flex;
flex-direction:column;
justify-content:center;
}

.btn{
width:100%;
background:rgb(65,202,127);
color:white;
padding:14px;
margin-top:25px;
border:none;
border-radius:6px;
font-size:16px;
cursor:pointer;
}

.btn:hover{
background:rgb(52,180,110);
}

</style>



<div class="card">

<div class="card-title">
Settings
</div>

<div class="nav">
<ul>
<li><a href="#">Account</a></li>
<li class="active"><a href="#">Payment</a></li>
</ul>
</div>

<form action="paymentaction.php" method="POST" onsubmit="return validatePayment()">

<span id="card-header">CARD DETAILS:</span>

<div class="row-1">
<div class="row-2">
<span id="card-inner">Card holder name</span>
</div>

<div class="row-2">
<input type="text" id="cardname" name="cardname" placeholder="Card holder name" required>
</div>
</div>


<div class="row-1">
<div class="row-2">
<span id="card-inner">Total Amount</span>
</div>

<div class="row-2">
<input type="text" value="<?php echo $amount; ?>" readonly>
</div>
</div>


<div class="three">

<div class="field">
<span id="card-inner">Card Number</span>
<input type="text" id="cardnum2" placeholder="5134 5264 1234" maxlength="12" required>
</div>

<div class="field">
<span id="card-inner">Expiry Date</span>
<input type="month" id="expdate" required>
</div>

<div class="field">
<span id="card-inner">CVV</span>
<input type="password" id="cvv" placeholder="CVV" maxlength="3" required>
</div>

</div>


<input type="hidden" name="amount" value="<?php echo $amount; ?>">
<input type="hidden" name="requestid" value="<?php echo $rid; ?>">

<button class="btn" type="submit" name="Submit">
<b>Payment</b>
</button>

</form>

</div>



<script>

function validatePayment(){

let card=document.getElementById("cardnum2").value.replace(/\s/g,'');
let name=document.getElementById("cardname").value;
let exp=document.getElementById("expdate").value;
let cvv=document.getElementById("cvv").value;

if(card.length!=12 || isNaN(card)){
alert("Enter valid 12 digit card number");
return false;
}

if(!/^[a-zA-Z ]+$/.test(name)){
alert("Card holder name must contain only letters");
return false;
}

if(exp==""){
alert("Please select expiry date");
return false;
}

if(cvv.length!=3 || isNaN(cvv)){
alert("Enter valid 3 digit CVV");
return false;
}

return true;

}

</script>