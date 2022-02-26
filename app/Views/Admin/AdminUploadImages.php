<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Alba Educations | Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <!-- Fontawesome CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
<?php include('public/Admin/inc/head.php'); ?>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
       <!-- Header Menu Area Start Here -->
        <?php include ('public/Admin/inc/topbar.php'); ?>
       <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
           <?php include ('public/Admin/inc/sidebar.php'); ?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Upload Gallery Images</h3>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('admin'); ?>">Home</a>
                        </li>
                        <li>Upload Image</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!--  Start Here -->
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="card height-auto">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Add New Image</h3>
                                    </div>
                                </div>
                                <?php
                                if (isset($reg_error)) {
                                ?>
                                    <div class="form-group text-danger"><?php print_r($reg_error); ?></div>
                                <?php
                                };
                                if (isset($message)) {
                                ?>
                                    <div class="form-group text-success"><?php print_r($message); ?></div>
                                <?php
                                };
                                ?>
                                <form class="mg-b-20" method="POST" action="<?php echo base_url('admin/add_new_image');?> " enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                          <div class="mb-3">
                                            <label for="postTitle" class="form-label">Title</label>
                                            <span class="required">*</span>
                                            <input type="text" name="image_name" class="form-control" id="postTitle" >
                                          </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-3">
                                              <label for="" class="form-label">Featured Image</label>
                                              <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg" name="myImage">
                                            </div>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-main btn-hover-bluedark">Save</button>
                                            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-main">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                        <div class="card height-auto">
                            <div class="card-body-new">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>All Images</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                     <table class="table display data-table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </th>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (isset($gallery) && is_array($gallery)) {
                                                    if (count($gallery) > 0) {
                                                        $i = 1;
                                                        foreach($gallery as $gal)
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        
                                                                        <label class="form-check-label"><?php echo $i; ?></label>
                                                                    </div>
                                                                </td>
                                                                <td><?php echo $gal->img_title; ?></td>
                                                                <td><?php echo $gal->updated_at; ?></td>
                                                                
                                                                <td  > 
                                                                    <a href="#" class="deleteImageBtn" id="<?php echo $gal->gallery_id; ?>" >
                                                                        <span class="badge bg-danger">Delete</span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php $i++;
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
                </div>
                <!--  End Here -->

            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
  <?php include('public/Admin/inc/foot.php'); ?>
</body>

<script>
     $(".deleteImageBtn").click(function(){
      var verify = confirm("Delete this Image permanently?");
      if (verify == true) {
        var id = $(this).attr('id');
        window.location.href = "<?php echo base_url().'/admin/remove_image/'?>"+id;
      } else {
      }
    })
      
</script>

</html>