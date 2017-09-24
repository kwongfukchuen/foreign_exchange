<html>
<head></head>
<body>
<form action="index.php" method="GET">
	<select name="opt_from_c">
	  <option value="AUD">AUD</option>
	  <option value="BGN">BGN</option>
	  <option value="BRL">BRL</option>
	  <option value="CHF">CHF</option>
	  <option value="CAD">CAD</option>
	  <option value="CNY">CNY</option>
	  <option value="GBP">GBP</option>
	  <option value="JPY">JPY</option>
	  <option value="RUB">RUB</option>
	  <option value="SEK">SEK</option>
	  <option value="DKK">DKK</option>
	  <option value="EUR">EUR</option>
	</select>
	<input type="text" name="form_q">
	<select name="opt_to_c">
	  <option value="AUD">AUD</option>
	  <option value="BGN">BGN</option>
	  <option value="BRL">BRL</option>
	  <option value="CHF">CHF</option>
	  <option value="CAD">CAD</option>
	  <option value="CNY">CNY</option>
	  <option value="GBP">GBP</option>
	  <option value="JPY">JPY</option>
	  <option value="RUB">RUB</option>
	  <option value="SEK">SEK</option>
	  <option value="DKK">DKK</option>
	  <option value="EUR">EUR</option>
	</select>
	<input type="submit" name="sbm_enter">
</form>
</body>
</html>

<?php
if(isset($_GET['sbm_enter'])){
	$url = 'http://api.fixer.io/latest?base=' . $_GET['opt_from_c'];

	$curl = curl_init();

	curl_setopt_array($curl, array(
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL => $url,
	    CURLOPT_USERAGENT => ''
	));

	$resp = curl_exec($curl);
	$decoded = json_decode($resp);
	$rate = $decoded->rates->$_GET['opt_to_c'];
	echo (float) $_GET['form_q'] * $rate;
	curl_close($curl);
}



?>
