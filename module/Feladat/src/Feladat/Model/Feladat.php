<?php
namespace Feladat\Model;

use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface;   // <-- Add this import
use Zend\InputFilter\InputFilterInterface;        // <-- Add this import

class Feladat
{
    public $id;
    public $artist;
    public $title;
    protected $inputFilter;                       // <-- Add this variable
	
	/*
    public function fetchFromTo($id)
    {
		
        $resultSet = $this->tableGateway->select(function (Select $select) use ($id){
			$select->limit(200); 

			$select->where->like('terminal_id', $id);
			$select->where->between('time', $_GET['from'], $_GET['to']);
			$select->order('time DESC');			
		});
        return $resultSet;
    }*/
    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id']))     ? $data['id']     : null;
        $this->terminal_id = (isset($data['terminal_id'])) ? $data['terminal_id'] : null;
        $this->time  = (isset($data['time']))  ? $data['time']  : null;
        $this->type  = (isset($data['type']))  ? $data['type']  : null;
        $this->not_or_war  = (isset($data['not_or_war']))  ? $data['not_or_war']  : null;
    }
    // Add the following method:
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    // Add content to this method:
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

}