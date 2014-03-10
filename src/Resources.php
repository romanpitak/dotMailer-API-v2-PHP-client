<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
 

namespace DotMailer\Api;


use DotMailer\Api\DataTypes\ApiAccount;
use DotMailer\Api\DataTypes\ApiAddressBook;
use DotMailer\Api\DataTypes\ApiAddressBookList;
use DotMailer\Api\DataTypes\ApiCampaignContactSocialBookmarkViewList;
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
use DotMailer\Api\DataTypes\ApiDocument;
use DotMailer\Api\DataTypes\ApiDocumentList;
use DotMailer\Api\DataTypes\ApiFileMedia;
use DotMailer\Api\DataTypes\ApiResubscribeResult;
use DotMailer\Api\DataTypes\ApiTransactionalDataList;
use DotMailer\Api\DataTypes\Guid;
use DotMailer\Api\DataTypes\Int32List;
use DotMailer\Api\DataTypes\XsBoolean;
use DotMailer\Api\DataTypes\XsDateTime;
use DotMailer\Api\DataTypes\XsInt;
use DotMailer\Api\DataTypes\XsString;
use DotMailer\Api\Rest\IClient;
use DotMailer\Api\DataTypes\ApiCampaign;
use DotMailer\Api\DataTypes\ApiCampaignContactClickList;
use DotMailer\Api\DataTypes\ApiCampaignContactOpenList;
use DotMailer\Api\DataTypes\ApiCampaignContactPageViewList;
use DotMailer\Api\DataTypes\ApiCampaignContactReplyList;
use DotMailer\Api\DataTypes\ApiCampaignContactRoiDetailList;
use DotMailer\Api\DataTypes\ApiCampaignContactSummary;
use DotMailer\Api\DataTypes\ApiCampaignContactSummaryList;


final class Resources {

	/** @var IClient */
	private $restClient;

	public function __construct(IClient $restClient) {
		$this->restClient = $restClient;
	}


	/**
	 * @param string $url
	 * @param string $method
	 * @param string $data
	 * @return string
	 */
	private function execute($url, $method = 'GET', $data = null) {
		return $this->restClient->execute(array($url, $method, $data), array());
	}

	/*
	 * ========== RESOURCES ==========
	 */

	/*
	 * ========== account-info ==========
	 */

	/**
	 * Gets a summary of information about the current status of the account.
	 *
	 * @return ApiAccount
	 */
	public function GetAccountInfo() {
		return new ApiAccount($this->execute('account-info'));
	}

	/*
	 * ========== address-books ==========
	 */

	/**
	 * Creates an address book.
	 *
	 * @param ApiAddressBook $addressBook
	 * @return ApiAddressBook
	 */
	public function PostAddressBooks(ApiAddressBook  $addressBook) {
		return new ApiAddressBook($this->execute('address-books', 'POST', $addressBook->toJson()));
	}

	/**
	 * Gets any campaigns that have been sent to an address book.
	 *
	 * @param int|XsInt$addressBookId
	 * @param int $select
	 * @param int $skip
	 */
	public function GetAddressBookCampaigns($addressBookId, $select = 1000, $skip = 0) {
		$url = sprintf("address-books/%s/campaigns?select=%s&skip=%s", $addressBookId, $select, $skip);
		new ApiCampaignList($this->execute($url));
	}

	/**
	 * Deletes all contacts from a given address book.
	 *
	 * @param int|XsInt$addressBookId
	 */
	public function DeleteAddressBookContacts($addressBookId) {
		$this->execute(sprintf("address-books/%s/contacts", $addressBookId), 'DELETE');
	}

	/**
	 * Adds a contact to a given address book.
	 *
	 * @param int|XsInt $addressBookId
	 * @param ApiContact $apiContact
	 * @return ApiContact
	 */
	public function PostAddressBookContacts($addressBookId, ApiContact $apiContact) {
		$url = sprintf("address-books/%s/contacts", $addressBookId);
		return new ApiContact($this->execute($url, 'POST', $apiContact->toJson()));
	}

