"use strict;"

const DEBUG = false;
const BASE_URL = "https://tomware.cc/";
const CACHED_ASSETS = [];
const CACHE_NAME = "invision-community-ecf8894f891770009813";
const CACHE_VERSION = "ecf8894f891770009813";
const NOTIFICATION_ICON = null;
const DEFAULT_NOTIFICATION_TITLE = "You have a new notification";
const DEFAULT_NOTIFICATION_BODY = "You'll need to visit the site to read it. Tap here to log in.";
const OFFLINE_PAGE = "<!DOCTYPE html> <html lang=\"en-US\" dir=\"ltr\"> <head> <title>You are offline - Tomware</title> <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"> <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"> <style> :root { /* Master scales & styles */ --sp-5: 20px; --sp-8: 40px; /* Button styles */ --button--radius: var(--radius-1); /* Page widths */ --container--width: 1340px; --minimal_container--width: 1000px; --theme-text_color:167,170,183; --theme-page_background:15,16,20; --theme-text_dark:167,170,183; --theme-important_button:23,126,201; --theme-important_button_font:255,255,255; } body { font-family: \"Inter\", -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"; font-size: 16px; line-height: 1.5; color: rgb( var(--theme-text_color) ); height: 100%; background-color: rgb( var(--theme-page_background) ); margin: 0; } @-webkit-viewport { width: device-width; } @-moz-viewport { width: device-width; } @-ms-viewport { width: device-width; } @-o-viewport { width: device-width; } @viewport { width: device-width; } * {box-sizing: border-box;} .ipsLayout_container { max-width: var(--container--width); padding: 0 15px; margin: 0 auto; position: relative; } /* ======================================================== */ /* BOX STYLES */ .ipsBox { box-shadow: var(--box--boxShadow); border-radius: var(--box--radius); background-color: var(--box--backgroundColor); } /* ======================================================== */ /* BASE BUTTONS */ .ipsApp .ipsButton { font-size: 14.0px; font-weight: 400; text-align: center; text-decoration: none; text-shadow: none; white-space: nowrap; display: inline-block; vertical-align: middle; padding: 10px 20px; border-radius: var(--button--radius); border: 1px solid transparent; transition: 0.1s all linear; cursor: pointer; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; -o-user-select: none; user-select: none; max-width: 100%; overflow: hidden; text-overflow: ellipsis; } .ipsApp .ipsButton:hover:not(:active) { background-image: linear-gradient(to bottom, rgba(255,255,255,0.08) 0%,rgba(255,255,255,0.08) 100%); } .ipsApp .ipsButton:active { border-color: rgba(0,0,0,0.1); background-image: linear-gradient(to bottom, rgba( var(--theme-text_dark), 0.1 ) 0%, rgba( var(--theme-text_dark), 0.1 ) 100%); } .ipsApp .ipsButton_important { font-weight: 500; background: rgb( var(--theme-important_button) ); color: rgb( var(--theme-important_button_font) ); } .ipsApp .ipsButton_medium { font-size: 14.0px; line-height: 3; padding: 0 20px; } .ipsApp .ipsButton_fullWidth { display: block; width: 100%; text-overflow: ellipsis; overflow: hidden; } /* ======================================================== */ /* HORIZONTAL RULE */ hr.ipsHr { margin: 15px 0; height: 0; padding: 0; border: 1px solid rgba( var(--theme-text_color), 0.08 ); border-width: 1px 0 0 0; } /* ======================================================== */ /* OFFLINE SPECIFIC */ .cOfflineBox { margin: var(--sp-8) auto 0; max-width: 475px; padding: var(--sp-5); } </style> <link rel=\"shortcut icon\" href=\"data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMCAzMCIgZmlsbD0iIzMzMzMzMyI+PHBhdGggZD0iTSAxNSAzIEMgMTQuMTY4NDMyIDMgMTMuNDU2MDYzIDMuNTA2NzIzOCAxMy4xNTQyOTcgNC4yMjg1MTU2IEwgMi4zMDA3ODEyIDIyLjk0NzI2NiBMIDIuMzAwNzgxMiAyMi45NDkyMTkgQSAyIDIgMCAwIDAgMiAyNCBBIDIgMiAwIDAgMCA0IDI2IEEgMiAyIDAgMCAwIDQuMTQwNjI1IDI1Ljk5NDE0MSBMIDQuMTQ0NTMxMiAyNiBMIDE1IDI2IEwgMjUuODU1NDY5IDI2IEwgMjUuODU5Mzc1IDI1Ljk5MjE4OCBBIDIgMiAwIDAgMCAyNiAyNiBBIDIgMiAwIDAgMCAyOCAyNCBBIDIgMiAwIDAgMCAyNy42OTkyMTkgMjIuOTQ3MjY2IEwgMjcuNjgzNTk0IDIyLjkxOTkyMiBBIDIgMiAwIDAgMCAyNy42ODE2NDEgMjIuOTE3OTY5IEwgMTYuODQ1NzAzIDQuMjI4NTE1NiBDIDE2LjU0MzkzNyAzLjUwNjcyMzggMTUuODMxNTY4IDMgMTUgMyB6IE0gMTMuNzg3MTA5IDExLjM1OTM3NSBMIDE2LjIxMjg5MSAxMS4zNTkzNzUgTCAxNi4wMTE3MTkgMTcuODMyMDMxIEwgMTMuOTg4MjgxIDE3LjgzMjAzMSBMIDEzLjc4NzEwOSAxMS4zNTkzNzUgeiBNIDE1LjAwMzkwNiAxOS44MTA1NDcgQyAxNS44MjU5MDYgMTkuODEwNTQ3IDE2LjMxODM1OSAyMC4yNTI4MTMgMTYuMzE4MzU5IDIxLjAwNzgxMiBDIDE2LjMxODM1OSAyMS43NDg4MTIgMTUuODI1OTA2IDIyLjE4OTQ1MyAxNS4wMDM5MDYgMjIuMTg5NDUzIEMgMTQuMTc1OTA2IDIyLjE4OTQ1MyAxMy42Nzk2ODggMjEuNzQ4ODEzIDEzLjY3OTY4OCAyMS4wMDc4MTIgQyAxMy42Nzk2ODggMjAuMjUyODEzIDE0LjE3NDkwNiAxOS44MTA1NDcgMTUuMDAzOTA2IDE5LjgxMDU0NyB6IiBmaWxsPSIjMzMzMzMzIi8+PC9zdmc+Cg==\" type=\"image/svg+xml\"> </head> <body class=\"ipsApp ipsApp_front ipsClearfix ipsLayout_noBackground ipsClearfix\"> <div class=\"ipsLayout_container\"> <div class=\"cOfflineBox ipsBox\"> <h1 class=\"ipsType_pageTitle\">Tomware</h1> <hr class=\"ipsHr\"> <h2 class=\"ipsType_sectionHead\">You appear to be offline</h2> <p>We're unable to load this page because it looks like your device isn't connected to the internet right now.</p> <p>Check your connection then click the button below to try reloading this page.</p> <hr class=\"ipsHr\"> <button onclick=\"javascript: window.location.reload()\" class=\"ipsButton ipsButton_important ipsButton_medium ipsButton_fullWidth\">Try Again</button> </div> </div> </body> </html> ";
const OFFLINE_PAGE_SIZE = 5170;
/**
 * Invision Community
 * (c) Invision Power Services, Inc. - https://www.invisioncommunity.com
 *
 * Invision Community service worker
 */

