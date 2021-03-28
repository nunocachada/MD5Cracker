<!DOCTYPE html>
<head>
<title>Nuno Cachada MD5 Cracker</title>
</head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a four-digit pin attempts to hash all four-digit combinations
to determine the original pin.</p>
<pre>
Debug Output:
<?php
$gtext = "Not found";

// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // These are our numbers
    $txtArray = ["0","1","2","3","4","5","6","7","8","9"];
    $show = 15;


    /**
     * Outer loop to go through the alphabet for the
     * first position in our "possible" pre-hash
     * text
     */
    foreach ($txtArray as $num1) {
        $ch1 = $num1;// First 
            foreach ($txtArray as $num2) {
                $ch2 = $num2;// Second 
                 foreach ($txtArray as $num3) {
                      $ch3 = $num3;// Third
                    foreach ($txtArray as $num4) {
                      $ch4 = $num4;// Fouth 

                    // Concatenate all characters together to 
                    // form the "possible" pre-hash text
                    $try = $ch1.$ch2.$ch3.$ch4;

                    // Run the hash and then check to see if we match
                    $check = hash('md5', $try);
                    if ( $check == $md5 ) {
                        $gtext = $try;
                        break;   // Exit the inner loop
                    }
                    // Debug output until $show hits 0
                    if ( $show > 0 ) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }
                }
            }
        }
    }
    // Compute ellapsed time
    $time_post = microtime(true);
    print "Ellapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>Original Text: <?= htmlentities($gtext); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="codemaker.php">MD5 Code Maker</a></li>
<li><a
href="https://github.com/csev/wa4e/tree/master/code/crack"
target="_blank">Original code from Building Web Applications in PHP</a></li>
</ul>
</body>
</html>