<!DOCTYPE html>
<head><title>Mohamed Ibrahim MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a four digit pin and check all 10,000 possible four digit PINs to determine the PIN
</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
$TotalChecks=0;
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];

    // This is our alphabet
    $txt = "0123456789";
    $show = 15;

    // Outer loop go go through the alphabet for the
    // first position in our "possible" pre-hash
    // text
    for($i=0; $i<strlen($txt); $i++ ) {
        $digit1 = $txt[$i];
        for($j=0; $j<strlen($txt); $j++ ) {
            $digit2 = $txt[$j];
                for($a=0;$a<strlen($txt);$a++){
                    $digit3 = $txt[$a];
                        for($b=0;$b<strlen($txt);$b++){
                            $digit4 = $txt[$b];
                            $try = $digit1 . $digit2.$digit3.$digit4;
                            $TotalChecks++; 
                            $check = hash('md5', $try);
                            if ($check == $md5) {
                                $goodtext = $try;
                                break;   // Exit the inner loop
                            }

                            // Debug output until $show hits 0
                            if ($show > 0) {
                                print "$check $try\n";
                                $show = $show - 1;
                            }
                        }
                }
            
        }
    }
    // Compute elapsed time
    $time_post = microtime(true);
    print "Total Chicks: ";
    print $TotalChecks;
    print "\n";
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<p>Original Text: <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="40" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
</ul>
</body>
</html>
