<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
 

namespace DotMailer\Api\DataTypes;


class ApiCampaignContactSummaryList extends JsonArray {

	function getDataClass() {
		return 'ApiCampaignContactSummary';
	}

}