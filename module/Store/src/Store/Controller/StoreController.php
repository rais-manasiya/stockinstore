<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Store\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Store\Model\Store;        
use Store\Form\StoreForm;
use Store\Model\StoreTable;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
ini_set('display_errors',0);


class StoreController extends AbstractActionController
{
    protected $storeTable;

    public function getcitiesAction()
    {
        $adapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $projectTable = new TableGateway('country', $adapter);
        $rowset = $projectTable->select(); 
        echo json_encode($rowset->toArray());
        
        exit; 

    }

    public function getstateAction()
    {        
        $adapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $projectTable = new TableGateway('region', $adapter);
        $rowset = $projectTable->select(function(Select $select) {
            $select->where(array('country' => $this->getRequest()->getPost()->toArray()['country_id']));             
        });
        echo json_encode($rowset->toArray());
        
        exit; 

    }

    public function indexAction()
    {
        return new ViewModel(array(
            'store' => $this->getStoreTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
         $form = new StoreForm();
         $form->get('submit')->setValue('Submit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $Store = new Store();
             $form->setInputFilter($Store->getInputFilter());


             $post = array_merge_recursive(
                        $request->getPost()->toArray(),
                        $request->getFiles()->toArray()
                    );
                    
             $form->setData($post);
             
             if ($form->isValid()) {
                 $Store->exchangeArray($form->getData());
                 $this->getStoreTable()->saveStore($Store);

                 // Redirect to list of store
                 return $this->redirect()->toRoute('store');
             }
         }
         return array('form' => $form);
    }

    public function getStoreTable()
     {
         if (!$this->storeTable) {
             $sm = $this->getServiceLocator();
             $this->storeTable = $sm->get('Store\Model\StoreTable');
         }
         return $this->storeTable;
     }
        
}
