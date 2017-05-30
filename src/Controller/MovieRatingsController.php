<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * MovieRatings Controller
 *
 * @property \App\Model\Table\MovieRatingsTable $MovieRatings
 */
class MovieRatingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Movies', 'Users']
        ];
        $movieRatings = $this->paginate($this->MovieRatings);

        $this->set(compact('movieRatings'));
        $this->set('_serialize', ['movieRatings']);
    }

    /**
     * View method
     *
     * @param string|null $id Movie Rating id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movieRating = $this->MovieRatings->get($id, [
            'contain' => ['Movies', 'Users']
        ]);

        $this->set('movieRating', $movieRating);
        $this->set('_serialize', ['movieRating']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movieRating = $this->MovieRatings->newEntity();
        if ($this->request->is('post')) {
            $movieRating = $this->MovieRatings->patchEntity($movieRating, $this->request->data);
            if ($this->MovieRatings->save($movieRating)) {
                $this->Flash->success(__('The movie rating has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie rating could not be saved. Please, try again.'));
        }
        $movies = $this->MovieRatings->Movies->find('list', ['limit' => 200]);
        $users = $this->MovieRatings->Users->find('list', ['limit' => 200]);
        $this->set(compact('movieRating', 'movies', 'users'));
        $this->set('_serialize', ['movieRating']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Movie Rating id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movieRating = $this->MovieRatings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movieRating = $this->MovieRatings->patchEntity($movieRating, $this->request->data);
            if ($this->MovieRatings->save($movieRating)) {
                $this->Flash->success(__('The movie rating has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie rating could not be saved. Please, try again.'));
        }
        $movies = $this->MovieRatings->Movies->find('list', ['limit' => 200]);
        $users = $this->MovieRatings->Users->find('list', ['limit' => 200]);
        $this->set(compact('movieRating', 'movies', 'users'));
        $this->set('_serialize', ['movieRating']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Movie Rating id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movieRating = $this->MovieRatings->get($id);
        if ($this->MovieRatings->delete($movieRating)) {
            $this->Flash->success(__('The movie rating has been deleted.'));
        } else {
            $this->Flash->error(__('The movie rating could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Rate method
     * Process the rate of each movie.
     */
    public function rate()
    {
        if ($this->request->is('post')) {
            
            $movieRating = $this->MovieRatings->newEntity();

            if(!empty($this->request->data['rate'])) {
                $movieId = $this->request->data['movie_id'];
                $userId = $this->request->data['user_id'];
                $rateValue = $this->request->data['rate'];
                
                if($this->userHaventRatedMovie($userId, $movieId)){

                        $data = ['movie_id' => $movieId, 'user_id' => $userId,'value' => $rateValue];
        
                        $movieRating = $this->MovieRatings->patchEntity($movieRating, $data);
        
                        if ($this->MovieRatings->save($movieRating)) {
                            $this->Flash->success(__('Thank you for rating this movie.'));
                        }else{
                            $this->Flash->error(__('Something went wrong saving this rating.'));
                        }
                
                }else{

                        if ($this->updateRating($userId, $movieId, $rateValue)) {
                            $this->Flash->success(__('Thank you for updating this movie rate.'));
                        }else{
                            $this->Flash->error(__('Something went wrong updating this rating.'));
                        }
                }
                
                $this->computeMovieRating($movieId);

            }else{
                $this->Flash->error(__('Please select a value for rating this movie.'));
            }

            $this->redirect($this->referer());
        }
    }

    /**
     * If the user already rated then can update its rate from movie.
     *
     * @param integer $userId
     * @param integer $movieIs
     * @param integer $rateValue // total rate value from movie.
     * @return object
     */
    public function updateRating($userId, $movieId, $rateValue)
    {
        
        $movieRatings = TableRegistry::get("MovieRatings");
                        $query = $movieRatings->query();
        
        return $query->update()->set(['value' => $rateValue])
                                ->where(['user_id' => $userId, 'movie_id' => $movieId   ])
                                ->execute();    
        
    }

    /**
     * Take all rates from movie and do the math.
     * @param  integer $movieId
     * @return integer
     */
    public function computeMovieRating($movieId)
    {
        if(empty($movieId)){
           return false;
        }

        $movies = TableRegistry::get('Movies');

        $movieRatings = $movies->get($movieId, [
            'contain' => ['MovieRatings']
        ]);

        $dataRatings = $movieRatings->toArray();

        $rateAvg = $this->__getAvgRating($dataRatings);

        if($rateAvg > 0) {
            $this->updateMovieRating($rateAvg, $movieId);
        }

        return true;
    }

    /**
     * returns the total rate.
     * @param  array $dataRatings
     * @return integer
     */
    public function __getAvgRating($dataRatings)
    {
        $rateVals = [];
        foreach ($dataRatings['movie_ratings'] as $rating) {
            $rateVals[] = $rating['value'];
        }
        
        return array_sum($rateVals) / count($rateVals);
        
    }

    /**
     * Update the movie table with the total rate of a movie.
     * @param  integer $movieId
     * @param  integer $rateValue // total rate of movie.
     * @return boolean
     */
    public function updateMovieRating($rateValue, $movieId)
    {
        $movies = TableRegistry::get('Movies');

        if($rateValue > 0){
            $data = [
                        'id' => $movieId,
                        'rating' => intval(round($rateValue))
                    ];

            $movie = $movies->get($movieId);

            $movieRating = $movies->patchEntity($movie, $data);

            if ($movies->save($movieRating)) {
                $this->Flash->success(__('The movie rating has been updated.'));
                return true;
            }
        }
        return false;
    }
    
    /**
     * Checks if user haven't rated yet. If so returns true.
     * @param  integer $movieId
     * @param  integer $userId
     * @return boolean
     */
    public function userHaventRatedMovie ($userId, $movieID)
    {
        $movieRating = $this->MovieRatings->find()
                        ->where(['user_id =' => $userId, 'movie_id =' => $movieID   ])
                        ->toArray();
        
        return (empty($movieRating)) ? true : false;
        
    }
    
}
