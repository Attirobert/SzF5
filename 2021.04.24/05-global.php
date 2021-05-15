<?php
$user1 = "Judit";
$user2 = "István";
$user3 = "János";

foreach ($GLOBALS as $kulcs => $ertek) {
    if (gettype($ertek) == "array") {
        print "$kulcs == <br>";
        foreach ($ertek as $tombelem) {
            if (gettype($tombelem) != "array") print "............$tombelem<br>";
        }
    } else print "\$GLOBALS[\"$kulcs\"] == $ertek<br>";
}

print $_SERVER["HTTP_USER_AGENT"] . "<br>";
print $_SERVER["PHP_SELF"] . "<br>";
print $_SERVER["REMOTE_ADDR"] . "<br>";
print $_SERVER["QUERY_STRING"] . "<br>";
print $_SERVER["REQUEST_URI"] . "<br>";
