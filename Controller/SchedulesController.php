<?php
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');

/**
 * Schedules Controller
 *
 * @property Schedule $Schedule
 * @property PaginatorComponent $Paginator
 */
class SchedulesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public function index() {
        if ($this->request->is('ajax')) {
            $term = $this->request->query['term'];
            //debug($term);
            $HttpSocket = new HttpSocket();
            $url = 'https://maps.googleapis.com/maps/api/place/autocomplete/json';
            $query = array(
                'key' => Configure::read('Google.mapApiKey'),
                'input' => $term,
            );
            $result = $HttpSocket->get($url, $query);
            //debug($result);
            $arr = json_decode($result, true);
            $places = array(); 
            foreach ($arr['predictions'] as $item){
                $places[] = $item['description'];
                $this->set(compact('places'));
                $this->layout = 'ajax';
                //debug($item);
                //echo $item['description'];
                //echo $item['terms'][0]['value'];
                /*$place_id = $item['place_id'];
                $url = 'https://maps.googleapis.com/maps/api/place/details/json';
                $query = array(
                    'key' => Configure::read('Google.mapApiKey'),
                    'placeid' => $place_id,
                );
                $result = $HttpSocket->get($url, $query);
                $arr = json_decode($result, true);
                $lat = $arr['result']['geometry']['location']['lat'];
                $lng = $arr['result']['geometry']['location']['lng'];
                //echo ' lat '. $lat;
                //echo ' lng '.$lng.'<br />';
                $url = 'https://maps.googleapis.com/maps/api/geocode/json';
                $query = array(
                    'key' => Configure::read('Google.mapApiKey'),
                    'latlng' => $lat.','.$lng,
                );
                $result = $HttpSocket->get($url, $query);
                $arr = json_decode($result, true);
                //debug($arr);
                //echo $arr['results'][0]['formatted_address'].'<br />';*/
            }
        }
    }
}
