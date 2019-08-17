<?php
require_once(__DIR__.'/../vendor/autoload.php');

use Lendable\Interview\Interpolation\Model\LoanApplication;
use Lendable\Interview\Interpolation\Service\Fee\FeeCalculator;

/** Wrap the logic in a try catch block **/
try {
    $calculator = new FeeCalculator();

    $application = new LoanApplication(24, 2750);
    $fee = $calculator->calculate($application);

    echo $fee;

} catch (Exception $e) {
    print $e->getMessage();
}