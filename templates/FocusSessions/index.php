<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\FocusSession> $focusSessions
 */
?>
<div class="focus-page">

    <!-- HEADER -->
    <div class="focus-header-card">
        <div>
            <h1>Pomodoro Sessions</h1>
            <p>Track your focus productivity beautifully</p>
        </div>

        <?= $this->Html->link(
            '+ New Focus Session',
            ['action' => 'add'],
            ['class' => 'btn-new-focus']
        ) ?>
    </div>

    <!-- TABLE CARD -->
    <div class="focus-table-card">

        <div class="table-responsive">
            <table class="focus-table">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Activity</th>
                        <th>Category</th>
                        <th>Minutes</th>
                        <th>Session Date</th>
                        <th>Created</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($focusSessions as $key => $focusSession): ?>

                    <?php
                        $categoryClass = match ($focusSession->category) {
                            'Deep Work' => 'focus-deep',
                            'Study' => 'focus-study',
                            'Meeting' => 'focus-meeting',
                            default => 'focus-default'
                        };
                    ?>

                    <tr>

                        <td>
                            <?= $this->Number->format($this->Paginator->counter('{{start}}') + $key) ?>
                        </td>

                        <td class="fw-semibold text-primary">
                            <?= h($focusSession->user->username) ?>
                        </td>

                        <td class="fw-semibold">
                            <?= h($focusSession->activity_name) ?>
                        </td>

                        <td>
                            <span class="focus-category <?= $categoryClass ?>">
                                <?= h($focusSession->category) ?>
                            </span>
                        </td>

                        <td>
                            <span class="focus-minutes">
                                <?= h($focusSession->duration_minutes) ?> min
                            </span>
                        </td>

                        <td>
                            <i class="bi bi-calendar3 me-1"></i>
                            <?= h($focusSession->session_date) ?>
                        </td>

                        <td>
                            <?= h($focusSession->created) ?>
                        </td>

                        <td class="text-center">
                            <div class="focus-actions">

                                <?= $this->Html->link(
                                    '<i class="bi bi-eye"></i>',
                                    ['action' => 'view', $focusSession->id],
                                    ['class' => 'focus-btn view', 'escape' => false]
                                ) ?>

                                <?= $this->Html->link(
                                    '<i class="bi bi-pencil-square"></i>',
                                    ['action' => 'edit', $focusSession->id],
                                    ['class' => 'focus-btn edit', 'escape' => false]
                                ) ?>

                                <?= $this->Form->postLink(
                                    '<i class="bi bi-trash3"></i>',
                                    ['action' => 'delete', $focusSession->id],
                                    [
                                        'class' => 'focus-btn delete',
                                        'escape' => false,
                                        'confirm' => __('Delete this session?')
                                    ]
                                ) ?>

                            </div>
                        </td>

                    </tr>

                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>

        <!-- PAGINATION -->
        <div class="focus-pagination">

            <div>
                <?= $this->Paginator->counter(
                    __('Page {{page}} of {{pages}}, showing {{current}} record(s)')
                ) ?>
            </div>

           <ul class="pagination-custom">
                <?= $this->Paginator->prev('< Previous') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('Next >') ?>
            </ul>
        </div>

    </div>
</div>

</div>