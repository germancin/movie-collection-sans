<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormatsMovies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Movies
 * @property \Cake\ORM\Association\BelongsTo $Formats
 *
 * @method \App\Model\Entity\FormatsMovie get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormatsMovie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormatsMovie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormatsMovie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormatsMovie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormatsMovie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormatsMovie findOrCreate($search, callable $callback = null, $options = [])
 */
class FormatsMoviesTable extends Table
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

        $this->table('formats_movies');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Movies', [
            'foreignKey' => 'movie_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Formats', [
            'foreignKey' => 'format_id',
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
        $rules->add($rules->existsIn(['format_id'], 'Formats'));

        return $rules;
    }
}
