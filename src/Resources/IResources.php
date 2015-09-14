<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */


namespace DotMailer\Api\Resources;


use DotMailer\Api\DataTypes\ApiAccount;
use DotMailer\Api\DataTypes\ApiAddressBook;
use DotMailer\Api\DataTypes\ApiAddressBookList;
use DotMailer\Api\DataTypes\ApiCampaign;
use DotMailer\Api\DataTypes\ApiCampaignContactClickList;
use DotMailer\Api\DataTypes\ApiCampaignContactOpenList;
use DotMailer\Api\DataTypes\ApiCampaignContactPageViewList;
use DotMailer\Api\DataTypes\ApiCampaignContactReplyList;
use DotMailer\Api\DataTypes\ApiCampaignContactRoiDetailList;
use DotMailer\Api\DataTypes\ApiCampaignContactSocialBookmarkViewList;
use DotMailer\Api\DataTypes\ApiCampaignContactSummary;
use DotMailer\Api\DataTypes\ApiCampaignContactSummaryList;
use DotMailer\Api\DataTypes\ApiCampaignFromAddressList;
use DotMailer\Api\DataTypes\ApiCampaignList;
use DotMailer\Api\DataTypes\ApiCampaignSend;
use DotMailer\Api\DataTypes\ApiCampaignSummary;
use DotMailer\Api\DataTypes\ApiContact;
use DotMailer\Api\DataTypes\ApiContactImport;
use DotMailer\Api\DataTypes\ApiContactImportReport;
use DotMailer\Api\DataTypes\ApiContactList;
use DotMailer\Api\DataTypes\ApiContactResubscription;
use DotMailer\Api\DataTypes\ApiContactSuppression;
use DotMailer\Api\DataTypes\ApiContactSuppressionList;
use DotMailer\Api\DataTypes\ApiDataField;
use DotMailer\Api\DataTypes\ApiDataFieldList;
use DotMailer\Api\DataTypes\ApiDependencyResult;
use DotMailer\Api\DataTypes\ApiDocument;
use DotMailer\Api\DataTypes\ApiDocumentFolder;
use DotMailer\Api\DataTypes\ApiDocumentFolderList;
use DotMailer\Api\DataTypes\ApiDocumentList;
use DotMailer\Api\DataTypes\ApiFileMedia;
use DotMailer\Api\DataTypes\ApiImage;
use DotMailer\Api\DataTypes\ApiImageFolder;
use DotMailer\Api\DataTypes\ApiImageFolderList;
use DotMailer\Api\DataTypes\ApiJsonData;
use DotMailer\Api\DataTypes\ApiProgram;
use DotMailer\Api\DataTypes\ApiProgramList;
use DotMailer\Api\DataTypes\ApiProgramEnrolment;
use DotMailer\Api\DataTypes\ApiProgramEnrolmentList;
use DotMailer\Api\DataTypes\ApiResubscribeResult;
use DotMailer\Api\DataTypes\ApiSegmentList;
use DotMailer\Api\DataTypes\ApiSegmentRefresh;
use DotMailer\Api\DataTypes\ApiSms;
use DotMailer\Api\DataTypes\ApiTemplateList;
use DotMailer\Api\DataTypes\ApiTransactionalData;
use DotMailer\Api\DataTypes\ApiTransactionalDataImport;
use DotMailer\Api\DataTypes\ApiTransactionalDataImportReport;
use DotMailer\Api\DataTypes\ApiTransactionalDataList;
use DotMailer\Api\DataTypes\Guid;
use DotMailer\Api\DataTypes\IApiTemplate;
use DotMailer\Api\DataTypes\Int32List;
use DotMailer\Api\DataTypes\XsBoolean;
use DotMailer\Api\DataTypes\XsDateTime;
use DotMailer\Api\DataTypes\XsInt;
use DotMailer\Api\DataTypes\XsString;

/**
 * Interface IResources
 *
 */
interface IResources
{

    /*
     * ========== account-info ==========
     */

    /**
     * Gets a summary of information about the current status of the account.
     *
     * @return ApiAccount
     */
    public function GetAccountInfo();

    /*
     * ========== address-books ==========
     */

