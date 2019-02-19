<?php

class Brackets
{
	protected $brackets = ['[' => ']', '<' => '>', '{' => '}', '(' => ')'];

	public function isCorrect($string)
	{
		$brackets = array_flip($this->brackets);
		$stack = [];
		$stackSize = 0;

		for ($i = 0; $i < strlen($string); $i++) {
			if (in_array($string{$i}, array_values($brackets))) {
				$stack[$stackSize++] = $string{$i};
			} else {
				if (in_array($string{$i}, array_keys($brackets))) {
					$last = $stackSize ? $stack[$stackSize - 1] : '';
					if ($last != $brackets[$string{$i}]) {
						return false;
					} else {
						unset($stack[--$stackSize]);
					}
				}
			}
		}
		return count($stack) == 0;

	}
}

$brackets = new Brackets();

var_dump($brackets->isCorrect('()[{(<>)}][{}]{}'));
