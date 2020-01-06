# Entry Quick Edit

![](https://img.shields.io/badge/ExpressionEngine-5-3784B0.svg)

This add-on is used to modify default control panel styling in ExpressionEngine. Some of the styling is automatically changed while other parts you have access to modify.

## What is automatically changed?
- The styling on the ‘Main’ navigation menu has been modified so it feels more like a main navigation bar and less like the custom navigation bar.
- Fonts have been smoothed.
- Spacing on the Entry Screen has been tweaked a little.
- A divided line between fields on the Entry Screen has been added.

## What can I change?
- Hide the ‘Files’ button per Member Group*.
- Hide the ‘Developers’ button per Member Group*.
- Hide the 'Live Preview' button per Member Group*.
- Add your own CSS to the control panel.

*Note: Only Member Groups with access to the control panel will show up in this list. It also doesn't remove the ability to them to use this functionality (if they manually type in the URL), it just hides the links.

## How do I add my own CSS to the control panel?
With a config variable, of course!

Create a config variable for 'control_panel_tweaks_user_css' and populate it with the server location of your CSS file.

Example:
```
$config['control_panel_tweaks_user_css'] = $basePath .'/assets/css/mycss.css';
```

## Compatibility
This add-on should work just fine in ExpressionEngine 3 and 4, but I'm  listing it as ExpressionEngine 5 just because I haven't tested it in 3 or 4. The only thing that might be a little offer with 3 or 4 would be some styling tweaks, but it shouldn't cause any issues.
