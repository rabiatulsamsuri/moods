<div class="tasks-page">
    <div class="page-header">
        <div>
            <h1>Mood Entries</h1>
            <p>All mood records saved in database</p>
        </div>

        <?= $this->Html->link(
            'Back to Dashboard',
            ['controller' => 'MoodEntries', 'action' => 'dashboard'],
            ['class' => 'btn-primary-custom']
        ) ?>
    </div>

    <div class="task-card">
        <table class="task-table w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Mood Level</th>
                    <th>Entry Date</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($moodEntries as $moodEntry): ?>
                    <tr>
                        <td><?= h($moodEntry->id) ?></td>
                        <td><?= h($moodEntry->user_id) ?></td>
                        <td><?= h($moodEntry->mood_level) ?></td>
                        <td><?= h($moodEntry->entry_date) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>