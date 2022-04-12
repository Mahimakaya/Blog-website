<?php
include "header.php";
include "config.php";
error_reporting(-1);

$pager=0;
$total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM posts"));
$record = 5;
$page = ceil($total/$record);
$curr=1;
if(isset($_GET['pager'])){
    $pager = $_GET['pager'];
    if($pager<=0){
        $pager=0;
        $curr=1;
    }
    else{
    $curr = $pager;
    $pager--;
    $pager=$pager*$record;
    }
}

$query = "SELECT * FROM posts limit $pager, $record";
$result =  mysqli_query($conn,$query) or die("Something went wrong");

?>
<style>
    textarea {
        width: 100%;
        border: none;
        background: none;
        font-size: 20px;
        font-family: 'Ariel';
    }

    .card-text {
        font-size: 20px;
    }

    #card {
        box-shadow: 10px 10px 5px #aaaa;
    }

    body {
        background: #f8f9fa;
    }
</style>
<section class="bg-light">
    <div class="card align-items-center bg-light border-0 mb-3">
        <h1 class="text-center m-2" style="color:#aaaa;-webkit-text-stroke:2.5px black;text-decoration:underline;">
            <b><em>PENNED POINT OF VIEWS</em></b></h1>
        <?php
    $output="";
    if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)):
        $title = $row['title'];
    ?>
        <div class="card mb-3 m-5" style="width:80%" id="card">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" id="sno" value="<?php echo $row['s.no']?>" style="display:none;">
                    <img src="uploads/<?php echo $row['image'];?>" class="img-fluid rounded-start" width="100%"
                        height="50%" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title"><b>
                                <?php echo $title;?>
                            </b></h3>
                        <p class="card-text">
                            <?php $sub = strip_tags(substr(nl2br($row['matter']),0,100),'<a href><b><i><strong><h1><h2><h3><h4><h5><h6>');echo(nl2br($sub));?>
                            ....
                        </p>
                        <button type="button" name="open" class="btn btn-outline-warning read"
                            data-eid="<?php echo $row['s.no']?>">Continue Reading</button>
                        <p class="card-text"><small class="text-muted">Published by
                                <?php echo $row['Author']; ?> at
                                <?php echo $row['date']; ?>
                            </small></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; } else{?>No Records Found
        <?php }?>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php if($pager > 1){
          ?>
            <li class="page-item">
                <a class="page-link" href="?pager=<?php echo ($pager/$record)?>" tabindex="-1"
                    aria-disabled="true">Previous</a>
            </li>
            <?php
          }else{?>
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <?php }
    for($i=1;$i<=$page;$i++){
        if($curr==$i){
            ?>
            <li class="page-item active"><a class="page-link" href="javascript:void(0)">
                    <?php echo $i;?>
                </a></li>
            <?php
        }else{
        ?>
            <li class="page-item"><a class="page-link" href="?pager=<?php echo $i?>">
                    <?php echo $i;?>
                </a></li>
            <?php } }?>
            <a class="page-link" href="?pager=<?php echo 2 + ($pager/$record)?>">Next</a>
            </li>
        </ul>
    </nav>
</section>
</body>

<script>
    $(document).on("click", ".read", function (e) {
        var id = $(this).data("eid");
        var show = "show";
        $.ajax({
            url: "published.php",
            method: "POST",
            data: {
                id: id,
                show: show
            },
            success: function (data) {
                if (data) {
                    var doc = window.open('Blog');
                    doc.document.write(data);
                    doc.document.close();
                }
                else {
                    alert("Something went wrong");
                }
            }
        });
    });
</script>

</html>