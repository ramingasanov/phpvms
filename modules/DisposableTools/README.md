## Disposable Widgets and Tools Module (For PhpVms v7)

Module provides some widgets and tools for your v7 installation. 

**Installation Steps**

* Manual Install : Upload contents of the package to your root/modules folder via ftp or your control panel's file manager
* GitHub Clone : Clone/pull repository to your root/modules/DisposableTools folder
* PhpVms Module Installer : Go to admin -> addons/modules , click Add New , select downloaded file and click Add Module

**Usage**

Call the widgets anywhere you want like you call/load others
```
@widget('Modules\DisposableTools\Widgets\ActiveUsers')
@widget('Modules\DisposableTools\Widgets\AircraftLists', ['type' => 'location'])
@widget('Modules\DisposableTools\Widgets\AircraftStats', ['id' => $aircraft->id])
@widget('Modules\DisposableTools\Widgets\AirlineStats')
@widget('Modules\DisposableTools\Widgets\AirportAircrafts', ['location' => $airport->id])
@widget('Modules\DisposableTools\Widgets\AirportPireps', ['location' => $airport->id])
@widget('Modules\DisposableTools\Widgets\AirportInfo')
@widget('Modules\DisposableTools\Widgets\FlightTimeMultiplier')
@widget('Modules\DisposableTools\Widgets\PersonalStats', ['disp' => 'full', 'user' => $user->id])
@widget('Modules\DisposableTools\Widgets\TopAirlines', ['count' => 3, 'type' => 'flights'])
@widget('Modules\DisposableTools\Widgets\TopAirports', ['count' => 5, 'type' => 'dep'])
@widget('Modules\DisposableTools\Widgets\TopPilots', ['type' => 'landingrate'])

@widget('Modules\DisposableTools\Widgets\SunriseSunset', ['location' => $airport->id])
@widget('Modules\DisposableTools\Widgets\FlightsMap', ['source' => $hub->id])
@widget('Modules\DisposableTools\Widgets\ActiveBookings')

@widget('Modules\DisposableTools\Widgets\WhazzUpIVAO')
@widget('Modules\DisposableTools\Widgets\WhazzUpVATSIM')
```

Also if you wish (with versions after v2.1.2) you can use short namespaces while calling widgets like.  
Just clean your app cache if short names gives you an error.

```
@widget('DisposableTools::ActiveBookings')
```

**Options: ActiveUsers**

Nothing except mins (minutes for inactivity timer)  
* ['mins' => 3] Sets timer to 3 mins (default is 5 mins)

**Options : AircraftLists**

This widget has only one option called *type* and it displays either your aircraft count according to their locations or a count according the their ICAO type codes.

type can be location,nohubs or icao  
* ['type' => 'icao']
* ['type' => 'location']
* ['type' => 'nohubs'] // Uses Location but hides Hubs from the list

By default widget will display aircraft counts per airport

**Options : AircraftStats**

This widget has only one option called id, just provide an aircraft id and stats will be displayed  
* ['id' => $aircraft->id]

**Options: AirlineStats**

This widget has only one option called airline and it displays either your total system stats or stats for the airline choosed.

airline can be any airline's id number  
* ['airline' => 3] or
* ['airline' => {{ $user->airline->id }}] or
* ['airline' => {{ $flight->airline->id }}] *this depends how and where you want to use the widget

By default widget will display overall stats of your phpvms installation.

**Options : AirportAircrafts**

This widget has only one option called *location* and it displays your aircrafts at given location.

location *must* be an airport_id (4 letter ICAO code)  
* ['location' => 'LTCG'] or
* ['location' => $airport->icao] if you are going to use it in Airports page
* ['location' => $flight->dpt_airport_id] if you are going to use it in Bids or Flight Details page

By default widget will not display any aircrafts as expected

**Options : AirportPireps**

This widget has only one option called *location* and it displays pireps for given location.

location *must* be an airport_id (4 letter ICAO code)  
* ['location' => 'LTAI'] or
* ['location' => $airport->icao] if you are going to use it in Airports page
* ['location' => $flight->dpt_airport_id] if you are going to use it in Bids or Flight Details page

By default widget will not display any pireps as expected

**Options : AirportInfo**

Widget has one option called *type* and it displays your airports according to it.

