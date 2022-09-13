<?php

namespace Hightemp\WappNetworkScanner\Scanner;

use Spatie\Fork\Fork;
use Hightemp\WappNetworkScanner\Scanner\Scanner;
use IPv4\SubnetCalculator;

class MultiProcessScanner
{
    public static $aScanFunctions = [];
    public static $aPorts = [];

    public static function fnPrepare()
    {
        
    }

    public static function fnStart()
    {
        $sIPs = $_POST["ips"];
        $sPorts = $_POST["ports"];

        $sIPs = str_replace(" ", "", $sIPs);
        $aIPsLines = explode("\n", $sIPs);
        $aIPs = [];
        foreach ($aIPsLines as $sRow) {
            $aIPs = array_merge($aIPs, explode(",", $sRow));
        }

        $sPorts = str_replace(" ", "", $sPorts);
        $aPortsLines = explode("\n", $sPorts);
        $aPorts = [];
        foreach ($aPortsLines as $sRow) {
            $aPorts = array_merge($aPorts, explode(",", $sRow));
        }

        $oScanner = new Scanner();

        foreach ($aIPs as $sIP) {
            $aIP = explode("/", $sIP);
            $sub = new SubnetCalculator($aIP[0], $aIP[1]);

            foreach ($sub->getAllIPAddresses() as $ipAddress) {
                foreach ($aPorts as $sPort) {
                    $oScanner->addTest($ipAddress, $sPort);
                }
            }
        }

        $oScanner->scan();

        return $oScanner->results;

        // $results = Fork::new()
        //     ->run(
        //         function ()  {
        //             sleep(1);

        //             return 'result from task 1';
        //         },
        //     );
    }
}