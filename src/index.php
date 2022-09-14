<?php

namespace Hightemp\WappNetworkScanner;

use Hightemp\WappNetworkScanner\Scanner\MultiProcessScanner;
use League\Url\Url;

include_once(ROOT_PATH."/RedBeanPHP.php");

use RedBeanPHP\Facade as R;

R::setup( 'sqlite:'.ROOT_PATH.'/data/dbfile.db' );

define("DATE_FORMAT", "Y-m-d H:i:s");

$sURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$sURL .= "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$sContent = "";

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action']=="clean") {
        R::wipeAll();
        header("Location: ?");
        die();
    }
    if ($_REQUEST['action']=="Start") {

        $iScanTime = time();
        $aList = MultiProcessScanner::fnStart();

        foreach ($aList as $sIP => $aPorts) {
            foreach ($aPorts as $sPort => $bResult) {
                $oResult = R::dispense('results');
                $oResult->scantime = $iScanTime;
                $oResult->ip = $sIP;
                $oResult->ip_int = ip2long($sIP);
                $oResult->host = gethostbyaddr($sIP);
                $oResult->host = $oResult->host==$sIP ? "" : $oResult->host;
                $oResult->port = $sPort;
                $oResult->result = $bResult;
                R::store($oResult);
            }
        }

        // header("Location: ?action=get_results_list");
        echo '<script>window.parent.frames[0].location.reload();</script>';
        die('ok');
    }
    if ($_REQUEST['action']=="get_results_list") {
        $aScantimeList = R::getAll('SELECT DISTINCT(scantime) AS scantime FROM results ORDER BY scantime DESC' );

        $oURL = Url::createFromUrl($sURL);
        array_unshift($aScantimeList, ["scantime" => "all"]);
        $aScantimeList = array_map(function($aI) use ($oURL) { 
            $oQ = $oURL->getQuery();
            $oQ->modify($aI);
            $aI['url'] = $oURL.'';
            return $aI;
        }, $aScantimeList);

        $aPortsList = R::getAll('SELECT DISTINCT(port) AS port FROM results' );

        $oURL = Url::createFromUrl($sURL);
        array_unshift($aPortsList, ["port" => "all"]);
        $aPortsList = array_map(function($aI) use ($oURL) { 
            $oQ = $oURL->getQuery();
            $oQ->modify($aI);
            $aI['url'] = $oURL.'';
            return $aI;
        }, $aPortsList);

        $oURL = Url::createFromUrl($sURL);
        $oQ = $oURL->getQuery();
        $oQ->modify(['action'=>'get_results_list']);
        $sListAllURL = $oURL.'';

        $oURL = Url::createFromUrl($sURL);
        $oQ = $oURL->getQuery();
        $oQ->modify(['filter'=>'closed']);
        $sClosedURL = $oURL.'';

        $oURL = Url::createFromUrl($sURL);
        $oQ = $oURL->getQuery();
        $oQ->modify(['filter'=>'opened']);
        $sOpenedURL = $oURL.'';

        $oURL = Url::createFromUrl($sURL);
        $oQ = $oURL->getQuery();
        $oQ->modify(['export'=>'csv']);
        $sExportCSVURL = $oURL.'';

        $sWhere = "WHERE 1=1 ";

        if (isset($_REQUEST['scantime']) && $_REQUEST['scantime'] != "all") {
            $sWhere .= " AND scantime=".((int) $_REQUEST['scantime']);
        }

        if (isset($_REQUEST['port']) && $_REQUEST['port'] != "all") {
            $sWhere .= " AND port=".((int) $_REQUEST['port']);
        }

        if (isset($_REQUEST['filter'])) {
            if ($_REQUEST['filter']=="opened") {
                $sWhere .= " AND result=1";
            }
            if ($_REQUEST['filter']=="closed") {
                $sWhere .= " AND result=0";
            }
        }

        if (isset($_REQUEST['export'])) {
            if ($_REQUEST['export']=="csv") {
                R::csv("SELECT * FROM results {$sWhere} ORDER BY scantime DESC, ip_int ASC");
                die();
            }
        }

        $aList = R::findAll('results', "{$sWhere} ORDER BY scantime DESC, ip_int ASC");
        ob_start();
        require_once("view/get_results_list.php");
        $sContent = ob_get_clean();
    }
} else {
    ob_start();
    require_once("view/index.php");
    $sContent = ob_get_clean();
}

require_once("view/layout.php");
