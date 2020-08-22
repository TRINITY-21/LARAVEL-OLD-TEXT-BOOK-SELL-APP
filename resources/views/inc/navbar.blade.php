<nav class="navbar navbar-expand-lg navbar-light bg-dark" style="height:40%;">
    <a class="navbar-brand text-white" href="/">Book<span class="text-danger">Worm</span></a>
    <form action="/search" method="GET" style="display: inline; margin: 0;">
        <div class="input-group">
            <input type="search" name="search" placeholder="Title, Author, ISBN" class="form-control">
            <span class="input-group-prepend">
                <button type="submit" class="btn btn-primary">Search</button>
            </span>
        </div>
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active ">
          <a class="nav-link text-white" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/contact"><i class="fas fa-envelope"></i> Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/books"><i class="fas fa-book"></i> Books</a>
          </li>
          
      </ul>
      
      <ul class="nav navbar-nav navbar-right ml-auto">
            
            @guest
            <li class="nav-item">
                <a class="nav-link text-white" href="/Requestedbook"><i class="fas fa-shopping-cart"></i> Requested Books <span class="badge badge-light">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span></a>
        </li>

         
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
            @else
            <li class="nav-item">
                <a class="nav-link text-white" href="/Requestedbook"><i class="fas fa-shopping-cart"></i> Requested Books <span class="badge badge-light">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span></a>
        </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="/books/create"><i class="fas fa-book"></i> Add Book</a>
            </li>

   

          
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <a class="dropdown-item" href="/dashboard">
                            My Dashboard
                        </a>
                        <a class="dropdown-item" href="/orders">
                            My Orders
                        </a>
                        <a class="dropdown-item" href="/admin">
                            My Admin Panel
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

          <li class="nav-item dropdown">
              <a href="/notifications-panel" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">
                <i data-count="0" class="fas fa-bell notification-icon"></i>
              </a>

              <div class="dropdown-menu dropdown-menu-right aria-labelledby='navbarDropdown">
                <div class="dropdown-toolbar">
                  <div class="dropdown-toolbar-actions">
                    <a class="dropdown-item" href="#">Mark all as read</a>
                  </div>
                  <p class="dropdown-toolbar-title text-center">Notifications (<span class="notif-count">0</span>)</p>
                </div>
                <ul class="dropdown-menu">
                </ul>
                <div class="dropdown-footer text-center">
                  <a class="dropdown-item" href="#">View All</a>
                </div>
              </div>
            </li>

            <script type="text/javascript">
      var notificationsWrapper   = $('.nav-item dropdown');
      var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
      var notificationsCountElem = notificationsToggle.find('i[data-count]');
      var notificationsCount     = parseInt(notificationsCountElem.data('count'));
      var notifications          = notificationsWrapper.find('ul.dropdown-menu');

      if (notificationsCount <= 0) {
        notificationsWrapper.hide();
      }

      // Enable pusher logging - don't include this in production
       Pusher.logToConsole = true;

      var pusher = new Pusher('PUSHER_APP_KEY', {
        encrypted: true
      });

      // Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('Book Requested');

      // Bind a function to a Event (the full Laravel class)
      channel.bind('App\\Events\\CheckoutEvent', function(data) {
        var existingNotifications = notifications.html();
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var newNotificationHtml = `
          <li class="notification active">
              <div class="media">
                <div class="media-left">
                  <div class="media-object">
                    <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                  </div>
                </div>
                <div class="media-body">
                  <strong class="notification-title">`+data.message+`</strong>
                  <!--p class="notification-desc">Extra description can go here</p-->
                  <div class="notification-meta">
                    <small class="timestamp">about a minute ago</small>
                  </div>
                </div>
              </div>
          </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
      });
    </script> 
            @endguest
      </ul>
    </div>
  </nav>