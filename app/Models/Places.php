<?php

namespace App\Models;
use App\Models\Simple\XMLModel;
/*
 * Mock travel destination data.
 * Note that we don't have to extend CodeIgniter's model for now
 */

class Places {
protected $origin = WRITEPATH . 'data/placesData.xml';
protected $keyField = 'id';
protected $validationRules = [];

    //mock data : an array of records
    protected $data = [
        '1' => [
            'id' => 1,
            'name' => 'Hong Kong',
            'description' => 'A special administrative region on the eastern side of the Pearl River estuary in southern China.',
            'link' => 'http://www.discoverhongkong.com/eng/index.jsp',
            'image' => 'hongkong.jpg',
        ],
        '2' => [
            'id' => 2,
            'name' => 'Macau',
            'description' => 'A special administrative region on the western side of the Pearl River estuary in southern China.',
            'link' => 'http://en.macaotourism.gov.mo/index.php',
            'image' => 'macau.jpg',
        ],
        '3' => [
            'id' => 3,
            'name' => 'Thailand',
            'description' => 'A country at the centre of the Southeast Asian Indochinese peninsula composed of 76 provinces.',
            'link' => 'http://www.tourismthailand.org/',
            'image' => 'thailand.jpg',
        ],
        '4' => [
            'id' => 4,
            'name' => 'Japan',
            'description' => 'An island country in East Asia.',
            'link' => 'http://www.jnto.go.jp/eng/',
            'image' => 'japan.jpg',
        ],
        '5' => [
            'id' => 5,
            'name' => 'Vietnam',
            'description' => 'The easternmost country on the Indochina Peninsula.',
            'link' => 'http://www.vietnamtourism.gov.vn/english/',
            'image' => 'vietnam.jpg',
        ],
    ];

    public function findAll() {
        return $this->data;
    }

    public function find($id = null) {
        if (!empty($id) && isset($this->data[$id])) {
            return $this->data[$id];
        }
        return null;
    }

}
