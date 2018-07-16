<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" id="form-add">
		<input type="text" id="txtfname" name="txtfname">
		<input type="text" id="txtmname" name="txtmname">
		<input type="text" id="txtlname" name="txtlname">
		<input type="hidden" id="txtid" name="txtid" id="txtid" hidden="">
		<button type="button" name="btn-add" onclick="add()" id="btn-add">Add</button>
		<button type="button" name="btn-update" onclick="update()" id="btn-update" hidden="">Update</button>
		<button type="button" name="btn-add" onclick="back()" id="btn-back" hidden="">Back</button>
	</form><br>
	<table id="list-of-user" border="1" >
		<thead>
			<th>#</th>
			<th>Firstname</th>
			<th>Middlename</th>
			<th>Lastname</th>
			<th>Action</th>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</body>
<script type="text/javascript" src="<?=base_url().'public/src/jquery.min.js'?>"></script>
<script type="text/javascript">
	var form = $('#form-add')

	function add(){
		
		var data = form.serializeArray()
	 	$.post("<?= base_url().'crud/add'?>", data, function(data, status){
	        form[0].reset()
	        if(status == "success"){
	        	show()
	        	alert(data)
	        }else{
	        	alert(status)
	        }
	    });
	}

	function show(){
	 	$.get("<?= base_url().'crud/show'?>", function(data, status){
	      	var table = $('#list-of-user >tbody'),
	      	row = JSON.parse(data)
	      	table.empty(),
	      	i = 1
	      	row.forEach(row => {
	      		table.append('<tr><td>'+ i++ +'</td><td>'+row.tfname+'</td><td>'+row.tmname+'</td><td>'+row.tlname+'</td><td><button type="button" onclick="edit('+row.tid+')">Edit</button><button type="button" onclick="delete_('+row.tid+')">Delete</button></td></tr>')
	      	})
	    });
	}

	function edit(id){
		if(Number.isInteger(id) === true){
			form[0].reset()
			var url = "<?= base_url().'crud/edit/'?>"+id
			$("#btn-add").attr("hidden",true);
			$("#btn-back").removeAttr("hidden");
			$("#btn-update").removeAttr("hidden");
			$("#txtid").removeAttr("hidden");
			$.get(url, function(data, status){
	      		var row = JSON.parse(data)
	      		$('#txtfname').val(row.tfname)
	      		$('#txtmname').val(row.tmname)
	      		$('#txtlname').val(row.tlname)
	      		$('#txtid').val(row.tid)
		    })
		}else{
			alert('Opps something wrong')
		}
	}

	function back(){
	    form[0].reset()
		$("#btn-add").removeAttr("hidden");
		$("#btn-update").attr("hidden",true);
		$("#btn-back").attr("hidden",true);
		$("#txtid").attr("hidden",true);
	}

	function update(){
		var data = form.serializeArray()
		$.post('<?= base_url().'crud/update'?>',data, function(data, status){
			show()
	        alert(data)
		})
	}

	function delete_(id){
		var r = confirm('Are you sure want to delete this data ? ')
		if(r == true){
			$.get('<?= base_url().'crud/delete/'?>'+id, function(data, status){
				show()
		        alert(data)
			})
		}else{
			alert('Cancel')
		}
	}

	show()
</script>
</html>