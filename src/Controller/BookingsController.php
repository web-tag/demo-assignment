<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 *
 * @method \App\Model\Entity\Booking[] paginate($object = null, array $settings = [])
 */
class BookingsController extends AppController
{

    public $_userData;

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Doctor']
        ];
        $usersAndRoleArray = $this->Bookings->Users->get($this->_userData['id'], ['contain' => ['Roles']]);
        if ($usersAndRoleArray->role->role_name == 'Docter') {
            $this->Flash->error(__('You do not have access of this page.'));
            return $this->redirect(['action' => 'appointments']);
        }
        if ($usersAndRoleArray->role->role_name == 'Patient') {
            $this->paginate = [
                'contain' => ['Doctor'],
                'conditions' => ['Bookings.user_id' => $this->_userData['id']]
            ];
        }

        $bookings = $this->paginate($this->Bookings);

        $this->set(compact('bookings', 'usersAndRoleArray'));
        $this->set('_serialize', ['bookings']);
    }

    /**
     * 
     */
    public function appointments()
    {
        $usersAndRoleArray = $this->Bookings->Users->get($this->_userData['id'], ['contain' => ['Roles']]);
        if ($usersAndRoleArray->role->role_name == 'Patient') {
            $this->Flash->error(__('You do not have access of this page.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->paginate = [
            'contain' => ['Users', 'Doctor']
        ];
        if ($usersAndRoleArray->role->role_name == 'Doctor') {
            $this->paginate = [
                'contain' => ['Users', 'Doctor'],
                'conditions' => ['Bookings.booker_id' => $this->_userData['id']]
            ];
        }

        $bookings = $this->paginate($this->Bookings);

        $this->set(compact('bookings'));
        $this->set('_serialize', ['bookings']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userInformation = $this->Bookings->Users->get($this->_userData['id'], ['contain' => ['Roles']]);
        $booking = $this->Bookings->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            // check same batch is already exist
            $existBatch = $this->Bookings->find()
                    ->where([
                        'booker_id' => $data['booker_id'],
                        'booking_date' => date('Y-m-d', strtotime($data['booking_date']['year'] . '-' . $data['booking_date']['month'] . '-' . $data['booking_date']['day'])),
                        'booking_from' => $data['booking_from'],
                        'booking_to' => $data['booking_to']
                    ])
                    ->count();
            if ($existBatch > 0) {
                $this->Flash->error(__('The booking already exist, please book another time...'));
            } else {
                // this column information set from model
                $data['user_id'] = $this->_userData['id'];
                $data['created'] = date('Y-m-d H:i:s'); // it should be use timestamp behaviour
                $booking = $this->Bookings->patchEntity($booking, $data);
                if ($this->Bookings->save($booking)) {
                    $this->Flash->success(__('The booking has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The booking could not be saved. Please, try again.'));
            }
        }
        $users = $this->Bookings->Users->find('list', [
            'contain' => ['Roles'],
            'conditions' => ['Roles.role_name' => 'Docter'],
            'limit' => 200
        ]);
        $this->set(compact('booking', 'users', 'userInformation'));
        $this->set('_serialize', ['booking']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
