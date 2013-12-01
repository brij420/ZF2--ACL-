<?php

namespace Administrator\Models;

use Zend\Db\TableGateway\TableGateway;

class UserTable {

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

    public function getUser($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            return false;
        }
        return $row;
    }

    public function getUserAuthentication($username, $password) {

        $rowset = $this->tableGateway->select(array('username' => $username, 'password' => md5($password)));
        $row = $rowset->current();
        if (!$row) {
            return false;
        }
        return $row;
    }

    public function saveUser($data = array()) {
        return $this->tableGateway->insert($data);
    }

    public function updateUser($data = array()) {
        return $this->tableGateway->update($data, array('id' => $data['id']));
    }

    public function deleteUser($id) {
        $this->tableGateway->delete(array('id' => (int) $id));
    }

}
