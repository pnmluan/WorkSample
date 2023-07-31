<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Helper;

class Palindrome
{
    public function isPalindrome(string $str): bool
    {
        $length = strlen($str);
        if (!$length) {
            return false;
        }
        $left = 0;
        $right = $length - 1;

        while ($left < $right) {
            if ($str[$left] !== $str[$right]) {
                return false; // If characters don't match, it's not a palindrome
            }
            $left++;
            $right--;
        }

        return true;
    }
}
