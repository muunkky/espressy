<ul id="<?=$cafe_id?>_review_list" class="list-group">
	<?php
		
		foreach($reviews as $r){
			if(!empty($r)){
				$this->load->view('list/cafe_review_item',array('r'=>$r));
			}
		}
	?>
</ul>
