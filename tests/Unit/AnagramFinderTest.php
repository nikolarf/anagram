<?php

namespace Tests\Unit;

use App\Src\AnagramFinder;
use PHPUnit\Framework\TestCase;

class AnagramFinderTest extends TestCase
{
    private AnagramFinder $subject;

    protected function setUp(): void
    {
        $this->subject = new AnagramFinder();
    }

    /**
     * @test
     */
    public function findAnagramsForEmptyArrayReturnsEmptyArray(): void
    {
        self::assertSame(
            [],
            $this->subject->findAnagrams([])
        );
    }

    /**
     * @test
     */
    public function findAnagramsForArrayWithOneWordsReturnsEmptyArray(): void
    {
        self::assertSame(
            [],
            $this->subject->findAnagrams(['iphone'])
        );
    }

    /**
     * @test
     */
    public function findAnagramsForArrayWithTwoNonAnagramsReturnsEmptyArray(): void
    {
        self::assertSame(
            [],
            $this->subject->findAnagrams(['ios', 'android'])
        );
    }

    /**
     * @test
     */
    public function findAnagramsForTwoAnagramWordsReturnsArrayWithBothWords(): void
    {
        $anagrams = ['one', 'neo'];

        self::assertSame(
            [$anagrams],
            $this->subject->findAnagrams($anagrams)
        );
    }
}
