<?php

namespace Smart\Geo\Ip;

class IpRepository
{
    /**
     * @param bool $queryRealIp
     * @return null|IpEntity
     */
    public function findIp($queryRealIp = false)
    {
        if ($queryRealIp) {
            return $this->findRealIp();
        }

        if (isset($_SERVER['REMOTE_ADDR'])) {
            return (new IpMapper())->mapArrayEntity(['ip' => $_SERVER['REMOTE_ADDR']]);
        }

        return null;
    }

    /**
     * @return null|IpEntity
     */
    public function findRealIp()
    {
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, 'http://icanhazip.com');
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
        $ip = trim(curl_exec($handle));
        curl_close($handle);

        if (!empty($ip) && preg_match('/^[\d\.]*$/', $ip)) {
            return (new IpMapper())->mapArrayEntity(['ip' => $ip]);
        }
        return null;
    }
}
