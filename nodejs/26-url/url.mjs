// https://nodejs.org/docs/latest-v16.x/api/url.html

// URL merupakan object yang berisikan informasi dari sebuah URL

import {URL} from 'url';

const nawcodesUrl = 'https://nawcodes.hack.id/?name=nawawi&age=20';

const nawcodes = new URL(nawcodesUrl);

console.log(nawcodes.toString());
console.log(nawcodes.origin);
console.log(nawcodes.protocol);
console.log(nawcodes.host);
console.log(nawcodes.hostname);



