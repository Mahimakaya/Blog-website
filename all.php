<?php
include "header.php";
include "config.php";

$query = "SELECT * FROM posts";
$result =  mysqli_query($conn,$query) or die("Something went wrong");
?>
<style>
    textarea{
        width:100%;
        border:none;
        background:none;
        font-size:20px;
        font-family:'Ariel';
    }
    .card-text{
        font-size:20px;
    }
    #card{
        box-shadow:10px 10px 5px #aaaa;
    }
</style>
<div class="card border-0 mb-3">
    <h1 class="text-center m-2"style="color:#aaaa;-webkit-text-stroke:2.5px black;text-decoration:underline;"><b><em>PENNED POINT OF VIEW</em></b></h1>
<?php
    $output="";
    if(mysqli_num_rows($result)<0){
        echo "<h1>No Blogs yet!</h1>";
    }
    while($row=mysqli_fetch_assoc($result)):
        $title = $row['title'];
    ?>
<div class="card mb-3 m-5" id="card">
  <div class="row">
    <div class="col-md-4">
      <input type="text" id="sno" value="<?php echo $row['s.no']?>" style="display:none;">
      <img src="uploads/<?php echo $row['image'];?>" class="img-fluid rounded-start" width="100%" height="50%" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title"><b><?php echo $title;?></b></h3>
        <p class="card-text"><?php $sub = strip_tags(substr(nl2br($row['matter']),0,100),'<a href><b><i><strong><h1><h2><h3><h4><h5><h6>');echo(nl2br($sub));?> ....</p>
        <button type="button" name="open" class="btn btn-outline-warning read" data-eid="<?php echo $row['s.no']?>">Continue Reading</button>
        <p class="card-text"><small class="text-muted">Published <?php echo $row['date']; ?></small></p>
      </div>
    </div>
  </div>
  </div>
<?php endwhile;?>
</div>
</body>

<script>
    $(document).on("click",".read",function(e){
        var id = $(this).data("eid");
        var show = "show";
        $.ajax({
            url:"published.php",
            method:"POST",
            data:{
                id:id,
                show:show
            },
            success:function(data){
                if(data){
                    var doc = window.open('Blog');
                    doc.document.write(data);
                    doc.document.close();
                }
                else{
                    alert("Something went wrong");
                }
            }
        });
    });
    /**
     <div class="col" id="div">
        <div class="card p-0 m-2 bg-light border-light">
            <div class="card-header text-center">
                <input type="text" id="sno" value="" style="display:none;">
                <h4 class="card-title" id="title"><b></b></h4>
            </div>
            <div class="card-body" style="height:75%">
                <img src="uploads/" class="card-img-top" id="img" alt="">  
                <p class="card-text" id="body"></p>
                <button type="button" name="open" class="btn btn-outline-warning read" data-eid="">Read More</button>
            </div>
        </div>
    </div>
     */
</script>
</html>

