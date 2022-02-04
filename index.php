<!DOCTYPE html>
<html lang='en-us'>
  <head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
		<meta name="keywords" content="calculator">
		<meta name="description" content="">
		<title>hjpCalc</title>
    <link href="main.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
		<a id="title" href="index.php">
			<header>
				<h1>hjpCalc</h1>
			</header>
		</a>
		<main>
			<article id='welcome'>
				<h2>Welcome to hjpCalc!</h2>
				<p>hjpCalc is an online calculator for all your calculating needs. Why is it called "hjpCalc"? hjpCalc is made primarily using HTML, JavaScript, and PHP (H, J, and P). Keep in mind that throughout this site, you can only use whole numbers (positive, negative, and zero) unless otherwise specified.</p>
			</article>
			<article id='all-calcs'>
				<h2>Calc List (Alphabetical)</h2>
				<ul>
					<li><a href=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "#division-remainder"; ?>>Division with Remainder (division-remainder)</a></li>
					<li><a href=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "#quadratic-zeroes"; ?>>Zeroes of a Quadratic (quadratic-zeroes)</a></li>
				</ul>
				<h2 id='division-remainder'>All Calcs</h2>
				<h3>Division with Remainder (division-remainder)</h3>
				<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="get">
					Dividend: <input type="number" name="dividend" value=<?php $a=$_GET["dividend"]; if($dividend==""){echo 0;} else{echo $dividend;} ?> class="text-input"><br>
					Divisor: <input type="number" name="divisor" value=<?php $b=$_GET["divisor"]; if($divisor==""){echo 0;} else{echo $divisor;} ?> class="text-input"><br>
					<input type="submit" value="Calculate">
				</form>
				<span class='result'>
					<?php
						$dividend = $_GET["dividend"];
						$divisor = $_GET["divisor"];
						if ($divisor == 0) {
							echo "undefined";
						} elseif ($dividend == 0) {
							echo 0;
						} elseif ($dividend == $divisor) {
							echo 1;
						} else {
							$quotient = strval(floor($dividend/$divisor));
							$remainder = $dividend%$divisor;
							$remainder = strval($remainder);
							if ($remainder === 0) {
								$final = $quotient;
							} else {
								$final = $quotient . " " . $remainder . "/" . strval($divisor);
							}
							echo $final;
						}
					?>
				</span>
				<p class="explain">This Calc takes a dividend and a divisor, divides the dividend by the divisior, and returns the result as a mixed number. <span class="code">undefined</span> is returned when you attempt to divide by 0. If you get a whole number, your fraction was divided evenly with no remainder. Otherwise, you will get a mixed number in the form of <span class="code">X Y/Z</span>.</p>
				<h3 id='quadratic-zeroes'>Zeroes of a Quadratic (quadratic-zeroes)</h3>
				<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="get">
					a: <input type="number" name="a" value=<?php $a=$_GET["a"]; if($a==""){echo 0;} else{echo $a;} ?> class="text-input"><br>
					b: <input type="number" name="b" value=<?php $b=$_GET["b"]; if($b==""){echo 0;} else{echo $b;} ?> class="text-input"><br>
					c: <input type="number" name="c" value=<?php $c=$_GET["c"]; if($c==""){echo 0;} else{echo $c;} ?> class="text-input"><br>
					<input type="submit" value="Calculate">
				</form>
				<span class="result">
					<?php
						$a = intval($_GET["a"]);
						$b = intval($_GET["b"]);
						$c = intval($_GET["c"]);
						$discriminant = $b**2 - (4*$a*$c);
						$minusResult = ($b*-1 - sqrt($discriminant)) / 2*$a;
						$plusResult = ($b*-1 + sqrt($discriminant)) / 2*$a;
						$minusResultString = strval($minusResult);
						$plusResultString = strval($plusResult);
						$finalString = $plusResultString . ", " . $minusResultString;
						if ($plusResultString == "NAN" and $minusResultString == "NAN") {
							echo "No zeroes";
						} else if ($plusResultString == $minusResultString) {
							echo "One zero: " . $plusResultString;
						} else {
							echo $finalString;
						}
					?>
				</span>
				<p class="explain">This Calc finds the zeroes (x-intercepts) for any quadratic equation. It takes an <span class="code">a</span>, <span class="code">b</span>, and <span class="code">c</span> value and returns the zeroes. If there are none, the value returned will be <span class="code">No zeroes</span>. If you get your number preceded with <span class="code">One zero:</span>, then there is only one x-intercept. If there are two numbers, then your quadratic has two zeroes.</p>
			</article>
    </main>
  </body>
</html>
