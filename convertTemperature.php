<?php
/*convertTemperature.php
===============================================================================
Project 1 ITC 250 Sum 18
Mike Wemigwans

Temperature conversion php application designed to provide for a means to enter
a numerical value.  Define what the numerical value represents in context of a
temperature measurement.  Provide three temperature measurement types to the
app client to choose from, with a defualt of Fahrenheit.  Provide three
temperature mesurement types for the numerical value to be converted to, with
a defualt of Celsius.  Provide the results back to the app client after the
number has been processed by temperature conversions functions defined where
the calucuation is used.
=============================================================================*/

echo "<h1>Temperature Converstion</h1>";

if(isset($_POST["inTempValue"])){
	//transfer form post data to vars
	$inTempValue = (double)$_POST["inTempValue"];

	$inTempType = $_POST["inTempType"];
	$convertTempType = $_POST["convertTempType"];
	//est var return
	$result;

	/*focus upon the conversion to temp type in switch
	then focus upon the input temp type in another switch*/
	switch ($convertTempType) {
		case 'Fahrenheit':
			
			switch ($inTempType) {
				case 'Celsius':
					//Celsius to Fahrenheit: F = C*9/5+32
					$result = ($inTempValue*9)/5+32;
					break;
				case 'Kelvin':
					//Kelvin to Fahrenheit: F = 9/5K - 459.67
					$result = 9/5*$inTempValue - 459.67;
				default:
					//Fahrenheit to Fahrenheit:  
					$result = $inTempValue;
					break;
			}//end inner switch
			break;//end case convert temp type as fahrenheit
		
		case 'Kelvin':

			switch ($inTempType) {
				case 'Celsius':
					//Celsius to Kelvin: K = C + 273.15
					$result = $inTempValue + 273.15;
					break;
				case 'Kelvin':
					//Kelvin to Kelvin 
					$result = $inTempValue;
				default:
					//Fahrenheit to Kelvin: K = 5/9(F + 459.67) 
					//$result = 5/9($inTempValue + 459.67);
					break;
			}//end inner switch
			break;//end case convert temp type as kelvin

		default://celsius

				switch ($inTempType) {
				case 'Celsius':
					//Celsius to Celsius
					$result = $inTempValue;
					break;
				case 'Kelvin':
					//Kelvin to Celsius: C = K - 273.15
					$result = $inTempValue - 273.15;
				default:
					//Fahrenheit to Celsius: C = ((F-32)*5)/9
					$result = (($inTempValue-32)*5)/9;
					break;
			}//end inner switch
			break;//end defualt convert temp type as celsius
	}//end outer switch

	//round result to two decimal places
	$result = round($result, 2);

	echo "The result of the conversion of $inTempValue from $inTempType to
		is $result as $convertTempType.";

}else{//show form
	echo '

	<p>Define a number as a temperature measurement value:</p>
	<form action="" method="post">
	<p>Temperature <input type = "text" name="inTempValue"/></p>
	<p>Define the type of temperature measurement the number is:</p>
	<p><input type="radio" name="inTempType" value="Fahrenheit" checked/> Fahrenheit</p>
	<p><input type="radio" name="inTempType" value="Celsius" /> Celsius</p>
	<p><input type="radio" name="inTempType" value="Kelvin" /> Kelvin</p>	
	<p>Define the type of temperature measurement to be converted to:</p>
	<p><input type="radio" name="convertTempType" value="Fahrenheit" /> Fahrenheit</p>
	<p><input type="radio" name="convertTempType" value="Celsius" checked/> Celsius</p>
	<p><input type="radio" name="convertTempType" value="Kelvin" /> Kelvin</p>
	<p><input type="submit" value="Convert Temperature" /></p>
	</form>
	';
}