<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FocusSession $focusSession
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>


<div class="tasks-add-page">
    <div class="task-form-card">

        <div class="d-flex justify-content-between align-items-start mb-5">
            <div>
                <h2>Create Pomodoro Session</h2>
                <p>Record your focus session beautifully</p>
            </div>

            <?= $this->Html->link(
                '← Back',
                ['action' => 'index'],
                ['class' => 'btn-back']
            ) ?>
        </div>

        <?= $this->Form->create($focusSession) ?>

        <div class="row g-4">

            <div class="col-md-6">
                <?= $this->Form->control('activity_name', [
                    'label' => ['text' => 'Activity Name', 'class' => 'custom-label'],
                    'class' => 'form-control custom-input',
                    'placeholder' => 'Enter activity name...'
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $this->Form->control('category', [
                    'type' => 'select',
                    'options' => [
                        'Deep Work' => 'Deep Work',
                        'Study' => 'Study',
                        'Meeting' => 'Meeting',
                    ],
                    'empty' => 'Choose Category',
                    'label' => ['text' => 'Category', 'class' => 'custom-label'],
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
                ]) ?>
            </div>

            <div class="col-2">
                <?= $this->Form->control('session_date', [
                    'type' => 'date',
                    'label' => ['text' => 'Session Date', 'class' => 'custom-label'],
                    'class' => 'form-control custom-input'
                ]) ?>
            </div>

        </div>

        <div class="text-end mt-4">
            <?= $this->Form->button('Create Session', [
                'class' => 'btn-create-task'
            ]) ?>
        </div>

        <?= $this->Form->end() ?>

    </div>
</div>