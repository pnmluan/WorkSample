<?php

namespace Smartbox\WorkSample\Test\Unit\Helper;

use PHPUnit\Framework\TestCase;
use Smartbox\WorkSample\Helper\Palindrome as SubjectUnderTest;

/**
 * @coversDefaultClass  \Smartbox\WorkSample\Helper\Palindrome
 */
class PalindromeTest extends TestCase
{
    protected SubjectUnderTest $subject;

    /**
     * Set up
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->subject = new SubjectUnderTest();
    }

    public function getSamplePalindromeData(): \Generator
    {
        yield 'case-true-characters' => [
            'civic',
            true
        ];
        yield 'case-true-number' => [
            '123454321',
            true
        ];
        yield 'case-true-mixed' => [
            '123radar321',
            true
        ];
        yield 'case-false-empty-string' => [
            '',
            false
        ];
        yield 'case-false-number' => [
            '123054321',
            false
        ];
        yield 'case-false-characters' => [
            'iileveloo',
            false
        ];
        yield 'case-false-mixed' => [
            '123ra1lar321',
            false
        ];
    }

    /**
     * @dataProvider getSamplePalindromeData
     * @param string $str
     * @param bool $expected
     */
    public function testIsPalindrome(string $str, bool $expected): void
    {
        $this->assertEquals($expected, $this->subject->isPalindrome($str));
    }
}
