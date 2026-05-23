<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Task> $tasks
 */
?>
<div class="tasks-page">

    <div class="page-header">
        <div>
            <h1>Tasks</h1>
            <p>Manage all student task records</p>
        </div>

        <?= $this->Html->link(
            '<i class="bi bi-plus-lg"></i> New Task',
            ['action' => 'add'],
            ['class' => 'btn btn-primary-custom', 'escape' => false]
        ) ?>
    </div>

<!-- FILTER BUTTON SEARCH/ CATEGORY/ STATUS -->
    <div class="filter-card">
    <?= $this->Form->create(null, [
        'type' => 'get',
        'id' => 'taskFilterForm'
    ]) ?>

    <div class="row g-3 align-items-center">

        <div class="col-md-4">
            <div class="search-input">
                <i class="bi bi-search"></i>
                <?= $this->Form->control('search', [
                    'label' => false,
                    'placeholder' => 'Search by task title...',
                    'value' => $this->request->getQuery('search')
                ]) ?>
            </div>
        </div>

        <div class="col-md-3">
            <?= $this->Form->control('category', [
                'label' => false,
                'empty' => 'All Categories',
                'options' => [
                    'Deep Work' => 'Deep Work',
                    'Study' => 'Study',
                    'Meeting' => 'Meeting',
                    'Assignment' => 'Assignment'
                ],
                'value' => $this->request->getQuery('category'),
                'class' => 'form-select auto-filter'
            ]) ?>
        </div>

        <div class="col-md-3">
            <?= $this->Form->control('status', [
                'label' => false,
                'empty' => 'All Status',
                'options' => [
                    'Pending' => 'Pending',
                    'In Progress' => 'In Progress',
                    'Completed' => 'Completed'
                ],
                'value' => $this->request->getQuery('status'),
                'class' => 'form-select auto-filter'
            ]) ?>
        </div>

        <div class="col-md-2">
        <?= $this->Html->link(
            '<i class="bi bi-x-circle"></i> Reset',
            ['action' => 'index'],
            [
                'class' => 'btn-reset',
                'escape' => false
            ]
        ) ?>
        </div>

    </div>

    <?= $this->Form->end() ?>
</div>

<script>
document.querySelectorAll('.auto-filter').forEach(function(select) {
    select.addEventListener('change', function() {
        document.getElementById('taskFilterForm').submit();
    });
});
</script>

    <div id="task-list-section" class="task-card">

        <div class="table-responsive">
            <table class="table task-table align-middle">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id', 'id') ?></th>
                        <th><?= $this->Paginator->sort('user_id', 'User') ?></th>
                        <th><?= $this->Paginator->sort('title', 'Title') ?></th>
                        <th><?= $this->Paginator->sort('category', 'Category') ?></th>
                        <th><?= $this->Paginator->sort('status', 'Status') ?></th>
                        <th><?= $this->Paginator->sort('due_date', 'Due Date') ?></th>
                        <th><?= $this->Paginator->sort('created', 'Created') ?></th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($tasks as $key => $task): ?>
                    <tr>
                        <td><?= $this->Number->format($this->Paginator->counter('{{start}}') + $key) ?></td>

                        <td>
                            <span class="user-pill">
                                <i class="bi bi-person-circle"></i>
                                <?= $task->hasValue('user') ? h($task->user->username) : h($task->user_id) ?>
                            </span>
                        </td>

                        <td class="fw-semibold">
                            <?= h($task->title) ?>
                        </td>

                        <td>
                            <span class="badge-category">
                                <?= h($task->category) ?>
                            </span>
                        </td>

                        <td>
                            <?php
                                $statusClass = match ($task->status) {
                                    'Pending' => 'status-pending',
                                    'In Progress' => 'status-progress',
                                    'Completed' => 'status-completed',
                                    default => 'status-default'
                                };
                            ?>

                            <span class="status-badge <?= $statusClass ?>">
                                <?= h($task->status) ?>
                            </span>
                        </td>

                        <td>
                            <i class="bi bi-calendar3 me-1"></i>
                            <?= h($task->due_date) ?>
                        </td>

                        <td>
                            <?= h($task->created) ?>
                        </td>

                        <td class="text-center">
                            <div class="action-buttons">
                                <?= $this->Html->link(
                                    '<i class="bi bi-eye"></i>',
                                    ['action' => 'view', $task->id],
                                    ['class' => 'btn-action view', 'escape' => false]
                                ) ?>

                                <?= $this->Html->link(
                                    '<i class="bi bi-pencil-square"></i>',
                                    ['action' => 'edit', $task->id],
                                    ['class' => 'btn-action edit', 'escape' => false]
                                ) ?>

                                <?= $this->Form->postLink(
                                    '<i class="bi bi-trash3"></i>',
                                    ['action' => 'delete', $task->id],
                                    [
                                        'class' => 'btn-action delete',
                                        'escape' => false,
                                        'confirm' => __('Are you sure you want to delete task # {0}?', $task->id)
                                    ]
                                ) ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="table-footer">
            <div class="text-muted">
                <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s)')) ?>
            </div>

            <ul class="pagination-custom">
                <?= $this->Paginator->prev('< Previous') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('Next >') ?>
            </ul>
        </div>

    </div>
</div>

<!-- VIEW LIST TASK -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    if (window.location.hash === "#task-list-section") {

        const section = document.querySelector("#task-list-section");

        if (section) {
            setTimeout(() => {
                section.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            }, 200);
        }
    }

});
</script>