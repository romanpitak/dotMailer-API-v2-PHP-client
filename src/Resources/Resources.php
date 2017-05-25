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
use DotMailer\Api\DataTypes\ApiTemplate;
use DotMailer\Api\DataTypes\ApiTemplateList;
use DotMailer\Api\DataTypes\ApiTransactionalData;
use DotMailer\Api\DataTypes\ApiTransactionalDataImport;
use DotMailer\Api\DataTypes\ApiTransactionalDataImportReport;
use DotMailer\Api\DataTypes\ApiTransactionalDataList;
use DotMailer\Api\DataTypes\Guid;
use DotMailer\Api\DataTypes\IApiTemplate;
use DotMailer\Api\DataTypes\XsDateTime;
use DotMailer\Api\DataTypes\XsInt;
use DotMailer\Api\DataTypes\XsString;
use DotMailer\Api\Rest\IClient;

final class Resources implements IResources
{
    /** @var IClient */
    private $restClient;

    public function __construct(IClient $restClient)
    {
        $this->restClient = $restClient;
    }


    /**
     * @param string $url
     * @param string $method
     * @param string $data
     * @return string
     */
    private function execute($url, $method = 'GET', $data = null)
    {
        return $this->restClient->execute(array($url, $method, $data), array());
    }

    /*
     * ========== RESOURCES ==========
     */

    /*
     * ========== account-info ==========
     */

    public function GetAccountInfo()
    {
        return new ApiAccount($this->execute('account-info'));
    }

    /*
     * ========== address-books ==========
     */

    public function PostAddressBooks(ApiAddressBook $addressBook)
    {
        return new ApiAddressBook($this->execute('address-books', 'POST', $addressBook->toJson()));
    }

    public function GetAddressBookCampaigns($addressBookId, $select = 1000, $skip = 0)
    {
        $url = sprintf("address-books/%s/campaigns?select=%s&skip=%s", $addressBookId, $select, $skip);
        return new ApiCampaignList($this->execute($url));
    }

    public function DeleteAddressBookContacts($addressBookId)
    {
        $this->execute(sprintf("address-books/%s/contacts", $addressBookId), 'DELETE');
    }

    public function PostAddressBookContacts($addressBookId, ApiContact $apiContact)
    {
        $url = sprintf("address-books/%s/contacts", $addressBookId);
        return new ApiContact($this->execute($url, 'POST', $apiContact->toJson()));
    }

    public function DeleteAddressBookContact($addressBookId, $apiContactId)
    {
        $url = sprintf("address-books/%s/contacts/%s", $addressBookId, $apiContactId);
        $this->execute($url, 'DELETE');
    }

    public function PostAddressBookContactsDelete($addressBookId, $contactIdList)
    {
        $url = sprintf("address-books/%s/contacts/delete", $addressBookId);
        $this->execute($url, 'POST', $contactIdList->toJson());
    }

    public function PostAddressBookContactsImport($addressBookId, ApiFileMedia $apiFileMedia)
    {
        $url = sprintf("address-books/%s/contacts/import", $addressBookId);
        return new ApiContactImport($this->execute($url, 'POST', $apiFileMedia->toJson()));
    }

    public function GetAddressBookContactsModifiedSinceDate($addressBookId, $date, $withFullData = false, $select = 1000, $skip = 0)
    {
        $withFullData = $withFullData ? 'true' : 'false';
        $url = sprintf("address-books/%s/contacts/modified-since/%s?withFullData=%s&select=%s&skip=%s", $addressBookId, $date, $withFullData, $select, $skip);
        return new ApiContactList($this->execute($url));
    }

    public function PostAddressBookContactsResubscribe($addressBookId, ApiContactResubscription $apiContactResubscription)
    {
        $url = sprintf("address-books/%s/contacts/resubscribe", $addressBookId);
        return new ApiResubscribeResult($this->execute($url, 'POST', $apiContactResubscription->toJson()));
    }

