<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MoodEntry Entity
 *
 * @property int $id
 * @property int $user_id
 * @property bool $mood_level
 * @property string $mood_note
 * @property string $stress_level
 * @property \Cake\I18n\Date $entry_date
 *
 * @property \App\Model\Entity\User $user
 */
class MoodEntry extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'user_id' => true,
        'mood_level' => true,
        'mood_note' => true,
        'stress_level' => true,
        'entry_date' => true,
        'user' => true,
    ];
}
