<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lendable\Interview\Interpolation\Model\LoanApplication;

class LoanApplicationTest extends TestCase
{
    /**
     * @dataProvider termProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testSetTerm($parameter, $expectedMessage): void
    {
        $reflector = new \ReflectionClass(LoanApplication::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setTerm');
        $method->setAccessible(true);

        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function termProvider()
    {
        return [
            ['Testing', 'Term value needs to be a number and set to either 12 or 24 months'],
            [0, 'Term value needs to be a number and set to either 12 or 24 months'],
            [36, 'Term value needs to be a number and set to either 12 or 24 months'],
            [-12, 'Term value needs to be a number and set to either 12 or 24 months'],
            [-24, 'Term value needs to be a number and set to either 12 or 24 months']
        ];
    }

    /**
     * @dataProvider termWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function testSetTermWithoutException($parameter, $expected): void
    {
        $mockedClass = $this->createMock(LoanApplication::class);
        $mockedClass->method('setTerm')
            ->willReturn($expected);

        $this->assertEquals($expected, $mockedClass->setTerm($parameter));
    }

    public function termWithoutExceptionProvider()
    {
        return [
            [12, 12],
            [24, 24]
        ];
    }

    public function testGetTerm(): void
    {
        $mockedClass = $this->createMock(LoanApplication::class);
        $mockedClass->method('getTerm')
            ->willReturn(1);

        $this->assertEquals(1, $mockedClass->getTerm());
    }

    /**
     * @dataProvider amountProvider
     *
     * @param $parameter
     * @param $expectedMessage
     * @throws ReflectionException
     */
    public function testSetAmount($parameter, $expectedMessage): void
    {
        $reflector = new \ReflectionClass(LoanApplication::class);
        $instance  = $reflector->newInstanceWithoutConstructor();
        $method    = $reflector->getMethod('setAmount');
        $method->setAccessible(true);

        $this->expectExceptionMessage($expectedMessage);
        $method->invoke($instance, $parameter);
    }

    public function amountProvider()
    {
        return [
            ['Testing', 'Amount value needs to be of a float datatype, the value must fall between 1000 and 20000'],
            [0, 'Amount value needs to be of a float datatype, the value must fall between 1000 and 20000'],
            [999, 'Amount value needs to be of a float datatype, the value must fall between 1000 and 20000'],
            [-1000, 'Amount value needs to be of a float datatype, the value must fall between 1000 and 20000'],
            [20001, 'Amount value needs to be of a float datatype, the value must fall between 1000 and 20000'],
            [-20000, 'Amount value needs to be of a float datatype, the value must fall between 1000 and 20000']
        ];
    }

    /**
     * @dataProvider amountWithoutExceptionProvider
     *
     * @param $parameter
     * @param $expected
     * @throws Exception
     */
    public function testSetAmountWithoutException($parameter, $expected): void
    {
        $mockedClass = $this->createMock(LoanApplication::class);
        $mockedClass->method('setAmount')
            ->willReturn($expected);

        $this->assertEquals($expected, $mockedClass->setAmount($parameter));
    }

    public function amountWithoutExceptionProvider()
    {
        return [
            [1000, 1000],
            [20000, 20000]
        ];
    }

    public function testGetAmount(): void
    {
        $mockedClass = $this->createMock(LoanApplication::class);
        $mockedClass->method('getAmount')
            ->willReturn(1000);

        $this->assertEquals(1000, $mockedClass->getAmount());
    }
}
