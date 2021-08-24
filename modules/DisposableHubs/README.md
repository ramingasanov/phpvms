## Disposable Hubs Module for phpVMS v7
**Update Notes**

**07.AUG.21**
* Added failsafe for country lookup (ISO codes vs full names)
* Version rounding
* Release zip file structure changed for PhpVms Module Installer compatability.

**08.JUL.21**
* Italian Translation (thanks @Fabietto996)

**06.JUL.21**
* Updated German Translation (thanks @GAE074)

**03.JUN.21**
* German Translation (thanks @derrobin154)

**12.MAY.21**
* Added example placement for Flights Map to Hub Details page (Needs updated DisposableTools Module)

---

This module is compatible with the latest dev build as of 12APR2021, there is no need to modify any default files.  
Technically all blade files (views/pages or whatever you call them) should work with your template but they are mainly designed for Bootstrap compatible themes (like Disposable Themes, Stisla etc).  
So if something looks weird in your template then you need to edit them.

**Installation Steps**

* Manual Install : Upload contents of the package to your root/modules folder via ftp or your control panel's file manager 
* GitHub Clone : Clone/pull repository to your root/modules/DisposableHubs folder
* PhpVms Module Installer : Go to `admin -> addons/modules` , click `Add New` , select downloaded file and click `Add Module`

Go to admin section and enable the module, that's all (only needed for Manual Install and Github Clone)
After enabling/disabling modules an app cache cleaning process IS necessary (check admin/maintenance)

**Usage**

If you want to enable module auto links, then enable frontend link registration commands in ModuleFolder\Providers\....ServiceProvider.php file as shown below;  
(Two forward slashes (//) = Disabled, No forward slashes = Enabled )
```
    $this->moduleSvc->addFrontendLink('Hubs', '/dhubs', 'fas fa-calendar', $logged_in=true);
    // $this->moduleSvc->addFrontendLink('Stats & Leaderboard', '/dstats', 'fas fa-cog', $logged_in=true);
```

Disposable Theme v2 IS capable of recognizing and showing proper links for Disposable Modules but if you need some more control, then you can add links to your navbar (or any other place) with below examples;
```
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
```
<li>
  <a class="nav-link" href="{{ route('DisposableHubs.hshow', ['LTFM']) }}">
    <i class="fas fa-calendar-day"></i>
   <span>LTFM Hub</span>
  </a>
</li>
```
*(Best way to add links in Laravel structure is to use routes like above, but plain html `href="/dhubs/LTFM"` is also possible)*

You are free to edit any of the files as you wish, but please do not expect help/updates for the code you edited (controllers and providers)  
I always try to provide info and support but can not fix things you broke ;) Just share your thoughts about any improvements so we can think together before changing things.

Enjoy,  
Disposable  
12.APR.2021  
