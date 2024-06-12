<?php

interface Expression
{
  public function reduce(string $to);
}