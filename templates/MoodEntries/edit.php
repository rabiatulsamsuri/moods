<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MoodEntry $moodEntry
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $moodEntry->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $moodEntry->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Mood Entries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="moodEntries form content">
            <?= $this->Form->create($moodEntry) ?>
            <fieldset>
    <legend><?= __('Add Mood Entry') ?></legend>
    <?php
        // user_id biasanya diset automatik dari session, tapi buat masa ni kita kekalkan dulu
        echo $this->Form->control('user_id', ['options' => $users]);
        
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

        // Tambah 'required' => false supaya browser tak paksa user isi
        echo $this->Form->control('mood_note', [
            'type' => 'textarea',
            'label' => 'Note (Optional)',
            'required' => false,
            'rows' => 3
        ]);
        
        echo $this->Form->control('stress_level', [
            'type' => 'select',
            'label' => 'Stress Level', // Ditukar supaya tak keliru dengan label mood
            'options' => [
                'Rendah' => 'Rendah',
                'Sederhana' => 'Sederhana',
                'Tinggi' => 'Tinggi',
            ],
            'empty' => 'Pilih satu'
        ]);

        echo $this->Form->control('entry_date', [
            'default' => date('Y-m-d') // Set tarikh hari ini secara automatik
        ]);
    ?>
</fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
