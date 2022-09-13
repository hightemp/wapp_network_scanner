<div class="container-fluid">
    <div class="row">
        <div class="col-auto">
            <!-- <a class="btn btn-primary" href="?action=start" role="button">Start</a> -->
        </div>
        <div class="col">
            <h3>Port scanner</h3>
        </div>
    </div>
    <div class="row" style="height: calc(100vh - 70px);">
        <div class="col-auto">
            <form action="" target="process-iframe" method="post">
                <div>
                    <textarea name="ips" id="ips" cols="30" rows="10">192.168.31.0/24</textarea>
                </div>
                <div>
                    <textarea name="ports" id="ports" cols="30" rows="10">21, 22, 25, 80, 81, 110, 143, 443, 587, 2525, 330</textarea>
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" name="action" value="Start">
                    <a class="btn btn-danger" href="?action=clean" role="button">Clean</a>
                    <a class="btn btn-success" href="?action=get_results_list" target="results-iframe" role="button">Refresh</a>
                </div>
            </form>
        </div>
        <div class="col">
            <iframe src="?action=get_results_list" frameborder="0" style="width:100%;height:100%" name="results-iframe"></iframe>
            <iframe src="about:blank" frameborder="0" style="width:0px;height:0px" name="process-iframe"></iframe>
        </div>
    </div>
</div>