<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MoodEntry $moodEntry
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Mood Entry'), ['action' => 'edit', $moodEntry->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Mood Entry'), ['action' => 'delete', $moodEntry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $moodEntry->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Mood Entries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Mood Entry'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="moodEntries view content">
            <h3><?= h($moodEntry->stress_level) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $moodEntry->hasValue('user') ? $this->Html->link($moodEntry->user->username, ['controller' => 'Users', 'action' => 'view', $moodEntry->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Entry Date') ?></th>
                    <td><?= h($moodEntry->entry_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mood Level') ?></th>
                    <td><?= $moodEntry->mood_level ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            </div>
        </div>
    </div>
</div>