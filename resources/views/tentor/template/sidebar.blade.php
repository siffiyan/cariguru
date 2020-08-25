<!-- Sidebar -->
<div class="profile-sidebar">
	<div class="user-widget">
		<div class="pro-avatar">JD</div>
		<div class="rating">
			<i class="fas fa-star filled"></i>
			<i class="fas fa-star filled"></i>
			<i class="fas fa-star filled"></i>
			<i class="fas fa-star filled"></i>
			<i class="fas fa-star"></i>
		</div>
		<div class="user-info-cont">
			<h4 class="usr-name">{{ session()->get('nama')}}</h4>
			<p class="mentor-type">Mentor</p>
		</div>
	</div>
	<div class="progress-bar-custom">
		<h6>My Point</h6>
		<div class="pro-progress">
			<div class="tooltip-toggle" tabindex="96"></div>
			<div class="tooltip">
				{{session()->get('poin')}}
			</div>
		</div>
		<a href="/tentor/log_point"><small style="float:right;cursor:pointer">Show History Point</small></a>
	</div>
	<br>
	<div class="custom-sidebar-nav">
		<ul>
			<li><a href="/tentor/dashboard" class="active"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="{{route('blog.index')}}"><i class="fab fa-blogger-b"></i>Blog <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="/tentor/profile"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a></li>
			<li><a href="/tentor/logout"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a></li>
		</ul>
	</div>
</div>
<!-- /Sidebar -->
