<?php

namespace Smartbox\WorkSample\Test\Unit\Helper;

use PHPUnit\Framework\TestCase;
use Smartbox\WorkSample\Helper\MatrixRotation as SubjectUnderTest;

/**
 * @coversDefaultClass  \Smartbox\WorkSample\Helper\MatrixRotation
 */
class MatrixRotationTest extends TestCase
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

    public function getSampleMatrixData(): \Generator
    {
        yield 'matrix-2x2' => [
            [
                [1, 2],
                [3, 4]
            ],
            [
                [3, 1],
                [4, 2]
            ]
        ];

        yield 'matrix-3x3' => [
            [
                [1, 2, 3],
                [4, 5, 6],
                [7, 8, 9]
            ],
            [
                [7, 4, 1],
                [8, 5, 2],
                [9, 6, 3]
            ]
        ];
        yield 'matrix-4x4' => [
            [
                [1,  2,  3,   4],
                [5,  6,  7,   8],
                [9,  10, 11, 12],
                [13, 14, 15, 16]
            ],
            [
                [13, 9,  5, 1],
                [14, 10, 6, 2],
                [15, 11, 7, 3],
                [16, 12, 8, 4]
            ]
        ];
    }

    /**
     * @dataProvider getSampleMatrixData
     * @param array $matrix
     * @param array $expected
     */
    public function testRotateNinetyClockwise(array $matrix, array $expected): void
    {
        $this->subject->rotateNinetyClockwise($matrix);
        $this->assertEquals($expected, $matrix);
    }
}
