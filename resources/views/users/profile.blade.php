@extends('layouts.bg_user')


@section('content')
	
	<script>
		$(document).ready(function() {
		    var brand = document.getElementById('logo-id');
		    brand.className = 'attachment_upload';
		    brand.onchange = function() {
		        document.getElementById('fakeUploadLogo').value = this.value.substring(12);
		    };

		    // Source: http://stackoverflow.com/a/4459419/6396981
		    function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            
		            reader.onload = function(e) {
		                $('.img-preview').attr('src', e.target.result);
		            };
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
		    $("#logo-id").change(function() {
		        readURL(this);
		    });
		});

	</script>
	<style>
		
		.form-control, .thumbnail {
		    border-radius: 2px;
		}
		.btn-danger {
		    background-color: #B73333;
		}

		/* File Upload */
		.fake-shadow {
		    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
		}
		.fileUpload {
		    position: relative;
		    overflow: hidden;
		}
		.fileUpload #logo-id {
		    position: absolute;
		    top: 0;
		    right: 0;
		    margin: 0;
		    padding: 0;
		    font-size: 33px;
		    cursor: pointer;
		    opacity: 0;
		    filter: alpha(opacity=0);
		}
		.img-preview {
		    width: 350px;
		    height: 350px;
		}
	</style>
	<div class="container">
		<div class="">
			<h3 class="text-center">Preview an image before it is uploaded</h3>
			<hr />
			
			<div class="col-md-4 col-md-offset-4">
			    <div class="form-group">
	              <div class="main-img-preview">
	                <img class="rounded-circle img-preview" src="http://farm4.static.flickr.com/3316/3546531954_eef60a3d37.jpg" title="Preview Logo">
	              </div>
	              <div class="input-group">
	                <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
	                <div class="input-group-btn">
	                  <div class="fileUpload btn btn-danger fake-shadow">
	                    <span><i class="glyphicon glyphicon-upload"></i> Upload Logo</span>
	                    <input id="logo-id" name="logo" type="file" class="attachment_upload">
	                  </div>
	                </div>
	              </div>
	              <p class="help-block">* Upload your company logo.</p>
	            </div>
			</div>
		</div>
	</div>
	

@endsection