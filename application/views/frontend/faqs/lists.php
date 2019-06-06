<?php
$str ='<div class=" faq_list"><ul>';
if(count($faqs)>0){
foreach($faqs as $faq): 
$str.="<li>
	    <h6>".$faq['question']."</h6>
		<p>".$faq['answer']." </p>
		</li>";
 endforeach; 
}else{
	$str.="<li>	   
		<p>".convert_lang('No Records Found!',$this->alphalocalization)."</p>
		</li>";
	}
$str.= '</ul></div>';
echo $str;
?>