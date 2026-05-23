<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HabitLogs Model
 *
 * @property \App\Model\Table\HabitsTable&\Cake\ORM\Association\BelongsTo $Habits
 *
 * @method \App\Model\Entity\HabitLog newEmptyEntity()
 * @method \App\Model\Entity\HabitLog newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\HabitLog> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HabitLog get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\HabitLog findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\HabitLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\HabitLog> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\HabitLog|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\HabitLog saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\HabitLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\HabitLog>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\HabitLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\HabitLog> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\HabitLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\HabitLog>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\HabitLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\HabitLog> deleteManyOrFail(iterable $entities, array $options = [])
 */
class HabitLogsTable extends Table
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

        $this->setTable('habit_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Habits', [
            'foreignKey' => 'habit_id',
            'joinType' => 'INNER',
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
            ->integer('habit_id')
            ->notEmptyString('habit_id');

        $validator
            ->date('date_completed')
            ->requirePresence('date_completed', 'create')
            ->notEmptyDate('date_completed');

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
        $rules->add($rules->existsIn(['habit_id'], 'Habits'), ['errorField' => 'habit_id']);

        return $rules;
    }
}
