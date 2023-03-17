<?php


namespace App\Services;


use App\Models\Post;
use App\Repositories\LocationInterface;
use GeoIp2\Exception\AddressNotFoundException;
use Illuminate\Http\Request;
use GeoIp2\Database\Reader;

class LocationService implements LocationInterface
{
    private $reader;

    public function __construct()
    {
        $this->reader = new Reader('GeoLite2-City.mmdb');
    }

    static function getIp(Request $request)
    {
        return $request->getClientIp() === '127.0.0.1' ?
            rand(1, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(1, 255) :
            $request->getClientIp();
    }

    static function getRandomIp()
    {
        return rand(1, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(1, 255);
    }

    function getCountry($ip)
    {
        try {
            $record = $this->reader->city($ip);
            $countryName = $record->country->name;
            return $countryName;
        } catch (AddressNotFoundException $e) {
            return $this->getCountry($ip);
        }

    }

    function getCity(Request $request)
    {
        $ip = self::getIp($request);
        $record = $this->reader->city($ip);
        $cityName = $record->city->name;
        return $cityName;
    }

    function getPostalCode(Request $request)
    {
        $ip = self::getIp($request);
        $record = $this->reader->city($ip);
        $postalCode = $record->postal->code;
        return $postalCode;
    }

}
