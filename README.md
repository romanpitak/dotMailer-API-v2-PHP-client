# dotMailer API v2 PHP client

[![Latest Stable Version](https://img.shields.io/packagist/v/romanpitak/dotmailer-api-v2-client.svg)](https://packagist.org/packages/romanpitak/dotmailer-api-v2-client)
[![Total Downloads](https://img.shields.io/packagist/dt/romanpitak/dotmailer-api-v2-client.svg)](https://packagist.org/packages/romanpitak/dotmailer-api-v2-client)
[![License](https://img.shields.io/packagist/l/romanpitak/dotmailer-api-v2-client.svg)](https://packagist.org/packages/romanpitak/dotmailer-api-v2-client)
[![Code Climate](https://codeclimate.com/github/romanpitak/dotMailer-API-v2-PHP-client/badges/gpa.svg)](https://codeclimate.com/github/romanpitak/dotMailer-API-v2-PHP-client)
[![Codacy Badge](https://www.codacy.com/project/badge/80aa496d952248c69a5352bbf159884a)](https://www.codacy.com/public/roman/dotMailer-API-v2-PHP-client)

(c) 2014-2016 Roman Piták, http://pitak.net <roman@pitak.net>

PHP client library for the dotMailer v2 (REST) API with **multiple accounts support!**

**Full implementation** according to the http://api.dotmailer.com/v2/help/wadl

Type hinting support for objects and resources (not yet for arrays).

## Installation

The best way to install is to use the [Composer](https://getcomposer.org/) dependency manager.

```
php composer.phar require romanpitak/dotmailer-api-v2-client
```

## Usage

### Single account usage

```php
<?php
require_once('vendor/autoload.php');

$credentials = array(
    Container::USERNAME => 'apiuser-XXXXXXXXXXXX@apiconnector.com',
    Container::PASSWORD => 'YYYYYYYYYYYYYYYYYYYYYYYYYYY'
);

$resources = Container::newResources($credentials);

echo $resources->GetAccountInfo();
```

### Multiple accounts usage

```php
<?php
require_once('vendor/autoload.php');

$credentials = array(
    'master' => array(
        Container::USERNAME => 'apiuser-XXXXXXXXXXXX@apiconnector.com',
        Container::PASSWORD => 'YYYYYYYYYYYYYYYYYYYYYYYYYYY'
    ),
    'group1' => array(
        'g1-account1' => array(
            Container::USERNAME => 'apiuser-XXXXXXXXXXXX@apiconnector.com',
            Container::PASSWORD => 'YYYYYYYYYYYYYYYYYYYYYYYYYYY'
        ),
        'g1-account2' => array(
            Container::USERNAME => 'apiuser-XXXXXXXXXXXX@apiconnector.com',
            Container::PASSWORD => 'YYYYYYYYYYYYYYYYYYYYYYYYYYY'
        )
    )
);

$container = Container::newContainer($credentials);

echo $container->getResources('master')->GetSegments();

$dataField = new ApiDataField();
$dataField->name = 'MY_DATA_FIELD';
$dataField->type = ApiDataTypes::STRING;
$dataField->visibility = ApiDataFieldVisibility::HIDDEN;

foreach ($container->group1 as $resources) {
    try {
        $resources->PostDataFields($dataField);
        echo 'OK';
    } catch (Exception $e) {
        echo 'Already exists';
    }
}
```

### Create campaign with images (real life example)

```php
<?php
// find the correct custom from address
$customFromAddresses = $account->GetCustomFromAddresses();
$customFromAddress = null;
foreach ($customFromAddresses as $cfa) {
    if ('roman@pitak.net' == $cfa->email) {
        $customFromAddress = $cfa;
        break;
    }
}
if (is_null($customFromAddress)) {
    throw new \Exception('Custom from address not found in the account.');
}

// Create campaign to get campaign ID
// we need the campaign id later to create image folder
$campaign = new ApiCampaign();
$campaign->name = 'My API Campaign';
$campaign->subject = 'Api Works';
$campaign->fromName = "Roman Piták";
$campaign->fromAddress = $customFromAddress->toJson();
// empty content (must include unsubscribe links)
$campaign->htmlContent = '<a href="http://$unsub$">UNSUB</a>';
$campaign->plainTextContent = 'http://$unsub$';
// save campaign
$campaign = $account->PostCampaigns($campaign);

// Create image folder
$folder = new ApiImageFolder();
$folder->name = date('c') . ' cid=' . (string)$campaign->id;
$folder = $account->PostImageFolder(new XsInt(0), $folder);
$folderId = $folder->id;

// Upload images
foreach ($images as $baseName => $data) {
    $apiFileMedia = new ApiFileMedia();
    $apiFileMedia->fileName = pathinfo($data['file'], PATHINFO_FILENAME);
    $apiFileMedia->data = base64_encode(file_get_contents($data['file']));
    $apiImage = $account->PostImageFolderImages($folderId, $apiFileMedia);
    // set the dotMailer src for the images
    $images[$baseName]['src'] = (string)$apiImage->path;
}

// UPDATE CAMPAIGN
$campaign->id = $campaign->id->toJson();
// getIndexHtml returns the html of the email with the correct src attribute for the images
// it uses the $images array
$htmlContent = getIndexHtml($includeDirectory);
$campaign->htmlContent = $htmlContent;
$html2text = new Html2Text($htmlContent);
$campaign->plainTextContent = $html2text->get_text();
$account->UpdateCampaign($campaign);
```
