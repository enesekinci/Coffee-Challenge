<?php

namespace App\Customers;

use App\Models\StarbucksCustomer;
use SoapClient;

class Starbucks extends Customer
{
    protected $TCNo;

    public function __construct(string $name, string $surname, string $phone, string $birthday, string $TCNo)
    {
        parent::__construct($name, $surname, $phone, $birthday, $TCNo);
        $this->TCNo = $TCNo;
    }

    public function getTable()
    {
        return (new StarbucksCustomer())->getTable();
    }

    public function getMersisNumber()
    {
        return $this->mersisNumber;
    }

    public function setMersisNumber($mersisNumber)
    {
        $this->mersisNumber = $mersisNumber;
    }

    public function checkMersisNumber()
    {
        try {

            $request = new SoapClient('https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL');
            $result = $request->TCKimlikNoDogrula(
                array(
                    'TCKimlikNo' => intval($this->TCNo),
                    'Ad' => $this->name,
                    'Soyad' => $this->surname,
                    'DogumYili' => $this->birthday,
                )
            );

            if ($result->TCKimlikNoDogrulaResult) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // burada farklı bir aksiyon alınabilir...
            # özel mesajda döndürülebilir...
            return false;
        }
    }

    public function save()
    {
        // burada veritabanına kaydedilir...
        $response = [
            'status' => false,
            'message' => 'Kayıt başarısız!',
        ];

        if (!$this->checkMersisNumber()) {
            $response['message'] = 'Mersis numarası doğrulanamadı!';
            return $response;
        }

        if (StarbucksCustomer::where('TCNo', $this->TCNo)->exists()) {
            $response['message'] = 'Bu kullanıcı zaten kayıtlı!';
            return $response;
        }

        try {

            $newCustomer = new StarbucksCustomer();

            $newCustomer->fill([
                'name' => $this->name,
                'surname' => $this->surname,
                'phone' => $this->phone,
                'birthday' => $this->birthday,
                'TCNo' => $this->TCNo
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
