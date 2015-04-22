<script src="/assets/admin/js/post.js"></script>

<script type="text/javascript" src="/ckeditor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckeditor/ckfinder/ckfinder.js"></script>

<script language="JavaScript" type="text/javascript">
window.onload = function() {
  var editor = CKEDITOR.replace('content',{
                  width: 700,
                  resize_maxWidth: 700,
                  resize_minWidth: 700
                 });
  CKFinder.SetupCKEditor( editor, '/ckfinder/');
 
  
};
</script>


<div class="row">
	 <nav>
		<div class="nav-wrapper teal">
		  <a href="#" class="brand-logo"></a>
		  <ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="/logout" class="waves-effect waves-teal btn-flat white-text">Logout</a></li>
		  </ul>
		</div>
	  </nav>
</div>
@include('pages.admin.navi')
<div class="row">
	<div class="container">
		<!-- Modal Trigger -->
		 <button class="btn-floating btn-large waves-effect waves-light teal right" id="btnpost" data-target="modal1" class="btn modal-trigger" type="submit" name="action"><i class="mdi-content-add"></i></button>
	</div>
	
	<div class="container">
	<!-- Modal Structure -->
					<div id="modal1" class="modal">
						<form class="col s12" action="/admin/addpostcontent" method="post" enctype="multipart/form-data">
							<input id="csrf_token" type="hidden" name="_token" value="{{ csrf_token() }}"/>	
										  
						     <div class="modal-content">
						          <h4>Post Content</h4>
						            <div class="row">
										@include('errors.validation')
									</div>
										<div class="row">
											 <div class="row">
												<div class="input-field col s12">
												  <input type="hidden" name="id" id="id"/>
												</div>
											  </div>
											
											  <div class="row">
												<div class="input-field col s12">
												  <input name="title" id="title" value="{{ old('title') }}" type="text" class="validate">
												  <label for="title">Title</label>
												</div>
											  </div>
											  
											  <div class="row">
												<div class="input-field col s12">
												  <input id="sub_title" name="sub_title" value="{{ old('sub_title') }}" type="text" class="validate">
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
												  <input class="file-path validate" type="text" id="imagename"/>
													  <div class="btn">
														<span>File</span>
														<input type="file" name="file"/>
													  </div>
												  <img src="" width="120px" height="80px" id="postimage">
												</div>
											  </div>
											  
												<div class="row">
													<p>
													  <input type="checkbox" name="checkbox" class="filled-in" id="filled-in-box" checked="checked"/>
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

		</div>	
</div>



<div class="row">
   <div class="container right">
			<div class="responsive-table col s10">
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
									@if($getpost->image)
									<td><img src="/images/{{$getpost->image}}" width="100px" height="80px"></td>
									@else
									<td></td>
									@endif
									<td><a class="alert-link updatepost" data-id="{{$getpost->id}}" data-title="{{$getpost->title}}" data-sub-title="{{$getpost->sub_title}}" data-image-name="{{$getpost->image}}" data-content="{{$getpost->content}}" data-image="/images/{{$getpost->image}}" data-status="{{$getpost->status}}">Update</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/admin/post/delete/{{$getpost->id}}" onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
								  </tr>
								</tbody>
								@endforeach
						   </table>
						    <ul class="pagination right">
								{!! $post->render() !!}
						   </ul>
					</div>
	</div>
</div>
