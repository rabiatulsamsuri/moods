<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FocusSession $focusSession
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <div class="edit-task-page">

    <div class="edit-task-card">

        <div class="d-flex justify-content-between align-items-center mb-5">

            <div>
                <h1>Edit Pomodoro</h1>
                <p>Update your focus session</p>
            </div>

            <?= $this->Html->link(
                '← Back',
                ['action' => 'index'],
                ['class' => 'btn-back-task']
            ) ?>

        </div>

        <?= $this->Form->create($focusSession) ?>

        <div class="row g-4">
            <div class="col-md-6">
                <?= $this->Form->control('activity_name', [
                    'label' => ['class' => 'custom-label'],
                    'class' => 'form-control custom-input',
                    'placeholder' => 'Enter activity name..'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('category', [
                    'type' => 'select',
                    'options' => [
                        'Deep Work' => 'Deep Work',
                        'Study' => 'Study',
                        'Assignment' => 'Assignment'
                    ],
                    'empty' => 'Choose Category',
                    'label' => ['class' => 'custom-label'],
                    'class' => 'form-select custom-input'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('duration_minutes', [
                    'type' => 'select',
                    'options' => [
                        25 => 'Pomodoro Focus (25 min)',
                        5 => 'Short Break (5 min)',
                        15 => 'Long Break (15 min)',
                        45 => 'Deep Focus (45 min)',
                        60 => 'Study Session (60 min)'
                    ],
                    'empty' => 'Choose Session Type',
                    'label' => ['text' => 'Duration Minutes', 'class' => 'custom-label'],
                    'class' => 'form-select custom-input'
                ]); ?>
            </div>

            <div class="col-2">
                <?= $this->Form->control('session_date', [
                    'type' => 'date',
                    'label' => ['text' => 'Session Date', 'class' => 'custom-label'],
                    'class' => 'form-control custom-input'
                ]); ?>
            </div>

        </div>

        <div class="d-flex justify-content-between align-items-center mt-5">

            <?= $this->Form->button(
                '<i class="bi bi-check2-circle me-2"></i> Update Task',
                [
                    'escapeTitle' => false,
                    'class' => 'btn-update-task'
                ]
            ) ?>

        </div>

        <?= $this->Form->end() ?>

    </div>
</div>