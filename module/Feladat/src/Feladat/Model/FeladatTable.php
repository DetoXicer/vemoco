<?php
namespace Feladat\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Adapter;
class FeladatTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select(function (Select $select){
			$select->limit(200); }
		);
	
        return $resultSet;
    }
	public function fetchDevice($id,$d_id)
    {
		
        $resultSet = $this->tableGateway->select(function (Select $select) use ($id){
			$select->limit(200); 
			if (isset( $_GET['from'] )and isset( $_GET['to'])) 
			{
				$select->where->like('terminal_id', $id);
				$select->where->between('time', $_GET['from'], $_GET['to']);
			}
			$select->order('time DESC');			
		});
		$adapter = new Adapter(array(
			'driver' => 'Mysqli',
			'database' => 'feladat',
			'username' => 'root',
			'password' => '',
		));
		$adapter->query("INSERT INTO devices (`device_id`) VALUES ('$d_id') ON DUPLICATE KEY UPDATE `device_id` = '$d_id' ", Adapter::QUERY_MODE_EXECUTE);
        return $resultSet;
    }
    public function fetchFromTo($id)
    {
		
        $resultSet = $this->tableGateway->select(function (Select $select) use ($id){
			$select->limit(200); 
			if (isset( $_GET['from'] )and isset( $_GET['to'])) 
			{
				$select->where->like('terminal_id', $id);
				$select->where->between('time', $_GET['from'], $_GET['to']);
			}
			$select->order('time DESC');			
		});
        return $resultSet;
    }
    public function getFeladat($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }


}