<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<div class="task-view-page">

    <div class="task-view-card">

        <div class="task-view-header">
            <div>
                <span class="task-view-label">Task Details</span>
                <h2><?= h($task->title) ?></h2>
                <p>View complete information for this task</p>
            </div>

            <div class="task-view-actions">
                <?= $this->Html->link('← Back', ['action' => 'index'], ['class' => 'btn-view-back']) 
                ?>
                
            </div>
        </div>

        <div class="task-detail-grid">

            <div class="detail-box">
                <span>User</span>
                <strong><?= $task->hasValue('user') ? h($task->user->username) : '-' ?></strong>
            </div>

            <div class="detail-box">
                <span>Title</span>
                <strong><?= h($task->title) ?></strong>
            </div>

            <div class="detail-box">
                <span>Category</span>
                <strong><?= h($task->category) ?></strong>
            </div>

            <div class="detail-box">
                <span>Status</span>
                <strong><?= h($task->status) ?></strong>
            </div>

            <div class="detail-box">
                <span>Due Date</span>
                <strong><?= h($task->due_date) ?></strong>
            </div>

            <div class="detail-box">
                <span>Created</span>
                <strong><?= h($task->created) ?></strong>
            </div>

        </div>

    </div>

</div>