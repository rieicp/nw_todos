<?php
namespace NWInt\NwTodos\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Ning Wei <ning.wei@int-trade.de>
 */
class TodoTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \NWInt\NwTodos\Domain\Model\Todo
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \NWInt\NwTodos\Domain\Model\Todo();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDetailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDetail()
        );
    }

    /**
     * @test
     */
    public function setDetailForStringSetsDetail()
    {
        $this->subject->setDetail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'detail',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDueStartTimeReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDueStartTime()
        );
    }

    /**
     * @test
     */
    public function setDueStartTimeForDateTimeSetsDueStartTime()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDueStartTime($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'dueStartTime',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDueEndTimeReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDueEndTime()
        );
    }

    /**
     * @test
     */
    public function setDueEndTimeForDateTimeSetsDueEndTime()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDueEndTime($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'dueEndTime',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMustDoReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getMustDo()
        );
    }

    /**
     * @test
     */
    public function setMustDoForBoolSetsMustDo()
    {
        $this->subject->setMustDo(true);

        self::assertAttributeEquals(
            true,
            'mustDo',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFinishedReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getFinished()
        );
    }

    /**
     * @test
     */
    public function setFinishedForBoolSetsFinished()
    {
        $this->subject->setFinished(true);

        self::assertAttributeEquals(
            true,
            'finished',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCategoryReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getCategory()
        );
    }

    /**
     * @test
     */
    public function setCategoryForIntSetsCategory()
    {
        $this->subject->setCategory(12);

        self::assertAttributeEquals(
            12,
            'category',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLinksReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getLinks()
        );
    }

    /**
     * @test
     */
    public function setLinksForIntSetsLinks()
    {
        $this->subject->setLinks(12);

        self::assertAttributeEquals(
            12,
            'links',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFilesReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function setFilesForIntSetsFiles()
    {
        $this->subject->setFiles(12);

        self::assertAttributeEquals(
            12,
            'files',
            $this->subject
        );
    }
}