// ------------------------------------------------
// Install/activate SW events
// ------------------------------------------------
self.addEventListener("install", (e) => {
	console.log("Service worker installed");
	e.waitUntil(
		CACHED_ASSETS.length
			? cacheAssets().then(() => {
					return self.skipWaiting();
			  })
			: self.skipWaiting()
	);
});

self.addEventListener("activate", (e) => {
	const cacheAllowList = [CACHE_NAME];

	// Clean up any caches that don't match our current cache key
	// Ensure we don't have outdated styles/assets/etc.
	e.waitUntil(
		Promise.all([
			caches.keys().then((cacheNames) => {
				return Promise.all(
					cacheNames.map((cacheName) => {
						if (cacheAllowList.indexOf(cacheName) === -1) {
							return caches.delete(cacheName);
						}
					})
				);
			}),
			self.clients.claim(),
		])
	);
});

const returnDefaultNotification = () => {
	return self.registration.showNotification(DEFAULT_NOTIFICATION_TITLE, {
		body: DEFAULT_NOTIFICATION_BODY,
		icon: NOTIFICATION_ICON,
		data: {
			url: BASE_URL,
		},
	});
};

// ------------------------------------------------
// Push notification event handler
// ------------------------------------------------
self.addEventListener("push", (e) => {
	// A couple of basic sanity checks
	if (!e.data) {
		console.log("Invalid notification data");
		return; // Invalid notification data
	}

	const pingData = e.data.json();
	const { id } = pingData;

	// We don't send the notification data in the push, otherwise we run into issues whereby
	// a user could have logged out but will still receive notification unintentionally.
	// Instead, we'll receive an ID in the push, then we'll ping the server to get
	// the actual content (and run our usual authorization checks)

	const promiseChain = fetch(`${BASE_URL}index.php?app=core&module=system&controller=notifications&do=fetchNotification&id=${id}`, {
		method: "POST",
		credentials: "include", // Must send cookies so we can check auth
	})
		.then((response) => {
			// Fetch went wrong - but we must show a notification, so just send a generic message
			if (!response.ok) {
				throw new Error("Invalid response");
			}

			return response.json();
		})
		.then((data) => {
			// The server returned an error - but we must show a notification, so just send a generic message
			if (data.error) {
				throw new Error("Server error");
			}

			const { body, url, grouped, groupedTitle, groupedUrl, icon, image } = data;
			let { title } = data;
			let tag;

			if (data.tag) {
				tag = data.tag.substr(0, 30);
			}

			let options = {
				body,
				icon: icon ? icon : NOTIFICATION_ICON,
				image: image ? image : null,
				data: {
					url,
				},
			};

			if (!tag || !grouped) {
				// This notification has no tag or grouped lang, so just send it
				// as a one-off thing
				return self.registration.showNotification(title, options);
			} else {
				return self.registration.getNotifications({ tag }).then((notifications) => {
					// Tagged notifications require some additional data
					options = {
						...options,
						tag,
						renotify: true, // Required, otherwise browsers won't renotify for this tag
						data: {
							...options.data,
							unseenCount: 1,
						},
					};

					if (notifications.length) {
						try {
							// Get the most recent notification and see if it has a count
							// If it does, increase the unseenCount by one and update the message
							// With this approach we'll always have a reference to the previous notification's count
							// and can simply increase and fire a new notification to tell the user
							const lastWithTag = notifications[notifications.length - 1];

							if (lastWithTag.data && typeof lastWithTag.data.unseenCount !== "undefined") {
								const unseenCount = lastWithTag.data.unseenCount + 1;

								options.data.unseenCount = unseenCount;
								options.body = pluralize(grouped.replace("{count}", unseenCount), unseenCount);

								if (groupedUrl) {
									options.data.url = groupedUrl ? groupedUrl : options.data.url;
								}

								if (groupedTitle) {
									title = pluralize(groupedTitle.replace("{count}", unseenCount), unseenCount);
								}

								lastWithTag.close();
							}
						} catch (err) {
							console.log(err);
						}
					}

					return self.registration.showNotification(title, options);
				});
			}
		})
		.catch((err) => {
			// The server returned an error - but we must show a notification, so just send a generic message
			return returnDefaultNotification();
		});

	e.waitUntil(promiseChain);
});

