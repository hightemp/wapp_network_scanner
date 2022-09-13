<div style="margin-bottom: 10px; padding: 5px; position: sticky; top: 0px; background: #fff; border: 1px solid rgba(0,0,0,0.1);">
    <a class="btn btn-primary" href="?action=get_csv" role="button">CSV</a>
    <a class="btn btn-primary" href="?action=get_results_list" role="button">All</a>
    <a class="btn btn-primary" href="?action=get_results_list&filter=opened" role="button">Opened</a>
    <a class="btn btn-primary" href="?action=get_results_list&filter=closed" role="button">Closed</a>
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
                <td><?php echo date("Y-m-d H:i:s", $oRow->scantime); ?></td>
                <td><?php echo $oRow->ip; ?></td>
                <td><?php echo $oRow->host; ?></td>
                <td><?php echo $oRow->port; ?></td>
                <td><?php echo $oRow->result; ?></td>
                <td></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>