	/**
	 * Deletes a contact from a given address book.
	 *
	 * @param int|XsInt $addressBookId
	 * @param int|XsInt|string|XsString $apiContactId Contact Id or email // todo test if deleting by email works
	 */
	public function DeleteAddressBookContact($addressBookId, $apiContactId) {
		$url = sprintf("address-books/%s/contacts/%s", $addressBookId, $apiContactId);
		$this->execute($url, 'DELETE');
	}

	/**
	 * Deletes multiple contacts from an address book
	 *
	 * @param int|XsInt $addressBookId
	 * @param Int32List $contactIdList
	 */
	public function PostAddressBookContactsDelete($addressBookId, $contactIdList) {
		$url = sprintf("address-books/%s/contacts/delete", $addressBookId);
		$this->execute($url, 'DELETE', $contactIdList->toJson());
	}

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
	public function PostAddressBookContactsImport($addressBookId, ApiFileMedia $apiFileMedia) {
		$url = sprintf("address-books/%s/contacts/import", $addressBookId);
		return new ApiContactImport($this->execute($url, 'POST', $apiFileMedia->toJson()));
	}

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
	public function GetAddressBookContactsModifiedSinceDate($addressBookId, $date, $withFullData = false, $select = 1000, $skip = 0) {
		$withFullData = $withFullData ? 'true' : 'false';
		$url = sprintf("address-books/%s/contacts/modified-since/%s?withFullData=%s&select=%s&skip=%s", $addressBookId, $date, $withFullData, $select, $skip);
		return new ApiContactList($this->execute($url));
	}

	/**
	 * Resubscribes a previously unsubscribed contact to a given address book.
	 *
	 * @param int|XsInt $addressBookId
	 * @param ApiContactResubscription $apiContactResubscription
	 * @return ApiResubscribeResult
	 */
	public function PostAddressBookContactsResubscribe($addressBookId, ApiContactResubscription $apiContactResubscription) {
		$url = sprintf("address-books/%s/contacts/resubscribe", $addressBookId);
		return new ApiResubscribeResult($this->execute($url, 'POST', $apiContactResubscription->toJson()));
	}

	/**
	 * Unsubscribes contact from a given address book.
	 *
	 * @param int|XsInt $addressBookId
	 * @param ApiContact $apiContact
	 * @return ApiContactSuppression
	 */
	public function PostAddressBookContactsUnsubscribe($addressBookId, ApiContact $apiContact) {
		$url = sprintf("address-books/%s/contacts/unsubscribe", $addressBookId);
		return new ApiContactSuppression($this->execute($url, 'POST', $apiContact->toJson()));
	}

	/**
	 * Gets a list of contacts who have unsubscribed from a given address book.
	 *
	 * @param int|XsInt $addressBookId
	 * @param string|XsDateTime $date
	 * @param int $select
	 * @param int $skip
	 */
	public function GetAddressBookContactsUnsubscribedSinceDate($addressBookId, $date, $select = 1000, $skip = 0) {
		$url = sprintf("address-books/%s/contacts/unsubscribed-since/%s?select=%s&skip=%s", $addressBookId, $date, $select, $skip);
		new ApiContactSuppressionList($this->execute($url));
	}

	/**
	 * Gets a list of contacts in a given address book.
	 *
	 * @param int|XsInt $addressBookId
	 * @param bool|XsBoolean $withFullData
	 * @param int $select
	 * @param int $skip
	 * @return ApiContactList
	 */
	public function GetAddressBookContacts($addressBookId, $withFullData = false, $select = 1000, $skip = 0) {
		$withFullData = $withFullData ? 'true' : 'false';
		$url = sprintf("address-books/%s/contacts?withFullData=%s&select=%s&skip=%s", $addressBookId, $withFullData, $select, $skip);
		return new ApiContactList($this->execute($url));
	}

