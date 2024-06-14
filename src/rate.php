<?php

require_once(dirname(__FILE__) . "/pair.php");

class Rate
{
  private Pair $pair;
  private int $rate;

  public function __construct(string $from, string $to, int $rate) {
    $this->pair = new Pair($from, $to);
    $this->rate = $rate;
  }

  public function pair()
  {
    return $this->pair;
  }

  public function rate()
  {
    return $this->rate;
  }
}