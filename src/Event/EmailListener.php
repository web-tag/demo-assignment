<?php
namespace App\Event;

use Cake\Log\Log;
use Cake\Event\EventListenerInterface;

class EmailListener implements EventListenerInterface {

    public function implementedEvents() {
        return array(
            'Model.Booking.created' => 'updatePostLog',
        );
    }

    public function updatePostLog($event,  $entity, $options) {
         Log::write('info','Email sending trigger clicking... ' . $event->data['id']);
    }
}

?>