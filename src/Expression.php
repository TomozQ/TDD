<?php

require_once(dirname(__FILE__) ."/bank.php");

interface Expression
{
  public function reduce(Bank $bank, string $to);
}