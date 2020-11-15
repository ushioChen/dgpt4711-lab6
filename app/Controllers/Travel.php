<?php

namespace App\Controllers;

class Travel extends BaseController {

    public function index() {

        // connect to the model     
        $places = new \App\Models\Places();
        $records = $places->findAll();

        $table = new \CodeIgniter\View\Table();

        // retrieve all the records     
        $headings = $places->fields;
        $displayHeadings = array_slice($headings, 1, 2);
        $table->setHeading(array_map('ucfirst', $displayHeadings));
        foreach ($records as $record) {
            $nameLink = anchor("travel/showme/$record->id", $record->name);
            $table->addRow($nameLink,$record->description);
            
            $table->addRow($record->name, $record->description);
        }
        $template = [
            'table_open' => '<table cellpadding="5px">',
            'cell_start' => '<td style="border: 1px solid #dddddd;">',
            'row_alt_start' => '<tr style="background-color:#dddddd">',
        ];
        $table->setTemplate($template);
        $fields = [
            'title' => 'Travel Destinations',
            'heading' => 'Travel Destinations',
            'footer' => 'Jiaxi Chen'
        ];

        // get a template parser     
        $parser = \Config\Services::parser();
        // tell it about the substitions     
        // and have it render the template with those        
        return $parser->setData($fields)
                        ->render('templates\top') .
        $table->generate() .
                $parser->setData($fields) ->render('templates\bottom');
                        }
                        
    public function showme($id) 
{
        // connect to the model     
        $places = new \App\Models\Places();
        //// retrieve all the records     
        $record = $places->find($id);
        // get a template parser     
        $parser = \Config\Services::parser();
        // tell it about the substitions     
        return $parser->setData($record)
                        // and have it render the template with those         
                        ->render('oneplace');
    }
}