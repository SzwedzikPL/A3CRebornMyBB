<?php

return [
    // default board language
    'bblanguage' => 'polish',
    // disable language selection
    'showlanguageselect' => 0,
    // disable theme selection
    'showthemeselect' => 0,
    // enable seo urls
    'seourls' => 'yes',
    // show template start/end comments only on dev
    'tplhtmlcomments' => (int)is_dev_instance(),
    // minify css if not dev
    'minifycss' => (int)is_dev_instance(),
    // php date format
    'dateformat' => 'd-m-Y',
    // php time format
    'timeformat' => 'H:i',
    // hide birthdays
    'showbirthdays' => 0,
    // disable thread ratings
    'allowthreadratings' => 0,
    // use classis layout in posts (post author in left column)
    'postlayout' => 'classic',
    // avatar size in posts
    'postmaxavatarsize' => '120x120',
    // default avatar
    'useravatar' => 'assets/a3creborn/static/default_avatar?v='.plugin_version(),
    // default avatar dimensions
    'useravatardims' => '120x120',
    // avatar max dimensions
    'maxavatardims' => '120x120',
    // disable away user status
    'allowaway' => 0,
    // disable limit for images in posts
    'maxpostimages' => 0,
    // disable limit for videos in posts
    'maxpostvideos' => 0,
    // allow 320 characters in poll option
    'polloptionlimit' => 320,
    // disable limit of poll options
    'maxpolloptions' => 0,
    // disable poll time limit
    'polltimelimit' => 0,
    // disable attachments
    'enableattachments' => 0,
    // disable reputation
    'enablereputation' => 0,
    // disable warning system
    'enablewarningsystem' => 0,
    // disable calendar
    'enablecalendar' => 0,
    // disable portal
    'portal' => 0,
    // disable icq, skype and google hangouts fields
    'allowicqfield' => '',
    'allowskypefield' => '',
    'allowgooglefield' => '',
    // disable show team page
    'enableshowteam' => 0
];
