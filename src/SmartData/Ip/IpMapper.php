<?php
namespace SmartData\SmartData\Ip;

class IpMapper
{
    /**
     * @param array $data
     * @return null|IpEntity
     */
    public function mapArrayEntity(array $data)
    {
        $ip = new IpEntity();
        if (isset($data['ip'])) {
            $ip->setIp($data['ip']);
        }
        return $ip;
    }
}
