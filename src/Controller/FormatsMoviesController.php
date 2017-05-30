<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormatsMovies Controller
 *
 * @property \App\Model\Table\FormatsMoviesTable $FormatsMovies
 */
class FormatsMoviesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Movies', 'Formats']
        ];
        $formatsMovies = $this->paginate($this->FormatsMovies);

        $this->set(compact('formatsMovies'));
        $this->set('_serialize', ['formatsMovies']);
    }

    /**
     * View method
     *
     * @param string|null $id Formats Movie id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formatsMovie = $this->FormatsMovies->get($id, [
            'contain' => ['Movies', 'Formats']
        ]);

        $this->set('formatsMovie', $formatsMovie);
        $this->set('_serialize', ['formatsMovie']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formatsMovie = $this->FormatsMovies->newEntity();
        if ($this->request->is('post')) {
            $formatsMovie = $this->FormatsMovies->patchEntity($formatsMovie, $this->request->data);
            if ($this->FormatsMovies->save($formatsMovie)) {
                $this->Flash->success(__('The formats movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formats movie could not be saved. Please, try again.'));
        }
        $movies = $this->FormatsMovies->Movies->find('list', ['limit' => 200]);
        $formats = $this->FormatsMovies->Formats->find('list', ['limit' => 200]);
        $this->set(compact('formatsMovie', 'movies', 'formats'));
        $this->set('_serialize', ['formatsMovie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formats Movie id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formatsMovie = $this->FormatsMovies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formatsMovie = $this->FormatsMovies->patchEntity($formatsMovie, $this->request->data);
            if ($this->FormatsMovies->save($formatsMovie)) {
                $this->Flash->success(__('The formats movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formats movie could not be saved. Please, try again.'));
        }
        $movies = $this->FormatsMovies->Movies->find('list', ['limit' => 200]);
        $formats = $this->FormatsMovies->Formats->find('list', ['limit' => 200]);
        $this->set(compact('formatsMovie', 'movies', 'formats'));
        $this->set('_serialize', ['formatsMovie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formats Movie id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formatsMovie = $this->FormatsMovies->get($id);
        if ($this->FormatsMovies->delete($formatsMovie)) {
            $this->Flash->success(__('The formats movie has been deleted.'));
        } else {
            $this->Flash->error(__('The formats movie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
