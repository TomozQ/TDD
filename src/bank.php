<?php

require_once(dirname(__FILE__) ."/money.php");
require_once(dirname(__FILE__) ."/sum.php");
require_once(dirname(__FILE__) ."/pair.php");
require_once(dirname(__FILE__) ."/rate.php");
class Bank
{
  private $rates;

  public function __construct() {
    $this->rates = array();
  }

  public function reduce(Expression $source, string $to): Money
  {
    return $source->reduce($this, $to);
  }

  public function addRate(string $from, string $to, int $rate)
  {
    $rateChange = false;
    $target = null;

    foreach($this->rates as $index => $val) {
      if ($val->pair()->from() === $from && $val->pair()->to()) {
        $rateChange = true;
        $target = $index;
      }
    }

    if ($rateChange) {
      unset($this->rates[$target]);
      $this->rates = array_values($this->rates);
    }

    $this->rates[] = new Rate($from, $to, $rate);
  }

  public function rate(string $from, string $to)
  {
    if ($from === $to) return 1;

    foreach($this->rates as $rate) {
      if ($rate->pair()->from() === $from && $rate->pair()->to() === $to) {
        return $rate->rate();
      }
    }
  }
}