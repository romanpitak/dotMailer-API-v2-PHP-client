<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
namespace DotMailer\Api;

use DotMailer\Api\DataTypes\ApiAddressBookList;
use DotMailer\Api\DataTypes\ApiCampaign;
use DotMailer\Api\DataTypes\ApiCampaignContactClickList;
use DotMailer\Api\DataTypes\ApiCampaignContactOpenList;
use DotMailer\Api\DataTypes\ApiCampaignContactPageViewList;
use DotMailer\Api\DataTypes\ApiCampaignContactReplyList;
use DotMailer\Api\DataTypes\ApiCampaignContactRoiDetailList;
use DotMailer\Api\DataTypes\ApiCampaignContactSummary;
use DotMailer\Api\DataTypes\ApiCampaignContactSummaryList;
use DotMailer\Api\DataTypes\ApiCampaignList;
use DotMailer\Api\DataTypes\XsBoolean;
use DotMailer\Api\DataTypes\XsDateTime;
use DotMailer\Api\DataTypes\XsInt;

final class Campaigns extends Service {

	/**
	 * Creates a campaign.
	 *
	 * @param ApiCampaign $apiCampaign to be created
	 * @return ApiCampaign New campaign (with campaign ID)
	 */
	public function PostCampaigns(ApiCampaign $apiCampaign) {
		return new ApiCampaign($this->execute(array('campaigns', 'POST', $apiCampaign->toJson())));
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
	 * @return string json
	 */
	public function GetCampaignActivitySocialBookmarkViews($campaignId, $contactId, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/activities/%s/social-bookmark-views?select=%s&skip=%s", $campaignId, $contactId, $select, $skip);
		return $this->execute($url); // todo data type
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
	 * @return string json
	 */
	public function GetCampaignAttachments($campaignId) {
		$url = sprintf("campaigns/%s/attachments", $campaignId);
		return $this->execute($url); // todo data type
	}


	// todo PostCampaignAttachments()

	/**
	 * Removes an attachment from a campaign.
	 *
	 * @param int|XsInt $campaignId
	 * @param int|XsInt $documentId
	 */
	public function DeleteCampaignAttachment($campaignId, $documentId) {
		$this->execute(array(sprintf("campaigns/%s/attachments/%s", $campaignId, $documentId)));
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
		return new ApiCampaign($this->execute(array($url, 'POST')));
	}

	/**
	 * Gets a list of contacts who hard bounced when sent a particular campaign.
	 *
	 * @param int|XsInt $campaignId
	 * @param bool|XsBoolean  $withFullData
	 * @param int $select
	 * @param int $skip
	 * @return string json
	 */
	public function GetCampaignHardBouncingContacts($campaignId, $withFullData = false, $select = 1000, $skip = 0) {
		$withFullData = $withFullData ? 'true' : 'false';
		$url = sprintf("/campaigns/%s/hard-bouncing-contacts?withFullData=%s&select=%s&skip=%s", $campaignId, $withFullData, $select, $skip);
		return $this->execute($url); // todo data type
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
	 * @return string json
	 */
	public function GetCampaignSocialBookmarkViews($campaignId, $select = 1000, $skip = 0) {
		$url = sprintf("campaigns/%s/social-bookmark-views?select=%s&skip=%s", $campaignId, $select, $skip);
		return $this->execute($url); // todo data type
	}

	/**
	 * Gets a summary of reporting information for a specified campaign.
	 *
	 * @param int|XsInt $campaignId
	 * @return string json
	 */
	public function GetCampaignSummary($campaignId) {
		return $this->execute(sprintf("campaigns/%s/summary", $campaignId)); // todo data type
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
		return new ApiCampaign($this->execute(array(sprintf("campaigns/%s", $apiCampaign->id), 'PUT', $apiCampaign)));
	}

	// todo PostCampaignsSend()

	// todo GetCampaignsSendBySendId()

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





}