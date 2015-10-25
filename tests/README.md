# Tests

I've started adding some tests into the [devel/tests](https://github.com/romanpitak/dotMailer-API-v2-PHP-client/tree/devel/tests) branch.
*For now*, I'm focusing on testing the data types **against the wadl specification**.
My idea is to have an abstract test 
(e.g. [EnumTest](https://github.com/romanpitak/dotMailer-API-v2-PHP-client/blob/devel/tests/tests/DataTypes/EnumTest.php))
and then inherit specific tests
(e.g. [ApiAddressBookVisibilityTest](https://github.com/romanpitak/dotMailer-API-v2-PHP-client/blob/devel/tests/tests/DataTypes/ApiAddressBookVisibilityTest.php),
[ApiSurveyStateTest](https://github.com/romanpitak/dotMailer-API-v2-PHP-client/blob/devel/tests/tests/DataTypes/ApiSurveyStateTest.php))
which would only serve the purpose of adding the correct class name and coverage information.
The inherited classes can IMHO be generated and then (if needed) specific tests can be added to them.
I've added this (into the `phpunit.xml`) as a separate testsuite (separated from future `Resources` testing) as it doesn't require a client. 

I believe that writing a mock client would be too much work, although generating one from the wadl shouldn't be a problem. 


## Mock classes

- `src`
    - `DataTypes`
        - [ ] `ApiAssignedContactDataExistsAction`
        - [ ] `ApiRespondentNotificationType`
        - [ ] `ApiSurveyAssignedAddressBookTarget`
        - [ ] `ApiSurveyConfirmationMode`
        - [ ] `ApiSurveyState`
        - [ ] `ApiSurveySubmissionMode`
