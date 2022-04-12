<?php
include "header.php";
include "config.php";
session_start();
if(!$_SESSION['user']){
  $_SESSION['uid']="No user";
  header("location:./login.php");
}
else{
$post_err="";
$user = $_SESSION['user'];
$uid = $_SESSION['uid'];

$query1 = "SELECT * FROM user WHERE name = '".$user."'";
$query2 = "SELECT * FROM posts WHERE Author = '".$user."'";
$sql1 = mysqli_query($conn,$query1) or die('Something went wrong'.mysqli_error($query1));
$sql2 = mysqli_query($conn,$query2) or die('Something went Wrong'.mysqli_error($query2));
?>
<?php
    $row1 = mysqli_fetch_assoc($sql1);
?>
<div class="card mt-3 mb-3 align-items-center justify-content-center border-0">
  <img src="images/user.png" class="d-block" width="250px" height="250px" alt="...">
  <div class="card-body m-5" style="width:-webkit-fill-available;">
    <h5 class="card-title">Welcome
      <?php echo $row1['name'];?>!
    </h5>
    <fieldset disabled>
      <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Your Name</label>
        <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $row1['name'];?>">
      </div>
      <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Your email</label>
        <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $row1['email'];?>">
      </div>
    </fieldset>
    <button type="button" id="log_out" class="btn btn-outline-warning" data-eid="<?php echo $row1['s.no']?>">Log
      Out</button>
      <a class="btn btn-outline-warning" href="logout.php">Logout</a>
  </div>
</div>
<div class="card border-0 mb-3">
  <h1 class="text-center m-2" style="color:#aaaa;-webkit-text-stroke:2.5px black;text-decoration:underline;"><b><em>YOUR
        PUBLICATIONS</em></b></h1>
  <?php
if(mysqli_num_rows($sql2)<=0){
    echo '<h1 class="text-center">You have not Published anything yet!</h1>';
}
    while($row=mysqli_fetch_assoc($sql2)):
?>
  <div class="card mb-3 m-5" id="card">
    <div class="row">
      <div class="col-md-4">
        <input type="text" id="sno" value="<?php echo $row['s.no']?>" style="display:none;">
        <img src="uploads/<?php echo $row['image'];?>" class="img-fluid rounded-start" width="100%" height="50%"
          alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h3 class="card-title"><b>
              <?php echo $row['title'];?>
            </b></h3>
          <p class="card-text">
            <?php $sub = strip_tags(substr(nl2br($row['matter']),0,100),'<a href><b><i><strong><h1><h2><h3><h4><h5><h6>');echo(nl2br($sub));?>
            ....
          </p>
          <button type="button" name="open" class="btn btn-outline-warning read m-2"
            data-eid="<?php echo $row['s.no']?>">Continue Reading</button>
          <button type="button" name="update" class="btn btn-outline-warning update m-2" data-bs-toggle="modal"
            data-bs-target="#exampleModal" data-eid="<?php echo $row['s.no']?>">Update</button>
          <p class="card-text"><small class="text-muted">Published by
              <?php echo $row['Author'] ?> at
              <?php echo $row['date']; ?>
            </small></p>
        </div>
      </div>
    </div>
  </div>
  <?php endwhile;
  }?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Update Your Blog Here!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-form">
        <form method="post">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary save">Save changes</button>
      </div>
    </div>
  </div>
</div>

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
  $(document).on("click", ".update", function (e) {
    e.preventDefault();
    $('#exampleModal').modal('show');
    var id = $(this).data("eid");
    var update = "update";
    $.ajax({
      url: "profile_ajax.php",
      method: "POST",
      data: {
        id: id,
        update:update
      },
      success: function (data) {
       $('#modal-form').html(data);
      }
    });
  });

  $(document).on("click", ".save", function (e) {
    e.preventDefault();
    var id = $('#user_id').data("eid");
    var title = $('#heading').val();
    var content = $('#content').val();
    var save = "save";
    if(id && title && content){
    $.ajax({
      url: "profile_ajax.php",
      method: "POST",
      data: {
        id: id,
        title:title,
        content:content,
        save:save,
      },
      success: function (data) {
       alert(data);
       location.reload();
      }
    });
    }
    else{
      alert("Fields are not filled!");
    }
  });
</script>