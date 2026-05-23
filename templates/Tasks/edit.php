<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <div class="edit-task-page">

    <div class="edit-task-card">

        <div class="d-flex justify-content-between align-items-center mb-5">

            <div>
                <h1>Edit Task</h1>
                <p>Update your task information beautifully</p>
            </div>

            <?= $this->Html->link(
                '← Back',
                ['action' => 'index'],
                ['class' => 'btn-back-task']
            ) ?>

        </div>

        <?= $this->Form->create($task) ?>

        <div class="row g-4">

            <div class="col-md-6">
                <?= $this->Form->control('title', [
                    'label' => ['class' => 'custom-label'],
                    'class' => 'form-control custom-input',
                    'placeholder' => 'Enter task title...'
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
                <?= $this->Form->control('status', [
                    'type' => 'select',
                    'options' => [
                        'Pending' => 'Pending',
                        'In Progress' => 'In Progress',
                        'Completed' => 'Completed',
                    ],
                    'empty' => 'Choose Status..',
                    'label' => ['class' => 'custom-label'],
                    'class' => 'form-select custom-input'
                ]) ?>
            </div>

            <div class="col-2">
                <?= $this->Form->control('due_date', [
                    'type' => 'date',
                    'label' => ['class' => 'custom-label'],
                    'class' => 'form-control custom-input'
                ]) ?>
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