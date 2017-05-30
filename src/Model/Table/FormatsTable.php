<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Formats Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Movies
 *
 * @method \App\Model\Entity\Format get($primaryKey, $options = [])
 * @method \App\Model\Entity\Format newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Format[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Format|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Format patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Format[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Format findOrCreate($search, callable $callback = null, $options = [])
 */
class FormatsTable extends Table
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

        $this->table('formats');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsToMany('Movies', [
            'foreignKey' => 'format_id',
            'targetForeignKey' => 'movie_id',
            'joinTable' => 'formats_movies'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        return $validator;
    }
}
