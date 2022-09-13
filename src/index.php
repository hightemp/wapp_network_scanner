<?php

namespace Hightemp\WappNetworkScanner;

use Hightemp\WappNetworkScanner\Scanner\MultiProcessScanner;

include_once(ROOT_PATH."/RedBeanPHP.php");

use RedBeanPHP\Facade as R;

R::setup( 'sqlite:'.ROOT_PATH.'/data/dbfile.db' );

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
        $sWhere = "WHERE 1=1 ";
        if (isset($_REQUEST['filter'])) {
            if ($_REQUEST['filter']=="opened") {
                $sWhere .= "AND result=1";
            }
            if ($_REQUEST['filter']=="closed") {
                $sWhere .= "AND result=0";
            }
        }
        $aList = R::findAll('results', "{$sWhere} ORDER BY scantime DESC, ip_int ASC");
        ob_start();
        require_once("view/get_results_list.php");
        $sContent = ob_get_clean();
    }
    if ($_REQUEST['action']=="get_csv") {
        R::csv('SELECT * FROM results ORDER BY scantime DESC, ip_int ASC');
        die();
    }
} else {
    ob_start();
    require_once("view/index.php");
    $sContent = ob_get_clean();
}

require_once("view/layout.php");
