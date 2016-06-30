<?php

namespace DotMailer\Api\DataTypes;

final class ApiSurvey extends JsonObject implements IApiTemplate
{

    protected function getProperties()
    {
        return array(
            'Id' => 'XsInt',
            'Name' => 'XsString',
            'Url' => 'XsString',
            'DateSurveyCreated' => 'XsDateTime',
            'DateSurveyModified' => 'XsDateTime',
            'State' => 'XsString',
            'FirstActiveDate' => 'XsDateTime',
            'LastInactiveDate' => 'XsDateTime',
            'ScheduledStartDate' => 'XsDateTime',
            'ScheduledEndDate' => 'XsDateTime',
            'ConfirmationMode' => 'XsString',
            'SubmissionMode' => 'XsString',
            'FieldCount' => 'XsInt',
            'NotifyCreatorOnResponse' => 'XsBoolean',
            'RespondentNotificationType' => 'XsString',
            'RespondentNotificationCampaignId' => 'XsInt',
            'IsAssignedToAddressBook' => 'XsBoolean',
            'AssignedAddressBookTarget' => 'XsString',
            'AssignedSpecificAddressBookId' => 'XsInt',
            'FirstResponseDate' => 'XsDateTime',
            'LastResponseDate' => 'XsDateTime',
            'TotalCompleteResponses' => 'XsInt',
            'TotalCompleteResponsesInLastDay' => 'XsInt',
            'TotalCompleteResponsesInLastWeek' => 'XsInt',
            'TotalIncompleteResponses' => 'XsInt',
            'TotalViews' => 'XsInt',
            'TotalBounces' => 'XsInt',
            'TimeToCompleteMax' => 'XsInt',
            'TimeToCompleteMin' => 'XsInt',
            'TimeToCompleteTotal' => 'XsInt',
            'SourceDirectTotal' => 'XsInt',
            'SourceEmailTotal' => 'XsInt',
            'SourceEmbeddedTotal' => 'XsInt',
            'SourcePopoverTotal' => 'XsInt',
            'SourceFacebookTotal' => 'XsInt',
            'SourceTwitterTotal' => 'XsInt',
            'SourceGooglePlusTotal' => 'XsInt',
            'SourceOtherTotal' => 'XsInt',
        );
    }
}
