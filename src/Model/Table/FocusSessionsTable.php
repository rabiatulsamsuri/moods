<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FocusSessions Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\FocusSession newEmptyEntity()
 * @method \App\Model\Entity\FocusSession newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\FocusSession> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FocusSession get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\FocusSession findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\FocusSession patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\FocusSession> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FocusSession|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\FocusSession saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\FocusSession>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FocusSession>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FocusSession>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FocusSession> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FocusSession>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FocusSession>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FocusSession>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FocusSession> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FocusSessionsTable extends Table
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

        $this->setTable('focus_sessions');
        $this->setDisplayField('activity_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('activity_name')
            ->maxLength('activity_name', 50)
            ->requirePresence('activity_name', 'create')
            ->notEmptyString('activity_name');

        $validator
            ->scalar('category')
            ->requirePresence('category', 'create')
            ->notEmptyString('category');

        $validator
            ->integer('duration_minutes')
            ->requirePresence('duration_minutes', 'create')
            ->notEmptyString('duration_minutes');

        $validator
            ->date('session_date')
            ->requirePresence('session_date', 'create')
            ->notEmptyDate('session_date');

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
