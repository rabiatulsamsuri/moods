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
                <span class="task-view-label">Pomodoro Details</span>
                <h2><?= h($focusSession->activity_name) ?></h2>
                <p>View complete information for this focus session</p>
            </div>

            <div class="task-view-actions">
                <?= $this->Html->link('← Back', ['action' => 'index'], ['class' => 'btn-view-back']) 
                ?>
            </div>
        </div>

        <div class="task-detail-grid">

            <div class="detail-box">
                <span>Activity Name</span>
                <strong><?= h($focusSession->activity_name) ?></strong>
            </div>

            <div class="detail-box">
                <span>Category</span>
                <strong><?= h($focusSession->category) ?></strong>
            </div>

            <div class="detail-box">
                <span>Id</span>
                <strong><?= h($focusSession->id) ?></strong>
            </div>

            <div class="detail-box">
                <span>Duration Minutes</span>
                <strong><?= h($focusSession->duration_minutes) ?></strong>
            </div>

            <div class="detail-box">
                <span>Session Date</span>
                <strong><?= h($focusSession->session_date) ?></strong>
            </div>

            <div class="detail-box">
                <span>Created</span>
                <strong><?= h($focusSession->created) ?></strong>
            </div>
        </div>
    </div>
</div>