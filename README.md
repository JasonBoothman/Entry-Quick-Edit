# Entry-Quick-Edit

![](https://img.shields.io/badge/ExpressionEngine-4-3784B0.svg)
![](https://img.shields.io/badge/ExpressionEngine-5-3784B0.svg)

This add-on allows you to add an edit button that directly links to the entry being viewed and only displays if the user has channel privileges.

## Button
```
{exp:entry_quick_edit:button entry_id="12"}
```
This will display a pre-styled button on the page if the user has permissions to the channel the entry is in. The button tag is best used for single-entry pages.

#### Required Parameters
*entry_id:* The Entry ID of the entry being viewed/linked to.

#### Optional Parameters
*color:* Set font color of the button. Default value is `#fff`.

*color-hover:* Set the font color of the button on hover. Default value is `#fff`.

*background-color:* Set the background color of the button. Default value is `##ff6600`.

*background-color-hover:* Set the background color of the button on hover. Default value is `#cf5402`.

## URL
```
{exp:entry_quick_edit:url entry_id="12"}
```

This will return the edit url of the entry if the user has permissions t othe channel the entry is in. The url tag is besed use in circumstances where you want completely control over the styling, markup or would like to have multiple edit buttons on a page (such as a news listing page).
