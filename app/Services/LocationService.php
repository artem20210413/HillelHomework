<?php


namespace App\Services;


use App\Models\Post;
use App\Repositories\LocationInterface;
use GeoIp2\Exception\AddressNotFoundException;
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
        return $request->getClientIp() === '127.0.0.1' ?
            rand(1, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(1, 255) :
            $request->getClientIp();
    }

    function getCountry(Request $request)
    {
        try {
            $ip = self::getIp($request);
            $record = $this->reader->city($ip);
            $countryName = $record->country->name;
            return $countryName;
        }catch (AddressNotFoundException $e){
            return $this->getCountry($request);
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
