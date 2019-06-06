<section class="company-wrap"> <span id="company" class="pause"></span>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap">
              <h2>Careers</h2>
            </div>
            <ul class="share-print">
              <li><a href="<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe icon-mail"></a></li>
              <li ><a class="a2a_dd icon-share" href="https://www.addtoany.com/share" title="Share"></a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 career-wrap-accordian">
          <?php echo $content->desc; ?>
            <h3>current openings</h3>
            <div class="table-head">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="5%">No.</td>
                  <td width="45%">job title</td>
                  <td width="15%">posted Date</td>
                  <?php /*?><td width="15%">closing Date</td><?php */?>
                  <td width="20%">&nbsp;</td>
                </tr>
              </table>
            </div>
            <div class="wrap-accordion row">
              <ul class="panel-group col-md-12" id="accordion2">
                <?php  $count=count($jobs); $i=1;  if($jobs)foreach($jobs as $job):   ?>
                <li class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion2" href="#collapsecareer<?php echo $i; ?>" class="more-detail table-responsive">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="5%"><?php echo $i; ?></td>
                          <td width="45%"><strong><?php echo $job['title']; ?></strong></td>
                          <td width="15%"><?php echo date('d/m/Y',strtotime($job['job_date'])); ?></td>
                         <?php /*?> <td width="15%"><?php echo date('d/m/Y',strtotime($job['closing'])); ?></td><?php */?>
                          <td width="20%"><button class="more" type="submit">more details</button>
                            <button class="less" type="submit">Less details</button></td>
                        </tr>
                      </table>
                      </a> </h4>
                  </div>
                  <div id="collapsecareer<?php echo $i; ?>" class="panel-collapse collapse <?php if($count==$i) { ?>in<?php } ?>">
                    <div class="panel-body">
                      <div class="col-md-12">
                        <h3><?php echo $job['title']; ?></h3>
                      </div>
                      <?php echo $job['desc']; ?>
                      <div class="col-md-12"> <a class="btn" href="<?php echo site_url('careers/apply/'.$job["slug"])?>">Apply Now</a> </div>
                    </div>
                  </div>
                </li>
                <?php  $i++; endforeach; ?>
              </ul>
              <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