	/**
	 * Gets an address book by id.
	 *
	 * @param int|XsInt $addressBookId
	 * @return ApiAddressBook
	 */
	public function GetAddressBookById($addressBookId) {
		return new ApiAddressBook($this->execute(sprintf("address-books/%s", $addressBookId)));
	}

	/**
	 * Updates an address book.
	 *
	 * @param ApiAddressBook $apiAddressBook
	 * @return ApiAddressBook
	 */
	public function UpdateAddressBook(ApiAddressBook $apiAddressBook) {
		$url = sprintf("address-books/%s", $apiAddressBook->id);
		return new ApiAddressBook($this->execute($url, 'PUT', $apiAddressBook->toJson()));
	}

	/**
	 * Deletes an address book.
	 *
	 * @param int|XsInt $addressBookId
	 */
	public function DeleteAddressBook($addressBookId) {
		$this->execute(sprintf("address-books/%s", $addressBookId), 'DELETE');
	}

	/**
	 * Gets all private address books
	 *
	 * @param int $select
	 * @param int $skip
	 * @return ApiAddressBookList
	 */
	public function GetAddressBooksPrivate($select = 1000, $skip = 0) {
		return new ApiAddressBookList($this->execute(sprintf("address-books/private?select=%s&skip=%s", $select, $skip)));
	}

	/**
	 * Gets all public address books
	 *
	 * @param int $select
	 * @param int $skip
	 * @return ApiAddressBookList
	 */
	public function GetAddressBooksPublic($select = 1000, $skip = 0) {
		return new ApiAddressBookList($this->execute(sprintf("address-books/public?select=%s&skip=%s", $select, $skip)));
	}

	/**
	 * Gets all address books
	 *
	 * @param int $select
	 * @param int $skip
	 * @return ApiAddressBookList
	 */
	public function GetAddressBooks($select = 1000, $skip = 0) {
		return new ApiAddressBookList($this->execute(sprintf("address-books?select=%s&skip=%s", $select, $skip)));
	}

	/*
	 * ========== campaigns ==========
	 */

	/**
	 * Creates a campaign.
	 *
	 * @param ApiCampaign $apiCampaign to be created
	 * @return ApiCampaign New campaign (with campaign ID)
	 */
	public function PostCampaigns(ApiCampaign $apiCampaign) {
		return new ApiCampaign($this->execute('campaigns', 'POST', $apiCampaign->toJson()));
	}

	/**
	 * Gets activity for a given contact and campaign.
	 *
	 * @param int|XsInt $campaignId
	 * @param int|XsInt $contactId
	 * @return ApiCampaignContactSummary
	 */
	public function GetCampaignActivityByContactId($campaignId, $contactId) {
		return new ApiCampaignContactSummary($this->execute(sprintf("campaigns/%s/activities/%s", $campaignId, $contactId)));
	}

	/**
	 * Gets a list of campaign link clicks for a contact.
	 *
	 * @param int|XsInt $campaignId
	 * @param int|XsInt $contactId
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactClickList
	 */
	public function GetCampaignActivityClicks($campaignId, $contactId, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/activities/%s/clicks?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
		return new ApiCampaignContactClickList($this->execute($url));
	}

	/**
	 * Gets a list of campaign opens for a contact.
	 *
	 * @param int|XsInt $campaignId
	 * @param int|XsInt $contactId
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactOpenList
	 */
	public function GetCampaignActivityOpens($campaignId, $contactId, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/activities/%s/opens?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
		return new ApiCampaignContactOpenList($this->execute($url));
	}

	/**
	 * Gets a list of page views for a contact.
	 *
	 * @param int|XsInt $campaignId
	 * @param int|XsInt $contactId
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactPageViewList
	 */
	public function GetCampaignActivityPageViews($campaignId, $contactId, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/activities/%s/opens?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
		return new ApiCampaignContactPageViewList($this->execute($url));
	}

