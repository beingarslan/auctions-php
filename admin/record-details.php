<?php
include '../admin/head.php';
include '../admin/header.php';
include '../admin/sidebar.php';

if($_SESSION['loggedinuserrole']=="User") {
    header('Location: ../index.php');
    die();
}
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="filter"></i></div>
                                    Record Details
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="card mb-4">
                    <div class="card-header">
                       
                       <button style="float: right;"type="button" class="btn btn-primary" onclick="printTable()">
                          Print to PDF
                        </button>
                    </div>
                    <div class="card-body" >
                        <div id="printable" style="width: 100%;">
                        <table id="datatablesSimple" >
                            <thead>
                                <tr>
                                    <th width="1%">Pieces</th>
                                    <th>HM</th>
                                     <th width="35%">Desc</th>
                                    <th>Type</th>
                                    <th>ERG</th>
                                    <th>NMFC</th>
                                    <th>CLS</th>
                                    <th>WGT</th>
                                    <th>NET WGT</th>

                                </tr>
                            </thead>
                
                            <tbody id="WalkEventsList">
                            <?php
include '../db.php';

$i = 0;
$id = $_GET['id'];
$sql = "SELECT * from f_new where id = '$id'";
$run_query = mysqli_query($db, $sql);
if (mysqli_num_rows($run_query) > 0) {
    while ($row1 = mysqli_fetch_assoc($run_query)) {

        $i++;
        $pieces = explode(",", $row1['qty']);
        $hm = explode(",", $row1['hm']);
        $desc = explode(",", $row1['description']);
        $type = explode(",", $row1['type']);
        $erg = explode(",", $row1['erg']);
        $cyls = explode(",", $row1['cyls']);
        $nmfc = explode(",", $row1['nmfc']);
        $lbs_wl_per = explode(",", $row1['lbs_wl_per']);
        $netwgt = explode(",", $row1['netwgt']);
foreach ($cyls as $key => $value) {
    
            ?>
                                <tr>
                                    <!-- <td><?php echo $i; ?></td> -->
                                    <td><?php echo $value; ?></td>
                                    <td><?php echo $hm[$key]; ?></td>
                                    <td><?php echo $desc[$key]; ?></td>
                                    <td><?php echo $type[$key]; ?></td>
                                    <td><?php echo $erg[$key]; ?></td>
                                    <td><?php echo $nmfc[$key]; ?></td>
                                    <td><?php echo $cyls[$key]; ?></td>
                                    <td><?php echo $lbs_wl_per[$key]; ?></td>
                                    <td><?php echo $netwgt[$key]; ?></td>
                                </tr>
                                <?php
   
    }
}
}

?>



                            </tbody>
                        </table>
</div>
                    </div>
                </div>

            </div>
        </main>
        <?php
        include '../admin/footer.php';
        ?>
    </div>
    <script>
       
       function printTable(){
		// hide dataTable-top
        $('.dataTable-top').hide();
        // hide dataTable-bottom
        $('.dataTable-bottom').hide();
		var _h = $('head').clone()
		var _p = $('#printable').clone()
		var _d = "<p class='text-center'><b>Project Progress Report as of (<?php echo date("F d, Y") ?>)</b></p>"
		_p.prepend(_d)
		_p.prepend(_h)
		var nw = window.open("","","width=1200,height=600")
		nw.document.write(_p.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
			nw.close()
			end_load()
		},750)
	}
    </script>
    