    public function PostAddressBookContactsUnsubscribe($addressBookId, ApiContact $apiContact)
    {
        $url = sprintf("address-books/%s/contacts/unsubscribe", $addressBookId);
        return new ApiContactSuppression($this->execute($url, 'POST', $apiContact->toJson()));
    }

    public function GetAddressBookContactsUnsubscribedSinceDate($addressBookId, $date, $select = 1000, $skip = 0)
    {
        $url = sprintf("address-books/%s/contacts/unsubscribed-since/%s?select=%s&skip=%s", $addressBookId, $date, $select, $skip);
        return new ApiContactSuppressionList($this->execute($url));
    }

    public function GetAddressBookContacts($addressBookId, $withFullData = false, $select = 1000, $skip = 0)
    {
        $withFullData = $withFullData ? 'true' : 'false';
        $url = sprintf("address-books/%s/contacts?withFullData=%s&select=%s&skip=%s", $addressBookId, $withFullData, $select, $skip);
        return new ApiContactList($this->execute($url));
    }

    public function GetAddressBookById($addressBookId)
    {
        return new ApiAddressBook($this->execute(sprintf("address-books/%s", $addressBookId)));
    }

    public function UpdateAddressBook(ApiAddressBook $apiAddressBook)
    {
        $url = sprintf("address-books/%s", $apiAddressBook->id);
        return new ApiAddressBook($this->execute($url, 'PUT', $apiAddressBook->toJson()));
    }

    public function DeleteAddressBook($addressBookId)
    {
        $this->execute(sprintf("address-books/%s", $addressBookId), 'DELETE');
    }

    public function GetAddressBooksPrivate($select = 1000, $skip = 0)
    {
        return new ApiAddressBookList($this->execute(sprintf("address-books/private?select=%s&skip=%s", $select, $skip)));
    }

    public function GetAddressBooksPublic($select = 1000, $skip = 0)
    {
        return new ApiAddressBookList($this->execute(sprintf("address-books/public?select=%s&skip=%s", $select, $skip)));
    }

    public function GetAddressBooks($select = 1000, $skip = 0)
    {
        return new ApiAddressBookList($this->execute(sprintf("address-books?select=%s&skip=%s", $select, $skip)));
    }

    /*
     * ========== campaigns ==========
     */

    public function PostCampaigns(ApiCampaign $apiCampaign)
    {
        return new ApiCampaign($this->execute('campaigns', 'POST', $apiCampaign->toJson()));
    }

    public function GetCampaignActivityByContactId($campaignId, $contactId)
    {
        return new ApiCampaignContactSummary($this->execute(sprintf("campaigns/%s/activities/%s", $campaignId, $contactId)));
    }

    public function GetCampaignActivityClicks($campaignId, $contactId, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/activities/%s/clicks?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
        return new ApiCampaignContactClickList($this->execute($url));
    }

    public function GetCampaignActivityOpens($campaignId, $contactId, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/activities/%s/opens?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
        return new ApiCampaignContactOpenList($this->execute($url));
    }

    public function GetCampaignActivityPageViews($campaignId, $contactId, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/activities/%s/opens?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
        return new ApiCampaignContactPageViewList($this->execute($url));
    }

