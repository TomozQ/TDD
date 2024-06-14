<?php

class Pair
{
  private string $from;
  private string $to;

  public function __construct(string $from, string $to) {
    $this->from = $from;
    $this->to = $to;
  }

  private static function cast($obj): self
  {
    if (!$obj instanceof self) {
      throw new InvalidArgumentException("{$obj} is not instance of MoneyObject");
    }
    return $obj;
  }

  public function from()
  {
    return $this->from;
  }
  public function to()
  {
    return $this->to;
  }

  public function equals(object $object): bool
  {
    $pair = $this::cast($object);
    return $this->from === $pair->from && $this->to === $pair->to;
  }

  public function hasCode()
  {
    return 0;
  }
}