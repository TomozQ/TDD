<?php

use \PHPUnit\Framework\TestCase;

require_once(dirname(__FILE__) ."/../money.php");
require_once(dirname(__FILE__) ."/../bank.php");
require_once(dirname(__FILE__) ."/../sum.php");

class MoneyTest extends TestCase
{
  private static function castSum($obj): Sum
  {
    if (!$obj instanceof Sum) {
      throw new InvalidArgumentException("{$obj} is not instance of SumObject");
    }
    return $obj;
  }

  public function testMultiPlication()
  {
    $five = Money::dollar(5);
    $this->assertTrue((Money::dollar(10))->equals($five->times(2)));
    $this->assertTrue((Money::dollar(15))->equals($five->times(3)));
  }

  public function testEquality()
  {
    $this->assertTrue((Money::dollar(5))->equals(Money::dollar(5)));
    $this->assertFalse((Money::dollar(5))->equals(Money::dollar(6)));
    $this->assertFalse((Money::franc(5))->equals(Money::dollar(5)));
  }

  public function testCurrency()
  {
    $this->assertEquals("USD", Money::dollar(1)->currency());
    $this->assertEquals("CHF", Money::franc(1)->currency());
  }

  public function testSimpleAddition()
  {
    $five = Money::dollar(5);
    $sum = $five->plus($five);
    $bank = new Bank();
    $reduced = $bank->reduce($sum, "USD");
    $this->assertEquals(Money::dollar(10), $reduced);
  }

  public function testPlusReturnSum()
  {
    $five = Money::dollar(5);
    $result = $five->plus($five);
    $sum = self::castSum($result);
    $this->assertEquals($five, $sum->augend);
    $this->assertEquals($five, $sum->addend);
  }

  public function testReduceSum()
  {
    $sum = new Sum(Money::dollar(3), Money::dollar(4));
    $bank = new Bank();
    $result = $bank->reduce($sum, "USD");
    $this->assertEquals(Money::dollar(7), $result);
  }

  public function testReduceMoney()
  {
    $bank = new Bank();
    $result = $bank->reduce(Money::dollar(1), "USD");
    $this->assertEquals(Money::dollar(1), $result);
  }

  public function testReduceMoneyDifferentCurrency()
  {
    $bank = new Bank();
    $bank->addRate("CHF", "USD", 2);
    $result = $bank->reduce(Money::franc(2), "USD");
    $this->assertEquals(Money::dollar(1), $result);
  }

  public function testReduceMoneyDifferentCurrencyAddRateManyTimes()
  {
    $bank = new Bank();
    $bank->addRate("CHF", "USD", 3);
    $bank->addRate("CHF", "USD", 4);
    $bank->addRate("CHF", "USD", 2);
    $result = $bank->reduce(Money::franc(2), "USD");
    $this->assertEquals(Money::dollar(1), $result);
  }

  public function testIdentityRate()
  {
    $this->assertEquals(1, (new Bank())->rate("USD", "USD"));
  }

  public function testMixedAddition()
  {
    $fiveBucks = Money::dollar(5);
    $tenFrancs = Money::franc(10);
    $bank = new Bank();
    $bank->addRate("CHF", "USD", 2);
    $result = $bank->reduce($fiveBucks->plus($tenFrancs), "USD");
    $this->assertEquals(Money::dollar(10), $result);
  }

  public function testSumPlusMoney()
  {
    $fiveBucks = Money::dollar(5);
    $tenFrancs = Money::franc(10);
    $bank = new Bank();
    $bank->addRate("CHF", "USD", 2);
    $sum = (new Sum($fiveBucks, $tenFrancs))->plus($fiveBucks);
    $result = $bank->reduce($sum, "USD");
    $this->assertEquals(Money::dollar(15), $result);
  }
  
  public function testSumTimes()
  {
    $fiveBucks = Money::dollar(5);
    $tenFrancs = Money::franc(10);
    $bank = new Bank();
    $bank->addRate("CHF", "USD", 2);
    $sum = (new Sum($fiveBucks, $tenFrancs))->times(2);
    $result = $bank->reduce($sum, "USD");
    $this->assertEquals(Money::dollar(20), $result);
  }
}
