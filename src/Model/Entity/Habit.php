<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Habit Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $icon
 * @property int $target_days_per_week
 * @property \Cake\I18n\DateTime $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\HabitLog[] $habit_logs
 */
class Habit extends Entity
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
        'name' => true,
        'icon' => true,
        'target_days_per_week' => true,
        'created' => true,
        'user' => true,
        'habit_logs' => true,
    ];
}