    /**
     * Creates an address book.
     *
     * @param ApiAddressBook $addressBook
     * @return ApiAddressBook
     */
    public function PostAddressBooks(ApiAddressBook $addressBook);

    /**
     * Gets any campaigns that have been sent to an address book.
     *
     * @param int|XsInt $addressBookId
     * @param int $select
     * @param int $skip
     * @return ApiCampaignList
     */
    public function GetAddressBookCampaigns($addressBookId, $select = 1000, $skip = 0);

    /**
     * Deletes all contacts from a given address book.
     *
     * @param int|XsInt $addressBookId
     */
    public function DeleteAddressBookContacts($addressBookId);

    /**
     * Adds a contact to a given address book.
     *
     * @param int|XsInt $addressBookId
     * @param ApiContact $apiContact
     * @return ApiContact
     */
    public function PostAddressBookContacts($addressBookId, ApiContact $apiContact);

    /**
     * Deletes a contact from a given address book.
     *
     * @param int|XsInt $addressBookId
     * @param int|XsInt|string|XsString $apiContactId Contact Id or email // todo test if deleting by email works
     */
    public function DeleteAddressBookContact($addressBookId, $apiContactId);

    /**
     * Deletes multiple contacts from an address book
     *
     * @param int|XsInt $addressBookId
     * @param Int32List $contactIdList
     */
    public function PostAddressBookContactsDelete($addressBookId, $contactIdList);

    /**
     * Bulk creates, or bulk updates, contacts.
     *
     * Import format can either be CSV or Excel. Must include one column called "Email".
     * Any other columns will attempt to map to your custom data fields. The ID of returned object can be used to query import progress.
     *
     * @param int|XsInt $addressBookId
     * @param ApiFileMedia $apiFileMedia
     * @return ApiContactImport
     */
    public function PostAddressBookContactsImport($addressBookId, ApiFileMedia $apiFileMedia);

    /**
     * Gets a list of contacts who were modified since a given date, in a given address book.
     *
     * @param int|XsInt $addressBookId
     * @param string|XsDateTime $date
     * @param bool|XsBoolean $withFullData
     * @param int $select
     * @param int $skip
     * @return ApiContactList
     */
    public function GetAddressBookContactsModifiedSinceDate($addressBookId, $date, $withFullData = false, $select = 1000, $skip = 0);

    /**
     * Resubscribes a previously unsubscribed contact to a given address book.
     *
     * @param int|XsInt $addressBookId
     * @param ApiContactResubscription $apiContactResubscription
     * @return ApiResubscribeResult
     */
    public function PostAddressBookContactsResubscribe($addressBookId, ApiContactResubscription $apiContactResubscription);

    /**
     * Unsubscribes contact from a given address book.
     *
     * @param int|XsInt $addressBookId
     * @param ApiContact $apiContact
     * @return ApiContactSuppression
     */
    public function PostAddressBookContactsUnsubscribe($addressBookId, ApiContact $apiContact);

    /**
     * Gets a list of contacts who have unsubscribed from a given address book.
     *
     * @param int|XsInt $addressBookId
     * @param string|XsDateTime $date
     * @param int $select
     * @param int $skip
     * @return ApiContactSuppressionList
     */
    public function GetAddressBookContactsUnsubscribedSinceDate($addressBookId, $date, $select = 1000, $skip = 0);

    /**
     * Gets a list of contacts in a given address book.
     *
     * @param int|XsInt $addressBookId
     * @param bool|XsBoolean $withFullData
     * @param int $select
     * @param int $skip
     * @return ApiContactList
     */
    public function GetAddressBookContacts($addressBookId, $withFullData = false, $select = 1000, $skip = 0);

    /**
     * Gets an address book by id.
     *
     * @param int|XsInt $addressBookId
     * @return ApiAddressBook
     */
    public function GetAddressBookById($addressBookId);

    /**
     * Updates an address book.
     *
     * @param ApiAddressBook $apiAddressBook
     * @return ApiAddressBook
     */
    public function UpdateAddressBook(ApiAddressBook $apiAddressBook);

    /**
     * Deletes an address book.
     *
     * @param int|XsInt $addressBookId
     */
    public function DeleteAddressBook($addressBookId);

