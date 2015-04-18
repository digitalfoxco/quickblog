<script type="text/javascript" src="/ckeditor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckeditor/ckfinder/ckfinder.js"></script>

<script language="JavaScript" type="text/javascript">
window.onload = function() {
  var editor = CKEDITOR.replace('content');
  CKFinder.SetupCKEditor( editor, '/ckfinder/');
 
  
};
</script>

<div class="row">
				     <nav>
						<div class="nav-wrapper teal"  style="padding-left: 240px;">
						  <a href="#" class="brand-logo"></a>
						  <ul id="nav-mobile" class="right hide-on-med-and-down">
							<li><a class="white-text" href="sass.html"></a></li>
							<li><a class="white-text" href="components.html"></a></li>
							<li><a class="white-text" href="/logout">Logout</a></li>
						  </ul>
						</div>
					  </nav>
					
					
					<div class="col s2 grey darken-4 sidebar1">
					
						 <ul id="slide-out" class="side-nav fixed center grey darken-4">
							 <li><a class="white-text" href="/admin/dashboard">Dashboard</a></li>
							<li><a class="white-text" href="/admin/home">Home</a></li>
							<li><a class="white-text" href="/admin/about">About</a></li>
							<li><a class="white-text" href="/admin/contact">Contact</a></li>
							<li><a class="white-text" href="/admin/post">Post</a></li>
							<li><a class="white-text" href="/admin/menu">Menu</a></li>
						  </ul>
						  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
					</div>
					
				<!-- Modal Trigger -->
				 <button class="btn-floating btn-large waves-effect waves-light teal" style="margin-top:25px; margin-left:1000px;" id="btnpost" data-target="modal1" class="btn modal-trigger" type="submit" name="action"><i class="mdi-content-add"></i></button>
					 
				 <!-- Modal Structure -->
					<div id="modal1" class="modal">
						<div class="modal-content">
						  <h4>Post Content</h4>
						  <div class="row">
							@include('errors.validation')
						 </div>
						<div class="row">
							<form class="col s12" action="/admin/addpostcontent" method="post" id="formid" enctype="multipart/form-data">
								<input id="csrf_token" type="hidden" name="_token" value="{{ csrf_token() }}">	
									 
									 <div class="row">
										<div class="input-field col s12">
										  <input type="hidden" name="id" id="id"/>
										</div>
									  </div>
									
									  <div class="row">
										<div class="input-field col s12">
										  <input name="title" id="title" type="text" class="validate">
										  <label for="title">Title</label>
										</div>
									  </div>
									  
									  <div class="row">
										<div class="input-field col s12">
										  <input id="sub_title" name="sub_title" type="text" class="validate">
										  <label for="sub_title">Sub-Title</label>
										</div>
									  </div>
									  
									   <div class="row">
											<div class="input-field col s12">
											  <textarea id="content" name="content" class="materialize-textarea"></textarea>
											</div>
										</div>
									  
									  <div class="row">
										<div class="file-field input-field">
										  <input class="file-path validate" type="text"/>
										  <div class="btn">
											<span>File</span>
											<input type="file" name="file"/>
										  </div>
										  <img src="" width="120px" height="80px" id="postimage">
										</div>
									  </div>
									  
										<div class="row">
											<p>
											  <input type="checkbox" name="checkbox" class="filled-in" id="filled-in-box"/>
											  <label for="filled-in-box">Status</label>
											</p>
										</div>
									</div>
								</div>
									<div class="modal-footer">
									  <button class="waves-effect waves-teal btn-flat modal-close" type="button" name="action">Cancel</button>
									  <button class="waves-effect waves-teal btn-flat" type="submit" name="action">Save</button>
									</div>
						
						 </form>
					</div>
				<!-- End Modal Structure -->
						<div class="responsive-table col s10"  style="margin-top:25px;   padding-left:50px;">
							<table>
								<thead>
								  <tr>
									  <th data-field="id">#</th>
									  <th data-field="name">Title</th>
									  <th data-field="price">Sub-Title</th>
									  <th data-field="price">Content</th>
									  <th data-field="price">Status</th>
									  <th data-field="price">Image</th>
									  <th data-field="price">Action</th>
									</tr>
								</thead>
								<tbody>
									{{--*/	$i=1; /*--}}
								@foreach($post as $getpost)
								  <tr>
									<td>{{$i++}}</td>
									<td>{{$getpost->title}}</td>
									<td>{{$getpost->sub_title}}</td>
									<td>{{$getpost->content}}</td>
									@if($getpost->status==1)
									<td>Active</td>
									@else
									<td>Off</td>
									@endif
									<td><img src="/images/{{$getpost->image}}" width="100px" height="80px"></td>
									<td><a class="alert-link updatepost" data-id="{{$getpost->id}}" data-title="{{$getpost->title}}" data-sub-title="{{$getpost->sub_title}}" data-content="{{$getpost->content}}" data-image="/images/{{$getpost->image}}" data-status="{{$getpost->status}}">Update</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/admin/post/delete/{{$getpost->id}}" onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
								  </tr>
								</tbody>
								@endforeach
						   </table>
						</div>
</div>  

<script>


	
$('#btnpost').click(function(){
	$('#modal1').openModal();
	$('.err').hide();
	$('#id').val('');
	$('#title').val('');
	$('#sub_title').val('');
	CKEDITOR.instances['content'].setData('');
	$('#postimage').hide();
	
});



$('.updatepost').click(function(){
	$('#modal1').openModal();
	$('#postimage').show();
	$('.err').hide();
	$('#id').val($(this).attr('data-id'));
	$('#title').val($(this).attr('data-title'));
	$( "#title" ).focus();
	$('#sub_title').val($(this).attr('data-sub-title'));
	$( "#sub_title" ).focus();
	CKEDITOR.instances['content'].setData($(this).attr('data-content'));
	$('#postimage').attr('src',$(this).attr('data-image'));
	if(($(this).attr('data-status'))=='1')
	$('#filled-in-box').prop('checked', true);
	else
	$('#filled-in-box').prop('checked', false);
});

$( document ).ready(function() {
	if($('.err').text()!="")
	{
		$('#modal1').openModal();
	} 
});



</script>

