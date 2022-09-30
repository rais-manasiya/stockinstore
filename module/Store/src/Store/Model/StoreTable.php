<?php
namespace Store\Model;

use Zend\Db\TableGateway\TableGateway;

class StoreTable 
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
    //     $resultSet = $this->tableGateway->select();
    //     return $resultSet;

        $sqlSelect = $this->tableGateway->getSql()->select();
		$sqlSelect->columns(array('*'));
		$sqlSelect->join('country', 'country.country_id = store.country', array(), 'inner');
		$resultSet= $this->tableGateway->selectWith($sqlSelect);
       
		return $resultSet;


        //SELECT s.*, c.name as cntname, r.name as region FROM `store` s JOIN country as c ON c.country_id = s.country JOIN region as r on r.country = c.country_id WHERE 1 GROUP by s.id 
    }

    public function getStore($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveStore(Store $store)
     {
         $data = array(
             'code' => $store->code,
             'name'  => $store->name,
             'description'  => $store->description,
             'URL' => $store->URL,
             'type' => $store->type,
             'stock_import' => $store->stock_import,
             'store' => $store->store,
             'address1' => $store->address1,
             'address2' => $store->address2,
             'country' => $store->country,
             'state' => $store->state,
             'city' => $store->city,
             'postalcode' => $store->postalcode,
             'store_locator' => $store->store_locator,
             'store_image' => $store->store_image,    
         );
         $id = (int) $store->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getStore($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Store id does not exist');
             }
         }
     }

     
}