<?php
namespace MA9\Repository;

use MA9\Model\Maker;

class MakerRepository
{
    const URL = 'http://sakenote.herokuapp.com/api/v1/makers';
    const TOKEN = 'fa8da5014955aab9091ef13f0ba3909ab6cd8195';
    
    /*
    * 都道府県から酒造を検索
    *
    * @param    $code
    * @return   array(Maker)
    */
    public function findByPrefecture($code)
    {
        $ch = curl_init();

        $param = ['token' => self::TOKEN, 'prefecture_code' => $code];
        curl_setopt($ch, CURLOPT_URL, $this->setParameter($param));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response, TRUE);
        $makers = [];
        foreach($response['makers'] as $array) {
            $maker = new Maker();
            $maker->setProperties($array);
            $makers[] = $maker;
        }
        
        return $makers;
    }
    
    /*
    * パラメータをセットする
    *
    * @param    $param
    * @return   string
    */
    private function setParameter($param) 
    {
        return self::URL . '?' . http_build_query($param);
    }
}
