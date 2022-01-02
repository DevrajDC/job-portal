<section id="content">
    <div class="container content">
        <?php
 if (isset($_GET['search'])) {
     # code...
    $category = $_GET['search'];\
 }else{
     $category = '';

 }
   $sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID` AND CATEGORY LIKE '%" . $category ."%' ORDER BY DATEPOSTED DESC" ;
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();


    foreach ($cur as $result) { 
  ?>

        <div class="panel panel-primary">
            <div class="panel-header">
                <div
                    style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 20px;font-weight: bold;color: #000;margin-bottom: 5px;">
                    <a href="<?php echo web_root.'index.php?q=viewjob&search='.$result->JOBID;?>">
                        <?php echo $result->OCCUPATIONTITLE ;?>
                    </a>
                </div>
            </div>
            <div class="panel-body contentbody">
                <div class="col-sm-10">
                    
                    <div class="col-sm-12">
                        <p>Qualification/Work Experience :</p>
                        <ul style="list-style: none;">
                            <li>
                                <?php echo $result->QUALIFICATION_WORKEXPERIENCE ;?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <p>Job Description:</p>
                        <ul style="list-style: none;">
                            <li>
                                <?php echo $result->JOBDESCRIPTION ;?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12">
                        <p>Employer :
                            <?php echo  $result->COMPANYNAME ?>
                        </p>
                        <p>Location :
                            <?php echo  $result->COMPANYADDRESS ?>
                        </p>
                    </div>
                </div>
                <div class="col-sm-2"> <a
                        href="<?php echo web_root; ?>index.php?q=apply&job=<?php echo $result->JOBID;?>&view=personalinfo"
                        class="btn btn-main btn-next-tab">Apply Now !</a></div>
            </div>
            <div class="panel-footer">
                Date Posted :
                <?php echo date_format(date_create($result->DATEPOSTED),'M d, Y'); ?>
            </div>
        </div>
        <?php  } ?>
    </div>
</section>