$.ajax({
				url:'islem.php',
				type:'POST',
				data:$('#form1').serialize(),
				success:function(data){
					alert(data);
				}
			});

			//////
			location.reload();
			/////////