	/**
	 * Gets a list of campaign replies for a contact. You may not request more than 5 records at a time using the "select" parameter.
	 *
	 * @param int|XsInt $campaignId
	 * @param int|XsInt $contactId
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactReplyList
	 */
	public function GetCampaignActivityReplies($campaignId, $contactId, $select = 5, $skip = 0) {
		$url = sprintf("campaigns/%s/activities/%s/replies?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
		return new ApiCampaignContactReplyList($this->execute($url));
	}

	/**
	 * Gets a list of ROI information for a contact.
	 *
	 * @param int|XsInt $campaignId
	 * @param int|XsInt $contactId
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactRoiDetailList
	 */
	public function GetCampaignActivityRoiDetails($campaignId, $contactId, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/activities/%s/roi-details?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
		return new ApiCampaignContactRoiDetailList($this->execute($url));
	}

	/**
	 * Gets campaign social bookmark views for a contact.
	 *
	 * @param int|XsInt $campaignId
	 * @param int|XsInt $contactId
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactSocialBookmarkViewList
	 */
	public function GetCampaignActivitySocialBookmarkViews($campaignId, $contactId, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/activities/%s/social-bookmark-views?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
		return new ApiCampaignContactSocialBookmarkViewList($this->execute($url));
	}

	/**
	 * Gets a list of contacts who were sent a campaign, and retrieves only those contacts who showed activity (e.g. they clicked, opened) after a specified date.
	 *
	 * @param int|XsInt $campaignId
	 * @param string|XsDateTime $dateTime
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactSummaryList
	 */
	public function GetCampaignActivitiesSinceDateByDate($campaignId, $dateTime, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/activities/since-date/%s?select=%s&skip=%s", $campaignId, $dateTime, $select, $skip);
		return new ApiCampaignContactSummaryList($this->execute($url));
	}

	/**
	 * Gets a list of contacts who were sent a campaign, with their activity.
	 *
	 * @param int|XsInt $campaignId
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactSummaryList
	 */
	public function GetCampaignActivities($campaignId, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/activities?select=%s&skip=%s", $campaignId, $select, $skip);
		return new ApiCampaignContactSummaryList($this->execute($url));
	}

	/**
	 * Gets any address books that a campaign has ever been sent to.
	 *
	 * @param int|XsInt $campaignId
	 * @param int $select
	 * @param int $skip
	 * @return ApiAddressBookList
	 */
	public function GetCampaignAddressBooks($campaignId, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/address-books?select=%s&skip=%s", $campaignId, $select, $skip);
		return new ApiAddressBookList($this->execute($url));
	}

	/**
	 * Gets documents that are currently attached to a campaign.
	 *
	 * @param int|XsInt $campaignId
	 * @return ApiDocumentList
	 */
	public function GetCampaignAttachments($campaignId) {
		$url = sprintf("campaigns/%s/attachments", $campaignId);
		return new ApiDocumentList($this->execute($url));
	}

	/**
	 * Adds a document to a campaign as an attachment.
	 *
	 * @param int|XsInt $campaignId
	 * @param ApiDocument $apiDocument
	 * @return ApiDocument
	 */
	public function PostCampaignAttachments($campaignId, ApiDocument $apiDocument) {
		$url = sprintf("campaigns/%s/attachments", $campaignId);
		return new ApiDocument($this->execute($url, 'POST', $apiDocument->toJson()));
	}

	/**
	 * Removes an attachment from a campaign.
	 *
	 * @param int|XsInt $campaignId
	 * @param int|XsInt $documentId
	 */
	public function DeleteCampaignAttachment($campaignId, $documentId) {
		$this->execute(sprintf("campaigns/%s/attachments/%s", $campaignId, $documentId));
	}

	/**
	 * Gets a list of campaign link clicks.
	 *
	 * @param int|XsInt $campaignId
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactClickList
	 */
	public function GetCampaignClicks($campaignId, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/clicks?select=%s&skip=%s", $campaignId, $select, $skip);
		return new ApiCampaignContactClickList($this->execute($url));
	}

	/**
	 * Copies a given campaign returning the new campaign.
	 *
	 * @param int|XsInt $campaignId
	 * @return ApiCampaign
	 */
	public function PostCampaignCopy($campaignId) {
		$url = sprintf("campaigns/%s/copy", $campaignId);
		return new ApiCampaign($this->execute($url, 'POST'));
	}

	/**
	 * Gets a list of contacts who hard bounced when sent a particular campaign.
	 *
	 * @param int|XsInt $campaignId
	 * @param bool|XsBoolean  $withFullData
	 * @param int $select
	 * @param int $skip
	 * @return ApiContactList
	 */
	public function GetCampaignHardBouncingContacts($campaignId, $withFullData = false, $select = 1000, $skip = 0) {
		$withFullData = $withFullData ? 'true' : 'false';
		$url = sprintf("/campaigns/%s/hard-bouncing-contacts?withFullData=%s&select=%s&skip=%s", $campaignId, $withFullData, $select, $skip);
		return new ApiContactList($this->execute($url));
	}

	/**
	 * Gets a list of campaign opens.
	 *
	 * @param int|XsInt $campaignId
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactOpenList
	 */
	public function GetCampaignOpens($campaignId, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/opens?select=%s&skip=%s", $campaignId, $select, $skip);
		return new ApiCampaignContactOpenList($this->execute($url));
	}

	/**
	 * Gets a list of page views for a campaign after a specified date.
	 *
	 * @param int|XsInt $campaignId
	 * @param string|XsDateTime $dateTime
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactPageViewList
	 */
	public function GetCampaignPageViewsSinceDateByDate($campaignId, $dateTime, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/page-views/since-date/%s?select=%s&skip=%s", $campaignId, $dateTime, $select, $skip);
		return new ApiCampaignContactPageViewList($this->execute($url));
	}

	/**
	 * @param int|XsInt $campaignId
	 * @param string|XsDateTime $dateTime
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactRoiDetailList
	 */
	public function GetCampaignRoiDetailsSinceDateByDate($campaignId, $dateTime, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/roi-details/since-date/%s?select=%s&skip=%s", $campaignId, $dateTime, $select, $skip);
		return new ApiCampaignContactRoiDetailList($this->execute($url));
	}

	/**
	 * Gets campaign social bookmark views for a campaign.
	 *
	 * @param int|XsInt $campaignId
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignContactSocialBookmarkViewList
	 */
	public function GetCampaignSocialBookmarkViews($campaignId, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/social-bookmark-views?select=%s&skip=%s", $campaignId, $select, $skip);
		return new ApiCampaignContactSocialBookmarkViewList($this->execute($url));
	}

	/**
	 * Gets a summary of reporting information for a specified campaign.
	 *
	 * @param int|XsInt $campaignId
	 * @return ApiCampaignSummary
	 */
	public function GetCampaignSummary($campaignId) {
		return new ApiCampaignSummary($this->execute(sprintf("campaigns/%s/summary", $campaignId)));
	}

	/**
	 * Gets a campaign by ID.
	 *
	 * @param int|XsInt $campaignId
	 * @return ApiCampaign
	 */
	public function GetCampaignById($campaignId) {
		return new ApiCampaign($this->execute(sprintf("campaigns/%s", $campaignId)));
	}

	/**
	 * Updates a given campaign.
	 *
	 * @param ApiCampaign $apiCampaign
	 * @return ApiCampaign
	 */
	public function UpdateCampaign(ApiCampaign $apiCampaign) {
		return new ApiCampaign($this->execute(sprintf("campaigns/%s", $apiCampaign->id), 'PUT', $apiCampaign));
	}

	/**
	 * Sends a specified campaign to one or more address books, segments or contacts at a specified time.
	 *
	 * Leave the address book array empty to send to All Contacts.
	 *
	 * @param ApiCampaignSend $apiCampaignSend
	 * @return ApiCampaignSend
	 */
	public function PostCampaignsSend(ApiCampaignSend $apiCampaignSend) {
		return new ApiCampaignSend('campaigns/send', 'POST', $apiCampaignSend->toJson());
	}

	/**
	 * @param string|Guid $sendId
	 * @return ApiCampaignSend
	 */
	public function GetCampaignsSendBySendId($sendId) {
		return new ApiCampaignSend(sprintf("campaigns/send/%s", $sendId));
	}

	/**
	 * Gets all sent campaigns, which have had activity (e.g. clicks, opens) after a specified date.
	 *
	 * @param string|XsDateTime $dateTime
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignList
	 */
	public function GetCampaignsWithActivitySinceDate($dateTime, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/with-activity-since/%s?select=%s&skip=%s", $dateTime, $select, $skip);
		return new ApiCampaignList($this->execute($url));
	}

	/**
	 * Gets all campaigns
	 *
	 * @param int $select
	 * @param int $skip
	 * @return ApiCampaignList
	 */
	public function GetCampaigns($select = 1000, $skip = 0) {
		return new ApiCampaignList($this->execute(sprintf("campaigns?select=%s&skip=%s", $select, $skip)));
	}


	/*
	 * ========== contacts ==========
	 */

	/**
	 * Creates a contact.
	 *
	 * @param ApiContact $apiContact
	 * @return ApiContact
	 */
	public function PostContacts(ApiContact $apiContact) {
		return new ApiContact($this->execute('contacts', 'POST', $apiContact->toJson()));
	}

	/**
	 * Gets any address books that a contact is in.
	 *
	 * @param int|XsInt $contactId
	 * @param int $select
	 * @param int $skip
	 * @return ApiAddressBookList
	 */
	public function GetContactAddressBooks($contactId, $select = 1000, $skip = 0) {
		$url = sprintf("contacts/%s/address-books?select=%s&skip=%s", $contactId, $select, $skip);
		return new ApiAddressBookList($this->execute($url));
	}

	/**
	 * Gets a contact by email address.
	 *
	 * @param string|XsString $email
	 * @return ApiContact
	 */
	public function GetContactByEmail($email) {
		return new ApiContact($this->execute(sprintf("contacts/%s", $email)));
	}

	/**
	 * Deletes all transactional data for a contact.
	 *
	 * @param string|XsString|int|XsInt $contactId
	 * @param string|XsString $collectionName
	 */
	public function DeleteContactTransactionalData($contactId, $collectionName) {
		$url = sprintf("contacts/%s/transactional-data/%s", $contactId, $collectionName);
		$this->execute($url, 'DELETE');
	}

	/**
	 * Gets a list of all transactional data for a contact (100 most recent only).
	 *
	 * @param string|XsString|int|XsInt $contactId
	 * @param string|XsString $collectionName
	 * @return ApiTransactionalDataList
	 */
	public function GetContactTransactionalDataByCollectionName($contactId, $collectionName) {
		$url = sprintf("contacts/%s/transactional-data/%s", $contactId, $collectionName);
		return new ApiTransactionalDataList($this->execute($url));
	}

	/**
	 * Gets a contact by ID. Unsubscribed or suppressed contacts will not be retrieved.
	 *
	 * @param int|XsInt $contactId
	 * @return ApiContact
	 */
	public function GetContactById($contactId) {
		return new ApiContact($this->execute(sprintf("contacts/%s", $contactId)));
	}

	/**
	 * Updates a contact.
	 *
	 * @param ApiContact $apiContact
	 * @return ApiContact
	 */
	public function UpdateContact(ApiContact $apiContact) {
		$url = sprintf("contacts/%s", $apiContact->id);
		return new ApiContact($this->execute($url, 'PUT', $apiContact->toJson()));
	}

	/**
	 * Deletes a contact.
	 *
	 * @param int|XsInt $contactId
	 */
	public function DeleteContact($contactId) {
		$this->execute(sprintf("contacts/%s", $contactId), 'DELETE');
	}

	/**
	 * Gets a list of created contacts after a specified date.
	 *
	 * @param string|XsDateTime $date
	 * @param bool|XsBoolean $withFullData
	 * @param int|XsInt $select
	 * @param int|XsInt $skip
	 * @return ApiContactList
	 */
	public function GetContactsCreatedSinceDate($date, $withFullData = false, $select = 1000, $skip = 0) {
		$withFullData = $withFullData ? 'true' : 'false';
		$url = sprintf("contacts/created-since/%s?withFullData=%s&select=%s&skip=%s", $date, $withFullData, $select, $skip);
		return new ApiContactList($this->execute($url));
	}

	/**
	 * Bulk creates, or bulk updates, contacts. Import format can either be CSV or Excel. Must include one column called "Email".
	 *
	 * Any other columns will attempt to map to your custom data fields. The ID of returned object can be used to query import progress.
	 *
	 * @param ApiFileMedia $apiFileMedia
	 * @return ApiContactImport
	 */
	public function PostContactsImport(ApiFileMedia $apiFileMedia) {
		return new ApiContactImport($this->execute('contacts/import', 'POST', $apiFileMedia->toJson()));
	}

	/**
	 * Gets the import status of a previously started contact import.
	 *
	 * @param string|Guid $importId
	 * @return ApiContactImport
	 */
	public function GetContactsImportByImportId($importId) {
		$url = sprintf("contacts/import/%s", $importId);
		return new ApiContactImport($this->execute($url));
	}

	/**
	 * Gets a report with statistics about what was successfully imported, and what was unable to be imported.
	 *
	 * @param string|Guid $importId
	 * @return ApiContactImportReport
	 */
	public function GetContactsImportReport($importId) {
		$url = sprintf("contacts/import/%s/report", $importId);
		return new ApiContactImportReport($this->execute($url));
	}

	// todo GetContactsImportReportFaults()

	/**
	 * Gets a list of modified contacts after a specified date.
	 *
	 * @param string|XsDateTime $date
	 * @param bool|XsBoolean $withFullData
	 * @param int|XsInt $select
	 * @param int|XsInt $skip
	 * @return ApiContactList
	 */
	public function GetContactsModifiedSinceDate($date, $withFullData = false, $select = 1000, $skip = 0) {
		$withFullData = $withFullData ? 'true' : 'false';
		$url = sprintf("contacts/modified-since/%s?withFullData=%s&select=%s&skip=%s", $date, $withFullData, $select, $skip);
		return new ApiContactList($this->execute($url));
	}

	/**
	 * Resubscribes a previously unsubscribed contact.
	 *
	 * @param ApiContactResubscription $apiContactResubscription
	 * @return ApiResubscribeResult
	 */
	public function PostContactsResubscribe(ApiContactResubscription $apiContactResubscription) {
		return new ApiResubscribeResult($this->execute('contacts/resubscribe', 'POST', $apiContactResubscription->toJson()));
	}

	/**
	 * Gets a list of suppressed contacts after a given date along with the reason for suppression.
	 *
	 * @param string|XsDateTime $date
	 * @param int|XsInt $select
	 * @param int|XsInt $skip
	 * @return ApiContactSuppressionList
	 */
	public function GetContactsSuppressedSinceDate($date, $select = 1000, $skip = 0) {
		$url = sprintf("contacts/suppressed-since/%s?select=%s&skip=%s", $date, $select, $skip);
		return new ApiContactSuppressionList($this->execute($url));
	}


	/*
	 * ========== transactional-data ==========
	 */

	



}


