type can be all, hubs, nohubs.
* ['type' => 'all'] , shows all your airports and this is the default option
* ['type' => 'nohubs'] , shows all your airports EXCEPT your hubs
* ['type' => 'hubs'] , shows ONLY hubs and uses DisposableHubs hub info page for target link

(*This widget is developed by Maco and being used in this module by his permission.*)

**Options: FlightTimeMultiplier**

No options for this, it is just a javascript calculator. Enter hours, minutes and the multiplier to get the result.  
Some VA's or platforms offer double or multiplied hours for some tours and events, thus this may come in handy.

Widget may be placed anywhere you wish, best possible location is your pirep fields.blade, just below or above submit/edit buttons.

**Options : PersonalStats**

For PersonalStats there are four main options which are user, disp, type and period;

user can be any user's id or not used at all  
period can be any number of days (except 0 of course), currentm, lastm, prevm, currenty, lasty, q1, q2, q3, q4 or not used at all  
disp can be full or not used at all  
type can be avglanding, avgscore, avgtime, tottime, avgdistance, totdistance, avgfuel, totfuel, totflight

If no user is defined, widget get current user's data for calculations. This may be used for dashboard or any personal pages where the viewer will be able to see his results. If you want to put some stats on the user's profile page then you need to define the user otherwise every visitor will see their stats :)  
*(['user' => $user->id] is enough to get proper results at user profile page)*

If no period is defined then all accepted reports will be used for calculations, else you will get the result for the last *n* days you provided like Average Landing Rate for flights done in last 15 days  
*(['period' => 7] will give you the last 7 days)*

If you want to have a full card with the result and the info text then use *'disp' => full*, while calling the widget. It should be compatible with the default template and stisla but if you need you can customize the look in the *personalstats.blade* file.  
Also if you are not using English then you can define the text in your own language in the same file.

* ['disp' => 'full', 'user' => $user->id, 'type' => 'totfuel', 'period' => 'lastm'] : Total Fuel Spent During Last Month
* ['disp' => 'full', 'user' => $user->id, 'type' => 'avglanding'] : Average Landing Rate displayed in a card
* ['user' => $user->id, 'type' => 'totdistance', 'period' => 7] : Plain text total distance in last 7 days
* ['user' => $user->id, 'type' => 'totflight', 'period' => 3] : Plain text number of flights in last 3 days 

By default widget will provide average landing rate without any html styling considering the viewer's pireps.

Note for "Quarter (q)" periods, q1 means Quarter 1. Which covers first 3 months of the calendar year, so it is JAN-FEB-MAR and the rest follows the same logic.

**Options: TopAirlines**

For TopAirlines there are three main options.They are count, type and period;

count can be any number you want (except 0 of course)  
type can be flights, time or distance  
period can be currentm, lastm, prevm, currenty or lasty  
* ['count' => 5, 'type' => 'flights']
* ['count' => 10, 'type' => 'time']
* ['count' => 8, 'type' => 'distance']

By default widget will report overall top 3 airlines by their flight counts\
If you want to see your "Best" airline, just set the count to 1

**Options: TopAirports**

For TopAirports there are two options.They are count and type;

count can be any number you want (except 0 of course)  
type can be dep or arr  
* ['count' => 8, 'type' => 'dep']
* ['count' => 5, 'type' => 'arr']

By default (without any options set) widget will report top 3 airports by departure counts

**Options: TopPilots**

For TopPilots there are four main options.They are count, type, period and hub;

count can be any number you want (except 0 of course)  
type can be flights, time, distance or landingrate  
period can be currentm, lastm, prevm, currenty or lasty  
hub can be any 4 letter icao identifier, prefably one of your hubs  

* ['count' => 5, 'type' => 'flights']
* ['count' => 10, 'type' => 'time']
* ['count' => 8, 'type' => 'distance']
* ['count' => 1, 'type' => 'landingrate']
* ['count' => 1, 'type' => 'landingrate', 'hub' => 'LTAI']
* ['count' => 1, 'type' => 'landingrate', 'hub' => $hub->id]

By default widget will report overall top 3 pilots by their flight counts\
If you want to see your "Best" pilot, just set the count to 1  

Update: Widget will now only use Active and On Leave pilots for the list, Deleted / Suspended / Rejected / Pending pilots will not be used  

**Options : SunriseSunset**

This widget has only one option called *location* and it displays sunrise/sunset times of given location.

