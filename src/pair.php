<?php

class Pair
{
  private string $from;
  private string $to;

  public function __construct(string $from, string $to) {
    $this->from = $from;
    $this->to = $to;
  }
}