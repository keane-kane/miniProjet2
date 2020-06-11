
    <div class="container">
	<div class="col"><h3 class="text-info text-center">Liste des Joueurs</h3></div>
    <div align-right style="margin-bottom:5px;">
			<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
			</div>
			<div class="table-responsive" id="user_data">
    <div id="scrollZone" class="col " style="height: 300px;">
<?php
		$output = '<table class="table" id="mytable">
		<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">Nom</th>
			<th scope="col">Points</th>
			<th scope="col">Modifier</th>
			<th scope="col">Supprimer</th>
			</tr>
		</thead>';

		if ($total_row > 0) {
			foreach ($result as $row) {
		$output .=
				' <tbody id="tbody">
				<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['score'].'pts'.'</td>
				<td><button type="button" class="btn btn-primary btn-sm edit" id="'.$row["id"].'">Edite</button></td>
				<td><button type="button" class="btn btn-danger btn-sm delete" id="'.$row["id"].'">Supprime</button></td>
			</tr>
			</tbody>';
			}
		} else {
				$output .='<td colspan)"4" class="center">Data not found</td>';
		}
		$output .= '</table>';

		echo $output;

		?>
			</div>
			</div>

		</div>
		
		<div id="user_dialog" title="Add Data">
			<form method="post" id="user_form">
				<div class="form-group">
					<label>Entrer le Nom</label>
					<input type="text" name="name" id="name" class="form-control" />
					<span id="error_name" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Entre le Score</label>
					<input type="text" name="score" id="score" class="form-control" />
					<span id="error_score" class="text-danger"></span>
				</div>
				<div class="form-group">
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
				</div>
			</form>
		</div>
		
		<div id="action_alert" title="Action">
			
		</div>
		
		<div id="delete_confirmation" title="Confirmation">
		<p>Are you sure you want to Delete this data?</p>
		</div>
</div>
<!-- <div class="pagination-container">
    <nav>
        <ul class="pagination">
        </ul>
    </nav>
</div> -->

<script>  
$(document).ready(function(){  
	load_data();
    
	function load_data()
	{
        $.ajax({
                type: "POST",
                url: "data/data.php",
                //data: $('form').serialize(),
                data: '',
                dataType: "JSON",
                success: function (data) {
                   if(data){
                       $('#table').load(''); 
                   }
                }
            });
	}

	$("#user_dialog").dialog({
		autoOpen:false,
		width:400
	});
	
	$('#add').click(function(){
		$('#user_dialog').attr('title', 'Add Data');
		$('#action').val('insert');
		$('#form_action').val('Insert');
		$('#user_form')[0].reset();
		$('#form_action').attr('disabled', false);
		$("#user_dialog").dialog('open');
	});
	
	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var error_name = '';
		var error_score = '';
		if($('#name').val() == '')
		{
			error_name = 'First Name is required';
			$('#error_name').text(error_name);
			$('#name').css('border-color', '#cc0000');
		}
		else
		{
			error_name = '';
			$('#error_name').text(error_name);
			$('#name').css('border-color', '');
		}
		if($('#score').val() == '')
		{
			error_score = 'Last Name is required';
			$('#error_score').text(error_score);
			$('#score').css('border-color', '#cc0000');
		}
		else
		{
			error_score = '';
			$('#error_score').text(error_score);
			$('#score').css('border-color', '');
		}
		
		if(error_name != '' || error_score != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"data/action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#user_dialog').dialog('close');
					$('#action_alert').html(data);
					$('#action_alert').dialog('open');
					load_data();
					$('#form_action').attr('disabled', false);
				}
			});
		}
		
	});
	
	$('#action_alert').dialog({
		autoOpen:false
	});
	
	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"data/action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#name').val(data.name);
				$('#score').val(data.score);
				$('#user_dialog').attr('title', 'Edit Data');
				$('#action').val('update');
				$('#hidden_id').val(id);
				$('#form_action').val('Update');
				$('#user_dialog').dialog('open');
			}
		});
	});
	
	$('#delete_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'delete';
				$.ajax({
					url:"data/action.php",
					method:"POST",
					data:{id:id, action:action},
					success:function(data)
					{
						$('#delete_confirmation').dialog('close');
						$('#action_alert').html(data);
						$('#action_alert').dialog('open');
						load_data();
					}
				});
			},
			Cancel : function(){
				$(this).dialog('close');
			}
		}	
	});
	
	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		$('#delete_confirmation').data('id', id).dialog('open');
	});
	
});  
</script>