location *must* be an airport_id (4 letter ICAO code)  
* ['location' => 'LTAI'] or
* ['location' => $airport->id] if you are going to use it in Airports page
* ['location' => $flight->dpt_airport_id] if you are going to use it in Bids or Flight Details page

**Options : FlightsMap**

Shows a Leaflet map from flights or user pireps, Leatlet map itself can be configured/styled via widget blade file if needed.  
Has 3 main options, these are *source* , *visible* and *limit* . Visible and limit should be used in custom cases, provided defaults for them are ok for generic usage.  

if used source *can* be an airport_id (4 letter ICAO code), an airline_id or user (not user_id, plain text *user*) or fleet or can be skipped at all.  
if used visible *must* be either false or true (it show visible flights or hides them - default is true like phpvms and only visible flights are used)  
if used limit *must* be a numeric value like 50, which will limit the flights being drawn on the map. Default is *null* so all flights are drawn.  
* ['source' => 'LTAI'] or
* ['source' => $airport->id] if you are going to use it in Airports page
* ['source' => $hub->id] if you are going to use it in Disposable Hubs Module: Hub Page
* ['source' => $airline->id] if you are going to use it in Disposable Airlines Module: Airline Page
* ['source' => $airline->id, 'limit' => 200] if you are going to use it at Disposable Airlines Module: Airline Page with a limit of max 200 flight.
* ['source' => 'user', 'limit' => 100] if you are going to use it at User Profile page with a limit of last 100 pireps.
* ['source' => 'fleet'] gives you the Fleet Map

To use the widget at phpvms Flights page, there is no need to define a source. Just load/call the widget directly.  
It will follow your admin side settings to filter results (like pilots only see their airline's flights or flight's from their current location)

**Options : WhazzUp Widgets (IVAO & VATSIM)**

There are no widget driven settings for these two, their settings are at Admin -> DisposableTools page.  
Data refresh interval is set to 60 seconds by default, both networks require a minimum of 15 seconds so if you want to lower the defaults, anything below 15 seconds will not work.  
To reduce traffic on your server, I kindly suggest setting refresh interval to something like 180 seconds (3 mins) or 300 seconds (5 mins).

If you defined your custom user profile field names for IVAO/VATSIM something like IVAO_ID or VATSIM-CID etc then you need to use the exact same name in widget settings too.  
Failing this step will result 'No .... Online Flights Found' result even if you have pilots flying online.

Widget does not store any past records or historic data, so what you will get is the latest whazzup data IVAO/VATSIM servers have at that moment.

Only for the first run, you may see 'No Valid Data Found' result, just wait or refresh the page.

---

**Update Notes**

22.AUG.21
* Updated AirportInfo widget, it is now able to use some config options

17.AUG.21
* FlightsMap widget is now capable of displaying fleet member locations.
* A little bugfix / safety measure applied to AircraftLists widget

15.AUG.21
* Improved AircraftLists widget with a new config option and code cleanup
* Improved AirportAircraft widget to use DisposableAirlines routes if it is installed

08.AUG.21
* Another fix for SunriseSunset Widget (still uses core php methods to get times)

07.AUG.21
* Code cleanup on some widgets and some improvements
* Version rounding

24.JUL.21
* Added IVAO and VATSIM WhazzUp Widgets
* Improved Top Pilots widget to filter results for a Hub when needed
* Refactored some helpers

08.JUL.21
* Italian Translation (thanks @Fabietto996)

06.JUL.21
* Improved helpers to match vmsAcars updates (Flaps & Speeds being reported)

01.JUL.21
* Added new widget to show active aircraft + flight bookings (via SimBrief Planning)
* Improved German Translation (thanks @GAE074)

18.JUN.21
* FlightMap Widget will show user's flown city pairs with a different color.

10.JUN.21
* Update helpers to show SimBrief Booking state as AC state too.

03.JUN.21
* Failsafe for $user (thanks @derrobin154)
* German Translation (thanks @derrobin154)

29.MAY.21
* Removed deprecated `Dispo_FlightTypes` function from module helpers

13.MAY.21
* Added a failsafe to FlightsMap (during initial setup of phpvms, admin has no home or current airport)

12.MAY.21
* Fixed FlightMaps Widget controller (pilot company restriction filter)

11.MAY.21
* Added two new widgets
* Added Days decoding function
* Fixed some minor errors in current widgets

---

Safe flights and enjoy.  
Disposable