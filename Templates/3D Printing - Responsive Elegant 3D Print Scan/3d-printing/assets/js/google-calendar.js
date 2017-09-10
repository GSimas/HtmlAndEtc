// Your Client ID can be retrieved from your project in the Google
// Developer Console, https://console.developers.google.com
var CLIENT_ID = GoogleAPI.calendar;

var SCOPES = ["https://www.googleapis.com/auth/calendar"];

/**
 * Initiate auth flow in response to user clicking authorize button.
 *
 * @param {Event} event Button click event.
 */
var eventButton = document.getElementById('btn-calendar-event');
eventButton.onclick = function() {
    gapi.auth.authorize(
        {client_id: CLIENT_ID, scope: SCOPES, immediate: false},
        handleAuthResult);
    return false;
};
/**
 * Handle response from authorization server.
 *
 * @param {Object} authResult Authorization result.
 */
function handleAuthResult(authResult) {
    if (authResult && !authResult.error) {
        insertCalendarApi();
    }
}

/**
 * Load Google Calendar client library. List upcoming events
 * once client library is loaded.
 */
function insertCalendarApi() {
    gapi.client.load('calendar', 'v3', insertEvents);
}

/**
 * Print the summary and start datetime/date of the next ten events in
 * the authorized user's calendar. If no events are found an
 * appropriate message is printed.
 */
function insertEvents() {
    var eventID = document.getElementById("calendar-event");
    var tz = jstz.determine();
    var eventData = {
        'summary': eventID.dataset.title,
        'location': eventID.dataset.location,
        'description': eventID.dataset.summary,
        'start': {
            'dateTime': eventID.dataset.start,
            'timeZone': tz.name()
        },
        'end': {
            'dateTime': eventID.dataset.end,
            'timeZone': tz.name()
        }
    };
    var request = gapi.client.calendar.events.insert({
        'calendarId': 'primary',
        'resource': eventData
    });

    request.execute(function(event) {
        //appendPre('Event created: ' + event.htmlLink);
        var textContent = '<div class="alert alert-success"><strong>Success!</strong> <a href="' + event.htmlLink + '" target="_blank">Click here to view event</a></div>';
        eventID.innerHTML = textContent;
    });
}
