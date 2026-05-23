<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\AppController;
use Cake\I18n\FrozenDate;

/**
 * MoodEntries Controller
 *
 * @property \App\Model\Table\MoodEntriesTable $MoodEntries
 */
class MoodEntriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

// BASED DARI TEMPLATES/MOODENTRIES/INDEX.PHP
    public function index()
{
    $loginUser = $this->request->getSession()->read('Auth.User');

    if (!$loginUser) {
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    $moodEntries = $this->MoodEntries->find()
        ->where(['MoodEntries.user_id' => $loginUser->id])
        ->orderBy(['MoodEntries.entry_date' => 'DESC']);

    $moodEntries = $this->paginate($moodEntries);

    $this->set(compact('moodEntries'));
}

    /**
     * View method
     *
     * @param string|null $id Mood Entry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $moodEntry = $this->MoodEntries->get($id, contain: ['Users']);
        $this->set(compact('moodEntry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $moodEntry = $this->MoodEntries->newEmptyEntity();
        if ($this->request->is('post')) {
            $moodEntry = $this->MoodEntries->patchEntity($moodEntry, $this->request->getData());
            if ($this->MoodEntries->save($moodEntry)) {
                $this->Flash->success(__('The mood entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mood entry could not be saved. Please, try again.'));
        }
        $users = $this->MoodEntries->Users->find('list', limit: 200)->all();
        $this->set(compact('moodEntry', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mood Entry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $moodEntry = $this->MoodEntries->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $moodEntry = $this->MoodEntries->patchEntity($moodEntry, $this->request->getData());
            if ($this->MoodEntries->save($moodEntry)) {
                $this->Flash->success(__('The mood entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mood entry could not be saved. Please, try again.'));
        }
        $users = $this->MoodEntries->Users->find('list', limit: 200)->all();
        $this->set(compact('moodEntry', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mood Entry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $moodEntry = $this->MoodEntries->get($id);
        if ($this->MoodEntries->delete($moodEntry)) {
            $this->Flash->success(__('The mood entry has been deleted.'));
        } else {
            $this->Flash->error(__('The mood entry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

 // GENERATE CARTA  
    public function dashboard()
    {
        $this->viewBuilder()->setLayout('dashboard');

        $loginUser = $this->request->getSession()->read('Auth.User');

        if (!$loginUser) {
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login'
            ]);
        }

        $tasksTable = $this->fetchTable('Tasks');
        $focusSessionsTable = $this->fetchTable('FocusSessions');

        $totalTasks = $tasksTable->find()
            ->where(['user_id' => $loginUser->id])
            ->count();

        $completedTasks = $tasksTable->find()
            ->where(['user_id' => $loginUser->id, 'status' => 'Completed'])
            ->count();

        $focusTotal = $focusSessionsTable->find()
            ->select([
                'total_minutes' => $focusSessionsTable->find()->func()->sum('duration_minutes')
            ])
            ->where(['user_id' => $loginUser->id])
            ->first();

        $totalFocusMinutes = (int)($focusTotal->total_minutes ?? 0);

        $totalMoodEntries = $this->MoodEntries->find()
            ->where(['user_id' => $loginUser->id])
            ->count();

        $moodEntries = $this->MoodEntries->find()
            ->where(['user_id' => $loginUser->id])
            ->all();

        $pendingTasks = $tasksTable->find()
            ->where(['user_id' => $loginUser->id, 'status' => 'Pending'])
            ->count();

        $inProgressTasks = $tasksTable->find()
            ->where(['user_id' => $loginUser->id, 'status' => 'In Progress'])
            ->count();

        $completedTasksChart = $completedTasks;

        $greatMood = $this->MoodEntries->find()
            ->where(['user_id' => $loginUser->id, 'mood_level' => 5])
            ->count();

        $goodMood = $this->MoodEntries->find()
            ->where(['user_id' => $loginUser->id, 'mood_level' => 4])
            ->count();

        $okayMood = $this->MoodEntries->find()
            ->where(['user_id' => $loginUser->id, 'mood_level' => 3])
            ->count();

        $badMood = $this->MoodEntries->find()
            ->where(['user_id' => $loginUser->id, 'mood_level <=' => 2])
            ->count();

        $moodTrendQuery = $this->MoodEntries->find();

// CARTA MOOD LEVEL 
        $moodTrendData = $this->MoodEntries->find()
    ->where([
        'user_id' => $loginUser->id,
        'DATE(entry_date)' => date('Y-m-d')
    ])
    ->orderBy(['entry_date' => 'ASC'])
    ->toArray();

    $moodTrendLabels = [];
    $moodTrendValues = [];

    foreach ($moodTrendData as $mood) {
        $moodTrendLabels[] = date('h:i A', strtotime((string)$mood->entry_date));
        $moodTrendValues[] = (int)$mood->mood_level;
    }

        $focusQuery = $focusSessionsTable->find();
        $focusData = $focusQuery
            ->select([
                'category',
                'total_minutes' => $focusQuery->func()->sum('duration_minutes')
            ])
            ->where(['user_id' => $loginUser->id])
            ->groupBy('category')
            ->toArray();

        $focusLabels = [];
        $focusMinutes = [];

        foreach ($focusData as $data) {
            $focusLabels[] = $data->category ?? 'Unknown';
            $focusMinutes[] = (int)$data->total_minutes;
        }

        $dayQuery = $focusSessionsTable->find();
        $focusByDay = $dayQuery
            ->select([
                'day' => $dayQuery->newExpr()->add('DAYNAME(session_date)'),
                'total_minutes' => $dayQuery->func()->sum('duration_minutes')
            ])
            ->where(['user_id' => $loginUser->id])
            ->groupBy($dayQuery->newExpr()->add('DAYNAME(session_date)'))
            ->toArray();

        $dayLabels = [];
        $dayMinutes = [];

        foreach ($focusByDay as $day) {
            $dayLabels[] = $day->day ? substr($day->day, 0, 3) : 'Unk';
            $dayMinutes[] = (int)$day->total_minutes;
        }

        $this->set(compact(
            'moodEntries',
            'loginUser',
            'focusLabels',
            'focusMinutes',
            'dayLabels',
            'dayMinutes',
            'totalTasks',
            'completedTasks',
            'totalFocusMinutes',
            'totalMoodEntries',
            'pendingTasks',
            'inProgressTasks',
            'completedTasksChart',
            'greatMood',
            'goodMood',
            'okayMood',
            'badMood',
            'moodTrendLabels',
            'moodTrendValues'
        ));
    }

    public function saveMood()
{
    $this->request->allowMethod(['post']);

    $moodEntry = $this->MoodEntries->newEmptyEntity();

    $loginUser = $this->request->getSession()->read('Auth.User');

    $moodEntry->user_id = $loginUser->id;

    $moodEntry->mood_level = $this->request->getData('mood_level');

    // sebab database kau TAK BOLEH NULL
    $moodEntry->stress_level = 'Sederhana';

    $moodEntry->entry_date = date('Y-m-d');

    if ($this->MoodEntries->save($moodEntry)) {

        $this->Flash->success('Mood tracked successfully!');
    } else {

        $this->Flash->error('Failed to save mood.');
    }

    return $this->redirect([
        'controller' => 'MoodEntries',
        'action' => 'dashboard'
    ]);
}

   public function quickAdd()
{
    $this->request->allowMethod(['post']);
    $this->autoRender = false;

    $loginUser = $this->request->getSession()->read('Auth.User');

    $moodLevel = $this->request->getData('mood_level');

    $moodEntry = $this->MoodEntries->newEmptyEntity();

    $moodEntry->user_id = $loginUser->id;
    $moodEntry->mood_level = (int)$moodLevel;
    $moodEntry->entry_date = date('Y-m-d H:i:s');

    if ($this->MoodEntries->save($moodEntry)) {

        $totalMood = $this->MoodEntries->find()
            ->where(['user_id' => $loginUser->id])
            ->count();

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'success' => true,
                'totalMood' => $totalMood
            ]));
    }

    return $this->response
        ->withType('application/json')
        ->withStringBody(json_encode([
            'success' => false,
            'errors' => $moodEntry->getErrors()
        ]));
}
}


