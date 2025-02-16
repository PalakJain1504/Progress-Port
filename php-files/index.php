<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Port</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS-folder/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 
</head>
<body>
    <nav>
        <div class="logo-image">
            <img src="images/logo.svg" alt="">
        </div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><button >Log Out</button></li>
        </ul>
    </nav> -->

    <?php
	
include_once dirname(__FILE__).'/inc/config.php'; 


// Fetch all users when 'call_type' is 'get'
if(isset($_GET['call_type']) && $_GET['call_type'] == "get") {
    $q1 = app_db()->select('SELECT * FROM users');
    echo json_encode($q1);
}
 
$q1 = app_db()->select('select * from users');

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function($)
{ 	 
	function create_html_table (tbl_data)
	{
		//--->create data table > start
		var tbl = '';
		tbl +='<table class="table table-hover tbl_project_details">'

			//--->create table header > start
			tbl +='<thead>';
				tbl +='<tr>';
				tbl +='<th>Roll No.</th>';
                    tbl +='<th>Name</th>';
                    tbl +='<th>Email</th>';
                    tbl +='<th>Phone No.</th>';
                    tbl +='<th>Title</th>';
                    tbl +='<th>Domain</th>';
                    tbl +='<th>Faculty Mentor</th>';
                    tbl +='<th>Industry Mentor</th>';
                    tbl +='<th>Presentation</th>';
                    tbl +='<th>Report</th>';
				tbl +='</tr>';
			tbl +='</thead>';
			//--->create table header > end
			
			//--->create table body > start
			tbl +='<tbody>';

				//--->create table body rows > start
				$.each(tbl_data, function(index, val) 
				{
					//you can replace with your database row id
					var row_id = val['row_id'];

					//loop through ajax row data
					tbl +='<tr row_id="'+row_id+'">';
					tbl +='<td ><div class="row_data" edit_type="click" col_name="roll">'+val['roll']+'</div></td>';
                            tbl +='<td ><div class="row_data" edit_type="click" col_name="name">'+val['name']+'</div></td>';
                            tbl +='<td ><div class="row_data" edit_type="click" col_name="email">'+val['email']+'</div></td>';
                            tbl +='<td ><div class="row_data" edit_type="click" col_name="phone">'+val['phone']+'</div></td>';
                            tbl +='<td ><div class="row_data" edit_type="click" col_name="title">'+val['title']+'</div></td>';
                            tbl +='<td ><div class="row_data" edit_type="click" col_name="domain">'+val['domain']+'</div></td>';
                            tbl +='<td ><div class="row_data" edit_type="click" col_name="fmentor">'+val['fmentor']+'</div></td>';
                            tbl +='<td ><div class="row_data" edit_type="click" col_name="indmentor">'+val['indmentor']+'</div></td>';
                            tbl +='<td ><div class="row_data" edit_type="click" col_name="ppt">'+val['ppt']+'</div></td>';
                            tbl +='<td ><div class="row_data" edit_type="click" col_name="presentation">'+val['presentation']+'</div></td>';
        

						//--->edit options > start
						tbl +='<td>';						 
							tbl +='<span class="btn_edit" > <a href="#" class="btn btn-link " row_id="'+row_id+'" > Edit</a> </span>';
							//only show this button if edit button is clicked
							tbl +='<a href="#" class="btn_save btn btn-link"  row_id="'+row_id+'"> Save </a>';
							tbl +='<a href="#" class="btn_cancel btn btn-link" row_id="'+row_id+'"> Cancel </a>';
							tbl +='<a href="#" class="btn_delete btn btn-link1 text-danger" row_id="'+row_id+'"> Delete</a>';
						tbl +='</td>';
						//--->edit options > end						
					tbl +='</tr>';
				});
				//--->create table body rows > end
			tbl +='</tbody>';
			//--->create table body > end

		tbl +='</table>';
		//--->create data table > end

		//add new table row
		tbl +='<div class="text-center">';
			tbl +='<span class="btn btn-primary btn_new_row">Add New Row</span>';
		tbl +='<div>';

		//out put table data
		$(document).find('.tbl_user_data').html(tbl);

		$(document).find('.btn_save').hide();
		$(document).find('.btn_cancel').hide(); 	
		$(document).find('.btn_delete').hide(); 
			
	}


	var ajax_url = "<?php echo APPURL;?>/ajax.php" ;
	var ajax_data = <?php echo json_encode($q1);?>;

	//create table on page load
	//create_html_table(ajax_data);

	//--->create table via ajax call > start
	$.getJSON(ajax_url,{call_type:'get'},function(data) 
	{
		create_html_table(data);
	});
	//--->create table via ajax call > end
	



	//--->make div editable > start
	$(document).on('click', '.row_data', function(event) 
	{
		event.preventDefault(); 

		if($(this).attr('edit_type') == 'button')
		{
			return false; 
		}

		//make div editable
		$(this).closest('div').attr('contenteditable', 'true');
		//add bg css
		$(this).addClass('bg-warning').css('padding','5px');

		$(this).focus();

		$(this).attr('original_entry', $(this).html());

	})	
	//--->make div editable > end

	//--->save single field data > start
	$(document).on('focusout', '.row_data', function(event) 
	{
		event.preventDefault();

		if($(this).attr('edit_type') == 'button')
		{
			return false; 
		}

		//get the original entry
		var original_entry = $(this).attr('original_entry');

		var row_id = $(this).closest('tr').attr('row_id'); 
		
		var row_div = $(this)				
		.removeClass('bg-warning') //add bg css
		.css('padding','')

		var col_name = row_div.attr('col_name'); 
		var col_val = row_div.html(); 
		
		var arr = {};
		//get the col name and value
		arr[col_name] = col_val; 
		//get row id value
		arr['row_id'] = row_id;

		if(original_entry != col_val)
		{ 
			//remove the attr so that new entry can take place
			$(this).removeAttr('original_entry');

			//ajax api json data			 
			var data_obj = 
			{
				row_id: row_id,
				col_name: col_name,
				col_val:col_val,
				call_type: 'single_entry',				
			};
			
			//call ajax api to update the database record
			$.post(ajax_url, data_obj, function(data) 
			{
				var d1 = JSON.parse(data);
				if(d1.status == "error")
				{
					var msg = ''
					+ '<h3>There was an error while trying to update your entry</h3>'
					+'<pre class="bg-danger">'+JSON.stringify(arr, null, 2) +'</pre>'
					+'';

					$('.post_msg').html(msg);
				}
				else if(d1.status == "success")
				{
					var msg = ''
					+ '<h3>Successfully updated your entry</h3>'
					+'<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>'
					+'';

					$('.post_msg').html(msg);
				}
			});
		}
		else
		{
			$('.post_msg').html('');
		}
		
	})	
	//--->save single field data > end

	//--->button > edit > start	
	$(document).on('click', '.btn_edit', function(event) 
	{
		event.preventDefault();
		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		tbl_row.find('.btn_save').show();
		tbl_row.find('.btn_cancel').show();
		tbl_row.find('.btn_delete').show();

		//hide edit button
		tbl_row.find('.btn_edit').hide(); 

		//make the whole row editable
		tbl_row.find('.row_data')
		.attr('contenteditable', 'true')
		.attr('edit_type', 'button')
		.addClass('bg-warning')
		.css('padding','3px')

		//--->add the original entry > start
		tbl_row.find('.row_data').each(function(index, val) 
		{  
			//this will help in case user decided to click on cancel button
			$(this).attr('original_entry', $(this).html());
		}); 		
		//--->add the original entry > end

	});
	//--->button > edit > end


	//--->button > cancel > start	
	$(document).on('click', '.btn_cancel', function(event) 
	{
		event.preventDefault();

		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		//hide save and cacel buttons
		tbl_row.find('.btn_save').hide();
		tbl_row.find('.btn_cancel').hide();
		tbl_row.find('.btn_delete').hide();

		//show edit button
		tbl_row.find('.btn_edit').show();

		//make the whole row editable
		tbl_row.find('.row_data')
		.attr('edit_type', 'click')
		.removeClass('bg-warning')
		.css('padding','') 

		tbl_row.find('.row_data').each(function(index, val) 
		{   
			$(this).html( $(this).attr('original_entry') ); 
		});  
	});
	//--->button > cancel > end

	
	//--->save whole row entery > start	
	$(document).on('click', '.btn_save', function(event) 
	{
		event.preventDefault();
		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		
		//hide save and cacel buttons
		tbl_row.find('.btn_save').hide();
		tbl_row.find('.btn_cancel').hide();
		tbl_row.find('.btn_delete').hide();

		//show edit button
		tbl_row.find('.btn_edit').show();


		//make the whole row editable
		tbl_row.find('.row_data')
		.attr('edit_type', 'click')
		.removeClass('bg-warning')
		.css('padding','') 

		//--->get row data > start
		var arr = {}; 
		tbl_row.find('.row_data').each(function(index, val) 
		{   
			var col_name = $(this).attr('col_name');  
			var col_val  =  $(this).html();
			arr[col_name] = col_val;
		});
		//--->get row data > end

		//get row id value
		arr['row_id'] = row_id;

		//out put to show
		$('.post_msg').html( '<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>');

		//add call type for ajax call
		arr['call_type'] = 'row_entry';

		//call ajax api to update the database record
		$.post(ajax_url, arr, function(data) 
		{
			var d1 = JSON.parse(data);
			if(d1.status == "error")
			{
				var msg = ''
				+ '<h3>There was an error while trying to update your entry</h3>'
				+'<pre class="bg-danger">'+JSON.stringify(arr, null, 2) +'</pre>'
				+'';

				$('.post_msg').html(msg);
			}
			else if(d1.status == "success")
			{
				var msg = ''
				+ '<h3>Successfully updated your entry</h3>'
				+'<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>'
				+'';

				$('.post_msg').html(msg);
			}			
		});
	});
	//--->save whole row entery > end



	$(document).on('click', '.btn_new_row', function(event) 
	{
		event.preventDefault();
		//create a random id
		var row_id = Math.random().toString(36).substr(2);

		//get table rows
		var tbl_row = $(document).find('.tbl_project_details tbody').find('tr');	 
		var tbl = '';
		tbl +='<tr row_id="'+row_id+'">';
			tbl +='<td ><div class="new_row_data roll bg-warning" contenteditable="true" edit_type="click" col_name="roll"></div></td>';
			tbl +='<td ><div class="new_row_data name bg-warning" contenteditable="true" edit_type="click" col_name="name"></div></td>';
			tbl +='<td ><div class="new_row_data email bg-warning" contenteditable="true" edit_type="click" col_name="email"></div></td>';
			tbl +='<td ><div class="new_row_data phone bg-warning" contenteditable="true" edit_type="click" col_name="phone"></div></td>';
			tbl +='<td ><div class="new_row_data title bg-warning" contenteditable="true" edit_type="click" col_name="title"></div></td>';
			tbl +='<td ><div class="new_row_data domain bg-warning" contenteditable="true" edit_type="click" col_name="domain"></div></td>';
			tbl +='<td ><div class="new_row_data fmentor bg-warning" contenteditable="true" edit_type="click" col_name="fmentor"></div></td>';
			tbl +='<td ><div class="new_row_data indmentor bg-warning" contenteditable="true" edit_type="click" col_name="indmentor"></div></td>';
			tbl +='<td ><div class="new_row_data ppt bg-warning" contenteditable="true" edit_type="click" col_name="ppt"></div></td>';
			tbl +='<td ><div class="new_row_data presentation bg-warning" contenteditable="true" edit_type="click" col_name="presentation"></div></td>';


			//--->edit options > start
			tbl +='<td>';			 
				tbl +='  <a href="#" class="btn btn-link btn_new" row_id="'+row_id+'" > Add Entry</a>   | ';
				tbl +='  <a href="#" class="btn btn-link btn_remove_new_entry" row_id="'+row_id+'"> Remove</a> ';
			tbl +='</td>';
			//--->edit options > end	

		tbl +='</tr>';
		tbl_row.last().after(tbl);

		$(document).find('.tbl_project_details').find('tr').last().find('.row_id').focus();
	});

	
	$(document).on('click', '.btn_remove_new_entry', function(event) 
	{
		event.preventDefault();

		$(this).closest('tr').remove();
	});

	function alert_msg (msg)
	{
		return '<span class="alert_msg text-danger">'+msg+'</span>';
	}

	$(document).on('click', '.btn_new', function(event) 
	{
		event.preventDefault();
		
		var ele_this = $(this);
		var ele = ele_this.closest('tr');
		
		//remove all old alerts
		ele.find('.alert_msg').remove();

		//get row id
		var row_id = $(this).attr('row_id');

		//get field names
		var roll = ele.find('.roll');
		var name = ele.find('.name');
		var email = ele.find('.email');
		var phone = ele.find('.phone');
		var title = ele.find('.title');
		var domain = ele.find('.domain');
		var fmentor = ele.find('.fmentor');
		var indmentor = ele.find('.indmentor');
		var ppt = ele.find('.ppt');
		var presentation = ele.find('.presentation');
		



		if(roll.html() == "")
		{
			roll.focus();
			roll.after(alert_msg('Enter First Name'));
		}
		else if(name.html() == "")
		{
			name.focus();
			name.after(alert_msg('Enter Last Name'));
		}
		else if(email.html() == "")
		{
			email.focus();
			email.after(alert_msg('Enter Email'));
		}
		else if(phone.html() == "")
		{
			phone.focus();
			phone.after(alert_msg('Enter Email'));
		}
		else if(title.html() == "")
		{
			title.focus();
			title.after(alert_msg('Enter Email'));
		}
		else if(domain.html() == "")
		{
			domain.focus();
			domain.after(alert_msg('Enter Email'));
		}
		else if(fmentor.html() == "")
		{
			fmentor.focus();
			fmentor.after(alert_msg('Enter Email'));
		}
		else if(indmentor.html() == "")
		{
			indmentor.focus();
			indmentor.after(alert_msg('Enter Email'));
		}
		else if(ppt.html() == "")
		{
			ppt.focus();
			ppt.after(alert_msg('Enter Email'));
		}
		else if(presentation.html() == "")
		{
			presentation.focus();
			presentation.after(alert_msg('Enter Email'));
		}
		else
		{
			var data_obj=
			{
				call_type:'new_row_entry',
				row_id:row_id,
				roll:roll.html(),
				name:name.html(),
				email:email.html(),
				phone:phone.html(),
				title:title.html(),
				domain:domain.html(),
				fmentor:fmentor.html(),
				indmentor:indmentor.html(),
				ppt:ppt.html(),
				presentation:presentation.html(),
			};	
			
			ele_this.html('<p class="bg-warning">Please wait....adding your new row</p>');

			$.post(ajax_url, data_obj, function(data) 
			{
				var d1 = JSON.parse(data);

				var tbl = '';
				tbl +='<a href="#" class="btn btn-link btn_edit" row_id="'+row_id+'" > Edit</a>';
				tbl +='<a href="#" class="btn btn-link btn_save"  row_id="'+row_id+'" style="display:none;"> Save</a>';
				tbl +='<a href="#" class="btn btn-link btn_cancel" row_id="'+row_id+'" style="display:none;"> Cancel</a>';
				tbl +='<a href="#" class="btn btn-link text-warning btn_delete" row_id="'+row_id+'" style="display:none;" > Delete</a>';

				if(d1.status == "error")
				{
					var msg = ''
					+ '<h3>There was an error while trying to add your entry</h3>'
					+'<pre class="bg-danger">'+JSON.stringify(data_obj, null, 2) +'</pre>'
					+'';

					$('.post_msg').html(msg);
				}
				else if(d1.status == "success")
				{
					ele_this.closest('td').html(tbl);
					ele.find('.new_row_data').removeClass('bg-warning');
					ele.find('.new_row_data').toggleClass('new_row_data row_data');
				}
			});
		}
	});



	$(document).on('click', '.btn_delete', function(event) 
	{
		event.preventDefault();

		var ele_this = $(this);
		var row_id = ele_this.attr('row_id');
		var data_obj=
		{
			call_type:'delete_row_entry',
			row_id:row_id,
		};	
		 		 
		ele_this.html('<p class="bg-warning">Please wait....deleting your entry</p>')
		$.post(ajax_url, data_obj, function(data) 
		{ 
			var d1 = JSON.parse(data); 
			if(d1.status == "error")
			{
				var msg = ''
				+ '<h3>There was an error while trying to add your entry</h3>'
				+'<pre class="bg-danger">'+JSON.stringify(data_obj, null, 2) +'</pre>'
				+'';

				$('.post_msg').html(msg);
			}
			else if(d1.status == "success")
			{
				ele_this.closest('tr').css('background','red').slideUp('slow');				 
			}
		});
	});
 
	
});
</script>



<div style="padding:10px;"></div>
 
<div class="container">
	<h1 class="text-center">Project</h1>

	<div style="padding:20px;"></div>

	<div class="panel panel-default">
	  <div class="panel-heading text-center"><h3> Editable HTML Table </h3> </div>

	  <div class="panel-body">
		
		<div class="tbl_user_data"></div>

	  </div>

	</div>

	 

	<div class="panel panel-default">
	  <div class="panel-heading"><b>HTML Table Edits/Upates</b> </div>

	  <div class="panel-body">
		
		<p>All the changes will be displayed below</p>
		<div class="post_msg"> </div>

	  </div>
	</div>
</div>





    <!-- <script src="script.js"></script>
</body>
</html> -->
