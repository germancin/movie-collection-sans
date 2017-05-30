<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserRoles Controller
 *
 * @property \App\Model\Table\UserRolesTable $UserRoles
 */
class UserRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $userRoles = $this->paginate($this->UserRoles);

        $this->set(compact('userRoles'));
        $this->set('_serialize', ['userRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id User Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userRole = $this->UserRoles->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userRole', $userRole);
        $this->set('_serialize', ['userRole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userRole = $this->UserRoles->newEntity();
        if ($this->request->is('post')) {
            $userRole = $this->UserRoles->patchEntity($userRole, $this->request->data);
            if ($this->UserRoles->save($userRole)) {
                $this->Flash->success(__('The user role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user role could not be saved. Please, try again.'));
        }
        $users = $this->UserRoles->Users->find('list', ['limit' => 200]);
        $this->set(compact('userRole', 'users'));
        $this->set('_serialize', ['userRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Role id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userRole = $this->UserRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userRole = $this->UserRoles->patchEntity($userRole, $this->request->data);
            if ($this->UserRoles->save($userRole)) {
                $this->Flash->success(__('The user role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user role could not be saved. Please, try again.'));
        }
        $users = $this->UserRoles->Users->find('list', ['limit' => 200]);
        $this->set(compact('userRole', 'users'));
        $this->set('_serialize', ['userRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userRole = $this->UserRoles->get($id);
        if ($this->UserRoles->delete($userRole)) {
            $this->Flash->success(__('The user role has been deleted.'));
        } else {
            $this->Flash->error(__('The user role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
