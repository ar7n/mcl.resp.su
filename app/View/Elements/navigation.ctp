    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Студенческая лига</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?
            $menuItems = array(
                'Города' => '/admin/cities',
                'Университеты' => '/admin/universities',
                'Команды' => '/admin/parties'
            );
            foreach ($menuItems as $title => $url){
              if (isset($currentMenuItem) && $currentMenuItem == $title) {
                echo '<li class="active"><a href="' . $url . '">' . $title . '</a></li>';
              }
              else {
                echo '<li><a href="' . $url . '">' . $title . '</a></li>';
              }
            }
            ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="/">На сайт</a>
            </li>
            <li>
              <a href="/logout">Выход</a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>