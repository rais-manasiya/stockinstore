<?php

namespace Store\Model;

 // Add these import statements

use Zend\Filter\File\RenameUpload;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\FileInput;
use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\File\UploadFile;

 class Store implements InputFilterAwareInterface
 {
     public $id;
     public $code;
     public $name;
     public $description;
     public $URL;
     public $type;

     public $stock_import;
     public $store;
     public $address1;
     public $address2;
     public $country;
     public $state;
     public $city;
     public $postalcode;
     public $store_locator;
     public $store_image;

     protected $inputFilter;                     

     public function exchangeArray($data)
     {
         $this->id     = (isset($data['id']))     ? $data['id']     : null;
         $this->code = (isset($data['code'])) ? $data['code'] : null;
         $this->name  = (isset($data['name']))  ? $data['name']  : null;
         $this->description  = (isset($data['description']))  ? $data['description']  : null;
         $this->URL  = (isset($data['URL']))  ? $data['URL']  : null;
         $this->type  = (isset($data['type']))  ? $data['type']  : null;

         $this->stock_import  = (isset($data['stock_import']))  ? $data['stock_import']  : null;
         $this->store  = (isset($data['store']))  ? $data['store']  : null;
         $this->address1  = (isset($data['address1']))  ? $data['address1']  : null;
         $this->address2  = (isset($data['address2']))  ? $data['address2']  : null;
         $this->country  = (isset($data['country']))  ? $data['country']  : null;
         $this->state  = (isset($data['state']))  ? $data['state']  : null;
         $this->city  = (isset($data['city']))  ? $data['city']  : null;
         $this->postalcode  = (isset($data['postalcode']))  ? $data['postalcode']  : null;
         $this->store_locator  = (isset($data['store_locator']))  ? $data['store_locator']  : null;

         $this->store_image  = (isset($data['store_image']))  ? $data['store_image']  : null;
        
         if(!empty($data['store_image']))
         {
            if(is_array($data['store_image']))
            {
                $this->store_image = str_replace("./public","",$data['store_image']['tmp_name']);
            }
            else
            {
                $this->store_image = $data['store_image'];
            }
         }else
         {
            $data['store_image'] = null;
         }
      }

     // Add content to these methods:
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();
             $factory     = new InputFactory();

             $inputFilter->add(array(
                 'name'     => 'id',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $file = new FileInput('store_image');
             $file->getValidatorChain()->attach(new UploadFile());
             $file->getFilterChain()->attach(
                new RenameUpload(
                    [
                        'target' => './public/tempuploads/file',
                        'randomize' => true,
                        'use_upload_extension' => true
                    ]
                )
                    );
            $inputFilter->add($file);

            //  $inputFilter->add(array(
            //      'name'     => 'code',
            //      'required' => true,
            //      'filters'  => array(
            //          array('name' => 'StripTags'),
            //          array('name' => 'StringTrim'),
            //      ),
            //      'validators' => array(
            //          array(
            //              'name'    => 'StringLength',
            //              'options' => array(
            //                  'encoding' => 'UTF-8',
            //                  'min'      => 1,
            //                  'max'      => 50,
            //              ),
            //          ),
            //      ),
            //  ));

            //  $inputFilter->add(array(
            //      'name'     => 'name',
            //      'required' => true,
            //      'filters'  => array(
            //          array('name' => 'StripTags'),
            //          array('name' => 'StringTrim'),
            //      ),
            //      'validators' => array(
            //          array(
            //              'name'    => 'StringLength',
            //              'options' => array(
            //                  'encoding' => 'UTF-8',
            //                  'min'      => 1,
            //                  'max'      => 100,
            //              ),
            //          ),
            //      ),
            //  ));

            //  $inputFilter->add(array(
            //     'name'     => 'url',
            //     'required' => true,
            //     'filters'  => array(
            //         array('name' => 'StripTags'),
            //         array('name' => 'StringTrim'),
            //     ),
            //     'validators' => array(
            //         array(
            //             'name' => 'url',
            //             'validator' => 'Callback',
            //             'options' => array(
            //                 'callback' => function ($value) {
    
            //                     if (!filter_var($value, FILTER_VALIDATE_URL) === false) {
            //                         return true;
            //                     } else {
            //                         return false;
            //                     }
            //                 },
            //                 'messages' => 'This is not a valid url address'
            //             ),
            //             'breakChainOnFailure' => true
            //         ),
            //     ),
            // ));

            // $inputFilter->add(array(
            //     'name'     => 'url',
            //     'required' => true,
            //     'filters'  => array(
            //         array('name' => 'StripTags'),
            //         array('name' => 'StringTrim'),
            //     ),
            //     'validators' => array(
            //         array(
            //             'name'    => 'uri',
            //             'options' => array(
                            
            //             ),
            //         ),
            //     ),
            // ));

            // $inputFilter->add(array(
            //     'name'     => 'store_image',
            //     'required' => true,
            //     'filters'  => array(
            //         array('name' => 'StripTags'),
            //         array('name' => 'StringTrim'),
            //     ),
            //     'validators' => array(
            //         array(
            //             'name'    => 'StringLength',
            //             'options' => array(
            //                 'encoding' => 'UTF-8',
            //                 'min'      => 1,
            //                 'max'      => 200,
            //             ),
            //         ),
            //     ),
            // ));

            // $inputFilter->add(
            //     $factory->createInput(array(
            //         'name'     => 'store_image',
            //         'required' => true,
            //     ))
            // );

            
             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }

     
 }

 