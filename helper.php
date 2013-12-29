<?php
// no direct access
defined('_JEXEC') or die;

class modCalameoHelper
{
    /**
     * Retrieves the list of publications
     *
     * @param array $params An object containing the module parameters
     * @access public
     */    
    public function getPublications($params)
    {
        $secretkey = $params->get('secretkey', '');
        $apikey = $params->get('apikey', '');
        $count = $params->get('count', '1');


        $apiurl = 'http://api.calameo.com/1.0';
        $params = array (
            'apikey'    => $apikey,
            'action'    => 'API.fetchAccountBooks',
            'expires'   => time() + 2000,
            'order'     => 'Creation',
            'way'       => 'DOWN',
            'step'      => $count,
            'output'    => 'PHP'
        );
        ksort($params);
        foreach($params as $key => $value) {
            $secretkey .= $key . $value;
        }

        $params['signature'] = md5($secretkey);
        $url = $apiurl.'?'.http_build_query($params);

        $response = unserialize(file_get_contents($url));
        $items = array();
        for ($i = 0; $i <= $count - 1; $i++) {
            $book = $response['response']['content']['items'][$i];
            $items[] = array('url' => $book['ViewUrl'], 'img' => $book['PictureUrl']);
        } 
        return $items;
    }
}