    /**
     * Gets all private address books
     *
     * @param int $select
     * @param int $skip
     * @return ApiAddressBookList
     */
    public function GetAddressBooksPrivate($select = 1000, $skip = 0);

    /**
     * Gets all public address books
     *
     * @param int $select
     * @param int $skip
     * @return ApiAddressBookList
     */
    public function GetAddressBooksPublic($select = 1000, $skip = 0);

    /**
     * Gets all address books
     *
     * @param int $select
     * @param int $skip
     * @return ApiAddressBookList
     */
    public function GetAddressBooks($select = 1000, $skip = 0);


    /*
     * ========== campaigns ==========
     */

    /**
     * Creates a campaign.
     *
     * @param ApiCampaign $apiCampaign to be created
     * @return ApiCampaign New campaign (with campaign ID)
     */
    public function PostCampaigns(ApiCampaign $apiCampaign);

    /**
     * Gets activity for a given contact and campaign.
     *
     * @param int|XsInt $campaignId
     * @param int|XsInt $contactId
     * @return ApiCampaignContactSummary
     */
    public function GetCampaignActivityByContactId($campaignId, $contactId);

    /**
     * Gets a list of campaign link clicks for a contact.
     *
     * @param int|XsInt $campaignId
     * @param int|XsInt $contactId
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactClickList
     */
    public function GetCampaignActivityClicks($campaignId, $contactId, $select = 1000, $skip = 0);

    /**
     * Gets a list of campaign opens for a contact.
     *
     * @param int|XsInt $campaignId
     * @param int|XsInt $contactId
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactOpenList
     */
    public function GetCampaignActivityOpens($campaignId, $contactId, $select = 1000, $skip = 0);

    /**
     * Gets a list of page views for a contact.
     *
     * @param int|XsInt $campaignId
     * @param int|XsInt $contactId
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactPageViewList
     */
    public function GetCampaignActivityPageViews($campaignId, $contactId, $select = 1000, $skip = 0);

    /**
     * Gets a list of campaign replies for a contact. You may not request more than 5 records at a time using the "select" parameter.
     *
     * @param int|XsInt $campaignId
     * @param int|XsInt $contactId
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactReplyList
     */
    public function GetCampaignActivityReplies($campaignId, $contactId, $select = 5, $skip = 0);

    /**
     * Gets a list of ROI information for a contact.
     *
     * @param int|XsInt $campaignId
     * @param int|XsInt $contactId
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactRoiDetailList
     */
    public function GetCampaignActivityRoiDetails($campaignId, $contactId, $select = 1000, $skip = 0);

    /**
     * Gets campaign social bookmark views for a contact.
     *
     * @param int|XsInt $campaignId
     * @param int|XsInt $contactId
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactSocialBookmarkViewList
     */
    public function GetCampaignActivitySocialBookmarkViews($campaignId, $contactId, $select = 1000, $skip = 0);

    /**
     * Gets a list of contacts who were sent a campaign, and retrieves only those contacts who showed activity (e.g. they clicked, opened) after a specified date.
     *
     * @param int|XsInt $campaignId
     * @param string|XsDateTime $dateTime
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactSummaryList
     */
    public function GetCampaignActivitiesSinceDateByDate($campaignId, $dateTime, $select = 1000, $skip = 0);

    /**
     * Gets a list of contacts who were sent a campaign, with their activity.
     *
     * @param int|XsInt $campaignId
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactSummaryList
     */
    public function GetCampaignActivities($campaignId, $select = 1000, $skip = 0);

    /**
     * Gets any address books that a campaign has ever been sent to.
     *
     * @param int|XsInt $campaignId
     * @param int $select
     * @param int $skip
     * @return ApiAddressBookList
     */
    public function GetCampaignAddressBooks($campaignId, $select = 1000, $skip = 0);

    /**
     * Gets documents that are currently attached to a campaign.
     *
     * @param int|XsInt $campaignId
     * @return ApiDocumentList
     */
    public function GetCampaignAttachments($campaignId);

    /**
     * Adds a document to a campaign as an attachment.
     *
     * @param int|XsInt $campaignId
     * @param ApiDocument $apiDocument
     * @return ApiDocument
     */
    public function PostCampaignAttachments($campaignId, ApiDocument $apiDocument);

