# Magento 1 Module: Alpha Sharer - Facebook Sharing Using Facebook PHP SDK
```
This is a practice project. Don't use it on production :P
```

## Features
1. Direct dialog popup to type facebook message. No Facebook frame popup. No new browser tab open.
2. Backend shared message listing with releated product info, customer id, facebook app user id to future analysis.
3. Backend configuration page for Facebook App info setup.

## How to install this module
1. Download module from 
    ```
    https://www.dropbox.com/s/i75bi05bx0ptn9q/Alpha_Sharer-0.2.0.tgz?dl=0
    ```
 and install it with Magento Connect.
2. Update catalog.xml layout file. Add the following code to where you want to show the share button.
    ```
    <block type="catalog/product_view" name="sharer" as="sharer" template="sharer/sharer.phtml"/>
    ```
3. Set up your Facebook App. Add App id and secret to admin configuration page.
