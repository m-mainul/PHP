<?php


class SleptYearsPassData {

    public $hoursSleptperNight = 8;
    public $myAge = 54;

    public function clacSleptYears($a_hoursSleptperNight, $a_myAge)
    {
        $sleptYears = ($a_myAge * $a_hoursSleptperNight)/24;
        return $sleptYears;
    }

}


//Execute Code Using the Class
$mySleptYearsPassData = new SleptYearsPassData();
$rtnVal = $mySleptYearsPassData->clacSleptYears($mySleptYearsPassData->myAge,$mySleptYearsPassData->hoursSleptperNight);
print "You have slept $rtnVal years of your life away!";