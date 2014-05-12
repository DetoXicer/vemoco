<?php
namespace FeladatMobile\Controller;

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
            'albums' => $this->getFeladatTable()->fetchFromTo($id),
        ));
    }
	
	public function archiveAction()
    {
		$id = $this->params()->fromRoute('id', 0);
        return new ViewModel(array(
            'albums' => $this->getFeladatTable()->fetchFromTo($id),
        ));
    }

}