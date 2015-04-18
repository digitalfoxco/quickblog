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
				 <button class="btn-floating btn-large waves-effect waves-light teal" style="margin-top:25px; margin-left:1000px;" id="btnmenu" data-target="modal1" class="btn modal-trigger" type="submit" name="action"><i class="mdi-content-add"></i></button>
					 
				 <!-- Modal Structure -->
					<div id="modal1" class="modal">
						<form class="col s12" action="/admin/addmenu" method="post" enctype="multipart/form-data">
							<input id="csrf_token" type="hidden" name="_token" value="{{ csrf_token() }}"/>	
										  
						     <div class="modal-content">
								 <h4>Menu</h4>
								   
								   <div class="row">
										@include('errors.validation')
									</div>
									  
										<div class="row">
											 <div class="row">
												<div class="input-field col s6">
												  <input type="hidden" name="id" id="id"/>
												</div>
											  </div>
											
											  <div class="row">
												<div class="input-field col s6">
												  <input name="name" id="name" type="text" class="validate">
												  <label for="name">Name</label>
												</div>
											  </div>
											  
											  <div class="row">
												<div class="input-field col s6">
												  <input id="path" name="path" type="text" class="validate">
												  <label for="path">Path</label>
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
									  <th data-field="name">Name</th>
									  <th data-field="price">Path</th>
									  <th data-field="price">Status</th>
									  <th data-field="price">Action</th>
									</tr>
								</thead>
								<tbody>
									{{--*/	$i=1; /*--}}
								@foreach($menu as $getmenu)
									<tr>
									<td>{{$i++}}</td>
									<td>{{$getmenu->name}}</td>
									<td>{{$getmenu->path}}</td>
									@if($getmenu->status==1)
									<td>Active</td>
									@else
									<td>Off</td>
									@endif
									<td><a class="alert-link updatemenu" data-id="{{$getmenu->id}}" data-name="{{$getmenu->name}}" data-path="{{$getmenu->path}}" data-status="{{$getmenu->status}}">Update</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/admin/menu/delete/{{$getmenu->id}}" onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
								  </tr>
								</tbody>
								@endforeach
						   </table>
						</div>
</div>  

<script>
	
	

$('#btnmenu').click(function(){
	$('#modal1').openModal();
	$('.err').hide();
	$('#id').val('');
	$('#name').val('');
	$('#path').val('');
	$('#filled-in-box').val('');
	
	
});


$('.updatemenu').click(function(){
	$('#modal1').openModal();
	$('.err').hide();
	$('#id').val($(this).attr('data-id'));
	$('#name').val($(this).attr('data-name'));
	$('#path').val($(this).attr('data-path'));
	$('#name').focus();	
	$('#path').focus();
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

