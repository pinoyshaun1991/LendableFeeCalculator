<?php

namespace Lendable\Interview\Interpolation\Service\Fee;

use Lendable\Interview\Interpolation\Model\LoanApplication;

class FeeCalculator implements FeeCalculatorInterface
{
    private $term;
    private $amount;

    public function __construct()
    {
        $this->term   = 0;
        $this->amount = 0;
    }

    /**
     * Calculate the loan fee
     *
     * @param LoanApplication $application
     * @return float
     */
    public function calculate(LoanApplication $application): float
    {
        $this->term   = $application->getTerm();
        $this->amount = $application->getAmount();
        $fee          = round($this->amount/$this->term);
        $feePlusLoan  = $fee+$this->amount;

        /** If the fee plus the loan value is divisible by 5 **/
        if ($feePlusLoan % 5 == 0) {
            $returnedFee = $feePlusLoan-$this->amount;
        } else {
            /** Get the remainder amount and deduct that from the fee plus loan value and round that value  **/
            $feePlusLoan = (float)($feePlusLoan/5);
            $feePlusLoan = ($feePlusLoan-(int)$feePlusLoan)*5;
            $returnedFee = round($fee-$feePlusLoan);
        }

        return $returnedFee;
    }
}