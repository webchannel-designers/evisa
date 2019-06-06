<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
            /****** Rating Starts *****/
            @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

            fieldset, label { margin: 0; padding: 0; }
            body{ margin: 20px; }
            h1 { font-size: 1.5em; margin: 10px; }

            .rating2 { 
                border: none;
                float: left;
            }

            .rating2 > input { display: none; } 
            .rating2 > label:before { 
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }

            .rating2 > .half:before { 
                content: "\f089";
                position: absolute;
            }

            .rating2 > label { 
                color: #ddd; 
                float: right; 
            }

            .rating2 > input:checked ~ label, 
            .rating2:not(:checked) > label:hover,  
            .rating2:not(:checked) > label:hover ~ label { color: #FFD700;  }

            .rating2 > input:checked + label:hover, 
            .rating2 > input:checked ~ label:hover,
            .rating2 > label:hover ~ input:checked ~ label, 
            .rating2 > input:checked ~ label:hover ~ label { color: #FFED85;  }     


            /* Downloaded from http://devzone.co.in/ */
        </style>
</head>

<body>
	<?php echo form_open('admin/careers/rateapplication/'.$job->id.'/'.$this->uri->segment(5)); ?>
    <div class="element rating2">
			<input type="radio" id="star1" name="r1" value="1" <?php if($job->rating==1) { ?> checked="checked"<?php } ?> />
            <label class = "full" for="star1" title="Awesome - 1 stars"></label>
           <input type="radio" id="star2" name="r1" value="2" <?php if($job->rating==2) { ?> checked="checked"<?php } ?>  />
           <label class = "full" for="star2" title="Awesome - 2 stars"></label>
           <input type="radio" id="star3" name="r1" value="3" <?php if($job->rating==3) { ?> checked="checked"<?php } ?>  />
           <label class = "full" for="star3" title="Awesome - 3 stars"></label>
            <input type="radio" id="star4" name="r1" value="4" <?php if($job->rating==4) { ?> checked="checked"<?php } ?>  />
            <label class = "full" for="star4" title="Awesome - 4 stars"></label>
            <input type="radio" id="star5" name="r1" value="5" <?php if($job->rating==5) { ?> checked="checked"<?php } ?>  />
            <label class = "full" for="star5" title="Awesome - 5 stars"></label>
	</div>
    <div class="entry">
    <input type="submit" name="butSub" value="Rate" class="button" onclick="$.fn.fancybox.close()" />
    </div>
	<?php echo form_close(); ?>

</body>
</html>