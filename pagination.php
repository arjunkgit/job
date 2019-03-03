<?php
include('db.php');
$limit = 10;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
if (isset($_GET["searchExp"])) { $searchExp = $_GET["searchExp"]; } else { $searchExp=""; }; 
if (isset($_GET["searchQua"])) { $searchQua  = $_GET["searchQua"]; } else { $searchQua=""; }; 

if($searchExp == "NA"){
    $searchExp = "";
}
if($searchQua == "NA"){
    $searchQua = "";
}

$start_from = ($page-1) * $limit;
$sql = "SELECT * FROM candidateregdata WHERE ( `qua` LIKE  '%$searchQua%' AND `totalExp` LIKE  '%$searchExp%' AND `deactivatePro` = '0') ORDER BY email ASC LIMIT $start_from, $limit";
$rs_result = mysqli_query($con, $sql); 
?>
<div class="table-responsive">
    <table class="table table-condensed table-bordered table-striped">  
    <thead>  
    <tr>  
    <th>ID</th>  
    <th>Email</th>
    <th>Details</th>
    </tr>  
    </thead>  
    <tbody>  
    <?php  
    while ($row = mysqli_fetch_assoc($rs_result)) {  
    ?>  
        <tr>
        <td><?php echo $row["id"]; ?></td>  
        <td><?php echo $row["email"]; ?></td>  
        <td><a onclick="selectDivs(6,'<?php echo $row['email']; ?>')" class="btn btn-info btn-sm ShowAsLink">View Profile</a></td>
        </tr>  
    <?php  
    };  
    ?>  
    <?php
    $limit2 = 10;
    $start_from2 = ($page-1) * $limit2;
    //  $sql2 = "SELECT COUNT(email) FROM (SELECT * FROM candidateregdata WHERE (`qua` LIKE  '%$searchQua%') ORDER BY email";
        $sql2 = "SELECT COUNT(email) FROM candidateregdata WHERE ( `qua` LIKE  '%$searchQua%' AND `totalExp` LIKE  '%$searchExp%' AND `deactivatePro` = '0')  ORDER BY email ";
        $rs_result2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_row($rs_result2);  
        $total_records2 = $row2[0];  
        $total_pages2 = ceil($total_records2 / $limit2);    
    ?>                                  
    <div> 
        <ul class='pagination text-center' id="pagination">
            <?php
                if(!empty($total_pages2)){
                    for($i=1; $i<=$total_pages2; $i++){
                    ?>
                        <li class="<?php echo $start_from2 + 1 == $i ? 'active' : ''; ?>" id="<?php echo $i;?>">
                        <a href='#'><?php echo $i;?></a></li> 
                        <!-- <li id="<?php echo $i;?>"><a href='#'><?php echo $i;?></a></li> -->
                    <?php
                    }
                }
            ?>
        </ul>
    </div>

    </tbody>  
    </table>  
</div>
<script>

    $("#pagination li a").click(function (evt) {
        console.log("clicked");
        evt.preventDefault();
        jQuery("#target-content").html('loading...');
		jQuery("#pagination li").removeClass('active');
		jQuery(this).parent().addClass('active');
        var searchExp = $("#searchExp").val();
        var searchQua = $("#searchQua").val();
        var pageNum = $(this).text();
        var encodedSearch = encodeURI("pagination.php?page="+ pageNum +"&searchExp=" + searchExp + "&searchQua=" + searchQua );  
        jQuery("#target-content").load(encodedSearch);
        
        return false;
    });  
    function selectDivs(data, res) {
        console.log(data + res);
    var scope = angular.element(document.getElementById("mainCtrlEmpDashboard")).scope();
    scope.$apply(function () {
    scope.selectDivs(data, res);
    });
}
</script>