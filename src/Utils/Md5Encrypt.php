<?php
namespace Payment\Utils;

/**
 * @author: Leon
 * @createTime: 2017-12-20
 * @description: md5加密算法
 */
class Md5Encrypt
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * 设置key
     * @param $key
     * @author helei
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * RSA2签名, 此处秘钥是私有秘钥
     * @param string $data 签名的数组
     * @throws \Exception
     * @return string
     * @author helei
     */
    public function encrypt($data)
    {
        if ($this->key === false) {
            return '';
        }

        $sign = $data . $this->key;
        return md5($sign);

    }

    /**
     * MD5验签 ，此处的秘钥，是自己在第三方平台设置
     * @param string $data 待签名数据
     * @param string $sign 要校对的的签名结果
     * @return bool
     * @author Leon
     */
    public function md5Verify($data, $sign)
    {
        $data = $data . $this->key;
        $mysgin = md5($data);

        if ($mysgin == $sign) {
            
            return true;
        } else {
            
            return false;
        }
    }
}
