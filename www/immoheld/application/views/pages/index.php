<div class="container">
	<?php
		echo form_open('', array('class' => 'padding-top', 'id' => 'filterForm'));

		echo("<div class='row mt-3 mb-3'>");
		echo("<div class='col-sm-3'>");
		echo form_label('Size', '', array());
		echo form_input(array(
								'name' => 'size',
								'id' => 'size',
								'value' => '',
								'class' => 'form-control',
								'type' => 'number',
								'min' => 1,
						));
		echo("</div >");

		echo("<div class='col-sm-3'>");
		echo form_label('Price', '', array());
		echo form_input(array(
								'name' => 'price',
								'id' => 'price',
								'value' => '',
								'class' => 'form-control',
								'type' => 'number',
								'min' => 1
						));
		echo("</div >");

		echo("<div class='col-sm-3 pt-4 mt-1'>");
		echo form_submit(array(
								 'name' => '',
								 'id' => 'search',
								 'value' => 'Search',
								 'class' => 'btn btn-primary btn-sm mt-2'
						 ));
		echo("</div>");
		echo("</div>");

		echo form_close();
	?>

	<table class="table table-striped table-bordered" id="data-table">
		<thead>
			<th>Address</th>
			<th class="sortable" data-columnName="price">Price <i class="fa fa-fw "></i></th>
			<th class="sortable" data-columnName="size">Size <i class="fa fa-fw "></i></th>
		</thead>
		<tbody>
		<!-- Table body content goes here -->
		</tbody>
	</table>
	<div id="loading" class="text-center">Loading...</div>
</div>
