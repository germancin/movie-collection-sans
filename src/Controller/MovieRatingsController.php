<?php
namespace App\Controller;

use App\Controller\AppController;

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
}
