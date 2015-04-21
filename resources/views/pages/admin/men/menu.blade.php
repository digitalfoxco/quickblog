<script src="/assets/admin/js/menu.js"></script>


<div class="row">
	 <nav>
		<div class="nav-wrapper teal">
		  <a href="#" class="brand-logo"></a>
		  <ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a class="white-text" href="/logout">Logout</a></li>
		  </ul>
		</div>
	  </nav>
</div>
@include('pages.admin.navi')
<div class="row">
	<div class="container">
		<!-- Modal Trigger -->
		 <button class="btn-floating btn-large waves-effect waves-light teal right" id="btnmenu" data-target="modal1" class="btn modal-trigger" type="submit" name="action"><i class="mdi-content-add"></i></button>
	</div>
	
	<div class="container">
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
												<div class="input-field col s12">
												  <input type="hidden" name="id" id="id"/>
												</div>
											  </div>
											
											 <div class="row">
												<div class="input-field col s12">
												  <input name="name" id="name" type="text" class="validate">
												  <label for="name">Name</label>
												</div>
											  </div>
											  
											  <div class="row">
												<div class="input-field col s12">
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

		</div>	
</div>



<div class="row">
   <div class="container right">
			<div class="responsive-table col s10">
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
						    <ul class="pagination right">
								{!! $menu->render() !!}
						   </ul>
					</div>
	</div>
</div>
