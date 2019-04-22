<?php
namespace NWInt\NwTodos\Controller;

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
 * TodoController
 */
class TodoController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * todoRepository
     *
     * @var \NWInt\NwTodos\Domain\Repository\TodoRepository
     * @inject
     */
    protected $todoRepository = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     */
    protected $pm;

    public function initializeAction()
    {
        $this->pm = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager::class);
    }

    public function setItemsOrderingAction(): string
    {
        $parameters = $this->request->getArguments();

        foreach ($parameters['items'] as $k => $v) {
            $uid = $parameters['items'][$k]['todo_uid'];
            $todo = $this->todoRepository->findByUid($uid);
            $todo->setOrdering(intval($parameters['items'][$k]['todo_ordering']));
            $this->todoRepository->update($todo);
        }

        $this->pm->persistAll();

        return json_encode(array('message' => 'Success! tx_nwtodos_tasklisting :: setting ordering - it works!'));
    }

    public function correctifyAllOrderingAction()
    {
        $allTodos = $this->todoRepository->findAll();
        for ($i = 0; $i < $allTodos->count(); $i++) {
            $allTodos[$i]->setOrdering($i);
            $this->todoRepository->update($allTodos[$i]);
        }

        $this->pm->persistAll();
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $this->correctifyAllOrderingAction();

        $todos = $this->todoRepository->findCertainTodos($this->settings);

        $this->view->assign('todos', $todos);
        $this->view->assign('pageid', $GLOBALS['TSFE']->id);
    }

    /**
     * action show
     *
     * @param \NWInt\NwTodos\Domain\Model\Todo $todo
     * @return void
     */
    public function showAction(\NWInt\NwTodos\Domain\Model\Todo $todo)
    {
        $this->view->assign('todo', $todo);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \NWInt\NwTodos\Domain\Model\Todo $newTodo
     * @return void
     */
    public function createAction(\NWInt\NwTodos\Domain\Model\Todo $newTodo)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->todoRepository->add($newTodo);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \NWInt\NwTodos\Domain\Model\Todo $todo
     * @ignorevalidation $todo
     * @return void
     */
    public function editAction(\NWInt\NwTodos\Domain\Model\Todo $todo)
    {
        $this->view->assign('todo', $todo);
    }

    /**
     * action update
     *
     * @param \NWInt\NwTodos\Domain\Model\Todo $todo
     * @return void
     */
    public function updateAction(\NWInt\NwTodos\Domain\Model\Todo $todo)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->todoRepository->update($todo);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \NWInt\NwTodos\Domain\Model\Todo $todo
     * @return void
     */
    public function deleteAction(\NWInt\NwTodos\Domain\Model\Todo $todo)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->todoRepository->remove($todo);
        $this->redirect('list');
    }

}
