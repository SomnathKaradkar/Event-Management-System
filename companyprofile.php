<?php
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
    $companyemail=$_POST['companyemail'];
    $companyname=$_POST['companyname'];
    $companyaddress=$_POST['companyaddress'];
    $regno=$_POST['regno'];
    $mobno=$_POST['mobilenumber'];
    $sql="update tblcompany set companyaddress=:companyaddress,companyemail=:companyemail,regno=:regno,companyphone=:mobilenumber,companyname=:companyname ";
    $query = $dbh->prepare($sql);
    $query->bindParam(':companyaddress',$companyaddress,PDO::PARAM_STR);
    $query->bindParam(':companyemail',$companyemail,PDO::PARAM_STR);
    $query->bindParam(':companyname',$companyname,PDO::PARAM_STR);
    $query->bindParam(':regno',$regno,PDO::PARAM_STR);
    $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
    $query->execute();
    if ($query->execute()){
        echo '<script>alert("Profile has been updated")</script>';
    }else{
        echo '<script>alert("update failed! try again later")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
    <div class="container-scroller">
        
        <?php @include("includes/header.php");?>
        
        <div class="container-fluid page-body-wrapper">
            
            
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="float: left;">Institute details</h5>
                                </div>

                                <div class="card-body">
                                    <?php
                                    $sql="SELECT * from  tblcompany ";
                                    $query = $dbh -> prepare($sql);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                        foreach($results as $row)
                                        {  
                                            ?>
                                            <form method="post">
                                                <div class="control-group">
                                                    <label class="control-label" for="basicinput">Logo</label>
                                                    <div class="controls">
                                                        <?php 
                                                        if($row->companylogo=="avatar15.jpg")
                                                        { 
                                                            ?>
                                                            <img class=""  src="assets/img/avatars/avatar15.jpg" alt="" width="100" height="100">
                                                            <?php 
                                                        } else { ?>
                                                             <img style="height: auto; width: 300px;" src="assets/img/companyimages/<?php  echo $row->companylogo;?>" width="150" height="100">
                                                            <?php 
                                                        }
                                                        if($_SESSION['permission'] =="Admin"){

                                                            ?>  
                                                            <a href="update_logo.php?id=<?php echo $companyname;?>">Change logo</a>
                                                            <?php
                                                        } ?>
                                                    </div>
                                                </div>  
                                                <div>&nbsp;</div>
                                                <div class="row">
                                                    <div class="form-group row col-md-6">
                                                        <label class="col-12" for="register1-username">Institute name:</label>
                                                        <div class="col-12">
                                                            <input type="text" class="form-control" name="companyname" value="<?php  echo $row->companyname;?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row col-md-6">
                                                        <label class="col-12" for="register1-email">Institute code:</label>
                                                        <div class="col-12">
                                                            <input type="text" class="form-control" name="regno" value="<?php  echo $row->regno;?>" required='true' >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group row col-md-6">
                                                      <label class="col-12" for="register1-email">physical address:
                                                      </label>
                                                      <div class="col-12">
                                                        <input type="text" class="form-control" name="companyaddress" value="<?php  echo $row->companyaddress;?>" placeholder="Enter company address" required='true'  >
                                                    </div>
                                                </div>
                                                <div class="form-group row col-md-6">
                                                    <label class="col-12" for="register1-email">Institute email:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" name="companyemail" value="<?php  echo $row->companyemail;?>" required='true' >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"> 
                                                <div class="form-group row col-md-6">
                                                    <label class="col-12" for="register1-password">country:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" name="country" value="<?php  echo $row->country;?>" required='true' >
                                                    </div>
                                                </div>
                                                <div class="form-group row col-md-6">
                                                    <label class="col-12" for="register1-password">Contact Number:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" name="mobilenumber" value="<?php  echo $row->companyphone;?>" required='true' placeholder="Enter company contact no" maxlength='10'>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php 
                                        }
                                    } ?>
                                    <br>
                                    <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2" style="float: left;">update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <?php @include("includes/footer.php");?>
            
        </div>
        
    </div>
    
</div>

<?php @include("includes/foot.php");?>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
</body>
<!--  Author Name: Nikhil Bhalerao From India 
 for any PHP, Codeignitor, Laravel OR Python work contact me at +919423979339 OR ndbhalerao91@gmail.com  
 Visit website : www.nikhilbhalerao.com -->
</html>