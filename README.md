# Grafana integration into FarmOS

This module provides a basic integration of a Grafana instance into farmOS.

After installing this module you will be able to link a specific panel from Grafana to an Asset. All Asset-Types inside farmOS will have a new field called Grafana Panel Link. Also a new menu entry is added on the toolbar. It allows to directly access Grafana from inside farmOS without opening another tab in your browser.

## Installation

1. Download the repo, either by cloning it or by using the "Download as Zip" function from GitHub. 
1. Copy the folder (farm_grafana_integration) (!not the zip) into `/www/web/sites/all/modules/farm/`.
1. Open your farmOS instance online. Go to `Administration -> Extend`. 
1. Search for "Grafana".
1. Select it by clicking the checkbox and scroll down to the bottom of the page and hit `Install`
1. Finished

## Usage

### Using the Grafana instance in farmOS

1. Click `Settings` in the top right corner.
1. Click on the `Grafana`-Tab.
1. Paste in your Grafana Instance URL and click `Save configuration`.

If you click on `Grafana` entry in the left toolbar, you will open up the site you just pasted inside the settings.

### Link a specific panel to an Asset

1. Open the dashboard of the panel inside your Grafana Instance.
1. Click in the top bar of your panel (where the name is)
1. Select `Share`. Inside the `Share` popup go to `Embed`.
1. Here you will be greeted with some HTML source code. In the `iframe` tag a `src` is defined. Copy the value of that e.g. the URL of that specific panel. (only the URL, not the ")
1. Now open up the Asset you want the panel linked to inside farmOS. Scroll in the edit/create window until yu find the `Grafana Panel Link` input.
1. Paste the panel URL into that field. Save the Asset.

If you now navigate to this specific Asset the Panel will be shown there.

## What is happening in the background

No matter what URL you paste in, may it be Grafana or something else, that website will be displayed.
In the background everything is done via iFrames.

So feel free to use it for something else. Maybe you want to link a calendar or a Node-Red instance or something completly different. Be creative!

There is also no real authentification done to Grafana. So it will show only a Login Page instead of the Grafana Panel as long as you are not logged in.
A workaround is to use farmOS as an OAuth Authentification Service. With the help of that you can use the login from farmOS in Grafana.

## Troubles in production

I use NGINX to make my services available. In the configuration of my Grafana Service I had to set this option:

```
proxy_hide_header X-Frame-Options;
```

Otherwise Grafana would not load up. Also worth mentioning is: My farmOS and Grafana instance run on the same server with the same URL (other then the subdomain). I didn't test this module with external services.

## Special Thanks
Special Thanks go out to:
Michael Stenta - https://github.com/mstenta
Paul Weidner - https://github.com/paul121
