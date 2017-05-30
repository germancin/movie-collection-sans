<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Movies Controller
 *
 * @property \App\Model\Table\MoviesTable $Movies
 */
class MoviesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $movies = $this->paginate($this->Movies);

        $this->set(compact('movies'));
        $this->set('_serialize', ['movies']);
    }

    /**
     * View method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rates = [1,2,3,4,5];
        $movie = $this->Movies->get($id, [
            'contain' => ['Formats', 'MovieRatings']
        ]);

        $this->set(compact('movie', 'rates'));
        $this->set('_serialize', ['movie']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movie = $this->Movies->newEntity();
        if ($this->request->is('post')) {
            $movie = $this->Movies->patchEntity($movie, $this->request->data);
            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('The movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie could not be saved. Please, try again.'));
        }
        $formats = $this->Movies->Formats->find('list', ['limit' => 200]);
        $this->set(compact('movie', 'formats'));
        $this->set('_serialize', ['movie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {   
        $date = ''; $length = [];
        $movie = $this->Movies->get($id, [
            'contain' => ['Formats']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movie = $this->Movies->patchEntity($movie, $this->request->data);
            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('The movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie could not be saved. Please, try again.'));
        }
        
        /* Splitting the length to fill dropwdows*/
        foreach ($movie['length'] as $key => $field) {
            if($key === 'date') 
            {
                $length = ['hrs' => intval(date_format(date_create($field),'H')),
                           'min' => intval(date_format(date_create($field),'i')),
                           'segs' => intval(date_format(date_create($field),'s')),
                           'movieLenght' => date_format(date_create($field),'H:i:s')
                          ];
            }
        }
        
        $formats = $this->Movies->Formats->find('list', ['limit' => 200]);
        $this->set(compact('movie', 'formats', 'length'));
        $this->set('_serialize', ['movie','length']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Movie id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movie = $this->Movies->get($id);
        if ($this->Movies->delete($movie)) {
            $this->Flash->success(__('The movie has been deleted.'));
        } else {
            $this->Flash->error(__('The movie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
