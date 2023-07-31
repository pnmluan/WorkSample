<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Helper;

class MatrixRotation
{
    public function rotateNinetyClockwise(array &$matrix): void
    {
        $n = count($matrix); // Get the size of the square matrix

        // Traverse each cycle
        for ($row = 0; $row < $n/2; $row++) {
            for ($column = $row; $column < $n - 1 - $row; $column++) {
                $temp = $matrix[$row][$column];

                $matrix[$row][$column] = $matrix[$n - 1 - $column][$row];

                $matrix[$n - 1 - $column][$row] = $matrix[$n - 1 - $row][$n - 1 - $column];

                $matrix[$n - 1 - $row][$n - 1 - $column] = $matrix[$column][$n - 1 - $row];

                $matrix[$column][$n - 1 - $row] = $temp;
            }
        }
    }
}
