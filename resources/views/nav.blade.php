<div class="dash-nav dash-nav-dark">
	<header>
		<a href="/dashboard" class="menu-toggle">
			<i class="fas fa-bars"></i>
		</a>
		<a href="" class="ticketpal-logo"><i class="fas fa-sun"></i> <span>TicketPal </span></a>
	</header>
	<nav class="dash-nav-list">
		<a href="/dashboard" class="dash-nav-item">
			<i class="fas fa-home"></i> Dashboard </a>
		<a href="/users" class="dash-nav-item">
			<i class="fas fa-users"></i> User's </a>
		<a href="/tickets" class="dash-nav-item">
			<i class="far fa-file-alt"></i> Ticket's </a>
		<div class="dash-nav-dropdown">
			<a href="javascript:void()" class="dash-nav-item dash-nav-dropdown-toggle">
			<i class="fas fa-cogs"></i> Setting's </a>
			<div class="dash-nav-dropdown-menu">
				<a href="/settings/general" class="dash-nav-dropdown-item">General</a>
			</div>
		</div>
		<div class="dash-nav-dropdown">
			<a href="javascript:void()" class="dash-nav-item dash-nav-dropdown-toggle">
			<i class="fas fa-file-archive"></i> All Ticket's </a>
			@foreach($gstatus as $gs)
			<div class="dash-nav-dropdown-menu">
				<a href="/tickets/open/{{ $gs->status }}" class="dash-nav-dropdown-item">{{ ucfirst(trans($gs->status)) }}<span class="badge badge-pill badge-{{ $gs->status }} float-right ml-2">{{ $gs->total }}</span></a>
			</div>
			@endforeach
		</div>
		<!--div class="dash-nav-dropdown ">
			<a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
				<i class="fas fa-cube"></i> Components </a>
			<div class="dash-nav-dropdown-menu">
				<a href="cards.html" class="dash-nav-dropdown-item">Cards</a>
				<a href="forms.html" class="dash-nav-dropdown-item">Forms</a>
				<div class="dash-nav-dropdown ">
					<a href="#" class="dash-nav-dropdown-item dash-nav-dropdown-toggle">Icons</a>
					<div class="dash-nav-dropdown-menu">
						<a href="icons.html" class="dash-nav-dropdown-item">Solid Icons</a>
						<a href="icons.html#regular-icons" class="dash-nav-dropdown-item">Regular Icons</a>
						<a href="icons.html#brand-icons" class="dash-nav-dropdown-item">Brand Icons</a>
					</div>
				</div>
				<a href="stats.html" class="dash-nav-dropdown-item">Stats</a>
				<a href="tables.html" class="dash-nav-dropdown-item">Tables</a>
				<a href="typography.html" class="dash-nav-dropdown-item">Typography</a>
				<a href="userinterface.html" class="dash-nav-dropdown-item">User Interface</a>
			</div>
		</div>
		<div class="dash-nav-dropdown">
			<a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
				<i class="fas fa-file"></i> Layouts </a>
			<div class="dash-nav-dropdown-menu">
				<a href="blank.html" class="dash-nav-dropdown-item">Blank</a>
				<a href="content.html" class="dash-nav-dropdown-item">Content</a>
				<a href="login.html" class="dash-nav-dropdown-item">Log in</a>
				<a href="signup.html" class="dash-nav-dropdown-item">Sign up</a>
			</div>
		</div-->
		<div class="dash-nav-dropdown">
			<a href="javascript:void()" class="dash-nav-item dash-nav-dropdown-toggle">
				<i class="far fa-gem"></i> About </a>
			<div class="dash-nav-dropdown-menu">
				<a href="https://github.com/TicketPal/TicketPal" target="_blank" class="dash-nav-dropdown-item">GitHub</a>
				<a href="/about" class="dash-nav-dropdown-item">About Us</a>
			</div>
		</div>
	</nav>
</div>