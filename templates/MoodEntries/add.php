<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MoodEntry $moodEntry
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Mood Entries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="moodEntries form content">
            <?= $this->Form->create($moodEntry) ?>
            <fieldset>
    <legend><?= __('Add Mood Entry') ?></legend>
    <?php    
        echo $this->Form->control('mood_level', [
            'type' => 'select',
            'label' => 'How You feel?',
            'options' => [
                1 => 'Sangat Sedih',
                2 => 'Sedih',
                3 => 'Biasa',
                4 => 'Gembira',
                5 => 'Sangat Gembira'
            ],
            'empty' => 'Pilih satu'
        ]);

        echo $this->Form->control('entry_date', [
            'default' => date('Y-m-d') 
        ]);
    ?>
</fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
