<?php
/**
 * Created by PhpStorm.
 * User: ikhsan
 * Date: 21/09/16
 * Time: 13:51
 */

namespace AppBundle\Service;


class UpdateBLStock
{
    private $username, $password;

    const BUKALAPAK_API = "https://api.bukalapak.com/v2/products/";

    /**
     * UpdateBLStock constructor.
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function updateStock($itemId, $price, $numberOfStock) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, UpdateBLStock::BUKALAPAK_API . $itemId . ".json");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_USERPWD, "{$this->username}:{$this->password}");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');

        $product = ["product" => [
            "price" => "{$price}",
            "stock" => "{$numberOfStock}"
        ]];

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($product));
        curl_exec($ch);

        curl_close($ch);
    }

}