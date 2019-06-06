<?php /*?><section class="content-inner pb-4">
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
                  <!--<li><a href="<?php echo site_url('products/printproduct/'.$this->uri->segment(4))?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe icon-print"></a></li>-->
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
              <div class="col-xl-12 col-lg-12"> <?php echo $content->desc; ?> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><?php */?>
<?php //$this->load->view('frontend/include/social'); ?>

<?php if($this->uri->segment(4)=='about-us' ) {?>

<section class="blue-bg padding-tb25">
      <div class="container">
        <div class="row">
          <div class="col-md-6"><h3 class="section-inner-txt"><?php echo $this->pagetitle; ?></h3></div>
          <div class="col-md-6">
            <nav aria-label="breadcrumb">
            <?php /*?><ol class="breadcrumb breadcrumb-title">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">about us</li>
            </ol><?php */?>
            <?php $this->load->view('frontend/include/breadcrumb'); ?>
          </nav>
          </div>
        </div>
      </div>
    </section>
<section class="section">
        <div class="container">
          
           <?php echo $content->desc; ?>
          
        </div>
    </section>
<?php } else { ?>

<section class="blue-bg padding-tb25">
      <div class="container">
        <div class="row">
          <div class="col-md-6"><h3 class="section-inner-txt">about us</h3></div>
          <div class="col-md-6">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-title">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">about us</li>
            </ol>
          </nav>
          </div>
        </div>
      </div>
    </section>
    
    <section class="section">
        <div class="container">
          
          
          <div class="col-md-12">
            <div class="row">    
              <?php echo $content->desc; ?>
            </div>
          </div>
        </div>
    </section>
    <?php } ?>