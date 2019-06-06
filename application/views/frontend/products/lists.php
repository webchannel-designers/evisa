<?php if(@$this->input->get_post('type')!="") { @$type=="rental"; } else { @$type=""; }//echo @$_REQUEST['brand']; ?>
<section class="content-inner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-3 col-lg-4">
        <div class="page-title titles eqHeight">
          <h2>Products</h2>
        </div>
        <aside class="page-aside">
          <div class="aside-nav">
            <ul id="accordion" role="tablist">
              <?php $i=1;foreach($categories as $item) { ?>
              <?php
				$childs=$this->productcategory_model->get_array_cond(array('parent_id'=>$item['id'],'status'=>'Y')); 
				?>
              <li class="card <?php if($item['slug']==$this->uri->segment(4)) { ?>active<?php } ?>"> <a data-toggle="<?php if(count($childs)>0) { ?>collapse<?php } else { ?>collapsed<?php } ?>" <?php if($item['slug']==@$parents->slug) { ?> class="collapse"<?php } else { ?>class="collapsed"<?php } ?> href="<?php if(count($childs)>0) { ?>#accord<?php echo $i; ?> <?php } else { echo site_url('products/lists/'.$item['slug']); } ?>" aria-expanded="true"><?php echo $item['name']; ?></a>
                <?php
				  if(count($childs)>0)
				  {
					  if($item['slug']==@$parents->slug)
					  {
					  $clas="show";
					  }
					  else
					  {
						  $clas="";
					  }
				  ?>
                <div class="collapse <?php echo @$clas; ?>" id="accord<?php echo $i; ?>" role="tabpanel" data-parent="#accordion">
                  <div class="card-body">
                    <ul>
                      <?php
					  foreach($childs as $item)
					  {$itemslug = $item['slug'];
//					if($childs>1)
//					{
//						$anchor=site_url('products/brandlists/'.$item['slug']);
//					}
//					else
//					{
//						$anchor=site_url('products/lists/'.$item['slug']);
//					}
                      ?>
                      <li <?php if($itemslug==$this->uri->segment(4)) { ?> class="active"<?php } ?>><a href="<?php echo site_url('products/lists/'.$itemslug); ?>" ><?php echo $item['name']; ?></a></li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
                <?php
				  }
				  ?>
              </li>
              <?php $i++;} ?>
            </ul> 
          </div>
          <div class="filter mt-2">
            <h2 class="col-blue">Filter By Brands</h2>
            <div class="form style-2">
              <form action="<?php echo site_url('products/lists/'); ?>">
                <div class="input-holder">
                  <select name="brands">
                    <option value="">All brands</option>
                    <?php foreach($brands as $item) { ?>
                    <option value="<?php echo $item['slug']; ?>" <?php if(@$_REQUEST['brands']==$item['slug']) { ?> selected="selected"<?php } ?>><?php echo $item['title']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="btn-holder">
                  <button class="btn blue search">Search</button>
                </div>
              </form>
            </div>
          </div>
        </aside>
      </div>
      <div class="col-xl-9 col-lg-8">
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
              <?php /*?>    <!--<li><a href="<?php echo site_url('products/printproduct/'.$this->uri->segment(4))?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe icon-print"></a></li>--><?php */?>
                  <li><a class="a2a_dd " href="https://www.addtoany.com/share" title="Share"><i class="fa fa-share-alt"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-xl-8">
            <?php $this->load->view('frontend/include/breadcrumb'); ?>
          </div>
          <?php /*?><!--<ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Products</a></li>
              <li class="breadcrumb-item"><a href="#">Multifunction Printers</a></li>
            </ol>--> 
          <!--<div class="col-xl-4">
            <div class="filter p-3 mt-2">
            <div class="row">
      <div class="col-md-5">
                <label class="col-blue">Filter By Brands</label>
                </div>
                <div class="col-md-7">
                <div class="form style-2">
                  <form name="frm22" action="<?php echo site_url('products/lists/'.$procat->slug); ?>">
                    <div class="input-holder">
                      <select name="brands" onchange="document.frm22.submit();">
                        <option value="">All brands</option>
                        <?php foreach($brands as $item) { ?>
                        <option value="<?php echo $item['slug']; ?>" <?php if(@$_REQUEST['brands']==$item['slug']) { ?> selected="selected"<?php } ?>><?php echo $item['title']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </form>
                </div>
                </div>
                </div>
              </div>
              </div>--> <?php */?>
        </div>
        <div class="feature-list">
          <div class="row">
            <?php

                      foreach($pagelists as $pagelist)

                      {

                            if($pagelist['image']!="")

                            {

                            $url = base_url('public/uploads/products/'.$pagelist['image']);

                            }

                            else

                            {

                            $url = base_url('public/frontend/images/noimage.jpg');

                            }

                            //print_r($downloads);

                      ?>
            <div class="col-xl-3 col-lg-6 col-md-6">
              <div class="item">
                <h4 class="title"><a href="<?php echo site_url("products/view/".$pagelist['slug']); ?>"><?php echo $pagelist['title']; ?></a></h4>
                <figure><a href="<?php echo site_url("products/view/".$pagelist['slug']); ?>"><img class="img-fluid" src="<?php //echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $url;//."&w=314&h=256&zc=1"; ?>" alt=""/></a></figure>
                <div class="content">
                  <p><?php echo $pagelist['short_desc']; ?></p>
                </div>
                <div class="item-footer"><a class="btn blue br" href="<?php echo site_url("products/view/".$pagelist['slug']); ?>">More Details</a></div>
              </div>
            </div>
            <?php

					  }

					  ?>
          </div>
          <div class="pagination"><?php echo $this->pagination->create_links(); ?></div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('frontend/include/social'); ?>
