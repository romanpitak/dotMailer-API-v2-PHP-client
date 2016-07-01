# v1.1.3

**Jul 01, 2016**

- Fixed `JSON_BIGINT_AS_STRING` for older servers

# v1.1.2

**Oct 26, 2015**

- added `ApiTransactionalDataImportFaultReason::JSON_NUMBER_VALUE_TOO_LARGE` constant

# v1.1.1

**Sep 15, 2015**

- added `Resources::PostContactsTransactionalDataUpdate()` corresponding to
  [/v2/contacts/transactional-data/{collectionName}/{key}](https://api.dotmailer.com/v2/help/wadl#ContactsTransactionalData)

# v1.1.0

**Sep 9, 2015**

- **Programs and enrolments** added:
    - `DataTypes/ApiProgram`
    - `DataTypes/ApiProgramEnrolment`
    - `DataTypes/ApiProgramEnrolmentList`
    - `DataTypes/ApiProgramEnrolmentStatus`
    - `DataTypes/ApiProgramList`
    - `DataTypes/ApiProgramStatus`
    - in `Resources/Resources`:
        - `GetProgramById(XsInt $programId) -> ApiProgram`
        - `PostProgramsEnrolments(ApiProgramEnrolment $apiProgramEnrolment)`
        - `GetProgramsEnrolmentByEnrolmentId($enrolmentId) -> ApiProgramEnrolment`
        - `GetProgramsEnrolmentReportFaults($enrolmentId) -> ApiProgramEnrolment`
        - `GetProgramsEnrolmentByStatus($status, $select = 1000, $skip = 0) -> ApiProgramEnrolmentList`
        - `GetPrograms($select = 1000, $skip = 0) -> ApiProgramList`
- minor formatting fixes

# v1.0.11

**Jun 12, 2015**

- fixed `Resources::PostContactsTransactionalDataImport()` arguments
- fixed `ApiTransactionalDataImportStatuses` constants

# v1.0.10

**Apr 22, 2015**

- fixed `Resource::GetAddressBookContactsUnsubscribedSinceDate()` return value

# v1.0.9

**Apr 22, 2015**

- fixed `Resources::GetAddressBookCampaigns()` return value
- code cleanup
- more README files added

# v1.0.8

**Nov 25, 2014**

- fixed `Resources::PostCampaignsSend()`

# v1.0.7

**Nov 24, 2014**

- fixed `Mixed::toJson()`

# v1.0.6

**Sep 15, 2014**

- `php-rest-client` version bump to v1.2
- added more examples

# v1.0.5

**Sep 10, 2014**

- added `UpdateCampaign::toJson()`
- fixed `PostAddressBookContactsDelete` http verb
- fixed `ApiAddressBookVisibility`
- fixed `ApiDataFieldVisibility`
