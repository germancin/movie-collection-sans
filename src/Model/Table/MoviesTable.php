<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Movies Model
 *
 * @property \Cake\ORM\Association\HasMany $MovieRatings
 * @property \Cake\ORM\Association\BelongsToMany $Formats
 *
 * @method \App\Model\Entity\Movie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Movie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Movie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Movie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Movie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Movie findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MoviesTable extends Table
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

        $this->table('movies');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('MovieRatings', [
            'foreignKey' => 'movie_id'
        ]);
        $this->belongsToMany('Formats', [
            'foreignKey' => 'movie_id',
            'targetForeignKey' => 'format_id',
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');
        
        $validator
            ->add('title',  ['length' =>
                                [
                                    'rule' => ['maxLength', 50],
                                    'message' => 'Title can\'t exide the 50 characters long.',
                                ]
                            ]
                );

        $validator
            ->time('length')
            ->requirePresence('length', 'create')
            ->notEmpty('length')
            ->add("length",
                        [ "custom" =>
                            [
                                "rule" => [$this, "lenghtTimeValidator"],
                                "message" => "Enter length time less than 500 minutes."
                            ]
                        ]
                );

        $validator
            ->integer('release_year')
            ->requirePresence('release_year', 'create')
            ->notEmpty('release_year')
            ->add("release_year",
                        [ "custom" =>
                            [
                                "rule" => [$this, "yearValidator"],
                                "message" => "Enter value greater than 1800 and less then 2100."
                            ]
                        ]
                );

        return $validator;
    }

    /**
     * Checks if the given time is greater than 0 and less than 500.
     *
     * @param  array
     * @return boolean
     */
    public function lenghtTimeValidator($length)
    {
        $minutes = intval($length['hour'])*60 + intval($length['minute']);
        return ($minutes > 0 && $minutes < 500) ? true : false;
    }

    /**
     * Checks if the given year is greater than 0 and less than 500.
     *
     * @param  integer
     * @return boolean
     */
    public function yearValidator($year)
    {
        return ($year > 1800 && $year < 2100) ? true : false;
    }
}
