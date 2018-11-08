<p align="center">
  <a href="https://github.com/LiamBailey/WooCommerce-Vendors-Bookings-Dashboard/blob/master/licence">
    <img src="https://img.shields.io/aur/license/yaourt.svg?style=flat-square">
  </a>


</p>

#WordPress Plugin Boilerplate#

* Contributors: Webby Scots
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html

Use this to make your WordPress plugins.

## Description

Sets up front end management for vendors from the WooThemes WooCommerce Vendors plugin to manage their bookings from the WooCommerce Bookings plugin.

** Please note ** the base use case I have been building this plugin around dictated that the dashboard should not show the in-cart and was-in-cart statuses. If your use case
needs these statuses I have added a filter woo_vendors_bookings_dashboard_statuses so you can add them back in.

## Installation and Usage

1. Clone the repo
2. Code :-)

It has its own autoloader. All you need to do is create an includes folder and add the class files using add class-mypluginname-classname.php. And then in the init function do:

```if ($this_condition) {
    $this->classname = new MyPluginName_ClassName();
}```

The part after new is what is searched for, as lowercase and with underscores as dashes in the includes folder, but the class- part is prefixed for you.