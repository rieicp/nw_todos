<?php
namespace NWInt\NwTodos\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Ning Wei <ning.wei@int-trade.de>
 */
class TodoControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \NWInt\NwTodos\Controller\TodoController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\NWInt\NwTodos\Controller\TodoController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllTodosFromRepositoryAndAssignsThemToView()
    {

        $allTodos = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $todoRepository = $this->getMockBuilder(\NWInt\NwTodos\Domain\Repository\TodoRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $todoRepository->expects(self::once())->method('findAll')->will(self::returnValue($allTodos));
        $this->inject($this->subject, 'todoRepository', $todoRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('todos', $allTodos);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenTodoToView()
    {
        $todo = new \NWInt\NwTodos\Domain\Model\Todo();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('todo', $todo);

        $this->subject->showAction($todo);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenTodoToTodoRepository()
    {
        $todo = new \NWInt\NwTodos\Domain\Model\Todo();

        $todoRepository = $this->getMockBuilder(\NWInt\NwTodos\Domain\Repository\TodoRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $todoRepository->expects(self::once())->method('add')->with($todo);
        $this->inject($this->subject, 'todoRepository', $todoRepository);

        $this->subject->createAction($todo);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenTodoToView()
    {
        $todo = new \NWInt\NwTodos\Domain\Model\Todo();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('todo', $todo);

        $this->subject->editAction($todo);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenTodoInTodoRepository()
    {
        $todo = new \NWInt\NwTodos\Domain\Model\Todo();

        $todoRepository = $this->getMockBuilder(\NWInt\NwTodos\Domain\Repository\TodoRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $todoRepository->expects(self::once())->method('update')->with($todo);
        $this->inject($this->subject, 'todoRepository', $todoRepository);

        $this->subject->updateAction($todo);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenTodoFromTodoRepository()
    {
        $todo = new \NWInt\NwTodos\Domain\Model\Todo();

        $todoRepository = $this->getMockBuilder(\NWInt\NwTodos\Domain\Repository\TodoRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $todoRepository->expects(self::once())->method('remove')->with($todo);
        $this->inject($this->subject, 'todoRepository', $todoRepository);

        $this->subject->deleteAction($todo);
    }
}
