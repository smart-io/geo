<?php
namespace SmartData\SmartData\Ip;

class IpEntity
{
    /**
     * @var string
     */
    protected $ip;

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     * @return $this
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }
}