    /**
     * Removes an attachment from a campaign.
     *
     * @param int|XsInt $campaignId
     * @param int|XsInt $documentId
     */
    public function DeleteCampaignAttachment($campaignId, $documentId);

    /**
     * Gets a list of campaign link clicks.
     *
     * @param int|XsInt $campaignId
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactClickList
     */
    public function GetCampaignClicks($campaignId, $select = 1000, $skip = 0);

    /**
     * Copies a given campaign returning the new campaign.
     *
     * @param int|XsInt $campaignId
     * @return ApiCampaign
     */
    public function PostCampaignCopy($campaignId);

    /**
     * Gets a list of contacts who hard bounced when sent a particular campaign.
     *
     * @param int|XsInt $campaignId
     * @param bool|XsBoolean $withFullData
     * @param int $select
     * @param int $skip
     * @return ApiContactList
     */
    public function GetCampaignHardBouncingContacts($campaignId, $withFullData = false, $select = 1000, $skip = 0);

    /**
     * Gets a list of campaign opens.
     *
     * @param int|XsInt $campaignId
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactOpenList
     */
    public function GetCampaignOpens($campaignId, $select = 1000, $skip = 0);

    /**
     * Gets a list of page views for a campaign after a specified date.
     *
     * @param int|XsInt $campaignId
     * @param string|XsDateTime $dateTime
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactPageViewList
     */
    public function GetCampaignPageViewsSinceDateByDate($campaignId, $dateTime, $select = 1000, $skip = 0);

    /**
     * @param int|XsInt $campaignId
     * @param string|XsDateTime $dateTime
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactRoiDetailList
     */
    public function GetCampaignRoiDetailsSinceDateByDate($campaignId, $dateTime, $select = 1000, $skip = 0);

    /**
     * Gets campaign social bookmark views for a campaign.
     *
     * @param int|XsInt $campaignId
     * @param int $select
     * @param int $skip
     * @return ApiCampaignContactSocialBookmarkViewList
     */
    public function GetCampaignSocialBookmarkViews($campaignId, $select = 1000, $skip = 0);

    /**
     * Gets a summary of reporting information for a specified campaign.
     *
     * @param int|XsInt $campaignId
     * @return ApiCampaignSummary
     */
    public function GetCampaignSummary($campaignId);

    /**
     * Gets a campaign by ID.
     *
     * @param int|XsInt $campaignId
     * @return ApiCampaign
     */
    public function GetCampaignById($campaignId);

    /**
     * Updates a given campaign.
     *
     * @param ApiCampaign $apiCampaign
     * @return ApiCampaign
     */
    public function UpdateCampaign(ApiCampaign $apiCampaign);

    /**
     * Sends a specified campaign to one or more address books, segments or contacts at a specified time.
     *
     * Leave the address book array empty to send to All Contacts.
     *
     * @param ApiCampaignSend $apiCampaignSend
     * @return ApiCampaignSend
     */
    public function PostCampaignsSend(ApiCampaignSend $apiCampaignSend);

    /**
     * @param string|Guid $sendId
     * @return ApiCampaignSend
     */
    public function GetCampaignsSendBySendId($sendId);

    /**
     * Gets all sent campaigns, which have had activity (e.g. clicks, opens) after a specified date.
     *
     * @param string|XsDateTime $dateTime
     * @param int $select
     * @param int $skip
     * @return ApiCampaignList
     */
    public function GetCampaignsWithActivitySinceDate($dateTime, $select = 1000, $skip = 0);

    /**
     * Gets all campaigns
     *
     * @param int $select
     * @param int $skip
     * @return ApiCampaignList
     */
    public function GetCampaigns($select = 1000, $skip = 0);


    /*
     * ========== contacts ==========
     */

    /**
     * Creates a contact.
     *
     * @param ApiContact $apiContact
     * @return ApiContact
     */
    public function PostContacts(ApiContact $apiContact);

    /**
     * Gets any address books that a contact is in.
     *
     * @param int|XsInt $contactId
     * @param int $select
     * @param int $skip
     * @return ApiAddressBookList
     */
    public function GetContactAddressBooks($contactId, $select = 1000, $skip = 0);

