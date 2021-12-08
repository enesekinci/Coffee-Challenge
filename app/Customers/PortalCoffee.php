<?php

namespace App\Customers;

use App\Models\PortalCoffeeCustomer;

class PortalCoffee extends Customer
{

    public function getTable()
    {
        return (new PortalCoffeeCustomer())->getTable();
    }

    public function save()
    {
        // burada veritabanına kaydedilir...
        $response = [
            'status' => false,
            'message' => 'Kayıt başarısız!',
        ];

        try {
            $newCustomer = new PortalCoffeeCustomer();

            $newCustomer->fill([
                'name' => $this->name,
                'surname' => $this->surname,
                'phone' => $this->phone,
                'birthday' => $this->birthday,
            ]);

            if ($newCustomer->save()) {
                $response['status'] = true;
                $response['message'] = 'Kayıt başarılı!';
            }
        } catch (\Throwable $th) {
            $response['status'] = false;
            $response['message'] = 'Kayıt başarısız! Teknik bir hata oluştu.';
        }

        return $response;
    }
}
