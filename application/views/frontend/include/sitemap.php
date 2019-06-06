<section class="content-inner pb-4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="module-head titles eqHeight">
          <div class="row">
            <div class="col-xl-9 col-lg-9">
              <div class="module-title">
                <h2><?php echo $this->pagetitle; ?></h2>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3">
              <div class="utilities">
                <ul>
                  <li><a href="<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe icon-mail"></a></li>
                  <li><a class="a2a_dd " href="https://www.addtoany.com/share" title="Share"><i class="fa fa-share-alt"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view('frontend/include/breadcrumb'); ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="row align-items-end justify-content-end">
              <div class="col-xl-12 col-lg-12">
                <div class="row footer-nav">
                  <div class="col-lg-3 col-md-3"> <?php echo $about; ?> </div>
                  <div class="col-lg-4 col-md-4">
                    <ul id="accordion-foot" role="tablist">
                      <li class="title"><a href="javascript:void(0)">Product Categories</li>
                      <?php $i=1;foreach($categories as $key => $item) { $childs=$this->productcategory_model->get_array_cond(array('parent_id'=>$item['id'],'status'=>'Y'));?>
                      <li><a <?php if(count($childs)>0) { ?>href="javasript:void(0)" <?php } else { ?>href="<?php echo site_url('products/lists/'.$item['slug']); ?>"<?php } ?>><?php echo $item['name']; ?></a>
                        <div class="sitemap">
                          <div class="card-body foot">
                            <ul>
                              <?php foreach($childs as $item) {  ?>
                              <li <?php if($item['slug']==$this->uri->segment(4)) { ?> class="active"<?php } ?>> &nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="<?php echo site_url('products/lists/'.$item['slug']); ?>"><?php echo $item['name']; ?></a></li>
                              <?php  } ?>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <?php $i++; echo ($key%4==3) ? '</ul><ul>' :'';} ?>
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-3"> <?php echo $other; ?> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('frontend/include/social'); ?>