    /**
     * Gets a contact by email address.
     *
     * @param string|XsString $email
     * @return ApiContact
     */
    public function GetContactByEmail($email);

    /**
     * Deletes all transactional data for a contact.
     *
     * @param string|XsString|int|XsInt $contactId
     * @param string|XsString $collectionName
     */
    public function DeleteContactTransactionalData($contactId, $collectionName);

    /**
     * Gets a list of all transactional data for a contact (100 most recent only).
     *
     * @param string|XsString|int|XsInt $contactId
     * @param string|XsString $collectionName
     * @return ApiTransactionalDataList
     */
    public function GetContactTransactionalDataByCollectionName($contactId, $collectionName);

    /**
     * Gets a contact by ID. Unsubscribed or suppressed contacts will not be retrieved.
     *
     * @param int|XsInt $contactId
     * @return ApiContact
     */
    public function GetContactById($contactId);

    /**
     * Updates a contact.
     *
     * @param ApiContact $apiContact
     * @return ApiContact
     */
    public function UpdateContact(ApiContact $apiContact);

    /**
     * Deletes a contact.
     *
     * @param int|XsInt $contactId
     */
    public function DeleteContact($contactId);

    /**
     * Gets a list of created contacts after a specified date.
     *
     * @param string|XsDateTime $date
     * @param bool|XsBoolean $withFullData
     * @param int|XsInt $select
     * @param int|XsInt $skip
     * @return ApiContactList
     */
    public function GetContactsCreatedSinceDate($date, $withFullData = false, $select = 1000, $skip = 0);

    /**
     * Bulk creates, or bulk updates, contacts. Import format can either be CSV or Excel. Must include one column called "Email".
     *
     * Any other columns will attempt to map to your custom data fields. The ID of returned object can be used to query import progress.
     *
     * @param ApiFileMedia $apiFileMedia
     * @return ApiContactImport
     */
    public function PostContactsImport(ApiFileMedia $apiFileMedia);

    /**
     * Gets the import status of a previously started contact import.
     *
     * @param string|Guid $importId
     * @return ApiContactImport
     */
    public function GetContactsImportByImportId($importId);

    /**
     * Gets a report with statistics about what was successfully imported, and what was unable to be imported.
     *
     * @param string|Guid $importId
     * @return ApiContactImportReport
     */
    public function GetContactsImportReport($importId);

    /**
     * Gets all records that were not successfully imported.
     *
     * The data are returned in CSV file, which is UTF-8 encoded.
     * This data will only be available for approximately one week after import.
     *
     * @param Guid $importId
     * @return XsString
     */
    public function GetContactsImportReportFaults(Guid $importId);

    /**
     * Gets a list of modified contacts after a specified date.
     *
     * @param string|XsDateTime $date
     * @param bool|XsBoolean $withFullData
     * @param int|XsInt $select
     * @param int|XsInt $skip
     * @return ApiContactList
     */
    public function GetContactsModifiedSinceDate($date, $withFullData = false, $select = 1000, $skip = 0);

    /**
     * Resubscribes a previously unsubscribed contact.
     *
     * @param ApiContactResubscription $apiContactResubscription
     * @return ApiResubscribeResult
     */
    public function PostContactsResubscribe(ApiContactResubscription $apiContactResubscription);

    /**
     * Gets a list of suppressed contacts after a given date along with the reason for suppression.
     *
     * @param string|XsDateTime $date
     * @param int|XsInt $select
     * @param int|XsInt $skip
     * @return ApiContactSuppressionList
     */
    public function GetContactsSuppressedSinceDate($date, $select = 1000, $skip = 0);

    /**
     * Adds a single piece of transactional data to a contact.
     *
     * /contacts/transactional-data/{collectionName}
     *
     * @param string|XsString $collectionName
     * @param ApiTransactionalData $apiTransactionalData
     * @return ApiTransactionalData
     */
    public function PostContactsTransactionalData($collectionName, ApiTransactionalData $apiTransactionalData);

