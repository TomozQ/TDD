<?php

class Franc{
  private int $amount;

  public function __construct(int $amount)
  {
    $this->amount = $amount;
  }

  public function times(int $multiplier)
  {
    return new Franc($this->amount * $multiplier);
  }

  public function equals(object $object)
  {
    $franc = $this::cast($object);
    return $this->amount === $franc->amount;
  }

  public static function cast($obj): self
  {
    if (!$obj instanceof self) {
      throw new InvalidArgumentException("{$obj} is not instance of FrancObject");
    }
    return $obj;
  }
}