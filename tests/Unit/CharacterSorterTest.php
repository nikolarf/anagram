<?php
declare(strict_types=1);

namespace Tests\Unit;

use App\Src\CharacterSorter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \OliverKlee\CodeKata\CharacterSorter
 */
final class CharacterSorterTest extends TestCase
{
    private CharacterSorter $subject;

    protected function setUp(): void
    {
        $this->subject = new CharacterSorter();
    }

    /**
     * @test
     */
    public function sortForEmptyStringReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->sort('')
        );
    }

    /**
     * @test
     */
    public function sortForOneCharacterReturnsThatCharacter(): void
    {
        self::assertSame(
            'h',
            $this->subject->sort('h')
        );
    }

    /**
     * @test
     */
    public function sortForPresortedCharactersReturnsSortedCharacters(): void
    {
        self::assertSame(
            'ab',
            $this->subject->sort('ab')
        );
    }

    /**
     * @test
     */
    public function sortForTwoUnsortedCharactersReturnsTwoSortedCharacters(): void
    {
        self::assertSame(
            'ab',
            $this->subject->sort('ba')
        );
    }

    /**
     * @test
     */
    public function sortWithWhitespaceInsideDiscardsTheWhitespace(): void
    {
        self::assertSame(
            'ab',
            $this->subject->sort('b a')
        );
    }

    /**
     * @test
     */
    public function sortForTwiceTheSameCharacterShouldReturnTheCharacterTwice(): void
    {
        self::assertSame(
            'aa',
            $this->subject->sort('aa')
        );
    }

    /**
     * @test
     */
    public function sortForCharsWithApostropheRemovesApostrophe(): void
    {
        self::assertSame(
            'aa',
            $this->subject->sort('a\'a')
        );
    }
}