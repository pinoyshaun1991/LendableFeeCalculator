<?php

declare(strict_types=1);

namespace Lendable\Interview\Interpolation\Model;

use Exception;

/**
 * A cut down version of a loan application containing
 * only the required properties for this test.
 */
class LoanApplication
{
    /**
     * @var int
     */
    private $term;

    /**
     * @var float
     */
    private $amount;

    /**
     * Array of term periods
     *
     * @var array
     */
    private $terms = array(
        12,
        24
    );

    /**
     * LoanApplication constructor.
     * @param int $term
     * @param float $amount
     * @throws Exception
     */
    public function __construct(int $term, float $amount)
    {
        $this->term   = $this->setTerm($term);
        $this->amount = $this->setAmount($amount);
    }

    /**
     * @param $term
     * @return int
     * @throws Exception
     */
    public function setTerm($term)
    {
        /** Check whether the term variable is a correct data type and is either 12 or 24 **/
        if (!is_int($term) || !in_array($term, $this->terms)) {
            throw new Exception('Term value needs to be a number and set to either 12 or 24 months');
        }

        return $this->term = $term;
    }

    /**
     * Gets the term for this loan application expressed
     * in number of months.
     *
     * @return int
     */
    public function getTerm(): int
    {
        return $this->term;
    }

    /**
     * @param $amount
     * @return float
     * @throws Exception
     */
    public function setAmount($amount)
    {
        /** Check whether the amount variable is a correct data type and within range between 1000 and 20000 **/
        if (!is_float($amount) || ($amount < 1000 || $amount > 20000)) {
            throw new Exception('Amount value needs to be of a float datatype, the value must fall between 1000 and 20000');
        }

        return $this->amount = (float)number_format($amount, 2, '.', '');
    }

    /**
     * Gets the amount requested for this loan application.
     *
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }
}
