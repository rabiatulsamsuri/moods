<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FocusSessions Controller
 *
 * @property \App\Model\Table\FocusSessionsTable $FocusSessions
 */
class FocusSessionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
{
    $loginUser = $this->request->getSession()->read('Auth.User');

    if (!$loginUser) {
        return $this->redirect([
            'controller' => 'Users',
            'action' => 'login'
        ]);
    }

    $query = $this->FocusSessions->find()
        ->contain(['Users'])
        ->where([
            'FocusSessions.user_id' => $loginUser->id
        ]);

    $focusSessions = $this->paginate($query);

    $this->set(compact('focusSessions'));
}

    /**
     * View method
     *
     * @param string|null $id Focus Session id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $focusSession = $this->FocusSessions->get($id, contain: ['Users']);
        $this->set(compact('focusSession'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $focusSession = $this->FocusSessions->newEmptyEntity();

    if ($this->request->is('post')) {
        $focusSession = $this->FocusSessions->patchEntity(
            $focusSession,
            $this->request->getData()
        );

        $loginUser = $this->request->getSession()->read('Auth.User');

        if (!$loginUser) {
            $this->Flash->error('Please login first.');
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login'
            ]);
        }

        $focusSession->user_id = $loginUser->id;

        if ($this->FocusSessions->save($focusSession)) {
            $this->Flash->success(__('The focus session has been saved.'));

            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error(__('The focus session could not be saved. Please, try again.'));
    }

    $this->set(compact('focusSession'));
}

    /**
     * Edit method
     *
     * @param string|null $id Focus Session id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $focusSession = $this->FocusSessions->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $focusSession = $this->FocusSessions->patchEntity($focusSession, $this->request->getData());
            if ($this->FocusSessions->save($focusSession)) {
                $this->Flash->success(__('The focus session has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The focus session could not be saved. Please, try again.'));
        }
        $users = $this->FocusSessions->Users->find('list', limit: 200)->all();
        $this->set(compact('focusSession', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Focus Session id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $focusSession = $this->FocusSessions->get($id);
        if ($this->FocusSessions->delete($focusSession)) {
            $this->Flash->success(__('The focus session has been deleted.'));
        } else {
            $this->Flash->error(__('The focus session could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
