<?php
namespace MA9\Repository;

use MA9\Model\Geocode;
use MA9\Model\Coordinate;

class GeocodeRepository
{
    const URL = 'http://geo.search.olp.yahooapis.jp/OpenLocalPlatform/V1/geoCoder';
    const ID = 'dj0zaiZpPTQ3VEI2Mktnc1BvdiZzPWNvbnN1bWVyc2VjcmV0Jng9MmY-';

    public function findByAddress($address)
    {
        $ch = curl_init();

        $param = ['appid' => self::ID, 'query' => $address, 'output' => 'json'];
        curl_setopt($ch, CURLOPT_URL, $this->setParameter($param));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response);
        // 住所情報が見つかった場合
        if($response->ResultInfo->Status == 200) {
            $geos = [];
            foreach($response->Feature as $data) {
                $geo = new Geocode();
                $geo->address = $data->Property->Address;
                $geo->prefecture = substr($data->Property->GovernmentCode, 0, 2);
                $c = explode(',', $data->Geometry->Coordinates);
                $coo = new Coordinate();
                $coo->lat = $c[1];
                $coo->lon = $c[0];
                $geo->coordinate = $coo;
                $geos[] = $geo;
            }
            return $geos;
        }

        return false;
    }
    
    private function setParameter($param)
    {
        return self::URL . '?' . http_build_query($param);
    }
}