    /**
     * Replaces a piece of transactional data by key (logical equivalent to a delete and an insert).
     *
     * /contacts/transactional-data/{collectionName}/{key}
     *
     * @param string|XsString $collectionName
     * @param int|XsInt $importId
     * @param ApiJsonData $apiJsonData
     * @return ApiTransactionalData
     */
    public function PostContactsTransactionalDataUpdate($collectionName, $importId, ApiJsonData $apiJsonData);

    /**
     * Deletes a piece of transactional data by key.
     *
     * @param string|XsString $collectionName
     * @param string|XsString $key
     */
    public function DeleteContactsTransactionalData($collectionName, $key);

    /**
     * Gets a piece of transactional data by key.
     *
     * @param string|XsString $collectionName
     * @param string|XsString $key
     * @return ApiTransactionalData
     */
    public function GetContactsTransactionalDataByKey($collectionName, $key);

    /**
     * Adds multiple pieces of transactional data to contacts asynchronously, returning an identifier that can be used to check for import progress.
     *
     * @param string|XsString $collectionName
     * @param ApiTransactionalDataList $apiTransactionalDataList
     * @return ApiTransactionalDataImport
     */
    public function PostContactsTransactionalDataImport($collectionName, ApiTransactionalDataList $apiTransactionalDataList);

    /**
     * Gets the import status of a previously started transactional import.
     *
     * @param string|Guid $importId
     * @return ApiTransactionalDataImport
     */
    public function GetContactsTransactionalDataImportByImportId($importId);

    /**
     * Gets a report with statistics about what was successfully imported, and what was unable to be imported.
     *
     * @param string|Guid $importId
     * @return ApiTransactionalDataImportReport
     */
    public function GetContactsTransactionalDataImportReport($importId);

    /**
     * Unsubscribes contact from account.
     *
     * @param ApiContact $apiContact
     * @return ApiContactSuppression
     */
    public function PostContactsUnsubscribe(ApiContact $apiContact);

    /**
     * Gets a list of unsubscribed contacts who unsubscribed after a given date.
     *
     * @param string|XsDateTime $data
     * @param int|XsInt $select
     * @param int|XsInt $skip
     * @return ApiContactSuppressionList
     */
    public function GetContactsUnsubscribedSinceDate($data, $select = 1000, $skip = 0);

    /**
     * Gets a list of all contacts in the account
     *
     * @param bool|XsBoolean $withFullData
     * @param int|XsInt $select
     * @param int|XsInt $skip
     * @return ApiContactList
     */
    public function GetContacts($withFullData = false, $select = 1000, $skip = 0);


    /*
     * ========== custom-from-addresses ==========
     */

    /**
     * Gets all custom from addresses which can be used in a campaign.
     *
     * @param int|XsInt $select
     * @param int|XsInt $skip
     * @return ApiCampaignFromAddressList
     */
    public function GetCustomFromAddresses($select = 1000, $skip = 0);


    /*
     * ========== data-fields ==========
     */

    /**
     * Creates a data field within the account.
     *
     * @param ApiDataField $apiDataField
     */
    public function PostDataFields(ApiDataField $apiDataField);

    /**
     * Lists the data fields within the account.
     *
     * @return ApiDataFieldList
     */
    public function GetDataFields();

    /**
     * Deletes a data field within the account.
     *
     * @param string|XsString $name
     * @return ApiDependencyResult
     */
    public function DeleteDataField($name);


    /*
     * ========== document-folders ==========
     */

    /**
     * Fetches the document folder tree structure.
     *
     * @return ApiDocumentFolderList
     */
    public function GetDocumentFolders();

    /**
     * Creates a new document folder.
     *
     * @param int|XsInt $folderId
     * @param ApiDocumentFolder $apiDocumentFolder
     * @return ApiDocumentFolder
     */
    public function PostDocumentFolder($folderId, ApiDocumentFolder $apiDocumentFolder);

    /**
     * Gets all uploaded documents.
     *
     * @param int|XsInt $folderId
     * @return ApiDocumentList
     */
    public function GetDocumentFolderDocuments($folderId);

    /**
     * Upload a document to the specified folder.
     *
     * @param int|XsInt $folderId
     * @param ApiFileMedia $apiFileMedia
     * @return ApiDocument
     */
    public function PostDocumentFolderDocuments($folderId, ApiFileMedia $apiFileMedia);

