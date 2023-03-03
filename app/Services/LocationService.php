<?php


namespace App\Services;


use App\Models\Post;
use App\Repositories\LocationInterface;
use Illuminate\Http\Request;
use GeoIp2\Database\Reader;

class LocationService implements LocationInterface
{
//    public function __construct(public LocationInterface $location)
//    {
//    }
    private $reader;

    public function __construct()
    {
        $this->reader = new Reader('GeoLite2-City.mmdb');
    }

    static function getIp(Request $request)
    {
        return $request->getClientIp() === '127.0.0.1' ? '77.121.234.210' : $request->getClientIp();
    }

    function getCountry(Request $request)
    {
        $ip = self::getIp($request);
        $record = $this->reader->city($ip);
//        $countryCode = $record->country->isoCode;
        $countryName = $record->country->name;
        return $countryName;
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