// ------------------------------------------------
// Notification click event handler
// ------------------------------------------------
self.addEventListener("notificationclick", (e) => {
	const { data } = e.notification;

	e.waitUntil(
		self.clients.matchAll().then((clients) => {
			console.log(clients);

			// If we already have the site open, use that window
			if (clients.length > 0 && "navigate" in clients[0]) {
				if (data.url) {
					clients[0].navigate(data.url);
				} else {
					clients[0].navigate(BASE_URL);
				}

				return clients[0].focus();
			}

			// otherwise open a new window
			return self.clients.openWindow(data.url ? data.url : BASE_URL);
		})
	);
});

// ------------------------------------------------
// Fetch a resource - use to detect offline state
// ------------------------------------------------
self.addEventListener("fetch", (e) => {
	const { request } = e;

	// test the offline page
	const offlineResponse = () => {
		const response = new Response(OFFLINE_PAGE, {
			headers: {
				"Content-Type": "text/html",
				"Content-Length": OFFLINE_PAGE_SIZE
			},
			status: 200,
			statusText: "OK"
		});
		return response;
	}

	// Leaving this in but commented out for now; It could be useful
	// if ((new URL(request.url).searchParams.has('forceOfflinePage'))) {
	// 	e.respondWith(offlineResponse());
	// }

	// We test /admin/ first and then a fallback for the deprecated custom admin directory name feature
	if (request.url.startsWith(BASE_URL + "admin/") || e.currentTarget.location.href.match(/type=admin/)) {
		log("In ACP, nothing to do...");
		return;
	}

	if (!request.url.startsWith(BASE_URL) || (request.method === "GET" && request.mode !== "navigate")) {
		return;
	}

	// We intercept fetch requests in the following situation:
	// 1: GET requests where we're offline
	//    	Show a cached offline page instead
	if (request.mode === "navigate" && request.method === "GET" && !navigator.onLine) {
		e.respondWith(
			fetch(request).catch((err) => {
				return offlineResponse();
			})
		);
	}
});

// ------------------------------------------------
// Helpers
// ------------------------------------------------
const log = (message) => {
	if (DEBUG) {
		if (typeof message === "string") {
			message = `SW: ${message}`;
		}

		console.log(message);
	}
};

const cacheAssets = () => {
	return caches.open(CACHE_NAME).then((cache) => {
		return cache.addAll(CACHED_ASSETS);
	});
};

const pluralize = (word, params) => {
	let i = 0;

	if (!Array.isArray(params)) {
		params = [params];
	}

	word = word.replace(/\{(!|\d+?)?#(.*?)\}/g, (a, b, c, d) => {
		// {# [1:count][?:counts]}
		if (!b || b == "!") {
			b = i;
			i++;
		}

		let value;
		let fallback;
		let output = "";
		let replacement = params[b] + "";

		c.replace(/\[(.+?):(.+?)\]/g, (w, x, y, z) => {
			if (x == "?") {
				fallback = y.replace("#", replacement);
			} else if (x.charAt(0) == "%" && x.substring(1) == replacement.substring(0, x.substring(1).length)) {
				value = y.replace("#", replacement);
			} else if (x.charAt(0) == "*" && x.substring(1) == replacement.substr(-x.substring(1).length)) {
				value = y.replace("#", replacement);
			} else if (x == replacement) {
				value = y.replace("#", replacement);
			}
		});

		output = a.replace(/^\{/, "").replace(/\}$/, "").replace("!#", "");
		output = output.replace(b + "#", replacement).replace("#", replacement);
		output = output.replace(/\[.+\]/, value == null ? fallback : value).trim();

		return output;
	});

	return word;
};