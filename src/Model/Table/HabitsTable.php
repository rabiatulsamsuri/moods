<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Habits Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\HabitLogsTable&\Cake\ORM\Association\HasMany $HabitLogs
 *
 * @method \App\Model\Entity\Habit newEmptyEntity()
 * @method \App\Model\Entity\Habit newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Habit> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Habit get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Habit findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Habit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Habit> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Habit|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Habit saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Habit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Habit>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Habit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Habit> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Habit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Habit>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Habit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Habit> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HabitsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('habits');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('HabitLogs', [
            'foreignKey' => 'habit_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 30)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('icon')
            ->maxLength('icon', 1)
            ->requirePresence('icon', 'create')
            ->notEmptyString('icon');

        $validator
            ->integer('target_days_per_week')
            ->requirePresence('target_days_per_week', 'create')
            ->notEmptyString('target_days_per_week');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
