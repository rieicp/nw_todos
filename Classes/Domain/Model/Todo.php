<?php
namespace NWInt\NwTodos\Domain\Model;

/***
 *
 * This file is part of the "Todos Listing" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Ning Wei <ning.wei@int-trade.de>, NW Int Trading
 *
 ***/

/**
 * Todo
 */
class Todo extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * detail
     *
     * @var string
     */
    protected $detail = '';

    /**
     * ordering
     *
     * @var int
     */
    protected $ordering = 0;

    /**
     * dueStartTime
     *
     * @var \DateTime
     */
    protected $dueStartTime = null;

    /**
     * dueEndTime
     *
     * @var \DateTime
     */
    protected $dueEndTime = null;

    /**
     * mustDo
     *
     * @var bool
     */
    protected $mustDo = false;

    /**
     * finished
     *
     * @var bool
     */
    protected $finished = false;

    /**
     * category
     *
     * @var int
     */
    protected $category = 0;

    /**
     * links
     *
     * @var int
     */
    protected $links = 0;

    /**
     * files
     *
     * @var int
     */
    protected $files = 0;

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the detail
     *
     * @return string $detail
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Sets the detail
     *
     * @param string $detail
     * @return void
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
    }

    /**
     * Returns the ordering
     *
     * @return int $ordering
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * Sets the ordering
     *
     * @param int $ordering
     * @return void
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;
    }

    /**
     * Returns the dueStartTime
     *
     * @return \DateTime $dueStartTime
     */
    public function getDueStartTime()
    {
        return $this->dueStartTime;
    }

    /**
     * Sets the dueStartTime
     *
     * @param \DateTime $dueStartTime
     * @return void
     */
    public function setDueStartTime(\DateTime $dueStartTime)
    {
        $this->dueStartTime = $dueStartTime;
    }

    /**
     * Returns the dueEndTime
     *
     * @return \DateTime $dueEndTime
     */
    public function getDueEndTime()
    {
        return $this->dueEndTime;
    }

    /**
     * Sets the dueEndTime
     *
     * @param \DateTime $dueEndTime
     * @return void
     */
    public function setDueEndTime(\DateTime $dueEndTime)
    {
        $this->dueEndTime = $dueEndTime;
    }

    /**
     * Returns the mustDo
     *
     * @return bool $mustDo
     */
    public function getMustDo()
    {
        return $this->mustDo;
    }

    /**
     * Sets the mustDo
     *
     * @param bool $mustDo
     * @return void
     */
    public function setMustDo($mustDo)
    {
        $this->mustDo = $mustDo;
    }

    /**
     * Returns the boolean state of mustDo
     *
     * @return bool
     */
    public function isMustDo()
    {
        return $this->mustDo;
    }

    /**
     * Returns the finished
     *
     * @return bool $finished
     */
    public function getFinished()
    {
        return $this->finished;
    }

    /**
     * Sets the finished
     *
     * @param bool $finished
     * @return void
     */
    public function setFinished($finished)
    {
        $this->finished = $finished;
    }

    /**
     * Returns the boolean state of finished
     *
     * @return bool
     */
    public function isFinished()
    {
        return $this->finished;
    }

    /**
     * Returns the category
     *
     * @return int $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category
     *
     * @param int $category
     * @return void
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Returns the links
     *
     * @return int $links
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Sets the links
     *
     * @param int $links
     * @return void
     */
    public function setLinks($links)
    {
        $this->links = $links;
    }

    /**
     * Returns the files
     *
     * @return int $files
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Sets the files
     *
     * @param int $files
     * @return void
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }
}
