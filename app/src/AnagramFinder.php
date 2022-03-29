<?php

namespace App\Src;

use App\Src\CharacterSorter;

class AnagramFinder
{
    /**
     * @param string[] $words
     *
     * @return string[][]
     */
    public function findAnagrams(array $words): array
    {
        $sorter = new CharacterSorter();

        /** @var string[][] $potentialAnagrams */
        $potentialAnagrams = [];

        foreach ($words as $word) {
            $sortedCharacters = $sorter->sort($word);
            if (!isset($potentialAnagrams[$sortedCharacters])) {
                $potentialAnagrams[$sortedCharacters] = [];
            }
            $potentialAnagrams[$sortedCharacters][] = $word;
        }

        $anagrams = array_filter($potentialAnagrams, static function (array $words): bool {
            return count($words) > 1;
        });

        return array_values($anagrams);
    }
}