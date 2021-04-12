#Disposable Hubs Module for phpVMS v7 (v1.0)

This module is compatible with the latest dev build as of 12APR2021, there is no need to modify any default files.\
Technically all blade files (views/pages or whatever you call them) should work with your template but they are mainly designed for Bootstrap compatible themes (like Disposable Themes, Stisla etc). 

So if something looks weird in your template then you need to edit them.

***** Installation Steps 

Upload contents of the package (or pull/clone from GitHub) to your root/modules/DisposableHubs folder\
Go to admin section and enable the module, that's all\
After enabling/disabling modules an app cache cleaning process is necessary (check admin/maintenance)

***** Usage

If you want to disable module auto links and add your own according to your template, then dashout 2 frontend link registration commands in the Providers\HubsServiceProvider.php file as shown below;\
(Two forward slashes will make them disabled.)

    // $this->moduleSvc->addFrontendLink('Hubs', '/dhubs', 'fas fa-calendar', $logged_in=true);
    // $this->moduleSvc->addFrontendLink('Stats & Leaderboard', '/dstats', 'fas fa-cog', $logged_in=true);
    
Then you can add links to your navbar with below examples;

```html
<li>
  <a class="nav-link" href="{{ route('DisposableHubs.hindex') }}">
    <i class="fas fa-paper-plane"></i>
    <span>Hubs</span>
  </a>
</li>

<li>
  <a class="nav-link" href="{{ route('DisposableHubs.dstats') }}">
    <i class="fas fa-calendar-alt"></i>
    <span>Statistics & LeaderBoards</span>
  </a>
</li>
```

Also having a direct link to a specific hub is possible with
```html
<li>
  <a class="nav-link" href="{{ route('DisposableHubs.hshow', ['LTFM']) }}">
    <i class="fas fa-calendar-day"></i>
   <span>LTFM Hub</span>
  </a>
</li>
```
(Best way to add links in Laravel structure is to use routes like above, but plain html `href="/dhubs/LTFM"` is also possible)

You are free to edit any of the files as you wish, but please do not expect help/updates for the code you edited (controllers and providers)\
I always try to provide info and support but can not fix things you broke ;) Just share your thoughts about any improvements so we can think together before changing things.

Enjoy,\
Disposable\
12.APR.2021