    public function GetCampaignActivityReplies($campaignId, $contactId, $select = 5, $skip = 0)
    {
        $url = sprintf("campaigns/%s/activities/%s/replies?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
        return new ApiCampaignContactReplyList($this->execute($url));
    }

    public function GetCampaignActivityRoiDetails($campaignId, $contactId, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/activities/%s/roi-details?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
        return new ApiCampaignContactRoiDetailList($this->execute($url));
    }

    public function GetCampaignActivitySocialBookmarkViews($campaignId, $contactId, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/activities/%s/social-bookmark-views?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
        return new ApiCampaignContactSocialBookmarkViewList($this->execute($url));
    }

    public function GetCampaignActivitiesSinceDateByDate($campaignId, $dateTime, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/activities/since-date/%s?select=%s&skip=%s", $campaignId, $dateTime, $select, $skip);
        return new ApiCampaignContactSummaryList($this->execute($url));
    }

    public function GetCampaignActivities($campaignId, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/activities?select=%s&skip=%s", $campaignId, $select, $skip);
        return new ApiCampaignContactSummaryList($this->execute($url));
    }

    public function GetCampaignAddressBooks($campaignId, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/address-books?select=%s&skip=%s", $campaignId, $select, $skip);
        return new ApiAddressBookList($this->execute($url));
    }

    public function GetCampaignAttachments($campaignId)
    {
        $url = sprintf("campaigns/%s/attachments", $campaignId);
        return new ApiDocumentList($this->execute($url));
    }

    public function PostCampaignAttachments($campaignId, ApiDocument $apiDocument)
    {
        $url = sprintf("campaigns/%s/attachments", $campaignId);
        return new ApiDocument($this->execute($url, 'POST', $apiDocument->toJson()));
    }

    public function DeleteCampaignAttachment($campaignId, $documentId)
    {
        $this->execute(sprintf("campaigns/%s/attachments/%s", $campaignId, $documentId));
    }

    public function GetCampaignClicks($campaignId, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/clicks?select=%s&skip=%s", $campaignId, $select, $skip);
        return new ApiCampaignContactClickList($this->execute($url));
    }

    public function PostCampaignCopy($campaignId)
    {
        $url = sprintf("campaigns/%s/copy", $campaignId);
        return new ApiCampaign($this->execute($url, 'POST'));
    }

    public function GetCampaignHardBouncingContacts($campaignId, $withFullData = false, $select = 1000, $skip = 0)
    {
        $withFullData = $withFullData ? 'true' : 'false';
        $url = sprintf("/campaigns/%s/hard-bouncing-contacts?withFullData=%s&select=%s&skip=%s", $campaignId, $withFullData, $select, $skip);
        return new ApiContactList($this->execute($url));
    }

    public function GetCampaignOpens($campaignId, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/opens?select=%s&skip=%s", $campaignId, $select, $skip);
        return new ApiCampaignContactOpenList($this->execute($url));
    }

    public function GetCampaignPageViewsSinceDateByDate($campaignId, $dateTime, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/page-views/since-date/%s?select=%s&skip=%s", $campaignId, $dateTime, $select, $skip);
        return new ApiCampaignContactPageViewList($this->execute($url));
    }

    public function GetCampaignRoiDetailsSinceDateByDate($campaignId, $dateTime, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/roi-details/since-date/%s?select=%s&skip=%s", $campaignId, $dateTime, $select, $skip);
        return new ApiCampaignContactRoiDetailList($this->execute($url));
    }

    public function GetCampaignSocialBookmarkViews($campaignId, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/%s/social-bookmark-views?select=%s&skip=%s", $campaignId, $select, $skip);
        return new ApiCampaignContactSocialBookmarkViewList($this->execute($url));
    }

    public function GetCampaignSummary($campaignId)
    {
        return new ApiCampaignSummary($this->execute(sprintf("campaigns/%s/summary", $campaignId)));
    }

    public function GetCampaignById($campaignId)
    {
        return new ApiCampaign($this->execute(sprintf("campaigns/%s", $campaignId)));
    }

    public function UpdateCampaign(ApiCampaign $apiCampaign)
    {
        return new ApiCampaign($this->execute(sprintf("campaigns/%s", $apiCampaign->id), 'PUT', $apiCampaign->toJson()));
    }

    public function PostCampaignsSend(ApiCampaignSend $apiCampaignSend)
    {
        return new ApiCampaignSend($this->execute('campaigns/send', 'POST', $apiCampaignSend->toJson()));
    }

    public function GetCampaignsSendBySendId($sendId)
    {
        return new ApiCampaignSend($this->execute(sprintf("campaigns/send/%s", $sendId)));
    }

    public function GetCampaignsWithActivitySinceDate($dateTime, $select = 1000, $skip = 0)
    {
        $url = sprintf("campaigns/with-activity-since/%s?select=%s&skip=%s", $dateTime, $select, $skip);
        return new ApiCampaignList($this->execute($url));
    }

    public function GetCampaigns($select = 1000, $skip = 0)
    {
        return new ApiCampaignList($this->execute(sprintf("campaigns?select=%s&skip=%s", $select, $skip)));
    }


    /*
     * ========== contacts ==========
     */

    public function PostContacts(ApiContact $apiContact)
    {
        return new ApiContact($this->execute('contacts', 'POST', $apiContact->toJson()));
    }

    public function GetContactAddressBooks($contactId, $select = 1000, $skip = 0)
    {
        $url = sprintf("contacts/%s/address-books?select=%s&skip=%s", $contactId, $select, $skip);
        return new ApiAddressBookList($this->execute($url));
    }

    public function GetContactByEmail($email)
    {
        return new ApiContact($this->execute(sprintf("contacts/%s", $email)));
    }

    public function DeleteContactTransactionalData($contactId, $collectionName)
    {
        $url = sprintf("contacts/%s/transactional-data/%s", $contactId, $collectionName);
        $this->execute($url, 'DELETE');
    }

    public function GetContactTransactionalDataByCollectionName($contactId, $collectionName)
    {
        $url = sprintf("contacts/%s/transactional-data/%s", $contactId, $collectionName);
        return new ApiTransactionalDataList($this->execute($url));
    }

    public function GetContactById($contactId)
    {
        return new ApiContact($this->execute(sprintf("contacts/%s", $contactId)));
    }

    public function UpdateContact(ApiContact $apiContact)
    {
        $url = sprintf("contacts/%s", $apiContact->id);
        return new ApiContact($this->execute($url, 'PUT', $apiContact->toJson()));
    }

    public function DeleteContact($contactId)
    {
        $this->execute(sprintf("contacts/%s", $contactId), 'DELETE');
    }

    public function GetContactsCreatedSinceDate($date, $withFullData = false, $select = 1000, $skip = 0)
    {
        $withFullData = $withFullData ? 'true' : 'false';
        $url = sprintf("contacts/created-since/%s?withFullData=%s&select=%s&skip=%s", $date, $withFullData, $select, $skip);
        return new ApiContactList($this->execute($url));
    }

    public function PostContactsImport(ApiFileMedia $apiFileMedia)
    {
        return new ApiContactImport($this->execute('contacts/import', 'POST', $apiFileMedia->toJson()));
    }

    public function GetContactsImportByImportId($importId)
    {
        $url = sprintf("contacts/import/%s", $importId);
        return new ApiContactImport($this->execute($url));
    }

    public function GetContactsImportReport($importId)
    {
        $url = sprintf("contacts/import/%s/report", $importId);
        return new ApiContactImportReport($this->execute($url));
    }

    public function GetContactsImportReportFaults(Guid $importId)
    {
        $url = sprintf("contacts/import/%s/report-faults", $importId);
        return new XsString($this->execute($url));
    }

    public function GetContactsModifiedSinceDate($date, $withFullData = false, $select = 1000, $skip = 0)
    {
        $withFullData = $withFullData ? 'true' : 'false';
        $url = sprintf("contacts/modified-since/%s?withFullData=%s&select=%s&skip=%s", $date, $withFullData, $select, $skip);
        return new ApiContactList($this->execute($url));
    }

    public function PostContactsResubscribe(ApiContactResubscription $apiContactResubscription)
    {
        return new ApiResubscribeResult($this->execute('contacts/resubscribe', 'POST', $apiContactResubscription->toJson()));
    }

    public function GetContactsSuppressedSinceDate($date, $select = 1000, $skip = 0)
    {
        $url = sprintf("contacts/suppressed-since/%s?select=%s&skip=%s", $date, $select, $skip);
        return new ApiContactSuppressionList($this->execute($url));
    }

    public function PostContactsTransactionalData($collectionName, ApiTransactionalData $apiTransactionalData)
    {
        $url = sprintf("contacts/transactional-data/%s", $collectionName);
        return new ApiTransactionalData($this->execute($url, 'POST', $apiTransactionalData->toJson()));
    }

    public function PostContactsTransactionalDataUpdate($collectionName, $importId, ApiJsonData $apiJsonData)
    {
        $url = sprintf("contacts/transactional-data/%s/%s", $collectionName, $importId);
        return new ApiTransactionalData($this->execute($url, 'POST', $apiJsonData->toJson()));
    }

    public function DeleteContactsTransactionalData($collectionName, $key)
    {
        $url = sprintf("contacts/transactional-data/%s/%s", $collectionName, $key);
        $this->execute($url, 'DELETE');
    }

    public function GetContactsTransactionalDataByKey($collectionName, $key)
    {
        $url = sprintf("contacts/transactional-data/%s/%s", $collectionName, $key);
        return new ApiTransactionalData($this->execute($url));
    }

    public function PostContactsTransactionalDataImport($collectionName, ApiTransactionalDataList $apiTransactionalDataList)
    {
        $url = sprintf("contacts/transactional-data/import/%s", $collectionName);
        return new ApiTransactionalDataImport($this->execute($url, 'POST', $apiTransactionalDataList->toJson()));
    }

    public function GetContactsTransactionalDataImportByImportId($importId)
    {
        $url = sprintf("contacts/transactional-data/import/%s", $importId);
        return new ApiTransactionalDataImport($this->execute($url));
    }

    public function GetContactsTransactionalDataImportReport($importId)
    {
        $url = sprintf("contacts/transactional-data/import/%s/report", $importId);
        return new ApiTransactionalDataImportReport($this->execute($url));
    }

    public function PostContactsUnsubscribe(ApiContact $apiContact)
    {
        return new ApiContactSuppression($this->execute('contacts/unsubscribe', 'POST', $apiContact->toJson()));
    }

    public function GetContactsUnsubscribedSinceDate($data, $select = 1000, $skip = 0)
    {
        $url = sprintf("contacts/unsubscribed-since/%s?select=%s&skip=%s", $data, $select, $skip);
        return new ApiContactSuppressionList($this->execute($url));
    }

    public function GetContacts($withFullData = false, $select = 1000, $skip = 0)
    {
        $withFullData = $withFullData ? 'true' : 'false';
        $url = sprintf("contacts?withFullData=%s&select=%s&skip=%s", $withFullData, $select, $skip);
        return new ApiContactList($this->execute($url));
    }


    /*
     * ========== custom-from-addresses ==========
     */

    public function GetCustomFromAddresses($select = 1000, $skip = 0)
    {
        $url = sprintf("custom-from-addresses?select=%s&skip=%s", $select, $skip);
        return new ApiCampaignFromAddressList($this->execute($url));
    }


    /*
     * ========== data-fields ==========
     */

    public function PostDataFields(ApiDataField $apiDataField)
    {
        $this->execute('data-fields', 'POST', $apiDataField->toJson());
    }

    public function GetDataFields()
    {
        return new ApiDataFieldList($this->execute('data-fields'));
    }

    public function DeleteDataField($name)
    {
        $url = sprintf("data-fields/%s", $name);
        return new ApiDependencyResult($this->execute($url, 'DELETE'));
    }

    /*
     * ========== document-folders ==========
     */

    public function GetDocumentFolders()
    {
        return new ApiDocumentFolderList($this->execute('document-folders'));
    }

    public function PostDocumentFolder($folderId, ApiDocumentFolder $apiDocumentFolder)
    {
        $url = sprintf("document-folders/%s", $folderId);
        return new ApiDocumentFolder($this->execute($url, 'POST', $apiDocumentFolder->toJson()));
    }

    public function GetDocumentFolderDocuments($folderId)
    {
        $url = sprintf("document-folders/%s/documents", $folderId);
        return new ApiDocumentList($this->execute($url));
    }

    public function PostDocumentFolderDocuments($folderId, ApiFileMedia $apiFileMedia)
    {
        $url = sprintf("document-folders/%s/documents", $folderId);
        return new ApiDocument($this->execute($url, 'POST', $apiFileMedia->toJson()));
    }

    /*
     * ========== image-folders ==========
     */

    public function GetImageFolders()
    {
        return new ApiImageFolderList($this->execute('image-folders'));
    }

    public function PostImageFolderImages(XsInt $folderId, ApiFileMedia $apiFileMedia)
    {
        $url = sprintf("image-folders/%s/images", $folderId);
        return new ApiImage($this->execute($url, 'POST', $apiFileMedia->toJson()));
    }

    public function GetImageFolderById(XsInt $folderId)
    {
        $url = sprintf("image-folders/%s", $folderId);
        return new ApiImageFolder($this->execute($url));
    }

    public function PostImageFolder(XsInt $folderId, ApiImageFolder $apiImageFolder)
    {
        $url = sprintf("image-folders/%s", $folderId);
        return new ApiImageFolder($this->execute($url, 'POST', $apiImageFolder->toJson()));
    }

    /*
    * ========== programs and enrolments ==========
    */

    public function GetProgramById(XsInt $programId)
    {
        $url = sprintf("programs/%s", $programId);
        return new ApiProgram($this->execute($url));
    }

    public function PostProgramsEnrolments(ApiProgramEnrolment $apiProgramEnrolment)
    {
        $this->execute('programs/enrolments', 'POST', $apiProgramEnrolment->toJson());
    }

    public function GetProgramsEnrolmentByEnrolmentId($enrolmentId)
    {
        $url = sprintf("programs/enrolments/%s", $enrolmentId);
        return new ApiProgramEnrolment($this->execute($url));
    }

    public function GetProgramsEnrolmentReportFaults($enrolmentId)
    {
        $url = sprintf("programs/enrolments/%s/report-faults", $enrolmentId);
        return new ApiProgramEnrolment($this->execute($url));
    }

    public function GetProgramsEnrolmentByStatus($status, $select = 1000, $skip = 0)
    {
        $url = sprintf("programs/enrolments/%s/?select=%s&skip=%s", $status, $select, $skip);
        return new ApiProgramEnrolmentList($this->execute($url));
    }

    public function GetPrograms($select = 1000, $skip = 0)
    {
        $url = sprintf("programs/?select=%s&skip=%s", $select, $skip);
        return new ApiProgramList($this->execute($url));
    }

    /*
     * ========== segments ==========
     */

    public function PostSegmentsRefresh(XsInt $segmentId)
    {
        $url = sprintf("segments/refresh/%s", $segmentId);
        return new ApiSegmentRefresh($this->execute($url, 'POST'));
    }

    public function GetSegmentsRefreshById(XsInt $segmentId)
    {
        $url = sprintf("segments/refresh/%s", $segmentId);
        return new ApiSegmentRefresh($this->execute($url));
    }

    public function GetSegments($select = 1000, $skip = 0)
    {
        $url = sprintf("segments?select=%s&skip=%s", $select, $skip);
        return new ApiSegmentList($this->execute($url));
    }

    /*
     * ========== server-time ==========
     */

    public function GetServerTime()
    {
        return new XsDateTime($this->execute('server-time'));
    }

    /*
     * ========== sms-messages ==========
     */

    public function PostSmsMessagesSendTo(XsString $telephoneNumber, ApiSms $apiSms)
    {
        $this->execute(sprintf("/sms-messages/send-to/%s", $telephoneNumber), 'POST', $apiSms->toJson());
    }

    /*
     * ========== templates ==========
     */

    public function PostTemplates(IApiTemplate $apiTemplate)
    {
        return new ApiTemplate($this->execute('templates', 'POST', $apiTemplate->toJson()));
    }

    public function GetTemplateById(XsInt $templateId)
    {
        $url = sprintf("templates/%s", $templateId);
        return new ApiTemplate($this->execute($url));
    }

    public function UpdateTemplate(IApiTemplate $apiTemplate)
    {
        $url = sprintf("templates/%s", $apiTemplate->id);
        return new ApiTemplate($this->execute($url, 'PUT', $apiTemplate->toJson()));
    }

    public function GetTemplates($select = 1000, $skip = 0)
    {
        $url = sprintf("templates?select=%s&skip=%s", $select, $skip);
        return new ApiTemplateList($this->execute($url));
    }
}