    /*
     * ========== image-folders ==========
     */

    /**
     * Fetches the campaign image folder tree structure.
     *
     * @return ApiImageFolderList
     */
    public function GetImageFolders();

    /**
     * Uploads a new campaign image to the specified folder.
     *
     * @param XsInt $folderId
     * @param ApiFileMedia $apiFileMedia
     * @return ApiImage
     */
    public function PostImageFolderImages(XsInt $folderId, ApiFileMedia $apiFileMedia);

    /**
     * Gets an image folder by id.
     *
     * @param XsInt $folderId
     * @return ApiImageFolder
     */
    public function GetImageFolderById(XsInt $folderId);

    /**
     * Creates a new campaign image folder.
     *
     * @param XsInt $folderId
     * @param ApiImageFolder $apiImageFolder
     * @return ApiImageFolder
     */
    public function PostImageFolder(XsInt $folderId, ApiImageFolder $apiImageFolder);

    /*
    * ========== programs and enrolments ==========
    */

    /**
     * Gets a program by id.
     *
     * @param int|XsInt $programId
     * @return ApiProgram
     */
    public function GetProgramById(XsInt $programId);

    /**
     * Creates a new program enrolment.
     *
     * @param ApiProgramEnrolment $apiProgramEnrolment
     */
    public function PostProgramsEnrolments(ApiProgramEnrolment $apiProgramEnrolment);

    /**
     * Gets an enrolment by id.
     *
     * @param string|Guid $enrolmentId
     * @return ApiProgramEnrolment
     */
    public function GetProgramsEnrolmentByEnrolmentId($enrolmentId);

    /**
     * Gets faults by an enrolment id.
     *
     * @param string|Guid $enrolmentId
     * @return ApiProgramEnrolment
     */
    public function GetProgramsEnrolmentReportFaults($enrolmentId);

    /**
     * Gets enrolments by status.
     *
     * @param string|XsString $status
     * @param int $select
     * @param int $skip
     * @return ApiProgramEnrolmentList
     */
    public function GetProgramsEnrolmentByStatus($status, $select = 1000, $skip = 0);

    /**
     * Gets all programs.
     *
     * @param int $select
     * @param int $skip
     * @return ApiProgramList
     */
    public function GetPrograms($select = 1000, $skip = 0);

    /*
     * ========== segments ==========
     */

    /**
     * Refreshes a segment by ID.
     *
     * @param XsInt $segmentId
     * @return ApiSegmentRefresh
     */
    public function PostSegmentsRefresh(XsInt $segmentId);

    /**
     * Gets the refresh progress for a segment.
     *
     * @param XsInt $segmentId
     * @return ApiSegmentRefresh
     */
    public function GetSegmentsRefreshById(XsInt $segmentId);

    /**
     * Gets all segments.
     *
     * @param int $select
     * @param int $skip
     * @return ApiSegmentList
     */
    public function GetSegments($select = 1000, $skip = 0);

    /*
     * ========== server-time ==========
     */

    /**
     * Gets the UTC time as set on the server.
     *
     * @return XsDateTime
     */
    public function GetServerTime();

    /*
     * ========== sms-messages ==========
     */

    /**
     * Send a single SMS message.
     *
     * @param XsString $telephoneNumber
     * @param ApiSms $apiSms
     */
    public function PostSmsMessagesSendTo(XsString $telephoneNumber, ApiSms $apiSms);

    /*
     * ========== templates ==========
     */

    /**
     * Creates a template.
     *
     * @param IApiTemplate $apiTemplate
     * @return IApiTemplate
     */
    public function PostTemplates(IApiTemplate $apiTemplate);

    /**
     * Gets a template by ID.
     *
     * @param XsInt $templateId
     * @return IApiTemplate
     */
    public function GetTemplateById(XsInt $templateId);

    /**
     * Updates a template.
     *
     * @param IApiTemplate $apiTemplate
     * @return IApiTemplate
     */
    public function UpdateTemplate(IApiTemplate $apiTemplate);

    /**
     * Gets list of all templates.
     *
     * @param int $select
     * @param int $skip
     * @return ApiTemplateList
     */
    public function GetTemplates($select = 1000, $skip = 0);

}
