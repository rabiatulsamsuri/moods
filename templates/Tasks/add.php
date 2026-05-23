<div class="tasks-add-page">
    <div class="task-form-card">

        <div class="d-flex justify-content-between align-items-start mb-5">
            <div>
                <h2>Create New Task</h2>
                <p>Organize your productivity beautifully</p>
            </div>

            <?= $this->Html->link(
                '← Back',
                ['action' => 'index'],
                ['class' => 'btn-back']
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
                        'Completed' => 'Completed'
                    ],
                    'empty' => 'Choose Status',
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

        <div class="text-end mt-4">
            <?= $this->Form->button('Create Task', [
                'class' => 'btn-create-task'
            ]) ?>
        </div>

        <?= $this->Form->end() ?>

    </div>

</div>