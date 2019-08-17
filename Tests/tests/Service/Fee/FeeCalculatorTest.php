<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lendable\Interview\Interpolation\Service\Fee\FeeCalculator;
use Lendable\Interview\Interpolation\Model\LoanApplication;

class FeeCalculatorTest extends TestCase
{
    /**
     * @dataProvider calculateProvider
     *
     * @param $term
     * @param $amount
     * @param $expected
     * @throws ReflectionException
     */
    public function testCalculate($term, $amount, $expected): void
    {
        $mock = $this->getMockBuilder(LoanApplication::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mock->expects($this->once())
             ->method('setTerm')
             ->with($this->equalTo($term));

        $mock->expects($this->once())
            ->method('setAmount')
            ->with($this->equalTo($amount));

        $reflectedLoanClass = new ReflectionClass(LoanApplication::class);
        $constructor = $reflectedLoanClass->getConstructor();
        $constructor->invoke($mock, $term, $amount);


        $mockedClass = $this->createMock(FeeCalculator::class);
        $mockedClass->method('calculate')
                    ->willReturn($expected);

        $this->assertEquals($expected, $mockedClass->calculate($mock));
    }

    public function calculateProvider()
    {
        return [
            [24, 2750, 115],
            [12, 10000, 830],
            [12, 19000, 1580]
        ];
    }
}
