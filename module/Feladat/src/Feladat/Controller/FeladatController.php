<?php
namespace Feladat\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Feladat\Model\Feladat;
class FeladatController extends AbstractActionController
{
	protected $feladatTable;
	
    public function indexAction()
    {
		$id = $this->params()->fromRoute('id', 0);
		
        return new ViewModel(array(
            'albums' => $this->getFeladatTable()->fetchDevice($id, $_GET['device_id']),
            'device_id' => $_GET['device_id'],
        ));
    }
	
	public function archiveAction()
    {
		$id = $this->params()->fromRoute('id', 0);
        return new ViewModel(array(
            'albums' => $this->getFeladatTable()->fetchFromTo($id),
			
        ));
    }
	
	public function getFeladatTable()
    {
        if (!$this->feladatTable) {
            $sm = $this->getServiceLocator();
            $this->feladatTable = $sm->get('Feladat\Model\FeladatTable');
        }
        return $this->feladatTable;
    }
}