tinymce.init({
		    selector: "textarea",
		    theme: "modern",
		    plugins: [
		        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		        "searchreplace wordcount visualblocks visualchars code fullscreen",
		        "insertdatetime media nonbreaking save table contextmenu directionality",
		        "emoticons template paste textcolor colorpicker textpattern imagetools jbimages"
		    ],
		    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		    toolbar2: "print preview media | forecolor backcolor emoticons | jbimages ",
		    image_advtab: true,
		    relative_urls: false,
		    templates: [
		        {title: 'Test template 1', content: 'Test 1'},
		        {title: 'Test template 2', content: 'Test 2'}
		    ],
				setup: function(ed) {
		    	ed.on('keydown', function(event) {
		        if (event.keyCode == 9) { // tab pressed
		          if (event.shiftKey) {
		            ed.execCommand('Outdent');
		          }
		          else {
		            ed.execCommand('Indent');
		          }

		          event.preventDefault();
		          return false;
		        }
		    });
		}
		});