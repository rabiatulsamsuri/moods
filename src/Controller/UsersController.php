<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }


// Login method
    public function login()
{
    if ($this->request->is('post')) {

        $username = $this->request->getData('username');
        $password = $this->request->getData('password');

        $user = $this->Users->find()
            ->where(['username' => $username])
            ->first();

        // POP UP KALAU USERNAME TAK SIGN UP
        if (!$user) {

            $this->Flash->error('Invalid username. Please Sign Up first!');

            return;
        }

        // POP UP KALAU PASSWORD SALAH
        if ($user->password !== $password) {

            $this->Flash->error('Invalid Password!');

            return;
        }

        // LOGIN BERJAYA
        $this->request->getSession()->write('Auth.User', $user);

        return $this->redirect([
            'controller' => 'MoodEntries',
            'action' => 'dashboard'
        ]);
    }
}

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        
        if (isset($this->Auth)) {
            $this->Auth->allow(['login']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: ['MoodEntries']);
        $this->set(compact('user'));
    }

    /**
     
* Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $user = $this->Users->newEmptyEntity();

    if ($this->request->is('post')) {
        $user = $this->Users->patchEntity($user, $this->request->getData());

        if ($this->Users->save($user)) {
            $this->Flash->success(__('Account created successfully. Please login first.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $this->Flash->error(__('Account could not be created. Please try again.'));
    }

    $this->set(compact('user'));
}

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // LogOut Method
public function logout()
{
    $this->request->getSession()->destroy();

    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
}
}