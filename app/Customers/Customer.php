<?php

namespace App\Customers;

abstract class Customer implements CustomerInterface
{
    protected $name;
    protected $email;
    protected $birthday;

    public function __construct(string $name, string $surname, string $phone, string $birthday)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->birthday = $birthday;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function getAge(): int
    {
        $birthday = new \DateTime($this->birthday);
        $now = new \DateTime();
        $interval = $now->diff($birthday);
        return $interval->y;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setBirthday(string $birthday)
    {
        $this->birthday = $birthday;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
}
