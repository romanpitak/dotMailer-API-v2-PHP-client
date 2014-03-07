<?php
/**
 * 
 * 
 * @author Roman Piták <roman@pitak.net>
 * 
 */
 
 

namespace DotMailer\Api\DataTypes;


class ApiCampaignContactRoiDetailList extends JsonArray {

	protected function getDataClass() {
		return 'ApiCampaignContactRoiDetail';
	}

} 