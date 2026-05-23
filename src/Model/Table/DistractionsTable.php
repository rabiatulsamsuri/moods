<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Distractions Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Distraction newEmptyEntity()
 * @method \App\Model\Entity\Distraction newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Distraction> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Distraction get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Distraction findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Distraction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Distraction> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Distraction|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Distraction saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Distraction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Distraction>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Distraction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Distraction> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Distraction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Distraction>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Distraction>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Distraction> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DistractionsTable extends Table
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

        $this->setTable('distractions');
        $this->setDisplayField('application_name');
        $this->setPrimaryKey('id');

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
            ->scalar('application_name')
            ->maxLength('application_name', 50)
            ->requirePresence('application_name', 'create')
            ->notEmptyString('application_name');

        $validator
            ->integer('count_or_minutes')
            ->requirePresence('count_or_minutes', 'create')
            ->notEmptyString('count_or_minutes');

        $validator
            ->date('log_date')
            ->requirePresence('log_date', 'create')
            ->notEmptyDate('log_date');

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
