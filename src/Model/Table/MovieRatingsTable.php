<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MovieRatings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Movies
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\MovieRating get($primaryKey, $options = [])
 * @method \App\Model\Entity\MovieRating newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MovieRating[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MovieRating|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovieRating patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MovieRating[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MovieRating findOrCreate($search, callable $callback = null, $options = [])
 */
class MovieRatingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('movie_ratings');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Movies', [
            'foreignKey' => 'movie_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('value')
            ->requirePresence('value', 'create')
            ->notEmpty('value');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['movie_id'], 'Movies'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
