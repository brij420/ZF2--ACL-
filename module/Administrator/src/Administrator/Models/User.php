<?php

namespace Administrator\Models;

class User {

    public $id;
    public $username;
    public $password;
    public $email;
    public $fname;
    public $lname;
    public $role_id;
    public $last_logged_in;
    public $is_varified;
    public $varification_link;
    public $forgot_password_link;
    public $image;
    public $created;

    public function exchangeArray($data) {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->password = (isset($data['password'])) ? $data['password'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->fname = (isset($data['fname'])) ? $data['fname'] : null;
        $this->lname = (isset($data['lname'])) ? $data['lname'] : null;
        $this->role_id = (isset($data['role_id'])) ? $data['role_id'] : null;
        $this->last_logged_in = (isset($data['last_logged_in'])) ? $data['last_logged_in'] : null;
        $this->is_varified = (isset($data['is_varified'])) ? $data['is_varified'] : null;
        $this->varification_link = (isset($data['varification_link'])) ? $data['varification_link'] : null;
        $this->forgot_password_link = (isset($data['forgot_password_link'])) ? $data['forgot_password_link'] : null;
        $this->image = (isset($data['image'])) ? $data['image'] : null;
        $this->created = (isset($data['created'])) ? $data['created'] : null;
        return $this;
    }

}