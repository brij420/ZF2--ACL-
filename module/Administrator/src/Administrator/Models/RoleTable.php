<?php

namespace Administrator\Models;

use Zend\Db\TableGateway\TableGateway;

class RoleTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        $resultSet = array();
        $rowset = $this->tableGateway->select();
        foreach ($rowset as $value) {
            $resultSet[] = $rowset->current();
        }

        return $resultSet;
    }

    public function getRole($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveRole($data = array()) {
        return $this->tableGateway->insert($data);
    }

    public function updateRole($data = array()) {
        return $this->tableGateway->update($data, array('id' => $data['id']));
    }

    public function deleteRole($id) {
        $this->tableGateway->delete(array('id' => (int) $id));
    }

}
