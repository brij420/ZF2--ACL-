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
use Zend\Session\Container;

class IndexController extends AbstractActionController {

    protected $userTable;
    public $session;

    public function __construct() {
        if (empty($this->session))
            $this->session = new Container('base');
    }

    public function indexAction() {
        if ($this->session->offsetExists('admininfo'))
            $this->redirect()->toRoute('admin', array('controller' => 'index',
                'action' => 'userList'));
        $userinfo = array();
        $request = $this->getRequest();

        if ($request->isPost()) {
            $userinfo = $request->getPost('signin');
           // if ($this->getUserTable()->getUserAuthentication($userinfo['username'], $userinfo['password'])) {
                $this->session->offsetSet('admininfo', $this->getUserTable()->getUserAuthentication($data));
                echo json_encode(array('signin' => array('successCode' => '000', 'successMessage' => 'you are logged-in!')));
                exit();
           // }
        }
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }

    public function isAdminSigninAction() {

        if ($this->session->offsetExists('admininfo')) {
            echo json_encode(array('isAdminSignin' => array('successCode' => '000', 'successMessage' => 'you are logged-in!')));
            exit();
        }
        echo json_encode(array('isAdminSignin' => array('successCode' => '001', 'successMessage' => 'Please logged-in first!')));
        exit();
    }

    public function logoutAction() {
        $this->session->getManager()->getStorage()->clear();
        $this->redirect()->toRoute('admin', array('controller' => 'index',
            'action' => 'index'));
    }

    public function userListAction() {

        return new ViewModel(array(
            'users' => $this->getUserTable()->fetchAll()
        ));
    }

    public function addAction() {
        $request = $this->getRequest();
        $userinfo = array();
        if ($request->isPost()) {
            $userinfo = $request->getPost('userinfo');

            if ($this->getUserTable()->saveUser(
                            array(
                                'username' => isset($userinfo['username']) && ($userinfo['username']) ? $userinfo['username'] : '',
                                'password' => isset($userinfo['password']) && ($userinfo['password']) ? $userinfo['password'] : '',
                                'email' => isset($userinfo['email']) && ($userinfo['email']) ? $userinfo['email'] : '',
                                'fname' => isset($userinfo['fname']) && ($userinfo['fname']) ? $userinfo['fname'] : '',
                                'lname' => isset($userinfo['lname']) && ($userinfo['lname']) ? $userinfo['lname'] : '',
                                'role_id' => isset($userinfo['role_id']) && ($userinfo['role_id']) ? $userinfo['role_id'] : '',
                                'gender' => isset($userinfo['gender']) && ($userinfo['gender']) ? $userinfo['gender'] : '',
                                'created' => time())
                    )) {
                echo json_encode(array('addUser' => array('successCode' => '000', 'successMessage' => 'user added successfully!')));
                exit();
            } else {
                echo json_encode(array('addUser' => array('successCode' => '001', 'successMessage' => 'user has not been added, please try again!')));
                exit();
            }
        }
        return new ViewModel();
    }

    public function editAction() {
        $request = $this->getRequest();
        $userinfo = array();
        if ($request->isPost()) {
            $userinfo = $request->getPost('userinfo');

            if ($this->getUserTable()->updateUser(
                            array(
                                'id' => isset($userinfo['id']) && ($userinfo['id']) ? $userinfo['id'] : '',
                                'username' => isset($userinfo['username']) && ($userinfo['username']) ? $userinfo['username'] : '',
                                'password' => isset($userinfo['password']) && ($userinfo['password']) ? $userinfo['password'] : '',
                                'email' => isset($userinfo['email']) && ($userinfo['email']) ? $userinfo['email'] : '',
                                'fname' => isset($userinfo['fname']) && ($userinfo['fname']) ? $userinfo['fname'] : '',
                                'lname' => isset($userinfo['lname']) && ($userinfo['lname']) ? $userinfo['lname'] : '',
                                'role_id' => isset($userinfo['role_id']) && ($userinfo['role_id']) ? $userinfo['role_id'] : '',
                                'gender' => isset($userinfo['gender']) && ($userinfo['gender']) ? $userinfo['gender'] : '',
                                'created' => time())
                    )) {
                echo json_encode(array('editUser' => array('successCode' => '000', 'successMessage' => 'user added successfully!')));
                exit();
            } else {
                echo json_encode(array('editUser' => array('successCode' => '001', 'successMessage' => 'user has not been added, please try again!')));
                exit();
            }
        }
        return new ViewModel(array('user' => $this->getUserTable()->getUser($this->getEvent()->getRouteMatch()->getParam("id"))));
    }

    public function deleteAction() {
        $this->getUserTable()->deleteUser($this->getEvent()->getRouteMatch()->getParam("id"));
        return $this->redirect()->toRoute('admin', array('controller' => 'index',
                    'action' => 'index'));
    }

    public function getUserTable() {
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('Administrator\Models\UserTable');
        }
        return $this->userTable;
    }

}
