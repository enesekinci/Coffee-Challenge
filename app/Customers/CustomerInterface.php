<?php

namespace App\Customers;


interface CustomerInterface
{
    public function getName();
    public function getEmail();
    public function getPhone();
    public function getAddress();

    public function setName(string $name);
    public function setEmail(string $email);
    public function setPhone(string $phone);
    public function setAddress($address);
    public function setBirthday(string $birthday);

    public function getTable();

    public function save();
}
