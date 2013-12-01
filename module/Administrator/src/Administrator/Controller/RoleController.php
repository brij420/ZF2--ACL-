<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Administrator\Controller;

//namespace Administrator\Models;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class RoleController extends AbstractActionController {

    protected $roleTable;

    public function indexAction() {
        //  print_r($this->getRoleTable()->fetchAll());
        return new ViewModel(array(
            'roles' => $this->getRoleTable()->fetchAll()
        ));
    }

    public function getRoleAction() {
        //  print_r($this->getRoleTable()->fetchAll());
        echo json_encode(array('roles' => $this->getRoleTable()->fetchAll()));
        exit();
    }

    public function addAction() {
        $request = $this->getRequest();
        $roleinfo = array();
        if ($request->isPost()) {
            $roleinfo = $request->getPost('roleinfo');

            if ($this->getRoleTable()->saveRole(
                            array(
                                'name' => isset($roleinfo['name']) && ($roleinfo['name']) ? $roleinfo['name'] : '',
                                'created' => time())
                    )) {
                echo json_encode(array('addRole' => array('successCode' => '000', 'successMessage' => 'role added successfully!')));
                exit();
            } else {
                echo json_encode(array('addRole' => array('successCode' => '001', 'successMessage' => 'role has not been added, please try again!')));
                exit();
            }
        }
        return new ViewModel();
    }

    public function editAction() {
        $request = $this->getRequest();
        $roleinfo = array();
        if ($request->isPost()) {
            $roleinfo = $request->getPost('roleinfo');

            if ($this->getRoleTable()->updateRole(
                            array(
                                'id' => isset($roleinfo['id']) && ($roleinfo['id']) ? $roleinfo['id'] : '',
                                'name' => isset($roleinfo['name']) && ($roleinfo['name']) ? $roleinfo['name'] : '',
                                'created' => time())
                    )) {
                echo json_encode(array('editRole' => array('successCode' => '000', 'successMessage' => 'role added successfully!')));
                exit();
            } else {
                echo json_encode(array('editRole' => array('successCode' => '001', 'successMessage' => 'role has not been added, please try again!')));
                exit();
            }
        }
        return new ViewModel(array('role' => $this->getRoleTable()->getRole($this->getEvent()->getRouteMatch()->getParam("id"))));
    }

    public function deleteAction() {
        $this->getRoleTable()->deleteRole($this->getEvent()->getRouteMatch()->getParam("id"));
        return $this->redirect()->toRoute('role', array('controller' => 'index',
                    'action' => 'index'));
    }

    public function getRoleTable() {
        if (!$this->roleTable) {
            $sm = $this->getServiceLocator();
            $this->roleTable = $sm->get('Administrator\Models\RoleTable');
        }
        return $this->roleTable;
    }

}
