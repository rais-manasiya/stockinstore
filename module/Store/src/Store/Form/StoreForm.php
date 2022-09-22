<?php

namespace Store\Form;
use Zend\Form\Element;
use Zend\Form\Form;


 class StoreForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('store');
         $this->setAttribute('method', 'post');
         $this->setAttribute('enctype','multipart/form-data');
         
         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
       
        // $this->add(array(
        //     'name' => 'url',
        //     'type' => 'Text',
        //     'options' => array(
        //         'label' => 'URL',
        //     ),
        //     'attributes' => array(
        //        'class' => 'form-control',
        //     )
        // ));
        

        $code = new Element\Text('code');
        $code->setLabel('Store Code')
              ->setAttribute('id', 'code')
              ->setAttribute('class', 'form-control');
              $this->add($code);
        $name = new Element\Text('name');
        $name->setLabel('Store Name')
              ->setAttribute('id', 'name')
              ->setAttribute('class', 'form-control');
              $this->add($name);

        $desc = new Element\Textarea('description');
        $desc->setLabel('Store Description')
              ->setAttribute('id', 'description')
              ->setAttribute('class', 'form-control');
              $this->add($desc);

        $url = new Element\Url('URL');
        $url->setLabel('Store URL')
              ->setAttribute('id', 'URL')
              ->setAttribute('class', 'form-control');
              $this->add($url);
        
        $this->add([
            'type' => Element\Radio::class,
            'name' => 'type',
            'options' => [
                'label' => 'Store Type',
                'value_options' => [
                    '1' => 'Department',
                    '2' => 'Boutique',
                    '3' => 'Outlet',
                    '4' => 'Flagship',
                    '5' => 'Stockist',
                ]
            ],
        ]);

        $this->add([
            'type' => Element\Checkbox::class,
            'name' => 'stock_import',
            'options' => [
                'label' => 'Stock Import',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0',
            ],
            'attributes' => [
                 'value' => '1',
            ],
        ]);

        $this->add([
            'type' => Element\Checkbox::class,
            'name' => 'store',
            'options' => [
                'label' => 'Enable Store',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0',
            ],
            'attributes' => [
                 'value' => '1',
            ],
        ]);


        $country = new Element\Select('country');
        $country->setLabel('Country')
              ->setAttribute('id', 'country')
              ->setAttribute('class', 'form-control');
        $country->setEmptyOption('Select country');
        $this->add($country);
        
        $state = new Element\Select('state');
        $state->setLabel('State/Region')
              ->setAttribute('id', 'state')
              ->setAttribute('class', 'form-control');
        $state->setEmptyOption('Select state/region');
        $this->add($state);

        $city = new Element\Text('city');
        $city->setLabel('City')
              ->setAttribute('id', 'city')
              ->setAttribute('class', 'form-control');
              $this->add($city);

        $postal = new Element\Text('postalcode');
        $postal->setLabel('Postal Code')
              ->setAttribute('id', 'postalcode')
              ->setAttribute('class', 'form-control');
              $this->add($postal);
        
        $add1 = new Element\Text('address1');
        $add1->setLabel('Address Line 1')
              ->setAttribute('id', 'address1')
              ->setAttribute('class', 'form-control');
              $this->add($add1);

        $add2 = new Element\Text('address2');
        $add2->setLabel('Address Line 2')
              ->setAttribute('id', 'address2')
              ->setAttribute('class', 'form-control');
              $this->add($add2);

        $this->add([
            'type' => Element\Checkbox::class,
            'name' => 'store_locator',
            'options' => [
                'label' => 'Enable Store Locator',
                'use_hidden_element' => true,
                'checked_value' => '1',
                'unchecked_value' => '0',
            ],
            'attributes' => [
                 'value' => '1',
            ],
        ]);

        $file = new Element\File('store_image');
        $file->setLabel('Image Upload')
             ->setAttribute('id', 'store_image')
             ->setAttribute('class', 'form-control')
             ->setAttribute('accept','image/jpg,image/jpeg');
             $this->add($file);
        
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Submit',
                 'id' => 'submitbutton',
                 'class' => 'btn btn-primary'
             ),
         ));

     }

    //  public function __construct($name = null, $options = array())
    // {
    //     parent::__construct($name, $options);
    //     $this->addElements();
    // }

    // public function addElements()
    // {
    //     // File Input
    //     $file = new Element\File('image-file');
    //     $file->setLabel('Avatar Image Upload')
    //          ->setAttribute('id', 'image-file');
    //     $this->add($file);
    // }
 }