<?php

namespace Tests\Unit;

/**
 * This class can sort characters.
 */
class CharacterSorter
{
    public function sort(string $unsortedString): string
    {
        $explodedString = str_split($unsortedString);
        sort($explodedString);

        return trim(implode($explodedString), '\' ');
    }
}