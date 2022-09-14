<div 
    style="margin-bottom: 10px; padding: 5px; position: sticky; top: 0px; background: #fff; border: 1px solid rgba(0,0,0,0.1);display:flex;gap:5px;"
>
    <a class="btn btn-primary" href="<?php echo $sExportCSVURL ?>" role="button">CSV</a>
    <a class="btn btn-primary" href="<?php echo $sListAllURL ?>" role="button">All</a>
    <a class="btn btn-primary" href="<?php echo $sOpenedURL ?>" role="button">Opened</a>
    <a class="btn btn-primary" href="<?php echo $sClosedURL ?>" role="button">Closed</a>

    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            scantime
        </a>

        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?scantime=all">All</a></li>
            <?php foreach ($aScantimeList as $iI => $aRow): ?>
                <li><a class="dropdown-item" href="<?php echo $aRow['url']; ?>"><?php echo date(DATE_FORMAT, $aRow['scantime']); ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<table class="table table-bordered" style="width:100%;">
    <thead>
        <tr>
            <th scope="col" width="50">#</th>
            <th scope="col" width="200">date</th>
            <th scope="col" width="100">ip</th>
            <th scope="col" width="200">host</th>
            <th scope="col" width="100">port</th>
            <th scope="col" width="50">result</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($aList as $iI => $oRow): ?>
            <tr class="table-<?php echo $oRow->result ? "success" : "light" ; ?>">
                <th scope="row"><?php echo $iI; ?></th>
                <td><?php echo date(DATE_FORMAT, $oRow->scantime); ?></td>
                <td><?php echo $oRow->ip; ?></td>
                <td><?php echo $oRow->host; ?></td>
                <td><?php echo $oRow->port; ?></td>
                <td><?php echo $oRow->result; ?></td>
                <td></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>