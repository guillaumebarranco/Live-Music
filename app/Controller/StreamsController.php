<?php

App::uses("AppController", "Controller");

/**
 * Class StreamsController
 *
 * @property Stream $Stream
 */
class StreamsController extends AppController{

    public function streamMusic() {
        $this->layout = null;
        $this->loadModel('Stream');

        if(isset($this->request->data)) {
            $data = $this->request->data;

            $song_id = intval($data['song_id']);
            
            $this->Stream->save(array(
                'song_id' => $song_id
            ));
        }

        $ret = array();
        $ret['status'] = 'ok man';

        $this->render(false);
        echo json_encode($ret);
    }

    public function getStreamMusic() {
        $this->layout = null;

        $this->loadModel('Stream');
        $ret = array();
        $ret['status'] = 'OK';

        $stream = $this->Stream->find('first', array('order' => array('id' =>'desc')));

        $ret['getCurrentSong'] = $stream['Stream']['song_id'];

        $this->render(false);
        echo json_encode($ret);
    }
}