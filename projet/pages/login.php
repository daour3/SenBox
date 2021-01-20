<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252"><title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="login_files/w3.css">
</head><body>

<header class="w3-container w3-teal">
  <h1>Login Example</h1>
</header>

<div class="w3-container w3-half w3-margin-top">

<form class="w3-container w3-card-4">

<p>
<input class="w3-input" style="width:90%" required="" type="text">
<label>Name</label></p>
<p>
<input class="w3-input" style="width:90%" required="" type="password">
<label>Password</label></p>

<p>
<input class="w3-radio" name="gender" value="male" checked="checked" type="radio">
<label>Male</label></p>

<p>
<input class="w3-radio" name="gender" value="female" type="radio">
<label>Female</label></p>

<p>
<input class="w3-radio" name="gender" value="" disabled="disabled" type="radio">
<label>Don't know (Disabled)</label></p>

<p>
<input id="milk" class="w3-check" checked="checked" type="checkbox">
<label>Stay logged in</label></p>

<p>
<button class="w3-button w3-section w3-teal w3-ripple"> Log in </button></p>

</form>

</div>


 </body></html>